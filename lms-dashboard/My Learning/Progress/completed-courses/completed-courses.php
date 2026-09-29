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

// Fetch completed courses (100% progress)
try {
    $stmt = $conn->prepare("
        SELECT 
            e.id as enrollment_id,
            e.course_id,
            e.enrolled_at,
            e.completed_at,
            e.progress,
            c.title,
            c.description,
            c.thumbnail,
            c.duration,
            c.level,
            u.full_name as instructor,
            cat.name as category,
            COUNT(DISTINCT cl.id) as total_lessons,
            COUNT(DISTINCT lp.id) as completed_lessons
        FROM enrollments e
        INNER JOIN courses c ON e.course_id = c.id
        LEFT JOIN users u ON c.instructor_id = u.id
        LEFT JOIN categories cat ON c.category_id = cat.id
        LEFT JOIN course_modules cm ON c.id = cm.course_id
        LEFT JOIN course_lessons cl ON cm.id = cl.module_id
        LEFT JOIN lesson_progress lp ON cl.id = lp.lesson_id AND lp.user_id = e.user_id AND lp.completed = 1
        WHERE e.user_id = :user_id 
        AND e.progress = 100
        GROUP BY e.id, c.id
        ORDER BY e.completed_at DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $completed_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Generate certificate IDs and enrich data
    foreach($completed_courses as &$course) {
        $course['certificate_id'] = 'CERT-' . date('Y', strtotime($course['completed_at'] ?? $course['enrolled_at'])) . '-' . str_pad($course['enrollment_id'], 3, '0', STR_PAD_LEFT);
        $course['completion_date'] = $course['completed_at'] ?? $course['enrolled_at'];
        $course['grade'] = round($course['progress']);
        $course['skills_learned'] = array($course['category'] ?? 'General'); // Placeholder
    }
    
} catch (PDOException $e) {
    error_log("Completed courses fetch error: " . $e->getMessage());
    $completed_courses = array();
}

$totalCompleted = count($completed_courses);

include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<div class="container-fluid py-4">
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-check-circle-fill text-success"></i> Completed Courses</h2>
      <p class="text-white-50">Congratulations on your achievements!</p>
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-outline-light">
        <i class="bi bi-download"></i> Download All Certificates
      </button>
    </div>
  </div>

  <!-- Statistics -->
  <div class="row mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <h3 class="fw-bold counter" data-target="<?php echo $totalCompleted; ?>">0</h3>
          <p class="mb-0">Courses Completed</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-primary text-white stat-card">
        <div class="card-body text-center">
          <h3 class="fw-bold counter" data-target="<?php 
            $totalHours = 0;
            foreach($completed_courses as $c) {
              if(preg_match('/(\d+)\s*hour/i', $c['duration'] ?? '', $matches)) {
                $totalHours += (int)$matches[1];
              }
            }
            echo $totalHours;
          ?>">0</h3>
          <p class="mb-0">Learning Hours</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-warning text-white stat-card">
        <div class="card-body text-center">
          <h3 class="fw-bold counter" data-target="<?php 
            echo $totalCompleted > 0 ? round(array_sum(array_column($completed_courses, 'grade')) / $totalCompleted) : 0;
          ?>">0</h3>
          <p class="mb-0">Average Grade %</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <h3 class="fw-bold counter" data-target="<?php echo $totalCompleted; ?>">0</h3>
          <p class="mb-0">Certificates Earned</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter -->
  <div class="row mb-4" data-aos="fade-up">
    <div class="col-md-6">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary active filter-btn" data-filter="all">All</button>
        <button type="button" class="btn btn-outline-primary filter-btn" data-filter="this-year">This Year</button>
        <button type="button" class="btn btn-outline-primary filter-btn" data-filter="last-6-months">Last 6 Months</button>
        <button type="button" class="btn btn-outline-primary filter-btn" data-filter="last-month">Last Month</button>
      </div>
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" id="searchInput" placeholder="Search completed courses...">
    </div>
  </div>

  <!-- Completed Courses List -->
  <?php if($totalCompleted > 0): ?>
    <div class="row">
      <?php foreach($completed_courses as $index => $course): ?>
        <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>" data-date="<?php echo $course['completion_date']; ?>">
          <div class="card shadow-sm hover-shadow">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <i class="bi bi-trophy-fill text-warning" style="font-size: 2.5rem;"></i>
                </div>
                <div class="col-md-6">
                  <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($course['title']); ?></h5>
                  <p class="text-muted small mb-2">
                    <i class="bi bi-person"></i> <?php echo htmlspecialchars($course['instructor']); ?> | 
                    <i class="bi bi-tag ms-2"></i> <?php echo htmlspecialchars($course['category']); ?> | 
                    <i class="bi bi-clock ms-2"></i> <?php echo htmlspecialchars($course['duration']); ?> | 
                    <i class="bi bi-book ms-2"></i> <?php echo $course['total_lessons']; ?> lessons
                  </p>
                </div>
                <div class="col-md-2 text-center">
                  <div class="mb-2">
                    <span class="badge bg-success" style="font-size: 1.2rem;">Grade: <?php echo $course['grade']; ?>%</span>
                  </div>
                  <small class="text-muted">Completed: <?php echo date('M d, Y', strtotime($course['completion_date'])); ?></small>
                </div>
                <div class="col-md-3 text-end">
                  <a href="view_certificate.php?course_id=<?php echo $course['id']; ?>" class="btn btn-primary btn-sm mb-2 w-100" target="_blank">
                    <i class="bi bi-file-earmark-text"></i> View Certificate
                  </a>
                  <a href="download_certificate.php?course_id=<?php echo $course['id']; ?>" class="btn btn-outline-secondary btn-sm w-100">
                    <i class="bi bi-download"></i> Download PDF
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <!-- Empty State -->
    <div class="text-center py-5" data-aos="fade-up">
      <i class="bi bi-trophy" style="font-size: 5rem; color: #ddd;"></i>
      <h4 class="mt-3 text-muted">No Completed Courses Yet</h4>
      <p class="text-muted">Complete your first course to earn a certificate!</p>
      <a href="/Courses/courses.php" class="btn btn-primary">
        <i class="bi bi-search"></i> Browse Courses
      </a>
    </div>
  <?php endif; ?>
</div>

<script>
  // Counter animation
  document.querySelectorAll('.counter').forEach(counter => {
    const target = +counter.getAttribute('data-target');
    const increment = target / 50;
    
    const updateCount = () => {
      const count = +counter.innerText;
      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target;
      }
    };
    
    updateCount();
  });

  // Filter functionality
  const filterBtns = document.querySelectorAll('.filter-btn');
  const courseCards = document.querySelectorAll('[data-date]');
  
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Update active button
      filterBtns.forEach(b => {
        b.classList.remove('active', 'btn-primary');
        b.classList.add('btn-outline-primary');
      });
      this.classList.add('active', 'btn-primary');
      this.classList.remove('btn-outline-primary');
      
      const filter = this.getAttribute('data-filter');
      const now = new Date();
      
      courseCards.forEach(card => {
        const courseDate = new Date(card.getAttribute('data-date'));
        let show = true;
        
        if (filter === 'this-year') {
          show = courseDate.getFullYear() === now.getFullYear();
        } else if (filter === 'last-6-months') {
          const sixMonthsAgo = new Date();
          sixMonthsAgo.setMonth(now.getMonth() - 6);
          show = courseDate >= sixMonthsAgo;
        } else if (filter === 'last-month') {
          const oneMonthAgo = new Date();
          oneMonthAgo.setMonth(now.getMonth() - 1);
          show = courseDate >= oneMonthAgo;
        }
        
        card.style.display = show ? '' : 'none';
      });
    });
  });

  // Search functionality
  const searchInput = document.getElementById('searchInput');
  if(searchInput) {
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      
      courseCards.forEach(card => {
        const title = card.querySelector('h5').textContent.toLowerCase();
        const instructor = card.querySelector('.text-muted').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || instructor.includes(searchTerm)) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }
</script>

<?php include(__DIR__ . '/..\..\..\includes\footer\footer.php'); ?>