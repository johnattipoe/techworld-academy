<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- CAREER.PHP -->

<!-- Page Hero Section -->
<section class="bg-warning text-dark py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-dark text-warning mb-3">Academic Resources</div>
          <h1 class="display-4 fw-bold mb-3">Career Center</h1>
          <p class="lead mb-4">Your pathway to career success. Get job placement assistance, career counseling, and professional development resources.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#services" class="btn btn-dark btn-lg px-4">Our Services</a>
            <a href="#jobs" class="btn btn-outline-dark btn-lg px-4">View Jobs</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-warning mb-0">95%</h2>
            <p class="lead mb-0">Job Placement Rate</p>
            <small class="text-muted">Within 6 months</small>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-warning mb-0">200+</h2>
            <p class="lead mb-0">Partner Companies</p>
            <small class="text-muted">Hiring our graduates</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-warning mb-0">GH₵6.5K</h2>
            <p class="lead mb-0">Average Starting Salary</p>
            <small class="text-muted">For our graduates</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-warning mb-0">500+</h2>
            <p class="lead mb-0">Job Openings</p>
            <small class="text-muted">Posted monthly</small>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Career Services Section -->
<section class="py-5" id="services" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Career Services We Offer</h2>
        <p class="lead">Comprehensive support for your career journey</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-person-badge text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Career Counseling</h5>
              <p class="mb-3">One-on-one sessions with career advisors to explore career paths and set goals.</p>
              <ul class="small">
                <li>Career Assessment</li>
                <li>Goal Setting</li>
                <li>Industry Insights</li>
                <li>Career Planning</li>
              </ul>
              <a href="/contact/contact.php?service=career-counseling" class="btn btn-outline-warning btn-sm">Book Session</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-file-text text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Resume & CV Building</h5>
              <p class="mb-3">Professional resume writing and review services to make your application stand out.</p>
              <ul class="small">
                <li>Resume Templates</li>
                <li>Professional Review</li>
                <li>Cover Letter Writing</li>
                <li>LinkedIn Optimization</li>
              </ul>
              <a href="/contact/contact.php?service=resume-review" class="btn btn-outline-primary btn-sm">Get Review</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-chat-dots text-success fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Interview Preparation</h5>
              <p class="mb-3">Mock interviews and coaching to help you ace your job interviews.</p>
              <ul class="small">
                <li>Mock Interviews</li>
                <li>Technical Interview Prep</li>
                <li>Behavioral Questions</li>
                <li>Feedback & Coaching</li>
              </ul>
              <a href="/contact/contact.php?service=interview-prep" class="btn btn-outline-success btn-sm">Schedule Mock Interview</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-briefcase text-info fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Job Placement Assistance</h5>
              <p class="mb-3">Direct connections to employers and exclusive job opportunities for our students.</p>
              <ul class="small">
                <li>Job Matching</li>
                <li>Employer Introductions</li>
                <li>Application Support</li>
                <li>Salary Negotiation</li>
              </ul>
              <a href="#jobs" class="btn btn-outline-info btn-sm">View Jobs</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-danger bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-people text-danger fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Networking Events</h5>
              <p class="mb-3">Regular career fairs, employer meetups, and networking opportunities.</p>
              <ul class="small">
                <li>Career Fairs</li>
                <li>Employer Panels</li>
                <li>Alumni Networking</li>
                <li>Industry Events</li>
              </ul>
              <a href="events.php" class="btn btn-outline-danger btn-sm">View Events</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-secondary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-graph-up text-secondary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Professional Development</h5>
              <p class="mb-3">Workshops and resources to develop soft skills and professional competencies.</p>
              <ul class="small">
                <li>Communication Skills</li>
                <li>Leadership Training</li>
                <li>Time Management</li>
                <li>Professional Etiquette</li>
              </ul>
              <a href="/contact/contact.php?service=professional-dev" class="btn btn-outline-secondary btn-sm">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Current Job Openings Section -->
<section class="py-5 bg-light" id="jobs" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Current Job Openings</h2>
        <p class="lead">Exclusive opportunities for TecWorld students and alumni</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="fw-bold mb-1">Junior Software Developer</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building me-1"></i>MTN Ghana</p>
                </div>
                <span class="badge bg-success">Full-Time</span>
              </div>
              <p class="mb-3">Looking for recent graduates with knowledge of React and Node.js to join our development team.</p>
              <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-light text-dark"><i class="bi bi-geo-alt me-1"></i>Accra</span>
                <span class="badge bg-light text-dark"><i class="bi bi-cash me-1"></i>GH₵ 5,000 - 7,000</span>
                <span class="badge bg-light text-dark"><i class="bi bi-calendar me-1"></i>Posted 2 days ago</span>
              </div>
              <a href="../../jobs.php?id=1" class="btn btn-warning">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="fw-bold mb-1">Data Analyst</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building me-1"></i>Ecobank Ghana</p>
                </div>
                <span class="badge bg-success">Full-Time</span>
              </div>
              <p class="mb-3">Seeking data analyst with Python, SQL, and Tableau skills for our analytics team.</p>
              <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-light text-dark"><i class="bi bi-geo-alt me-1"></i>Accra</span>
                <span class="badge bg-light text-dark"><i class="bi bi-cash me-1"></i>GH₵ 6,000 - 8,000</span>
                <span class="badge bg-light text-dark"><i class="bi bi-calendar me-1"></i>Posted 5 days ago</span>
              </div>
              <a href="../../jobs.php?id=2" class="btn btn-warning">Apply Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="../../jobs.php" class="btn btn-outline-warning btn-lg">View All Openings</a>
      </div>
    </div>
</section>
<!-- Success Stories Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Graduate Success Stories</h2>
        <p class="lead">See how our career services helped these graduates</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="../../assets/images/graduate1.jpg" alt="Graduate" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h6 class="mb-0 fw-bold">Samuel Owusu</h6>
                  <small class="text-muted">Software Engineer at Google</small>
                </div>
              </div>
              <p class="mb-0">"The career center helped me prepare for technical interviews and connected me with Google recruiters. I landed my dream job 3 months after graduation!"</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="../../assets/images/graduate2.jpg" alt="Graduate" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h6 class="mb-0 fw-bold">Akosua Mensah</h6>
                  <small class="text-muted">Data Scientist at Vodafone</small>
                </div>
              </div>
              <p class="mb-0">"The resume review and interview coaching were game-changers. I felt confident in every interview and received multiple offers!"</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="../../assets/images/graduate3.jpg" alt="Graduate" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h6 class="mb-0 fw-bold">Yaw Agyeman</h6>
                  <small class="text-muted">UX Designer at Jumia</small>
                </div>
              </div>
              <p class="mb-0">"The networking events connected me with hiring managers. I got hired at a career fair organized by the career center!"</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- CTA Section -->
<section class="py-5 bg-warning" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Ready to Launch Your Tech Career?</h2>
          <p class="lead mb-0">Schedule an appointment with our career advisors today and start your journey to career success.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=career-center" class="btn btn-dark btn-lg px-5">Get Started</a>
        </div>
      </div>
    </div>
</section>


<?php
 include(__DIR__ . '/../../../Modals/modals/modals.php');
 include(__DIR__ . '/../../../includes/footer/footer.php');
  ?>
