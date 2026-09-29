<?php
/**
 * Example: Scholarship Application
 * Shows how to implement scholarship application system
 */

require_once(__DIR__ . '/../config/payment_config.php');
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../modules/scholarship_manager.php');

session_start();

$db = PaymentDB::getInstance()->getConnection();
$scholarshipManager = new ScholarshipManager($db);

// Get active scholarships
$scholarships = $scholarshipManager->getActiveScholarships();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $userId = $_SESSION['user_id'] ?? 1;
    
    $applicationData = [
        'user_id' => $userId,
        'scholarship_id' => $_POST['scholarship_id'],
        'course_id' => $_POST['course_id'] ?? null,
        'personal_statement' => $_POST['personal_statement'],
        'financial_need' => $_POST['financial_need'],
        'academic_info' => [
            'gpa' => $_POST['gpa'],
            'institution' => $_POST['institution'],
            'year' => $_POST['year']
        ],
        'achievements' => json_decode($_POST['achievements'] ?? '[]', true),
        'references' => [
            [
                'name' => $_POST['ref1_name'],
                'email' => $_POST['ref1_email'],
                'phone' => $_POST['ref1_phone']
            ]
        ],
        'documents' => [] // Handle file uploads separately
    ];
    
    $result = $scholarshipManager->submitApplication($applicationData);
    
    if ($result['success']) {
        $success = $result['message'];
    } else {
        $error = $result['message'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply for Scholarship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Scholarship Application</h2>
        
        <?php if (isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-md-4">
                <h4>Available Scholarships</h4>
                <?php foreach ($scholarships as $scholarship): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5><?php echo htmlspecialchars($scholarship['name']); ?></h5>
                        <p><?php echo htmlspecialchars($scholarship['description']); ?></p>
                        <p class="text-primary">
                            <strong>
                                <?php
                                if ($scholarship['type'] === 'percentage') {
                                    echo $scholarship['discount_percentage'] . '% Discount';
                                } else {
                                    echo 'Full Scholarship';
                                }
                                ?>
                            </strong>
                        </p>
                        <p class="text-muted small">
                            Deadline: <?php echo date('M d, Y', strtotime($scholarship['application_deadline'])); ?>
                        </p>
                        <p class="text-muted small">
                            Available Slots: <?php echo $scholarship['available_slots']; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select Scholarship *</label>
                                <select name="scholarship_id" class="form-select" required>
                                    <option value="">Choose a scholarship</option>
                                    <?php foreach ($scholarships as $s): ?>
                                    <option value="<?php echo $s['id']; ?>">
                                        <?php echo htmlspecialchars($s['name']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Personal Statement *</label>
                                <textarea name="personal_statement" class="form-control" rows="5" required
                                    placeholder="Tell us why you deserve this scholarship..."></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Financial Need</label>
                                <textarea name="financial_need" class="form-control" rows="3"
                                    placeholder="Explain your financial situation..."></textarea>
                            </div>
                            
                            <h5>Academic Information</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">GPA *</label>
                                    <input type="number" name="gpa" step="0.01" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Institution *</label>
                                    <input type="text" name="institution" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Current Year *</label>
                                    <select name="year" class="form-select" required>
                                        <option value="1">First Year</option>
                                        <option value="2">Second Year</option>
                                        <option value="3">Third Year</option>
                                        <option value="4">Fourth Year</option>
                                    </select>
                                </div>
                            </div>
                            
                            <h5>Reference</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="ref1_name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="ref1_email" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Phone *</label>
                                    <input type="tel" name="ref1_phone" class="form-control" required>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
