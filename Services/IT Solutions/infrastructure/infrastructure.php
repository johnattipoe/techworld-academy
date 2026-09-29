<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- INFRASTRUCTURE.PHP -->

<!-- Service Hero Section -->
<section class="bg-dark text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-dark mb-3">IT Solutions</div>
          <h1 class="display-4 fw-bold mb-3">IT Infrastructure Services</h1>
          <p class="lead mb-4">Build, manage, and maintain robust IT infrastructure that keeps your business running smoothly 24/7.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Network Setup</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Cloud Migration</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>24/7 Monitoring</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=infrastructure" class="btn btn-light btn-lg px-4">Get Assessment</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/campus/computer lab.jpeg" alt="IT Infrastructure" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Reliable IT Infrastructure for Modern Business</h2>
          <p class="mb-3">Your IT infrastructure is the foundation of your business operations. Our infrastructure services ensure your systems are reliable, secure, and optimized for performance.</p>
          <p class="mb-3">From network design and implementation to cloud migration and ongoing management, we provide end-to-end infrastructure solutions. Our certified engineers have expertise across all major platforms and technologies.</p>
          <p class="mb-4">We offer both on-premises and cloud infrastructure solutions, with 24/7 monitoring and support to ensure maximum uptime and quick resolution of any issues.</p>

          <h3 class="fw-bold mb-3">Our Infrastructure Capabilities</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-dark me-2 mt-1"></i>
                <div>
                  <strong>Network Infrastructure</strong>
                  <p class="mb-0 text-muted small">LAN, WAN, WiFi, VPN, Firewalls</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-dark me-2 mt-1"></i>
                <div>
                  <strong>Server Management</strong>
                  <p class="mb-0 text-muted small">Physical, Virtual, and Cloud Servers</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-dark me-2 mt-1"></i>
                <div>
                  <strong>Cloud Services</strong>
                  <p class="mb-0 text-muted small">AWS, Azure, Google Cloud</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-dark me-2 mt-1"></i>
                <div>
                  <strong>Storage Solutions</strong>
                  <p class="mb-0 text-muted small">SAN, NAS, Backup, Disaster Recovery</p>
                </div>
              </div>
            </div>
          </div>

          <h3 class="fw-bold mb-3">Technologies We Work With</h3>
          <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="badge bg-primary p-2">AWS</span>
            <span class="badge bg-info p-2">Azure</span>
            <span class="badge bg-danger p-2">Google Cloud</span>
            <span class="badge bg-secondary p-2">VMware</span>
            <span class="badge bg-success p-2">Cisco</span>
            <span class="badge bg-warning text-dark p-2">Microsoft 365</span>
            <span class="badge bg-dark p-2">Linux</span>
            <span class="badge bg-primary p-2">Windows Server</span>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Service Details</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-shield-check text-dark me-2"></i>
                    <div>
                      <strong>Uptime SLA</strong>
                      <p class="mb-0 small text-muted">99.9% guaranteed uptime</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-headset text-dark me-2"></i>
                    <div>
                      <strong>Support</strong>
                      <p class="mb-0 small text-muted">24/7/365 technical support</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-dark me-2"></i>
                    <div>
                      <strong>Response Time</strong>
                      <p class="mb-0 small text-muted">15 min for critical issues</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Get Started</h5>
              <a href="/contact/contact.php?service=infrastructure" class="btn btn-dark w-100 mb-2">Request Assessment</a>
              <a href="#" class="btn btn-outline-dark w-100">Download Brochure</a>
              <hr>
              <h5 class="fw-bold mb-3">Certifications</h5>
              <p class="small text-muted">Our team holds certifications from:</p>
              <ul class="small">
                <li>AWS Certified</li>
                <li>Microsoft Certified</li>
                <li>Cisco Certified</li>
                <li>VMware Certified</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light" id="services" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Infrastructure Services We Offer</h2>
        <p class="lead">Complete infrastructure solutions for businesses of all sizes</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-diagram-3 text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Network Design & Implementation</h5>
              <p class="mb-3">Design and deploy robust network infrastructure tailored to your business needs.</p>
              <ul class="small">
                <li>LAN/WAN Setup</li>
                <li>WiFi Network Design</li>
                <li>VPN Configuration</li>
                <li>Network Security</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-cloud-arrow-up text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Cloud Migration & Management</h5>
              <p class="mb-3">Migrate your infrastructure to the cloud seamlessly with ongoing management.</p>
              <ul class="small">
                <li>Cloud Strategy & Planning</li>
                <li>Migration Services</li>
                <li>Cloud Optimization</li>
                <li>Multi-Cloud Management</li>
              </ul>
            </div>
          </div>
          </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-hdd-rack text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Server Management</h5>
              <p class="mb-3">Complete server administration, monitoring, and maintenance services.</p>
              <ul class="small">
                <li>Physical Server Setup</li>
                <li>Virtual Server Management</li>
                <li>Server Monitoring</li>
                <li>Performance Optimization</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-shield-lock text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Backup & Disaster Recovery</h5>
              <p class="mb-3">Protect your data with comprehensive backup and disaster recovery solutions.</p>
              <ul class="small">
                <li>Automated Backups</li>
                <li>Disaster Recovery Planning</li>
                <li>Data Replication</li>
                <li>Business Continuity</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-database text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Storage Solutions</h5>
              <p class="mb-3">Scalable storage infrastructure for your growing data needs.</p>
              <ul class="small">
                <li>SAN/NAS Implementation</li>
                <li>Storage Optimization</li>
                <li>Data Migration</li>
                <li>Storage Management</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-dark bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-eye text-dark fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">24/7 Infrastructure Monitoring</h5>
              <p class="mb-3">Proactive monitoring and management to prevent issues before they occur.</p>
              <ul class="small">
                <li>Real-time Monitoring</li>
                <li>Performance Analytics</li>
                <li>Alert Management</li>
                <li>Incident Response</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Process Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Implementation Process</h2>
        <p class="lead">Structured approach for successful infrastructure projects</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h4 class="mb-0">1</h4>
              </div>
              <h5 class="fw-bold mb-2">Assessment</h5>
              <p class="mb-0 small">Evaluate current infrastructure and identify requirements</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h4 class="mb-0">2</h4>
              </div>
              <h5 class="fw-bold mb-2">Design</h5>
              <p class="mb-0 small">Create detailed architecture and implementation plan</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h4 class="mb-0">3</h4>
              </div>
              <h5 class="fw-bold mb-2">Implementation</h5>
              <p class="mb-0 small">Deploy infrastructure with minimal disruption</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h4 class="mb-0">4</h4>
              </div>
              <h5 class="fw-bold mb-2">Support</h5>
              <p class="mb-0 small">Ongoing management and optimization</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Support Plans Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Infrastructure Support Plans</h2>
        <p class="lead">Choose the level of support that fits your needs</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-light">
              <h5 class="mb-0 text-center">Basic Support</h5>
            </div>
            <div class="card-body p-4">
              <h3 class="text-center mb-4">Contact for Pricing</h3>
              <ul class="list-unstyled mb-4">
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Business Hours Support</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Email & Phone Support</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Monthly Health Checks</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Basic Monitoring</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>4-Hour Response Time</li>
              </ul>
              <a href="/contact/contact.php?plan=basic" class="btn btn-outline-dark w-100">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-dark shadow-lg" style="border-width: 2px !important;">
            <div class="card-header bg-dark text-white">
              <h5 class="mb-0 text-center">Professional Support</h5>
            </div>
            <div class="card-body p-4">
              <h3 class="text-center mb-4">Contact for Pricing</h3>
              <ul class="list-unstyled mb-4">
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>24/7 Support</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Priority Response</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Advanced Monitoring</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Weekly Health Checks</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>1-Hour Response Time</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Dedicated Account Manager</li>
              </ul>
              <a href="/contact/contact.php?plan=professional" class="btn btn-dark w-100">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-light">
              <h5 class="mb-0 text-center">Enterprise Support</h5>
            </div>
            <div class="card-body p-4">
              <h3 class="text-center mb-4">Contact for Pricing</h3>
              <ul class="list-unstyled mb-4">
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>24/7 Premium Support</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>15-Minute Response</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Proactive Monitoring</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Daily Health Checks</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Dedicated Technical Team</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Quarterly Business Reviews</li>
                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Custom SLAs Available</li>
              </ul>
              <a href="/contact/contact.php?plan=enterprise" class="btn btn-outline-dark w-100">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Benefits Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose Our Infrastructure Services?</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-dark bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-award text-dark fs-1"></i>
            </div>
            <h5 class="fw-bold">Certified Experts</h5>
            <p class="text-muted">Team of certified professionals with years of experience</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-dark bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-graph-up text-dark fs-1"></i>
            </div>
            <h5 class="fw-bold">99.9% Uptime</h5>
            <p class="text-muted">Guaranteed uptime with redundant systems</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-dark bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-shield-check text-dark fs-1"></i>
            </div>
            <h5 class="fw-bold">Enterprise Security</h5>
            <p class="text-muted">Bank-level security for all infrastructure</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-dark bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-cash-coin text-dark fs-1"></i>
            </div>
            <h5 class="fw-bold">Cost Effective</h5>
            <p class="text-muted">Reduce infrastructure costs by up to 40%</p>
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
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  Do you support hybrid infrastructure (on-premises and cloud)?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes, we specialize in hybrid infrastructure management. We can help you design and manage a seamless hybrid environment that combines the best of on-premises and cloud infrastructure.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  What is your response time for critical issues?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Response times vary by support plan: Basic (4 hours), Professional (1 hour), and Enterprise (15 minutes) for critical issues. All plans include 24/7 monitoring.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  Can you help migrate our existing infrastructure to the cloud?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely! Cloud migration is one of our core services. We handle everything from planning and assessment to execution and post-migration support, ensuring minimal downtime.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  Do you provide disaster recovery services?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes, we provide comprehensive disaster recovery planning and implementation. This includes automated backups, replication, and tested recovery procedures to ensure business continuity.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- CTA Section -->
<section class="py-5 bg-dark text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Build a Robust IT Infrastructure</h2>
          <p class="lead mb-0">Get a free infrastructure assessment and discover how we can optimize your IT environment.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=infrastructure" class="btn btn-light btn-lg px-5">Get Free Assessment</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
 ?>