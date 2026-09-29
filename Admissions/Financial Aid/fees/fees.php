<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>


<!-- TUITION & FEES PAGE -->

<!-- Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Tuition & Fees</h1>
        <p class="lead">Affordable, flexible, and transparent tuition plans designed to support your success.</p>
    </div>
</section>

<!-- Tuition & Fees Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold text-primary mb-4">Our Tuition Rates</h2>
    <p class="lead">TecWorld Academy is committed to making education accessible. Below are the tuition rates and additional fees for our programs:</p>

    <div class="table-responsive mt-4">
      <table class="table table-bordered shadow-sm">
        <thead class="table-success">
          <tr>
            <th>Program</th>
            <th>Tuition (per semester)</th>
            <th>Additional Fees</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Business Management</td>
            <td>$1,500</td>
            <td>$200 (Library, ICT, Student Union)</td>
          </tr>
          <tr>
            <td>Digital Skills</td>
            <td>$1,200</td>
            <td>$150 (Resources & Tools)</td>
          </tr>
          <tr>
            <td>Self Development</td>
            <td>$800</td>
            <td>$100 (Workshops & Events)</td>
          </tr>
          <tr>
            <td>Mindfulness & Wellness</td>
            <td>$700</td>
            <td>$100 (Seminars & Activities)</td>
          </tr>
          <tr>
            <td>Entrepreneurship</td>
            <td>$1,300</td>
            <td>$150 (Business Lab, Mentorship)</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Notes -->
    <div class="alert alert-info mt-4 shadow-sm">
      <i class="bi bi-info-circle-fill me-2"></i> 
      Tuition fees may vary slightly depending on program duration. All additional fees are compulsory unless otherwise stated.
    </div>
  </div>
</section>

<!-- Payment Methods Section -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold text-success mb-4">Payment Methods</h2>
    <p class="lead">We provide multiple convenient ways for students to pay their tuition and fees:</p>

    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0 h-100 text-center p-3">
          <i class="bi bi-credit-card-fill text-primary fs-1 mb-3"></i>
          <h5 class="fw-bold">Credit / Debit Card</h5>
          <p>Secure online payments using Visa, MasterCard, or Mobile Money wallets.</p>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0 h-100 text-center p-3">
          <i class="bi bi-bank2 text-success fs-1 mb-3"></i>
          <h5 class="fw-bold">Bank Transfer</h5>
          <p>Payments can be made via direct deposit or wire transfer to our partner banks.</p>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0 h-100 text-center p-3">
          <i class="bi bi-cash-coin text-warning fs-1 mb-3"></i>
          <h5 class="fw-bold">Installments</h5>
          <p>Students can split tuition into 2–3 monthly payments per semester.</p>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0 h-100 text-center p-3">
          <i class="bi bi-gift-fill text-danger fs-1 mb-3"></i>
          <h5 class="fw-bold">Scholarships</h5>
          <p>Eligible students may apply for financial aid or merit-based scholarships.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #38ef7d 0%, #11998e 100%);">
  <div class="container text-center">
    <h2 class="fw-bold mb-3">Ready to Begin Your Journey?</h2>
    <p class="lead mb-4">Apply now or contact our Financial Aid Office for support with tuition and fees.</p>
    <a href="/Admissions/General/apply/apply.php" class="btn btn-warning btn-lg shadow me-3">Start Application</a>
    <a href="/Admissions/Financial Aid/support/support.php" class="btn btn-light btn-lg shadow">Contact Support</a>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>
