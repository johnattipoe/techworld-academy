<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>


<!-- CERTIFICATIONS.PHP -->

<!-- Service Hero Section -->
<section class="bg-warning text-dark py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-dark text-warning mb-3">Training Services</div>
          <h1 class="display-4 fw-bold mb-3">Professional Certifications</h1>
          <p class="lead mb-4">Earn globally recognized certifications that validate your expertise and advance your career in technology.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Industry Recognized</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Exam Prep</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Career Boost</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=certifications" class="btn btn-dark btn-lg px-4">Get Started</a>
            <a href="#programs" class="btn btn-outline-dark btn-lg px-4">View Programs</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/cert/cert-iso.jpeg" alt="Certifications" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Advance Your Career with Industry Certifications</h2>
          <p class="mb-3">Professional certifications are essential for demonstrating expertise and advancing in today's competitive technology job market. Our certification preparation programs are designed to help you pass industry-leading certification exams on your first attempt.</p>
          <p class="mb-3">We offer comprehensive training for certifications from major technology vendors including AWS, Microsoft, Google, CompTIA, Cisco, and more. Our programs combine expert instruction, practice exams, hands-on labs, and study materials to ensure your success.</p>
          <p class="mb-4">As an authorized training partner for multiple certification providers, we stay current with the latest exam objectives and best practices. Our instructors are certified professionals who bring real-world experience to the classroom.</p>

          <h3 class="fw-bold mb-3">Why Get Certified?</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                <div>
                  <strong>Career Advancement</strong>
                  <p class="mb-0 text-muted small">Certifications open doors to better positions</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                <div>
                  <strong>Higher Salary</strong>
                  <p class="mb-0 text-muted small">Certified professionals earn 15-30% more</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                <div>
                  <strong>Validated Skills</strong>
                  <p class="mb-0 text-muted small">Prove your expertise to employers</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                <div>
                  <strong>Professional Recognition</strong>
                  <p class="mb-0 text-muted small">Join elite community of certified professionals</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Program Features</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-book text-warning me-2"></i>
                    <div>
                      <strong>Comprehensive Materials</strong>
                      <p class="mb-0 small text-muted">Study guides, practice tests, labs</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-person-check text-warning me-2"></i>
                    <div>
                      <strong>Expert Instructors</strong>
                      <p class="mb-0 small text-muted">Certified professionals</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-laptop text-warning me-2"></i>
                    <div>
                      <strong>Hands-On Labs</strong>
                      <p class="mb-0 small text-muted">Practical experience</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-patch-check text-warning me-2"></i>
                    <div>
                      <strong>Exam Vouchers</strong>
                      <p class="mb-0 small text-muted">Included in some programs</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <a href="/contact/contact.php?service=certifications" class="btn btn-warning w-100">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Certification Programs Section -->
<section class="py-5 bg-light" id="programs" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Certification Programs We Offer</h2>
        <p class="lead">Preparation courses for industry-leading certifications</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-warning">
              <h5 class="mb-0">AWS Certifications</h5>
            </div>
            <div class="card-body p-4">
              <img src="/assets/cert/cert-aws.jpeg" alt="AWS" class="mb-3" style="max-height: 60px;">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-warning me-2"></i>AWS Certified Cloud Practitioner</li>
                <li class="mb-2"><i class="bi bi-check2 text-warning me-2"></i>AWS Solutions Architect Associate</li>
                <li class="mb-2"><i class="bi bi-check2 text-warning me-2"></i>AWS Developer Associate</li>
                <li class="mb-2"><i class="bi bi-check2 text-warning me-2"></i>AWS SysOps Administrator</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> 4-8 weeks per certification</p>
              <a href="/contact/contact.php?cert=aws" class="btn btn-outline-warning w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Microsoft Certifications</h5>
            </div>
            <div class="card-body p-4">
              <img src="/assets/cert/cert-microsoft.png" alt="Microsoft" class="mb-3" style="max-height: 60px;">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>Azure Fundamentals (AZ-900)</li>
                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>Azure Administrator (AZ-104)</li>
                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>Azure Developer (AZ-204)</li>
                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>Microsoft 365 Fundamentals</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> 4-8 weeks per certification</p>
              <a href="/contact/contact.php?cert=microsoft" class="btn btn-outline-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-danger text-white">
              <h5 class="mb-0">Google Cloud Certifications</h5>
            </div>
            <div class="card-body p-4">
              <img src="/assets/cert/cert-google.png" alt="Google" class="mb-3" style="max-height: 60px;">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i>Cloud Digital Leader</li>
                <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i>Associate Cloud Engineer</li>
                <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i>Professional Cloud Architect</li>
                <li class="mb-2"><i class="bi bi-check2 text-danger me-2"></i>Professional Data Engineer</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> 4-10 weeks per certification</p>
              <a href="/contact/contact.php?cert=google" class="btn btn-outline-danger w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0">CompTIA Certifications</h5>
            </div>
            <div class="card-body p-4">
              <img src="/assets/cert/cert-comptia.png" alt="CompTIA" class="mb-3" style="max-height: 60px;">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>CompTIA A+</li>
                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>CompTIA Network+</li>
                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>CompTIA Security+</li>
                <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>CompTIA Linux+</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> 6-10 weeks per certification</p>
              <a href="/contact/contact.php?cert=comptia" class="btn btn-outline-success w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-info text-white">
              <h5 class="mb-0">Cisco Certifications</h5>
            </div>
            <div class="card-body p-4">
              <img src="/assets/cert/cert-cisco.jpeg" alt="Cisco" class="mb-3" style="max-height: 60px;">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-info me-2"></i>CCNA (Cisco Certified Network Associate)</li>
                <li class="mb-2"><i class="bi bi-check2 text-info me-2"></i>CCNP Enterprise</li>
                <li class="mb-2"><i class="bi bi-check2 text-info me-2"></i>CCNP Security</li>
                <li class="mb-2"><i class="bi bi-check2 text-info me-2"></i>CyberOps Associate</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> 8-12 weeks per certification</p>
              <a href="/contact/contact.php?cert=cisco" class="btn btn-outline-info w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-secondary text-white">
              <h5 class="mb-0">Other Certifications</h5>
            </div>
            <div class="card-body p-4">
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>PMI Project Management Professional (PMP)</li>
                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>Certified Scrum Master (CSM)</li>
                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>CISSP (Certified Information Systems Security Professional)</li>
                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>CEH (Certified Ethical Hacker)</li>
              </ul>
              <p class="small text-muted mb-3"><strong>Duration:</strong> Varies by certification</p>
              <a href="/contact/contact.php?cert=other" class="btn btn-outline-secondary w-100">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Success Rate Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Success Record</h2>
        <p class="lead">Proven track record of certification success</p>
      </div>
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h1 class="display-3 fw-bold text-warning mb-0">92%</h1>
            <p class="lead mb-0">First-Time Pass Rate</p>
            <small class="text-muted">Above industry average</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h1 class="display-3 fw-bold text-warning mb-0">2000+</h1>
            <p class="lead mb-0">Certifications Earned</p>
            <small class="text-muted">By our students</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h1 class="display-3 fw-bold text-warning mb-0">15+</h1>
            <p class="lead mb-0">Certification Partners</p>
            <small class="text-muted">Authorized training provider</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h1 class="display-3 fw-bold text-warning mb-0">100%</h1>
            <p class="lead mb-0">Support Guarantee</p>
            <small class="text-muted">Until you pass</small>
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
          <h2 class="fw-bold mb-3">Ready to Get Certified?</h2>
          <p class="lead mb-0">Start your certification journey with expert guidance and comprehensive preparation.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=certifications" class="btn btn-dark btn-lg px-5">Enroll Now</a>
      </div>
    </div>
  </div>
</section>

<?php
 include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
 include(__DIR__ . '/..\..\..\includes\footer\footer.php');
  ?>