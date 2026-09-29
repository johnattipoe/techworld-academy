<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../../Database/db/db.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$search = trim($_GET['search'] ?? '');
$course_filter = trim($_GET['course'] ?? '');

$where = ['u.role = ?'];
$params = ['student'];
if ($search !== '') {
    $where[] = '(u.username LIKE ? OR u.email LIKE ? OR u.full_name LIKE ?)';
    $params[] = '%' . $search . '%';
    $params[] = '%' . $search . '%';
    $params[] = '%' . $search . '%';
}
if ($course_filter !== '') {
    $where[] = 'c.title LIKE ?';
    $params[] = '%' . $course_filter . '%';
}

$sql = 'SELECT u.id, u.username, u.full_name, u.email, c.title AS course_title, ce.progress, ce.updated_at FROM enrollments ce JOIN users u ON u.id = ce.user_id JOIN courses c ON c.id = ce.course_id WHERE ' . implode(' AND ', $where) . ' ORDER BY u.username ASC, c.title ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$progress_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$progress_count = count($progress_rows);
$average_progress = $progress_count ? array_sum(array_map(static fn($row) => (float)($row['progress'] ?? 0), $progress_rows)) / $progress_count : 0;
$on_track_count = count(array_filter($progress_rows, static fn($row) => (float)($row['progress'] ?? 0) >= 80));

$courses = $pdo->query('SELECT DISTINCT title FROM courses ORDER BY title ASC')->fetchAll(PDO::FETCH_COLUMN);

$pageTitle = 'Progress reports';
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../../includes/navbar/navbar.php';
include __DIR__ . '/../../includes/sidebar/sidebar.php';
?>
<main class="main-content flex-fill">
	<div class="container-fluid p-4">
		<div class="page-heading"><div><span class="page-kicker">LEARNER OUTCOMES</span><h1>Progress reports</h1><p>Filter learner progress by name and course.</p></div><a class="btn btn-light" href="/Admin-dashboard/Reports/performance_metrics/performance_metrics.php">Course performance</a></div>
        <div class="row g-3 mb-4"><div class="col-md-4"><div class="metric-card"><span class="metric-icon purple"><i class="fa-solid fa-list-check"></i></span><span class="metric-label">Progress records</span><strong><?php echo number_format($progress_count); ?></strong><small>Matching the current filters</small></div></div><div class="col-md-4"><div class="metric-card"><span class="metric-icon blue"><i class="fa-solid fa-chart-line"></i></span><span class="metric-label">Average progress</span><strong><?php echo number_format($average_progress, 1); ?>%</strong><small>Across matching enrollments</small></div></div><div class="col-md-4"><div class="metric-card"><span class="metric-icon green"><i class="fa-solid fa-circle-check"></i></span><span class="metric-label">On track</span><strong><?php echo number_format($on_track_count); ?></strong><small>Progress at or above 80%</small></div></div></div>
		<form method="GET" class="row mb-3 g-2">
			<div class="col-md-4">
				<input type="text" name="search" class="form-control" placeholder="Search student..." value="<?php echo htmlspecialchars($search); ?>">
			</div>
			<div class="col-md-3">
				<select name="course" class="form-select">
					<option value="">All Courses</option>
					<?php foreach ($courses as $course): ?>
						<option value="<?php echo htmlspecialchars($course); ?>" <?php echo $course_filter === $course ? 'selected' : ''; ?>><?php echo htmlspecialchars($course); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md-2">
				<button class="btn btn-success w-100" type="submit">Filter</button>
			</div>
		</form>
		<div class="card shadow-sm">
			<div class="card-body">
				<table class="table admin-table table-hover" data-admin-sort>
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Course</th>
							<th>Progress</th>
							<th>Last Updated</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($progress_rows)): ?>
							<tr><td colspan="5" class="text-center text-muted">No progress records found.</td></tr>
						<?php else: ?>
						<?php foreach ($progress_rows as $row): ?>
							<?php $progress = (float)($row['progress'] ?? 0); $status = $progress >= 80 ? 'On Track' : ($progress >= 50 ? 'Needs Attention' : 'Inactive'); $badge = $progress >= 80 ? 'success' : ($progress >= 50 ? 'warning' : 'secondary'); ?>
							<tr>
								<td><?php echo htmlspecialchars($row['full_name'] ?: $row['username']); ?></td>
								<td><?php echo htmlspecialchars($row['course_title']); ?></td>
								<td>
									<div class="d-flex align-items-center gap-2">
										<div class="progress flex-grow-1" style="height: 8px;">
											<div class="progress-bar bg-primary" style="width: <?php echo min(100, max(0, $progress)); ?>%"></div>
										</div>
										<span class="small fw-semibold"><?php echo number_format($progress, 0); ?>%</span>
									</div>
								</td>
								<td><?php echo !empty($row['updated_at']) ? date('Y-m-d', strtotime($row['updated_at'])) : '—'; ?></td>
								<td><span class="badge bg-<?php echo $badge; ?>"><?php echo htmlspecialchars($status); ?></span></td>
							</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php include __DIR__ . '/../../includes/footer/footer.php'; ?>