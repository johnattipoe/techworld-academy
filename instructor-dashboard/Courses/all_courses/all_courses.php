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
$stmt = $pdo->prepare('SELECT c.id, c.title, c.category, c.status, c.created_at, COUNT(ce.user_id) AS student_count
    FROM courses c
    LEFT JOIN enrollments ce ON ce.course_id = c.id
    WHERE c.instructor_id = ?
    GROUP BY c.id, c.title, c.category, c.status, c.created_at
    ORDER BY c.created_at DESC');
$stmt->execute([$instructor_id]);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="mb-1">All My Courses</h2>
        <p class="text-muted mb-0">Manage and review the courses you currently teach.</p>
      </div>
      <a href="/instructor-dashboard/My%20Courses/create_course/create_course.php" class="btn btn-primary">Create Course</a>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Course</th>
                <th>Category</th>
                <th>Status</th>
                <th>Students</th>
                <th>Created</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($courses)): ?>
                <tr><td colspan="5" class="text-center text-muted py-4">No courses found.</td></tr>
              <?php else: ?>
                <?php foreach ($courses as $course): ?>
                  <tr>
                    <td class="fw-semibold"><?php echo htmlspecialchars($course['title']); ?></td>
                    <td><?php echo htmlspecialchars($course['category'] ?? 'General'); ?></td>
                    <td>
                      <span class="badge bg-<?php echo ($course['status'] ?? 'draft') === 'published' ? 'success' : 'secondary'; ?> rounded-pill">
                        <?php echo htmlspecialchars(ucfirst($course['status'] ?? 'draft')); ?>
                      </span>
                    </td>
                    <td><?php echo (int)($course['student_count'] ?? 0); ?></td>
                    <td><?php echo date('M d, Y', strtotime($course['created_at'])); ?></td>
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