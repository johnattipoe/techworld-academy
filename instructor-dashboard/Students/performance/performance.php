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
    'SELECT u.username, c.title AS course_title, ce.progress, COUNT(asub.id) AS submissions, AVG(asub.points_earned) AS average_score
    FROM enrollments ce
     JOIN users u ON u.id = ce.user_id
     JOIN courses c ON c.id = ce.course_id
     LEFT JOIN assignments a ON a.course_id = c.id
     LEFT JOIN assignment_submissions asub ON asub.assignment_id = a.id AND asub.user_id = u.id
     WHERE c.instructor_id = ? AND u.role = ?
     GROUP BY u.id, c.id
     ORDER BY ce.progress DESC, u.username ASC'
);
$stmt->execute([$instructor_id, 'student']);
$performance = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <h2>Performance</h2>
    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Progress</th>
                <th>Submissions</th>
                <th>Average Score</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($performance)): ?>
                <tr><td colspan="5" class="text-center text-muted py-4">No performance data available.</td></tr>
              <?php else: ?>
                <?php foreach ($performance as $row): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['course_title']); ?></td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="progress flex-grow-1" style="height: 8px;">
                          <div class="progress-bar bg-primary" style="width: <?php echo min(100, max(0, (float)($row['progress'] ?? 0))); ?>%"></div>
                        </div>
                        <span class="small fw-semibold"><?php echo (float)($row['progress'] ?? 0); ?>%</span>
                      </div>
                    </td>
                    <td><?php echo (int)($row['submissions'] ?? 0); ?></td>
                    <td><?php echo !empty($row['average_score']) ? round((float)$row['average_score'], 1) . '/100' : '—'; ?></td>
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
<?php include(__DIR__ . '/..\..\includes\footer\footer.php'); ?>