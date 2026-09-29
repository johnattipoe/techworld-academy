<?php
session_start();
if (empty($_SESSION['user_id']) || empty($_SESSION['username']) || ($_SESSION['role'] ?? '') !== 'instructor') {
  header('Location: /authenication/login/login.php');
  exit();
}

require_once(__DIR__ . '/../includes/db/db.php');
$pdo = get_db();
if (!$pdo) {
  die('Database connection failed');
}

$instructor_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

$student_count = 0;
$course_stats = ['total_courses' => 0, 'draft_courses' => 0];
$pending_reviews = 0;
$activity_data = [];
$upcoming_tasks = [];
$recent_students = [];
$error = '';

try {
    $stmt = $pdo->prepare("SELECT COUNT(DISTINCT u.id) as student_count
                          FROM users u
                          JOIN enrollments ce ON u.id = ce.user_id
                          JOIN courses c ON ce.course_id = c.id
                          WHERE c.instructor_id = ? AND u.role = 'student'");
    $stmt->execute([$instructor_id]);
    $student_count = (int)($stmt->fetch(PDO::FETCH_ASSOC)['student_count'] ?? 0);

    $stmt = $pdo->prepare("SELECT COUNT(*) as total_courses,
                          SUM(CASE WHEN status = 'draft' THEN 1 ELSE 0 END) as draft_courses
                          FROM courses
                          WHERE instructor_id = ?");
    $stmt->execute([$instructor_id]);
    $course_stats = $stmt->fetch(PDO::FETCH_ASSOC) ?: ['total_courses' => 0, 'draft_courses' => 0];
    $course_stats['total_courses'] = (int)($course_stats['total_courses'] ?? 0);
    $course_stats['draft_courses'] = (int)($course_stats['draft_courses'] ?? 0);

    $stmt = $pdo->prepare("SELECT COUNT(*) as pending_reviews
                          FROM assignment_submissions asub
                          JOIN assignments a ON asub.assignment_id = a.id
                          JOIN courses c ON a.course_id = c.id
                          WHERE c.instructor_id = ? AND asub.status = 'submitted'");
    $stmt->execute([$instructor_id]);
    $pending_reviews = (int)($stmt->fetch(PDO::FETCH_ASSOC)['pending_reviews'] ?? 0);

    $stmt = $pdo->prepare("SELECT DATE(asub.submitted_at) as day,
                          COUNT(DISTINCT asub.user_id) as active_students
                          FROM assignment_submissions asub
                          JOIN assignments a ON a.id = asub.assignment_id
                          JOIN courses c ON c.id = a.course_id
                          WHERE c.instructor_id = ?
                            AND asub.submitted_at >= DATE_SUB(CURRENT_DATE, INTERVAL 6 DAY)
                          GROUP BY DATE(asub.submitted_at)
                          ORDER BY DATE(asub.submitted_at)");
    $stmt->execute([$instructor_id]);
    $activity_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT a.title, a.due_date, 'assignment' as type
                          FROM assignments a
                          JOIN courses c ON c.id = a.course_id
                          WHERE c.instructor_id = ?
                            AND a.due_date >= CURRENT_DATE
                          ORDER BY a.due_date ASC
                          LIMIT 3");
    $stmt->execute([$instructor_id]);
    $upcoming_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT u.id, u.username, u.email,
                          MAX(asub.submitted_at) as last_active,
                          CASE WHEN MAX(asub.submitted_at) >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
                               THEN 'Active' ELSE 'Inactive'
                          END as status
                          FROM users u
                          JOIN enrollments ce ON u.id = ce.user_id
                          JOIN courses c ON ce.course_id = c.id
                          LEFT JOIN (SELECT scoped_sub.user_id, MAX(scoped_sub.submitted_at) AS last_active FROM assignment_submissions scoped_sub JOIN assignments scoped_a ON scoped_a.id = scoped_sub.assignment_id JOIN courses scoped_c ON scoped_c.id = scoped_a.course_id WHERE scoped_c.instructor_id = ? GROUP BY scoped_sub.user_id) asub ON asub.user_id = u.id
                          WHERE c.instructor_id = ? AND u.role = 'student'
                          GROUP BY u.id, u.username, u.email, asub.last_active
                          ORDER BY last_active DESC, u.username ASC
                          LIMIT 10");
    $stmt->execute([$instructor_id, $instructor_id]);
    $recent_students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('Dashboard error: ' . $e->getMessage());
    $error = 'Error loading dashboard data';
}

include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');

$activityByDate = [];
foreach ($activity_data as $day) $activityByDate[$day['day']] = (int)($day['active_students'] ?? 0);
$chart_labels = [];
$chart_data = [];
$today = new DateTimeImmutable('today');
for ($daysAgo = 6; $daysAgo >= 0; $daysAgo--) {
    $day = $today->modify('-' . $daysAgo . ' days');
    $chart_labels[] = $day->format('D');
    $chart_data[] = $activityByDate[$day->format('Y-m-d')] ?? 0;
}
?>

    <main class="main-content flex-fill">
      <div class="container-fluid p-4">
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="card p-3 shadow-sm">
              <h6 class="mb-1">My Students</h6>
              <h3 class="mb-0"><?php echo htmlspecialchars($student_count); ?></h3>
              <small class="text-success">Active Students</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3 shadow-sm">
              <h6 class="mb-1">My Courses</h6>
              <h3 class="mb-0"><?php echo htmlspecialchars($course_stats['total_courses']); ?></h3>
              <small class="text-muted"><?php echo htmlspecialchars($course_stats['draft_courses']); ?> drafts</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3 shadow-sm">
              <h6 class="mb-1">Pending Reviews</h6>
              <h3 class="mb-0"><?php echo htmlspecialchars($pending_reviews); ?></h3>
              <?php if ($pending_reviews > 0): ?>
                <small class="text-danger">Needs attention</small>
              <?php else: ?>
                <small class="text-success">All caught up!</small>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="row mt-4 g-3">
          <div class="col-lg-8">
            <div class="card p-3 shadow-sm">
              <h6>Student Activity</h6>
              <script type="application/json" id="activityChartData"><?= json_encode(["labels" => $chart_labels, "data" => $chart_data], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script><div class="instructor-chart-frame"><canvas id="activityChart" role="img" aria-label="Active enrolled students by day for the last seven days"></canvas></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card p-3 shadow-sm">
              <h6>Upcoming Tasks</h6>
              <ul class="list-group list-group-flush">
                <?php if (empty($upcoming_tasks)): ?>
                  <li class="list-group-item text-muted">No upcoming tasks</li>
                <?php else: ?>
                  <?php foreach ($upcoming_tasks as $task): ?>
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <i class="fas fa-<?php echo ($task['type'] ?? 'assignment') === 'assignment' ? 'tasks' : 'bell'; ?> me-2"></i>
                          <?php echo htmlspecialchars($task['title']); ?>
                        </div>
                        <small class="text-muted">
                          <?php echo !empty($task['due_date']) ? date('M j', strtotime($task['due_date'])) : 'TBD'; ?>
                        </small>
                      </div>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12">
            <div class="card p-3 shadow-sm">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="mb-0">My Students</h6>
                <div class="d-flex gap-2">
                  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
                  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAssignmentModal">Add Assignment</button>
                  <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exportDataModal">Export Data</button>
                  <input class="form-control form-control-sm" id="studentSearch" placeholder="Search students..." style="width:220px">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Last Active</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="studentsTable">
                    <?php if (empty($recent_students)): ?>
                      <tr><td colspan="5" class="text-center text-muted">No students found</td></tr>
                    <?php else: ?>
                      <?php foreach ($recent_students as $student): ?>
                        <tr>
                          <td><?php echo htmlspecialchars($student['username']); ?></td>
                          <td><?php echo htmlspecialchars($student['email']); ?></td>
                          <td>
                            <span class="badge bg-<?php echo ($student['status'] ?? 'Inactive') === 'Active' ? 'success' : 'secondary'; ?>">
                              <?php echo htmlspecialchars($student['status'] ?? 'Inactive'); ?>
                            </span>
                          </td>
                          <td><?php echo !empty($student['last_active']) ? date('Y-m-d', strtotime($student['last_active'])) : 'Never'; ?></td>
                          <td>
                            <div class="btn-group btn-group-sm">
                              <button class="btn btn-outline-primary" type="button" onclick="messageStudent(<?php echo (int)$student['id']; ?>)">
                                <i class="fas fa-envelope"></i>
                              </button>
                              <a href="../Students/performance/performance.php?id=<?php echo (int)$student['id']; ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-chart-line"></i>
                              </a>
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

      </div>
    </main>
  </div>

<?php
include(__DIR__ . '/../includes/footer/footer.php');
include(__DIR__ . '/../modals/add_student_modal/add_student_modal.php');
include(__DIR__ . '/../modals/add_assignment_modal/add_assignment_modal.php');
include(__DIR__ . '/../modals/export_data_modal/export_data_modal.php');
?>

<script>
  const studentSearchInput = document.getElementById('studentSearch');
  if (studentSearchInput) {
    studentSearchInput.addEventListener('input', function () {
      const search = this.value.toLowerCase();
      const rows = document.querySelectorAll('#studentsTable tr');
      rows.forEach((row) => {
        if (row.querySelector('td')) {
          const text = row.textContent.toLowerCase();
          row.style.display = text.includes(search) ? '' : 'none';
        }
      });
    });
  }

  function messageStudent(studentId) {
    window.location.href = '../Students/messages/messages.php?student_id=' + studentId;
  }
</script>


