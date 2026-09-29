<?php
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Virtual Campus Tour</h1>
    <p class="lead">Explore TecWorld Academy’s modern campus facilities from anywhere in the world.</p>
  </div>

  <!-- Virtual Tour Video Section -->
  <div class="ratio ratio-16x9 shadow-lg rounded overflow-hidden mb-5">
    <iframe 
      src="https://www.youtube.com/embed/YOUR_360_VIDEO_ID" 
      title="TecWorld Academy Virtual Tour" 
      allowfullscreen>
    </iframe>
  </div>

  <!-- Campus Highlights -->
  <div class="row g-4 text-center">
    <div class="col-md-4" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <i class="bi bi-laptop fs-1 text-primary mb-3"></i>
          <h5 class="card-title fw-bold">Tech Labs</h5>
          <p class="card-text">State-of-the-art computer labs equipped with the latest tools and software for hands-on learning.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <i class="bi bi-people fs-1 text-success mb-3"></i>
          <h5 class="card-title fw-bold">Collaborative Spaces</h5>
          <p class="card-text">Modern classrooms and group work zones designed to foster creativity and teamwork.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <i class="bi bi-building fs-1 text-warning mb-3"></i>
          <h5 class="card-title fw-bold">Innovation Center</h5>
          <p class="card-text">Dedicated hub for entrepreneurship, research, and real-world project development.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="text-center mt-5">
    <h4 class="fw-bold mb-3">Want to visit us in person?</h4>
    <p class="text-muted mb-4">Schedule a guided campus tour with our admissions team.</p>
    <!-- Schedule Physical Visit Button -->
<a href="#" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#visitModal">
  <i class="bi bi-geo-alt-fill me-1"></i> Schedule Physical Visit
</a>
    <a href="/contact/contact.php" class="btn btn-outline-primary">
      <i class="bi bi-envelope me-1"></i> Contact Admissions
    </a>
  </div>
</div>

<?php
include(__DIR__ . '/../../Modals/modals/modals.php');
include(__DIR__ . '/../../includes/footer/footer.php');
?>
