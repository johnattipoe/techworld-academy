<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- TIME-MANAGEMENT.PHP -->

<!-- Course Hero Section -->
<section class="bg-warning text-dark py-5" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-warning mb-3">Productivity Course</div>
        <h1 class="display-4 fw-bold mb-3">Time Management Skills</h1>
        <p class="lead mb-4">Boost your productivity, reduce stress, and achieve more by mastering proven time management techniques.</p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <div class="d-flex align-items-center">
            <i class="bi bi-clock-fill me-2"></i>
            <span>4 Weeks</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-people-fill me-2"></i>
            <span>Beginner Level</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-award-fill me-2"></i>
            <span>Certificate of Completion</span>
          </div>
        </div>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=time-management" class="btn btn-dark btn-lg px-4">Enroll Now - GH₵ 800</a>
          <a href="#curriculum" class="btn btn-outline-dark btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <img src="/assets/campus/student lounge.jpeg" alt="Time Management" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- Course Overview -->
<section class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-4">Course Overview</h2>
        <p class="mb-3">Our Time Management course helps you develop essential skills to prioritize tasks, manage distractions, and create systems for success. Through interactive sessions and practical exercises, you’ll learn how to plan effectively and achieve balance in work and life.</p>
        <p class="mb-3">The program blends theory with real-world strategies, giving you actionable tools to improve focus and productivity immediately.</p>
        <p class="mb-4">By the end, you’ll have your own personalized system for time management that works for your lifestyle and career goals.</p>
        
        <!-- Learning Outcomes -->
        <h3 class="fw-bold mb-3">What You'll Learn</h3>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
              <div>
                <strong>Prioritization</strong>
                <p class="mb-0 text-muted small">Eisenhower Matrix, Urgent vs Important</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
              <div>
                <strong>Planning & Scheduling</strong>
                <p class="mb-0 text-muted small">Calendars, To-do Lists, SMART Goals</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
              <div>
                <strong>Overcoming Procrastination</strong>
                <p class="mb-0 text-muted small">Pomodoro, Accountability Systems</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex">
              <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
              <div>
                <strong>Work-Life Balance</strong>
                <p class="mb-0 text-muted small">Stress Reduction, Healthy Routines</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Tools & Techniques -->
        <h3 class="fw-bold mb-3">Tools & Techniques</h3>
        <div class="d-flex flex-wrap gap-2 mb-4">
          <span class="badge bg-primary p-2">Google Calendar</span>
          <span class="badge bg-success p-2">Trello</span>
          <span class="badge bg-warning text-dark p-2">Pomodoro</span>
          <span class="badge bg-danger p-2">Focus Apps</span>
          <span class="badge bg-info text-dark p-2">Time Blocking</span>
          <span class="badge bg-secondary p-2">SMART Goals</span>
        </div>

        <!-- Outcomes -->
        <h3 class="fw-bold mb-3">Career & Personal Outcomes</h3>
        <p class="mb-3">Completing this course will help you:</p>
        <ul class="list-unstyled mb-4">
          <li class="mb-2"><i class="bi bi-briefcase-fill text-warning me-2"></i>Improve productivity at work</li>
          <li class="mb-2"><i class="bi bi-briefcase-fill text-warning me-2"></i>Reduce stress & increase focus</li>
          <li class="mb-2"><i class="bi bi-briefcase-fill text-warning me-2"></i>Achieve better work-life balance</li>
          <li class="mb-2"><i class="bi bi-briefcase-fill text-warning me-2"></i>Boost career advancement opportunities</li>
        </ul>
      </div>

      <!-- Sidebar Info -->
      <div class="col-lg-4">
        <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-3">Course Information</h4>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex justify-content-between"><span class="text-muted">Duration:</span><strong>4 Weeks</strong></li>
              <li class="mb-3 d-flex justify-content-between"><span class="text-muted">Level:</span><strong>Beginner</strong></li>
              <li class="mb-3 d-flex justify-content-between"><span class="text-muted">Mode:</span><strong>Online / In-person</strong></li>
              <li class="mb-3 d-flex justify-content-between"><span class="text-muted">Projects:</span><strong>3 Mini Projects</strong></li>
              <li class="mb-3 d-flex justify-content-between"><span class="text-muted">Certificate:</span><strong>Yes</strong></li>
            </ul>
            <hr>
            <h4 class="fw-bold mb-3">Tuition Fee</h4>
            <h2 class="text-warning fw-bold mb-2">GH₵ 800</h2>
            <p class="text-muted small mb-3">Payment plans available</p>
            <a href="/Admissions/General/admissions/admissions.php?course=time-management" class="btn btn-warning w-100 mb-2 text-dark">Enroll Now</a>
            <a href="/contact/contact.php" class="btn btn-outline-warning w-100">Contact Us</a>
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
      <h2 class="fw-bold">Course Curriculum</h2>
      <p class="lead">4-week practical productivity program</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="accordion" id="curriculumAccordion">
          <!-- Week 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#week1">Week 1: Foundations of Time Management</button>
            </h2>
            <div id="week1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Understanding Time as a Resource</li>
                  <li>Identifying Time Wasters</li>
                  <li>Setting SMART Goals</li>
                  <li>Introduction to Prioritization</li>
                  <li><strong>Project:</strong> Personal Time Audit</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week2">Week 2: Planning & Scheduling</button>
            </h2>
            <div id="week2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Daily & Weekly Planning</li>
                  <li>Time Blocking Technique</li>
                  <li>Using Calendars Effectively</li>
                  <li>Managing Deadlines</li>
                  <li><strong>Project:</strong> Weekly Productivity Planner</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week3">Week 3: Productivity Systems</button>
            </h2>
            <div id="week3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Pomodoro Technique</li>
                  <li>Task Management Tools</li>
                  <li>Handling Interruptions</li>
                  <li>Creating Focused Work Environments</li>
                  <li><strong>Project:</strong> Pomodoro Productivity Challenge</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Week 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#week4">Week 4: Overcoming Procrastination & Balance</button>
            </h2>
            <div id="week4" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
              <div class="accordion-body">
                <ul>
                  <li>Psychology of Procrastination</li>
                  <li>Accountability Systems</li>
                  <li>Stress & Energy Management</li>
                  <li>Work-Life Balance Strategies</li>
                  <li><strong>Capstone Project:</strong> Personalized Time Management System</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What Our Students Say</h2>
      <p class="lead">Feedback from learners who completed this course</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow border-0">
          <div class="card-body">
            <p>"This course completely changed how I approach my daily routine. I feel more in control of my time than ever before!"</p>
            <div class="d-flex align-items-center mt-3">
              <img src="/assets/person/Sarah Adu.jpeg" class="rounded-circle me-3" width="50" alt="Student 1">
              <div>
                <h6 class="mb-0 fw-bold">Sarah L.</h6>
                <small class="text-muted">Entrepreneur</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow border-0">
          <div class="card-body">
            <p>"The strategies for overcoming procrastination were a lifesaver. Highly recommended for busy professionals."</p>
            <div class="d-flex align-items-center mt-3">
              <img src="/assets/person/Ama Boateng.jpeg" class="rounded-circle me-3" width="50" alt="Student 2">
              <div>
                <h6 class="mb-0 fw-bold">David M.</h6>
                <small class="text-muted">Project Manager</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
      <p class="lead">Get answers to common questions about the course</p>
    </div>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Is this course online or in-person?</button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">The course is available in both formats. You can choose between online or in-person classes during enrollment.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Do I need prior experience?</button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">No prior experience is required. The course is designed for beginners and professionals looking to enhance productivity.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Will I receive a certificate?</button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Yes, all participants who successfully complete the course will receive a certificate of completion.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-warning text-dark" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Take Control of Your Time</h2>
        <p class="lead mb-0">Join our program and unlock the skills to achieve more with less stress.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/Admissions/General/admissions/admissions.php?course=time-management" class="btn btn-dark btn-lg px-5">Enroll Now</a>
      </div>
    </div>
  </div>
</section>

<?php 
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
