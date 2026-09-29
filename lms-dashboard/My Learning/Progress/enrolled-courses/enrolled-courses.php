<?php 
session_start();
require_once(__DIR__ . '/../../../../Database/db/db.php');

if(!isset($_SESSION['username'])){
  $_SESSION['username'] = "Student";
}

if(!isset($_SESSION['user_id'])){
  header("Location: ../../../authenication/login.php");
  exit();
}

$conn = get_db();
$user_id = $_SESSION['user_id'];

// Fetch enrolled courses with detailed information
try {
    $stmt = $conn->prepare("
        SELECT 
            e.id as enrollment_id,
            e.course_id,
            e.enrolled_at,
            e.progress,
            e.last_accessed,
            c.title,
            c.description,
            c.thumbnail,
            c.duration,
            c.level,
            u.full_name as instructor,
            cat.name as category,
            COUNT(DISTINCT cm.id) as total_modules,
            COUNT(DISTINCT cl.id) as total_lessons,
            COUNT(DISTINCT lp.id) as completed_lessons,
            (
                SELECT cl2.title 
                FROM course_lessons cl2
                INNER JOIN course_modules cm2 ON cl2.module_id = cm2.id
                LEFT JOIN lesson_progress lp2 ON cl2.id = lp2.lesson_id AND lp2.user_id = e.user_id AND lp2.completed = 1
                WHERE cm2.course_id = c.id AND lp2.id IS NULL
                ORDER BY cm2.order_position ASC, cl2.order_position ASC
                LIMIT 1
            ) as next_lesson
        FROM enrollments e
        INNER JOIN courses c ON e.course_id = c.id
        LEFT JOIN users u ON c.instructor_id = u.id
        LEFT JOIN categories cat ON c.category_id = cat.id
        LEFT JOIN course_modules cm ON c.id = cm.course_id
        LEFT JOIN course_lessons cl ON cm.id = cl.module_id
        LEFT JOIN lesson_progress lp ON cl.id = lp.lesson_id AND lp.user_id = e.user_id AND lp.completed = 1
        WHERE e.user_id = :user_id
        GROUP BY e.id, c.id
        ORDER BY e.last_accessed DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $enrolled_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    error_log("Enrolled courses fetch error: " . $e->getMessage());
    $enrolled_courses = array();
}

$totalEnrolled = count($enrolled_courses);
$totalCompleted = count(array_filter($enrolled_courses, function($c) { return $c['progress'] >= 100; }));
$totalInProgress = count(array_filter($enrolled_courses, function($c) { return $c['progress'] > 0 && $c['progress'] < 100; }));
$avgProgress = $totalEnrolled > 0 ? round(array_sum(array_column($enrolled_courses, 'progress')) / $totalEnrolled) : 0;

include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid py-4">
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-play-circle-fill"></i> Enrolled Courses</h2>
      <p class="text-white-50">Continue your learning journey</p>
    </div>
    <div class="col-md-4 text-end">
      <span class="badge bg-primary" style="font-size: 1.1rem;">
        <?php echo $totalEnrolled; ?> Course<?php echo $totalEnrolled != 1 ? 's' : ''; ?>
      </span>
    </div>
  </div>

  <!-- Statistics Cards -->
  <div class="row mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card text-white stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-center">
          <i class="bi bi-book-fill" style="font-size: 2rem;"></i>
          <h3 class="fw-bold mt-2"><?php echo $totalEnrolled; ?></h3>
          <p class="mb-0 small">Total Enrolled</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-warning text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-hourglass-split" style="font-size: 2rem;"></i>
          <h3 class="fw-bold mt-2"><?php echo $totalInProgress; ?></h3>
          <p class="mb-0 small">In Progress</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-check-circle-fill" style="font-size: 2rem;"></i>
          <h3 class="fw-bold mt-2"><?php echo $totalCompleted; ?></h3>
          <p class="mb-0 small">Completed</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-graph-up" style="font-size: 2rem;"></i>
          <h3 class="fw-bold mt-2"><?php echo $avgProgress; ?>%</h3>
          <p class="mb-0 small">Avg Progress</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter and Sort -->
  <div class="row mb-4" data-aos="fade-up">
    <div class="col-md-8">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary active filter-btn" data-filter="all">All Courses</button>
        <button type="button" class="btn btn-outline-light filter-btn" data-filter="in-progress">In Progress</button>
        <button type="button" class="btn btn-outline-light filter-btn" data-filter="not-started">Not Started</button>
        <button type="button" class="btn btn-outline-light filter-btn" data-filter="completed">Completed</button>
      </div>
    </div>
    <div class="col-md-4">
      <select class="form-select" id="sortSelect">
        <option value="recent" selected>Sort by: Recently Accessed</option>
        <option value="progress">Sort by: Progress</option>
        <option value="title">Sort by: Title</option>
        <option value="enrolled">Sort by: Enrollment Date</option>
      </select>
    </div>
  </div>

  <!-- Courses Grid -->
  <div class="row" id="coursesContainer">
    <?php if($totalEnrolled > 0): ?>
      <?php foreach($enrolled_courses as $index => $course): ?>
      <div class="col-md-6 col-lg-4 mb-4 course-card" 
           data-progress="<?php echo $course['progress']; ?>" 
           data-title="<?php echo htmlspecialchars($course['title']); ?>"
           data-enrolled="<?php echo strtotime($course['enrolled_at']); ?>"
           data-aos="fade-up" 
           data-aos-delay="<?php echo ($index % 3) * 100; ?>">
        <div class="card h-100 shadow-sm hover-shadow">
          <div class="position-relative">
            <?php if(!empty($course['thumbnail'])): ?>
              <img src="../../../assets/courses/<?php echo htmlspecialchars($course['thumbnail']); ?>" class="card-img-top" style="height: 180px; object-fit: cover;" alt="<?php echo htmlspecialchars($course['title']); ?>">
            <?php else: ?>
              <div class="card-img-top" style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex align-items-center justify-content-center h-100">
                  <i class="bi bi-book-fill text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
              </div>
            <?php endif; ?>
            
            <span class="position-absolute top-0 end-0 m-2 badge <?php echo $course['progress'] >= 100 ? 'bg-success' : 'bg-warning'; ?>">
              <?php echo round($course['progress']); ?>%
            </span>
            <span class="position-absolute top-0 start-0 m-2 badge bg-dark">
              <?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?>
            </span>
          </div>
          
          <div class="card-body">
            <!-- Category Badge -->
            <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category'] ?? 'General'); ?></span>
            
            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($course['title']); ?></h5>
            <p class="text-muted small mb-2">
              <i class="bi bi-person"></i> <?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>
            </p>
            
            <div class="mb-3">
              <div class="d-flex justify-content-between small text-muted mb-1">
                <span><?php echo $course['completed_lessons']; ?> / <?php echo $course['total_lessons']; ?> lessons</span>
                <span><?php echo round($course['progress']); ?>%</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar <?php echo $course['progress'] >= 100 ? 'bg-success' : 'bg-primary'; ?>" 
                     style="width: <?php echo $course['progress']; ?>%;">
                </div>
              </div>
            </div>

            <?php if($course['next_lesson'] && $course['progress'] < 100): ?>
              <div class="mb-3">
                <p class="small mb-1"><strong>Next Lesson:</strong></p>
                <p class="small text-primary mb-0">
                  <i class="bi bi-play-circle"></i> <?php echo htmlspecialchars($course['next_lesson']); ?>
                </p>
              </div>
            <?php elseif($course['progress'] >= 100): ?>
              <div class="mb-3">
                <div class="alert alert-success py-2 px-3 small mb-0">
                  <i class="bi bi-trophy-fill"></i> Course Completed!
                </div>
              </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
              <span><i class="bi bi-clock"></i> <?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?></span>
              <span><i class="bi bi-calendar"></i> Enrolled <?php echo date('M d, Y', strtotime($course['enrolled_at'])); ?></span>
            </div>

            <div class="d-grid gap-2">
              <a href="../../course-player.php?course_id=<?php echo $course['course_id']; ?>" class="btn btn-primary">
                <i class="bi bi-play-circle"></i> <?php echo $course['progress'] >= 100 ? 'Review Course' : 'Continue Learning'; ?>
              </a>
              <?php if($course['progress'] >= 100): ?>
                <a href="certificates.php" class="btn btn-outline-success btn-sm">
                  <i class="bi bi-award"></i> View Certificate
                </a>
              <?php endif; ?>
            </div>
          </div>
          
          <div class="card-footer bg-light small text-muted">
            <i class="bi bi-clock-history"></i> Last accessed: <?php echo time_elapsed_string($course['last_accessed'] ?? $course['enrolled_at']); ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="card bg-light text-center py-5" data-aos="fade-up">
          <div class="card-body">
            <i class="bi bi-book text-muted" style="font-size: 5rem;"></i>
            <h4 class="mt-3 text-muted">No Enrolled Courses Yet</h4>
            <p class="text-muted">Start learning today by enrolling in a course!</p>
            <a href="/Courses/courses.php" class="btn btn-primary mt-3">
              <i class="bi bi-search"></i> Browse Courses
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
// Helper function for time elapsed
function time_elapsed_string($datetime) {
    if(!$datetime) return 'Never';
    
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->d >= 7) {
        $weeks = floor($diff->d / 7);
        return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d > 0) {
        return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h > 0) {
        return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i > 0) {
        return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
    } else {
        return 'just now';
    }
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Filter functionality
  const filterBtns = document.querySelectorAll('.filter-btn');
  const courseCards = document.querySelectorAll('.course-card');
  
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Update active button
      filterBtns.forEach(b => {
        b.classList.remove('btn-primary', 'active');
        b.classList.add('btn-outline-light');
      });
      this.classList.remove('btn-outline-light');
      this.classList.add('btn-primary', 'active');
      
      const filter = this.getAttribute('data-filter');
      
      courseCards.forEach(card => {
        const progress = parseInt(card.getAttribute('data-progress'));
        let show = true;
        
        if(filter === 'in-progress') {
          show = progress > 0 && progress < 100;
        } else if(filter === 'not-started') {
          show = progress === 0;
        } else if(filter === 'completed') {
          show = progress >= 100;
        }
        
        card.style.display = show ? 'block' : 'none';
      });
    });
  });
  
  // Sort functionality
  const sortSelect = document.getElementById('sortSelect');
  const container = document.getElementById('coursesContainer');
  
  sortSelect?.addEventListener('change', function() {
    const sortBy = this.value;
    const cardsArray = Array.from(courseCards);
    
    cardsArray.sort((a, b) => {
      if(sortBy === 'progress') {
        return parseInt(b.getAttribute('data-progress')) - parseInt(a.getAttribute('data-progress'));
      } else if(sortBy === 'title') {
        return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
      } else if(sortBy === 'enrolled') {
        return parseInt(b.getAttribute('data-enrolled')) - parseInt(a.getAttribute('data-enrolled'));
      } else { // recent (last_accessed)
        return parseInt(b.getAttribute('data-enrolled')) - parseInt(a.getAttribute('data-enrolled'));
      }
    });
    
    cardsArray.forEach(card => container.appendChild(card));
  });
});
</script>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>
