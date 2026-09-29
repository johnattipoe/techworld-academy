<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'instructor') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../Database/db/db.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$instructor_id = $_SESSION['user_id'] ?? 0;
$stmt = $pdo->prepare(
    'SELECT u.id, u.username, u.email, c.title AS course_title, ce.progress
    FROM enrollments ce
     JOIN courses c ON c.id = ce.course_id
     JOIN users u ON u.id = ce.user_id
     WHERE c.instructor_id = ? AND u.role = ?
     ORDER BY u.username ASC'
);
$stmt->execute([$instructor_id, 'student']);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <h2>My Students</h2>
    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Progress</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($students)): ?>
                <tr><td colspan="4" class="text-center text-muted py-4">No students enrolled in your courses yet.</td></tr>
              <?php else: ?>
                <?php foreach ($students as $student): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($student['username']); ?></td>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                    <td><?php echo htmlspecialchars($student['course_title']); ?></td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="progress flex-grow-1" style="height: 8px;">
                          <div class="progress-bar bg-success" style="width: <?php echo min(100, max(0, (float)($student['progress'] ?? 0))); ?>%"></div>
                        </div>
                        <span class="small fw-semibold"><?php echo (float)($student['progress'] ?? 0); ?>%</span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/../../includes/footer/footer.php'); ?>
