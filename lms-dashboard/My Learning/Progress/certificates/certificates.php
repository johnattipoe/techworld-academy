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

// Fetch completed courses (100% progress) as certificates
try {
    $stmt = $conn->prepare("
        SELECT 
            e.id as enrollment_id,
            e.enrolled_at,
            e.progress,
            e.completed_at,
            c.id as course_id,
            c.title as course_title,
            c.description,
            c.duration,
            u.full_name as instructor,
            cat.name as category,
            COUNT(DISTINCT cm.id) as total_modules,
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
    $completedCourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Generate certificate data
    $certificates = array();
    foreach($completedCourses as $course) {
        $certId = 'CERT-' . date('Y', strtotime($course['completed_at'] ?? $course['enrolled_at'])) . '-' . str_pad($course['enrollment_id'], 3, '0', STR_PAD_LEFT);
        $issueDate = $course['completed_at'] ?? date('Y-m-d');
        $grade = round($course['progress']);
        
        // Extract hours from duration (e.g., "40 hours" -> 40)
        $hours = 0;
        if (preg_match('/(\d+)\s*hour/i', $course['duration'] ?? '', $matches)) {
            $hours = (int)$matches[1];
        }
        
        // Get skills from category (basic fallback)
        $skills = array($course['category'] ?? 'General');
        
        $certificates[] = array(
            'id' => $certId,
            'course_id' => $course['course_id'],
            'course_title' => $course['course_title'],
            'instructor' => $course['instructor'] ?? 'TechWorld Academy',
            'issue_date' => $issueDate,
            'grade' => $grade,
            'verification_url' => 'https://techworld.edu/verify/' . $certId,
            'skills' => $skills,
            'hours' => $hours,
            'total_lessons' => $course['total_lessons'],
            'completed_lessons' => $course['completed_lessons']
        );
    }
    
} catch (PDOException $e) {
    error_log("Certificate fetch error: " . $e->getMessage());
    $certificates = array();
}

// Calculate statistics
$totalCerts = count($certificates);
$avgScore = $totalCerts > 0 ? round(array_sum(array_column($certificates, 'grade')) / $totalCerts) : 0;
$totalHours = $totalCerts > 0 ? array_sum(array_column($certificates, 'hours')) : 0;

include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid py-4">
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-award-fill text-warning"></i> My Certificates</h2>
      <p class="text-white-50">Your achievements and credentials</p>
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-primary">
        <i class="bi bi-share"></i> Share on LinkedIn
      </button>
    </div>
  </div>

  <!-- Summary Cards -->
  <div class="row mb-4">
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
      <div class="card text-white stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-center">
          <i class="bi bi-award-fill" style="font-size: 3rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $totalCerts; ?>">0</h3>
          <p class="mb-0">Total Certificates</p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-graph-up-arrow" style="font-size: 3rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $avgScore; ?>">0</h3>
          <p class="mb-0">Average Score %</p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-clock-fill" style="font-size: 3rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $totalHours; ?>">0</h3>
          <p class="mb-0">Learning Hours</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Certificates Grid -->
  <div class="row">
    <?php if($totalCerts > 0): ?>
      <?php foreach($certificates as $index => $cert): ?>
      <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left" data-aos-delay="<?php echo $index * 100; ?>">
        <div class="card h-100 shadow-sm border-warning hover-shadow" style="border-width: 3px;">
          <div class="card-header bg-warning text-white text-center">
            <i class="bi bi-award-fill" style="font-size: 2rem;"></i>
            <h6 class="mt-2 mb-0 fw-bold">CERTIFICATE OF COMPLETION</h6>
          </div>
          <div class="card-body">
            <h5 class="fw-bold text-center mb-3"><?php echo $cert['course_title']; ?></h5>
            
            <div class="text-center mb-3">
              <p class="mb-1"><strong>Certificate ID:</strong></p>
              <code class="bg-light p-2 rounded"><?php echo $cert['id']; ?></code>
            </div>

            <hr>

            <div class="mb-2">
              <strong>Instructor:</strong>
              <p class="mb-0 text-muted"><?php echo $cert['instructor']; ?></p>
            </div>

            <div class="mb-2">
              <strong>Issue Date:</strong>
              <p class="mb-0 text-muted"><?php echo date('F d, Y', strtotime($cert['issue_date'])); ?></p>
            </div>

            <div class="mb-2">
              <strong>Final Grade:</strong>
              <span class="badge bg-success"><?php echo $cert['grade']; ?>%</span>
            </div>

            <div class="mb-3">
              <strong>Skills Acquired:</strong>
              <div class="mt-1">
                <?php foreach($cert['skills'] as $skill): ?>
                  <span class="badge bg-primary me-1 mb-1"><?php echo $skill; ?></span>
                <?php endforeach; ?>
              </div>
            </div>

            <hr>

            <div class="d-grid gap-2">
              <a href="view_certificate.php?course_id=<?php echo $cert['course_id']; ?>" class="btn btn-warning" target="_blank">
                <i class="bi bi-eye"></i> View Certificate
              </a>
              <a href="download_certificate.php?course_id=<?php echo $cert['course_id']; ?>" class="btn btn-outline-primary">
                <i class="bi bi-download"></i> Download PDF
              </a>
              <button class="btn btn-outline-secondary btn-sm" onclick="window.open('<?php echo $cert['verification_url']; ?>', '_blank')">
                <i class="bi bi-shield-check"></i> Verify
              </button>
            </div>
          </div>
          <div class="card-footer text-center bg-light">
            <small class="text-muted">
              <i class="bi bi-clock"></i> <?php echo $cert['hours']; ?> hours of learning
            </small>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="card bg-light text-center py-5">
          <div class="card-body">
            <i class="bi bi-award text-muted" style="font-size: 5rem;"></i>
            <h4 class="mt-3 text-muted">No Certificates Yet</h4>
            <p class="text-muted">Complete your enrolled courses to earn certificates!</p>
            <a href="/Courses/courses.php" class="btn btn-primary mt-3">
              <i class="bi bi-book"></i> Browse Courses
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Share Section -->
  <div class="row mt-4" data-aos="fade-up">
    <div class="col-12">
      <div class="card bg-light">
        <div class="card-body text-center">
          <h5 class="fw-bold mb-3">Share Your Achievements</h5>
          <p class="text-muted">Let the world know about your accomplishments!</p>
          <div class="btn-group" role="group">
            <button class="btn btn-primary"><i class="bi bi-linkedin"></i> LinkedIn</button>
            <button class="btn btn-info"><i class="bi bi-twitter"></i> Twitter</button>
            <button class="btn btn-primary"><i class="bi bi-facebook"></i> Facebook</button>
            <button class="btn btn-success"><i class="bi bi-whatsapp"></i> WhatsApp</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>
