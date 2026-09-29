<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'instructor') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../Database/db/db.php');
require_once(__DIR__ . '/../../includes/csrf/csrf.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$instructor_id = $_SESSION['user_id'] ?? 0;
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['grade_submission'])) {
    if (!instructor_csrf_valid($_POST['csrf_token'] ?? null)) { http_response_code(403); $message = 'Session token expired. Reload and try again.'; $message_type = 'danger'; } else {
    $submission_id = (int)($_POST['submission_id'] ?? 0);
    $points = max(0, min(100, (int)($_POST['points'] ?? 0)));
    $feedback = trim($_POST['feedback'] ?? '');
    $status = $points >= 0 ? 'graded' : 'submitted';

    if ($submission_id > 0) {
        $stmt = $pdo->prepare('UPDATE assignment_submissions SET points_earned = ?, feedback = ?, status = "graded", graded_by = ?, graded_at = NOW() WHERE id = ? AND EXISTS (SELECT 1 FROM assignments a JOIN courses c ON c.id = a.course_id WHERE a.id = assignment_submissions.assignment_id AND c.instructor_id = ?)');
        if ($stmt->execute([$points, $feedback, $instructor_id, $submission_id, $instructor_id])) {
            $message = 'Assignment graded successfully.';
            $message_type = 'success';
        } else {
            $message = 'Unable to grade this assignment.';
            $message_type = 'danger';
        }
    }
    }
}

$stmt = $pdo->prepare(
    'SELECT asub.id, asub.assignment_id, asub.user_id, asub.status, asub.content, asub.file_path, asub.points_earned, asub.feedback, asub.submitted_at, a.title AS assignment_title, c.title AS course_title, u.username AS student_name
     FROM assignment_submissions asub
     JOIN assignments a ON a.id = asub.assignment_id
     JOIN courses c ON c.id = a.course_id
     JOIN users u ON u.id = asub.user_id
     WHERE c.instructor_id = ?
     ORDER BY asub.submitted_at DESC'
);
$stmt->execute([$instructor_id]);
$submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="mb-1">Grade Assignments</h2>
        <p class="text-muted mb-0">Review submissions and record feedback for your students.</p>
      </div>
      <span class="badge bg-primary rounded-pill fs-6"><?php echo count($submissions); ?> submissions</span>
    </div>

    <?php if ($message): ?>
      <div class="alert alert-<?php echo htmlspecialchars($message_type); ?> alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Assignment</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Grade</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($submissions)): ?>
                <tr>
                  <td colspan="7" class="text-center text-muted py-4">No assignment submissions found yet.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($submissions as $submission): ?>
                  <tr>
                    <td>
                      <div class="fw-semibold"><?php echo htmlspecialchars($submission['student_name'] ?? 'Unknown'); ?></div>
                      <small class="text-muted">#<?php echo (int)($submission['user_id'] ?? 0); ?></small>
                    </td>
                    <td><?php echo htmlspecialchars($submission['course_title'] ?? 'N/A'); ?></td>
                    <td>
                      <div class="fw-medium"><?php echo htmlspecialchars($submission['assignment_title'] ?? 'Untitled'); ?></div>
                      <?php if (!empty($submission['file_path'])): ?>
                        <small class="text-primary">Attachment: <?php echo htmlspecialchars(basename($submission['file_path'])); ?></small>
                      <?php endif; ?>
                    </td>
                    <td>
                      <span class="badge bg-<?php echo $submission['status'] === 'graded' ? 'success' : 'warning'; ?> rounded-pill">
                        <?php echo htmlspecialchars(ucfirst($submission['status'] ?? 'submitted')); ?>
                      </span>
                    </td>
                    <td><?php echo !empty($submission['submitted_at']) ? date('M d, Y', strtotime($submission['submitted_at'])) : 'â€”'; ?></td>
                    <td>
                      <?php if (!empty($submission['points_earned'])): ?>
                        <span class="fw-bold"><?php echo (int)$submission['points_earned']; ?>/100</span>
                      <?php else: ?>
                        <span class="text-muted">Pending</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gradeModal<?php echo (int)$submission['id']; ?>">
                        <?php echo !empty($submission['points_earned']) ? 'Update' : 'Grade'; ?>
                      </button>
                    </td>
                  </tr>

                  <div class="modal fade" id="gradeModal<?php echo (int)$submission['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <form method="POST">
                          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(instructor_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                          <div class="modal-header">
                            <h5 class="modal-title">Grade: <?php echo htmlspecialchars($submission['assignment_title'] ?? 'Assignment'); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="submission_id" value="<?php echo (int)$submission['id']; ?>">
                            <div class="mb-3">
                              <label class="form-label">Student</label>
                              <input type="text" class="form-control" value="<?php echo htmlspecialchars($submission['student_name'] ?? 'Unknown'); ?>" readonly>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Score (0 - 100)</label>
                              <input type="number" name="points" min="0" max="100" class="form-control" value="<?php echo isset($submission['points_earned']) ? (int)$submission['points_earned'] : 0; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Feedback</label>
                              <textarea name="feedback" class="form-control" rows="5" placeholder="Provide constructive feedback..."><?php echo htmlspecialchars($submission['feedback'] ?? ''); ?></textarea>
                            </div>
                            <?php if (!empty($submission['content'])): ?>
                              <div class="mb-3">
                                <label class="form-label">Submission Text</label>
                                <div class="border rounded p-3 bg-light"><?php echo nl2br(htmlspecialchars($submission['content'])); ?></div>
                              </div>
                            <?php endif; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="grade_submission" class="btn btn-primary">Save Grade</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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

