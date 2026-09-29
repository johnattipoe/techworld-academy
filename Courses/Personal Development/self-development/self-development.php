<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- SELF-DEVELOPMENT.PHP -->

<!-- Hero Section -->
<section class="bg-warning text-dark py-5" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-success mb-3 shadow-sm">Personal Growth Course</div>
        <h1 class="display-4 fw-bold mb-3">Self-Development Mastery</h1>
        <p class="lead mb-4">Discover your full potential, strengthen your mindset, and unlock the tools to create a life of purpose and success.</p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div class="d-flex align-items-center">
            <i class="bi bi-calendar2-week-fill me-2 text-warning"></i>
            <span>6 Weeks</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-lightbulb-fill me-2 text-info"></i>
            <span>Intermediate Level</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-award-fill me-2 text-light"></i>
            <span>Certificate of Achievement</span>
          </div>
        </div>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=self-development" class="btn btn-light btn-lg px-4 text-success shadow">Enroll Now - GH₵ 1200</a>
          <a href="#curriculum" class="btn btn-outline-light btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img src="/assets/alumi/Alumni Network.jpeg" alt="Self Development" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>


<!-- Overview Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-4 text-danger">Course Overview</h2>
        <p class="mb-3">This Self-Development program empowers you to take charge of your growth. Learn strategies for building resilience, developing emotional intelligence, improving confidence, and aligning your actions with long-term goals.</p>
        <p class="mb-3">Through guided workshops, reflection, and coaching tools, you’ll sharpen your decision-making, communication, and leadership skills.</p>
        <p class="mb-4">By the end, you’ll have a personalized action plan for continued self-growth and transformation.</p>
        
        <h3 class="fw-bold mb-3 text-primary">What You'll Learn</h3>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="d-flex bg-white p-3 rounded shadow-sm">
              <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
              <div>
                <strong>Mindset Growth</strong>
                <p class="mb-0 text-muted small">Growth mindset, resilience training</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex bg-white p-3 rounded shadow-sm">
              <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
              <div>
                <strong>Emotional Intelligence</strong>
                <p class="mb-0 text-muted small">Self-awareness & empathy skills</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex bg-white p-3 rounded shadow-sm">
              <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
              <div>
                <strong>Confidence Building</strong>
                <p class="mb-0 text-muted small">Overcoming fear & self-doubt</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex bg-white p-3 rounded shadow-sm">
              <i class="bi bi-check-circle-fill text-danger me-2 mt-1"></i>
              <div>
                <strong>Leadership & Communication</strong>
                <p class="mb-0 text-muted small">Influence, speaking & teamwork</p>
              </div>
            </div>
          </div>
        </div>

        <h3 class="fw-bold mb-3 text-primary">Tools & Techniques</h3>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <span class="badge bg-warning text-dark p-2">Mind Mapping</span>
          <span class="badge bg-success p-2">Journaling</span>
          <span class="badge bg-primary p-2">Meditation</span>
          <span class="badge bg-danger p-2">Public Speaking</span>
          <span class="badge bg-info text-dark p-2">Coaching Frameworks</span>
          <span class="badge bg-dark p-2">Goal Setting</span>
        </div>

        <h3 class="fw-bold mb-3 text-primary">Benefits of This Course</h3>
        <ul class="list-unstyled mb-4">
          <li class="mb-2"><i class="bi bi-star-fill text-warning me-2"></i>Build confidence & resilience</li>
          <li class="mb-2"><i class="bi bi-star-fill text-success me-2"></i>Enhance emotional intelligence</li>
          <li class="mb-2"><i class="bi bi-star-fill text-info me-2"></i>Improve communication & leadership</li>
          <li class="mb-2"><i class="bi bi-star-fill text-danger me-2"></i>Create a sustainable growth plan</li>
        </ul>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-3 text-primary">Course Information</h4>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Duration:</span>
                <strong>6 Weeks</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Level:</span>
                <strong>Intermediate</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Mode:</span>
                <strong>Online / In-person</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Projects:</span>
                <strong>4 Personal Projects</strong>
              </li>
              <li class="mb-3 d-flex justify-content-between">
                <span class="text-muted">Certificate:</span>
                <strong>Yes</strong>
              </li>
            </ul>
            <hr>
            <h4 class="fw-bold mb-3 text-danger">Tuition Fee</h4>
            <h2 class="text-success fw-bold mb-2">GH₵ 1200</h2>
            <p class="text-muted small mb-3">Installment plans available</p>
            <a href="/Admissions/General/admissions/admissions.php?course=self-development" class="btn btn-success w-100 mb-2">Enroll Now</a>
            <a href="/contact/contact.php" class="btn btn-outline-success w-100">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Curriculum Section -->
<section class="py-5 bg-light" id="curriculum" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-danger">Course Curriculum</h2>
      <p class="lead">6-week personal growth journey</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="accordion" id="curriculumAccordion">
          <!-- Week 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#week1">
                Week 1: Introduction to Self-Growth
              </button>
            </h2>
            <div id="week1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Defining Personal Growth</li>
                  <li>Understanding Growth Mindset</li>
                  <li>Journaling for Reflection</li>
                  <li><strong>Project:</strong> Personal Vision Board</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#week2">
                Week 2: Building Emotional Intelligence
              </button>
            </h2>
            <div id="week2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Understanding Emotions</li>
                  <li>Empathy & Relationships</li>
                  <li>Self-awareness Techniques</li>
                  <li><strong>Project:</strong> Emotional Awareness Journal</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-warning text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#week3">
                Week 3: Confidence & Communication
              </button>
            </h2>
            <div id="week3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Public Speaking Basics</li>
                  <li>Assertive Communication</li>
                  <li>Overcoming Fear</li>
                  <li><strong>Project:</strong> Recorded Presentation</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#week4">
                Week 4: Leadership Development
              </button>
            </h2>
            <div id="week4" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Understanding Leadership Styles</li>
                  <li>Influence & Persuasion Skills</li>
                  <li>Team Collaboration</li>
                  <li><strong>Project:</strong> Leadership Simulation</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-info text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#week5">
                Week 5: Personal Productivity
              </button>
            </h2>
            <div id="week5" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Time Management Techniques</li>
                  <li>Focus & Deep Work</li>
                  <li>Overcoming Procrastination</li>
                  <li><strong>Project:</strong> Daily Productivity Journal</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 6 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#week6">
                Week 6: Long-Term Growth Plan
              </button>
            </h2>
            <div id="week6" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Setting Lifelong Goals</li>
                  <li>Creating Habits for Success</li>
                  <li>Accountability Systems</li>
                  <li><strong>Capstone Project:</strong> Personal Growth Roadmap</li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- End Accordion -->
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Invest in Yourself Today</h2>
        <p class="lead mb-0">Take the first step toward building the best version of yourself with our guided Self-Development program.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/Admissions/General/admissions/admissions.php?course=self-development" class="btn btn-light btn-lg px-5 text-primary shadow">Enroll Now</a>
      </div>
    </div>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
  ?>
