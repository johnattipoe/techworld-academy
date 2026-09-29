<?php
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">
  <!-- Header Section -->
  <div class="row mb-4">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/index/index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sitemap</li>
        </ol>
      </nav>
      <h1 class="display-4 mb-3"><i class="bi bi-diagram-3 me-3"></i>Website Sitemap</h1>
      <p class="lead">A comprehensive overview of all pages and sections available on TecWorld Academy website. Use this sitemap to quickly navigate to any area of our site.</p>
      
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" id="sitemapSearch" placeholder="Search sitemap...">
          </div>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
          <a href="sitemap.xml" class="btn btn-outline-primary me-2" target="_blank">
            <i class="bi bi-filetype-xml me-1"></i>XML Sitemap
          </a>
          <button class="btn btn-outline-secondary" onclick="window.print()">
            <i class="bi bi-printer me-1"></i>Print Sitemap
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Statistics -->
  <div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card text-center bg-primary text-white">
        <div class="card-body">
          <h3 class="mb-0">200+</h3>
          <small>Total Pages</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card text-center bg-success text-white">
        <div class="card-body">
          <h3 class="mb-0">50+</h3>
          <small>Course Pages</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card text-center bg-info text-white">
        <div class="card-body">
          <h3 class="mb-0">15+</h3>
          <small>Main Categories</small>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card text-center bg-warning text-dark">
        <div class="card-body">
          <h3 class="mb-0">Daily</h3>
          <small>Updates</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Sitemap Content -->
  <div class="row">
    <!-- Main Pages -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-house-door me-2"></i>Main Pages</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="/index/index.php" class="text-decoration-none">Home</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="about.php" class="text-decoration-none">About Us</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="about.php#mission" class="text-decoration-none small">Our Mission</a></li>
                <li class="mb-1"><a href="about.php#vision" class="text-decoration-none small">Our Vision</a></li>
                <li class="mb-1"><a href="about.php#history" class="text-decoration-none small">Our History</a></li>
                <li class="mb-1"><a href="about.php#team" class="text-decoration-none small">Leadership Team</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="/contact/contact.php" class="text-decoration-none">Contact Us</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="faq.php" class="text-decoration-none">FAQ</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="testimonials.php" class="text-decoration-none">Testimonials</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="gallery.php" class="text-decoration-none">Gallery</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="team.php" class="text-decoration-none">Our Team</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-primary"></i>
              <a href="alumni.php" class="text-decoration-none">Alumni</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Courses -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0"><i class="bi bi-book me-2"></i>Courses</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="/Courses/courses.php" class="text-decoration-none">All Courses</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/web-dev.php" class="text-decoration-none">Web Development</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="courses/frontend.php" class="text-decoration-none small">Frontend Development</a></li>
                <li class="mb-1"><a href="courses/backend.php" class="text-decoration-none small">Backend Development</a></li>
                <li class="mb-1"><a href="courses/fullstack.php" class="text-decoration-none small">Full Stack Development</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/data-analytics.php" class="text-decoration-none">Data Analytics</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="courses/data-science.php" class="text-decoration-none small">Data Science</a></li>
                <li class="mb-1"><a href="courses/business-intelligence.php" class="text-decoration-none small">Business Intelligence</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/cybersecurity.php" class="text-decoration-none">Cybersecurity</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="courses/ethical-hacking.php" class="text-decoration-none small">Ethical Hacking</a></li>
                <li class="mb-1"><a href="courses/network-security.php" class="text-decoration-none small">Network Security</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/ai.php" class="text-decoration-none">AI & Machine Learning</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="courses/deep-learning.php" class="text-decoration-none small">Deep Learning</a></li>
                <li class="mb-1"><a href="courses/nlp.php" class="text-decoration-none small">Natural Language Processing</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/digital-marketing.php" class="text-decoration-none">Digital Marketing</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/cloud.php" class="text-decoration-none">Cloud Computing</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/mobile-dev.php" class="text-decoration-none">Mobile Development</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/ui-ux.php" class="text-decoration-none">UI/UX Design</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/devops.php" class="text-decoration-none">DevOps</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/blockchain.php" class="text-decoration-none">Blockchain</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/game-dev.php" class="text-decoration-none">Game Development</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-success"></i>
              <a href="courses/iot.php" class="text-decoration-none">Internet of Things (IoT)</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Admissions & Programs -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Admissions & Programs</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="/Admissions/General/admissions/admissions.php" class="text-decoration-none">Admissions Overview</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="apply.php" class="text-decoration-none">Apply Now</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="requirements.php" class="text-decoration-none">Entry Requirements</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="programs.php" class="text-decoration-none">Programs</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="programs/full-time.php" class="text-decoration-none small">Full-Time Programs</a></li>
                <li class="mb-1"><a href="programs/part-time.php" class="text-decoration-none small">Part-Time Programs</a></li>
                <li class="mb-1"><a href="programs/online.php" class="text-decoration-none small">Online Programs</a></li>
                <li class="mb-1"><a href="programs/weekend.php" class="text-decoration-none small">Weekend Classes</a></li>
                <li class="mb-1"><a href="programs/evening.php" class="text-decoration-none small">Evening Programs</a></li>
                <li class="mb-1"><a href="programs/intensive.php" class="text-decoration-none small">Intensive Bootcamps</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="tuition.php" class="text-decoration-none">Tuition & Fees</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="scholarships.php" class="text-decoration-none">Scholarships</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="financial-aid.php" class="text-decoration-none">Financial Aid</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-info"></i>
              <a href="payment-plans.php" class="text-decoration-none">Payment Plans</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Student Resources -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-warning text-dark">
          <h5 class="mb-0"><i class="bi bi-book-half me-2"></i>Student Resources</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="student-portal.php" class="text-decoration-none">Student Portal</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="library.php" class="text-decoration-none">Online Library</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="lms.php" class="text-decoration-none">Learning Management System</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="schedule.php" class="text-decoration-none">Class Schedule</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="grades.php" class="text-decoration-none">View Grades</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="assignments.php" class="text-decoration-none">Assignments</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="projects.php" class="text-decoration-none">Projects</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="resources.php" class="text-decoration-none">Study Materials</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="tutoring.php" class="text-decoration-none">Tutoring Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-warning"></i>
              <a href="academic-calendar.php" class="text-decoration-none">Academic Calendar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Services -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-danger text-white">
          <h5 class="mb-0"><i class="bi bi-gear me-2"></i>Services</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="services.php" class="text-decoration-none">All Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="training.php" class="text-decoration-none">Corporate Training</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="consulting.php" class="text-decoration-none">IT Consulting</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="internships.php" class="text-decoration-none">Internship Programs</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="certifications.php" class="text-decoration-none">Professional Certifications</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="career.php" class="text-decoration-none">Career Services</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="career/job-board.php" class="text-decoration-none small">Job Board</a></li>
                <li class="mb-1"><a href="career/resume-review.php" class="text-decoration-none small">Resume Review</a></li>
                <li class="mb-1"><a href="career/interview-prep.php" class="text-decoration-none small">Interview Preparation</a></li>
                <li class="mb-1"><a href="career/networking.php" class="text-decoration-none small">Networking Events</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="mentorship.php" class="text-decoration-none">Mentorship Program</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="workshops.php" class="text-decoration-none">Workshops</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="bootcamps.php" class="text-decoration-none">Coding Bootcamps</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="job-placement.php" class="text-decoration-none">Job Placement</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-danger"></i>
              <a href="portfolio.php" class="text-decoration-none">Portfolio Building</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Events & News -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header bg-secondary text-white">
          <h5 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Events & News</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="events.php" class="text-decoration-none">All Events</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="events/upcoming.php" class="text-decoration-none">Upcoming Events</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="events/past.php" class="text-decoration-none">Past Events</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="events/webinars.php" class="text-decoration-none">Webinars</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="events/seminars.php" class="text-decoration-none">Seminars</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="blog.php" class="text-decoration-none">Blog</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="blog/category/technology.php" class="text-decoration-none small">Technology</a></li>
                <li class="mb-1"><a href="blog/category/career.php" class="text-decoration-none small">Career Advice</a></li>
                <li class="mb-1"><a href="blog/category/tutorials.php" class="text-decoration-none small">Tutorials</a></li>
                <li class="mb-1"><a href="blog/category/success-stories.php" class="text-decoration-none small">Success Stories</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="news.php" class="text-decoration-none">News & Announcements</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right text-secondary"></i>
              <a href="press.php" class="text-decoration-none">Press & Media</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- For Employers -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #6f42c1; color: white;">
          <h5 class="mb-0"><i class="bi bi-briefcase me-2"></i>For Employers</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="employers.php" class="text-decoration-none">Employer Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="hire-graduates.php" class="text-decoration-none">Hire Our Graduates</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="corporate-training.php" class="text-decoration-none">Corporate Training Solutions</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="partnerships.php" class="text-decoration-none">Partnership Opportunities</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="internship-program.php" class="text-decoration-none">Host Interns</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="job-board.php" class="text-decoration-none">Post a Job</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="talent-pool.php" class="text-decoration-none">Access Talent Pool</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="recruitment.php" class="text-decoration-none">Recruitment Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #6f42c1;"></i>
              <a href="employer-login.php" class="text-decoration-none">Employer Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Campus Life -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #e83e8c; color: white;">
          <h5 class="mb-0"><i class="bi bi-building me-2"></i>Campus Life</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="campus-life.php" class="text-decoration-none">Campus Life Overview</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="facilities.php" class="text-decoration-none">Campus Facilities</a>
              <ul class="list-unstyled ms-4 mt-2">
                <li class="mb-1"><a href="facilities/computer-labs.php" class="text-decoration-none small">Computer Labs</a></li>
                <li class="mb-1"><a href="facilities/library.php" class="text-decoration-none small">Library</a></li>
                <li class="mb-1"><a href="facilities/cafeteria.php" class="text-decoration-none small">Cafeteria</a></li>
                <li class="mb-1"><a href="facilities/study-rooms.php" class="text-decoration-none small">Study Rooms</a></li>
              </ul>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="student-clubs.php" class="text-decoration-none">Student Clubs & Organizations</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="sports.php" class="text-decoration-none">Sports & Recreation</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="student-support.php" class="text-decoration-none">Student Support Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="counseling.php" class="text-decoration-none">Counseling Services</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="housing.php" class="text-decoration-none">Student Housing</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #e83e8c;"></i>
              <a href="dining.php" class="text-decoration-none">Dining Options</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Account & User Pages -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #20c997; color: white;">
          <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>Account & User</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled sitemap-list">
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
              <a href="login.php" class="text-decoration-none">Login</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron->right" style="color: #20c997;"></i>
                <a href="register.php" class="text-decoration-none">Register</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="forgot-password.php" class="text-decoration-none">Forgot Password</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="reset-password.php" class="text-decoration-none">Reset Password</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="dashboard.php" class="text-decoration-none">Student Dashboard</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="profile.php" class="text-decoration-none">My Profile</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="my-courses.php" class="text-decoration-none">My Courses</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="certificates.php" class="text-decoration-none">My Certificates</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="settings.php" class="text-decoration-none">Account Settings</a>
              </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="notifications.php" class="text-decoration-none">Notifications</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="messages.php" class="text-decoration-none">Messages</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-chevron-right" style="color: #20c997;"></i>
                <a href="billing.php" class="text-decoration-none">Billing & Payments</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Legal & Policies -->
<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-header" style="background-color: #6c757d; color: white;">
      <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Legal & Policies</h5>
    </div>
    <div class="card-body">
      <ul class="list-unstyled sitemap-list">
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="privacy.php" class="text-decoration-none">Privacy Policy</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="terms.php" class="text-decoration-none">Terms of Service</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="cookies.php" class="text-decoration-none">Cookie Policy</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="accessibility.php" class="text-decoration-none">Accessibility Statement</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="disclaimer.php" class="text-decoration-none">Disclaimer</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="refund-policy.php" class="text-decoration-none">Refund Policy</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="code-of-conduct.php" class="text-decoration-none">Code of Conduct</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="anti-discrimination.php" class="text-decoration-none">Anti-Discrimination Policy</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="data-protection.php" class="text-decoration-none">Data Protection</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="intellectual-property.php" class="text-decoration-none">Intellectual Property</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #6c757d;"></i>
          <a href="sitemap.php" class="text-decoration-none">Sitemap</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Support & Help -->
<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-header" style="background-color: #fd7e14; color: white;">
      <h5 class="mb-0"><i class="bi bi-question-circle me-2"></i>Support & Help</h5>
    </div>
    <div class="card-body">
      <ul class="list-unstyled sitemap-list">
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="help-center.php" class="text-decoration-none">Help Center</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="faq.php" class="text-decoration-none">Frequently Asked Questions</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="live-chat.php" class="text-decoration-none">Live Chat Support</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="submit-ticket.php" class="text-decoration-none">Submit a Support Ticket</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="technical-support.php" class="text-decoration-none">Technical Support</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="report-issue.php" class="text-decoration-none">Report an Issue</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="feedback.php" class="text-decoration-none">Give Feedback</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="video-tutorials.php" class="text-decoration-none">Video Tutorials</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="knowledge-base.php" class="text-decoration-none">Knowledge Base</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #fd7e14;"></i>
          <a href="system-status.php" class="text-decoration-none">System Status</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Company Information -->
<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-header" style="background-color: #17a2b8; color: white;">
      <h5 class="mb-0"><i class="bi bi-building me-2"></i>Company</h5>
    </div>
    <div class="card-body">
      <ul class="list-unstyled sitemap-list">
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="our-story.php" class="text-decoration-none">Our Story</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="leadership.php" class="text-decoration-none">Leadership Team</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="careers.php" class="text-decoration-none">Careers at TecWorld</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="press.php" class="text-decoration-none">Press & Media</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="investors.php" class="text-decoration-none">Investor Relations</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="social-impact.php" class="text-decoration-none">Social Impact</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="awards.php" class="text-decoration-none">Awards & Recognition</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="accreditation.php" class="text-decoration-none">Accreditation</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="partners.php" class="text-decoration-none">Our Partners</a>
        </li>
        <li class="mb-2">
          <i class="bi bi-chevron-right" style="color: #17a2b8;"></i>
          <a href="locations.php" class="text-decoration-none">Campus Locations</a>
        </li>
      </ul>
    </div>
  </div>
</div>
</div>
  <!-- Additional Information -->
  <div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Additional Information</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h6><i class="bi bi-clock-history text-primary me-2"></i>Last Updated</h6>
              <p>This sitemap was last updated on October 2, 2025. We regularly add new pages and update existing content.</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6><i class="bi bi-filetype-xml text-success me-2"></i>XML Sitemap</h6>
              <p>For search engines, our XML sitemap is available at: <a href="sitemap.xml" target="_blank">sitemap.xml</a></p>
            </div>
            <div class="col-md-6 mb-3">
              <h6><i class="bi bi-question-circle text-warning me-2"></i>Can't Find What You're Looking For?</h6>
              <p>If you can't find a specific page, try using our <a href="search.php">search function</a> or <a href="/contact/contact.php">contact us</a> for assistance.</p>
            </div>
            <div class="col-md-6 mb-3">
              <h6><i class="bi bi-shield-check text-info me-2"></i>Broken Links</h6>
              <p>If you encounter a broken link, please <a href="report-issue.php">report it here</a> so we can fix it promptly.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile App Downloads -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="card bg-light">
        <div class="card-body text-center">
          <h5 class="mb-3"><i class="bi bi-phone me-2"></i>Access Our Website on Mobile</h5>
          <p>Download our mobile app for a better experience on your smartphone or tablet.</p>
          <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#" class="btn btn-dark">
              <i class="bi bi-apple me-2"></i>Download on App Store
            </a>
            <a href="#" class="btn btn-success">
              <i class="bi bi-google-play me-2"></i>Get it on Google Play
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include(__DIR__ . '/..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\includes\footer\footer.php');
 ?>
