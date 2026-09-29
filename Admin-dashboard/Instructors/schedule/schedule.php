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

$stmt = $pdo->prepare('SELECT a.title, a.due_date, c.title AS course_title FROM assignments a JOIN courses c ON c.id = a.course_id WHERE a.due_date >= CURDATE() ORDER BY a.due_date ASC LIMIT 10');
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Instructor schedule';
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../../includes/navbar/navbar.php';
include __DIR__ . '/../../includes/sidebar/sidebar.php';
?>
<main class="main-content flex-fill">
	<div class="container-fluid p-4">
		<h2>Schedule</h2>
		<div class="row mb-4">
			<div class="col-md-8">
				<div class="card shadow-sm">
					<div class="card-body">
						<h5>Upcoming Assignments</h5>
						<div class="table-responsive">
							<table class="table table-hover mb-0">
								<thead>
									<tr><th>Course</th><th>Assignment</th><th>Due Date</th></tr>
								</thead>
								<tbody>
									<?php if (empty($events)): ?>
										<tr><td colspan="3" class="text-center text-muted">No upcoming assignments.</td></tr>
									<?php else: ?>
									<?php foreach ($events as $event): ?>
										<tr>
											<td><?php echo htmlspecialchars($event['course_title']); ?></td>
											<td><?php echo htmlspecialchars($event['title']); ?></td>
											<td><?php echo date('M d, Y', strtotime($event['due_date'])); ?></td>
										</tr>
									<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card shadow-sm">
					<div class="card-body">
						<h5>Upcoming Events</h5>
						<ul class="list-group list-group-flush">
							<?php if (empty($events)): ?>
								<li class="list-group-item text-muted">No upcoming events.</li>
							<?php else: ?>
							<?php foreach ($events as $event): ?>
								<li class="list-group-item d-flex justify-content-between align-items-center">
									<span><?php echo htmlspecialchars($event['title']); ?></span>
									<span class="badge bg-primary"><?php echo date('M d', strtotime($event['due_date'])); ?></span>
								</li>
							<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include __DIR__ . '/../../includes/footer/footer.php'; ?>