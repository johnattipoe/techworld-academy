<?php 
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<!-- About Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-3">About TecWorld Academy</h1>
          <p class="lead mb-4">Empowering the next generation of tech leaders through innovative education and practical skills training since 2015.</p>
          <a href="#our-story" class="btn btn-light btn-lg px-4">Learn Our Story</a>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="../assets/about/about us.jpeg" alt="TecWorld Academy" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
        </div>
      </div>
    </div>
</section>

<!-- Breadcrumb Section -->
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/index/index.php" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-non">About</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </div>
</nav>

<!-- Mission, Vision, Values Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-bullseye text-primary fs-1"></i>
              </div>
              <h3 class="fw-bold mb-3">Our Mission</h3>
              <p class="card-text">To provide accessible, world-class technology education that transforms lives and empowers individuals to thrive in the digital economy.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-eye text-success fs-1"></i>
              </div>
              <h3 class="fw-bold mb-3">Our Vision</h3>
              <p class="card-text">To become Africa's leading technology academy, recognized globally for producing highly skilled professionals who drive innovation and digital transformation.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-heart text-warning fs-1"></i>
              </div>
              <h3 class="fw-bold mb-3">Our Values</h3>
              <p class="card-text">Excellence, Innovation, Integrity, Inclusion, and Student Success drive everything we do. We believe in creating opportunities for all.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-5 bg-light" id="our-story" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <img src="../assets/about/our-story.jpeg" alt="Our Story" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#our-story">
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <h2 class="fw-bold mb-4">Our Story</h2>
          <p class="mb-3">Founded in 2015 by a group of passionate technology professionals, TecWorld Academy was born from a simple vision: to bridge the digital skills gap in Ghana and across Africa.</p>
          <p class="mb-3">What started as a small training center with just 20 students has grown into Ghana's premier technology academy, having graduated over 5,000 students who now work in leading tech companies worldwide.</p>
          <p class="mb-3">Our founders recognized that traditional education wasn't keeping pace with the rapidly evolving tech industry. They set out to create an institution that combines academic rigor with practical, hands-on training that prepares students for real-world challenges.</p>
          <p class="mb-4">Today, we continue to innovate and expand our programs, staying at the forefront of technology education while maintaining our commitment to quality, accessibility, and student success.</p>
          <div class="d-flex gap-3">
            <div>
              <h4 class="text-primary fw-bold mb-0">2015</h4>
              <small class="text-muted">Founded</small>
            </div>
            <div class="border-start ps-3">
              <h4 class="text-primary fw-bold mb-0">5,000+</h4>
              <small class="text-muted">Graduates</small>
            </div>
            <div class="border-start ps-3">
              <h4 class="text-primary fw-bold mb-0">100+</h4>
              <small class="text-muted">Courses</small>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-5" data-aos="fade-up" id="timeline" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Journey</h2>
        <p class="lead">Key milestones in our growth</p>
      </div>
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="timeline">
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6 text-md-end">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2015</h5>
                    <h6 class="fw-bold">The Beginning</h6>
                    <p class="card-text">TecWorld Academy opens its doors with 20 students and 3 instructors in a single classroom in Accra.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6"></div>
            </div>
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2017</h5>
                    <h6 class="fw-bold">First Major Expansion</h6>
                    <p class="card-text">Moved to a larger facility and reached 500 total graduates. Launched online learning platform.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6 text-md-end">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2019</h5>
                    <h6 class="fw-bold">International Recognition</h6>
                    <p class="card-text">Became authorized training partner for AWS, Microsoft, and Google. Won Best Tech Academy Award.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6"></div>
            </div>
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2021</h5>
                    <h6 class="fw-bold">Pandemic Innovation</h6>
                    <p class="card-text">Successfully transitioned to hybrid learning model. Reached 3,000 graduates milestone.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6 text-md-end">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2023</h5>
                    <h6 class="fw-bold">New Campus Launch</h6>
                    <p class="card-text">Opened state-of-the-art 10,000 sq ft campus with advanced labs and facilities.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6"></div>
            </div>
            <div class="row mb-4" data-aos="fade-up">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">2025</h5>
                    <h6 class="fw-bold">Today</h6>
                    <p class="card-text">Over 5,000 graduates, 50+ expert instructors, and partnerships with 200+ companies worldwide.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">TecWorld by the Numbers</h2>
        <p class="lead">Our impact in figures</p>
      </div>
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">5K+</h1>
            <p class="lead mb-0">Graduates</p>
            <small>Since 2015</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">95%</h1>
            <p class="lead mb-0">Job Placement Rate</p>
            <small>Within 6 months</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">50+</h1>
            <p class="lead mb-0">Expert Instructors</p>
            <small>Industry professionals</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">200+</h1>
            <p class="lead mb-0">Partner Companies</p>
            <small>Hiring our graduates</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">100+</h1>
            <p class="lead mb-0">Courses Offered</p>
            <small>Across 8 categories</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">30+</h1>
            <p class="lead mb-0">Countries</p>
            <small>Where alumni work</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">4.9/5</h1>
            <p class="lead mb-0">Student Rating</p>
            <small>From 2,500+ reviews</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="p-3">
            <h1 class="display-3 fw-bold mb-0">₵6.5K</h1>
            <p class="lead mb-0">Avg. Starting Salary</p>
            <small>Of our graduates</small>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Leadership Team Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Meet Our Leadership Team</h2>
        <p class="lead">Experienced professionals committed to your success</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="../assets/person/Emmanuel Osei.jpeg" alt="CEO" class="rounded-circle mb-3" width="150" height="150">
              <h5 class="card-title">Dr. Kwame Nkrumah</h5>
              <p class="text-primary mb-2">Founder & CEO</p>
              <p class="card-text small text-muted">PhD in Computer Science. 20+ years in tech education. Former Google Engineer.</p>
              <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="../assets/person/Ama Boateng.jpeg" alt="CTO" class="rounded-circle mb-3" width="150" height="150">
              <h5 class="card-title">Ama Serwaa</h5>
              <p class="text-primary mb-2">Chief Technology Officer</p>
              <p class="card-text small text-muted">15 years in software development. MIT graduate. Former Microsoft Lead Developer.</p>
              <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="../assets/person/Kwame Asante.jpeg" alt="Dean" class="rounded-circle mb-3" width="150" height="150">
              <h5 class="card-title">Prof. Kofi Mensah</h5>
              <p class="text-primary mb-2">Dean of Academics</p>
              <p class="card-text small text-muted">PhD in Education Technology. 18 years teaching experience. Published author.</p>
              <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="../assets/person/Akosua Mensah.jpeg" alt="Director" class="rounded-circle mb-3" width="150" height="150">
              <h5 class="card-title">Akosua Boateng</h5>
              <p class="text-primary mb-2">Director of Operations</p>
              <p class="card-text small text-muted">MBA from Harvard. 12 years in education management. Strategic planning expert.</p>
              <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- What Makes Us Different Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What Makes Us Different</h2>
        <p class="lead">Why students choose TecWorld Academy</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-mortarboard text-primary fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Industry-Relevant Curriculum</h5>
                  <p class="mb-0">Our courses are constantly updated to reflect the latest industry trends and employer requirements. We work directly with tech companies to ensure you learn what matters.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-people text-success fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Small Class Sizes</h5>
                  <p class="mb-0">We maintain a 1:15 instructor-to-student ratio, ensuring personalized attention and hands-on support throughout your learning journey.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-briefcase text-warning fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Career Support for Life</h5>
                  <p class="mb-0">Our commitment doesn't end at graduation. You get lifetime access to our career services, job board, and professional development resources.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-laptop text-info fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Hands-On Learning</h5>
                  <p class="mb-0">Learn by doing with real-world projects, case studies, and practical assignments. Build a portfolio that showcases your skills to employers.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-danger bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-award text-danger fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Industry Certifications</h5>
                  <p class="mb-0">Earn globally recognized certifications from AWS, Microsoft, Google, CompTIA, and other leading technology companies.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex mb-3">
                <div class="bg-secondary bg-opacity-10 rounded p-3 me-3">
                  <i class="bi bi-clock-history text-secondary fs-2"></i>
                </div>
                <div>
                  <h5 class="fw-bold">Flexible Learning Options</h5>
                  <p class="mb-0">Choose from full-time, part-time, weekend, evening, or fully online options. We fit education into your schedule, not the other way around.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Partnerships Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Strategic Partners</h2>
        <p class="lead">Collaborating with industry leaders to provide the best education</p>
      </div>
      <div class="row align-items-center justify-content-center g-4 mb-5">
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Google.png" alt="Google" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Microsoft.png" alt="Microsoft" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Aws.png" alt="AWS" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/IBM.png" alt="IBM" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Cisco.png" alt="Cisco" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Adobe.png" alt="Adobe" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Comptia.png" alt="CompTIA" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="../assets/parteners/Oracle.png" alt="Oracle" class="img-fluid" style="max-height: 80px;">
        </div>
      </div>
      <div class="text-center">
        <h4 class="mb-3">Hiring Partners</h4>
        <p class="text-muted">Companies that regularly recruit our graduates</p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
          <span class="badge bg-primary p-2">MTN Ghana</span>
          <span class="badge bg-primary p-2">Vodafone</span>
          <span class="badge bg-primary p-2">Ecobank</span>
          <span class="badge bg-primary p-2">GCB Bank</span>
          <span class="badge bg-primary p-2">Jumia</span>
          <span class="badge bg-primary p-2">Hubtel</span>
          <span class="badge bg-primary p-2">Andela</span>
          <span class="badge bg-primary p-2">Farmerline</span>
          <span class="badge bg-primary p-2">mPharma</span>
          <span class="badge bg-primary p-2">Zipline</span>
        </div>
      </div>
    </div>
</section>

<!-- Accreditations Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Accreditations & Memberships</h2>
        <p class="lead">Recognized and certified by leading organizations</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-patch-check-fill text-success fs-1 mb-3"></i>
              <h5 class="card-title">ISO 9001:2015 Certified</h5>
              <p class="card-text">International standard for quality management systems in education.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-award-fill text-primary fs-1 mb-3"></i>
              <h5 class="card-title">National Accreditation Board</h5>
              <p class="card-text">Accredited by Ghana's National Accreditation Board for quality education.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-shield-check text-warning fs-1 mb-3"></i>
              <h5 class="card-title">Member of IAOED</h5>
              <p class="card-text">International Association of Online Engineering and Distance Learning.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Community Impact Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Community Impact</h2>
        <p class="lead">Committed to giving back and creating opportunities</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <i class="bi bi-people-fill fs-1 mb-3"></i>
            <h3 class="fw-bold">500+</h3>
            <p class="lead mb-0">Free Training Sessions</p>
            <p>For underprivileged youth annually</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <i class="bi bi-gender-female fs-1 mb-3"></i>
            <h3 class="fw-bold">40%</h3>
            <p class="lead mb-0">Women in Tech</p>
            <p>Female enrollment in our programs</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <i class="bi bi-cash-stack fs-1 mb-3"></i>
            <h3 class="fw-bold">₵2M+</h3>
            <p class="lead mb-0">Scholarships Awarded</p>
            <p>To deserving students since 2015</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What People Say About Us</h2>
        <p class="lead">Hear from our students, alumni, and partners</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"TecWorld Academy transformed my career. The instructors are world-class, and the hands-on approach made all the difference. I landed my dream job within 2 months of graduation."</p>
              <div class="d-flex align-items-center">
                <img src="../assets/person/Emmanuel Osei.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Samuel Owusu</h6>
                  <small class="text-muted">Software Engineer, Google</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"As a hiring manager, I've consistently been impressed with TecWorld graduates. They come prepared with practical skills and professional attitudes. We actively recruit from TecWorld."</p>
              <div class="d-flex align-items-center">
                <img src="../assets/person/Ama Boateng.jpeg" alt="Employer" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Grace Mensah</h6>
                  <small class="text-muted">HR Director, MTN Ghana</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The flexible learning options allowed me to study while working full-time. The career support team helped me triple my salary. Best investment I've ever made!"</p>
              <div class="d-flex align-items-center">
                <img src="../assets/person/Akosua Mensah.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Yaw Agyeman</h6>
                  <small class="text-muted">Data Analyst, Ecobank</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Campus Locations Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Locations</h2>
        <p class="lead">Find a campus near you</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/campus-accra.jpg" class="card-img-top" alt="Accra Campus">
            <div class="card-body">
              <h5 class="card-title">Main Campus - Accra</h5>
              <p class="card-text"><i class="bi bi-geo-alt-fill text-primary"></i> East Legon, Accra</p>
              <p class="card-text small">Our flagship campus with state-of-the-art facilities, advanced computer labs, and modern classrooms.</p>
              <ul class="list-unstyled small">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>10,000 sq ft facility</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>5 Computer Labs</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Library & Study Areas</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Student Lounge</li>
              </ul>
              <a href="/contact/contact.php?campus=accra" class="btn btn-outline-primary btn-sm">Get Directions</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/campus-kumasi.jpg" class="card-img-top" alt="Kumasi Campus">
            <div class="card-body">
              <h5 class="card-title">Kumasi Campus</h5>
              <p class="card-text"><i class="bi bi-geo-alt-fill text-primary"></i> Adum, Kumasi</p>
              <p class="card-text small">Serving the Ashanti Region with quality tech education and modern learning facilities.</p>
              <ul class="list-unstyled small">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>5,000 sq ft facility</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>3 Computer Labs</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Resource Center</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Career Services</li>
              </ul>
              <a href="/contact/contact.php?campus=kumasi" class="btn btn-outline-primary btn-sm">Get Directions</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/campus-takoradi.jpg" class="card-img-top" alt="Takoradi Campus">
            <div class="card-body">
              <h5 class="card-title">Takoradi Campus</h5>
              <p class="card-text"><i class="bi bi-geo-alt-fill text-primary"></i> Market Circle, Takoradi</p>
              <p class="card-text small">Bringing tech education to the Western Region with comprehensive training programs.</p>
              <ul class="list-unstyled small">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>3,500 sq ft facility</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 Computer Labs</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Study Rooms</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Weekend Classes</li>
              </ul>
              <a href="/contact/contact.php?campus=takoradi" class="btn btn-outline-primary btn-sm">Get Directions</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Awards & Recognition Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Awards & Recognition</h2>
        <p class="lead">Celebrating our achievements and excellence</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-trophy-fill text-warning fs-1 mb-3"></i>
              <h6 class="fw-bold">Best Tech Academy 2024</h6>
              <p class="text-muted small mb-0">Ghana Education Awards</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-award-fill text-primary fs-1 mb-3"></i>
              <h6 class="fw-bold">Innovation Excellence</h6>
              <p class="text-muted small mb-0">West Africa Tech Summit 2024</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-star-fill text-warning fs-1 mb-3"></i>
              <h6 class="fw-bold">Top 10 Coding Schools</h6>
              <p class="text-muted small mb-0">African Tech Review 2023</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-patch-check-fill text-success fs-1 mb-3"></i>
              <h6 class="fw-bold">Quality Assurance Award</h6>
              <p class="text-muted small mb-0">National Accreditation Board 2023</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-heart-fill text-danger fs-1 mb-3"></i>
              <h6 class="fw-bold">Social Impact Award</h6>
              <p class="text-muted small mb-0">Ghana CSR Excellence Awards 2022</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-people-fill text-info fs-1 mb-3"></i>
              <h6 class="fw-bold">Best Employer Partner</h6>
              <p class="text-muted small mb-0">Ghana HR Excellence Awards 2022</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-globe text-primary fs-1 mb-3"></i>
              <h6 class="fw-bold">International Recognition</h6>
              <p class="text-muted small mb-0">UNESCO Partnerships 2021</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <i class="bi bi-lightning-fill text-warning fs-1 mb-3"></i>
              <h6 class="fw-bold">Fastest Growing Academy</h6>
              <p class="text-muted small mb-0">Ghana Business Awards 2020</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Core Values Deep Dive Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Core Values in Action</h2>
        <p class="lead">The principles that guide everything we do</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-trophy text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold">Excellence</h5>
              <p class="card-text">We strive for the highest standards in education, consistently updating our curriculum and maintaining world-class facilities to ensure our students receive the best possible learning experience.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-lightbulb text-success fs-1"></i>
              </div>
              <h5 class="fw-bold">Innovation</h5>
              <p class="card-text">We embrace change and encourage creative thinking. Our programs incorporate the latest technologies and teaching methods to prepare students for the future of work.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-shield-check text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold">Integrity</h5>
              <p class="card-text">We operate with honesty, transparency, and ethical standards in all our dealings. Our commitment to integrity builds trust with students, partners, and the community.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-people text-info fs-1"></i>
              </div>
              <h5 class="fw-bold">Inclusion</h5>
              <p class="card-text">We believe technology education should be accessible to everyone, regardless of background. We actively work to create a diverse, welcoming environment for all students.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-star text-danger fs-1"></i>
              </div>
              <h5 class="fw-bold">Student Success</h5>
              <p class="card-text">Your success is our success. We measure our achievement by the careers we help launch and the lives we help transform through quality tech education.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-heart text-secondary fs-1"></i>
              </div>
              <h5 class="fw-bold">Community</h5>
              <p class="card-text">We foster a supportive learning community where students, alumni, instructors, and partners collaborate, share knowledge, and grow together.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Student Life Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Student Life at TecWorld</h2>
        <p class="lead">More than just classes - a vibrant community experience</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/student-life-1.jpg" class="card-img-top" alt="Hackathons">
            <div class="card-body">
              <h5 class="card-title">Hackathons & Competitions</h5>
              <p class="card-text">Participate in regular coding challenges, hackathons, and competitions to test your skills and win prizes.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/student-life-2.jpg" class="card-img-top" alt="Tech Talks">
            <div class="card-body">
              <h5 class="card-title">Tech Talks & Workshops</h5>
              <p class="card-text">Attend guest lectures from industry experts, networking events, and specialized workshops throughout the year.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/student-life-3.jpg" class="card-img-top" alt="Study Groups">
            <div class="card-body">
              <h5 class="card-title">Study Groups & Clubs</h5>
              <p class="card-text">Join various tech clubs, study groups, and special interest communities to learn and collaborate with peers.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-dark text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Join the TecWorld Family Today</h2>
          <p class="lead mb-0">Be part of a community that's transforming lives through technology education. Your journey to a successful tech career starts here.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/Admissions/General/admissions/admissions.php" class="btn btn-light btn-lg px-5 mb-2 d-block d-md-inline-block">Apply Now</a>
          <a href="/contact/contact.php" class="btn btn-outline-light btn-lg px-5 d-block d-md-inline-block">Contact Us</a>
        </div>
      </div>
    </div>
</section>

<!-- FAQ About Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Frequently Asked Questions</h2>
        <p class="lead">Learn more about TecWorld Academy</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="aboutFaqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq1">
                  When was TecWorld Academy founded?
                </button>
              </h2>
              <div id="aboutFaq1" class="accordion-collapse collapse show" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  TecWorld Academy was founded in 2015 by a team of passionate technology professionals who wanted to bridge the digital skills gap in Ghana and across Africa.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq2">
                  How many students have graduated from TecWorld?
                </button>
              </h2>
              <div id="aboutFaq2" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  We've proudly graduated over 5,000 students since our founding. Our alumni work in tech companies across 30+ countries worldwide.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq3">
                  Is TecWorld Academy accredited?
                </button>
              </h2>
              <div id="aboutFaq3" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  Yes, we are fully accredited by Ghana's National Accreditation Board and hold ISO 9001:2015 certification. We're also authorized training partners for AWS, Microsoft, Google, and other leading tech companies.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq4">
                  Who are your instructors?
                </button>
              </h2>
              <div id="aboutFaq4" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  Our 50+ instructors are industry professionals with years of real-world experience. Many have worked at companies like Google, Microsoft, IBM, and other leading tech organizations.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq5">
                  Do you offer scholarships or financial aid?
                </button>
              </h2>
              <div id="aboutFaq5" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  Yes! We offer merit-based scholarships, women in tech scholarships, and need-based financial aid. We've awarded over GH₵2 million in scholarships since 2015 to deserving students.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutFaq6">
                  How can I visit your campus?
                </button>
              </h2>
              <div id="aboutFaq6" class="accordion-collapse collapse" data-bs-parent="#aboutFaqAccordion">
                <div class="accordion-body">
                  We welcome campus visits! You can schedule a physical tour or take our virtual campus tour online. Contact our admissions team to arrange a visit at any of our locations in Accra, Kumasi, or Takoradi.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Ready to Start Your Journey?</h2>
          <p class="lead mb-0">Don't wait! Enroll today and take the first step towards your dream tech career.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/Admissions/General/admissions/admissions.php" class="btn btn-light btn-lg px-5">Apply Now</a>
        </div>
      </div>
    </div>
</section>

<?php include(__DIR__ . '/..\..\includes\footer\footer.php'); ?>