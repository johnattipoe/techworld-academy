<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- HERO SECTION -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f9b0f 0%, #38ef7d 100%);">
  <div class="container text-center">
    <h1 class="fw-bold mb-3">Admission Requirements</h1>
    <p class="lead">Make sure you meet all eligibility criteria before starting your application at TecWorld Academy.</p>
  </div>
</section>

<!-- HIGHLIGHT CARDS -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-file-earmark-text text-success display-5 mb-3"></i>
            <h5 class="fw-bold">Required Documents</h5>
            <p class="text-muted">Application form, transcripts, ID, and passport-sized photo.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-cash-coin text-warning display-5 mb-3"></i>
            <h5 class="fw-bold">Application Fee</h5>
            <p class="text-muted">A non-refundable fee is required to process your application.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-person-check-fill text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Eligibility</h5>
            <p class="text-muted">Applicants must meet academic standards for their chosen program.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DETAILED LIST -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold text-success mb-4">General Requirements</h2>
    <ul class="list-group shadow-sm">
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Completed application form</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Recent passport-sized photograph</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Copy of valid ID (Passport, Voter’s ID, or National ID)</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Certified academic transcripts / certificates</li>
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Proof of application fee payment</li>
    </ul>
  </div>
</section>

<!-- PROGRAM SPECIFIC REQUIREMENTS -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold text-success mb-4">Program-Specific Requirements</h2>
    <div class="table-responsive">
      <table class="table table-bordered shadow-sm align-middle">
        <thead class="table-success">
          <tr>
            <th>Program</th>
            <th>Requirements</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Undergraduate</strong></td>
            <td>WASSCE / SSCE with passes in at least 6 subjects (including English & Mathematics).</td>
          </tr>
          <tr>
            <td><strong>Postgraduate</strong></td>
            <td>Bachelor’s degree (minimum Second Class Lower) or equivalent qualification.</td>
          </tr>
          <tr>
            <td><strong>International Students</strong></td>
            <td>Equivalent foreign qualifications, English proficiency (TOEFL/IELTS), and valid student visa.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="fw-bold text-success mb-3">Ready to Apply?</h2>
    <p class="text-muted mb-4">Start your application process today or contact our admissions team for guidance.</p>
    <a href="apply.php" class="btn btn-success btn-lg shadow me-3"><i class="bi bi-pencil-square me-2"></i> Apply Now</a>
    <a href="/contact/contact.php" class="btn btn-outline-success btn-lg"><i class="bi bi-telephone me-2"></i> Contact Admissions</a>
  </div>
</section>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>
