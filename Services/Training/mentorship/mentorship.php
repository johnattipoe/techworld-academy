<?php
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section class="hero-section position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 80px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
              <li class="breadcrumb-item"><a href="/index/index.php" class="text-white">Home</a></li>
              <li class="breadcrumb-item"><a href="services.php" class="text-white">Services</a></li>
              <li class="breadcrumb-item active text-white">Mentorship Program</li>
            </ol>
          </nav>
          <h1 class="display-3 fw-bold mb-4">Mentorship Program</h1>
          <p class="lead mb-4">Connect with industry experts and accelerate your tech career through personalized guidance and support.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#apply" class="btn btn-light btn-lg px-5">
              <i class="bi bi-person-plus me-2"></i>Apply for Mentorship
            </a>
            <a href="#become-mentor" class="btn btn-outline-light btn-lg px-5">
              <i class="bi bi-award me-2"></i>Become a Mentor
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <img src="assets/images/mentorship-hero.jpg" alt="Mentorship" class="img-fluid rounded shadow-lg">
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">500+</h3>
              <p class="text-muted mb-0">Active Mentors</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-person-check-fill text-success" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">2,000+</h3>
              <p class="text-muted mb-0">Mentees Matched</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-trophy-fill text-warning" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">95%</h3>
              <p class="text-muted mb-0">Success Rate</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-briefcase-fill text-info" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">80%</h3>
              <p class="text-muted mb-0">Job Placement</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What is Mentorship Section -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="assets/images/mentorship-about.jpg" alt="About Mentorship" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6">
          <h2 class="display-5 fw-bold mb-4">What is Our Mentorship Program?</h2>
          <p class="lead text-muted mb-4">A structured program that pairs aspiring tech professionals with experienced industry experts for personalized guidance, career advice, and skill development.</p>
          
          <div class="row g-4">
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-calendar-check"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Flexible Duration</h5>
                  <p class="text-muted mb-0">3, 6, or 12-month programs</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-person"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>1-on-1 Sessions</h5>
                  <p class="text-muted mb-0">Personal attention from experts</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-globe"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Online & In-Person</h5>
                  <p class="text-muted mb-0">Meet virtually or face-to-face</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-graph-up"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Career Growth</h5>
                  <p class="text-muted mb-0">Accelerate your career path</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Benefits of Our Mentorship Program</h2>
        <p class="lead text-muted">Why join our mentorship program?</p>
      </div>
      
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-lightbulb-fill text-primary" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Personalized Guidance</h4>
              <p class="text-muted mb-0">Receive tailored advice based on your specific goals, strengths, and areas for improvement.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-briefcase-fill text-success" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Career Advancement</h4>
              <p class="text-muted mb-0">Gain insights into industry trends and opportunities to accelerate your career growth.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-people-fill text-info" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Network Expansion</h4>
              <p class="text-muted mb-0">Connect with industry professionals and expand your professional network.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-tools text-warning" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Skill Development</h4>
              <p class="text-muted mb-0">Learn practical skills and best practices from experienced professionals.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-stars text-danger" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Confidence Building</h4>
              <p class="text-muted mb-0">Build confidence through regular feedback and encouragement from your mentor.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-rocket-takeoff-fill text-secondary" style="font-size: 1.5rem;"></i>
              </div>
              <h4 class="mb-3">Faster Progress</h4>
              <p class="text-muted mb-0">Avoid common pitfalls and accelerate your learning curve with expert guidance.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">How Our Mentorship Program Works</h2>
        <p class="lead text-muted">Simple steps to get started with your mentorship journey</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="position-relative mb-4">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                1
              </div>
            </div>
            <h4 class="mb-3">Apply & Register</h4>
            <p class="text-muted">Fill out our application form and tell us about your goals and interests.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="position-relative mb-4">
              <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                2
              </div>
            </div>
            <h4 class="mb-3">Get Matched</h4>
            <p class="text-muted">We'll match you with a mentor based on your field, goals, and preferences.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="position-relative mb-4">
              <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                3
              </div>
            </div>
            <h4 class="mb-3">Set Goals</h4>
            <p class="text-muted">Work with your mentor to establish clear, achievable goals for your journey.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="position-relative mb-4">
              <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                4
              </div>
            </div>
            <h4 class="mb-3">Start Growing</h4>
            <p class="text-muted">Meet regularly with your mentor and track your progress toward your goals.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mentorship Tracks -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Mentorship Tracks</h2>
        <p class="lead text-muted">Choose a track that aligns with your career goals</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <i class="bi bi-code-slash text-primary me-3" style="font-size: 2.5rem;"></i>
                <div>
                  <h3 class="mb-2">Technical Track</h3>
                  <p class="text-muted mb-3">Focus on developing technical skills and expertise</p>
                </div>
              </div>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Software Development</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Data Science & Analytics</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Cybersecurity</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Cloud Computing</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>AI & Machine Learning</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>DevOps & Infrastructure</li>
              </ul>
              <a href="#apply" class="btn btn-primary mt-3">Apply for Technical Track</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <i class="bi bi-graph-up-arrow text-success me-3" style="font-size: 2.5rem;"></i>
                <div>
                  <h3 class="mb-2">Career Development Track</h3>
                  <p class="text-muted mb-3">Focus on career advancement and leadership</p>
                </div>
              </div>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Career Transition</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Leadership Development</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Interview Preparation</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Resume & Portfolio Building</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Networking Strategies</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Salary Negotiation</li>
              </ul>
              <a href="#apply" class="btn btn-success mt-3">Apply for Career Track</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <i class="bi bi-rocket-takeoff text-warning me-3" style="font-size: 2.5rem;"></i>
                <div>
                  <h3 class="mb-2">Entrepreneurship Track</h3>
                  <p class="text-muted mb-3">Focus on starting and growing your tech business</p>
                </div>
              </div>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Business Planning</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Product Development</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Funding & Investment</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Marketing & Sales</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Team Building</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Scaling Your Business</li>
              </ul>
              <a href="#apply" class="btn btn-warning mt-3">Apply for Entrepreneurship Track</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <i class="bi bi-mortarboard-fill text-info me-3" style="font-size: 2.5rem;"></i>
                <div>
                  <h3 class="mb-2">Student & Graduate Track</h3>
                  <p class="text-muted mb-3">Focus on transitioning from education to industry</p>
                </div>
              </div>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Industry Orientation</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Project Guidance</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Internship Preparation</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>First Job Search</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Skill Gap Analysis</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Career Path Planning</li>
              </ul>
              <a href="#apply" class="btn btn-info mt-3">Apply for Student Track</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Mentors -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Meet Some of Our Mentors</h2>
        <p class="lead text-muted">Industry experts ready to guide you</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow text-center h-100">
            <div class="card-body p-4">
              <img src="assets/images/mentor-1.jpg" alt="Mentor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="mb-1">Kwame Asante</h5>
              <p class="text-muted small mb-2">Senior Software Engineer</p>
              <p class="text-primary small mb-3">Google</p>
              <div class="mb-3">
                <span class="badge bg-primary me-1">Python</span>
                <span class="badge bg-success me-1">Cloud</span>
                <span class="badge bg-info">AI/ML</span>
              </div>
              <p class="small text-muted">15 years experience | 50+ mentees</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow text-center h-100">
            <div class="card-body p-4">
              <img src="assets/images/mentor-2.jpg" alt="Mentor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="mb-1">Ama Boateng</h5>
              <p class="text-muted small mb-2">Product Manager</p>
              <p class="text-primary small mb-3">Microsoft</p>
              <div class="mb-3">
                <span class="badge bg-warning text-dark me-1">Product</span>
                <span class="badge bg-danger me-1">Strategy</span>
                <span class="badge bg-secondary">UX</span>
              </div>
              <p class="small text-muted">12 years experience | 40+ mentees</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow text-center h-100">
            <div class="card-body p-4">
              <img src="assets/images/mentor-3.jpg" alt="Mentor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="mb-1">Kofi Mensah</h5>
              <p class="text-muted small mb-2">CTO & Co-founder</p>
              <p class="text-primary small mb-3">TechStartup Inc</p>
              <div class="mb-3">
                <span class="badge bg-success me-1">Startup</span>
                <span class="badge bg-info me-1">Leadership</span>
                <span class="badge bg-primary">DevOps</span>
              </div>
              <p class="small text-muted">10 years experience | 35+ mentees</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow text-center h-100">
            <div class="card-body p-4">
              <img src="assets/images/mentor-4.jpg" alt="Mentor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="mb-1">Abena Osei</h5>
              <p class="text-muted small mb-2">Security Architect</p>
              <p class="text-primary small mb-3">IBM</p>
              <div class="mb-3">
                <span class="badge bg-danger me-1">Security</span>
                <span class="badge bg-dark me-1">Ethical Hacking</span>
                <span class="badge bg-warning text-dark">Risk</span>
              </div>
              <p class="small text-muted">13 years experience | 45+ mentees</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Mentorship Pricing</h2>
        <p class="lead text-muted">Flexible plans to fit your needs and budget</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <h4 class="mb-3">3-Month Program</h4>
              <div class="display-4 fw-bold mb-3">GHS 1,200</div>
              <p class="text-muted mb-4">Best for quick career boost</p>
              <ul class="list-unstyled mb-4">
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>6 one-on-one sessions</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Email support</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Career resources access</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Progress tracking</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Goal setting workshop</li>
              </ul>
              <a href="#apply" class="btn btn-outline-primary w-100">Get Started</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-primary border-3 shadow-lg h-100">
            <div class="card-header bg-primary text-white text-center py-3">
              <h5 class="mb-0">MOST POPULAR</h5>
            </div>
            <div class="card-body p-4">
              <h4 class="mb-3">6-Month Program</h4>
              <div class="display-4 fw-bold mb-3">GHS 2,000</div>
              <p class="text-muted mb-4">Best for comprehensive growth</p>
              <ul class="list-unstyled mb-4">
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>12 one-on-one sessions</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Priority email support</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Full resources library</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Progress tracking & reviews</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>All workshops included</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Resume/portfolio review</li>
              </ul>
              <a href="#apply" class="btn btn-primary w-100">Get Started</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
          <div class="card-body p-4">
              <h4 class="mb-3">12-Month Program</h4>
              <div class="display-4 fw-bold mb-3">GHS 3,500</div>
              <p class="text-muted mb-4">Best for career transformation</p>
              <ul class="list-unstyled mb-4">
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>24 one-on-one sessions</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>24/7 email & chat support</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>VIP resources access</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Monthly progress reports</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>All workshops & events</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Job interview preparation</li>
                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Networking introductions</li>
              </ul>
              <a href="#apply" class="btn btn-outline-primary w-100">Get Started</a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <p class="text-muted mb-2"><i class="bi bi-shield-check text-success me-2"></i>All plans include our satisfaction guarantee</p>
        <p class="text-muted">Payment plans available | Student discounts offered</p>
      </div>
    </div>
  </section>

  <!-- Success Stories -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Success Stories</h2>
        <p class="lead text-muted">Hear from our mentees about their transformation</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="assets/images/testimonial-1.jpg" alt="Success Story" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h5 class="mb-0">Emmanuel Agyei</h5>
                  <small class="text-muted">Junior Developer → Senior Engineer</small>
                </div>
              </div>
              <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
              <p class="text-muted">"My mentor helped me transition from a junior developer to a senior engineer in just 8 months. The personalized guidance and industry insights were invaluable!"</p>
              <div class="border-top pt-3 mt-3">
                <small class="text-primary"><i class="bi bi-briefcase me-2"></i>Now at Microsoft</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="assets/images/testimonial-2.jpg" alt="Success Story" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h5 class="mb-0">Grace Owusu</h5>
                  <small class="text-muted">Career Changer → Data Analyst</small>
                </div>
              </div>
              <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
              <p class="text-muted">"I was transitioning from accounting to tech. My mentor guided me through learning Python and SQL, and helped me land my first data analyst role!"</p>
              <div class="border-top pt-3 mt-3">
                <small class="text-primary"><i class="bi bi-briefcase me-2"></i>Now at Deloitte</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="assets/images/testimonial-3.jpg" alt="Success Story" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h5 class="mb-0">David Appiah</h5>
                  <small class="text-muted">Student → Startup Founder</small>
                </div>
              </div>
              <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
              <p class="text-muted">"With my mentor's guidance, I went from a computer science student to launching my own successful SaaS startup. The entrepreneurship track was perfect!"</p>
              <div class="border-top pt-3 mt-3">
                <small class="text-primary"><i class="bi bi-rocket me-2"></i>Founded PayTech Ghana</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Become a Mentor -->
  <section id="become-mentor" class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="display-5 fw-bold mb-4">Become a Mentor</h2>
          <p class="lead mb-4">Share your expertise and make a lasting impact on the next generation of tech professionals.</p>
          
          <div class="mb-4">
            <h5 class="mb-3">Why Become a Mentor?</h5>
            <ul class="list-unstyled">
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Give back to the tech community</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Develop leadership skills</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Expand your professional network</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Gain fresh perspectives</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Flexible schedule</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Earn supplemental income</li>
            </ul>
          </div>

          <div class="d-flex gap-3 flex-wrap">
            <a href="become-mentor.php" class="btn btn-light btn-lg">
              <i class="bi bi-person-plus me-2"></i>Apply to Mentor
            </a>
            <a href="#requirements" class="btn btn-outline-light btn-lg">
              View Requirements
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="assets/images/become-mentor.jpg" alt="Become a Mentor" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
        <p class="lead text-muted">Got questions? We've got answers</p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  How are mentors and mentees matched?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We use a sophisticated matching algorithm that considers your goals, interests, technical skills, industry preferences, and personality traits. We also take into account mentor availability and expertise to ensure the best possible match.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  How often will I meet with my mentor?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  The frequency depends on your chosen program. Typically, mentees meet with their mentors 2-4 times per month for 60-minute sessions. You can also communicate via email or messaging between sessions for quick questions or updates.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  Can I change my mentor if it's not a good fit?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes! While we strive to make great matches from the start, we understand that sometimes personalities or goals may not align perfectly. You can request a mentor change at any time, and we'll work to find you a better match within 7 days.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  Are sessions conducted online or in-person?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Both! You can choose to meet with your mentor virtually (via Zoom, Google Meet, or Microsoft Teams) or in-person at our campuses in Accra or Tema. Many mentees prefer a hybrid approach, meeting online during the week and in-person for monthly check-ins.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                  What if I need to pause my mentorship?
                </button>
              </h3>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We understand that life happens! You can pause your mentorship for up to 2 months without penalty. Your program duration will be extended accordingly. If you need a longer pause, please contact our support team to discuss options.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                  Do you offer payment plans?
                </button>
              </h3>
              <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes! We offer flexible payment plans for all our mentorship programs. You can pay monthly, quarterly, or upfront. We also offer special discounts for students, TecWorld Academy alumni, and those who pay in full upfront.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                  What's your refund policy?
                </button>
              </h3>
              <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We offer a 30-day money-back guarantee. If you're not satisfied with the mentorship program within the first month, you can request a full refund. After 30 days, refunds are prorated based on unused sessions.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Application Form Section -->
  <section id="apply" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card border-0 shadow">
            <div class="card-body p-5">
              <h2 class="text-center mb-4">Apply for Mentorship Program</h2>
              <p class="text-center text-muted mb-5">Fill out the form below and we'll match you with the perfect mentor</p>

              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">First Name *</label>
                    <input type="text" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Last Name *</label>
                    <input type="text" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email Address *</label>
                    <input type="email" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Phone Number *</label>
                    <input type="tel" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Current Role *</label>
                    <select class="form-select" required>
                      <option value="">Select...</option>
                      <option>Student</option>
                      <option>Junior Developer</option>
                      <option>Mid-Level Developer</option>
                      <option>Senior Developer</option>
                      <option>Career Changer</option>
                      <option>Unemployed</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Years of Experience</label>
                    <select class="form-select">
                      <option value="">Select...</option>
                      <option>0-1 years</option>
                      <option>1-3 years</option>
                      <option>3-5 years</option>
                      <option>5+ years</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Mentorship Track *</label>
                    <select class="form-select" required>
                      <option value="">Select...</option>
                      <option>Technical Track</option>
                      <option>Career Development Track</option>
                      <option>Entrepreneurship Track</option>
                      <option>Student & Graduate Track</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Program Duration *</label>
                    <select class="form-select" required>
                      <option value="">Select...</option>
                      <option>3 Months</option>
                      <option>6 Months</option>
                      <option>12 Months</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Area of Interest *</label>
                    <select class="form-select" required>
                      <option value="">Select...</option>
                      <option>Web Development</option>
                      <option>Mobile Development</option>
                      <option>Data Science & Analytics</option>
                      <option>AI & Machine Learning</option>
                      <option>Cybersecurity</option>
                      <option>Cloud Computing</option>
                      <option>DevOps</option>
                      <option>UI/UX Design</option>
                      <option>Product Management</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">What are your career goals? *</label>
                    <textarea class="form-control" rows="4" placeholder="Tell us about your short-term and long-term career goals..." required></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label">What do you hope to achieve through mentorship? *</label>
                    <textarea class="form-control" rows="4" placeholder="Describe what you want to accomplish with your mentor..." required></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Preferred Meeting Time</label>
                    <select class="form-select">
                      <option value="">Select...</option>
                      <option>Weekday Mornings</option>
                      <option>Weekday Afternoons</option>
                      <option>Weekday Evenings</option>
                      <option>Weekend Mornings</option>
                      <option>Weekend Afternoons</option>
                      <option>Flexible</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">How did you hear about us?</label>
                    <select class="form-select">
                      <option value="">Select...</option>
                      <option>Social Media</option>
                      <option>Google Search</option>
                      <option>Friend/Colleague Referral</option>
                      <option>TecWorld Academy Website</option>
                      <option>Event/Workshop</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms" required>
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="terms.php">Terms of Service</a> and <a href="privacy.php">Privacy Policy</a> *
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newsletter">
                      <label class="form-check-label" for="newsletter">
                        Send me tips, resources, and updates about the mentorship program
                      </label>
                    </div>
                  </div>
                  <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                      <i class="bi bi-send me-2"></i>Submit Application
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="display-5 fw-bold mb-4">Ready to Transform Your Career?</h2>
      <p class="lead mb-4">Join hundreds of successful professionals who have accelerated their careers through our mentorship program.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="#apply" class="btn btn-light btn-lg px-5">
          <i class="bi bi-rocket-takeoff me-2"></i>Start Your Journey
        </a>
        <a href="/contact/contact.php" class="btn btn-outline-light btn-lg px-5">
          <i class="bi bi-chat-dots me-2"></i>Chat With Us
        </a>
      </div>
    </div>
  </section>
</div>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
