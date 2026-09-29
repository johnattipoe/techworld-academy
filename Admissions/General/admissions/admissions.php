<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- ADMISSIONS HERO -->
<section class="py-5" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container text-white text-center">
    <h1 class="fw-bold mb-3">Admissions</h1>
    <p class="lead mb-4">Applications for the 2025 academic year are now open.  
      Submit your application online and take the next step toward your future with TecWorld Academy.</p>
    <a href="/Admissions/General/apply/apply.php" class="btn btn-warning btn-lg shadow">Apply Now</a>
  </div>
</section>

<!-- ADMISSIONS LINKS -->
<section class="py-5 bg-light" id="admissions-links" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row g-4">

      <!-- Requirements -->
      <div class="col-md-4" data-aos="fade-up">
        <div class="card h-100 shadow border-0">
          <div class="card-body text-center">
            <i class="bi bi-list-check text-success fs-1 mb-3"></i>
            <h5 class="fw-bold">Requirements</h5>
            <p class="text-muted">Check the documents and qualifications needed before applying.</p>
            <a href="/Admissions/General/requirements/requirements.php" class="btn btn-outline-success btn-sm">View</a>
          </div>
        </div>
      </div>

      <!-- How to Apply -->
      <div class="col-md-4" data-aos="fade-up">
        <div class="card h-100 shadow border-0">
          <div class="card-body text-center">
            <i class="bi bi-pencil-square text-primary fs-1 mb-3"></i>
            <h5 class="fw-bold">How to Apply</h5>
            <p class="text-muted">Follow the simple steps to complete your application online.</p>
            <a href="/Admissions/General/apply/apply.php" class="btn btn-outline-primary btn-sm">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Academic Calendar -->
      <div class="col-md-4" data-aos="fade-up">
        <div class="card h-100 shadow border-0">
          <div class="card-body text-center" data-aos="fade-up">
            <i class="bi bi-calendar-event text-danger fs-1 mb-3"></i>
            <h5 class="fw-bold">Academic Calendar</h5>
            <p class="text-muted">Stay informed about key dates and deadlines throughout the year.</p>
            <a href="/Admissions/General/calendar/calendar.php" class="btn btn-outline-danger btn-sm">View Calendar</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FINANCIAL AID -->
<section class="py-5" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
  <div class="container text-center" data-aos="fade-up">
    <h2 class="fw-bold mb-4">Financial Aid & Fees</h2>
    <p class="text-muted mb-5">At TecWorld Academy, we believe education should be accessible to everyone. Explore tuition details, scholarships, and payment plans.</p>
    <div class="row g-4">

      <!-- Tuition & Fees -->
      <div class="col-md-4">
        <div class="card shadow border-0 h-100">
          <div class="card-body">
            <i class="bi bi-cash-coin fs-1 text-success mb-3"></i>
            <h5 class="fw-bold">Tuition & Fees</h5>
            <p class="text-muted">Transparent and affordable tuition plans with no hidden costs.</p>
            <a href="Finance/tuition.php" class="btn btn-outline-success btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Scholarships -->
      <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="card shadow border-0 h-100">
          <div class="card-body" data-aos="fade-up">
            <i class="bi bi-award fs-1 text-warning mb-3"></i>
            <h5 class="fw-bold">Scholarships</h5>
            <p class="text-muted">Merit-based and need-based scholarships available for eligible students.</p>
            <a href="Finance/scholarships.php" class="btn btn-outline-warning btn-sm">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Payment Plans -->
      <div class="col-md-4" data-aos="fade-up">
        <div class="card shadow border-0 h-100">
          <div class="card-body" data-aos="fade-up">
            <i class="bi bi-credit-card-2-back fs-1 text-primary mb-3"></i>
            <h5 class="fw-bold">Payment Plans</h5>
            <p class="text-muted">Flexible installment payment options to suit your budget.</p>
            <a href="Finance/payment-plans.php" class="btn btn-outline-primary btn-sm">Explore</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ADMISSION PROCESS TIMELINE -->
<section class="py-5 bg-light" data-aos="fade-up" data-aos-duration="1000">
  <div class="container" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="fw-bold text-center mb-5">Admissions Process</h2>
    <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">
      <div class="col-md-3 text-center" data-aos="fade-up" data-aos-duration="1000">
        <i class="bi bi-file-earmark-text fs-1 text-success mb-2"></i>
        <h6 class="fw-bold">Step 1</h6>
        <p class="text-muted">Submit your application online with the required documents.</p>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-up" data-aos-duration="1000">
        <i class="bi bi-person-check fs-1 text-primary mb-2"></i>
        <h6 class="fw-bold">Step 2</h6>
        <p class="text-muted">Our admissions team reviews your application.</p>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-up" data-aos-duration="1000">
        <i class="bi bi-envelope-open fs-1 text-warning mb-2"></i>
        <h6 class="fw-bold">Step 3</h6>
        <p class="text-muted">Receive an admission decision via email.</p>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-up" data-aos-duration="1000">
        <i class="bi bi-mortarboard fs-1 text-danger mb-2"></i>
        <h6 class="fw-bold">Step 4</h6>
        <p class="text-muted">Complete enrollment and prepare for classes.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="py-5" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" data-aos="fade-up" data-aos-duration="1000">
  <div class="container" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="fw-bold text-center mb-4">Frequently Asked Questions</h2>
    <p class="text-muted text-center mb-5">Find quick answers to common admissions questions.</p>

    <div class="accordion" id="faqAccordion">
      <!-- Question 1 -->
      <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="accordion-header" id="faqOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            When is the application deadline?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body" data-aos="fade-up" data-aos-duration="1000">
            The deadline for the 2025 academic year is <strong>30th June 2025</strong>. Early applications are encouraged.
          </div>
        </div>
      </div>

      <!-- Question 2 -->
      <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="accordion-header" id="faqTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
            What documents do I need to apply?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body" data-aos="fade-up" data-aos-duration="1000">
            You’ll need your academic transcripts, a valid ID, and any additional program-specific requirements listed on the requirements page.
          </div>
        </div>
      </div>

      <!-- Question 3 -->
      <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="accordion-header" id="faqThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
            Is financial aid available?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body" data-aos="fade-up" data-aos-duration="1000">
            Yes, we offer merit-based scholarships, need-based assistance, and flexible payment plans. See our <a href="Finance/scholarships.php">Financial Aid page</a>.
          </div>
        </div>
      </div>

      <!-- Question 4 -->
      <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="accordion-header" id="faqFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
            How will I know if I’m accepted?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Admission decisions will be sent via email within 2–3 weeks of submitting your completed application.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT HELP -->
<section class="py-5 text-center bg-light" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="fw-bold mb-3">Need Help?</h2>
    <p class="text-muted mb-4">Our admissions team is here to guide you through every step.</p>
    <a href="/contact/contact.php" class="btn btn-success btn-lg">Contact Admissions Office</a>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
