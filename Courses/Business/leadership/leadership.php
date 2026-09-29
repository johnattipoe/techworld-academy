<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- LEADERSHIP DEVELOPMENT.PHP -->

<section class="bg-info text-white py-5" style="background: linear-gradient(135deg, #ff512f 0%, #f09819 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-danger mb-3 shadow-sm">Business Studies</div>
        <h1 class="display-4 fw-bold mb-3">Leadership Development</h1>
        <p class="lead mb-4">Strengthen your leadership, decision-making, and team-building skills to inspire and influence others.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=leadership" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 1400</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/person/Kwame Asante.jpeg" alt="Leadership Development" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light text-dark text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Build essential leadership skills such as emotional intelligence, team motivation, and decision-making for high-performance environments.</p>
  </div>
</section>

<section id="curriculum" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: Leadership Styles</h5><p>Understand different approaches and their impact on organizations.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Emotional Intelligence</h5><p>Improve self-awareness and empathy in leadership.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Communication & Influence</h5><p>Develop skills to inspire and lead teams effectively.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Strategic Leadership</h5><p>Guide organizations with clarity, vision, and planning.</p></div></div></div>
    </div>
  </div>
</section>

<section class="py-5 bg-success text-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Choose Leadership Development?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-person-check-fill display-5"></i><h5>Confidence</h5><p>Lead with assurance in any situation.</p></div>
      <div class="col-md-4"><i class="bi bi-chat-square-quote-fill display-5"></i><h5>Communication</h5><p>Inspire and influence teams effectively.</p></div>
      <div class="col-md-4"><i class="bi bi-globe-americas display-5"></i><h5>Impact</h5><p>Make a difference in business and society.</p></div>
    </div>
  </div>
</section>

<section class="py-5 text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Become an Inspiring Leader</h2>
    <p class="lead mb-4">Start your leadership journey with us today.</p>
    <a href="/Admissions/General/admissions/admissions.php?course=leadership" class="btn btn-lg btn-success px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>