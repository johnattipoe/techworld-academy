<?php
/**
 * Payment Manager
 * Central payment processing coordinator
 */

$paymentSystemRoot = dirname(__DIR__, 2);
require_once($paymentSystemRoot . '/gateways/paystack/paystack.php');
require_once($paymentSystemRoot . '/gateways/stripe/stripe.php');
require_once($paymentSystemRoot . '/gateways/paypal/paypal.php');
require_once($paymentSystemRoot . '/modules/installment_manager/installment_manager.php');
require_once($paymentSystemRoot . '/modules/scholarship_manager/scholarship_manager.php');
require_once($paymentSystemRoot . '/modules/invoice_generator/invoice_generator.php');

class PaymentManager {
    private PDO $db;
    private Paystack|Stripe|PayPal $gateway;
    private InstallmentManager $installmentManager;
    private ScholarshipManager $scholarshipManager;
    private InvoiceGenerator $invoiceGenerator;
    
    public function __construct(PDO $db, string $gatewayType = 'paystack') {
        $this->db = $db;
        $this->installmentManager = new InstallmentManager($db);
        $this->scholarshipManager = new ScholarshipManager($db);
        $this->invoiceGenerator = new InvoiceGenerator($db);
        
        // Initialize payment gateway
        $this->setGateway($gatewayType);
    }
    
    /**
     * Set payment gateway
     */
    public function setGateway(string $gatewayType) {
        switch (strtolower($gatewayType)) {
            case 'stripe':
                $this->gateway = new Stripe();
                break;
            case 'paypal':
                $this->gateway = new PayPal();
                break;
            case 'paystack':
            default:
                $this->gateway = new Paystack();
                break;
        }
        
        return $this;
    }
    
    /**
     * Process course payment
     */
    public function processCoursePayment(array $data) {
        // Check for scholarship
        $scholarship = $this->scholarshipManager->calculateDiscount(
            $data['user_id'],
            $data['course_id'],
            $data['amount']
        );
        
        $finalAmount = $scholarship['final_amount'];
        $discountAmount = $scholarship['discount_amount'];
        
        // Create payment record
        $paymentId = $this->createPaymentRecord([
            'user_id' => $data['user_id'],
            'course_id' => $data['course_id'],
            'payment_type' => 'course_enrollment',
            'gateway' => get_class($this->gateway),
            'amount' => $data['amount'],
            'discount' => $discountAmount,
            'final_amount' => $finalAmount,
            'currency' => $data['currency'] ?? 'GHS',
            'status' => 'pending'
        ]);
        
        // If installment plan selected
        if (isset($data['installment_plan_id'])) {
            return $this->processInstallmentPayment($paymentId, $data);
        }
        
        // Process full payment
        return $this->processFullPayment($paymentId, $finalAmount, $data);
    }
    
    /**
     * Process full payment
     */
    private function processFullPayment(int|string $paymentId, int|float|string $amount, array $data) {
        try {
            // Check if in demo mode
            if (getenv('PAYMENT_MODE') === 'demo') {
                return $this->processDemoPayment($paymentId, $amount, $data);
            }
            
            // Initialize payment with gateway
            if ($this->gateway instanceof Paystack) {
                $response = $this->gateway->initializeTransaction([
                    'email' => $data['email'],
                    'amount' => $amount,
                    'reference' => $this->generateReference($paymentId),
                    'callback_url' => $data['callback_url'],
                    'metadata' => [
                        'payment_id' => $paymentId,
                        'course_id' => $data['course_id'],
                        'user_id' => $data['user_id']
                    ]
                ]);
                
                // Update payment record with reference
                $this->updatePaymentReference($paymentId, $response['data']['reference']);
                
                return [
                    'success' => true,
                    'payment_id' => $paymentId,
                    'authorization_url' => $response['data']['authorization_url'],
                    'reference' => $response['data']['reference']
                ];
                
            } elseif ($this->gateway instanceof Stripe) {
                $response = $this->gateway->createPaymentIntent([
                    'amount' => $amount,
                    'currency' => $data['currency'] ?? 'usd',
                    'email' => $data['email'],
                    'metadata' => [
                        'payment_id' => $paymentId,
                        'course_id' => $data['course_id']
                    ]
                ]);
                
                return [
                    'success' => true,
                    'payment_id' => $paymentId,
                    'client_secret' => $response['client_secret'],
                    'payment_intent_id' => $response['id']
                ];
                
            } elseif ($this->gateway instanceof PayPal) {
                $response = $this->gateway->createOrder([
                    'amount' => $amount,
                    'currency' => $data['currency'] ?? 'USD',
                    'description' => $data['description'] ?? 'Course Enrollment',
                    'return_url' => $data['return_url'],
                    'cancel_url' => $data['cancel_url']
                ]);
                
                return [
                    'success' => true,
                    'payment_id' => $paymentId,
                    'order_id' => $response['id'],
                    'approval_url' => $response['links'][1]['href'] ?? null
                ];
            }
            
        } catch (Exception $e) {
            $this->updatePaymentStatus($paymentId, 'failed', $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'Payment initialization failed: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Process installment payment
     */
    private function processInstallmentPayment(int|string $paymentId, array $data) {
        // Subscribe to installment plan
        $installmentId = $this->installmentManager->subscribeToInstallment([
            'user_id' => $data['user_id'],
            'plan_id' => $data['installment_plan_id'],
            'down_payment' => $data['down_payment'] ?? 0
        ]);
        
        // Update payment record
        $this->db->prepare("UPDATE payments SET installment_id = :installment_id WHERE id = :id")
            ->execute([':installment_id' => $installmentId, ':id' => $paymentId]);
        
        // If down payment required
        if (isset($data['down_payment']) && $data['down_payment'] > 0) {
            return $this->processFullPayment($paymentId, $data['down_payment'], $data);
        }
        
        return [
            'success' => true,
            'payment_id' => $paymentId,
            'installment_id' => $installmentId,
            'message' => 'Enrolled in installment plan successfully'
        ];
    }
    
    /**
     * Verify payment
     */
    public function verifyPayment(string $reference, string $gatewayType = 'paystack') {
        $this->setGateway($gatewayType);
        
        try {
            if ($this->gateway instanceof Paystack) {
                $response = $this->gateway->verifyTransaction($reference);
                
                if ($response['data']['status'] === 'success') {
                    $this->completePayment($reference, $response['data']);
                    return ['success' => true, 'data' => $response['data']];
                }
                
            } elseif ($this->gateway instanceof Stripe) {
                $response = $this->gateway->retrievePaymentIntent($reference);
                
                if ($response['status'] === 'succeeded') {
                    $this->completePayment($reference, $response);
                    return ['success' => true, 'data' => $response];
                }
                
            } elseif ($this->gateway instanceof PayPal) {
                $response = $this->gateway->capturePayment($reference);
                
                if ($response['status'] === 'COMPLETED') {
                    $this->completePayment($reference, $response);
                    return ['success' => true, 'data' => $response];
                }
            }
            
            return ['success' => false, 'message' => 'Payment verification failed'];
            
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Complete payment
     */
    private function completePayment(string $reference, array $gatewayResponse) {
        $sql = "UPDATE payments 
                SET status = 'paid', 
                    paid_at = NOW(),
                    gateway_response = :gateway_response
                WHERE payment_reference = :reference";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':gateway_response' => json_encode($gatewayResponse),
            ':reference' => $reference
        ]);
        
        // Get payment details
        $payment = $this->getPaymentByReference($reference);
        
        // Enroll user in course
        if ($payment['payment_type'] === 'course_enrollment') {
            $this->enrollUserInCourse($payment['user_id'], $payment['course_id']);
        }
        
        // Generate invoice
        $this->invoiceGenerator->generateInvoice($payment['id'], 'save');
        
        // Send notification
        $this->sendPaymentConfirmation($payment);
        
        return true;
    }
    
    /**
     * Create payment record
     */
    private function createPaymentRecord(array $data) {
        $sql = "INSERT INTO payments 
                (user_id, course_id, payment_type, gateway, amount, discount,
                 final_amount, currency, status, invoice_number, items, created_at)
                VALUES
                (:user_id, :course_id, :payment_type, :gateway, :amount, :discount,
                 :final_amount, :currency, :status, :invoice_number, :items, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        $items = json_encode([[
            'description' => $data['description'] ?? 'Course Enrollment',
            'quantity' => 1,
            'unit_price' => $data['amount'],
            'total' => $data['final_amount']
        ]]);
        
        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':course_id' => $data['course_id'] ?? null,
            ':payment_type' => $data['payment_type'],
            ':gateway' => $data['gateway'],
            ':amount' => $data['amount'],
            ':discount' => $data['discount'] ?? 0,
            ':final_amount' => $data['final_amount'],
            ':currency' => $data['currency'],
            ':status' => $data['status'],
            ':invoice_number' => InvoiceGenerator::generateInvoiceNumber(),
            ':items' => $items
        ]);
        
        return $this->db->lastInsertId();
    }
    
    /**
     * Update payment reference
     */
    private function updatePaymentReference(int|string $paymentId, string $reference) {
        $sql = "UPDATE payments SET payment_reference = :reference WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':reference' => $reference, ':id' => $paymentId]);
    }
    
    /**
     * Update payment status
     */
    private function updatePaymentStatus(int|string $paymentId, string $status, ?string $note = null) {
        $sql = "UPDATE payments SET status = :status, notes = :notes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':status' => $status, ':notes' => $note, ':id' => $paymentId]);
    }
    
    /**
     * Get payment by reference
     */
    private function getPaymentByReference(string $reference) {
        $sql = "SELECT * FROM payments WHERE payment_reference = :reference";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':reference' => $reference]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Generate payment reference
     */
    private function generateReference(int|string $paymentId) {
        return 'PAY_' . $paymentId . '_' . time();
    }
    
    /**
     * Enroll user in course
     */
    private function enrollUserInCourse(int|string $userId, int|string $courseId) {
        $sql = "INSERT INTO enrollments (user_id, course_id, enrolled_at, status)
                VALUES (:user_id, :course_id, NOW(), 'active')";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':user_id' => $userId, ':course_id' => $courseId]);
    }
    
    /**
     * Send payment confirmation
     */
    private function sendPaymentConfirmation(array $payment) {
        // Implementation depends on your notification system
        return true;
    }
    
    /**
     * Process refund
     */
    public function refundPayment(int|string $paymentId, int|float|string|null $amount = null) {
        $payment = $this->getPayment($paymentId);
        
        if (!$payment || $payment['status'] !== 'paid') {
            return ['success' => false, 'message' => 'Invalid payment or not eligible for refund'];
        }
        
        try {
            $this->setGateway($payment['gateway']);
            
            if ($this->gateway instanceof Paystack) {
                $response = $this->gateway->refundTransaction($payment['payment_reference'], $amount);
            } elseif ($this->gateway instanceof Stripe) {
                $response = $this->gateway->createRefund($payment['payment_reference'], $amount);
            } elseif ($this->gateway instanceof PayPal) {
                $response = $this->gateway->refundCapture($payment['payment_reference'], $amount);
            }
            
            // Update payment status
            $this->updatePaymentStatus($paymentId, 'refunded');
            
            return ['success' => true, 'message' => 'Refund processed successfully'];
            
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Get payment details
     */
    public function getPayment(int|string $paymentId) {
        $sql = "SELECT * FROM payments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $paymentId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get user's payment history
     */
    public function getUserPayments(int|string $userId) {
        $sql = "SELECT * FROM payments WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Log payment activity
     */
    private function logPayment(int|string $paymentId, int|string $userId, string $action, string $gateway, int|float|string $amount, string $status, array $metadata = [], array $response = []) {
        $sql = "INSERT INTO payment_logs 
                (payment_id, user_id, action, gateway, amount, status, metadata, response, created_at)
                VALUES 
                (:payment_id, :user_id, :action, :gateway, :amount, :status, :metadata, :response, NOW())";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':payment_id' => $paymentId,
                ':user_id' => $userId,
                ':action' => $action,
                ':gateway' => $gateway,
                ':amount' => $amount,
                ':status' => $status,
                ':metadata' => json_encode($metadata),
                ':response' => json_encode($response)
            ]);
        } catch (Exception $e) {
            // Log to file if database logging fails
            error_log("Payment log failed: " . $e->getMessage());
        }
    }
    
    /**
     * Demo/Mock payment processing (for testing without API keys)
     */
    private function processDemoPayment(int|string $paymentId, int|float|string $amount, array $data) {
        // Update payment record as paid
        $sql = "UPDATE payments SET 
                status = 'paid',
                payment_reference = :reference,
                paid_at = NOW()
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':reference' => 'DEMO_' . $this->generateReference($paymentId),
            ':id' => $paymentId
        ]);
        
        // Log demo payment
        $this->logPayment($paymentId, $data['user_id'], 'demo_payment', 'paystack', $amount, 'success', [
            'mode' => 'demo',
            'message' => 'Demo payment - no real transaction'
        ], [
            'success' => true,
            'demo' => true
        ]);
        
        // Return success with demo authorization URL (redirect to success page)
        $returnUrl = (string)($data['return_url'] ?? '');
        $querySeparator = strpos($returnUrl, '?') === false ? '?' : '&';
        $returnQuery = http_build_query([
            'reference' => 'DEMO_' . $paymentId,
            'demo' => 'true',
            'course_id' => $data['course_id'],
        ], '', '&', PHP_QUERY_RFC3986);

        return [
            'success' => true,
            'authorization_url' => $returnUrl . $querySeparator . $returnQuery,
            'reference' => 'DEMO_' . $paymentId,
            'demo_mode' => true,
            'message' => 'Demo mode active - payment simulated'
        ];
    }
}
