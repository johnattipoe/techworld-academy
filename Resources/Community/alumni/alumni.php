<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- ALUMNI.PHP -->

<!-- Page Hero Section -->
<section class="bg-warning text-dark py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-dark text-warning mb-3">Community Resources</div>
          <h1 class="display-4 fw-bold mb-3">Alumni Network</h1>
          <p class="lead mb-4">Join a global community of 5,000+ TecWorld graduates working at leading companies worldwide.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#benefits" class="btn btn-dark btn-lg px-4">Member Benefits</a>
            <a href="#register" class="btn btn-outline-dark btn-lg px-4">Join Network</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Alumni Statistics Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-lg-3">
          <h2 class="fw-bold mb-3">5,000+</h2>
          <p class="mb-0">Alumni Members</p>
        </div>
        <div class="col-lg-3">
          <h2 class="fw-bold mb-3">50+</h2>
          <p class="mb-0">Global Partners</p>
        </div>
        <div class="col-lg-3">
          <h2 class="fw-bold mb-3">100+</h2>
          <p class="mb-0">Tech Companies</p>
        </div>
        <div class="col-lg-3">
          <h2 class="fw-bold mb-3">150+</h2>
          <p class="mb-0">Events & Workshops</p>
        </div>
      </div>
    </div>
</section>

<!-- Alumni Benefits Section -->
<section class="py-5" data-aos="fade-down">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Member Benefits</h2>
        <p class="lead">Why join our alumni network?</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Networking Opportunities</h3>
              <p class="card-text">Connect with like-minded professionals from around the world.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Career Insights</h3>
              <p class="card-text">Gain insights into the job market and industry trends.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Job Opportunities</h3>
              <p class="card-text">Access exclusive job openings from top tech companies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Alumni Registration Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Join Our Alumni Network</h2>
        <p class="lead">Sign up today and connect with like-minded professionals from around the world.</p>
      </div>
      <div class="text-center">
        <a href="#register" class="btn btn-outline-light btn-lg px-4">Join Network</a>
      </div>
    </div>
</section>

<!-- Alumni Testimonials Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What Our Alumni Say</h2>
        <p class="lead">Don't just take our word for it. Hear from our satisfied alumni.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <blockquote class="blockquote">
                <p class="mb-0">The best part about the alumni network is the ability to connect with like-minded professionals and learn from their experiences.</p>
                <footer class="blockquote-footer">John Doe, <cite title="Software Engineer">Software Engineer</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <blockquote class="blockquote">
                <p class="mb-0">I was able to secure a job at a top tech company thanks to the connections I made through the alumni network.</p>
                <footer class="blockquote-footer">Jane Doe, <cite title="Data Analyst">Data Analyst</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <blockquote class="blockquote">
                <p class="mb-0">The career insights I gained from the alumni network were invaluable. They helped me prepare for the job market and gave me an edge over other job seekers.</p>
                <footer class="blockquote-footer">Bob Doe, <cite title="Product Manager">Product Manager</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Alumni Registration Form Section -->
<section class="py-5 bg-light" data-aos="fade-up" id="register">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Alumni Registration Form</h2>
        <p class="lead">Fill out the form below to join our alumni network.</p>
      </div>
      <form action="alumni-register.php" method="post">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
              <label for="name">Full Name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
              <label for="email">Email Address</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea>
              <label for="message">Message</label>
            </div>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg px-5">Register</button>
        </div>
      </form>
    </div>
</section>

<!-- Alumni Network Section -->
<section class="py-5 bg-light" data-aos="fade-up" id="network">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Alumni Network</h2>
        <p class="lead">Join a global community of 5,000+ TecWorld graduates working at leading companies worldwide.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Career Insights</h5>
              <p class="card-text">Gain insights into the job market and industry trends.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Networking Opportunities</h5>
              <p class="card-text">Connect with like-minded professionals from around the world.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Alumni Benefits Section -->
<section class="py-5 bg-light" data-aos="fade-up" id="benefits">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Alumni Benefits</h2>
        <p class="lead">As a member of our alumni network, you'll gain access to exclusive job openings, career insights, and networking opportunities.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Exclusive Job Openings</h5>
              <p class="card-text">Get access to exclusive job openings at top tech companies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Career Insights</h5>
              <p class="card-text">Gain insights into the job market and industry trends.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Networking Opportunities</h5>
              <p class="card-text">Connect with like-minded professionals from around the world.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


<?php
 include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
 include(__DIR__ . '/..\..\..\includes\footer\footer.php');
  ?>