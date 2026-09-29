<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- MINDFULNESS.PHP -->

<!-- Hero Section -->
<section class="bg-wa text-white py-5" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-primary mb-3 shadow-sm">Wellness & Growth</div>
        <h1 class="display-4 fw-bold mb-3">Mindfulness & Inner Calm</h1>
        <p class="lead mb-4">Learn the art of mindfulness to reduce stress, improve focus, and create lasting inner balance in your daily life.</p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div class="d-flex align-items-center">
            <i class="bi bi-calendar-week-fill me-2 text-warning"></i>
            <span>4 Weeks</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-person-heart me-2 text-info"></i>
            <span>Beginner Friendly</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-award-fill me-2 text-success"></i>
            <span>Certificate of Completion</span>
          </div>
        </div>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=mindfulness" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 900</a>
          <a href="#curriculum" class="btn btn-outline-light btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img src="/assets/campus/library.jpeg" alt="Mindfulness Course" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-4 text-primary">Course Overview</h2>
        <p class="mb-3">This course introduces the practice of mindfulness to help you live in the present moment, reduce anxiety, and improve overall well-being. You’ll learn meditation techniques, mindful breathing, and strategies to cultivate awareness.</p>
        <p class="mb-4">Mindfulness is more than relaxation—it’s a way to build focus, resilience, and emotional intelligence in daily life.</p>

        <h3 class="fw-bold mb-3 text-primary">What You'll Learn</h3>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
              <div>
                <strong>Mindful Breathing</strong>
                <p class="mb-0 text-muted small">Techniques for calming the mind</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
              <div>
                <strong>Meditation Basics</strong>
                <p class="mb-0 text-muted small">Step-by-step guided meditation practices</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
              <div>
                <strong>Stress Reduction</strong>
                <p class="mb-0 text-muted small">Using mindfulness to manage daily stress</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
              <div>
                <strong>Emotional Balance</strong>
                <p class="mb-0 text-muted small">Building awareness and self-compassion</p>
              </div>
            </div>
          </div>
        </div>

        <h3 class="fw-bold mb-3 text-primary">Key Practices</h3>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <span class="badge bg-primary p-2">Breathing Exercises</span>
          <span class="badge bg-success p-2">Body Scan</span>
          <span class="badge bg-warning text-dark p-2">Gratitude Journaling</span>
          <span class="badge bg-info text-dark p-2">Walking Meditation</span>
          <span class="badge bg-dark p-2">Mindful Eating</span>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-3 text-primary">Course Information</h4>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Duration:</span>
                <strong>4 Weeks</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Level:</span>
                <strong>Beginner</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Mode:</span>
                <strong>Online / In-person</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Projects:</span>
                <strong>2 Practical Projects</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Certificate:</span>
                <strong>Yes</strong>
              </li>
            </ul>
            <hr>
            <h4 class="fw-bold mb-3 text-primary">Tuition Fee</h4>
            <h2 class="text-primary fw-bold mb-2">GH₵ 900</h2>
            <p class="text-muted small mb-3">Payment plans available</p>
            <a href="/Admissions/General/admissions/admissions.php?course=mindfulness" class="btn btn-primary w-100 mb-2">Enroll Now</a>
            <a href="/contact/contact.php" class="btn btn-outline-primary w-100">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Curriculum Section -->
<section class="py-5 bg-white" id="curriculum" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Course Curriculum</h2>
      <p class="lead">A 4-week path to mindfulness & inner calm</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="accordion" id="curriculumAccordion">
          <!-- Week 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#week1">
                Week 1: Introduction to Mindfulness
              </button>
            </h2>
            <div id="week1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Understanding Mindfulness</li>
                  <li>Benefits & Applications</li>
                  <li>Daily Awareness Practices</li>
                  <li><strong>Project:</strong> Daily Reflection Journal</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week2">
                Week 2: Breathing & Meditation
              </button>
            </h2>
            <div id="week2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Breathing Techniques</li>
                  <li>Guided Meditation</li>
                  <li>Body Scan Practice</li>
                  <li><strong>Project:</strong> 10-min Daily Meditation</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week3">
                Week 3: Applying Mindfulness Daily
              </button>
            </h2>
            <div id="week3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Mindful Eating</li>
                  <li>Walking Meditation</li>
                  <li>Managing Stress at Work</li>
                  <li><strong>Project:</strong> Stress Awareness Log</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week4">
                Week 4: Emotional Intelligence & Balance
              </button>
            </h2>
            <div id="week4" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Mindfulness & Emotional Awareness</li>
                  <li>Compassion & Gratitude Practices</li>
                  <li>Creating Your Mindfulness Routine</li>
                  <li><strong>Capstone Project:</strong> Personalized Mindfulness Plan</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Bring Mindfulness Into Your Life</h2>
        <p class="lead mb-0">Join this course to create calm, clarity, and balance every day.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/Admissions/General/admissions/admissions.php?course=mindfulness" class="btn btn-light btn-lg px-5 text-primary">Enroll Now</a>
      </div>
    </div>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>
