<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- DIGITAL-WORKSHOPS.PHP -->

<!-- Service Hero Section -->
<section class="bg-success text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-success mb-3">Training Services</div>
          <h1 class="display-4 fw-bold mb-3">Workshops & Bootcamps</h1>
          <p class="lead mb-4">Intensive, hands-on training programs designed to build practical skills quickly through immersive learning experiences.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Weekend Workshops</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Intensive Bootcamps</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Project-Based</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=workshops" class="btn btn-light btn-lg px-4">Register Now</a>
            <a href="#upcoming" class="btn btn-outline-light btn-lg px-4">View Schedule</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/campus/library.jpeg" alt="Workshops" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Learn by Doing with Our Intensive Programs</h2>
          <p class="mb-3">Our workshops and bootcamps offer concentrated learning experiences where you build real projects and gain practical skills in days or weeks instead of months. Perfect for professionals who want to quickly add new capabilities or explore new technologies.</p>
          <p class="mb-3">Each program is carefully designed to maximize learning through hands-on exercises, group projects, and expert instruction. You'll leave with completed projects for your portfolio and the confidence to apply your new skills immediately.</p>
          <p class="mb-4">We offer both public workshops (open to individuals) and private bootcamps (customized for organizations). All programs include course materials, project resources, and post-training support.</p>

          <h3 class="fw-bold mb-3">Program Formats</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Weekend Workshops</strong>
                  <p class="mb-0 text-muted small">1-2 day intensive sessions on Saturdays/Sundays</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Evening Bootcamps</strong>
                  <p class="mb-0 text-muted small">2-4 weeks, 3 evenings per week</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Full-Time Bootcamps</strong>
                  <p class="mb-0 text-muted small">1-4 weeks, Monday-Friday intensive</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                <div>
                  <strong>Online Bootcamps</strong>
                  <p class="mb-0 text-muted small">Virtual intensive programs with live instruction</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Program Details</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-people text-success me-2"></i>
                    <div>
                      <strong>Class Size</strong>
                      <p class="mb-0 small text-muted">10-20 participants</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-success me-2"></i>
                    <div>
                      <strong>Duration</strong>
                      <p class="mb-0 small text-muted">1 day to 4 weeks</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-laptop text-success me-2"></i>
                    <div>
                      <strong>Format</strong>
                      <p class="mb-0 small text-muted">Hands-on & Project-Based</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">What's Included</h5>
              <ul class="small">
                <li class="mb-2">All training materials</li>
                <li class="mb-2">Project templates & resources</li>
                <li class="mb-2">Certificate of completion</li>
                <li class="mb-2">Lifetime access to recordings</li>
                <li class="mb-2">Post-training support</li>
              </ul>
              <hr>
              <a href="/contact/contact.php?service=workshops" class="btn btn-success w-100">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Upcoming Workshops Section -->
<section class="py-5 bg-light" id="upcoming" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Upcoming Workshops & Bootcamps</h2>
        <p class="lead">Register now for our next sessions</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Nov 9-10, 2025</span>
                <span class="badge bg-success">8 Spots Left</span>
              </div>
              <h4 class="fw-bold mb-3">Web Development Weekend Bootcamp</h4>
              <p class="mb-3">Build 3 complete websites in 2 days! Learn HTML, CSS, JavaScript, and responsive design through hands-on projects.</p>
              <div class="mb-3">
                <i class="bi bi-clock text-success me-2"></i><strong>Duration:</strong> 2 Days (Sat-Sun, 9AM-5PM)<br>
                <i class="bi bi-geo-alt text-success me-2"></i><strong>Location:</strong> Main Campus, Accra<br>
                <i class="bi bi-cash text-success me-2"></i><strong>Fee:</strong> GH₵ 800
              </div>
              <a href="/contact/contact.php?workshop=webdev-weekend" class="btn btn-success">Register Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Nov 13-17, 2025</span>
                <span class="badge bg-warning text-dark">5 Spots Left</span>
              </div>
              <h4 class="fw-bold mb-3">Python for Data Science Bootcamp</h4>
              <p class="mb-3">Master data analysis with Python, Pandas, and visualization libraries. Work on real datasets and build your portfolio.</p>
              <div class="mb-3">
                <i class="bi bi-clock text-success me-2"></i><strong>Duration:</strong> 5 Days (Mon-Fri, 6PM-9PM)<br>
                <i class="bi bi-laptop text-success me-2"></i><strong>Format:</strong> Online (Live)<br>
                <i class="bi bi-cash text-success me-2"></i><strong>Fee:</strong> GH₵ 1,200
              </div>
              <a href="/contact/contact.php?workshop=python-data" class="btn btn-success">Register Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Nov 20-Dec15, 2025</span>
<span class="badge bg-success">12 Spots Left</span>
</div>
<h4 class="fw-bold mb-3">Full Stack Development Bootcamp</h4>
<p class="mb-3">4-week intensive program covering front-end, back-end, and database development. Build 5 complete applications.</p>
<div class="mb-3">
<i class="bi bi-clock text-success me-2"></i><strong>Duration:</strong> 4 Weeks (Mon-Fri, 9AM-4PM)<br>
<i class="bi bi-geo-alt text-success me-2"></i><strong>Location:</strong> Main Campus, Accra<br>
<i class="bi bi-cash text-success me-2"></i><strong>Fee:</strong> GH₵ 3,500
</div>
<a href="/contact/contact.php?workshop=fullstack-bootcamp" class="btn btn-success">Register Now</a>
</div>
</div>
</div>
<div class="col-lg-6" data-aos="fade-up">
<div class="card border-0 shadow-sm h-100">
<div class="card-body p-4">
<div class="d-flex justify-content-between align-items-start mb-3">
<span class="badge bg-danger">Nov 23, 2025</span>
<span class="badge bg-success">15 Spots Left</span>
</div>
<h4 class="fw-bold mb-3">Mobile App Development with React Native</h4>
<p class="mb-3">One-day intensive workshop. Build and deploy your first mobile app for iOS and Android.</p>
<div class="mb-3">
<i class="bi bi-clock text-success me-2"></i><strong>Duration:</strong> 1 Day (Sat, 9AM-5PM)<br>
<i class="bi bi-geo-alt text-success me-2"></i><strong>Location:</strong> Kumasi Campus<br>
<i class="bi bi-cash text-success me-2"></i><strong>Fee:</strong> GH₵ 500
</div>
<a href="/contact/contact.php?workshop=react-native" class="btn btn-success">Register Now</a>
</div>
</div>
</div>
</div>
<div class="text-center mt-5">
<a href="/contact/contact.php?inquiry=workshop-schedule" class="btn btn-outline-success btn-lg">View Full Schedule</a>
</div>
</div>
</section>
<!-- Workshop Topics Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Workshop Topics We Cover</h2>
        <p class="lead">Specialized programs across all tech domains</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-code-slash text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Web Development</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• HTML/CSS/JavaScript</li>
                <li class="mb-1">• React & Vue.js</li>
                <li class="mb-1">• Node.js & APIs</li>
                <li class="mb-1">• Responsive Design</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-phone text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Mobile Development</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• React Native</li>
                <li class="mb-1">• Flutter</li>
                <li class="mb-1">• iOS Development</li>
                <li class="mb-1">• Android Development</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-bar-chart text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Data Science</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• Python for Data</li>
                <li class="mb-1">• Data Visualization</li>
                <li class="mb-1">• Machine Learning</li>
                <li class="mb-1">• SQL & Databases</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-palette text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Design</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• UI/UX Design</li>
                <li class="mb-1">• Figma & Adobe XD</li>
                <li class="mb-1">• Design Thinking</li>
                <li class="mb-1">• Prototyping</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-cloud text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Cloud & DevOps</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• AWS Essentials</li>
                <li class="mb-1">• Docker & Kubernetes</li>
                <li class="mb-1">• CI/CD Pipelines</li>
                <li class="mb-1">• Infrastructure as Code</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-shield-check text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Cybersecurity</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• Security Fundamentals</li>
                <li class="mb-1">• Ethical Hacking</li>
                <li class="mb-1">• Network Security</li>
                <li class="mb-1">• Penetration Testing</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-robot text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">AI & Machine Learning</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• Machine Learning Basics</li>
                <li class="mb-1">• Deep Learning</li>
                <li class="mb-1">• Natural Language Processing</li>
                <li class="mb-1">• Computer Vision</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body p-4">
              <i class="bi bi-megaphone text-success fs-1 mb-3"></i>
              <h5 class="fw-bold">Digital Marketing</h5>
              <ul class="small list-unstyled text-start">
                <li class="mb-1">• SEO & SEM</li>
                <li class="mb-1">• Social Media Marketing</li>
                <li class="mb-1">• Content Marketing</li>
                <li class="mb-1">• Analytics & Reporting</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Benefits Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose Our Workshops & Bootcamps?</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-lightning text-success fs-1"></i>
            </div>
            <h5 class="fw-bold">Fast-Track Learning</h5>
            <p class="text-muted">Acquire new skills in days or weeks, not months</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-hammer text-success fs-1"></i>
            </div>
            <h5 class="fw-bold">Hands-On Projects</h5>
            <p class="text-muted">Build real applications to add to your portfolio</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-people text-success fs-1"></i>
            </div>
            <h5 class="fw-bold">Expert Instructors</h5>
            <p class="text-muted">Learn from professionals with industry experience</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-award text-success fs-1"></i>
            </div>
            <h5 class="fw-bold">Certificates</h5>
            <p class="text-muted">Receive certificates to validate your new skills</p>
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
          <h2 class="fw-bold mb-3">Ready to Accelerate Your Learning?</h2>
          <p class="lead mb-0">Join our next workshop or bootcamp and gain practical skills in record time.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=workshops" class="btn btn-light btn-lg px-5">Register Now</a>
        </div>
      </div>
    </div>
</section>

        
<?php
 include(__DIR__ . '/../../../Modals/modals/modals.php');
 include(__DIR__ . '/../../../includes/footer/footer.php'); 
 ?>
