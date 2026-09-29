<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- CUSTOM-SOFTWARE.PHP -->

<!-- Service Hero Section -->
<section class="bg-success text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-success mb-3">IT Solutions</div>
          <h1 class="display-4 fw-bold mb-3">Custom Software Development</h1>
          <p class="lead mb-4">Tailored software solutions designed specifically for your business needs, processes, and goals.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Web Applications</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Mobile Apps</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Enterprise Systems</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=custom-software" class="btn btn-light btn-lg px-4">Start Your Project</a>
            <a href="#portfolio" class="btn btn-outline-light btn-lg px-4">View Portfolio</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="../../../assets/images/custom-software-hero.jpg" alt="Custom Software" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Build Software That Fits Your Business Perfectly</h2>
          <p class="mb-3">Off-the-shelf software can't always meet your unique business requirements. Our custom software development services deliver solutions built specifically for your workflows, processes, and objectives.</p>
          <p class="mb-3">We work with businesses of all sizes to design, develop, and deploy custom applications that automate processes, improve efficiency, and drive growth. From simple tools to complex enterprise systems, we build software that solves real problems.</p>
          <p class="mb-4">Our agile development approach ensures you're involved throughout the process, with regular updates and opportunities for feedback. We deliver high-quality, scalable software on time and within budget.</p>

          <h3 class="fw-bold mb-3">Our Development Expertise</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Web Applications</strong>
                  <p class="mb-0 text-muted small">Responsive, scalable web apps using modern frameworks</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Mobile Applications</strong>
                  <p class="mb-0 text-muted small">Native and cross-platform iOS & Android apps</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Enterprise Software</strong>
                  <p class="mb-0 text-muted small">Complex systems for large organizations</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>API Development</strong>
                  <p class="mb-0 text-muted small">RESTful & GraphQL APIs for integrations</p>
                </div>
              </div>
            </div>
          </div>

          <h3 class="fw-bold mb-3">Technologies We Use</h3>
          <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="badge bg-primary p-2">React</span>
            <span class="badge bg-success p-2">Node.js</span>
            <span class="badge bg-info p-2">Python</span>
            <span class="badge bg-warning text-dark p-2">Java</span>
            <span class="badge bg-danger p-2">.NET</span>
            <span class="badge bg-secondary p-2">Angular</span>
            <span class="badge bg-dark p-2">Vue.js</span>
            <span class="badge bg-primary p-2">React Native</span>
            <span class="badge bg-success p-2">Flutter</span>
            <span class="badge bg-info p-2">PostgreSQL</span>
            <span class="badge bg-warning text-dark p-2">MongoDB</span>
            <span class="badge bg-danger p-2">AWS</span>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Project Details</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-success me-2"></i>
                    <div>
                      <strong>Timeline</strong>
                      <p class="mb-0 small text-muted">2-12 months depending on scope</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-cash-stack text-success me-2"></i>
                    <div>
                      <strong>Pricing</strong>
                      <p class="mb-0 small text-muted">Custom quotes based on requirements</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-people text-success me-2"></i>
                    <div>
                      <strong>Team</strong>
                      <p class="mb-0 small text-muted">Dedicated developers, designers, QA</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Get Started</h5>
              <a href="/contact/contact.php?service=custom-software" class="btn btn-success w-100 mb-2">Request Quote</a>
              <a href="#" class="btn btn-outline-success w-100">Download Portfolio</a>
              <hr>
              <h5 class="fw-bold mb-3">Why Choose Us?</h5>
              <ul class="small">
                <li class="mb-2">100% Custom Solutions</li>
                <li class="mb-2">Agile Development Process</li>
                <li class="mb-2">Post-Launch Support</li>
                <li class="mb-2">On-Time Delivery</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Development Process Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Development Process</h2>
        <p class="lead">Agile methodology for faster delivery and better results</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="text-success mb-0">1</h3>
              </div>
              <h5 class="fw-bold mb-3">Discovery & Planning</h5>
              <p class="mb-0">Understanding your requirements, defining scope, and creating detailed project plan with milestones.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="text-success mb-0">2</h3>
              </div>
              <h5 class="fw-bold mb-3">Design & Prototyping</h5>
              <p class="mb-0">Creating wireframes, mockups, and interactive prototypes for your approval before development.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="text-success mb-0">3</h3>
              </div>
              <h5 class="fw-bold mb-3">Development</h5>
              <p class="mb-0">Agile sprints with regular demos, allowing feedback and adjustments throughout the process.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="text-success mb-0">4</h3>
              </div>
              <h5 class="fw-bold mb-3">Testing & QA</h5>
              <p class="mb-0">Comprehensive testing including functional, performance, security, and user acceptance testing.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="text-success mb-0">5</h3>
                </div>
                <h5 class="fw-bold mb-3">Deployment</h5>
                    <p class="mb-0">Smooth launch with migration support, training, and documentation for your team.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <h3 class="text-success mb-0">6</h3>
                        </div>
                            <h5 class="fw-bold mb-3">Support & Maintenance</h5>
                        <p class="mb-0">Ongoing support, bug fixes, updates, and enhancements to keep your software running smoothly.</p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-5" id="portfolio" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Recent Projects</h2>
        <p class="lead">Custom software solutions we've delivered</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/e-commerce.jpeg" class="card-img-top" alt="ERP System">
            <div class="card-body">
              <span class="badge bg-success mb-2">Enterprise Software</span>
              <h5 class="card-title">Custom ERP System</h5>
              <p class="card-text small">Complete enterprise resource planning system for manufacturing company with inventory, sales, and finance modules.</p>
              <div class="d-flex flex-wrap gap-1 mb-3">
                <span class="badge bg-light text-dark">React</span>
                <span class="badge bg-light text-dark">Node.js</span>
                <span class="badge bg-light text-dark">PostgreSQL</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/sale prediction.jpeg" class="card-img-top" alt="Mobile Banking">
            <div class="card-body">
              <span class="badge bg-success mb-2">Mobile App</span>
              <h5 class="card-title">Mobile Banking App</h5>
              <p class="card-text small">Secure mobile banking application with biometric authentication, transfers, and bill payments for financial institution.</p>
              <div class="d-flex flex-wrap gap-1 mb-3">
                <span class="badge bg-light text-dark">React Native</span>
                <span class="badge bg-light text-dark">Node.js</span>
                <span class="badge bg-light text-dark">AWS</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/fitness tracker.jpeg" class="card-img-top" alt="Healthcare System">
            <div class="card-body">
              <span class="badge bg-success mb-2">Web Application</span>
              <h5 class="card-title">Healthcare Management System</h5>
              <p class="card-text small">Patient management, appointments, medical records, and billing system for hospital chain with multiple locations.</p>
              <div class="d-flex flex-wrap gap-1 mb-3">
                <span class="badge bg-light text-dark">Angular</span>
                <span class="badge bg-light text-dark">.NET</span>
                <span class="badge bg-light text-dark">SQL Server</span>
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
          <h2 class="fw-bold mb-3">Ready to Build Your Custom Software?</h2>
          <p class="lead mb-0">Let's discuss your project and create software that perfectly fits your business needs.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=custom-software" class="btn btn-light btn-lg px-5">Get Started</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
