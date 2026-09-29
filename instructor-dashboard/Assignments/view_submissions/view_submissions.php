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
    'SELECT asub.id, asub.status, asub.submitted_at, asub.points_earned, u.username AS student_name, a.title AS assignment_title, c.title AS course_title
     FROM assignment_submissions asub
     JOIN assignments a ON a.id = asub.assignment_id
     JOIN courses c ON c.id = a.course_id
     JOIN users u ON u.id = asub.user_id
     WHERE c.instructor_id = ?
     ORDER BY asub.submitted_at DESC'
);
$stmt->execute([$instructor_id]);
$submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="mb-1">View Submissions</h2>
        <p class="text-muted mb-0">Monitor submitted work from your students.</p>
      </div>
      <span class="badge bg-primary rounded-pill fs-6"><?php echo count($submissions); ?> total</span>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <div class="table-responsive">
          <input class="form-control m-3" data-table-search="submissionTable" placeholder="Search students, courses, or assignments" aria-label="Search submissions" style="max-width: 360px"><table class="table table-hover align-middle mb-0" id="submissionTable" data-sortable>
            <thead class="table-light">
              <tr>
                <th data-sort>Student</th>
                <th data-sort>Course</th>
                <th data-sort>Assignment</th>
                <th data-sort>Status</th>
                <th data-sort>Submitted</th>
                <th data-sort>Score</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($submissions)): ?>
                <tr>
                  <td colspan="6" class="text-center text-muted py-4">No submissions available yet.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($submissions as $submission): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($submission['student_name'] ?? 'Unknown'); ?></td>
                    <td><?php echo htmlspecialchars($submission['course_title'] ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($submission['assignment_title'] ?? 'Untitled'); ?></td>
                    <td>
                      <span class="badge bg-<?php echo $submission['status'] === 'graded' ? 'success' : 'warning'; ?> rounded-pill">
                        <?php echo htmlspecialchars(ucfirst($submission['status'] ?? 'submitted')); ?>
                      </span>
                    </td>
                    <td><?php echo !empty($submission['submitted_at']) ? date('M d, Y', strtotime($submission['submitted_at'])) : '—'; ?></td>
                    <td><?php echo !empty($submission['points_earned']) ? (int)$submission['points_earned'] . '/100' : 'Pending'; ?></td>
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
