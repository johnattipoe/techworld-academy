<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- CONSULTING.PHP -->

<!-- Service Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-primary mb-3">IT Solutions</div>
          <h1 class="display-4 fw-bold mb-3">IT Consulting Services</h1>
          <p class="lead mb-4">Strategic technology consulting to help your business leverage IT for competitive advantage and operational excellence.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Strategic Planning</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Digital Transformation</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Technology Roadmap</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=consulting" class="btn btn-light btn-lg px-4">Request Consultation</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4">Learn More</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/campus/computer lab.jpeg" alt="IT Consulting" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Expert IT Consulting for Business Growth</h2>
          <p class="mb-3">Our IT consulting services help organizations make informed technology decisions, optimize IT investments, and align technology strategy with business objectives. We bring decades of combined experience to help you navigate the complex technology landscape.</p>
          <p class="mb-3">Whether you're a startup looking to build your IT infrastructure from scratch, or an established enterprise seeking digital transformation, our consultants provide tailored solutions that drive real business value.</p>
          <p class="mb-4">We work closely with your leadership team to understand your business goals, assess your current technology landscape, and develop comprehensive strategies that position your organization for sustainable growth and competitive advantage.</p>

          <h3 class="fw-bold mb-3">Why Choose Our IT Consulting?</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Business-First Approach</strong>
                  <p class="mb-0 text-muted small">Technology solutions aligned with business goals</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Industry Expertise</strong>
                  <p class="mb-0 text-muted small">Deep knowledge across multiple sectors</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Vendor Neutral</strong>
                  <p class="mb-0 text-muted small">Unbiased recommendations for best solutions</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <div>
                  <strong>Proven Methodology</strong>
                  <p class="mb-0 text-muted small">Structured approach with measurable results</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Quick Facts</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-primary me-2"></i>
                    <div>
                      <strong>Engagement Duration</strong>
                      <p class="mb-0 small text-muted">Flexible from 1 week to ongoing</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-people text-primary me-2"></i>
                    <div>
                      <strong>Team Size</strong>
                      <p class="mb-0 small text-muted">Customized to project needs</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-building text-primary me-2"></i>
                    <div>
                      <strong>Industries Served</strong>
                      <p class="mb-0 small text-muted">Finance, Healthcare, Retail, Education</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Get Started</h5>
              <a href="/contact/contact.php?service=consulting" class="btn btn-primary w-100 mb-2">Request Consultation</a>
              <a href="tel:+233XXXXXXXXX" class="btn btn-outline-primary w-100">
                <i class="bi bi-telephone me-2"></i>Call Us
              </a>
              <hr>
              <h5 class="fw-bold mb-3">Download Resources</h5>
              <a href="#" class="btn btn-sm btn-outline-primary w-100 mb-2">
                <i class="bi bi-file-pdf me-2"></i>Service Brochure
              </a>
              <a href="#" class="btn btn-sm btn-outline-primary w-100">
                <i class="bi bi-file-earmark-text me-2"></i>Case Studies
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Services Offered Section -->
<section class="py-5 bg-light" id="services" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our IT Consulting Services</h2>
        <p class="lead">Comprehensive consulting solutions for every aspect of your IT needs</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-lightbulb text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">IT Strategy & Planning</h5>
              <p class="mb-3">Develop comprehensive IT strategies aligned with your business objectives. We help you create technology roadmaps, prioritize initiatives, and optimize IT investments.</p>
              <ul class="small">
                <li>Technology Roadmap Development</li>
                <li>IT Budget Planning & Optimization</li>
                <li>Strategic Technology Assessment</li>
                <li>Business-IT Alignment</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-arrow-repeat text-success fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Digital Transformation</h5>
              <p class="mb-3">Guide your organization through digital transformation initiatives. Modernize operations, enhance customer experiences, and drive innovation.</p>
              <ul class="small">
                <li>Digital Maturity Assessment</li>
                <li>Process Digitization</li>
                <li>Cloud Migration Strategy</li>
                <li>Change Management</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-gear text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">IT Architecture Design</h5>
              <p class="mb-3">Design scalable, secure, and efficient IT architectures. From enterprise architecture to application design, we ensure your systems are future-ready.</p>
              <ul class="small">
                <li>Enterprise Architecture</li>
                <li>Application Architecture</li>
                <li>Infrastructure Design</li>
                <li>Integration Architecture</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-shield-check text-info fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Cybersecurity Consulting</h5>
              <p class="mb-3">Protect your business with comprehensive security strategies. Risk assessment, compliance guidance, and security architecture design.</p>
              <ul class="small">
                <li>Security Risk Assessment</li>
                <li>Compliance Strategy (GDPR, ISO)</li>
                <li>Security Architecture Design</li>
                <li>Incident Response Planning</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-danger bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-graph-up text-danger fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">IT Performance Optimization</h5>
              <p class="mb-3">Improve IT efficiency and reduce costs. System performance analysis, process optimization, and operational excellence.</p>
              <ul class="small">
                <li>IT Operations Assessment</li>
                <li>Performance Benchmarking</li>
                <li>Cost Optimization</li>
                <li>Service Quality Improvement</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-secondary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-laptop text-secondary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Technology Selection</h5>
              <p class="mb-3">Make informed technology decisions with expert guidance. Vendor evaluation, solution comparison, and implementation planning.</p>
              <ul class="small">
                <li>Requirements Analysis</li>
                <li>Vendor Evaluation & Selection</li>
                <li>Proof of Concept Management</li>
                <li>Contract Negotiation Support</li>
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
        <h2 class="fw-bold">Our Consulting Process</h2>
        <p class="lead">A structured approach to delivering measurable results</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">1</h2>
            </div>
            <h5 class="fw-bold">Discovery</h5>
            <p class="text-muted">Understand your business, challenges, and objectives through interviews and analysis.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">2</h2>
            </div>
            <h5 class="fw-bold">Assessment</h5>
            <p class="text-muted">Evaluate current IT landscape, identify gaps, and benchmark against best practices.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">3</h2>
            </div>
            <h5 class="fw-bold">Strategy</h5>
            <p class="text-muted">Develop comprehensive recommendations and actionable roadmap with clear priorities.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="text-center">
            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">4</h2>
            </div>
            <h5 class="fw-bold">Implementation</h5>
            <p class="text-muted">Support execution with ongoing guidance, monitoring, and course correction as needed.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Benefits of Our IT Consulting</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-check-circle-fill text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Reduced IT Costs</h5>
              <p class="mb-0">Optimize IT spending and eliminate waste while maintaining or improving service quality.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-check-circle-fill text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Improved Efficiency</h5>
              <p class="mb-0">Streamline IT operations and processes for faster delivery and better results.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-check-circle-fill text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Strategic Alignment</h5>
              <p class="mb-0">Ensure technology investments directly support business objectives and growth.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-check-circle-fill text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Risk Mitigation</h5>
              <p class="mb-0">Identify and address potential risks before they impact your business operations.</p>
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
          <h2 class="fw-bold mb-3">Ready to Transform Your IT Strategy?</h2>
          <p class="lead mb-0">Let's discuss how our IT consulting services can help your business achieve its technology goals.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=consulting" class="btn btn-light btn-lg px-5">Schedule Consultation</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
 ?>