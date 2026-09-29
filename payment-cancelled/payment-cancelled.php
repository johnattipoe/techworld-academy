<?php
session_start();
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
                            <i class="bi bi-x-circle-fill text-warning" style="font-size: 5rem;"></i>
                        </div>
                        <h2 class="text-warning mb-3">Payment Cancelled</h2>
                        <p class="lead mb-4">
                            Your payment was cancelled. No charges were made.
                        </p>
                        
                        <?php if (isset($_SESSION['payment_error'])): ?>
                        <div class="alert alert-warning">
                            <?php 
                            echo htmlspecialchars($_SESSION['payment_error']);
                            unset($_SESSION['payment_error']);
                            ?>
                        </div>
                        <?php endif; ?>

                        <div class="d-grid gap-2 mt-4">
                            <a href="/Courses/courses.php" class="btn btn-primary btn-lg">
                                <i class="bi bi-arrow-left me-2"></i>Back to Courses
                            </a>
                            <a href="/contact/contact.php" class="btn btn-outline-secondary">
                                <i class="bi bi-headset me-2"></i>Contact Support
                            </a>
                        </div>

                        <hr class="my-4">

                        <p class="text-muted mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            Need help? Contact our support team for assistance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>
