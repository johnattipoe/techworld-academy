<?php
session_start();
require_once(__DIR__ . '/../Database/db/db.php');

// Get course ID from session or query parameter
$courseId = $_GET['course_id'] ?? $_SESSION['enrolled_course_id'] ?? null;

// If we have a course ID, redirect directly to course player
if ($courseId) {
    header('Location: /lms-dashboard/course-player/course-player.php?course_id=' . rawurlencode((string)$courseId));
    exit;
}

// If no course ID, show success page
$courseName = null;

if ($courseId) {
    $conn = get_db();
    $stmt = $conn->prepare("SELECT title FROM courses WHERE id = ?");
    $stmt->execute([$courseId]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
    $courseName = $course['title'] ?? 'Your Course';
}

include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h2 class="text-success mb-3">Payment Successful!</h2>
                        <p class="lead mb-4">
                            Your enrollment has been confirmed. Welcome to TecWorld Academy!
                        </p>
                        
                        <?php if (isset($_SESSION['payment_success'])): ?>
                        <div class="alert alert-success">
                            <?php 
                            echo htmlspecialchars($_SESSION['payment_message']);
                            unset($_SESSION['payment_success']);
                            unset($_SESSION['payment_message']);
                            ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($courseName): ?>
                        <div class="alert alert-info">
                            <i class="bi bi-book-fill me-2"></i>
                            You are now enrolled in: <strong><?php echo htmlspecialchars($courseName); ?></strong>
                        </div>
                        <?php endif; ?>

                        <div class="d-grid gap-2 mt-4">
                            <?php if ($courseId): ?>
                            <a href="/lms-dashboard/course-player/course-player.php?course_id=<?php echo $courseId; ?>" class="btn btn-success btn-lg">
                                <i class="bi bi-play-circle-fill me-2"></i>Start Learning Now
                            </a>
                            <?php endif; ?>
                            
                            <a href="/lms-dashboard/lms_dashboard/lms_dashboard.php" class="btn btn-primary btn-lg">
                                <i class="bi bi-speedometer2 me-2"></i>Go to My Dashboard
                            </a>
                            
                            <a href="/lms-dashboard/courses/courses.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Browse More Courses
                            </a>
                        </div>

                        <hr class="my-4">

                        <div class="row text-start">
                            <div class="col-12">
                                <h6 class="fw-bold mb-3">What's Next?</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        Access your course materials instantly
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        Download resources and assignments
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        Connect with instructors and peers
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        Track your progress and earn certificates
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <hr class="my-4">

                        <p class="text-muted mb-0">
                            <i class="bi bi-envelope me-2"></i>
                            A confirmation email has been sent to your registered email address.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>
