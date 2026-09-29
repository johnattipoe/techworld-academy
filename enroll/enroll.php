<?php
session_start();
require_once(__DIR__ . '/../config/env/env.php');
require_once(__DIR__ . '/../Database/db/db.php');
require_once(__DIR__ . '/../Payment-System/config/payment_config/payment_config.php');
require_once(__DIR__ . '/../Payment-System/config/database/database.php');
require_once(__DIR__ . '/../Payment-System/modules/payment_manager/payment_manager.php');

// Load environment variables
EnvLoader::load();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /authenication/login/login.php?redirect=enroll.php');
    exit;
}

$userId = $_SESSION['user_id'];
$courseId = $_GET['course_id'] ?? null;

if (!$courseId) {
    header('Location: /lms-dashboard/courses/courses.php');
    exit;
}

// Get database connection from db.php
$conn = get_db();

// Fetch course details
try {
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->execute([$courseId]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$course) {
        header('Location: lms-dashboard/courses.php');
        exit;
    }
    
    // Map database course prices based on course IDs
    // These match the LMS dashboard course prices
    $coursePrices = [
        1 => 49.99,   // Web Development Bootcamp
        2 => 59.99,   // Data Science with Python
        3 => 69.99,   // Machine Learning A-Z
        4 => 44.99,   // Cybersecurity Fundamentals
        5 => 54.99,   // Mobile App Development
        6 => 64.99,   // Cloud Computing with AWS
        7 => 49.99,   // UI/UX Design Masterclass
        8 => 39.99,   // Digital Marketing Complete
        9 => 74.99,   // Blockchain Development
        10 => 59.99,  // Full Stack JavaScript
        11 => 44.99,  // Python Programming Complete
        12 => 69.99   // DevOps Engineering
    ];
    
    // Set price - convert to GHS (1 USD = 12 GHS approximately)
    $usdPrice = $coursePrices[$courseId] ?? 49.99;
    $course['price'] = $usdPrice * 12; // Convert to GHS
    $course['price_usd'] = $usdPrice;
    
    // Map title to name for compatibility
    if (!isset($course['name']) && isset($course['title'])) {
        $course['name'] = $course['title'];
    }
    
    // Store course details for display
    $course['display_price'] = number_format($course['price'], 2);
    $course['display_price_usd'] = number_format($usdPrice, 2);
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Get user details
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Get installment plans for this course
$paymentDb = PaymentDB::getInstance()->getConnection();
$stmt = $paymentDb->prepare("SELECT * FROM installment_plans WHERE course_id = ? AND is_active = 1");
$stmt->execute([$courseId]);
$installmentPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get active scholarships
$stmt = $paymentDb->prepare("SELECT * FROM scholarships WHERE is_active = 1 AND application_deadline >= CURDATE()");
$stmt->execute();
$scholarships = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle payment submission
$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentManager = new PaymentManager($paymentDb);
    
    $gateway = $_POST['gateway'] ?? 'paystack';
    $paymentOption = $_POST['payment_option'] ?? 'full';
    $email = $_POST['email'] ?? $user['email']; // Use form email or user's email
    
    try {
        $paymentManager->setGateway($gateway);
        
        $paymentData = [
            'user_id' => $userId,
            'course_id' => $courseId,
            'amount' => $_POST['amount'] ?? $course['price'], // Use form amount or course price
            'email' => $email,
            'currency' => env('PAYMENT_CURRENCY', 'GHS'),
            'callback_url' => env('APP_URL') . '/Payment-System/examples/payment-callback.php',
            'return_url' => '/payment-success/payment-success.php',
            'cancel_url' => env('APP_URL') . '/payment-cancelled.php',
            'description' => 'Enrollment: ' . $course['name']
        ];
        
        // Add installment data if selected
        if ($paymentOption === 'installment' && isset($_POST['installment_plan_id'])) {
            $planId = $_POST['installment_plan_id'];
            $stmt = $paymentDb->prepare("SELECT * FROM installment_plans WHERE id = ?");
            $stmt->execute([$planId]);
            $plan = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($plan) {
                $paymentData['installment_plan_id'] = $planId;
                $paymentData['amount'] = $plan['down_payment'] > 0 ? $plan['down_payment'] : $plan['installment_amount'];
            }
        }
        
        $result = $paymentManager->processCoursePayment($paymentData);
        
        if ($result['success']) {
            // Store course ID in session for success page
            $_SESSION['enrolled_course_id'] = $courseId;
            $_SESSION['payment_success'] = true;
            $_SESSION['payment_message'] = 'Payment completed successfully! You can now start learning.';
            
            // In demo mode, redirect directly
            if (isset($result['demo_mode']) && $result['demo_mode'] === true) {
                header('Location: ' . $result['authorization_url']);
                exit;
            }
            
            // Redirect to payment gateway
            if ($gateway === 'paystack' && isset($result['authorization_url'])) {
                header('Location: ' . $result['authorization_url']);
                exit;
            } elseif ($gateway === 'paypal' && isset($result['approval_url'])) {
                header('Location: ' . $result['approval_url']);
                exit;
            } elseif ($gateway === 'stripe' && isset($result['client_secret'])) {
                $_SESSION['stripe_client_secret'] = $result['client_secret'];
                $_SESSION['payment_amount'] = $paymentData['amount'];
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

include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Course Details -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <img src="/assets/campus/computer%20lab.jpeg" 
                         class="card-img-top" alt="<?php echo htmlspecialchars($course['name']); ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars($course['name']); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($course['description'] ?? ''); ?></p>
                        
                        <!-- Course Information -->
                        <div class="small text-muted mb-3">
                            <p class="mb-1"><i class="bi bi-tag-fill me-2"></i><?php echo htmlspecialchars($course['category'] ?? 'General'); ?></p>
                            <p class="mb-1"><i class="bi bi-person-fill me-2"></i><?php echo htmlspecialchars($course['instructor_id'] ?? 'Instructor'); ?></p>
                        </div>
                        
                        <hr>
                        <div class="text-center">
                            <h3 class="text-success mb-0">GH₵ <?php echo number_format($course['price'], 2); ?></h3>
                            <p class="text-muted small">≈ $<?php echo $course['display_price_usd']; ?> USD</p>
                            <p class="text-muted small mb-0">Course Fee</p>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Breakdown Card -->
                <div class="card shadow mt-3">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0"><i class="bi bi-receipt me-2"></i>Payment Summary</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Course Fee:</span>
                            <strong>GH₵ <?php echo number_format($course['price'], 2); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount:</span>
                            <strong class="text-success">GH₵ 0.00</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total Amount:</strong>
                            <strong class="text-primary h5">GH₵ <?php echo number_format($course['price'], 2); ?></strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="bi bi-credit-card me-2"></i>Complete Your Enrollment</h4>
                    </div>
                    <div class="card-body">
                        
                        <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <form method="POST" id="enrollmentForm">
                            
                            <!-- Payment Gateway Selection -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-wallet2 me-2"></i>Select Payment Gateway
                                </label>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-check card p-3 h-100">
                                            <input class="form-check-input" type="radio" name="gateway" 
                                                   value="paystack" id="paystack" checked>
                                            <label class="form-check-label w-100" for="paystack">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <strong class="d-block">Paystack</strong>
                                                        <small class="text-muted">Ghana's #1 Payment</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check card p-3 h-100">
                                            <input class="form-check-input" type="radio" name="gateway" 
                                                   value="stripe" id="stripe">
                                            <label class="form-check-label w-100" for="stripe">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <strong class="d-block">Stripe</strong>
                                                        <small class="text-muted">International Cards</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check card p-3 h-100">
                                            <input class="form-check-input" type="radio" name="gateway" 
                                                   value="paypal" id="paypal">
                                            <label class="form-check-label w-100" for="paypal">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <strong class="d-block">PayPal</strong>
                                                        <small class="text-muted">Global Payment</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Option -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-calendar-check me-2"></i>Payment Option
                                </label>
                                <select name="payment_option" class="form-select" id="paymentOption">
                                    <option value="full">Pay Full Amount (GH₵ <?php echo number_format($course['price'], 2); ?>)</option>
                                    <?php if (!empty($installmentPlans)): ?>
                                        <option value="installment">Pay in Installments</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- Installment Plans (Hidden by default) -->
                            <?php if (!empty($installmentPlans)): ?>
                            <div id="installmentSection" style="display: none;" class="mb-4">
                                <label class="form-label fw-bold">Select Installment Plan</label>
                                <?php foreach ($installmentPlans as $plan): ?>
                                <div class="form-check card p-3 mb-2">
                                    <input class="form-check-input" type="radio" name="installment_plan_id" 
                                           value="<?php echo $plan['id']; ?>" id="plan<?php echo $plan['id']; ?>">
                                    <label class="form-check-label w-100" for="plan<?php echo $plan['id']; ?>">
                                        <strong><?php echo htmlspecialchars($plan['plan_name']); ?></strong>
                                        <div class="small text-muted">
                                            <?php echo $plan['number_of_installments']; ?> payments of 
                                            GH₵ <?php echo number_format($plan['installment_amount'], 2); ?>
                                            <?php if ($plan['down_payment'] > 0): ?>
                                                <br>Down Payment: GH₵ <?php echo number_format($plan['down_payment'], 2); ?>
                                            <?php endif; ?>
                                        </div>
                                    </label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>

                            <!-- Scholarship Information -->
                            <?php if (!empty($scholarships)): ?>
                            <div class="alert alert-info">
                                <i class="bi bi-award me-2"></i>
                                <strong>Scholarships Available!</strong>
                                <a href="/Payment-System/examples/scholarship-application/scholarship-application.php" class="alert-link">Apply here</a>
                                to reduce your tuition fees.
                            </div>
                            <?php endif; ?>

                            <hr>

                            <!-- Total Summary -->
                            <div class="row mb-4">
                                <div class="col-6">
                                    <h5>Total Amount:</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <h5 class="text-success" id="totalAmount">
                                        GH₵ <?php echo number_format($course['price'], 2); ?>
                                    </h5>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-lock-fill me-2"></i>Proceed to Secure Payment
                            </button>

                            <p class="text-center text-muted small mt-3 mb-0">
                                <i class="bi bi-shield-check me-1"></i>
                                Your payment information is secure and encrypted
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('paymentOption').addEventListener('change', function() {
    const installmentSection = document.getElementById('installmentSection');
    installmentSection.style.display = this.value === 'installment' ? 'block' : 'none';
});
</script>

<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>
