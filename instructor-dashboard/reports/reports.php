<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'instructor') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../includes/db/db.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$instructor_id = $_SESSION['user_id'] ?? 0;
$stats = [];

$queries = [
    'total_courses' => 'SELECT COUNT(*) AS total FROM courses WHERE instructor_id = ?',
    'total_students' => 'SELECT COUNT(DISTINCT ce.user_id) AS total FROM enrollments ce JOIN courses c ON c.id = ce.course_id WHERE c.instructor_id = ?',
    'total_assignments' => 'SELECT COUNT(*) AS total FROM assignments a JOIN courses c ON c.id = a.course_id WHERE c.instructor_id = ?',
    'average_progress' => 'SELECT ROUND(AVG(ce.progress), 1) AS total FROM enrollments ce JOIN courses c ON c.id = ce.course_id WHERE c.instructor_id = ?',
];

foreach ($queries as $key => $sql) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$instructor_id]);
    $stats[$key] = (float)($stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0);
}

include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <h2>Reports</h2>
    <div class="row g-3 mb-4">
      <div class="col-md-3"><div class="card shadow-sm border-0 p-3"><div class="text-muted">Courses</div><div class="fs-3 fw-bold"><?php echo (int)$stats['total_courses']; ?></div></div></div>
      <div class="col-md-3"><div class="card shadow-sm border-0 p-3"><div class="text-muted">Students</div><div class="fs-3 fw-bold"><?php echo (int)$stats['total_students']; ?></div></div></div>
      <div class="col-md-3"><div class="card shadow-sm border-0 p-3"><div class="text-muted">Assignments</div><div class="fs-3 fw-bold"><?php echo (int)$stats['total_assignments']; ?></div></div></div>
      <div class="col-md-3"><div class="card shadow-sm border-0 p-3"><div class="text-muted">Avg. Progress</div><div class="fs-3 fw-bold"><?php echo number_format($stats['average_progress'], 1); ?>%</div></div></div>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-hover">
          <thead><tr><th>Report</th><th>Value</th><th>Status</th></tr></thead>
          <tbody>
            <tr><td>Course Coverage</td><td><?php echo (int)$stats['total_courses']; ?> active courses</td><td><span class="badge bg-success">Healthy</span></td></tr>
            <tr><td>Student Enrollment</td><td><?php echo (int)$stats['total_students']; ?> enrolled learners</td><td><span class="badge bg-primary">Live</span></td></tr>
            <tr><td>Assignment Load</td><td><?php echo (int)$stats['total_assignments']; ?> assignments</td><td><span class="badge bg-warning text-dark">Monitoring</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>