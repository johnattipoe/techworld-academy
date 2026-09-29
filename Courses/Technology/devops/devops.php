<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>
<!-- Hero Section -->
<section class="py-5 bg-success text-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Choose DevOps?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-person-check-fill display-5"></i><h5>Confidence</h5><p>Streamline development, testing, and deployment processes.</p></div>
      <div class="col-md-4"><i class="bi bi-chat-square-quote-fill display-5"></i><h5>Collaboration</h5><p>Improve communication and collaboration between developers, testers, and operators.</p></div>
      <div class="col-md-4"><i class="bi bi-globe-americas display-5"></i><h5>Impact</h5><p>Make a difference in business and society by automating and optimizing development pipelines.</p></div>
    </div>
  </div>
</section>

<!-- Course Content -->
<div class="container mt-5 mb-5">
  <h1 class="mb-4">DevOps</h1>
  <p>Gain expertise in DevOps practices to streamline development, testing, and deployment pipelines with automation and collaboration tools.</p>

  <h3 class="mt-4">What You’ll Learn</h3>
  <ul>
    <li>Continuous Integration & Continuous Deployment (CI/CD)</li>
    <li>Infrastructure as Code (IaC)</li>
    <li>Monitoring & Logging</li>
    <li>DevOps Tools: Docker, Kubernetes, Jenkins, GitHub Actions</li>
  </ul>

  <a href="/Admissions/General/admissions/admissions.php?course=devops" class="btn btn-primary mt-3">Enroll Now</a>
</div>

<?php 
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
