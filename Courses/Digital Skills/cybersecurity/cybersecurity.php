<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- CYBERSECURITY.PHP -->

<section class="bg-dark text-white py-5" 
style="background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);" 
data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-dark mb-3">Digital Skills</div>
        <h1 class="display-4 fw-bold mb-3">Cybersecurity</h1>
        <p class="lead mb-4">Protect systems, networks, and data from digital threats with hands-on security training.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=cybersecurity" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 2500</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/cert/cert-cisco.jpeg" alt="Cybersecurity" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light text-dark text-center">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Learn ethical hacking, network security, cryptography, and how to defend against cyber attacks.</p>
  </div>
</section>


<section id="curriculum" class="py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: Cyber Threats</h5><p>Understand malware, phishing, and ransomware attacks.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Network Security</h5><p>Secure networks, firewalls, and VPNs.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Ethical Hacking</h5><p>Hands-on penetration testing techniques.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Data Protection</h5><p>Learn cryptography, GDPR, and data safety methods.</p></div></div></div>
    </div>
  </div>
</section>

<!-- Why Study Cybersecurity? Section -->
<section class="py-5 bg-dark text-white text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-in-out">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Study Cybersecurity?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-shield-lock-fill display-5"></i><h5>High Security</h5><p>Protect organizations from cyber attacks.</p></div>
      <div class="col-md-4"><i class="bi bi-hdd-network display-5"></i><h5>Tech Careers</h5><p>Work as a security analyst, auditor, or ethical hacker.</p></div>
      <div class="col-md-4"><i class="bi bi-key-fill display-5"></i><h5>Critical Demand</h5><p>Cybersecurity skills are urgently needed worldwide.</p></div>
    </div>
  </div>
</section>

<!-- Enroll Now Section -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container">
    <h2 class="fw-bold mb-3">Protect the Digital World</h2>
    <a href="/Admissions/General/admissions/admissions.php?course=cybersecurity" class="btn btn-lg btn-info px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>
