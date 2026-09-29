<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- APPLY PAGE HERO -->
<section class="py-5" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container text-white text-center">
    <h1 class="fw-bold mb-3">How to Apply</h1>
    <p class="lead mb-4">Follow the simple steps below to begin your journey with <strong>TecWorld Academy</strong>.</p>
    <!-- Start Application Button (Triggers Modal) -->
    <a href="#" class="btn btn-warning btn-lg shadow" data-bs-toggle="modal" data-bs-target="#applyModal"> Start Application </a>
  </div>
</section>

<!-- STEP-BY-STEP APPLICATION -->
<section class="py-5 bg-light" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" id="application-process">
  <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true" data-aos-anchor="#application-process" data-aos-anchor-placement="top-center">
    <h2 class="fw-bold text-center mb-5 text-success">Application Process</h2>
    <div class="row g-4">

      <!-- Step 1 -->
      <div class="col-md-3 text-center" data-aos="fade-up">
        <div class="card border-0 shadow h-100">
          <div class="card-body">
            <i class="bi bi-pencil-square fs-1 text-success mb-3"></i>
            <h5 class="fw-bold">Step 1</h5>
            <p class="text-muted">Fill out the online application form with your personal and academic details.</p>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-md-3 text-center" data-aos="fade-up">
        <div class="card border-0 shadow h-100">
          <div class="card-body">
            <i class="bi bi-upload fs-1 text-primary mb-3"></i>
            <h5 class="fw-bold">Step 2</h5>
            <p class="text-muted">Upload required documents (ID, transcripts, and certificates).</p>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-md-3 text-center" data-aos="fade-up">
        <div class="card border-0 shadow h-100">
          <div class="card-body">
            <i class="bi bi-credit-card-2-back fs-1 text-warning mb-3"></i>
            <h5 class="fw-bold">Step 3</h5>
            <p class="text-muted">Pay the application fee securely online via credit/debit card or mobile money.</p>
          </div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col-md-3 text-center" data-aos="fade-up">
        <div class="card border-0 shadow h-100">
          <div class="card-body">
            <i class="bi bi-envelope-check fs-1 text-danger mb-3"></i>
            <h5 class="fw-bold">Step 4</h5>
            <p class="text-muted">Submit your application and wait for a confirmation email from admissions.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- APPLICATION TIMELINE -->
<section class="py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" id="application-timeline" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
  <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true" data-aos-anchor="#application-timeline" data-aos-anchor-placement="top-center">
    <h2 class="fw-bold text-center mb-5 text-success">Application Timeline</h2>
    <div class="row g-4">
      <div class="col-md-6" data-aos="fade-up">
        <div class="alert alert-success shadow-sm">
          <i class="bi bi-calendar-event me-2"></i>
          <strong>Applications Open:</strong> January 15, 2025
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="alert alert-warning shadow-sm">
          <i class="bi bi-calendar2-week me-2"></i>
          <strong>Deadline:</strong> June 30, 2025
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="alert alert-primary shadow-sm">
          <i class="bi bi-envelope-open me-2"></i>
          <strong>Decision Notifications:</strong> Within 2–3 weeks of submission
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="alert alert-danger shadow-sm">
          <i class="bi bi-mortarboard me-2"></i>
          <strong>Classes Begin:</strong> September 2025
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HELPFUL NOTES -->
<section class="py-5 bg-light" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true" data-aos-anchor="#helpful-notes" data-aos-anchor-placement="top-center">
    <h2 class="fw-bold mb-4 text-success">Important Notes</h2>
    <ul class="list-group shadow-sm">
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Double-check all uploaded documents for accuracy and legibility.</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Ensure payment is completed to avoid delays in processing your application.</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Use an active email address – admission decisions will be sent electronically.</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Contact the admissions office if you face technical difficulties.</li>
    </ul>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" data-aos="fade-up" data-aos-duration="1000">
  <div class="container" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="fw-bold mb-3">Ready to Begin?</h2>
    <p class="text-muted mb-4">Take the next step toward your future at TecWorld Academy. Start your application today.</p>
   <!-- Start Application Button (Triggers Modal) -->
   <a href="#" class="btn btn-warning btn-lg shadow" data-bs-toggle="modal" data-bs-target="#applyModal"> Start Application </a>
  </div>
</section>

<!-- CONTACT HELP -->
<section class="py-5 bg-light text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
    <h2 class="fw-bold mb-3">Need Assistance?</h2>
    <p class="text-muted mb-4">Our admissions team is ready to support you through the process.</p>
    <a href="/contact/contact.php" class="btn btn-outline-success btn-lg">Contact Admissions Office</a>
  </div>
</section>


<?php 
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
