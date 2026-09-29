<?php 
require_once(__DIR__ . '/../../Database/db/db.php');
require_once(__DIR__ . '/../../utils/logger/logger.php');

function time_elapsed_string(string $datetime, bool $full = false): string {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $weeks = (int)floor($diff->d / 7);
    $diff->d -= $weeks * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
      $amount = $k === 'w' ? $weeks : $diff->$k;
      if ($amount) {
        $v = $amount . ' ' . $v . ($amount > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

session_start();
$student_count = 0;
$page = max(1, (int)($_GET['page'] ?? 1));
$course_count = 0;
$instructor_count = 0;
$monthly_revenue = 0;
$revenue_change = 0;
$previousRevenue = 0;
$notifications = [];
$recent_activities = [];
$top_courses = [];
$enrollment_chart_labels = [];
$enrollment_chart_values = [];
$role_chart_labels = [];
$role_chart_values = [];
$revenue_chart_labels = [];
$revenue_chart_values = [];
$completion_rate = 0;
$unread_notification_count = 0;
$enrollment_months = [];
$enrollment_month_cursor = new DateTimeImmutable('first day of this month');
for ($offset = 11; $offset >= 0; $offset--) {
  $month = $enrollment_month_cursor->modify('-' . $offset . ' months');
  $enrollment_months[$month->format('Y-m')] = 0;
  $enrollment_chart_labels[] = $month->format('M Y');
}

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
  log_action('unknown', 'admin_dashboard_access', 'unauthorized');
  header('Location: /authenication/login/login.php');
  exit();
}

$pdo = get_db();
if (!$pdo) {
    log_action($_SESSION['username'], 'admin_dashboard_access', 'Database connection failed');
    $error = 'Database connection failed';
} else {
    log_action($_SESSION['username'], 'admin_dashboard_access', 'success');
    
  // Get dashboard statistics
  try {
    $trendStart = $enrollment_month_cursor->modify('-11 months')->format('Y-m-01 00:00:00');
    $trendEnd = $enrollment_month_cursor->modify('+1 month')->format('Y-m-d H:i:s');
    $trendStmt = $pdo->prepare("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month_key, COUNT(*) AS total FROM enrollments WHERE created_at >= ? AND created_at < ? GROUP BY month_key");
    $trendStmt->execute([$trendStart, $trendEnd]);
    foreach ($trendStmt->fetchAll(PDO::FETCH_ASSOC) as $trend) {
      if (array_key_exists($trend['month_key'], $enrollment_months)) $enrollment_months[$trend['month_key']] = (int)$trend['total'];
    }
    $enrollment_chart_values = array_values($enrollment_months);
    // Initialize defaults (in case some queries cannot run)
    // Count students
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'student'");
    $student_count = (int)($stmt->fetch()['count'] ?? 0);

    // Count courses (no status column assumed)
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM courses WHERE is_active = 1 AND is_published = 1");
    $course_count = (int)($stmt->fetch()['count'] ?? 0);

    // Count instructors
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'instructor'");
    $instructor_count = (int)($stmt->fetch()['count'] ?? 0);

    $roleCounts = ['student' => 0, 'instructor' => 0, 'admin' => 0];
    foreach ($pdo->query('SELECT role, COUNT(*) AS total FROM users GROUP BY role')->fetchAll(PDO::FETCH_ASSOC) as $roleRow) {
      if (array_key_exists($roleRow['role'], $roleCounts)) $roleCounts[$roleRow['role']] = (int)$roleRow['total'];
    }
    $role_chart_labels = array_map('ucfirst', array_keys($roleCounts));
    $role_chart_values = array_values($roleCounts);

    $enrollments_exists = (bool)$pdo->query("SHOW TABLES LIKE 'enrollments'")->fetch();
    $monthStart = $enrollment_month_cursor->format('Y-m-01 00:00:00');
    $nextMonth = $enrollment_month_cursor->modify('+1 month')->format('Y-m-d H:i:s');
    $previousMonthStart = $enrollment_month_cursor->modify('-1 month')->format('Y-m-01 00:00:00');
    $revenueStmt = $pdo->prepare("SELECT COALESCE(SUM(final_amount), 0) FROM payments WHERE status = 'paid' AND paid_at >= ? AND paid_at < ? AND currency = 'GHS'");
    $revenueStmt->execute([$monthStart, $nextMonth]); $monthly_revenue = (float)$revenueStmt->fetchColumn();
    $revenueStmt->execute([$previousMonthStart, $monthStart]); $previousRevenue = (float)$revenueStmt->fetchColumn();
    $revenue_change = $previousRevenue > 0 ? (($monthly_revenue - $previousRevenue) / $previousRevenue) * 100 : 0;
    $revenueMonths = array_fill_keys(array_keys($enrollment_months), 0.0);
    $revenueTrendStmt = $pdo->prepare("SELECT DATE_FORMAT(paid_at, '%Y-%m') AS month_key, SUM(final_amount) AS total FROM payments WHERE status = 'paid' AND currency = 'GHS' AND paid_at >= ? AND paid_at < ? GROUP BY month_key");
    $revenueTrendStmt->execute([$trendStart, $trendEnd]);
    foreach ($revenueTrendStmt->fetchAll(PDO::FETCH_ASSOC) as $revenueRow) {
      if (array_key_exists($revenueRow['month_key'], $revenueMonths)) $revenueMonths[$revenueRow['month_key']] = (float)$revenueRow['total'];
    }
    $revenue_chart_labels = $enrollment_chart_labels;
    $revenue_chart_values = array_values($revenueMonths);
    $completionStmt = $pdo->query("SELECT COUNT(*) AS total, COALESCE(SUM(status = 'completed'), 0) AS completed FROM enrollments");
    $completionSummary = $completionStmt->fetch(PDO::FETCH_ASSOC);
    $completion_rate = (int)$completionSummary['total'] > 0 ? ((int)$completionSummary['completed'] / (int)$completionSummary['total']) * 100 : 0;
    $noticeStmt = $pdo->prepare('SELECT title, message, read_at, created_at FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT 5');
    $noticeStmt->execute([(int)($_SESSION['user_id'] ?? 0)]); $notifications = $noticeStmt->fetchAll(PDO::FETCH_ASSOC);
    $unreadStmt = $pdo->prepare('SELECT COUNT(*) FROM notifications WHERE user_id = ? AND read_at IS NULL');
    $unreadStmt->execute([(int)($_SESSION['user_id'] ?? 0)]);
    $unread_notification_count = (int)$unreadStmt->fetchColumn();

    // Get recent activity if audit_logs table exists
    $audit_exists = (bool)$pdo->query("SHOW TABLES LIKE 'audit_logs'")->fetch();
    if ($audit_exists) {
            $stmt = $pdo->query("SELECT a.action, a.details, a.timestamp, u.username, u.full_name AS actor_name 
              FROM audit_logs a 
              LEFT JOIN users u ON a.user_id = u.id 
              ORDER BY a.timestamp DESC LIMIT 5");
      $recent_activities = $stmt->fetchAll();
    }

    // Get top courses only if enrollments exists
    if ($enrollments_exists) {
      $stmt = $pdo->query("SELECT c.title, COUNT(e.id) as enrollment_count 
                FROM courses c 
                LEFT JOIN enrollments e ON c.id = e.course_id 
                GROUP BY c.id 
                HAVING COUNT(e.id) > 0
                ORDER BY enrollment_count DESC 
                LIMIT 3");
      $top_courses = $stmt->fetchAll();
    } else {
      $top_courses = [];
    }

  } catch (PDOException $e) {
    log_action($_SESSION['username'], 'admin_dashboard_stats', $e->getMessage());
    $error = 'Error loading dashboard statistics';
  }
}
$pageTitle = 'Admin overview';
include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php'); 
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>

    <main class="main-content flex-fill admin-dashboard-main">
      <?php if(isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($error) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="container-fluid admin-dashboard-container">
      <section class="admin-dashboard-heading" aria-labelledby="adminOverviewTitle">
        <div>
          <span class="admin-dashboard-kicker">ADMIN OVERVIEW</span>
          <h1 id="adminOverviewTitle">Dashboard overview</h1>
          <p>Your academy at a glance. Here is the latest activity and performance.</p><span class="admin-dashboard-date"><i class="bi bi-calendar3" aria-hidden="true"></i><?= date("l, F j, Y") ?></span>
        </div>
        <div class="admin-dashboard-actions" aria-label="Quick actions"><button type="button" class="btn btn-light admin-refresh-action" onclick="window.location.reload()"><i class="bi bi-arrow-clockwise" aria-hidden="true"></i><span>Refresh</span></button>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-person-plus" aria-hidden="true"></i><span>Add user</span></button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal"><i class="bi bi-journal-plus" aria-hidden="true"></i><span>Add course</span></button>
          <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exportDataModal"><i class="bi bi-download" aria-hidden="true"></i><span>Export</span></button>
        </div>
      </section>
        <div class="row g-3 admin-stat-grid">
          <div class="col-md-3">
            <div class="card shadow-sm p-3">
              <span class="admin-stat-icon"><i class="bi bi-people-fill" aria-hidden="true"></i></span><h6 class="mb-1">Total students</h6>
              <h3 class="mb-0"><?= number_format($student_count) ?></h3>
              <?php
              // Get last month's count
              $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'student' AND MONTH(created_at) = MONTH(CURRENT_DATE) AND YEAR(created_at) = YEAR(CURRENT_DATE)");
              $new_students = $stmt->fetch()['count'];
              if ($new_students > 0):
              ?>
              <small class="text-success">+<?= $new_students ?> this month</small>
              <?php else: ?>
              <small class="text-muted">No change</small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-sm p-3">
              <span class="admin-stat-icon"><i class="bi bi-journal-bookmark-fill" aria-hidden="true"></i></span><h6 class="mb-1">Active courses</h6>
              <h3 class="mb-0"><?= number_format($course_count) ?></h3>
              <?php
              // Count new courses this month (no status column assumed)
              $stmt = $pdo->query("SELECT COUNT(*) as count FROM courses WHERE MONTH(created_at) = MONTH(CURRENT_DATE) AND YEAR(created_at) = YEAR(CURRENT_DATE)");
              $new_courses = $stmt->fetch()['count'] ?? 0;
              if ($new_courses > 0):
              ?>
              <small class="text-success">+<?= $new_courses ?> this month</small>
              <?php else: ?>
              <small class="text-muted">No change</small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-sm p-3">
              <span class="admin-stat-icon"><i class="bi bi-person-video3" aria-hidden="true"></i></span><h6 class="mb-1">Instructors</h6>
              <h3 class="mb-0"><?= number_format($instructor_count) ?></h3>
              <?php
              $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'instructor' AND MONTH(created_at) = MONTH(CURRENT_DATE) AND YEAR(created_at) = YEAR(CURRENT_DATE)");
              $new_instructors = $stmt->fetch()['count'];
              if ($new_instructors > 0):
              ?>
              <small class="text-success">+<?= $new_instructors ?> this month</small>
              <?php else: ?>
              <small class="text-muted">No change</small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-sm p-3">
              <span class="admin-stat-icon"><i class="bi bi-currency-exchange" aria-hidden="true"></i></span><h6 class="mb-1">Revenue this month</h6>
              <h3 class="mb-0">GHS <?= number_format($monthly_revenue, 2) ?></h3>
              <?php
              // Get last month's revenue
              if ($previousRevenue > 0 && $revenue_change > 0):
              ?>
              <small class="text-success"><i class="bi bi-arrow-up-right"></i> +<?= number_format($revenue_change, 1) ?>% vs last month</small>
              <?php elseif ($previousRevenue > 0 && $revenue_change < 0): ?>
              <small class="text-danger"><i class="bi bi-arrow-down-right"></i> <?= number_format($revenue_change, 1) ?>% vs last month</small>
              <?php elseif ($monthly_revenue > 0): ?>
              <small class="text-success">Revenue received this month</small>
              <?php else: ?>
              <small class="text-muted">No revenue recorded this month</small>
              <?php endif; ?>
            </div>
          </div>
        </div>

  <div class="row g-3 mt-2 admin-extra-charts">
    <div class="col-lg-8"><section class="card admin-extra-chart-card h-100" aria-labelledby="revenueChartTitle">
      <div class="admin-chart-heading"><div><span class="admin-chart-kicker">FINANCIAL OVERVIEW</span><h2 id="revenueChartTitle">Revenue trend</h2></div><div class="admin-chart-tools"><label class="visually-hidden" for="adminRevenueRange">Revenue chart range</label><select id="adminRevenueRange" class="form-select form-select-sm"><option value="12">12 months</option><option value="6">6 months</option></select><button type="button" class="btn btn-sm btn-outline-secondary" id="exportRevenueCsv"><i class="bi bi-download" aria-hidden="true"></i><span class="visually-hidden">Download revenue chart CSV</span></button></div></div>
      <script type="application/json" id="revenueChartData"><?= json_encode(['labels' => $revenue_chart_labels, 'values' => $revenue_chart_values], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
      <div class="admin-secondary-chart-frame"><canvas id="revenueTrendChart" role="img" aria-label="Monthly revenue in Ghana cedis"></canvas><?php if (array_sum($revenue_chart_values) <= 0): ?><span class="admin-chart-empty">No paid revenue recorded in this period</span><?php endif; ?></div>
    </section></div>
    <div class="col-lg-4"><section class="card admin-extra-chart-card h-100" aria-labelledby="userCompositionTitle">
      <div class="admin-chart-heading"><div><span class="admin-chart-kicker">COMMUNITY</span><h2 id="userCompositionTitle">User composition</h2></div></div>
      <script type="application/json" id="roleChartData"><?= json_encode(['labels' => $role_chart_labels, 'values' => $role_chart_values], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
      <div class="admin-secondary-chart-frame admin-doughnut-frame"><canvas id="userCompositionChart" role="img" aria-label="Users by account role"></canvas><?php if (array_sum($role_chart_values) === 0): ?><span class="admin-chart-empty">No user accounts to display</span><?php endif; ?></div>
      <p class="admin-chart-note">Accounts grouped by role</p>
    </section></div>
  </div>
  <section class="admin-completion-card" aria-label="Enrollment completion rate"><span class="admin-completion-icon"><i class="bi bi-check2-circle" aria-hidden="true"></i></span><div class="admin-completion-copy"><strong>Enrollment completion</strong><span><?= number_format($completion_rate, 1) ?>% of all enrollments are completed</span></div><div class="progress" role="progressbar" aria-label="Enrollment completion rate" aria-valuenow="<?= (int)round($completion_rate) ?>" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar" style="width:<?= min(100, max(0, $completion_rate)) ?>%"></div></div></section>
  <div class="row mt-4 g-3 admin-insight-grid">
          <div class="col-lg-8">
            <div class="card p-3 shadow-sm mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <h6>Enrollment Trend</h6>
                <span class="badge bg-info">Last 12 months</span>
              </div>
              <div class="enrollment-chart-frame"><script type="application/json" id="enrollmentChartData"><?= json_encode(["labels" => $enrollment_chart_labels, "values" => $enrollment_chart_values], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script><canvas id="enrollmentChart" role="img" aria-label="Monthly enrollment trend"></canvas><?php if (array_sum($enrollment_chart_values) === 0): ?><span class="admin-chart-empty">No enrollment records in this period</span><?php endif; ?></div>
              <div class="mt-2 small text-muted">Legend: <span class="me-2"><span class="badge bg-success">New</span> New Enrollments</span> <span class="badge bg-primary">Returning</span> Returning Students</div>
            </div>
            <div class="card p-3 shadow-sm">
              <div class="admin-panel-heading"><h6>Recent activity</h6><a href="/Admin-dashboard/audit_logs/audit_logs.php">View audit log <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a></div>
              <ul class="list-group list-group-flush">
                <?php $recent_activities = $recent_activities ?? []; if (!$recent_activities): ?>
                <li class="list-group-item"><div class="admin-empty-state"><i class="bi bi-activity" aria-hidden="true"></i><span>No recent admin activity.</span></div></li><?php endif; ?>
                <?php foreach ($recent_activities as $activity): ?>
                <li class="list-group-item">
                  <?php
                  $user_name = htmlspecialchars($activity['actor_name'] ?: ($activity['username'] ?? 'Unknown user'), ENT_QUOTES, 'UTF-8');
                  $time_ago = time_elapsed_string($activity['timestamp']);
                  echo sprintf(
                    '%s: <b>%s</b> %s',
                    htmlspecialchars(ucfirst($activity['action'])),
                    $user_name,
                    htmlspecialchars($activity['details'])
                  );
                  ?>
                  <span class="text-muted float-end"><?= $time_ago ?></span>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card p-3 shadow-sm mb-3">
              <div class="admin-panel-heading"><h6>Top courses</h6><a href="/Admin-dashboard/Courses/all_courses/all_courses.php">View all <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a></div>
              <?php 
              $max_enrollments = 0;
              $top_courses = $course_count > 0 ? $top_courses : [];
              foreach ($top_courses as $course) {
                  $max_enrollments = max($max_enrollments, $course['enrollment_count']);
              }
              if (!$top_courses) echo '<div class="admin-empty-state"><i class="bi bi-journal-x" aria-hidden="true"></i><span>No course enrollment data yet.</span></div>';
              foreach ($top_courses as $index => $course):
                  $percentage = $max_enrollments > 0 ? ($course['enrollment_count'] / $max_enrollments * 100) : 0;
                  $colors = ['bg-primary', 'bg-info', 'bg-warning'];
              ?>
              <div class="mb-2">
                <?= htmlspecialchars($course['title']) ?> 
                <span class="float-end"><?= number_format($course['enrollment_count']) ?></span>
                <div class="progress" style="height:6px;">
                  <div class="progress-bar <?= $colors[$index] ?>" style="width:<?= $percentage ?>%"></div>
                </div>
              </div>
              <?php endforeach; ?>
              </div>
            </div>
            <div class="card p-3 shadow-sm">
              <div class="admin-panel-heading"><h6>Notifications</h6><a href="/Admin-dashboard/Messaging/inbox/inbox.php">Open inbox <?php if ($unread_notification_count > 0): ?><span class="admin-unread-count"><?= (int)$unread_notification_count ?></span><?php endif; ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a></div>
              <ul class="list-group list-group-flush">
                <?php if (!$notifications): ?><li class="list-group-item"><div class="admin-empty-state"><i class="bi bi-bell-slash" aria-hidden="true"></i><span>No recent notifications.</span></div></li><?php endif; ?>
                <?php foreach ($notifications as $notification): ?><li class="list-group-item"><strong><?= htmlspecialchars($notification['title'], ENT_QUOTES, 'UTF-8') ?></strong><small class="d-block text-muted"><?= htmlspecialchars($notification['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></small></li><?php endforeach; ?>
              </ul>
            </div>
            <div class="card p-3 shadow-sm mt-3"><h6>System status</h6><ul class="list-group list-group-flush"><li class="list-group-item">Database <span class="badge <?= isset($error) ? 'bg-danger' : 'bg-success' ?> float-end"><?= isset($error) ? 'Check' : 'Connected' ?></span></li><li class="list-group-item">PHP runtime <span class="badge bg-secondary float-end"><?= htmlspecialchars(PHP_VERSION, ENT_QUOTES, 'UTF-8') ?></span></li></ul></div>
          </div>
        </div>

        <!-- USER DETAILS MODAL -->
        <div class="modal fade" id="userViewModal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
              <div class="modal-header">
                <h5 class="modal-title fw-bold">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body" id="userViewContent">
                Loading...
              </div>
            </div>
          </div>
        </div>

        <script>
        const userSearch = document.getElementById('userSearch');
        const roleFilter = document.getElementById('roleFilter');
        const usersTable = document.getElementById('usersTable');
        if (userSearch && roleFilter && usersTable) {
          userSearch.addEventListener('input', function() {
            const search = userSearch.value.toLowerCase();
            const role = roleFilter.value;
            usersTable.querySelectorAll('tbody tr').forEach(row => {
              const matchText = row.textContent.toLowerCase().includes(search);
              const matchRole = !role || row.dataset.role === role;
              row.style.display = matchText && matchRole ? '' : 'none';
            });
          });
          roleFilter.addEventListener('change', () => userSearch.dispatchEvent(new Event('input')));
        }

        function viewUser(id) {
          const modal = new bootstrap.Modal(document.getElementById('userViewModal'));
          const content = document.getElementById('userViewContent');
          content.innerHTML = 'Loading...';
          modal.show();

          fetch(`/api/users/users.php?id=${id}`)
            .then(r => r.json())
            .then(user => {
              content.innerHTML = `
                <div class="text-center mb-3">
                  <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                    <i class="fas fa-user fa-2x text-secondary"></i>
                  </div>
                  <h5 class="mt-2 mb-0">${user.username}</h5>
                  <span class="badge bg-${user.role === 'admin' ? 'danger' : user.role === 'instructor' ? 'success' : 'primary'}">${user.role}</span>
                </div>
                <dl class="row">
                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8">${user.email}</dd>
                  <dt class="col-sm-4">Joined</dt>
                  <dd class="col-sm-8">${new Date(user.created_at).toLocaleDateString()}</dd>
                </dl>`;
            })
            .catch(() => content.innerHTML = '<div class="alert alert-danger">Error loading user details</div>');
        }

        function editUser(id) {
          window.location.href = `/Admin-dashboard/user_management/user_management.php?id=${encodeURIComponent(id)}`;
        }

        function exportData() {
         // Export Data: download users and courses as CSV
         window.location.href = 'export.php';
        }
        </script>

      </div>        
    </main>

<?php
// Keep modal markup inside the document, before the shared footer closes it.
include(__DIR__ . '/../../Admin-dashboard/Modals/add_user_modal/add_user_modal.php');
include(__DIR__ . '/../../Admin-dashboard/Modals/add_course_modal/add_course_modal.php');
include(__DIR__ . '/../../Admin-dashboard/Modals/export_data_modal/export_data_modal.php');
include(__DIR__ . '/../includes/footer/footer.php');
?>

