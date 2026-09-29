<?php 
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">Gallery</h1>
  <p>Explore images from our events, courses, and activities.</p>

  <div class="row g-3 mt-3">
    <!-- Example Gallery Items (replace with real images) -->
    <div class="col-md-4">
      <div class="card">
        <img src="assets/images/gallery1.jpg" class="card-img-top" alt="Gallery Image 1">
        <div class="card-body text-center">
          <p class="card-text">Event 1</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="assets/images/gallery2.jpg" class="card-img-top" alt="Gallery Image 2">
        <div class="card-body text-center">
          <p class="card-text">Workshop Session</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="assets/images/gallery3.jpg" class="card-img-top" alt="Gallery Image 3">
        <div class="card-body text-center">
          <p class="card-text">Team Activity</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include(__DIR__ . '/../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../includes/footer/footer.php'); 
?>
