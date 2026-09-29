<?php 
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<!-- Page Header -->
<section class="py-5 text-center bg-info" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <div class="container">
    <h1 class="fw-bold mb-3 text-white"><i class="bi bi-calendar3 me-2"></i> Full Class Schedule</h1>
    <p class="lead text-white mb-4">Explore all upcoming intakes and secure your spot today.</p>
    <div class="row justify-content-center">
      <div class="col-md-3 col-6 mb-3">
        <div class="bg-white bg-opacity-25 rounded p-3 text-white">
          <h4 class="fw-bold mb-0">15+</h4>
          <small>Active Courses</small>
        </div>
      </div>
      <div class="col-md-3 col-6 mb-3">
        <div class="bg-white bg-opacity-25 rounded p-3 text-white">
          <h4 class="fw-bold mb-0">500+</h4>
          <small>Students Enrolled</small>
        </div>
      </div>
      <div class="col-md-3 col-6 mb-3">
        <div class="bg-white bg-opacity-25 rounded p-3 text-white">
          <h4 class="fw-bold mb-0">3</h4>
          <small>Learning Modes</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Quick Filters -->
<section class="py-4 bg-light border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8 mb-3 mb-md-0">
        <div class="btn-group flex-wrap" role="group">
          <button type="button" class="btn btn-outline-primary btn-sm filter-mode active" data-mode="all">
            <i class="bi bi-grid-3x3-gap me-1"></i> All Courses
          </button>
          <button type="button" class="btn btn-outline-success btn-sm filter-mode" data-mode="onsite">
            <i class="bi bi-building me-1"></i> Onsite
          </button>
          <button type="button" class="btn btn-outline-info btn-sm filter-mode" data-mode="online">
            <i class="bi bi-laptop me-1"></i> Online
          </button>
          <button type="button" class="btn btn-outline-warning btn-sm filter-mode" data-mode="hybrid">
            <i class="bi bi-intersect me-1"></i> Hybrid
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group input-group-sm">
          <span class="input-group-text bg-white">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" class="form-control" id="searchSchedule" placeholder="Search courses...">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Schedule Table Section -->
<section class="py-5">
  <div class="container">
    <!-- Desktop View -->
    <div class="table-responsive shadow-sm rounded d-none d-lg-block">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-primary">
          <tr>
            <th><i class="bi bi-book me-2"></i>Course</th>
            <th><i class="bi bi-calendar-event me-2"></i>Start Date</th>
            <th><i class="bi bi-hourglass-split me-2"></i>Duration</th>
            <th><i class="bi bi-clock me-2"></i>Schedule</th>
            <th><i class="bi bi-geo-alt me-2"></i>Mode</th>
            <th><i class="bi bi-people me-2"></i>Ava. Seats</th>
            <th><i class="bi bi-cash me-2"></i>Fee</th>
            <th class="text-center"><i class="bi bi-gear me-2"></i>Action</th>
          </tr>
        </thead>
        <tbody id="scheduleTableBody">
          <tr class="schedule-row" data-mode="onsite">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-code-square text-primary fs-4"></i>
                </div>
                <div>
                  <strong>Full Stack Web Development</strong>
                  <br><small class="text-muted">Beginner to Advanced</small>
                </div>
              </div>
            </td>
            <td>
              <strong>November 1, 2025</strong>
              <br><small class="text-muted">3 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">6 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">6:00 PM – 9:00 PM</small>
            </td>
            <td><span class="badge bg-success">Onsite</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 32%">8/25</div>
              </div>
              <small class="text-danger">Almost Full!</small>
            </td>
            <td><strong>$1,200</strong><br><small class="text-muted">Payment plans available</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=webdev" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal1">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="online">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-graph-up text-success fs-4"></i>
                </div>
                <div>
                  <strong>Data Analytics</strong>
                  <br><small class="text-muted">Excel to Python</small>
                </div>
              </div>
            </td>
            <td>
              <strong>November 8, 2025</strong>
              <br><small class="text-muted">4 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">4 Months</span></td>
            <td>
              Sat – Sun<br>
              <small class="text-muted">9:00 AM – 4:00 PM</small>
            </td>
            <td><span class="badge bg-info">Online</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%">15/30</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$950</strong><br><small class="text-muted">Early bird: $850</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=data" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal2">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="hybrid">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-shield-lock text-danger fs-4"></i>
                </div>
                <div>
                  <strong>Cybersecurity</strong>
                  <br><small class="text-muted">Ethical Hacking & Defense</small>
                </div>
              </div>
            </td>
            <td>
              <strong>November 15, 2025</strong>
              <br><small class="text-muted">5 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">5 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">9:00 AM – 12:00 PM</small>
            </td>
            <td><span class="badge bg-warning text-dark">Hybrid</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%">3/20</div>
              </div>
              <small class="text-danger">Only 3 spots left!</small>
            </td>
            <td><strong>$1,500</strong><br><small class="text-muted">Certification included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=cyber" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal3">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="online">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-cloud text-info fs-4"></i>
                </div>
                <div>
                  <strong>Cloud Computing</strong>
                  <br><small class="text-muted">AWS & Azure</small>
                </div>
              </div>
            </td>
            <td>
              <strong>December 1, 2025</strong>
              <br><small class="text-muted">7 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">6 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">6:00 PM – 9:00 PM</small>
            </td>
            <td><span class="badge bg-info">Online</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 48%">12/25</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,350</strong><br><small class="text-muted">Lab access included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=cloud" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal4">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="onsite">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-palette text-warning fs-4"></i>
                </div>
                <div>
                  <strong>UI/UX Design</strong>
                  <br><small class="text-muted">Figma to Production</small>
                </div>
              </div>
            </td>
            <td>
              <strong>December 10, 2025</strong>
              <br><small class="text-muted">8 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">3 Months</span></td>
            <td>
              Sat – Sun<br>
              <small class="text-muted">10:00 AM – 2:00 PM</small>
            </td>
            <td><span class="badge bg-success">Onsite</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%">5/20</div>
              </div>
              <small class="text-warning">Limited Seats</small>
            </td>
            <td><strong>$800</strong><br><small class="text-muted">Portfolio included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=uiux" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal5">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="hybrid">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-phone text-primary fs-4"></i>
                </div>
                <div>
                  <strong>Mobile App Development</strong>
                  <br><small class="text-muted">React Native & Flutter</small>
                </div>
              </div>
            </td>
            <td>
              <strong>December 15, 2025</strong>
              <br><small class="text-muted">9 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">5 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">6:00 PM – 9:00 PM</small>
            </td>
            <td><span class="badge bg-warning text-dark">Hybrid</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%">18/30</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,400</strong><br><small class="text-muted">2 apps guaranteed</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=mobile" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal6">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="online">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-robot text-success fs-4"></i>
                </div>
                <div>
                  <strong>Machine Learning & AI</strong>
                  <br><small class="text-muted">Python to Deployment</small>
                </div>
              </div>
            </td>
            <td>
              <strong>January 5, 2026</strong>
              <br><small class="text-muted">12 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">7 Months</span></td>
            <td>
              Sat – Sun<br>
              <small class="text-muted">9:00 AM – 5:00 PM</small>
            </td>
            <td><span class="badge bg-info">Online</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%">10/25</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,800</strong><br><small class="text-muted">GPU access included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=ml" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal7">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="onsite">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-database text-info fs-4"></i>
                </div>
                <div>
                  <strong>Database Administration</strong>
                  <br><small class="text-muted">SQL & NoSQL</small>
                </div>
              </div>
            </td>
            <td>
              <strong>January 10, 2026</strong>
              <br><small class="text-muted">13 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">4 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">9:00 AM – 12:00 PM</small>
            </td>
            <td><span class="badge bg-success">Onsite</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 70%">14/20</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,100</strong><br><small class="text-muted">Certificate included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=database" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal8">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="hybrid">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-server text-danger fs-4"></i>
                </div>
                <div>
                  <strong>DevOps Engineering</strong>
                  <br><small class="text-muted">CI/CD & Automation</small>
                </div>
              </div>
            </td>
            <td>
              <strong>January 20, 2026</strong>
              <br><small class="text-muted">14 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">6 Months</span></td>
            <td>
              Mon – Fri<br>
              <small class="text-muted">6:00 PM – 9:00 PM</small>
            </td>
            <td><span class="badge bg-warning text-dark">Hybrid</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 56%">14/25</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,600</strong><br><small class="text-muted">Tools & licenses included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=devops" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal9">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>

          <tr class="schedule-row" data-mode="online">
            <td>
              <div class="d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-lightning text-warning fs-4"></i>
                </div>
                <div>
                  <strong>Blockchain Development</strong>
                  <br><small class="text-muted">Smart Contracts & DApps</small>
                </div>
              </div>
            </td>
            <td>
              <strong>February 1, 2026</strong>
              <br><small class="text-muted">16 weeks away</small>
            </td>
            <td><span class="badge bg-secondary">5 Months</span></td>
            <td>
              Sat – Sun<br>
              <small class="text-muted">10:00 AM – 4:00 PM</small>
            </td>
            <td><span class="badge bg-info">Online</span></td>
            <td>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 33%">5/15</div>
              </div>
              <small class="text-success">Good Availability</small>
            </td>
            <td><strong>$1,900</strong><br><small class="text-muted">NFT project included</small></td>
            <td class="text-center">
              <a href="/Admissions/General/admissions/admissions.php?course=blockchain" class="btn btn-sm btn-primary mb-1">
                <i class="bi bi-person-plus me-1"></i>Enroll
              </a>
              <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#courseModal10">
                <i class="bi bi-info-circle"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Mobile/Tablet View (Cards) -->
    <div class="d-lg-none" id="mobileScheduleCards">
      <!-- Cards will be dynamically generated or you can add them manually -->
      <div class="card shadow-sm mb-3 schedule-card" data-mode="onsite">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
              <h5 class="card-title mb-1">Full Stack Web Development</h5>
              <small class="text-muted">Beginner to Advanced</small>
            </div>
            <span class="badge bg-success">Onsite</span>
          </div>
          
          <div class="row g-2 mb-3">
            <div class="col-6">
              <small class="text-muted d-block"><i class="bi bi-calendar-event me-1"></i>Start Date</small>
              <strong>Nov 1, 2025</strong>
            </div>
            <div class="col-6">
              <small class="text-muted d-block"><i class="bi bi-hourglass-split me-1"></i>Duration</small>
              <strong>6 Months</strong>
            </div>
            <div class="col-6">
              <small class="text-muted d-block"><i class="bi bi-clock me-1"></i>Schedule</small>
              <strong>Mon-Fri, 6-9 PM</strong>
            </div>
            <div class="col-6">
              <small class="text-muted d-block"><i class="bi bi-cash me-1"></i>Fee</small>
              <strong>$1,200</strong>
            </div>
          </div>

          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <small class="text-muted">Available Seats</small>
              <small class="text-danger">Almost Full!</small>
            </div>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 32%">8/25</div>
            </div>
          </div>

          <div class="d-grid gap-2">
            <a href="/Admissions/General/admissions/admissions.php?course=webdev" class="btn btn-primary">
              <i class="bi bi-person-plus me-1"></i>Enroll Now
            </a>
            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#courseModal1">
              <i class="bi bi-info-circle me-1"></i>More Details
            </button>
          </div>
        </div>
      </div>

      <!-- Add similar cards for other courses -->
    </div>

    <div class="alert alert-info mt-4" role="alert">
      <i class="bi bi-info-circle me-2"></i>
      <strong>Note:</strong> Early registration gets 10% discount. Payment plans available for all courses.
    </div>

    <div class="text-center mt-4">
      <a href="/Admissions/General/admissions/admissions.php" class="btn btn-outline-primary btn-lg me-2">
        <i class="bi bi-person-check me-2"></i> Apply for Admission
      </a>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Why Study With Us?</h2>
    <div class="row g-4">
      <div class="col-md-3 col-sm-6">
        <div class="text-center">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-trophy text-primary fs-2"></i>
          </div>
          <h5 class="fw-bold">Industry Experts</h5>
          <p class="text-muted small">Learn from professionals with 10+ years experience</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="text-center">
          <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-briefcase text-success fs-2"></i>
          </div>
          <h5 class="fw-bold">Job Placement</h5>
          <p class="text-muted small">85% job placement rate within 3 months</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="text-center">
          <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-laptop text-info fs-2"></i>
          </div>
          <h5 class="fw-bold">Flexible Learning</h5>
          <p class="text-muted small">Choose onsite, online, or hybrid options</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="text-center">
          <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-award text-warning fs-2"></i>
          </div>
          <h5 class="fw-bold">Certification</h5>
          <p class="text-muted small">Industry-recognized certificates upon completion</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Frequently Asked Questions</h2>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion" id="scheduleAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                Can I change my class schedule after enrollment?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#scheduleAccordion">
              <div class="accordion-body">
                Yes, you can request a schedule change within the first two weeks of the course. We'll do our best to accommodate your request based on seat availability in other time slots.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                What if I miss a class?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#scheduleAccordion">
              <div class="accordion-body">
                All classes are recorded and made available within 24 hours. You'll also have access to class materials and can schedule a one-on-one session with instructors if needed.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                Are payment plans available?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#scheduleAccordion">
              <div class="accordion-body">
                Yes! We offer flexible payment plans including monthly installments, quarterly payments, and upfront payment discounts. Contact our admissions team for details.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                What's the difference between Onsite, Online, and Hybrid?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#scheduleAccordion">
              <div class="accordion-body">
                <strong>Onsite:</strong> Physical attendance at our campus.<br>
                <strong>Online:</strong> 100% remote learning via live video sessions.<br>
                <strong>Hybrid:</strong> Mix of onsite and online classes for maximum flexibility.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                Do I get a certificate after completion?
              </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#scheduleAccordion">
              <div class="accordion-body">
                Yes! Upon successful completion of the course and final project, you'll receive an industry-recognized certificate from TecWorld Academy that you can add to your resume and LinkedIn profile.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Course Detail Modals (Example for Course 1) -->
<div class="modal fade" id="courseModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">
          <i class="bi bi-code-square me-2"></i>Full Stack Web Development
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-4">
          <div class="col-md-6">
            <h6 class="text-muted mb-2">Course Details</h6>
            <ul class="list-unstyled">
              <li><i class="bi bi-calendar-event text-primary me-2"></i><strong>Start:</strong> November 1, 2025</li>
              <li><i class="bi bi-hourglass-split text-primary me-2"></i><strong>Duration:</strong> 6 Months</li>
              <li><i class="bi bi-clock text-primary me-2"></i><strong>Schedule:</strong> Mon-Fri, 6:00 PM - 9:00 PM</li>
              <li><i class="bi bi-geo-alt text-primary me-2"></i><strong>Mode:</strong> Onsite</li>
              <li><i class="bi bi-cash text-primary me-2"></i><strong>Fee:</strong> $1,200</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h6 class="text-muted mb-2">What You'll Learn</h6>
            <ul class="small">
              <li>HTML5, CSS3, JavaScript ES6+</li>
              <li>React.js & Redux</li>
              <li>Node.js & Express</li>
              <li>MongoDB & SQL Databases</li>
              <li>RESTful API Development</li>
              <li>Authentication & Security</li>
              <li>Deployment & DevOps Basics</li>
            </ul>
          </div>
        </div>

        <div class="mb-4">
          <h6 class="text-muted mb-2">Course Highlights</h6>
          <div class="row g-2">
            <div class="col-6">
              <div class="border rounded p-2 text-center">
                <i class="bi bi-laptop text-primary fs-4"></i>
                <div class="small mt-1">Hands-on Projects</div>
              </div>
            </div>
            <div class="col-6">
              <div class="border rounded p-2 text-center">
                <i class="bi bi-people text-success fs-4"></i>
                <div class="small mt-1">Small Class Size</div>
              </div>
            </div>
            <div class="col-6">
              <div class="border rounded p-2 text-center">
                <i class="bi bi-award text-warning fs-4"></i>
                <div class="small mt-1">Certificate</div>
              </div>
            </div>
            <div class="col-6">
              <div class="border rounded p-2 text-center">
                <i class="bi bi-briefcase text-info fs-4"></i>
                <div class="small mt-1">Career Support</div>
              </div>
            </div>
          </div>
        </div>

        <div class="alert alert-warning">
          <i class="bi bi-exclamation-triangle me-2"></i>
          Only <strong>8 seats remaining</strong> for this intake!
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/Admissions/General/admissions/admissions.php?course=webdev" class="btn btn-primary">
          <i class="bi bi-person-plus me-2"></i>Enroll Now
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Add similar modals for other courses (courseModal2 through courseModal10) -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Filter by mode
  const filterButtons = document.querySelectorAll('.filter-mode');
  const scheduleRows = document.querySelectorAll('.schedule-row');
  const scheduleCards = document.querySelectorAll('.schedule-card');

  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      const mode = this.getAttribute('data-mode');

      scheduleRows.forEach(row => {
        if (mode === 'all' || row.getAttribute('data-mode') === mode) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });

      scheduleCards.forEach(card => {
        if (mode === 'all' || card.getAttribute('data-mode') === mode) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // Search functionality
  const searchInput = document.getElementById('searchSchedule');
  searchInput.addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();

    scheduleRows.forEach(row => {
      const courseText = row.textContent.toLowerCase();
      if (courseText.includes(searchTerm)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });

    scheduleCards.forEach(card => {
      const courseText = card.textContent.toLowerCase();
      if (courseText.includes(searchTerm)) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });

  // Consultation form submission
  const consultForm = document.getElementById('consultationForm');
  consultForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Here you would normally send the form data to your backend
    alert('Thank you! Your consultation has been scheduled. We will contact you shortly.');
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('scheduleConsultModal'));
    modal.hide();
    
    // Reset form
    this.reset();
  });

  // Highlight urgent courses (less than 5 seats)
  scheduleRows.forEach(row => {
    const seatsText = row.querySelector('.progress-bar')?.textContent;
    if (seatsText) {
      const [available] = seatsText.split('/').map(s => parseInt(s.trim()));
      if (available <= 5) {
        row.classList.add('table-warning');
      }
    }
  });

  // Countdown timer for upcoming courses
  function updateCountdowns() {
    const rows = document.querySelectorAll('.schedule-row');
    rows.forEach(row => {
      const dateCell = row.cells[1];
      const dateText = dateCell.querySelector('strong')?.textContent;
      if (dateText) {
        const courseDate = new Date(dateText);
        const now = new Date();
        const daysUntil = Math.ceil((courseDate - now) / (1000 * 60 * 60 * 24));
        
        const smallTag = dateCell.querySelector('small');
        if (smallTag && daysUntil > 0) {
          const weeks = Math.floor(daysUntil / 7);
          if (weeks > 0) {
            smallTag.textContent = `${weeks} week${weeks > 1 ? 's' : ''} away`;
          } else {
            smallTag.textContent = `${daysUntil} day${daysUntil > 1 ? 's' : ''} away`;
          }
          
          if (daysUntil <= 7) {
            smallTag.classList.add('text-danger', 'fw-bold');
          }
        }
      }
    });
  }

  updateCountdowns();

  // Smooth scroll for enrollment buttons
  const enrollButtons = document.querySelectorAll('a[href*="admissions.php"]');
  enrollButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      // Add animation effect
      this.innerHTML = '<i class="bi bi-check-circle me-1"></i>Redirecting...';
      this.classList.add('disabled');
    });
  });

  // Add hover effects to table rows
  scheduleRows.forEach(row => {
    row.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.01)';
      this.style.transition = 'transform 0.2s';
      this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
    });

    row.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
      this.style.boxShadow = 'none';
    });
  });
});
</script>

<style>
.schedule-row {
  transition: all 0.3s ease;
}

.schedule-row:hover {
  background-color: rgba(0, 123, 255, 0.05);
}

.filter-mode {
  transition: all 0.3s ease;
}

.filter-mode:hover {
  transform: translateY(-2px);
}

.progress {
  border-radius: 10px;
  overflow: hidden;
}

.progress-bar {
  font-size: 12px;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}

.table-hover tbody tr:hover {
  cursor: pointer;
}

.schedule-card {
  transition: all 0.3s ease;
}

.schedule-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.modal-header.bg-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

@media (max-width: 768px) {
  .btn-group {
    display: flex;
    flex-direction: column;
  }
  
  .btn-group .btn {
    border-radius: 0.25rem !important;
    margin-bottom: 0.25rem;
  }
}
</style>

<?php
include(__DIR__ . '/../../Modals/modals/modals.php');
include(__DIR__ . '/../../includes/footer/footer.php'); 
?>
