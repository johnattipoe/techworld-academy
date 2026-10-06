<?php
/**
 * Installment Plan Manager
 * Handles payment plans and installments
 */

require_once(dirname(__DIR__, 2) . '/config/database/database.php');

class InstallmentManager {
    private PDO $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    /**
     * Create installment plan
     */
    public function createPlan(array $data) {
        $sql = "INSERT INTO installment_plans 
                (course_id, plan_name, total_amount, down_payment, 
                 number_of_installments, installment_amount, interval_type, 
                 interval_value, description, is_active, created_at) 
                VALUES 
                (:course_id, :plan_name, :total_amount, :down_payment,
                 :number_of_installments, :installment_amount, :interval_type,
                 :interval_value, :description, :is_active, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':course_id' => $data['course_id'],
            ':plan_name' => $data['plan_name'],
            ':total_amount' => $data['total_amount'],
            ':down_payment' => $data['down_payment'] ?? 0,
            ':number_of_installments' => $data['number_of_installments'],
            ':installment_amount' => $data['installment_amount'],
            // The database enum stores singular values: week, month, quarter, year.
            ':interval_type' => $data['interval_type'] ?? 'month',
            ':interval_value' => $data['interval_value'] ?? 1,
            ':description' => $data['description'] ?? '',
            ':is_active' => $data['is_active'] ?? 1
        ]);
    }
    
    /**
     * Subscribe user to installment plan
     */
    public function subscribeToInstallment(array $data) {
        // Calculate installment schedule
        $schedule = $this->calculateSchedule($data);
        
        // Create subscription
        $sql = "INSERT INTO user_installments 
                (user_id, plan_id, total_amount, paid_amount, remaining_amount,
                 down_payment_paid, status, next_payment_date, created_at)
                VALUES
                (:user_id, :plan_id, :total_amount, :paid_amount, :remaining_amount,
                 :down_payment_paid, :status, :next_payment_date, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':plan_id' => $data['plan_id'],
            ':total_amount' => $schedule['total_amount'],
            ':paid_amount' => $data['down_payment'] ?? 0,
            ':remaining_amount' => $schedule['total_amount'] - ($data['down_payment'] ?? 0),
            ':down_payment_paid' => isset($data['down_payment']) ? 1 : 0,
            ':status' => 'active',
            ':next_payment_date' => $schedule['next_payment_date']
        ]);
        
        $installmentId = $this->db->lastInsertId();
        
        // Create individual payment schedules
        foreach ($schedule['payments'] as $payment) {
            $this->createPaymentSchedule($installmentId, $payment);
        }
        
        return $installmentId;
    }
    
    /**
     * Calculate installment schedule
     */
    private function calculateSchedule(array $data) {
        $plan = $this->getPlan($data['plan_id']);
        
        $downPayment = $data['down_payment'] ?? 0;
        $remainingAmount = $plan['total_amount'] - $downPayment;
        $installmentAmount = $plan['installment_amount'];
        $numberOfInstallments = $plan['number_of_installments'];
        
        $payments = [];
        $currentDate = new DateTime();
        
        // Skip to next month if down payment is made
        if ($downPayment > 0) {
            $currentDate->modify('+1 ' . $plan['interval_type']);
        }
        
        for ($i = 1; $i <= $numberOfInstallments; $i++) {
            $payments[] = [
                'installment_number' => $i,
                'amount' => $installmentAmount,
                'due_date' => $currentDate->format('Y-m-d'),
                'status' => 'pending'
            ];
            
            $currentDate->modify('+' . $plan['interval_value'] . ' ' . $plan['interval_type']);
        }
        
        return [
            'total_amount' => $plan['total_amount'],
            'down_payment' => $downPayment,
            'remaining_amount' => $remainingAmount,
            'next_payment_date' => $payments[0]['due_date'] ?? null,
            'payments' => $payments
        ];
    }
    
    /**
     * Create payment schedule entry
     */
    private function createPaymentSchedule(int|string $installmentId, array $payment) {
        $sql = "INSERT INTO installment_schedule 
                (installment_id, installment_number, amount, due_date, status, created_at)
                VALUES
                (:installment_id, :installment_number, :amount, :due_date, :status, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':installment_id' => $installmentId,
            ':installment_number' => $payment['installment_number'],
            ':amount' => $payment['amount'],
            ':due_date' => $payment['due_date'],
            ':status' => $payment['status']
        ]);
    }
    
    /**
     * Process installment payment
     */
    public function processPayment(array $data) {
        // Get schedule entry
        $schedule = $this->getScheduleEntry($data['schedule_id']);
        
        if (!$schedule || $schedule['status'] === 'paid') {
            return ['success' => false, 'message' => 'Invalid or already paid installment'];
        }
        
        // Update schedule status
        $sql = "UPDATE installment_schedule 
                SET status = 'paid', paid_date = NOW(), payment_reference = :payment_reference
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':payment_reference' => $data['payment_reference'],
            ':id' => $data['schedule_id']
        ]);
        
        // Update user installment
        $this->updateUserInstallment($schedule['installment_id'], $schedule['amount']);
        
        return ['success' => true, 'message' => 'Payment processed successfully'];
    }
    
    /**
     * Update user installment after payment
     */
    private function updateUserInstallment(int|string $installmentId, int|float|string $amount) {
        // Get current installment
        $sql = "SELECT * FROM user_installments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $installmentId]);
        $installment = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $paidAmount = $installment['paid_amount'] + $amount;
        $remainingAmount = $installment['total_amount'] - $paidAmount;
        
        // Check if completed
        $status = $remainingAmount <= 0 ? 'completed' : 'active';
        
        // Get next payment date
        $nextPaymentDate = $this->getNextPaymentDate($installmentId);
        
        // Update
        $sql = "UPDATE user_installments 
                SET paid_amount = :paid_amount, 
                    remaining_amount = :remaining_amount,
                    status = :status,
                    next_payment_date = :next_payment_date,
                    completed_date = :completed_date
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':paid_amount' => $paidAmount,
            ':remaining_amount' => max(0, $remainingAmount),
            ':status' => $status,
            ':next_payment_date' => $nextPaymentDate,
            ':completed_date' => $status === 'completed' ? date('Y-m-d H:i:s') : null,
            ':id' => $installmentId
        ]);
    }
    
    /**
     * Get next payment date
     */
    private function getNextPaymentDate(int|string $installmentId) {
        $sql = "SELECT due_date FROM installment_schedule 
                WHERE installment_id = :installment_id AND status = 'pending'
                ORDER BY due_date ASC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':installment_id' => $installmentId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['due_date'] ?? null;
    }
    
    /**
     * Get plan details
     */
    public function getPlan(int|string $planId) {
        $sql = "SELECT * FROM installment_plans WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $planId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get schedule entry
     */
    private function getScheduleEntry(int|string $scheduleId) {
        $sql = "SELECT * FROM installment_schedule WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $scheduleId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get user's active installments
     */
    public function getUserInstallments(int|string $userId) {
        $sql = "SELECT ui.*, ip.plan_name, ip.course_id 
                FROM user_installments ui
                JOIN installment_plans ip ON ui.plan_id = ip.id
                WHERE ui.user_id = :user_id
                ORDER BY ui.created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get pending payments for user
     */
    public function getPendingPayments(int|string $userId) {
        $sql = "SELECT iss.*, ui.user_id, ip.plan_name
                FROM installment_schedule iss
                JOIN user_installments ui ON iss.installment_id = ui.id
                JOIN installment_plans ip ON ui.plan_id = ip.id
                WHERE ui.user_id = :user_id AND iss.status = 'pending'
                ORDER BY iss.due_date ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get overdue payments
     */
    public function getOverduePayments() {
        $sql = "SELECT iss.*, ui.user_id, ui.plan_id
                FROM installment_schedule iss
                JOIN user_installments ui ON iss.installment_id = ui.id
                WHERE iss.status = 'pending' AND iss.due_date < CURDATE()
                ORDER BY iss.due_date ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
