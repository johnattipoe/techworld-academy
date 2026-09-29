<?php
// announcements.php
session_start();
if (!isset($_SESSION['username']) || !in_array($_SESSION['role'], ['admin', 'instructor'])) {
    header('Location: ../authenication/login.php');
    exit();
}

require_once(__DIR__ . '/../../../Database/db/db.php');
require_once dirname(__DIR__, 2) . '/includes/csrf/csrf.php';
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$message = '';
$message_type = '';
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$csrf_token = generate_csrf_token();

// Handle announcement creation (admin only)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_announcement']) && $is_admin) {
    $token = $_POST['csrf_token'] ?? '';
    if (!validate_csrf_token($token)) {
        $message = 'Invalid security token. Please refresh and try again.';
        $message_type = 'error';
    } else {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $course_id = isset($_POST['course_id']) && $_POST['course_id'] !== '' ? intval($_POST['course_id']) : null;
        $priority = trim($_POST['priority'] ?? 'medium');
        $allowed_priority = ['low', 'medium', 'high'];
        if (!in_array($priority, $allowed_priority, true)) {
            $priority = 'medium';
        }
        $admin_id = $_SESSION['user_id'] ?? 1;

        if (empty($title) || empty($content)) {
            $message = 'Title and content are required!';
            $message_type = 'error';
        } else {
            $stmt = $pdo->prepare('INSERT INTO announcements (title, content, course_id, priority, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())');
            if ($stmt->execute([$title, $content, $course_id, $priority, $admin_id])) {
                $message = 'Announcement created successfully!';
                $message_type = 'success';
            } else {
                $message = 'Error creating announcement.';
                $message_type = 'error';
            }
        }
    }
}

// Handle announcement deletion (admin only)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_announcement']) && $is_admin) {
    $token = $_POST['csrf_token'] ?? '';
    $announcement_id = intval($_POST['announcement_id'] ?? 0);
    if (!validate_csrf_token($token)) {
        $message = 'Invalid security token. Please refresh and try again.';
        $message_type = 'error';
    } elseif ($announcement_id <= 0) {
        $message = 'Invalid announcement selected.';
        $message_type = 'error';
    } else {
        $delete_stmt = $pdo->prepare('DELETE FROM announcements WHERE id = ?');
        if ($delete_stmt->execute([$announcement_id])) {
            $message = 'Announcement deleted successfully!';
            $message_type = 'success';
        } else {
            $message = 'Error deleting announcement.';
            $message_type = 'error';
        }
    }
}

// Pagination
$announcements_per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $announcements_per_page;

// Fetch total count
// Fetch total count using PDO
$count_stmt = $pdo->query('SELECT COUNT(*) as total FROM announcements');
$total_announcements = (int)$count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = (int)ceil($total_announcements / $announcements_per_page);

// Fetch announcements
$announcements_stmt = $pdo->prepare('SELECT a.id, a.title, a.content, a.course_id, a.priority, a.created_by, a.created_at, a.updated_at, c.title as course_name, u.username as admin_name
    FROM announcements a
    LEFT JOIN courses c ON a.course_id = c.id
    LEFT JOIN users u ON a.created_by = u.id
    ORDER BY a.priority DESC, a.created_at DESC
    LIMIT :offset, :limit');
$announcements_stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$announcements_stmt->bindValue(':limit', $announcements_per_page, PDO::PARAM_INT);
$announcements_stmt->execute();
$announcements = $announcements_stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch courses for dropdown
$courses_stmt = $pdo->query("SELECT id, title FROM courses WHERE status LIKE '%active%' ORDER BY title ASC");
$courses = $courses_stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Announcements';
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<main class="main-content flex-fill">
    <div class="container-fluid p-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2>Announcements</h2>
            </div>
            <?php if ($is_admin): ?>
                <div class="col-md-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAnnouncementModal">Create Announcement</button>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo ($message_type === 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>All Announcements (<?php echo $total_announcements; ?>)</h5>
                    <span class="text-muted">Page <?php echo $page; ?> of <?php echo $total_pages; ?></span>
                </div>

                <?php if (!empty($announcements)): ?>
                    <div class="list-group">
                        <?php foreach ($announcements as $row): 
                            $priority_color = (($row['priority'] ?? '') === 'high') ? 'danger' : ((($row['priority'] ?? '') === 'medium') ? 'warning' : 'info');
                            $is_recent = strtotime($row['created_at'] ?? 'now') > strtotime('-7 days') ? true : false;
                        ?>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="mb-2">
                                            <h6 class="mb-1">
                                                <?php echo htmlspecialchars($row['title']); ?>
                                                <?php if ($is_recent): ?>
                                                    <span class="badge bg-success">New</span>
                                                <?php endif; ?>
                                                <span class="badge bg-<?php echo $priority_color; ?>"><?php echo ucfirst($row['priority']); ?></span>
                                                <?php if ($row['course_id']): ?>
                                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($row['course_name']); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">General</span>
                                                <?php endif; ?>
                                            </h6>
                                        </div>
                                        <p class="text-muted mb-2"><?php echo nl2br(htmlspecialchars(substr($row['content'], 0, 150))); ?>...</p>
                                        <small class="text-muted">
                                            Posted by <?php echo htmlspecialchars($row['admin_name']); ?> on <?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?>
                                            <?php if ($row['updated_at'] != $row['created_at']): ?>
                                                | Updated <?php echo date('M d, Y H:i', strtotime($row['updated_at'])); ?>
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                    <?php if ($is_admin): ?>
                                        <div class="ms-3">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal<?php echo $row['id']; ?>">View</button>
                                            <form method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                                                <input type="hidden" name="announcement_id" value="<?php echo (int)$row['id']; ?>">
                                                <button type="submit" name="delete_announcement" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <div class="ms-3">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal<?php echo $row['id']; ?>">View</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- View Announcement Modal -->
                            <div class="modal fade" id="viewAnnouncementModal<?php echo $row['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                                            <hr>
                                            <small class="text-muted">
                                                Posted by <?php echo htmlspecialchars($row['admin_name']); ?> on <?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?>
                                            </small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">No announcements found.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=1">First</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                        <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</main>

<!-- Create Announcement Modal (Admin Only) -->
<?php if ($is_admin): ?>
<div class="modal fade" id="createAnnouncementModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Announcement title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content *</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Announcement content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course (Optional)</label>
                        <select class="form-control" id="course_id" name="course_id">
                            <option value="">General Announcement</option>
                            <?php 
                            if (!empty($courses)) {
                                foreach ($courses as $course) {
                                    echo "<option value='" . $course['id'] . "'>" . htmlspecialchars($course['title']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control" id="priority" name="priority">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="create_announcement" class="btn btn-primary">Create Announcement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<?php 
include(__DIR__ . '/../../includes/footer/footer.php');
?>