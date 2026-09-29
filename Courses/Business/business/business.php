<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- BUSINESS MANAGEMENT.PHP -->

<!-- Hero Section -->
<section class="bg-info text-white py-5" style="background: linear-gradient(135deg, #0f9b0f 0%, #000000 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-success mb-3 shadow-sm">Business Studies</div>
        <h1 class="display-4 fw-bold mb-3">Business Management</h1>
        <p class="lead mb-4">Master the fundamentals of business strategy, operations, and leadership to succeed in any organization.</p>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=business" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 1500</a>
          <a href="#curriculum" class="btn btn-outline-light btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/project/e-commerce.jpeg" alt="Business Management" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light text-dark" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-8">
        <h2 class="fw-bold">Course Overview</h2>
        <p class="lead">This course equips students with the knowledge and skills to lead teams, manage resources effectively, and build sustainable business strategies that drive growth and success.</p>
      </div>
    </div>
    <div class="row g-4 text-center" data-aos="fade-up">
      <div class="col-md-4">
        <i class="bi bi-clock-history display-5 text-success"></i>
        <h5 class="mt-3">Duration</h5>
        <p>8 Weeks (Weekend & Evening Options)</p>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <i class="bi bi-bar-chart-line-fill display-5 text-primary"></i>
        <h5 class="mt-3">Level</h5>
        <p>Intermediate to Advanced</p>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <i class="bi bi-award-fill display-5 text-warning"></i>
        <h5 class="mt-3">Certification</h5>
        <p>Certificate of Completion</p>
      </div>
    </div>
  </div>
</section>

<!-- Curriculum Section -->
<section id="curriculum" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Module 1: Business Fundamentals</h5>
            <p class="card-text">Introduction to organizational structures, key business functions, and management theories.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Module 2: Strategic Management</h5>
            <p class="card-text">Learn how to design, implement, and evaluate effective business strategies.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Module 3: Leadership & Teamwork</h5>
            <p class="card-text">Develop communication, decision-making, and leadership skills for managing people and projects.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">Module 4: Financial & Resource Management</h5>
            <p class="card-text">Understand budgeting, financial planning, and how to optimize organizational resources.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits Section -->
<section class="py-5 bg-success text-white" data-aos="fade-up">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Why Enroll in Business Management?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <i class="bi bi-lightbulb-fill display-5"></i>
        <h5 class="mt-3">Practical Insights</h5>
        <p>Gain real-world knowledge with case studies and projects.</p>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <i class="bi bi-people-fill display-5"></i>
        <h5 class="mt-3">Networking</h5>
        <p>Collaborate with industry experts and fellow learners.</p>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <i class="bi bi-briefcase-fill display-5"></i>
        <h5 class="mt-3">Career Growth</h5>
        <p>Enhance your employability with a recognized certification.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Take the Next Step in Your Career</h2>
    <p class="lead mb-4">Join the Business Management course today and build the skills you need to thrive in leadership roles.</p>
    <a href="/Admissions/General/admissions/admissions.php?course=business" class="btn btn-lg btn-success px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php 
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
