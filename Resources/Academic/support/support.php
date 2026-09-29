<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- SUPPORT.PHP -->

<!-- Page Hero Section -->
<section class="bg-success text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-light text-success mb-3">Academic Resources</div>
          <h1 class="display-4 fw-bold mb-3">Student Support Services</h1>
          <p class="lead mb-4">Comprehensive support to help you succeed academically, personally, and professionally throughout your journey.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#services" class="btn btn-light btn-lg px-4">Our Services</a>
            <a href="/contact/contact.php" class="btn btn-outline-light btn-lg px-4">Get Help</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="fw-bold mb-4">We're Here to Help You Succeed</h2>
          <p class="mb-3">At TecWorld Academy, your success is our priority. Our student support services are designed to provide you with the help and resources you need at every stage of your learning journey.</p>
          <p class="mb-4">From academic counseling to mental health support, financial aid guidance to technical assistance, we're committed to ensuring you have everything you need to thrive.</p>
        </div>
      </div>
    </div>
</section>

<!-- Support Services Section -->
<section class="py-5 bg-light" id="services" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Student Support Services</h2>
        <p class="lead">Comprehensive support across all areas of student life</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-book text-success fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Academic Counseling</h5>
              <p class="mb-3">Get guidance on course selection, study strategies, and academic planning from our experienced advisors.</p>
              <ul class="small">
                <li>Course Planning</li>
                <li>Study Skills Development</li>
                <li>Academic Progress Review</li>
                <li>Learning Strategies</li>
              </ul>
              <a href="/contact/contact.php?service=academic-counseling" class="btn btn-outline-success btn-sm">Schedule Appointment</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-people text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Tutoring Services</h5>
              <p class="mb-3">Free peer tutoring and study groups for students who need extra help with coursework.</p>
              <ul class="small">
                <li>One-on-One Tutoring</li>
                <li>Group Study Sessions</li>
                <li>Exam Preparation</li>
                <li>Project Assistance</li>
              </ul>
              <a href="/contact/contact.php?service=tutoring" class="btn btn-outline-primary btn-sm">Request Tutor</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-headset text-info fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Technical Support</h5>
              <p class="mb-3">24/7 technical assistance for platform access, software issues, and IT-related problems.</p>
              <ul class="small">
                <li>Portal Access Help</li>
                <li>Software Installation</li>
                <li>Network Issues</li>
                <li>Account Problems</li>
              </ul>
              <a href="/contact/contact.php?service=tech-support" class="btn btn-outline-info btn-sm">Get Help</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-cash-coin text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Financial Aid Guidance</h5>
              <p class="mb-3">Support with scholarships, payment plans, and financial assistance applications.</p>
              <ul class="small">
                <li>Scholarship Applications</li>
                <li>Payment Plan Setup</li>
                <li>Financial Aid Counseling</li>
                <li>Emergency Financial Support</li>
              </ul>
              <a href="/contact/contact.php?service=financial-aid" class="btn btn-outline-warning btn-sm">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-danger bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-heart text-danger fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Mental Health & Wellness</h5>
              <p class="mb-3">Confidential counseling and wellness support for stress, anxiety, and personal challenges.</p>
              <ul class="small">
                <li>Individual Counseling</li>
                <li>Stress Management</li>
                <li>Wellness Workshops</li>
                <li>Crisis Support</li>
              </ul>
              <a href="/contact/contact.php?service=counseling" class="btn btn-outline-danger btn-sm">Schedule Session</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-secondary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-clipboard-check text-secondary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Disability Services</h5>
              <p class="mb-3">Accommodations and support for students with disabilities to ensure equal access to education.</p>
              <ul class="small">
                <li>Learning Accommodations</li>
                <li>Assistive Technology</li>
                <li>Exam Modifications</li>
                <li>Accessibility Support</li>
              </ul>
              <a href="/contact/contact.php?service=disability" class="btn btn-outline-secondary btn-sm">Request Support</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Contact Support Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">How to Reach Us</h2>
        <p class="lead">Multiple ways to get the support you need</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-telephone text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Phone</h5>
              <p class="mb-2">Student Support Hotline</p>
              <p class="text-success fw-bold">+233 XX XXX XXXX</p>
              <p class="small text-muted">Mon-Sat: 8AM-8PM</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-envelope text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Email</h5>
              <p class="mb-2">Student Support Email</p>
              <p class="text-success fw-bold small">support@tecworld.com</p>
              <p class="small text-muted">24-hour response time</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-chat-dots text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Live Chat</h5>
              <p class="mb-2">Instant Support Chat</p>
              <p class="text-success fw-bold">Available 24/7</p>
              <p class="small text-muted">Click chat icon</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-geo-alt text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">In-Person</h5>
              <p class="mb-2">Visit Student Services</p>
              <p class="text-success fw-bold small">Main Campus</p>
              <p class="small text-muted">Mon-Fri: 8AM-6PM</p>
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
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="supportFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  Are support services free for students?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#supportFaq">
                <div class="accordion-body">
                  Yes, all student support services are completely free for enrolled students. This includes tutoring, counseling, academic advising, and technical support.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  How do I schedule an appointment with an advisor?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#supportFaq">
                <div class="accordion-body">
                  You can schedule appointments through your student portal, by calling our support line, or by visiting the student services office. Same-day appointments are often available.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  Is counseling confidential?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#supportFaq">
                <div class="accordion-body">
                  Yes, all counseling and mental health services are completely confidential. Information is only shared with your permission or in cases where there's a risk of harm.
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
          <h2 class="fw-bold mb-3">Need Help? We're Here for You</h2>
          <p class="lead mb-0">Don't hesitate to reach out. Our support team is ready to assist you.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php" class="btn btn-light btn-lg px-5">Contact Support</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
