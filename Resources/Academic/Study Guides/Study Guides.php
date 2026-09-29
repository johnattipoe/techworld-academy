<?php
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="fw-bold text-center">Study Guides</h1>
  <p class="lead text-center mb-4">Download structured guides to help you prepare for exams and master your courses.</p>

  <!-- Search bar -->
  <div class="row mb-4">
    <div class="col-md-8 mx-auto">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search guides..." aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>

  <!-- Categories -->
  <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="webdev-tab" data-bs-toggle="pill" data-bs-target="#webdev" type="button" role="tab">Web Development</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="datasci-tab" data-bs-toggle="pill" data-bs-target="#datasci" type="button" role="tab">Data Science</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="cyber-tab" data-bs-toggle="pill" data-bs-target="#cyber" type="button" role="tab">Cybersecurity</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="cloud-tab" data-bs-toggle="pill" data-bs-target="#cloud" type="button" role="tab">Cloud Computing</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="ai-tab" data-bs-toggle="pill" data-bs-target="#ai" type="button" role="tab">Artificial Intelligence</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="iot-tab" data-bs-toggle="pill" data-bs-target="#iot" type="button" role="tab">Internet of Things</button>
    </li>
  </ul>

  <!-- Tab content -->
  <div class="tab-content" id="pills-tabContent">
    <!-- Web Development -->
    <div class="tab-pane fade show active" id="webdev" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">HTML & CSS Quick Guide</h5>
              <p class="card-text">A beginner-friendly guide for mastering the basics of web design.</p>
              <a href="../../assets/study-guides/html-css-quick-guide.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">JavaScript Essentials</h5>
              <p class="card-text">Learn the fundamentals of JavaScript to build interactive websites.</p>
              <a href="../../assets/study-guides/javascript-essentials.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Data Science -->
    <div class="tab-pane fade" id="datasci" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Data Science Revision Notes</h5>
              <p class="card-text">Condensed notes covering statistics, Python, and ML essentials.</p>
              <a href="../../assets/study-guides/data-science-revision.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Machine Learning Crash Guide</h5>
              <p class="card-text">Quick start guide for supervised and unsupervised ML algorithms.</p>
              <a href="../../assets/study-guides/ml-crash-guide.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cybersecurity -->
    <div class="tab-pane fade" id="cyber" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Cybersecurity Exam Prep</h5>
              <p class="card-text">Exam-focused guide covering network security, cryptography, and threat detection.</p>
              <a href="../../assets/study-guides/cybersecurity-exam-prep.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Ethical Hacking Notes</h5>
              <p class="card-text">A practical guide to penetration testing and security analysis.</p>
              <a href="../../assets/study-guides/ethical-hacking.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cloud Computing -->
    <div class="tab-pane fade" id="cloud" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Cloud Computing Basics</h5>
              <p class="card-text">An introduction to cloud computing concepts and services.</p>
              <a href="../../assets/study-guides/cloud-computing-basics.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Artificial Intelligence -->
    <div class="tab-pane fade" id="ai" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Artificial Intelligence Fundamentals</h5>
              <p class="card-text">A comprehensive guide to AI concepts, machine learning, and deep learning.</p>
              <a href="../../assets/study-guides/artificial-intelligence-fundamentals.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Internet of Things -->
    <div class="tab-pane fade" id="iot" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Internet of Things Basics</h5>
              <p class="card-text">An introduction to IoT concepts and technologies.</p>
              <a href="../../assets/study-guides/internet-of-things-basics.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Machine Learning -->
    <div class="tab-pane fade" id="ml" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Machine Learning Crash Guide</h5>
              <p class="card-text">Quick start guide for supervised and unsupervised ML algorithms.</p>
              <a href="../../assets/study-guides/ml-crash-guide.pdf" class="btn btn-outline-primary" download>Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
