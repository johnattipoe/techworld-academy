<?php
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section class="hero-section position-relative" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 100px 0 80px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white">
          <h1 class="display-3 fw-bold mb-4">Coding Bootcamps</h1>
          <p class="lead mb-4">Intensive, immersive training programs designed to transform you into a job-ready developer in weeks, not years.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#programs" class="btn btn-light btn-lg px-5">
              <i class="bi bi-rocket-takeoff me-2"></i>View Programs
            </a>
            <a href="#apply" class="btn btn-outline-light btn-lg px-5">
              <i class="bi bi-file-earmark-text me-2"></i>Apply Now
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <img src="assets/images/bootcamp-hero.jpg" alt="Bootcamps" class="img-fluid rounded shadow-lg">
        </div>
      </div>
    </div>
  </section>

  <nav aria-label="breadcrumb" class="mb-4" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 10px 0;">
    <ol class="breadcrumb bg-transparent">
      <li class="breadcrumb-item"><a href="/index/index.php" class="text-white">Home</a></li>
      <li class="breadcrumb-item"><a href="services.php" class="text-white">Services</a></li>
      <li class="breadcrumb-item active text-white">Coding Bootcamps</li>
    </ol>
  </nav>

  <!-- Stats Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">3,000+</h3>
              <p class="text-muted mb-0">Graduates</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-briefcase-fill text-success" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">92%</h3>
              <p class="text-muted mb-0">Job Placement Rate</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-cash-stack text-warning" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">GHS 4,500</h3>
              <p class="text-muted mb-0">Average Starting Salary</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-clock-fill text-info" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">12-16</h3>
              <p class="text-muted mb-0">Weeks Duration</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What is Bootcamp Section -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="assets/images/bootcamp-about.jpg" alt="About Bootcamps" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6">
          <h2 class="display-5 fw-bold mb-4">What is a Coding Bootcamp?</h2>
          <p class="lead text-muted mb-4">An intensive, accelerated training program that teaches you the skills needed to start a career in tech. Our bootcamps combine structured curriculum, hands-on projects, and career support to prepare you for the job market.</p>
          
          <div class="row g-4">
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-speedometer2"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Intensive Learning</h5>
                  <p class="text-muted mb-0">8-10 hours per day, 5 days a week</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-code-square"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Project-Based</h5>
                  <p class="text-muted mb-0">Build 5+ real-world projects</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-people"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Career Support</h5>
                  <p class="text-muted mb-0">Job placement assistance included</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-trophy"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Industry-Ready</h5>
                  <p class="text-muted mb-0">Learn current technologies</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootcamp Programs -->
  <section id="programs" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Our Bootcamp Programs</h2>
        <p class="lead text-muted">Choose the program that aligns with your career goals</p>
      </div>

      <div class="row g-4">
        <!-- Full-Stack Web Development -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="ribbon ribbon-primary">MOST POPULAR</div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h3 class="mb-2">Full-Stack Web Development</h3>
                  <p class="text-muted mb-0">Become a versatile web developer</p>
                </div>
                <span class="badge bg-primary">16 Weeks</span>
              </div>

              <div class="mb-4">
                <h5 class="mb-3">What You'll Learn:</h5>
                <div class="row g-2">
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>HTML, CSS, JavaScript</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>React.js & Redux</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Node.js & Express</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>MongoDB & SQL</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>RESTful APIs</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Git & GitHub</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Deployment & Hosting</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Agile Methodologies</small>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <h5 class="mb-3">Program Details:</h5>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-calendar3 text-primary me-2"></i><strong>Duration:</strong> 16 weeks (full-time)</li>
                  <li class="mb-2"><i class="bi bi-clock text-primary me-2"></i><strong>Schedule:</strong> Mon-Fri, 9 AM - 6 PM</li>
                  <li class="mb-2"><i class="bi bi-laptop text-primary me-2"></i><strong>Format:</strong> In-person & Online options</li>
                  <li class="mb-2"><i class="bi bi-folder text-primary me-2"></i><strong>Projects:</strong> 6 portfolio projects</li>
                  <li class="mb-2"><i class="bi bi-people text-primary me-2"></i><strong>Class Size:</strong> Max 20 students</li>
                </ul>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="h4 fw-bold text-primary">GHS 8,500</span>
                  <p class="small text-muted mb-0">Payment plans available</p>
                </div>
                <a href="#apply" class="btn btn-primary btn-lg">Apply Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Data Science & Analytics -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h3 class="mb-2">Data Science & Analytics</h3>
                  <p class="text-muted mb-0">Master data analysis and machine learning</p>
                </div>
                <span class="badge bg-success">14 Weeks</span>
              </div>

              <div class="mb-4">
                <h5 class="mb-3">What You'll Learn:</h5>
                <div class="row g-2">
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Python Programming</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Data Analysis (Pandas)</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Data Visualization</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>SQL & Databases</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Machine Learning</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Statistics & Probability</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Tableau & Power BI</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-2"></i>Big Data Tools</small>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <h5 class="mb-3">Program Details:</h5>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-calendar3 text-success me-2"></i><strong>Duration:</strong> 14 weeks (full-time)</li>
                  <li class="mb-2"><i class="bi bi-clock text-success me-2"></i><strong>Schedule:</strong> Mon-Fri, 9 AM - 6 PM</li>
                  <li class="mb-2"><i class="bi bi-laptop text-success me-2"></i><strong>Format:</strong> Hybrid (In-person & Online)</li>
                  <li class="mb-2"><i class="bi bi-folder text-success me-2"></i><strong>Projects:</strong> 5 data science projects</li>
                  <li class="mb-2"><i class="bi bi-people text-success me-2"></i><strong>Class Size:</strong> Max 20 students</li>
                </ul>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="h4 fw-bold text-success">GHS 7,800</span>
                  <p class="small text-muted mb-0">Payment plans available</p>
                </div>
                <a href="#apply" class="btn btn-success btn-lg">Apply Now</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Cybersecurity Bootcamp -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h3 class="mb-2">Cybersecurity Bootcamp</h3>
                  <p class="text-muted mb-0">Become a security professional</p>
                </div>
                <span class="badge bg-warning text-dark">12 Weeks</span>
              </div>

        <div class="mb-4">
            <h5 class="mb-3">What You'll Learn:</h5>
                <div class="row g-2">
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Network Security</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Ethical Hacking</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Penetration Testing</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Security Tools (Kali Linux)</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Cryptography</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Web Application Security</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Incident Response</small>
                    </div>
                    <div class="col-6">
                        <small><i class="bi bi-check-circle-fill text-success me-2"></i>Security Compliance</small>
                    </div>
                </div>
            </div>
            <div class="mb-4">
            <h5 class="mb-3">Program Details:</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-calendar3 text-warning me-2"></i><strong>Duration:</strong> 12 weeks (full-time)</li>
              <li class="mb-2"><i class="bi bi-clock text-warning me-2"></i><strong>Schedule:</strong> Mon-Fri, 9 AM - 6 PM</li>
              <li class="mb-2"><i class="bi bi-laptop text-warning me-2"></i><strong>Format:</strong> In-person with lab access</li>
              <li class="mb-2"><i class="bi bi-folder text-warning me-2"></i><strong>Projects:</strong> 4 security assessments</li>
              <li class="mb-2"><i class="bi bi-people text-warning me-2"></i><strong>Class Size:</strong> Max 15 students</li>
            </ul>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="h4 fw-bold text-warning">GHS 9,200</span>
              <p class="small text-muted mb-0">Payment plans available</p>
            </div>
            <a href="#apply" class="btn btn-warning btn-lg">Apply Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile App Development -->
    <div class="col-lg-6">
      <div class="card border-0 shadow-lg h-100">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
              <h3 class="mb-2">Mobile App Development</h3>
              <p class="text-muted mb-0">Build iOS and Android apps</p>
            </div>
            <span class="badge bg-info">14 Weeks</span>
          </div>

          <div class="mb-4">
            <h5 class="mb-3">What You'll Learn:</h5>
            <div class="row g-2">
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>React Native</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>Flutter & Dart</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>Mobile UI/UX Design</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>Firebase Integration</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>API Integration</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>Push Notifications</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>App Store Deployment</small>
              </div>
              <div class="col-6">
                <small><i class="bi bi-check-circle-fill text-success me-2"></i>Mobile Testing</small>
              </div>
            </div>
          </div>

          <div class="mb-4">
            <h5 class="mb-3">Program Details:</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-calendar3 text-info me-2"></i><strong>Duration:</strong> 14 weeks (full-time)</li>
              <li class="mb-2"><i class="bi bi-clock text-info me-2"></i><strong>Schedule:</strong> Mon-Fri, 9 AM - 6 PM</li>
              <li class="mb-2"><i class="bi bi-laptop text-info me-2"></i><strong>Format:</strong> In-person & Online options</li>
              <li class="mb-2"><i class="bi bi-folder text-info me-2"></i><strong>Projects:</strong> 5 mobile apps</li>
              <li class="mb-2"><i class="bi bi-people text-info me-2"></i><strong>Class Size:</strong> Max 18 students</li>
            </ul>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="h4 fw-bold text-info">GHS 8,000</span>
              <p class="small text-muted mb-0">Payment plans available</p>
            </div>
            <a href="#apply" class="btn btn-info btn-lg">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- What's Included -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">What's Included</h2>
        <p class="lead text-muted">Everything you need to succeed</p>
      </div>
      <div class="row g-4">
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-laptop text-primary" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Full Curriculum Access</h5>
          <p class="text-muted mb-0">Lifetime access to all course materials, videos, and resources even after graduation.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-people text-success" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">1-on-1 Mentorship</h5>
          <p class="text-muted mb-0">Weekly one-on-one sessions with experienced instructors for personalized guidance.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-briefcase text-info" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Career Services</h5>
          <p class="text-muted mb-0">Resume building, interview prep, and job placement assistance until you land a job.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-folder text-warning" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Portfolio Projects</h5>
          <p class="text-muted mb-0">Build 5-6 professional projects to showcase your skills to potential employers.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-building text-danger" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Employer Network</h5>
          <p class="text-muted mb-0">Access to our network of 200+ hiring partners actively seeking bootcamp graduates.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-people-fill text-secondary" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Alumni Network</h5>
          <p class="text-muted mb-0">Join a community of 3,000+ successful graduates for networking and support.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-award text-primary" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Industry Certificate</h5>
          <p class="text-muted mb-0">Earn a recognized certificate upon completion to validate your skills.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-chat-dots text-success" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">24/7 Support</h5>
          <p class="text-muted mb-0">Access to teaching assistants and peer support through Slack and Discord.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi bi-cloud text-info" style="font-size: 1.5rem;"></i>
          </div>
          <h5 class="mb-3">Cloud Credits</h5>
          <p class="text-muted mb-0">$200 in AWS/Azure credits for hosting your projects and learning cloud services.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Admission Requirements -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Admission Requirements</h2>
        <p class="lead text-muted">What you need to get started</p>
      </div>
      <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card border-0 shadow">
        <div class="card-body p-5">
          <h4 class="mb-4">Basic Requirements:</h4>
          <ul class="list-unstyled mb-5">
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Age:</strong> 18 years or older</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Education:</strong> High school diploma or equivalent</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Commitment:</strong> Ability to dedicate 40-50 hours per week</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Equipment:</strong> Laptop (8GB RAM minimum recommended)</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>English:</strong> Basic proficiency in English</li>
          </ul>

          <h4 class="mb-4">Application Process:</h4>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    1
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6>Submit Application</h6>
                  <p class="small text-muted mb-0">Fill out the online form</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    2
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6>Technical Assessment</h6>
                  <p class="small text-muted mb-0">Complete coding challenge</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    3
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6>Interview</h6>
                  <p class="small text-muted mb-0">30-minute video interview</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    4
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6>Acceptance</h6>
                  <p class="small text-muted mb-0">Receive decision in 3-5 days</p>
                </div>
              </div>
            </div>
          </div>

          <div class="alert alert-info mt-4">
            <h6><i class="bi bi-lightbulb me-2"></i>No Prior Experience Required!</h6>
            <p class="mb-0">You don't need any coding experience to apply. We'll teach you everything from scratch. We're looking for motivated individuals with problem-solving skills and a passion for technology.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4 text-center">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-cash-stack text-primary" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Upfront Payment</h4>
          <p class="text-muted mb-4">Pay the full tuition upfront and save</p>
          <h3 class="text-primary mb-3">15% Off</h3>
          <ul class="list-unstyled text-start">
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Biggest discount</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>No interest</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>One-time payment</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-primary border-2 shadow-lg h-100">
        <div class="card-header bg-primary text-white text-center">
          <h6 class="mb-0">MOST POPULAR</h6>
        </div>
        <div class="card-body p-4 text-center">
          <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-calendar-month text-success" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Monthly Installments</h4>
          <p class="text-muted mb-4">Spread the cost over 6-12 months</p>
          <h3 class="text-success mb-3">0% Interest</h3>
          <ul class="list-unstyled text-start">
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>No interest charged</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Flexible terms</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Easy approval</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4 text-center">
          <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-briefcase text-info" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Income Share Agreement</h4>
          <p class="text-muted mb-4">Pay nothing until you get a job</p>
          <h3 class="text-info mb-3">GHS 0</h3>
          <ul class="list-unstyled text-start">
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>No upfront cost</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Pay when employed</li>
            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Income-based payments</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center mt-5">
    <p class="lead mb-3">Need help deciding? Our admissions team can help you choose the best option.</p>
        <a href="/contact/contact.php" class="btn btn-primary btn-lg">
            <i class="bi bi-chat-dots me-2"></i>Talk to an Advisor
        </a>
    </div>
</div>
</section>

<!-- Application Form -->
<section id="apply" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                    <h2 class="text-center mb-4">Apply to Bootcamp</h2>
                    <p class="text-center text-muted mb-5">Start your application in less than 5 minutes</p>
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
                <label class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select class="form-select">
                  <option value="">Prefer not to say</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Non-binary</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Select Bootcamp Program *</label>
                <select class="form-select" required>
                  <option value="">Choose a program...</option>
                  <option>Full-Stack Web Development (16 weeks)</option>
                  <option>Data Science & Analytics (14 weeks)</option>
                  <option>Cybersecurity Bootcamp (12 weeks)</option>
                  <option>Mobile App Development (14 weeks)</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Preferred Start Date *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>November 2025 Cohort</option>
                  <option>January 2026 Cohort</option>
                  <option>March 2026 Cohort</option>
                  <option>May 2026 Cohort</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Format Preference *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>In-Person (Accra)</option>
                  <option>In-Person (Tema)</option>
                  <option>Online</option>
                  <option>Hybrid</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Highest Education Level *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>High School Diploma</option>
                  <option>Some College</option>
                  <option>Associate Degree</option>
                  <option>Bachelor's Degree</option>
                  <option>Master's Degree</option>
                  <option>PhD</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Current Employment Status *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>Employed Full-Time</option>
                  <option>Employed Part-Time</option>
                  <option>Self-Employed</option>
                  <option>Unemployed</option>
                  <option>Student</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Do you have any programming experience?</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="experience" id="exp-yes">
                  <label class="form-check-label" for="exp-yes">
                    Yes (please describe below)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="experience" id="exp-no" checked>
                  <label class="form-check-label" for="exp-no">
                    No, I'm a complete beginner
                  </label>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">If yes, please describe your programming experience</label>
                <textarea class="form-control" rows="3" placeholder="Languages, projects, courses, etc."></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Why do you want to join this bootcamp? *</label>
                <textarea class="form-control" rows="4" placeholder="Tell us about your goals and motivation..." required></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">What do you hope to achieve after graduation? *</label>
                <textarea class="form-control" rows="3" required></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Preferred Payment Option *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>Upfront Payment (15% discount)</option>
                  <option>Monthly Installments (0% interest)</option>
                  <option>Income Share Agreement</option>
                  <option>I need to discuss options</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">How did you hear about us? *</label>
                <select class="form-select" required>
                  <option value="">Select...</option>
                  <option>Google Search</option>
                  <option>Social Media</option>
                  <option>Friend/Colleague Referral</option>
                  <option>TecWorld Academy Website</option>
                  <option>Job Board</option>
                  <option>Event/Workshop</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Referral Code (if applicable)</label>
                <input type="text" class="form-control" placeholder="Enter referral code">
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="available" required>
                  <label class="form-check-label" for="available">
                    I confirm that I can commit 40-50 hours per week to the bootcamp *
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" required>
                  <label class="form-check-label" for="terms">
                    I agree to the <a href="terms.php" target="_blank">Terms of Service</a> and <a href="privacy.php" target="_blank">Privacy Policy</a> *
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="marketing">
                  <label class="form-check-label" for="marketing">
                    Send me updates about bootcamp info sessions and deadlines
                  </label>
                </div>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5">
                  <i class="bi bi-send me-2"></i>Submit Application
                </button>
              </div>
              <div class="col-12 text-center mt-3">
                <small class="text-muted">You'll receive a confirmation email within 24 hours</small>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- FAQ Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
        <p class="lead text-muted">Everything you need to know about our bootcamps</p>
      </div>
      <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="accordion" id="bootcampFaqAccordion">
        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
              Do I need prior programming experience?
            </button>
          </h3>
          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              No! Our bootcamps are designed for complete beginners. We start with the fundamentals and build up from there. What matters most is your motivation, commitment, and willingness to learn. However, completing our free prep course before starting is highly recommended.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
              Can I work while attending the bootcamp?
            </button>
          </h3>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              Our bootcamps are full-time and intensive (40-50 hours per week). While some students work part-time, we strongly recommend treating the bootcamp as a full-time commitment for best results. We do offer evening and weekend programs for those who cannot leave their jobs.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
              What's the job placement rate?
            </button>
          </h3>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              92% of our graduates find employment within 6 months of graduation. We provide job placement assistance including resume reviews, interview prep, and direct introductions to hiring partners. However, landing a job also depends on your effort, portfolio quality, and market conditions.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
              What's included in the tuition?
            </button>
          </h3>
          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              Tuition includes: all course materials, 1-on-1 mentorship sessions, career services, access to our online learning platform, $200 in cloud credits, industry certificate, alumni network access, and lifetime access to course updates. The only additional costs are your laptop and internet connection.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
              What if I fall behind or need to pause?
            </button>
          </h3>
          <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              We provide extensive support to help you stay on track, including teaching assistants, peer study groups, and 1-on-1 mentoring. If you need to pause for a legitimate reason (medical, family emergency), you can defer to the next cohort. We want you to succeed, so we'll work with you to find solutions.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
              Is there a job guarantee?
            </button>
          </h3>
          <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              While we cannot guarantee employment (as it depends on many factors outside our control), we do guarantee that we'll support you until you find a job. Our career services remain available to you indefinitely. With our Income Share Agreement option, you only pay when you get a job earning above a certain threshold.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
              What's the difference between bootcamp and regular courses?
            </button>
          </h3>
          <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              Bootcamps are intensive, full-time programs designed to make you job-ready in 12-16 weeks. They include comprehensive curriculum, hands-on projects, career services, and job placement assistance. Regular courses are more flexible, self-paced, and focus on specific skills rather than complete career preparation.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
              Can international students apply?
            </button>
          </h3>
          <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#bootcampFaqAccordion">
            <div class="accordion-body">
              Yes! We welcome international students. For in-person bootcamps, you'll need to arrange your own visa and accommodation. We can provide documentation to support your visa application. Our online bootcamps are available to anyone worldwide. Job placement assistance focuses primarily on the Ghanaian job market.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Info Session CTA -->
  <section class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <h2 class="display-6 fw-bold mb-3">Attend a Free Info Session</h2>
          <p class="lead mb-0">Join us for a live Q&A session with our instructors and admissions team. Learn about the curriculum, meet alumni, and get all your questions answered.</p>
          <div class="mt-3">
            <span class="badge bg-primary me-2">Next Session: October 20, 2025</span>
            <span class="badge bg-success">Online & In-Person</span>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="info-session.php" class="btn btn-light btn-lg px-5">
            <i class="bi bi-calendar-plus me-2"></i>Register for Info Session
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Final CTA -->
  <section class="py-5 bg-gradient" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
    <div class="container text-center text-white">
      <h2 class="display-5 fw-bold mb-4">Ready to Start Your Tech Career?</h2>
      <p class="lead mb-4">Join our next cohort and transform your life in just 12-16 weeks.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="#apply" class="btn btn-light btn-lg px-5">
          <i class="bi bi-rocket-takeoff me-2"></i>Apply Now
        </a>
        <a href="schedule-call.php" class="btn btn-outline-light btn-lg px-5">
          <i class="bi bi-telephone me-2"></i>Schedule a Call
        </a>
      </div>
      <p class="mt-4 mb-0"><small>Applications for November 2025 cohort close on October 25, 2025</small></p>
    </div>
  </section>
</div>
<style>
.ribbon {
  position: absolute;
  top: 20px;
  right: -5px;
  padding: 5px 15px;
  font-size: 0.75rem;
  font-weight: bold;
  color: white;
  z-index: 1;
}
.ribbon-primary {
  background: linear-gradient(45deg, #0d6efd, #0a58ca);
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.ribbon::after {
  content: '';
  position: absolute;
  right: 0;
  bottom: -5px;
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid #0a58ca;
  border-bottom: 5px solid transparent;
}
</style>


<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
