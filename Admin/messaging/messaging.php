<?php
require_once(__DIR__ . '/../../utils/logger/logger.php');
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
  require_once(__DIR__ . '/../vendor/autoload.php');
}

use TWApp\Mailer;

session_start();
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
$message = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $to = trim($_POST['to']);
  $subject = trim($_POST['subject']);
  $body = trim($_POST['body']);

  if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid recipient email address.';
  } elseif ($subject === '' || $body === '') {
    $error = 'Subject and message body are required.';
  } elseif (!class_exists(Mailer::class)) {
    $error = 'Mailer dependency is missing. Run composer install in the project root.';
  } else {
    $sent = Mailer::send([
      'to' => $to,
      'subject' => $subject,
      'body' => nl2br(htmlspecialchars($body, ENT_QUOTES, 'UTF-8')),
      'from' => getenv('SMTP_FROM') ?: 'noreply@techworld.com',
      'from_name' => getenv('SMTP_FROM_NAME') ?: 'TechWorld Admin'
    ]);

    if ($sent) {
    log_action($_SESSION['username'], 'send_message', 'success');
    $message = 'Message sent successfully!';
    } else {
      log_action($_SESSION['username'], 'send_message', 'failed');
      $error = 'Message could not be sent. Check SMTP environment settings.';
    }
  }
}
?>

<main class="main-content flex-fill">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-4 shadow">
          <h2 class="mb-4 text-success">Messaging</h2>
          <?php if ($message): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <?php echo $message; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $error; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <form method="POST" class="row g-3 mb-4">
            <div class="col-md-4"><input type="email" class="form-control" name="to" placeholder="Recipient Email" required></div>
            <div class="col-md-4"><input type="text" class="form-control" name="subject" placeholder="Subject" required></div>
            <div class="col-md-4"><button class="btn btn-success w-100" type="submit">Send</button></div>
            <div class="col-12"><textarea class="form-control" name="body" rows="3" placeholder="Message" required></textarea></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/../../includes/footer/footer.php'); ?>
