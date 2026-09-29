<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../../Database/db/db.php');
require_once(__DIR__ . '/../../includes/csrf/csrf.php');
$csrfToken = generate_csrf_token();
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = (string)($_POST['password'] ?? '');
    if (!validate_csrf_token($_POST['csrf_token'] ?? '')) {
        $error = 'Your session expired. Reload the page and try again.';
    }

    if ($error !== '') {
        // Keep the CSRF validation error for display.
    } elseif ($full_name === '' || $username === '' || $email === '' || $password === '') {
        $error = 'All fields are required.';
    } elseif (!preg_match('/^[a-zA-Z0-9_.-]{3,50}$/', $username)) {
        $error = 'Username must be 3 to 50 characters using letters, numbers, dots, underscores, or hyphens.';
    } elseif (strlen($password) < 10) {
        $error = 'Use a password with at least 10 characters.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $exists = $pdo->prepare('SELECT id FROM users WHERE email = ? OR username = ?');
        $exists->execute([$email, $username]);
        if ($exists->fetch()) {
            $error = 'An instructor with that email or username already exists.';
        } else {
            $stmt = $pdo->prepare('INSERT INTO users (username, email, password, full_name, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
            if ($stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT), $full_name, 'instructor'])) {
                $message = 'Instructor created successfully.';
            } else {
                $error = 'Unable to create instructor.';
            }
        }
    }
}

$stmt = $pdo->prepare('SELECT id, username, full_name, email, created_at FROM users WHERE role = ? ORDER BY created_at DESC LIMIT 10');
$stmt->execute(['instructor']);
$instructors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Add instructor';
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../../includes/navbar/navbar.php';
include __DIR__ . '/../../includes/sidebar/sidebar.php';
?>
<main class="main-content flex-fill">
	<div class="container-fluid p-4">
		<div class="page-heading"><div><span class="page-kicker">PEOPLE & ACCESS</span><h1>Add instructor</h1><p>Create an instructor account and review recently added instructors.</p></div><a class="btn btn-light" href="/Admin-dashboard/Instructors/all_instructors/all_instructors.php">View instructor directory</a></div>
		<?php if ($message): ?>
			<div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
		<?php elseif ($error): ?>
			<div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
		<?php endif; ?>
		<form method="POST" class="row g-3 mb-4"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
			<div class="col-md-3">
				<input type="text" name="full_name" class="form-control" placeholder="Instructor Name" required>
			</div>
			<div class="col-md-3">
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="col-md-3">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="col-md-2">
				<input type="password" name="password" class="form-control" placeholder="Password (10+ characters)" minlength="10" autocomplete="new-password" required>
			</div>
			<div class="col-md-1">
				<button class="btn btn-success w-100" type="submit">Add</button>
			</div>
		</form>
		<div class="card shadow-sm">
			<div class="card-body">
				<h5>Recent Instructors</h5>
				<table class="table table-hover">
					<thead><tr><th>Name</th><th>Username</th><th>Email</th><th>Date Added</th></tr></thead>
					<tbody>
						<?php if (empty($instructors)): ?>
							<tr><td colspan="4" class="text-center text-muted">No instructors found.</td></tr>
						<?php else: ?>
						<?php foreach ($instructors as $instructor): ?>
							<tr>
								<td><?php echo htmlspecialchars($instructor['full_name'] ?: $instructor['username']); ?></td>
								<td><?php echo htmlspecialchars($instructor['username']); ?></td>
								<td><?php echo htmlspecialchars($instructor['email']); ?></td>
								<td><?php echo date('Y-m-d', strtotime($instructor['created_at'])); ?></td>
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