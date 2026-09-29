<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- PRODUCTIVITY.PHP -->

<!-- Hero Section -->
<section class="bg-warning text-white py-5" style="background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-success mb-3 shadow-sm">Professional Skills Course</div>
        <h1 class="display-4 fw-bold mb-3">Productivity Mastery</h1>
        <p class="lead mb-4">Learn how to maximize your efficiency, focus on what truly matters, and get more done without burning out.</p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div class="d-flex align-items-center">
            <i class="bi bi-clock-history me-2 text-warning"></i>
            <span>5 Weeks</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-bar-chart-fill me-2 text-info"></i>
            <span>All Levels</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-award-fill me-2 text-light"></i>
            <span>Certificate of Completion</span>
          </div>
        </div>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=productivity" class="btn btn-light btn-lg px-4 text-success shadow">Enroll Now - GH₵ 1000</a>
          <a href="#curriculum" class="btn btn-outline-light btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img src="/assets/project/fitness tracker.jpeg" alt="Productivity Mastery" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-4 text-success">Course Overview</h2>
        <p class="mb-3">This Productivity Mastery course equips you with strategies to optimize your workflow, eliminate distractions, and achieve peak performance in both professional and personal life.</p>
        <p class="mb-3">You’ll learn time-tested frameworks, modern tools, and habits that successful professionals use to stay ahead without stress.</p>
        <p class="mb-4">By the end of this course, you’ll have a customized productivity system tailored to your career and lifestyle.</p>
        
        <h3 class="fw-bold mb-3 text-success">What You'll Learn</h3>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
              <div>
                <strong>Focus & Deep Work</strong>
                <p class="mb-0 text-muted small">How to minimize distractions & work with flow</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
              <div>
                <strong>Task Management</strong>
                <p class="mb-0 text-muted small">Organize priorities with proven methods</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
              <div>
                <strong>Energy Management</strong>
                <p class="mb-0 text-muted small">Boost productivity with healthier routines</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
              <div>
                <strong>Productivity Tools</strong>
                <p class="mb-0 text-muted small">Trello, Notion, Asana & automation hacks</p>
              </div>
            </div>
          </div>
        </div>

        <h3 class="fw-bold mb-3 text-success">Tools & Techniques</h3>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <span class="badge bg-success p-2">Deep Work</span>
          <span class="badge bg-primary p-2">Notion</span>
          <span class="badge bg-warning text-dark p-2">Pomodoro</span>
          <span class="badge bg-danger p-2">Time Blocking</span>
          <span class="badge bg-info text-dark p-2">Automation</span>
          <span class="badge bg-dark p-2">SMART Goals</span>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-3 text-success">Course Information</h4>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Duration:</span>
                <strong>5 Weeks</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Level:</span>
                <strong>All Levels</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Mode:</span>
                <strong>Online / In-person</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Projects:</span>
                <strong>3 Practical Projects</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Certificate:</span>
                <strong>Yes</strong>
              </li>
            </ul>
            <hr>
            <h4 class="fw-bold mb-3 text-success">Tuition Fee</h4>
            <h2 class="text-success fw-bold mb-2">GH₵ 1000</h2>
            <p class="text-muted small mb-3">Payment plans available</p>
            <a href="/Admissions/General/admissions/admissions.php?course=productivity" class="btn btn-success w-100 mb-2">Enroll Now</a>
            <a href="/contact/contact.php" class="btn btn-outline-success w-100">Contact Us</a>
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
      <h2 class="fw-bold text-success">Course Curriculum</h2>
      <p class="lead">5-week step-by-step productivity journey</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="accordion" id="curriculumAccordion">
          <!-- Week 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#week1">
                Week 1: Productivity Foundations
              </button>
            </h2>
            <div id="week1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Introduction to Productivity</li>
                  <li>Identifying Distractions</li>
                  <li>Setting SMART Goals</li>
                  <li><strong>Project:</strong> Personal Productivity Audit</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week2">
                Week 2: Focus & Deep Work
              </button>
            </h2>
            <div id="week2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Understanding Flow State</li>
                  <li>Pomodoro & Time Blocking</li>
                  <li>Creating a Focused Workspace</li>
                  <li><strong>Project:</strong> Daily Deep Work Routine</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week3">
                Week 3: Task & Project Management
              </button>
            </h2>
            <div id="week3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Prioritization Frameworks</li>
                  <li>Using Trello, Notion, Asana</li>
                  <li>Collaborative Productivity</li>
                  <li><strong>Project:</strong> Weekly Task Dashboard</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week4">
                Week 4: Energy & Time Management
              </button>
            </h2>
            <div id="week4" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Healthy Routines for Productivity</li>
                  <li>Managing Energy Cycles</li>
                  <li>Stress Reduction & Breaks</li>
                  <li><strong>Project:</strong> Personal Energy Tracker</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week5">
                Week 5: Building Your Productivity System
              </button>
            </h2>
            <div id="week5" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Combining Frameworks & Tools</li>
                  <li>Automating Repetitive Tasks</li>
                  <li>Creating Sustainable Systems</li>
                  <li><strong>Capstone Project:</strong> Personal Productivity System</li>
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
<section class="py-5 bg-success text-white" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Boost Your Productivity Today</h2>
        <p class="lead mb-0">Join this course and master the systems that top performers use daily to get ahead.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/Admissions/General/admissions/admissions.php?course=productivity" class="btn btn-light btn-lg px-5 text-success">Enroll Now</a>
      </div>
    </div>
  </div>
</section>


<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
