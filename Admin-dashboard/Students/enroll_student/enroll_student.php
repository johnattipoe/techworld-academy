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

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = (int)($_POST['user_id'] ?? 0);
    $course_id = (int)($_POST['course_id'] ?? 0);
    if ($user_id <= 0 || $course_id <= 0) {
        $error = 'Please select a student and a course.';
    } else {
		$check = $pdo->prepare('SELECT id FROM enrollments WHERE user_id = ? AND course_id = ?');
        $check->execute([$user_id, $course_id]);
        if ($check->fetch()) {
            $error = 'This student is already enrolled in that course.';
        } else {
			$stmt = $pdo->prepare('INSERT INTO enrollments (user_id, course_id, status, progress, created_at) VALUES (?, ?, "active", 0, NOW())');
            if ($stmt->execute([$user_id, $course_id])) {
                $message = 'Student enrolled successfully.';
            } else {
                $error = 'Unable to enroll student.';
            }
        }
    }
}

$students = $pdo->prepare('SELECT id, username, email FROM users WHERE role = ? ORDER BY username ASC');
$students->execute(['student']);
$students = $students->fetchAll(PDO::FETCH_ASSOC);

$courses = $pdo->query('SELECT id, title FROM courses ORDER BY title ASC')->fetchAll(PDO::FETCH_ASSOC);

$recent = $pdo->prepare('SELECT ce.id, u.username, u.email, c.title AS course_title, ce.created_at AS enrolled_at FROM enrollments ce JOIN users u ON u.id = ce.user_id JOIN courses c ON c.id = ce.course_id ORDER BY ce.created_at DESC LIMIT 10');
$recent->execute();
$recent_enrollments = $recent->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Enroll a student';
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../../includes/navbar/navbar.php';
include __DIR__ . '/../../includes/sidebar/sidebar.php';
?>
<main class="main-content flex-fill">
	<div class="container-fluid p-4">
		<h2>Enroll Student</h2>
		<?php if ($message): ?>
			<div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
		<?php elseif ($error): ?>
			<div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
		<?php endif; ?>
		<form method="POST" class="row g-3 mb-4">
			<div class="col-md-4">
				<select name="user_id" class="form-select" required>
					<option value="">Select Student</option>
					<?php foreach ($students as $student): ?>
						<option value="<?php echo (int)$student['id']; ?>"><?php echo htmlspecialchars($student['username']); ?> (<?php echo htmlspecialchars($student['email']); ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md-4">
				<select name="course_id" class="form-select" required>
					<option value="">Select Course</option>
					<?php foreach ($courses as $course): ?>
						<option value="<?php echo (int)$course['id']; ?>"><?php echo htmlspecialchars($course['title']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md-4">
				<button class="btn btn-success w-100" type="submit">Enroll</button>
			</div>
		</form>
		<div class="card shadow-sm">
			<div class="card-body">
				<h5>Recent Enrollments</h5>
				<table class="table table-hover">
					<thead><tr><th>Name</th><th>Email</th><th>Course</th><th>Date</th></tr></thead>
					<tbody>
						<?php if (empty($recent_enrollments)): ?>
							<tr><td colspan="4" class="text-center text-muted">No enrollments yet.</td></tr>
						<?php else: ?>
						<?php foreach ($recent_enrollments as $row): ?>
							<tr>
								<td><?php echo htmlspecialchars($row['username']); ?></td>
								<td><?php echo htmlspecialchars($row['email']); ?></td>
								<td><?php echo htmlspecialchars($row['course_title']); ?></td>
								<td><?php echo date('Y-m-d', strtotime($row['enrolled_at'])); ?></td>
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