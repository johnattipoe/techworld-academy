<?php
/**
 * Example: Course Payment Process
 * This file shows how to integrate the payment system for course enrollment
 */

require_once(__DIR__ . '/../config/payment_config.php');
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../modules/payment_manager.php');

session_start();

// Get database connection
$db = PaymentDB::getInstance()->getConnection();

// Initialize Payment Manager
$paymentManager = new PaymentManager($db);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $userId = $_SESSION['user_id'] ?? 1; // Get from session
    $courseId = $_POST['course_id'];
    $amount = $_POST['amount'];
    $email = $_POST['email'];
    $gateway = $_POST['gateway'] ?? 'paystack'; // paystack, stripe, or paypal
    
    // Check if user selected installment plan
    $installmentPlanId = $_POST['installment_plan_id'] ?? null;
    $downPayment = $_POST['down_payment'] ?? null;
    
    try {
        // Set gateway
        $paymentManager->setGateway($gateway);
        
        // Prepare payment data
        $paymentData = [
            'user_id' => $userId,
            'course_id' => $courseId,
            'amount' => $amount,
            'email' => $email,
            'currency' => 'GHS',
            'callback_url' => PAYMENT_CONFIG['callback_url'],
            'return_url' => PAYMENT_CONFIG['success_url'],
            'cancel_url' => PAYMENT_CONFIG['cancel_url'],
            'description' => 'Course Enrollment Payment'
        ];
        
        // Add installment data if selected
        if ($installmentPlanId) {
            $paymentData['installment_plan_id'] = $installmentPlanId;
            $paymentData['down_payment'] = $downPayment;
        }
        
        // Process payment
        $result = $paymentManager->processCoursePayment($paymentData);
        
        if ($result['success']) {
            // Redirect to payment gateway
            if ($gateway === 'paystack') {
                header('Location: ' . $result['authorization_url']);
                exit;
            } elseif ($gateway === 'paypal') {
                header('Location: ' . $result['approval_url']);
                exit;
            } elseif ($gateway === 'stripe') {
                // For Stripe, you'll need to use Stripe.js on frontend
                $_SESSION['payment_intent'] = $result['client_secret'];
                header('Location: stripe-checkout.php');
                exit;
            }
        } else {
            $error = $result['message'];
        }
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Complete Your Enrollment</h3>
                    </div>
                    <div class="card-body">
                        
                        <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <input type="hidden" name="course_id" value="1">
                            <input type="hidden" name="amount" value="1500">
                            
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Payment Gateway</label>
                                <select name="gateway" class="form-select" required>
                                    <option value="paystack">Paystack (Ghana)</option>
                                    <option value="stripe">Stripe (International)</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Payment Option</label>
                                <select name="payment_option" class="form-select" id="paymentOption">
                                    <option value="full">Pay Full Amount (₵1,500)</option>
                                    <option value="installment">Pay in Installments</option>
                                </select>
                            </div>
                            
                            <div id="installmentOptions" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Select Plan</label>
                                    <select name="installment_plan_id" class="form-select">
                                        <option value="1">3 Months - ₵400/month (₵300 down payment)</option>
                                        <option value="2">6 Months - ₵220/month (₵180 down payment)</option>
                                    </select>
                                </div>
                                <input type="hidden" name="down_payment" value="300">
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Proceed to Payment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('paymentOption').addEventListener('change', function() {
            document.getElementById('installmentOptions').style.display = 
                this.value === 'installment' ? 'block' : 'none';
        });
    </script>
</body>
</html>
