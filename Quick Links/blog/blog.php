<?php 
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">Blog</h1>
  <p>Read the latest articles, insights, and tips from our team.</p>

  <div class="row g-4 mt-4">
    <!-- Blog Post 1 -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">The Future of Artificial Intelligence</h5>
          <p class="card-text">AI is transforming industries. Learn about the key trends shaping the future.</p>
          <a href="#" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Post 2 -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">5 Cybersecurity Best Practices</h5>
          <p class="card-text">Protect yourself online with these essential security practices.</p>
          <a href="#" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include(__DIR__ . '/..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\includes\footer\footer.php'); 
?>
