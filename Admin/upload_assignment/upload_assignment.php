<?php
session_start();
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
require_once(__DIR__ . '/..\..\utils\upload_handler\upload_handler.php');
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = handle_file_upload('assignment_file');
  if ($result['success']) {
    log_action($_SESSION['username'], 'upload_assignment', 'success');
    $message = 'File uploaded: ' . htmlspecialchars($result['filename']);
  } else {
    log_action($_SESSION['username'], 'upload_assignment', 'failed');
    $message = $result['message'];
  }
}
?>
<main class="main-content flex-fill">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-4 shadow">
          <h2 class="mb-4 text-success">Upload Assignment</h2>
          <?php if ($message): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <?php echo $message; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= htmlspecialchars($error) ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <form method="POST" enctype="multipart/form-data" class="row g-3 mb-4">
            <div class="col-md-8">
              <input type="file" class="form-control" name="assignment_file" required>
            </div>
            <div class="col-md-4">
              <button class="btn btn-success w-100" type="submit">Upload</button>
            </div>
          </form>
          <h4 class="mt-4">Uploaded Files</h4>
          <ul class="list-group">
            <?php
            $uploadDir = __DIR__ . '/../upload/';
            if (is_dir($uploadDir)) {
              $files = array_diff(scandir($uploadDir), array('.', '..'));
              foreach ($files as $file) {
                echo '<li class="list-group-item">' . htmlspecialchars($file) . '</li>';
              }
            } else {
              echo '<li class="list-group-item">No files uploaded yet.</li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
include(__DIR__ . '/..\..\includes\footer\footer.php');
 ?>