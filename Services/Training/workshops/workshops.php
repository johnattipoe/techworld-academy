<?php
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section class="hero-section position-relative" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 100px 0 80px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
              <li class="breadcrumb-item"><a href="/index/index.php" class="text-white">Home</a></li>
              <li class="breadcrumb-item"><a href="services.php" class="text-white">Services</a></li>
              <li class="breadcrumb-item active text-white">Workshops</li>
            </ol>
          </nav>
          <h1 class="display-3 fw-bold mb-4">Tech Workshops</h1>
          <p class="lead mb-4">Hands-on, practical workshops designed to upskill you quickly in cutting-edge technologies.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#upcoming" class="btn btn-light btn-lg px-5">
              <i class="bi bi-calendar-event me-2"></i>View Workshops
            </a>
            <a href="#register" class="btn btn-outline-light btn-lg px-5">
              <i class="bi bi-pencil-square me-2"></i>Register Now
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <img src="assets/images/workshop-hero.jpg" alt="Workshops" class="img-fluid rounded shadow-lg">
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
              <i class="bi bi-calendar-week-fill text-danger" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">50+</h3>
              <p class="text-muted mb-0">Workshops Annually</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">5,000+</h3>
              <p class="text-muted mb-0">Participants</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-star-fill text-warning" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">4.9/5</h3>
              <p class="text-muted mb-0">Average Rating</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-trophy-fill text-success" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">100%</h3>
              <p class="text-muted mb-0">Practical Learning</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What are Workshops Section -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="display-5 fw-bold mb-4">What Are Our Workshops?</h2>
          <p class="lead text-muted mb-4">Intensive, short-format training sessions focusing on specific skills, tools, or technologies. Perfect for busy professionals looking to quickly acquire new competencies.</p>
          
          <div class="row g-4">
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-clock"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Short Duration</h5>
                  <p class="text-muted mb-0">2 hours to 2 days</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-laptop"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Hands-On</h5>
                  <p class="text-muted mb-0">Practical exercises & projects</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-people"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Small Groups</h5>
                  <p class="text-muted mb-0">Maximum 25 participants</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-award"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5>Certificate</h5>
                  <p class="text-muted mb-0">Earn certificate of completion</p>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <a href="#upcoming" class="btn btn-danger btn-lg">Browse Workshops</a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="assets/images/workshop-about.jpg" alt="About Workshops" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Workshop Categories -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Workshop Categories</h2>
        <p class="lead text-muted">Explore our diverse range of workshop topics</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded p-3 mb-3 text-center">
                <i class="bi bi-code-slash text-primary" style="font-size: 3rem;"></i>
              </div>
              <h4 class="mb-3">Programming & Development</h4>
              <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Python Programming</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>JavaScript Fundamentals</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>React.js Workshop</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Node.js Backend</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mobile App Development</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>API Development</li>
                </ul>
                <a href="#upcoming" class="btn btn-outline-primary mt-3">View Workshops</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="bg-success bg-opacity-10 rounded p-3 mb-3 text-center">
            <i class="bi bi-bar-chart-fill text-success" style="font-size: 3rem;"></i>
          </div>
          <h4 class="mb-3">Data & Analytics</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Data Visualization</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>SQL for Data Analysis</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Excel Power Query</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Tableau Fundamentals</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Power BI Workshop</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Google Analytics</li>
          </ul>
          <a href="#upcoming" class="btn btn-outline-success mt-3">View Workshops</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="bg-info bg-opacity-10 rounded p-3 mb-3 text-center">
            <i class="bi bi-robot text-info" style="font-size: 3rem;"></i>
          </div>
          <h4 class="mb-3">AI & Machine Learning</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Intro to Machine Learning</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>ChatGPT for Developers</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Computer Vision Basics</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Natural Language Processing</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>AI Tools for Business</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Deep Learning Workshop</li>
          </ul>
          <a href="#upcoming" class="btn btn-outline-info mt-3">View Workshops</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="bg-warning bg-opacity-10 rounded p-3 mb-3 text-center">
            <i class="bi bi-shield-lock-fill text-warning" style="font-size: 3rem;"></i>
          </div>
          <h4 class="mb-3">Cybersecurity</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Ethical Hacking Intro</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Network Security</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Web Application Security</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Penetration Testing</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Secure Coding Practices</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Cloud Security</li>
          </ul>
          <a href="#upcoming" class="btn btn-outline-warning mt-3">View Workshops</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="bg-danger bg-opacity-10 rounded p-3 mb-3 text-center">
            <i class="bi bi-cloud-fill text-danger" style="font-size: 3rem;"></i>
          </div>
          <h4 class="mb-3">Cloud & DevOps</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>AWS Fundamentals</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Azure Essentials</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Docker & Containers</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Kubernetes Basics</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>CI/CD Pipeline</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Infrastructure as Code</li>
          </ul>
          <a href="#upcoming" class="btn btn-outline-danger mt-3">View Workshops</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="bg-secondary bg-opacity-10 rounded p-3 mb-3 text-center">
            <i class="bi bi-palette-fill text-secondary" style="font-size: 3rem;"></i>
          </div>
          <h4 class="mb-3">Design & UX</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>UI/UX Design Principles</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Figma Masterclass</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Adobe XD Workshop</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>User Research Methods</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Prototyping & Wireframing</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Design Systems</li>
          </ul>
          <a href="#upcoming" class="btn btn-outline-secondary mt-3">View Workshops</a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Why Choose Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Why Choose Our Workshops?</h2>
        <p class="lead text-muted">What makes our workshops unique</p>
      </div>
      <div class="row g-4">
    <div class="col-lg-3 col-md-6">
      <div class="text-center">
        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
          <i class="bi bi-person-workspace" style="font-size: 2rem;"></i>
        </div>
        <h5 class="mb-3">Expert Instructors</h5>
        <p class="text-muted">Learn from industry professionals with years of real-world experience</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="text-center">
        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
          <i class="bi bi-laptop" style="font-size: 2rem;"></i>
        </div>
        <h5 class="mb-3">Hands-On Learning</h5>
        <p class="text-muted">Work on real projects and build practical skills you can use immediately</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="text-center">
        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
          <i class="bi bi-people" style="font-size: 2rem;"></i>
        </div>
        <h5 class="mb-3">Small Class Sizes</h5>
        <p class="text-muted">Maximum 25 participants ensures personalized attention and interaction</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="text-center">
        <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
          <i class="bi bi-award" style="font-size: 2rem;"></i>
        </div>
        <h5 class="mb-3">Certificate</h5>
        <p class="text-muted">Receive a verifiable certificate of completion to showcase your skills</p>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Testimonials -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">What Participants Say</h2>
        <p class="lead text-muted">Feedback from our workshop attendees</p>
      </div>
      <div class="row g-4">
    <div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="mb-4">"The React workshop was amazing! I went from knowing nothing about React to building my first app in just 2 days. The instructor was patient and knowledgeable."</p>
          <div class="d-flex align-items-center">
            <img src="assets/images/participant-1.jpg" alt="Participant" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Sandra Mensah</h6>
              <small class="text-muted">Web Developer</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="mb-4">"Best investment I've made! The Data Analytics workshop gave me the skills I needed to transition into a data analyst role. Got a job offer 2 weeks after!"</p>
          <div class="d-flex align-items-center">
            <img src="assets/images/participant-2.jpg" alt="Participant" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Michael Owusu</h6>
              <small class="text-muted">Data Analyst</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="mb-4">"The hands-on approach made all the difference. I learned more in one weekend than I did in months of self-study. Highly recommend to anyone looking to upskill!"</p>
          <div class="d-flex align-items-center">
            <img src="assets/images/participant-3.jpg" alt="Participant" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Abena Asante</h6>
              <small class="text-muted">Software Engineer</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Registration Form -->
  <section id="register" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-body p-5">
              <h2 class="text-center mb-4">Register for a Workshop</h2>
              <p class="text-center text-muted mb-5">Secure your spot in our upcoming workshops</p>

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
                  <div class="col-12">
                    <label class="form-label">Select Workshop *</label>
                    <select class="form-select" required>
                      <option value="">Choose a workshop...</option>
                      <option>Full-Stack React Workshop - Oct 15-16</option>
                      <option>ChatGPT for Developers - Oct 20</option>
                      <option>Data Visualization with Tableau - Oct 22</option>
                      <option>Ethical Hacking Bootcamp - Oct 28-29</option>
                      <option>AWS Cloud Practitioner - Nov 2-3</option>
                      <option>Figma UI/UX Masterclass - Nov 5</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Experience Level *</label>
                    <select class="form-select" required>
                      <option value="">Select...</option>
                      <option>Beginner</option>
                      <option>Intermediate</option>
                      <option>Advanced</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Organization/Company</label>
                    <input type="text" class="form-control" placeholder="Optional">
                  </div>
                  <div class="col-12">
                    <label class="form-label">What do you hope to learn from this workshop? *</label>
                    <textarea class="form-control" rows="3" required></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label">How did you hear about us?</label>
                    <select class="form-select">
                      <option value="">Select...</option>
                      <option>Social Media</option>
                      <option>Google Search</option>
                      <option>Friend Referral</option>
                      <option>Email Newsletter</option>
                      <option>TecWorld Academy Website</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Special Requirements or Dietary Restrictions</label>
                    <textarea class="form-control" rows="2" placeholder="Let us know if you have any special needs..."></textarea>
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
                      <input class="form-check-input" type="checkbox" id="updates">
                      <label class="form-check-label" for="updates">
                        Send me updates about upcoming workshops and events
                      </label>
                    </div>
                  </div>
                  <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-danger btn-lg px-5">
                      <i class="bi bi-check-circle me-2"></i>Complete Registration
                    </button>
                  </div>
                  <div class="col-12 text-center mt-3">
                    <small class="text-muted">Payment will be processed after registration confirmation</small>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Corporate Workshops -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="assets/images/corporate-workshop.jpg" alt="Corporate Workshops" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6">
          <h2 class="display-5 fw-bold mb-4">Corporate Workshops</h2>
          <p class="lead text-muted mb-4">Customized workshops for your organization's specific needs.</p>
          
          <div class="mb-4">
            <h5 class="mb-3">What We Offer:</h5>
            <ul class="list-unstyled">
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Tailored curriculum for your team</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>On-site or virtual delivery</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Flexible scheduling</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Group discounts available</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Post-workshop support</li>
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Progress tracking and reporting</li>
            </ul>
          </div>

          <div class="alert alert-info">
            <h6><i class="bi bi-info-circle me-2"></i>Special Pricing</h6>
            <p class="mb-0">Contact us for custom quotes and special rates for groups of 10 or more participants.</p>
          </div>

          <div class="d-flex gap-3 flex-wrap mt-4">
            <a href="corporate-training.php" class="btn btn-danger btn-lg">
              <i class="bi bi-briefcase me-2"></i>Learn More
            </a>
            <a href="/contact/contact.php" class="btn btn-outline-danger btn-lg">
              <i class="bi bi-telephone me-2"></i>Request Quote
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
        <p class="lead text-muted">Everything you need to know about our workshops</p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="workshopFaqAccordion">
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  What should I bring to the workshop?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  Bring your laptop with the required software installed (we'll send you a preparation email). For in-person workshops, we provide refreshments, notebooks, and pens. Don't forget your charger and an open mind ready to learn!
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  Are the workshops suitable for beginners?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  We offer workshops for all skill levels. Each workshop listing specifies the required experience level. Beginner workshops assume no prior knowledge, while intermediate and advanced workshops list specific prerequisites. Check the workshop description or contact us if you're unsure.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  What's your cancellation policy?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  You can cancel up to 7 days before the workshop for a full refund. Cancellations 3-6 days before receive a 50% refund. No refunds for cancellations less than 3 days before the workshop, but you can transfer your registration to another workshop or send someone in your place.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  Will I receive a certificate?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  Yes! All participants who attend the full workshop receive a digital certificate of completion. The certificate includes the workshop title, date, duration, and topics covered. You can add it to your LinkedIn profile or resume.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                  Are meals and refreshments provided?
                </button>
              </h3>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  For full-day in-person workshops, we provide lunch, snacks, and beverages. Half-day workshops include light refreshments and drinks. Virtual workshops don't include meals, but we schedule breaks so you can grab food and drinks.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                  Can I access workshop materials after completion?
                </button>
              </h3>
              <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  Absolutely! All participants get lifetime access to workshop materials including slides, code samples, exercises, and recordings (for recorded workshops). Materials are available through our online portal within 24 hours of workshop completion.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                  Do you offer group discounts?
                </button>
              </h3>
              <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#workshopFaqAccordion">
                <div class="accordion-body">
                  Yes! Groups of 3-5 people get 10% off, 6-10 people get 15% off, and 11+ people get 20% off. Corporate groups of 15+ can request custom pricing. Contact us at workshops@tecworldacademy.edu for group registrations.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-gradient" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
    <div class="container text-center text-white">
      <h2 class="display-5 fw-bold mb-4">Ready to Learn Something New?</h2>
      <p class="lead mb-4">Join thousands of professionals who have upskilled through our workshops.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="#upcoming" class="btn btn-light btn-lg px-5">
          <i class="bi bi-calendar-check me-2"></i>Browse Workshops
        </a>
        <a href="#register" class="btn btn-outline-light btn-lg px-5">
          <i class="bi bi-pencil-square me-2"></i>Register Now
        </a>
      </div>
    </div>
  </section>
</div>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
