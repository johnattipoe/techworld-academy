<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- LIBRARY.PHP -->

<!-- Page Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-light text-primary mb-3">Academic Resources</div>
          <h1 class="display-4 fw-bold mb-3">Digital Library</h1>
          <p class="lead mb-4">Access thousands of books, journals, research papers, and learning resources to support your studies.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#catalog" class="btn btn-light btn-lg px-4">Browse Catalog</a>
            <a href="#access" class="btn btn-outline-light btn-lg px-4">How to Access</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="fw-bold mb-4 text-center">Welcome to TecWorld Library</h2>
          <p class="mb-3">Our digital library provides 24/7 access to a comprehensive collection of technology resources. Whether you're researching for a project, preparing for exams, or expanding your knowledge, our library has the materials you need.</p>
          <p class="mb-4">All students and alumni have free access to our entire collection, including premium subscriptions to leading technology publications and learning platforms.</p>
        </div>
      </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-primary mb-0">5,000+</h2>
            <p class="lead mb-0">E-Books</p>
            <small class="text-muted">Across all tech topics</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-primary mb-0">200+</h2>
            <p class="lead mb-0">Journals</p>
            <small class="text-muted">Latest research papers</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-primary mb-0">1,000+</h2>
            <p class="lead mb-0">Video Courses</p>
            <small class="text-muted">From top platforms</small>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="p-3">
            <h2 class="display-4 fw-bold text-primary mb-0">24/7</h2>
            <p class="lead mb-0">Access</p>
            <small class="text-muted">Anytime, anywhere</small>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Resource Categories Section -->
<section class="py-5" id="catalog" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Resource Categories</h2>
        <p class="lead">Explore our extensive collection</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-book text-primary fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">E-Books & Textbooks</h5>
              <p class="mb-3">Comprehensive collection of programming, design, and technology books from leading publishers.</p>
              <ul class="small">
                <li>Programming Languages</li>
                <li>Software Engineering</li>
                <li>Data Science & AI</li>
                <li>Web Development</li>
              </ul>
              <a href="#" class="btn btn-outline-primary btn-sm">Browse Books</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-journal-text text-success fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Research Papers & Journals</h5>
              <p class="mb-3">Access to academic journals and latest research in computer science and technology.</p>
              <ul class="small">
                <li>IEEE Xplore</li>
                <li>ACM Digital Library</li>
                <li>arXiv.org Papers</li>
                <li>Google Scholar Access</li>
              </ul>
              <a href="#" class="btn btn-outline-success btn-sm">View Journals</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-play-circle text-danger fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Video Tutorials</h5>
              <p class="mb-3">Premium access to video learning platforms with thousands of courses.</p>
              <ul class="small">
                <li>Pluralsight</li>
                <li>LinkedIn Learning</li>
                <li>Udemy Business</li>
                <li>Coursera</li>
              </ul>
              <a href="#" class="btn btn-outline-danger btn-sm">Watch Videos</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-file-code text-warning fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Code Repositories</h5>
              <p class="mb-3">Sample projects, templates, and code snippets for learning and reference.</p>
              <ul class="small">
                <li>GitHub Repositories</li>
                <li>Project Templates</li>
                <li>Code Samples</li>
                <li>Best Practices</li>
              </ul>
              <a href="#" class="btn btn-outline-warning btn-sm">Access Code</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-newspaper text-info fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Tech Publications</h5>
              <p class="mb-3">Stay updated with industry news and trends from leading tech publications.</p>
              <ul class="small">
                <li>TechCrunch</li>
                <li>MIT Technology Review</li>
                <li>Wired Magazine</li>
                <li>The Verge</li>
              </ul>
              <a href="#" class="btn btn-outline-info btn-sm">Read News</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="bi bi-lightbulb text-secondary fs-1 mb-3"></i>
              <h5 class="fw-bold mb-3">Study Guides</h5>
              <p class="mb-3">Curated study materials, cheat sheets, and exam preparation resources.</p>
              <ul class="small">
                <li>Course Study Guides</li>
                <li>Certification Prep</li>
                <li>Cheat Sheets</li>
                <li>Practice Tests</li>
              </ul>
              <a href="#" class="btn btn-outline-secondary btn-sm">Get Guides</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- How to Access Section -->
<section class="py-5 bg-light" id="access" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">How to Access the Library</h2>
        <p class="lead">Simple steps to start using library resources</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">1</h2>
            </div>
            <h5 class="fw-bold">Login</h5>
            <p class="text-muted">Use your student portal credentials to access the library system</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">2</h2>
            </div>
            <h5 class="fw-bold">Search</h5>
            <p class="text-muted">Use our advanced search to find books, papers, or videos</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">3</h2>
            </div>
            <h5 class="fw-bold">Access</h5>
            <p class="text-muted">Read online, download, or bookmark resources for later</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="text-center">
            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
              <h2 class="mb-0">4</h2>
            </div>
            <h5 class="fw-bold">Learn</h5>
            <p class="text-muted">Use resources to enhance your learning and projects</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Library Services Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Library Services</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-search text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Research Assistance</h5>
              <p class="mb-0">Get help from our librarians in finding and using resources for your projects and research.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-bookmark text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">Personal Collections</h5>
              <p class="mb-0">Create and organize your own collection of favorite resources for easy access.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-bell text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">New Arrivals Alerts</h5>
              <p class="mb-0">Get notified when new books or resources in your areas of interest are added.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="d-flex">
            <i class="bi bi-chat-dots text-primary fs-3 me-3"></i>
            <div>
              <h5 class="fw-bold">24/7 Support</h5>
              <p class="mb-0">Chat with library staff anytime for assistance with accessing or finding resources.</p>
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
          <h2 class="fw-bold mb-3">Start Exploring Our Library Today</h2>
          <p class="lead mb-0">Access thousands of resources to support your learning journey.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="../../student-portal.php" class="btn btn-light btn-lg px-5">Access Library</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>