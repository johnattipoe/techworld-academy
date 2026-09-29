<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- OUTSOURCING.PHP -->

<!-- Service Hero Section -->
<section class="bg-info text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="badge bg-light text-info mb-3">IT Solutions</div>
          <h1 class="display-4 fw-bold mb-3">IT Outsourcing Services</h1>
          <p class="lead mb-4">Access world-class IT talent and expertise without the overhead. Scale your team up or down as needed.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Dedicated Teams</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Staff Augmentation</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill me-2"></i>
              <span>Project-Based</span>
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="/contact/contact.php?service=outsourcing" class="btn btn-light btn-lg px-4">Get Quote</a>
            <a href="#models" class="btn btn-outline-light btn-lg px-4">Engagement Models</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="../../../assets/images/outsourcing-hero.jpg" alt="IT Outsourcing" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-4">Scale Your IT Capabilities with Outsourcing</h2>
          <p class="mb-3">Our IT outsourcing services provide you with access to skilled professionals who become an extension of your team. Whether you need to fill skill gaps, scale quickly, or reduce costs, we have flexible solutions to meet your needs.</p>
          <p class="mb-3">We offer various engagement models from dedicated teams to project-based outsourcing, all with transparent pricing and clear communication. Our professionals are vetted, experienced, and ready to contribute from day one.</p>
          <p class="mb-4">With offices in Ghana and a network of talent across Africa, we provide reliable, high-quality IT services at competitive rates. Focus on your core business while we handle your IT needs.</p>

          <h3 class="fw-bold mb-3">Why Outsource to Us?</h3>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                <div>
                  <strong>Cost Savings</strong>
                  <p class="mb-0 text-muted small">Reduce IT costs by up to 60% without compromising quality</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                <div>
                  <strong>Skilled Professionals</strong>
                  <p class="mb-0 text-muted small">Access to vetted experts across all technologies</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                <div>
                  <strong>Scalability</strong>
                  <p class="mb-0 text-muted small">Scale team size up or down based on project needs</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                <div>
                  <strong>Focus on Core Business</strong>
                  <p class="mb-0 text-muted small">Free up internal resources for strategic initiatives</p>
                </div>
              </div>
            </div>
          </div>

          <h3 class="fw-bold mb-3">Services We Outsource</h3>
          <ul class="list-unstyled mb-4">
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Software Development</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Web & Mobile App Development</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Quality Assurance & Testing</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>DevOps & Infrastructure Management</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Database Administration</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>Technical Support</li>
            <li class="mb-2"><i class="bi bi-arrow-right-circle text-info me-2"></i>UI/UX Design</li>
          </ul>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow-lg sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h4 class="fw-bold mb-3">Quick Overview</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-cash text-info me-2"></i>
                    <div>
                      <strong>Cost Savings</strong>
                      <p class="mb-0 small text-muted">Up to 60% reduction</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-clock text-info me-2"></i>
                    <div>
                      <strong>Time to Start</strong>
                      <p class="mb-0 small text-muted">1-2 weeks for team setup</p>
                    </div>
                  </div>
                </li>
                <li class="mb-3">
                  <div class="d-flex">
                    <i class="bi bi-people text-info me-2"></i>
                    <div>
                      <strong>Team Size</strong>
                      <p class="mb-0 small text-muted">From 1 to 50+ professionals</p>
                    </div>
                  </div>
                </li>
              </ul>
              <hr>
              <h5 class="fw-bold mb-3">Get Started</h5>
              <a href="/contact/contact.php?service=outsourcing" class="btn btn-info w-100 mb-2 text-white">Request Quote</a>
              <a href="tel:+233XXXXXXXXX" class="btn btn-outline-info w-100">Call Us Now</a>
              <hr>
              <h5 class="fw-bold mb-3">Resources</h5>
              <a href="#" class="btn btn-sm btn-outline-info w-100 mb-2">
                <i class="bi bi-file-pdf me-2"></i>Pricing Guide
              </a>
              <a href="#" class="btn btn-sm btn-outline-info w-100">
                <i class="bi bi-file-text me-2"></i>Case Studies
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Engagement Models Section -->
<section class="py-5 bg-light" id="models" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Flexible Engagement Models</h2>
        <p class="lead">Choose the model that best fits your needs</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-people-fill text-info fs-1"></i>
              </div>
              <h4 class="fw-bold mb-3">Dedicated Team</h4>
              <p class="mb-3">A team of professionals dedicated exclusively to your projects. Full integration with your processes and culture.</p>
              <h5 class="text-info fw-bold mb-3">Best For:</h5>
              <ul class="small mb-4">
                <li>Long-term projects</li>
                <li>Product development</li>
                <li>Ongoing support needs</li>
                <li>Companies needing full control</li>
              </ul>
              <a href="/contact/contact.php?model=dedicated" class="btn btn-outline-info w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm border-info" style="border-width: 2px !important;">
            <div class="card-header bg-info text-white text-center">
              <h6 class="mb-0">MOST POPULAR</h6>
            </div>
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-person-plus-fill text-info fs-1"></i>
              </div>
              <h4 class="fw-bold mb-3">Staff Augmentation</h4>
              <p class="mb-3">Add skilled professionals to your existing team temporarily. Fill skill gaps or handle increased workload.</p>
              <h5 class="text-info fw-bold mb-3">Best For:</h5>
              <ul class="small mb-4">
                <li>Filling skill gaps</li>
                <li>Scaling existing teams</li>
                <li>Specific expertise needs</li>
                <li>Flexible duration projects</li>
              </ul>
              <a href="/contact/contact.php?model=augmentation" class="btn btn-info w-100 text-white">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="bg-info bg-opacity-10 rounded p-3 d-inline-block mb-3">
                <i class="bi bi-clipboard-check-fill text-info fs-1"></i>
              </div>
              <h4 class="fw-bold mb-3">Project-Based</h4>
              <p class="mb-3">Complete project delivery from start to finish. Fixed scope, timeline, and budget with defined deliverables.</p>
              <h5 class="text-info fw-bold mb-3">Best For:</h5>
              <ul class="small mb-4">
                <li>Defined scope projects</li>
                <li>One-time initiatives</li>
                <li>Fixed budget requirements</li>
                <li>Clear deliverables</li>
              </ul>
              <a href="/contact/contact.php?model=project" class="btn btn-outline-info w-100">Learn More</a>
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
        <h2 class="fw-bold">Benefits of IT Outsourcing</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-piggy-bank text-info fs-1"></i>
            </div>
            <h5 class="fw-bold">Cost Efficiency</h5>
            <p class="text-muted">Reduce operational costs while maintaining high quality standards.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-speedometer text-info fs-1"></i>
            </div>
            <h5 class="fw-bold">Faster Time to Market</h5>
            <p class="text-muted">Accelerate project delivery with experienced teams.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-graph-up-arrow text-info fs-1"></i>
            </div>
            <h5 class="fw-bold">Scalability</h5>
            <p class="text-muted">Easily scale resources up or down based on needs.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <i class="bi bi-star text-info fs-1"></i>
            </div>
            <h5 class="fw-bold">Access to Expertise</h5>
            <p class="text-muted">Tap into specialized skills and knowledge on demand.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-info text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Ready to Scale Your IT Team?</h2>
          <p class="lead mb-0">Let's discuss how our outsourcing services can help you achieve your business goals.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=outsourcing" class="btn btn-light btn-lg px-5">Get Started</a>
        </div>
      </div>
    </div>
</section>

<?php 
include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>