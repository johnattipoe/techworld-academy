<?php 
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">Testimonials</h1>
  <p>See what our students and partners have to say about us.</p>

  <div class="row g-4 mt-3">
    <!-- Testimonial 1 -->
    <div class="col-md-6">
      <div class="card p-3 shadow-sm">
        <blockquote class="blockquote mb-0">
          <p>"This platform made learning so much easier. The AI course was fantastic!"</p>
          <footer class="blockquote-footer">Jane Doe, Student</footer>
        </blockquote>
      </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="col-md-6">
      <div class="card p-3 shadow-sm">
        <blockquote class="blockquote mb-0">
          <p>"Very professional courses with practical examples. Highly recommended."</p>
          <footer class="blockquote-footer">John Smith, Professional</footer>
        </blockquote>
      </div>
    </div>

    <!-- Testimonial 3 -->
    <div class="col-md-6">
      <div class="card p-3 shadow-sm">
        <blockquote class="blockquote mb-0">
          <p>"The finance course helped me land my dream job. Thank you!"</p>
          <footer class="blockquote-footer">Alice Johnson, Graduate</footer>
        </blockquote>
      </div>
    </div>
  </div>
</div>

<?php 
include(__DIR__ . '/../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../includes/footer/footer.php'); 
?>
