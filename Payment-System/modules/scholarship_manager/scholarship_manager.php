<?php
/**
 * Scholarship Manager
 * Handles scholarship applications and awards
 */

require_once(dirname(__DIR__, 2) . '/config/database/database.php');

class ScholarshipManager {
    private PDO $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    /**
     * Create scholarship program
     */
    public function createProgram(array $data) {
        $sql = "INSERT INTO scholarships 
                (name, description, type, discount_percentage, discount_amount,
                 max_awards, available_slots, eligibility_criteria, requirements,
                 application_deadline, start_date, end_date, is_active, created_at)
                VALUES
                (:name, :description, :type, :discount_percentage, :discount_amount,
                 :max_awards, :available_slots, :eligibility_criteria, :requirements,
                 :application_deadline, :start_date, :end_date, :is_active, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':type' => $data['type'], // percentage, fixed, full
            ':discount_percentage' => $data['discount_percentage'] ?? null,
            ':discount_amount' => $data['discount_amount'] ?? null,
            ':max_awards' => $data['max_awards'],
            ':available_slots' => $data['max_awards'],
            ':eligibility_criteria' => json_encode($data['eligibility_criteria'] ?? []),
            ':requirements' => json_encode($data['requirements'] ?? []),
            ':application_deadline' => $data['application_deadline'],
            ':start_date' => $data['start_date'],
            ':end_date' => $data['end_date'],
            ':is_active' => $data['is_active'] ?? 1
        ]);
    }
    
    /**
     * Submit scholarship application
     */
    public function submitApplication(array $data) {
        // Check if already applied
        if ($this->hasApplied($data['user_id'], $data['scholarship_id'])) {
            return ['success' => false, 'message' => 'You have already applied for this scholarship'];
        }
        
        // Check available slots
        $scholarship = $this->getScholarship($data['scholarship_id']);
        if ($scholarship['available_slots'] <= 0) {
            return ['success' => false, 'message' => 'No slots available for this scholarship'];
        }
        
        // Check deadline
        if (strtotime($scholarship['application_deadline']) < time()) {
            return ['success' => false, 'message' => 'Application deadline has passed'];
        }
        
        $sql = "INSERT INTO scholarship_applications 
                (user_id, scholarship_id, course_id, personal_statement,
                 academic_info, financial_need, achievements, references,
                 documents, status, applied_date, created_at)
                VALUES
                (:user_id, :scholarship_id, :course_id, :personal_statement,
                 :academic_info, :financial_need, :achievements, :references,
                 :documents, 'pending', NOW(), NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([
            ':user_id' => $data['user_id'],
            ':scholarship_id' => $data['scholarship_id'],
            ':course_id' => $data['course_id'] ?? null,
            ':personal_statement' => $data['personal_statement'],
            ':academic_info' => json_encode($data['academic_info'] ?? []),
            ':financial_need' => $data['financial_need'] ?? '',
            ':achievements' => json_encode($data['achievements'] ?? []),
            ':references' => json_encode($data['references'] ?? []),
            ':documents' => json_encode($data['documents'] ?? [])
        ]);
        
        if ($result) {
            return [
                'success' => true,
                'message' => 'Application submitted successfully',
                'application_id' => $this->db->lastInsertId()
            ];
        }
        
        return ['success' => false, 'message' => 'Failed to submit application'];
    }
    
    /**
     * Review application
     */
    public function reviewApplication(int|string $applicationId, array $data) {
        $sql = "UPDATE scholarship_applications 
                SET status = :status,
                    reviewer_id = :reviewer_id,
                    review_notes = :review_notes,
                    score = :score,
                    reviewed_date = NOW()
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([
            ':status' => $data['status'], // approved, rejected, waitlist
            ':reviewer_id' => $data['reviewer_id'],
            ':review_notes' => $data['review_notes'] ?? '',
            ':score' => $data['score'] ?? null,
            ':id' => $applicationId
        ]);
        
        // If approved, award the scholarship
        if ($result && $data['status'] === 'approved') {
            $this->awardScholarship($applicationId);
        }
        
        return $result;
    }
    
    /**
     * Award scholarship to student
     */
    private function awardScholarship(int|string $applicationId) {
        $application = $this->getApplication($applicationId);
        $scholarship = $this->getScholarship($application['scholarship_id']);
        
        // Calculate discount amount
        if ($scholarship['type'] === 'percentage') {
            $discountAmount = ($scholarship['discount_percentage'] / 100) * $application['course_fee'];
        } elseif ($scholarship['type'] === 'fixed') {
            $discountAmount = $scholarship['discount_amount'];
        } else { // full scholarship
            $discountAmount = $application['course_fee'];
        }
        
        // Create award record
        $sql = "INSERT INTO scholarship_awards 
                (application_id, user_id, scholarship_id, course_id,
                 original_amount, discount_amount, final_amount,
                 award_date, valid_until, status, created_at)
                VALUES
                (:application_id, :user_id, :scholarship_id, :course_id,
                 :original_amount, :discount_amount, :final_amount,
                 NOW(), :valid_until, 'active', NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            ':application_id' => $applicationId,
            ':user_id' => $application['user_id'],
            ':scholarship_id' => $application['scholarship_id'],
            ':course_id' => $application['course_id'],
            ':original_amount' => $application['course_fee'],
            ':discount_amount' => $discountAmount,
            ':final_amount' => $application['course_fee'] - $discountAmount,
            ':valid_until' => $scholarship['end_date']
        ]);
        
        // Decrease available slots
        $this->decreaseSlots($application['scholarship_id']);
        
        // Send notification
        $this->sendAwardNotification($application['user_id'], $scholarship['name']);
        
        return true;
    }
    
    /**
     * Get scholarship details
     */
    public function getScholarship(int|string $scholarshipId) {
        $sql = "SELECT * FROM scholarships WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $scholarshipId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get application details
     */
    public function getApplication(int|string $applicationId) {
        $sql = "SELECT sa.*, c.fee as course_fee
                FROM scholarship_applications sa
                LEFT JOIN courses c ON sa.course_id = c.id
                WHERE sa.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $applicationId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Check if user has applied
     */
    private function hasApplied(int|string $userId, int|string $scholarshipId) {
        $sql = "SELECT COUNT(*) as count FROM scholarship_applications 
                WHERE user_id = :user_id AND scholarship_id = :scholarship_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':scholarship_id' => $scholarshipId
        ]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
    
    /**
     * Decrease available slots
     */
    private function decreaseSlots(int|string $scholarshipId) {
        $sql = "UPDATE scholarships 
                SET available_slots = available_slots - 1 
                WHERE id = :id AND available_slots > 0";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $scholarshipId]);
    }
    
    /**
     * Get user's applications
     */
    public function getUserApplications(int|string $userId) {
        $sql = "SELECT sa.*, s.name as scholarship_name, s.type, s.discount_percentage
                FROM scholarship_applications sa
                JOIN scholarships s ON sa.scholarship_id = s.id
                WHERE sa.user_id = :user_id
                ORDER BY sa.created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get user's awards
     */
    public function getUserAwards(int|string $userId) {
        $sql = "SELECT sw.*, s.name as scholarship_name
                FROM scholarship_awards sw
                JOIN scholarships s ON sw.scholarship_id = s.id
                WHERE sw.user_id = :user_id AND sw.status = 'active'
                ORDER BY sw.award_date DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get active scholarships
     */
    public function getActiveScholarships() {
        $sql = "SELECT * FROM scholarships 
                WHERE is_active = 1 
                AND available_slots > 0 
                AND application_deadline >= CURDATE()
                ORDER BY application_deadline ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get pending applications
     */
    public function getPendingApplications() {
        $sql = "SELECT sa.*, s.name as scholarship_name, u.name as applicant_name, u.email
                FROM scholarship_applications sa
                JOIN scholarships s ON sa.scholarship_id = s.id
                JOIN users u ON sa.user_id = u.id
                WHERE sa.status = 'pending'
                ORDER BY sa.applied_date ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Send award notification
     */
    private function sendAwardNotification(int|string $userId, string $scholarshipName) {
        // Implementation depends on your notification system
        // This could send email, SMS, or in-app notification
        return true;
    }
    
    /**
     * Calculate scholarship discount for user
     */
    public function calculateDiscount(int|string $userId, int|string $courseId, int|float|string $originalAmount) {
        $sql = "SELECT sw.*, s.type, s.discount_percentage, s.discount_amount
                FROM scholarship_awards sw
                JOIN scholarships s ON sw.scholarship_id = s.id
                WHERE sw.user_id = :user_id 
                AND (sw.course_id = :course_id OR sw.course_id IS NULL)
                AND sw.status = 'active'
                AND sw.valid_until >= CURDATE()
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':course_id' => $courseId
        ]);
        
        $award = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$award) {
            return [
                'has_scholarship' => false,
                'discount_amount' => 0,
                'final_amount' => $originalAmount
            ];
        }
        
        $discountAmount = 0;
        
        if ($award['type'] === 'percentage') {
            $discountAmount = ($award['discount_percentage'] / 100) * $originalAmount;
        } elseif ($award['type'] === 'fixed') {
            $discountAmount = min($award['discount_amount'], $originalAmount);
        } else { // full
            $discountAmount = $originalAmount;
        }
        
        return [
            'has_scholarship' => true,
            'scholarship_name' => $award['scholarship_name'] ?? 'Scholarship',
            'discount_amount' => $discountAmount,
            'final_amount' => max(0, $originalAmount - $discountAmount)
        ];
    }
}
