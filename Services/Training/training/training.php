<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- TRAINING.PHP (Corporate Training) -->

<!-- Service Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-primary mb-3">Training Services</div>
          <h1 class="display-4 fw-bold mb-3">Corporate Training Programs</h1>
          <p class="lead mb-4">Upskill your workforce with customized technology training designed specifically for your organization's needs.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Custom Curriculum</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Expert Trainers</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Flexible Delivery</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=corporate-training" class="btn btn-light btn-lg px-4">Request Proposal</a>
            <a href="#programs" class="btn btn-outline-light btn-lg px-4">View Programs</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/about/about us.jpeg" alt="Corporate Training" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Transform Your Team's Technical Skills</h2>
          <p class="mb-3">In today's rapidly evolving technology landscape, keeping your team's skills current is essential for maintaining competitive advantage. Our corporate training programs are designed to address your organization's specific technology needs and business objectives.</p>
          <p class="mb-3">We work with companies across all industries to develop and deliver customized training that drives real business results. Whether you need to upskill your entire IT department, train staff on new systems, or develop specialized technical capabilities, we create programs tailored to your requirements.</p>
          <p class="mb-4">Our experienced trainers combine deep technical expertise with practical industry experience, ensuring your team learns skills they can immediately apply to their work. We offer flexible delivery options including on-site, online, and hybrid formats.</p>

          <h3 class="fw-bold mb-3">Training Benefits</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Improved Productivity</strong>
                  <p class="mb-0 text-muted small">Better skilled teams work more efficiently</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Reduced Errors</strong>
                  <p class="mb-0 text-muted small">Proper training minimizes costly mistakes</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Employee Retention</strong>
                  <p class="mb-0 text-muted small">Investing in staff increases loyalty</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Innovation Capacity</strong>
                  <p class="mb-0 text-muted small">Skilled teams drive digital transformation</p>
                </div>
              </div>
            </div>
          </div>

          <h3 class="fw-bold mb-3">Who We Train</h3>
          <ul class="list-unstyled mb-4">
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>IT Departments</li>
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>Development Teams</li>
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>Business Analysts</li>
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>Project Managers</li>
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>End Users</li>
            <li class="mb-2"><i class="bi bi-building text-primary me-2"></i>Leadership Teams</li>
          </ul>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Training Details</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-people text-primary me-2"></i>
                    <div>
                      <strong>Group Size</strong>
                      <p class="mb-0 small text-muted">5-30 participants per session</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-primary me-2"></i>
                    <div>
                      <strong>Duration</strong>
                      <p class="mb-0 small text-muted">1 day to 12 weeks programs</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-geo-alt text-primary me-2"></i>
                    <div>
                      <strong>Location</strong>
                      <p class="mb-0 small text-muted">On-site, Online, or Our Facilities</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-award text-primary me-2"></i>
                    <div>
                      <strong>Certification</strong>
                      <p class="mb-0 small text-muted">Certificates upon completion</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Get Started</h5>
              <a href="/contact/contact.php?service=corporate-training" class="btn btn-primary w-100 mb-2">Request Proposal</a>
              <a href="tel:+233XXXXXXXXX" class="btn btn-outline-primary w-100">Call Us</a>
              <hr>
              <h5 class="fw-bold mb-3">Resources</h5>
              <a href="#" class="btn btn-sm btn-outline-primary w-100 mb-2">
                <i class="bi bi-file-pdf me-2"></i>Download Brochure
              </a>
              <a href="#" class="btn btn-sm btn-outline-primary w-100">
                <i class="bi bi-file-text me-2"></i>View Case Studies
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Training Programs Section -->
<section class="py-5 bg-light" id="programs" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Popular Corporate Training Programs</h2>
        <p class="lead">Comprehensive training across all major technology domains</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-code-slash text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Software Development</h5>
              <p class="mb-3">Train your team in modern programming languages, frameworks, and development methodologies.</p>
              <ul class="small mb-3">
                <li>Python, Java, JavaScript, C#</li>
                <li>React, Angular, Vue.js</li>
                <li>Agile Development</li>
                <li>DevOps Practices</li>
              </ul>
              <span class="badge bg-primary">1-12 weeks</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-cloud text-success fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Cloud Computing</h5>
              <p class="mb-3">Master cloud platforms and migrate your infrastructure to the cloud confidently.</p>
              <ul class="small mb-3">
                <li>AWS, Azure, Google Cloud</li>
                <li>Cloud Architecture</li>
                <li>Migration Strategies</li>
                <li>Cloud Security</li>
              </ul>
              <span class="badge bg-success">3-8 weeks</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-shield-lock text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Cybersecurity</h5>
              <p class="mb-3">Protect your organization with comprehensive security awareness and technical training.</p>
              <ul class="small mb-3">
                <li>Security Fundamentals</li>
                <li>Threat Detection</li>
                <li>Incident Response</li>
                <li>Compliance Training</li>
              </ul>
              <span class="badge bg-warning text-dark">2-10 weeks</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-bar-chart text-info fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Data Analytics</h5>
              <p class="mb-3">Enable data-driven decision making with analytics and visualization training.</p>
              <ul class="small mb-3">
                <li>SQL & Databases</li>
                <li>Python for Analytics</li>
                <li>Tableau, Power BI</li>
                <li>Statistical Analysis</li>
              </ul>
              <span class="badge bg-info">4-8 weeks</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-danger bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-robot text-danger fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">AI & Machine Learning</h5>
              <p class="mb-3">Build AI capabilities within your organization with practical ML training.</p>
              <ul class="small mb-3">
                <li>Machine Learning Basics</li>
                <li>Deep Learning</li>
                <li>Natural Language Processing</li>
                <li>Computer Vision</li>
              </ul>
              <span class="badge bg-danger">6-12 weeks</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-secondary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-kanban text-secondary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Project Management</h5>
              <p class="mb-3">Lead technology projects successfully with Agile and traditional PM training.</p>
              <ul class="small mb-3">
                <li>Agile & Scrum</li>
                <li>PMP Preparation</li>
                <li>Risk Management</li>
                <li>Stakeholder Management</li>
              </ul>
              <span class="badge bg-secondary">2-6 weeks</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Training Approach Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Training Approach</h2>
        <p class="lead">Proven methodology for effective corporate learning</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">1</h2>
            </div>
            <h5 class="fw-bold">Needs Assessment</h5>
            <p class="text-muted">Understand your team's current skills and identify gaps aligned with business goals.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">2</h2>
            </div>
            <h5 class="fw-bold">Custom Design</h5>
            <p class="text-muted">Develop tailored curriculum with relevant examples from your industry.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">3</h2>
            </div>
            <h5 class="fw-bold">Interactive Delivery</h5>
            <p class="text-muted">Hands-on training with real projects, not just theory and slides.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">4</h2>
            </div>
            <h5 class="fw-bold">Post-Training Support</h5>
            <p class="text-muted">Ongoing support and resources to reinforce learning and ensure application.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Delivery Options Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Flexible Delivery Options</h2>
        <p class="lead">Choose the format that works best for your team</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <i class="bi bi-building text-primary fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">On-Site Training</h5>
              <p class="mb-0">We come to your office for training. Convenient for teams and allows for minimal disruption to operations.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <i class="bi bi-laptop text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Virtual Training</h5>
              <p class="mb-0">Live online training sessions via Zoom or Teams. Perfect for distributed teams and remote workers.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <i class="bi bi-house-door text-warning fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">At Our Facilities</h5>
              <p class="mb-0">Train at our state-of-the-art training centers with all necessary equipment and resources provided.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Ready to Upskill Your Team?</h2>
          <p class="lead mb-0">Let's discuss your training needs and create a custom program for your organization.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=corporate-training" class="btn btn-light btn-lg px-5">Request Proposal</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php');
 ?>
