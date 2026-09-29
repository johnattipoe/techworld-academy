<?php
session_start();
require_once(__DIR__ . '/..\..\..\..\Database\db\db.php');

if(!isset($_SESSION['username'])){
  $_SESSION['username'] = "Student";
}

if(!isset($_SESSION['user_id'])){
  header("Location: ../../../authenication/login.php");
  exit();
}

$conn = get_db();
$user_id = $_SESSION['user_id'];

// Fetch saved courses
try {
    $stmt = $conn->prepare("
        SELECT 
            sc.id as saved_id,
            sc.saved_at,
            c.id as course_id,
            c.title,
            c.description,
            c.thumbnail,
            c.price,
            c.level,
            c.duration,
            u.full_name as instructor,
            cat.name as category,
            COUNT(DISTINCT e.id) as students,
            COALESCE(AVG(r.rating), 0) as rating,
            COUNT(DISTINCT cm.id) as modules_count,
            EXISTS(
                SELECT 1 FROM enrollments 
                WHERE course_id = c.id AND user_id = :user_id
            ) as is_enrolled
        FROM saved_courses sc
        INNER JOIN courses c ON sc.course_id = c.id
        LEFT JOIN users u ON c.instructor_id = u.id
        LEFT JOIN categories cat ON c.category_id = cat.id
        LEFT JOIN enrollments e ON c.id = e.course_id
        LEFT JOIN reviews r ON c.id = r.course_id
        LEFT JOIN course_modules cm ON c.id = cm.course_id
        WHERE sc.user_id = :user_id
        GROUP BY c.id, sc.id
        ORDER BY sc.saved_at DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $savedCourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    error_log("Saved courses fetch error: " . $e->getMessage());
    $savedCourses = array();
}

$totalSaved = count($savedCourses);

include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');

?>

<div class="container-fluid py-4">
  <!-- Page Header -->
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-heart-fill text-danger"></i> Saved Courses</h2>
      <p class="text-white-50">Courses you've bookmarked for later</p>
    </div>
    <div class="col-md-4 text-end">
      <span class="badge bg-primary" style="font-size: 1.1rem;">
        <?php echo $totalSaved; ?> Course<?php echo $totalSaved != 1 ? 's' : ''; ?> Saved
      </span>
    </div>
  </div>

  <!-- Statistics Card -->
  <div class="row mb-4">
    <div class="col-12" data-aos="fade-up">
      <div class="card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-white">
          <div class="row text-center">
            <div class="col-md-4">
              <i class="bi bi-heart-fill" style="font-size: 2rem;"></i>
              <h3 class="mt-2 mb-0"><?php echo $totalSaved; ?></h3>
              <p class="mb-0">Total Saved</p>
            </div>
            <div class="col-md-4">
              <i class="bi bi-check-circle-fill" style="font-size: 2rem;"></i>
              <h3 class="mt-2 mb-0">
                <?php echo count(array_filter($savedCourses, function($c) { return $c['is_enrolled']; })); ?>
              </h3>
              <p class="mb-0">Already Enrolled</p>
            </div>
            <div class="col-md-4">
              <i class="bi bi-bookmark-fill" style="font-size: 2rem;"></i>
              <h3 class="mt-2 mb-0">
                <?php echo count(array_filter($savedCourses, function($c) { return !$c['is_enrolled']; })); ?>
              </h3>
              <p class="mb-0">To Enroll</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Saved Courses Grid -->
  <div class="row">
    <?php if($totalSaved > 0): ?>
      <?php foreach($savedCourses as $index => $course): ?>
      <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
        <div class="card h-100 shadow-sm hover-shadow">
          <!-- Course Image -->
          <div class="position-relative">
            <?php if(!empty($course['thumbnail'])): ?>
              <img src="../../../assets/courses/<?php echo htmlspecialchars($course['thumbnail']); ?>" class="card-img-top" style="height: 180px; object-fit: cover;" alt="<?php echo htmlspecialchars($course['title']); ?>">
            <?php else: ?>
              <div class="card-img-top" style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex align-items-center justify-content-center h-100">
                  <i class="bi bi-play-circle-fill text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if($course['is_enrolled']): ?>
              <span class="position-absolute top-0 start-0 m-2 badge bg-success">Enrolled</span>
            <?php endif; ?>
            
            <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark"><?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?></span>
            
            <button class="btn btn-danger btn-sm position-absolute bottom-0 end-0 m-2 rounded-circle remove-saved" 
                    data-saved-id="<?php echo $course['saved_id']; ?>"
                    data-course-title="<?php echo htmlspecialchars($course['title']); ?>"
                    style="width: 40px; height: 40px;">
              <i class="bi bi-heart-fill"></i>
            </button>
          </div>

          <div class="card-body">
            <!-- Category Badge -->
            <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category'] ?? 'General'); ?></span>

            <!-- Course Title -->
            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($course['title']); ?></h5>

            <!-- Instructor -->
            <p class="text-muted small mb-2">
              <i class="bi bi-person"></i> <?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>
            </p>

            <!-- Rating -->
            <div class="d-flex align-items-center mb-2">
              <span class="text-warning me-1">
                <?php 
                $fullStars = floor($course['rating']);
                $halfStar = ($course['rating'] - $fullStars) >= 0.5;
                for($i=0; $i < $fullStars; $i++): ?>
                  <i class="bi bi-star-fill"></i>
                <?php endfor; 
                if($halfStar): ?>
                  <i class="bi bi-star-half"></i>
                <?php endif;
                for($i=0; $i < (5 - ceil($course['rating'])); $i++): ?>
                  <i class="bi bi-star"></i>
                <?php endfor; ?>
              </span>
              <span class="fw-bold me-1"><?php echo number_format($course['rating'], 1); ?></span>
              <span class="text-muted small">(<?php echo number_format($course['students']); ?> students)</span>
            </div>

            <!-- Course Info -->
            <div class="d-flex justify-content-between small text-muted mb-3">
              <span><i class="bi bi-clock"></i> <?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?></span>
              <span><i class="bi bi-book"></i> <?php echo $course['modules_count']; ?> modules</span>
              <span><i class="bi bi-bar-chart"></i> <?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?></span>
            </div>

            <!-- Description -->
            <p class="small text-muted mb-3"><?php echo htmlspecialchars(substr($course['description'], 0, 100)); ?>...</p>

            <hr>

            <!-- Price & Action -->
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <span class="h4 fw-bold text-primary mb-0">$<?php echo number_format($course['price'] ?? 0, 2); ?></span>
              </div>
              <?php if($course['is_enrolled']): ?>
                <a href="../../course-player.php?course_id=<?php echo $course['course_id']; ?>" class="btn btn-success btn-sm">
                  <i class="bi bi-play-circle"></i> Continue Learning
                </a>
              <?php else: ?>
                <button type="button" class="btn btn-primary btn-sm enroll-btn" 
                        data-bs-toggle="modal" 
                        data-bs-target="#enrollModal"
                        data-course-id="<?php echo $course['course_id']; ?>"
                        data-course-title="<?php echo htmlspecialchars($course['title']); ?>"
                        data-course-price="<?php echo $course['price'] ?? 0; ?>"
                        data-course-instructor="<?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>"
                        data-course-category="<?php echo htmlspecialchars($course['category'] ?? 'General'); ?>"
                        data-course-description="<?php echo htmlspecialchars($course['description']); ?>"
                        data-course-level="<?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?>"
                        data-course-duration="<?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?>">
                  <i class="bi bi-cart-plus"></i> Enroll
                </button>
              <?php endif; ?>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="card-footer bg-light">
            <div class="d-flex justify-content-between align-items-center small">
              <span class="text-muted"><i class="bi bi-bookmark-fill"></i> Saved <?php echo date('M d, Y', strtotime($course['saved_at'])); ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="card bg-light text-center py-5" data-aos="fade-up">
          <div class="card-body">
            <i class="bi bi-heart text-muted" style="font-size: 5rem;"></i>
            <h4 class="mt-3 text-muted">No Saved Courses Yet</h4>
            <p class="text-muted">Browse courses and click the heart icon to save them for later!</p>
            <a href="/Courses/courses.php" class="btn btn-primary mt-3">
              <i class="bi bi-search"></i> Browse Courses
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Enrollment Modal (same as courses.php) -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="enrollModalLabel">
          <i class="bi bi-credit-card me-2"></i>Complete Your Enrollment
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 mb-3">
            <div class="card bg-light h-100">
              <div class="card-body">
                <h5 class="card-title" id="modalCourseTitle">Course Name</h5>
                <p class="text-muted small mb-2">
                  <i class="bi bi-person-fill me-1"></i><span id="modalCourseInstructor">Instructor</span>
                </p>
                <p class="text-muted small mb-2">
                  <i class="bi bi-tag-fill me-1"></i><span id="modalCourseCategory">Category</span>
                </p>
                <p class="text-muted small mb-2">
                  <i class="bi bi-clock-fill me-1"></i><span id="modalCourseDuration">Duration</span>
                </p>
                <p class="text-muted small mb-3">
                  <i class="bi bi-bar-chart-fill me-1"></i><span id="modalCourseLevel">Level</span>
                </p>
                <p class="small mb-3" id="modalCourseDescription">Course description</p>
                <hr>
                <div class="text-center">
                  <h3 class="text-success mb-0" id="modalCoursePrice">$0.00</h3>
                  <p class="text-muted small mb-0">Course Fee</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form id="enrollmentForm" method="POST" action="/enroll/enroll.php">
              <input type="hidden" name="course_id" id="enrollCourseId">
              <input type="hidden" name="amount" id="enrollAmount">
              
              <div class="mb-4">
                <label class="form-label fw-bold">
                  <i class="bi bi-wallet2 me-2"></i>Select Payment Gateway
                </label>
                <div class="row g-3">
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="paystack" id="modal-paystack" checked>
                      <label class="form-check-label w-100" for="modal-paystack">
                        <strong class="d-block">Paystack</strong>
                        <small class="text-muted">Ghana's #1 Payment</small>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="stripe" id="modal-stripe">
                      <label class="form-check-label w-100" for="modal-stripe">
                        <strong class="d-block">Stripe</strong>
                        <small class="text-muted">International Cards</small>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="paypal" id="modal-paypal">
                      <label class="form-check-label w-100" for="modal-paypal">
                        <strong class="d-block">PayPal</strong>
                        <small class="text-muted">Global Payment</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                <small class="text-muted">Payment receipt will be sent to this email</small>
              </div>
              <div class="card bg-light mb-4">
                <div class="card-body">
                  <h6 class="fw-bold mb-3">Payment Summary</h6>
                  <div class="d-flex justify-content-between mb-2">
                    <span>Course Fee:</span>
                    <strong id="summaryPrice">$0.00</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span>Discount:</span>
                    <strong class="text-success">$0.00</strong>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                    <strong>Total Amount:</strong>
                    <strong class="text-primary h5" id="summaryTotal">$0.00</strong>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                  <label class="form-check-label small" for="acceptTerms">
                    I agree to the <a href="#" class="text-primary">Terms & Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-lg w-100">
                <i class="bi bi-lock-fill me-2"></i>Proceed to Secure Payment
              </button>
              <p class="text-center text-muted small mt-3 mb-0">
                <i class="bi bi-shield-check me-1"></i>Your payment information is secure and encrypted
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Handle enrollment modal
document.addEventListener('DOMContentLoaded', function() {
  const enrollModal = document.getElementById('enrollModal');
  
  enrollModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const courseId = button.getAttribute('data-course-id');
    const courseTitle = button.getAttribute('data-course-title');
    const coursePrice = button.getAttribute('data-course-price');
    const courseInstructor = button.getAttribute('data-course-instructor');
    const courseCategory = button.getAttribute('data-course-category');
    const courseDescription = button.getAttribute('data-course-description');
    const courseLevel = button.getAttribute('data-course-level');
    const courseDuration = button.getAttribute('data-course-duration');
    
    const priceUSD = parseFloat(coursePrice);
    const priceGHS = priceUSD * 12;
    
    document.getElementById('modalCourseTitle').textContent = courseTitle;
    document.getElementById('modalCourseInstructor').textContent = courseInstructor;
    document.getElementById('modalCourseCategory').textContent = courseCategory;
    document.getElementById('modalCourseDuration').textContent = courseDuration;
    document.getElementById('modalCourseLevel').textContent = courseLevel;
    document.getElementById('modalCourseDescription').textContent = courseDescription;
    document.getElementById('modalCoursePrice').innerHTML = 'GHâ‚µ ' + priceGHS.toFixed(2) + '<br><small class="text-muted">â‰ˆ $' + priceUSD.toFixed(2) + ' USD</small>';
    document.getElementById('summaryPrice').textContent = 'GHâ‚µ ' + priceGHS.toFixed(2);
    document.getElementById('summaryTotal').textContent = 'GHâ‚µ ' + priceGHS.toFixed(2);
    document.getElementById('enrollCourseId').value = courseId;
    document.getElementById('enrollAmount').value = priceGHS.toFixed(2);
  });

  // Handle remove saved course
  document.querySelectorAll('.remove-saved').forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const savedId = this.getAttribute('data-saved-id');
      const courseTitle = this.getAttribute('data-course-title');
      
      if(confirm('Remove "' + courseTitle + '" from saved courses?')) {
        // Send AJAX request to remove
        fetch('/lms-dashboard/My%20Learning/Activities/remove_saved/remove_saved.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded', 'X-CSRF-Token': document.querySelector('meta[name=csrf-token]').content,
          },
          body: 'saved_id=' + savedId
        })
        .then(response => response.json())
        .then(data => {
          if(data.success) {
            location.reload();
          } else {
            alert('Error removing course: ' + (data.message || 'Unknown error'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert(window.twDashTranslate('Failed to remove course'));
        });
      }
    });
  });
});
</script>



<?php
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
