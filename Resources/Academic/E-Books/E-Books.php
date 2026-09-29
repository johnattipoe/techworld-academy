<?php
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');

// E-books array (filename => display name)
$ebooks = [
  "web-development-fundamentals.pdf" => "Web Development Fundamentals",
  "data-science-for-beginners.pdf" => "Data Science for Beginners",
  "cybersecurity-basics.pdf" => "Cybersecurity Basics"
];
?>

<div class="container mt-5 mb-5">
  <h1 class="fw-bold">📚 E-Books Library</h1>
  <p class="lead">Download free and premium e-books to support your learning journey at TecWorld Academy.</p>

  <div class="row g-4 mt-4">
    <?php foreach ($ebooks as $file => $title): ?>
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $title ?></h5>
            <p class="card-text text-muted small">Format: PDF</p>
            <div class="mt-auto">
              <a href="../../uploads/ebooks/<?= $file ?>" target="_blank" class="btn btn-sm btn-primary me-2">
                <i class="bi bi-book me-1"></i> View
              </a>
              <a href="../../uploads/ebooks/<?= $file ?>" download class="btn btn-sm btn-success">
                <i class="bi bi-download me-1"></i> Download
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Download All Button -->
  <div class="text-center mt-5">
    <a href="../../uploads/ebooks/ebooks-pack.zip" class="btn btn-lg btn-outline-success" download>
      <i class="bi bi-archive me-2"></i> Download All E-Books (ZIP)
    </a>
  </div>
</div>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
