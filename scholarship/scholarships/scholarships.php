<?php
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<!-- Scholarships Page -->
<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section class="position-relative" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); padding: 100px 0 80px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
              <li class="breadcrumb-item"><a href="/index/index.php" class="text-white">Home</a></li>
              <li class="breadcrumb-item"><a href="/Admissions/General/admissions/admissions.php" class="text-white">Admissions</a></li>
              <li class="breadcrumb-item active text-white">Scholarships & Financial Aid</li>
            </ol>
          </nav>
          <h1 class="display-3 fw-bold mb-4">Scholarships & Financial Aid</h1>
          <p class="lead mb-4">We believe education should be accessible to everyone. Explore our scholarship opportunities and financial aid options to make your tech education dreams a reality.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#scholarships" class="btn btn-light btn-lg px-5">
              <i class="bi bi-trophy me-2"></i>View Scholarships
            </a>
            <a href="#apply-now" class="btn btn-outline-light btn-lg px-5">
              <i class="bi bi-file-earmark-text me-2"></i>Apply Now
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <img src="assets/images/scholarship-hero.jpg" alt="Scholarships" class="img-fluid rounded shadow-lg">
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Stats -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-cash-stack text-success" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">GHS 2M+</h3>
              <p class="text-muted mb-0">Awarded Annually</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">800+</h3>
              <p class="text-muted mb-0">Students Supported</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-trophy-fill text-warning" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">15+</h3>
              <p class="text-muted mb-0">Scholarship Programs</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-percent text-info" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">Up to 100%</h3>
              <p class="text-muted mb-0">Tuition Coverage</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Apply Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Why Apply for Financial Aid?</h2>
        <p class="lead text-muted">Don't let finances hold you back from achieving your dreams</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
            </div>
            <h5 class="mb-3">Reduce Financial Burden</h5>
            <p class="text-muted">Cover tuition fees, materials, and living expenses with our comprehensive financial aid programs.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-mortarboard text-success" style="font-size: 2rem;"></i>
            </div>
            <h5 class="mb-3">Focus on Learning</h5>
            <p class="text-muted">Concentrate on your studies without worrying about financial constraints.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-star text-info" style="font-size: 2rem;"></i>
            </div>
            <h5 class="mb-3">Recognition of Merit</h5>
            <p class="text-muted">Get recognized for your academic achievements and special talents.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-people text-warning" style="font-size: 2rem;"></i>
            </div>
            <h5 class="mb-3">Join a Network</h5>
            <p class="text-muted">Connect with other scholarship recipients and build lasting relationships.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Scholarship Programs -->
  <section id="scholarships" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Available Scholarships</h2>
        <p class="lead text-muted">Explore our diverse range of scholarship opportunities</p>
      </div>

      <div class="row g-4">
        <!-- Merit-Based Scholarship -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="ribbon ribbon-primary">POPULAR</div>
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-trophy-fill text-primary" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-primary mb-2">Merit-Based Scholarships</h4>
                  <p class="text-muted mb-0">For outstanding academic achievers</p>
                </div>
              </div>

              <p class="card-text mb-4">Awarded to students who demonstrate exceptional academic performance and potential. This scholarship recognizes excellence and rewards hard work.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;">Up to 50% Tuition</div>
                </div>
                <small class="text-muted">Covers up to 50% of tuition fees per semester</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Eligibility Criteria:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Minimum GPA of 3.5/4.0 or equivalent</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Available for all programs</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Academic transcript required</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Recommendation letters (2)</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Personal statement</li>
                </ul>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Renewable:</h6>
                <p class="text-muted mb-0">Yes, annually based on maintaining GPA of 3.5 or higher</p>
              </div>

              <div class="alert alert-info mb-3">
                <small><i class="bi bi-calendar-event me-2"></i><strong>Application Deadline:</strong> Rolling basis, apply before program start</small>
              </div>

              <a href="#apply-now" class="btn btn-primary w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Apply for Merit Scholarship
              </a>
            </div>
          </div>
        </div>

        <!-- Need-Based Scholarship -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-heart-fill text-success" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-success mb-2">Need-Based Scholarships</h4>
                  <p class="text-muted mb-0">Supporting students with financial constraints</p>
                </div>
              </div>

              <p class="card-text mb-4">Designed for motivated students who demonstrate financial need. We believe talent shouldn't be limited by financial circumstances.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 75%;">Up to 75% Tuition</div>
                </div>
                <small class="text-muted">Covers 25-75% of tuition fees based on need assessment</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Eligibility Criteria:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Demonstrated financial need</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Proof of family income</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Strong motivation statement</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Minimum GPA of 2.5/4.0</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Available for select programs</li>
                </ul>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Required Documents:</h6>
                <ul class="list-unstyled small">
                  <li class="mb-1"><i class="bi bi-file-earmark text-primary me-2"></i>Financial need statement</li>
                  <li class="mb-1"><i class="bi bi-file-earmark text-primary me-2"></i>Income documentation</li>
                  <li class="mb-1"><i class="bi bi-file-earmark text-primary me-2"></i>Academic records</li>
                </ul>
              </div>

              <div class="alert alert-info mb-3">
                <small><i class="bi bi-calendar-event me-2"></i><strong>Application Deadline:</strong> 30 days before program start</small>
              </div>

              <a href="#apply-now" class="btn btn-success w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Apply for Need-Based Scholarship
              </a>
            </div>
          </div>
        </div>

        <!-- Women in Tech Scholarship -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-danger bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-gender-female text-danger" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-danger mb-2">Women in Tech Scholarship</h4>
                  <p class="text-muted mb-0">Empowering women in technology</p>
                </div>
              </div>

              <p class="card-text mb-4">Supporting female students pursuing careers in technology and closing the gender gap in the tech industry.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;">Up to 60% Tuition</div>
                </div>
                <small class="text-muted">Covers up to 60% of tuition fees + mentorship program</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Eligibility Criteria:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Female students only</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Minimum GPA of 3.0/4.0</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Essay on women in technology</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Commitment to tech diversity</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>All tech programs eligible</li>
                </ul>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Additional Benefits:</h6>
                <ul class="list-unstyled small">
                  <li class="mb-1"><i class="bi bi-star-fill text-warning me-2"></i>Female mentor assignment</li>
                  <li class="mb-1"><i class="bi bi-star-fill text-warning me-2"></i>Women in Tech networking events</li>
                  <li class="mb-1"><i class="bi bi-star-fill text-warning me-2"></i>Leadership workshops</li>
                </ul>
              </div>

              <div class="alert alert-info mb-3">
                <small><i class="bi bi-calendar-event me-2"></i><strong>Application Deadline:</strong> March 31, 2026</small>
              </div>

              <a href="#apply-now" class="btn btn-danger w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Apply for Women in Tech Scholarship
              </a>
            </div>
          </div>
        </div>

        <!-- Special Talent Scholarship -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-star-fill text-warning" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-warning mb-2">Special Talent Scholarships</h4>
                  <p class="text-muted mb-0">For exceptional talent and innovation</p>
                </div>
              </div>

              <p class="card-text mb-4">Recognizing students who excel in leadership, technology innovation, community service, or have unique talents that contribute to our community.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;">Up to 40% Tuition</div>
                </div>
                <small class="text-muted">Variable coverage based on talent assessment</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Eligible Categories:</h6>
                <div class="row g-2">
                  <div class="col-6">
                    <span class="badge bg-warning text-dark w-100">Leadership</span>
                  </div>
                  <div class="col-6">
                    <span class="badge bg-warning text-dark w-100">Innovation</span>
                  </div>
                  <div class="col-6">
                    <span class="badge bg-warning text-dark w-100">Community Service</span>
                  </div>
                  <div class="col-6">
                    <span class="badge bg-warning text-dark w-100">Tech Projects</span>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Required Submissions:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Portfolio or project showcase</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Video presentation (3-5 mins)</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Recommendation letters (3)</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Interview with selection committee</li>
                </ul>
              </div>

              <div class="alert alert-warning mb-3">
                <small><i class="bi bi-exclamation-triangle me-2"></i><strong>Limited Awards:</strong> Only 20 scholarships available per year</small>
              </div>

              <a href="#apply-now" class="btn btn-warning w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Apply for Talent Scholarship
              </a>
            </div>
          </div>
        </div>

        <!-- Early Bird Scholarship -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-alarm-fill text-info" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-info mb-2">Early Bird Scholarship</h4>
                  <p class="text-muted mb-0">Apply early and save</p>
                </div>
              </div>

              <p class="card-text mb-4">Automatic tuition discount for students who enroll and pay at least 2 months before program start date.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 20%;">20% Tuition</div>
                </div>
                <small class="text-muted">Automatic 20% discount on tuition fees</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Eligibility Criteria:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Enroll 2+ months before start date</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Full or 50% payment upfront</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>All programs eligible</li>
                  <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>No application required - automatic</li>
                </ul>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">How It Works:</h6>
                <ol class="small">
                  <li class="mb-1">Complete enrollment 2+ months early</li>
                  <li class="mb-1">Make qualifying payment</li>
                  <li class="mb-1">Discount applied automatically</li>
                  <li class="mb-1">Receive confirmation email</li>
                </ol>
              </div>

              <div class="alert alert-info mb-3">
                <small><i class="bi bi-info-circle me-2"></i><strong>Can be combined</strong> with other scholarships (up to 75% total)</small>
              </div>

              <a href="/Admissions/General/admissions/admissions.php" class="btn btn-info w-100">
                <i class="bi bi-lightning-charge me-2"></i>Enroll Early & Save
              </a>
            </div>
          </div>
        </div>

        <!-- Partnership Scholarships -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-start mb-3">
                <div class="bg-secondary bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-building text-secondary" style="font-size: 2rem;"></i>
                </div>
                <div>
                  <h4 class="card-title text-secondary mb-2">Partnership Scholarships</h4>
                  <p class="text-muted mb-0">Sponsored by tech companies & NGOs</p>
                </div>
              </div>

              <p class="card-text mb-4">Offered in collaboration with leading tech companies and NGOs to support the next generation of innovators and tech leaders.</p>

              <div class="mb-4">
                <h6 class="fw-bold mb-3">Coverage:</h6>
                <div class="progress mb-2" style="height: 25px;">
                  <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;">Up to 100% Tuition</div>
                </div>
                <small class="text-muted">Full or partial tuition coverage + additional benefits</small>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Current Partners:</h6>
                <div class="d-flex flex-wrap gap-2">
                  <span class="badge bg-primary">Google</span>
                  <span class="badge bg-success">Microsoft</span>
                  <span class="badge bg-info">AWS</span>
                  <span class="badge bg-warning text-dark">MTN Ghana</span>
                  <span class="badge bg-danger">Vodafone</span>
                  <span class="badge bg-dark">IBM</span>
                </div>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Additional Benefits:</h6>
                <ul class="list-unstyled small">
                  <li class="mb-1"><i class="bi bi-briefcase text-primary me-2"></i>Internship opportunities</li>
                  <li class="mb-1"><i class="bi bi-people text-primary me-2"></i>Company mentorship</li>
                  <li class="mb-1"><i class="bi bi-award text-primary me-2"></i>Industry certifications</li>
                  <li class="mb-1"><i class="bi bi-laptop text-primary me-2"></i>Equipment provision</li>
                </ul>
              </div>

              <div class="mb-4">
                <h6 class="fw-bold mb-2">Selection Criteria:</h6>
                <ul class="list-unstyled small">
                  <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Program-specific availability</li>
                  <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Partner company criteria apply</li>
                  <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Interview process included</li>
                </ul>
              </div>

              <a href="#apply-now" class="btn btn-secondary w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Apply for Partnership Scholarship
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Other Financial Aid Options -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Other Financial Aid Options</h2>
        <p class="lead text-muted">Additional ways to finance your education</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-calendar-month text-primary" style="font-size: 2rem;"></i>
              </div>
              <h5 class="mb-3">Payment Plans</h5>
              <p class="text-muted mb-4">Spread your tuition payments over 6-12 months with our flexible, interest-free payment plans.</p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>No interest charges</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>6 or 12-month options</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Easy setup process</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Automatic deductions</li>
              </ul>
              <a href="payment-plans.php" class="btn btn-outline-primary">Learn More</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 text-center">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-bank text-success" style="font-size: 2rem;"></i>
              </div>
              <h5 class="mb-3">Student Loans</h5>
              <p class="text-muted mb-4">Partner with local banks offering student loans with favorable terms and low interest rates.</p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Low interest rates</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Grace period after graduation</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Flexible repayment terms</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>We assist with applications</li>
              </ul>
              <a href="student-loans.php" class="btn btn-outline-success">Learn More</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 text-center">
              <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-mortarboard text-info" style="font-size: 2rem;"></i>
              </div>
              
              <h5 class="mb-3">Scholarships</h5>
              <p class="text-muted mb-4">Apply for scholarships that align with your academic goals and financial needs.</p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Focus on learning</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Reduce financial burden</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Recognition of merit</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Join a network</li>
              </ul>
              <a href="scholarships.php" class="btn btn-outline-info">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php
include(__DIR__ . '/..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\includes\footer\footer.php');
?>
