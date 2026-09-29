<?php
// send_message.php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../../authentication/login.php');
    exit();
}

require_once(__DIR__ . '/../../../Database/db/db.php');
$pdo = get_db();
if (!$pdo) {
  die('Database connection failed');
}

$sender_id = $_SESSION['user_id'] ?? 1;
$message = '';
$message_type = '';
$recipient_username = '';
$reply_to_id = isset($_GET['reply_to']) ? intval($_GET['reply_to']) : 0;
$reply_to_subject = '';
$reply_to_body = '';

// Fetch reply_to message if exists
if ($reply_to_id) {
  $stmt = $pdo->prepare('SELECT subject, body, sender_id FROM messages WHERE id = ?');
  $stmt->execute([$reply_to_id]);
  $reply_msg = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($reply_msg) {
    $recipient_stmt = $pdo->prepare('SELECT username FROM users WHERE id = ?');
    $recipient_stmt->execute([$reply_msg['sender_id']]);
    $recipient = $recipient_stmt->fetch(PDO::FETCH_ASSOC);
    if ($recipient) $recipient_username = $recipient['username'];
    $reply_to_subject = 'RE: ' . $reply_msg['subject'];
    $reply_to_body = "\n\n--- Original Message ---\n" . $reply_msg['body'];
  }
}

// Handle message sending
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_message'])) {
  $recipient_username = trim($_POST['recipient_username'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $body = trim($_POST['body'] ?? '');

  if (empty($recipient_username) || empty($subject) || empty($body)) {
    $message = 'All fields are required!';
    $message_type = 'error';
  } else {
    $recipient_stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $recipient_stmt->execute([$recipient_username]);
    $recipient = $recipient_stmt->fetch(PDO::FETCH_ASSOC);
    if ($recipient) {
      $recipient_id = $recipient['id'];
      $insert_stmt = $pdo->prepare('INSERT INTO messages (sender_id, recipient_id, subject, body, sent_at) VALUES (?, ?, ?, ?, NOW())');
      if ($insert_stmt->execute([$sender_id, $recipient_id, $subject, $body])) {
        $message = 'Message sent successfully!';
        $message_type = 'success';
        // Clear form fields
        $recipient_username = '';
        $subject = '';
        $body = '';
      } else {
        $message = 'Error sending message.';
        $message_type = 'error';
      }
    } else {
      $message = 'Recipient not found!';
      $message_type = 'error';
    }
  }
}

$pageTitle = 'Send a message';
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container-fluid p-4">
    <h2>Send Message</h2>
    <?php if ($message): ?>
      <div class="alert <?php echo $message_type === 'success' ? 'alert-success' : 'alert-danger'; ?>">
        <?php echo htmlspecialchars($message); ?>
      </div>
    <?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label for="recipient_username" class="form-label">To (Username):</label>
        <input type="text" class="form-control" id="recipient_username" name="recipient_username" value="<?php echo htmlspecialchars($recipient_username); ?>" required>
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">Subject:</label>
        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo htmlspecialchars($reply_to_subject); ?>" required>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Message:</label>
        <textarea class="form-control" id="body" name="body" rows="5" required><?php echo htmlspecialchars($reply_to_body); ?></textarea>
      </div>
      <button type="submit" name="send_message" class="btn btn-primary">Send Message</button>
    </form>
  </div>
</main>

<?php 
include(__DIR__ . '/../../includes/footer/footer.php');

 ?>