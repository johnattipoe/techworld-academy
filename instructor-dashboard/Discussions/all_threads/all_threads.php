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
    'SELECT DISTINCT
        CASE WHEN m.sender_id = ? THEN m.receiver_id ELSE m.sender_id END AS participant_id,
        u.username AS participant_name,
        MAX(m.sent_at) AS last_message_at,
        COUNT(m.id) AS message_count
     FROM messages m
     JOIN users u ON u.id = CASE WHEN m.sender_id = ? THEN m.receiver_id ELSE m.sender_id END
     WHERE (m.sender_id = ? OR m.receiver_id = ?)
     GROUP BY participant_id, participant_name
     ORDER BY last_message_at DESC'
);
$stmt->execute([$instructor_id, $instructor_id, $instructor_id, $instructor_id]);
$threads = $stmt->fetchAll(PDO::FETCH_ASSOC);

include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">All Discussion Threads</h2>
      <a href="/instructor-dashboard/Discussions/start_discussion/start_discussion.php" class="btn btn-primary">Start Discussion</a>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <?php if (empty($threads)): ?>
          <div class="p-4 text-muted">No discussion threads yet.</div>
        <?php else: ?>
          <div class="list-group list-group-flush">
            <?php foreach ($threads as $thread): ?>
              <a href="/instructor-dashboard/Students/messages/messages.php?student_id=<?php echo (int)$thread['participant_id']; ?>" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="fw-semibold"><?php echo htmlspecialchars($thread['participant_name']); ?></div>
                    <small class="text-muted"><?php echo (int)$thread['message_count']; ?> messages</small>
                  </div>
                  <small class="text-muted"><?php echo date('M d, Y', strtotime($thread['last_message_at'])); ?></small>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/..\..\includes\footer\footer.php'); ?>