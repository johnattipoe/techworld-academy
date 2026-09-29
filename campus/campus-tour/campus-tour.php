<?php
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<!-- Campus Tour Page -->
<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section class="position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0 80px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
              <li class="breadcrumb-item"><a href="/index/index.php" class="text-white">Home</a></li>
              <li class="breadcrumb-item active text-white">Campus Tour</li>
            </ol>
          </nav>
          <h1 class="display-3 fw-bold mb-4">Virtual Campus Tour</h1>
          <p class="lead mb-4">Explore our state-of-the-art facilities, modern classrooms, and vibrant student spaces from the comfort of your home.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#virtual-tour" class="btn btn-light btn-lg px-5">
              <i class="bi bi-play-circle me-2"></i>Start Tour
            </a>
            <a href="#schedule-visit" class="btn btn-outline-light btn-lg px-5">
              <i class="bi bi-calendar-check me-2"></i>Schedule Visit
            </a>
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <img src="assets/images/campus-exterior.jpg" alt="Campus" class="img-fluid rounded shadow-lg">
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Stats -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-building text-primary" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">50,000</h3>
              <p class="text-muted mb-0">Sq. Ft Campus</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-laptop text-success" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">15</h3>
              <p class="text-muted mb-0">Computer Labs</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-book text-info" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">30,000+</h3>
              <p class="text-muted mb-0">Books & Resources</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <i class="bi bi-people text-warning" style="font-size: 3rem;"></i>
              <h3 class="mt-3 mb-2">2,500+</h3>
              <p class="text-muted mb-0">Active Students</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Virtual Tour Video -->
  <section id="virtual-tour" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">360° Virtual Campus Tour</h2>
        <p class="lead text-muted">Experience our campus like you're really here</p>
      </div>
      
      <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
          <div class="position-relative">
            <div class="ratio ratio-16x9 shadow-lg rounded overflow-hidden">
              <video controls class="w-100 rounded" poster="assets/images/video-thumbnail.jpg">
                <source src="assets/videos/campus-tour.mp4" type="video/mp4">
                <source src="assets/videos/campus-tour.webm" type="video/webm">
                Your browser does not support the video tag.
              </video>
            </div>
            <div class="position-absolute top-50 start-50 translate-middle" style="pointer-events: none;">
              <i class="bi bi-play-circle text-white" style="font-size: 5rem; opacity: 0.8;"></i>
            </div>
          </div>
          <div class="text-center mt-4">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-download me-2"></i>Download HD
              </button>
              <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-share me-2"></i>Share
              </button>
              <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-fullscreen me-2"></i>Fullscreen
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Tour Videos -->
      <div class="row g-4 mt-5">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="ratio ratio-16x9">
              <video controls class="card-img-top">
                <source src="assets/videos/library-tour.mp4" type="video/mp4">
              </video>
            </div>
            <div class="card-body">
              <h5 class="card-title">Library Tour</h5>
              <p class="card-text text-muted small">Explore our modern library facilities</p>
              <span class="badge bg-primary">5:30 mins</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="ratio ratio-16x9">
              <video controls class="card-img-top">
                <source src="assets/videos/labs-tour.mp4" type="video/mp4">
              </video>
            </div>
            <div class="card-body">
              <h5 class="card-title">Innovation Labs</h5>
              <p class="card-text text-muted small">See our cutting-edge tech labs</p>
              <span class="badge bg-success">4:45 mins</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="ratio ratio-16x9">
              <video controls class="card-img-top">
                <source src="assets/videos/student-life.mp4" type="video/mp4">
              </video>
            </div>
            <div class="card-body">
              <h5 class="card-title">Student Life</h5>
              <p class="card-text text-muted small">Experience our vibrant campus culture</p>
              <span class="badge bg-info">6:20 mins</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Campus Locations -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Our Campuses</h2>
        <p class="lead text-muted">Two modern locations to serve you better</p>
      </div>

      <div class="row g-4">
        <!-- Accra Campus -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="position-relative">
              <img src="assets/images/accra-campus.jpg" class="card-img-top" alt="Accra Campus">
              <span class="position-absolute top-0 end-0 m-3 badge bg-primary">Main Campus</span>
            </div>
            <div class="card-body p-4">
              <h3 class="card-title mb-3">Accra Campus</h3>
              <p class="text-muted mb-4">Our flagship campus located in the heart of East Legon, featuring state-of-the-art facilities and modern learning spaces.</p>
              
              <div class="mb-3">
                <h6 class="fw-bold mb-2">Address:</h6>
                <p class="mb-0"><i class="bi bi-geo-alt-fill text-primary me-2"></i>123 Tech Street, East Legon, Accra, Ghana</p>
              </div>

              <div class="mb-3">
                <h6 class="fw-bold mb-2">Facilities:</h6>
                <div class="row g-2">
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>10 Computer Labs</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Main Library</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Cafeteria</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Student Lounge</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Auditorium</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Sports Facilities</small>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <h6 class="fw-bold mb-2">Contact:</h6>
                <p class="mb-1"><i class="bi bi-telephone-fill text-success me-2"></i>+233 55 123 4567</p>
                <p class="mb-0"><i class="bi bi-envelope-fill text-danger me-2"></i>accra@tecworldacademy.edu</p>
              </div>

              <div class="d-flex gap-2 mt-4">
                <a href="#schedule-visit" class="btn btn-primary flex-fill">
                  <i class="bi bi-calendar-check me-1"></i>Schedule Visit
                </a>
                <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary flex-fill">
                  <i class="bi bi-map me-1"></i>Get Directions
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Tema Campus -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-lg h-100">
            <div class="position-relative">
              <img src="assets/images/tema-campus.jpg" class="card-img-top" alt="Tema Campus">
              <span class="position-absolute top-0 end-0 m-3 badge bg-success">Branch Campus</span>
            </div>
            <div class="card-body p-4">
              <h3 class="card-title mb-3">Tema Campus</h3>
              <p class="text-muted mb-4">Our expanding campus in Tema, providing convenient access to students in the Greater Accra Region with modern learning facilities.</p>
              
              <div class="mb-3">
                <h6 class="fw-bold mb-2">Address:</h6>
                <p class="mb-0"><i class="bi bi-geo-alt-fill text-primary me-2"></i>456 Innovation Ave, Tema, Greater Accra, Ghana</p>
              </div>

              <div class="mb-3">
                <h6 class="fw-bold mb-2">Facilities:</h6>
                <div class="row g-2">
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>5 Computer Labs</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Resource Center</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Cafeteria</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Study Rooms</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Conference Room</small>
                  </div>
                  <div class="col-6">
                    <small><i class="bi bi-check-circle-fill text-success me-1"></i>Parking</small>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <h6 class="fw-bold mb-2">Contact:</h6>
                <p class="mb-1"><i class="bi bi-telephone-fill text-success me-2"></i>+233 24 987 6543</p>
                <p class="mb-0"><i class="bi bi-envelope-fill text-danger me-2"></i>tema@tecworldacademy.edu</p>
              </div>

              <div class="d-flex gap-2 mt-4">
                <a href="#schedule-visit" class="btn btn-success flex-fill">
                  <i class="bi bi-calendar-check me-1"></i>Schedule Visit
                </a>
                <a href="https://maps.google.com" target="_blank" class="btn btn-outline-success flex-fill">
                  <i class="bi bi-map me-1"></i>Get Directions
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Campus Facilities Highlights -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Campus Facilities</h2>
        <p class="lead text-muted">World-class facilities designed for your success</p>
      </div>

      <div class="row g-4">
        <!-- Library -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/library.jpg" class="card-img-top" alt="Library" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-book text-primary" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Modern Library</h5>
              </div>
              <p class="card-text text-muted">A fully equipped library with over 30,000 books, digital resources, e-journals, and quiet study spaces.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Open 24/7 for students</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Digital resource center</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Group study rooms</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Research assistance</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Computer Labs -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/lab.jpg" class="card-img-top" alt="Computer Lab" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-laptop text-success" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Innovation Labs</h5>
              </div>
              <p class="card-text text-muted">Cutting-edge computer labs equipped with the latest hardware and software for hands-on learning.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>500+ high-spec computers</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Latest development tools</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>High-speed internet</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Tech support available</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Student Life -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/student-life.jpg" class="card-img-top" alt="Student Life" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-people text-info" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Vibrant Student Life</h5>
              </div>
              <p class="card-text text-muted">Join clubs, societies, and activities that make your campus experience memorable and enriching.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>20+ student clubs</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Regular tech events</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Sports facilities</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Social activities</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Cafeteria -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/cafeteria.jpg" class="card-img-top" alt="Cafeteria" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-cup-hot text-warning" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Campus Cafeteria</h5>
              </div>
              <p class="card-text text-muted">Enjoy healthy, affordable meals and snacks in our modern cafeteria with diverse menu options.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Breakfast, lunch & dinner</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Vegetarian options</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Coffee & snack bar</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Comfortable seating</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Study Spaces -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/study-space.jpg" class="card-img-top" alt="Study Space" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-danger bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-door-open text-danger" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Study Spaces</h5>
              </div>
              <p class="card-text text-muted">Various study environments including quiet zones, collaborative spaces, and private study rooms.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Silent study areas</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Group project rooms</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Bookable spaces</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Power outlets & WiFi</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Sports & Recreation -->
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="assets/images/sports.jpg" class="card-img-top" alt="Sports" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-secondary bg-opacity-10 rounded p-2 me-3">
                  <i class="bi bi-trophy text-secondary" style="font-size: 1.5rem;"></i>
                </div>
                <h5 class="card-title mb-0">Sports & Recreation</h5>
              </div>
              <p class="card-text text-muted">Stay active with our sports facilities and recreational activities for a healthy work-life balance.</p>
              <ul class="list-unstyled small">
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Basketball court</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Fitness center</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Table tennis</li>
                <li class="mb-1"><i class="bi bi-check-circle text-success me-2"></i>Sports clubs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Photo Gallery -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Campus Photo Gallery</h2>
        <p class="lead text-muted">A glimpse of life at TecWorld Academy</p>
      </div>

      <div class="row g-3">
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-1.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Campus">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Main Building Entrance</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-2.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Classroom">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Smart Classrooms</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-3.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Lab">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Computer Lab</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-4.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Library">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Library Interior</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-5.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Students">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Student Collaboration</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="position-relative overflow-hidden rounded shadow" style="height: 300px;">
            <img src="assets/images/gallery-6.jpg" class="w-100 h-100 object-fit-cover hover-zoom" alt="Events">
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
              <h6 class="mb-0">Campus Events</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="gallery.php" class="btn btn-primary btn-lg">
          <i class="bi bi-images me-2"></i>View Full Gallery
        </a>
      </div>
    </div>
  </section>

  <!-- Student Testimonials -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">What Students Say</h2>
        <p class="lead text-muted">Hear from our current students about campus life</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="assets/images/student-1.jpg" alt="Student" class="rounded-circle me-3" width="60" height="60">
                <div>
                  <h6 class="mb-0">Kwame Mensah</h6>
                  <small class="text-muted">Web Development Student</small>
                </div>
              </div>
              <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
              <p class="text-muted">"The campus facilities are amazing! The computer labs have all the latest tools and the library is perfect for studying. I love the vibrant student community here."</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="assets/images/student-2.jpg" alt="Student" class="rounded-circle me-3" width="60" height="60">
            <div>
            <h6 class="mb-0">Ama Boateng</h6>
                <small class="text-muted">Data Science Student</small>
            </div>
        </div>
        <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
        </div>
            <p class="text-muted">"The Tema campus is so convenient for me. The facilities are modern and the staff is very supportive. I especially love the collaborative study spaces."</p>
        </div>
    </div>
</div>
<div class="col-lg-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <div class="d-flex align-items-center mb-3">
            <img src="assets/images/student-3.jpg" alt="Student" class="rounded-circle me-3" width="60" height="60">
            <div>
              <h6 class="mb-0">Kofi Asante</h6>
              <small class="text-muted">Cybersecurity Student</small>
            </div>
          </div>
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="text-muted">"Best decision I made! The hands-on labs and state-of-the-art equipment prepare us for real-world scenarios. Campus life is exciting too!"</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Campus Map -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Interactive Campus Map</h2>
        <p class="lead text-muted">Navigate our campus with ease</p>
      </div>
      <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card border-0 shadow">
        <div class="card-body p-0">
          <div style="height: 500px;">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.8040234!2d-0.1870!3d5.6037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzYnMTMuMyJOIDDCsDExJzEzLjIiVw!5e0!3m2!1sen!2sgh!4v1234567890" 
              width="100%" 
              height="500" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
        <div class="card-footer bg-white p-4">
          <div class="row g-3">
            <div class="col-md-6">
              <h6 class="fw-bold mb-2">Accra Campus</h6>
              <p class="small text-muted mb-2">123 Tech Street, East Legon</p>
              <a href="https://maps.google.com" target="_blank" class="btn btn-sm btn-primary">
                <i class="bi bi-map me-1"></i>Get Directions
              </a>
            </div>
            <div class="col-md-6">
              <h6 class="fw-bold mb-2">Tema Campus</h6>
              <p class="small text-muted mb-2">456 Innovation Ave, Tema</p>
              <a href="https://maps.google.com" target="_blank" class="btn btn-sm btn-success">
                <i class="bi bi-map me-1"></i>Get Directions
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Campus Map Legend -->
      <div class="card border-0 shadow mt-4">
        <div class="card-body">
          <h5 class="mb-3">Campus Map Legend</h5>
          <div class="row g-3">
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-primary rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Academic Buildings</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-success rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Computer Labs</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-info rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Library</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-warning rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Cafeteria</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-danger rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Sports Facilities</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex align-items-center">
                <div class="bg-secondary rounded-circle me-2" style="width: 15px; height: 15px;"></div>
                <small>Parking Areas</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Schedule Campus Visit -->
  <section id="schedule-visit" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Schedule Your Campus Visit</h2>
        <p class="lead text-muted">Experience TecWorld Academy in person</p>
      </div>
      <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card border-0 shadow">
        <div class="card-body p-5">
          <div class="alert alert-info mb-4">
            <i class="bi bi-info-circle me-2"></i>Campus tours are available Monday to Saturday. Book your slot at least 2 days in advance.
          </div>

          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">First Name *</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Last Name *</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number *</label>
                <input type="tel" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Select Campus *</label>
                <select class="form-select" required>
                  <option value="">Choose campus...</option>
                  <option>Accra Campus (East Legon)</option>
                  <option>Tema Campus</option>
                  <option>Both Campuses</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Visit Type *</label>
                <select class="form-select" required>
                  <option value="">Choose visit type...</option>
                  <option>General Campus Tour</option>
                  <option>Program-Specific Tour</option>
                  <option>Parent & Student Tour</option>
                  <option>International Student Tour</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Preferred Date *</label>
                <input type="date" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Preferred Time *</label>
                <select class="form-select" required>
                  <option value="">Select time...</option>
                  <option>9:00 AM - 10:30 AM</option>
                  <option>11:00 AM - 12:30 PM</option>
                  <option>2:00 PM - 3:30 PM</option>
                  <option>4:00 PM - 5:30 PM</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Number of Guests</label>
                <select class="form-select">
                  <option>Just me</option>
                  <option>2 people</option>
                  <option>3 people</option>
                  <option>4 people</option>
                  <option>5+ people</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Program of Interest</label>
                <select class="form-select">
                  <option value="">Select program...</option>
                  <option>Web Development</option>
                  <option>Data Analytics</option>
                  <option>Cybersecurity</option>
                  <option>AI & Machine Learning</option>
                  <option>Digital Marketing</option>
                  <option>Cloud Computing</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Special Requests or Questions</label>
                <textarea class="form-control" rows="3" placeholder="Let us know if you have any specific areas you'd like to see or questions..."></textarea>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="parking">
                  <label class="form-check-label" for="parking">
                    I need parking information
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="accessibility">
                  <label class="form-check-label" for="accessibility">
                    I require accessibility accommodations
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="updates" checked>
                  <label class="form-check-label" for="updates">
                    Send me information about upcoming events and open days
                  </label>
                </div>
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5">
                  <i class="bi bi-calendar-check me-2"></i>Schedule My Visit
                </button>
              </div>
              <div class="col-12 text-center mt-3">
                <small class="text-muted">You'll receive a confirmation email within 24 hours</small>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Visit Options -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Other Ways to Experience Our Campus</h2>
        <p class="lead text-muted">Choose the option that works best for you</p>
      </div>
      <div class="row g-4">
    <div class="col-lg-4">
      <div class="card border-0 shadow h-100 text-center">
        <div class="card-body p-4">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-camera-video text-primary" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Virtual Tour</h4>
          <p class="text-muted mb-4">Take a 360° virtual tour from anywhere in the world. Perfect for international students or those unable to visit in person.</p>
          <a href="#virtual-tour" class="btn btn-primary">
            <i class="bi bi-play-circle me-2"></i>Start Virtual Tour
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow h-100 text-center">
        <div class="card-body p-4">
          <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-calendar-event text-success" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Open House Events</h4>
          <p class="text-muted mb-4">Join our quarterly open house events to meet faculty, current students, and explore all facilities. Next event: November 15, 2025.</p>
          <a href="events.php" class="btn btn-success">
            <i class="bi bi-calendar-plus me-2"></i>Register for Open House
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow h-100 text-center">
        <div class="card-body p-4">
          <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-telephone text-info" style="font-size: 2rem;"></i>
          </div>
          <h4 class="mb-3">Video Call Tour</h4>
          <p class="text-muted mb-4">Schedule a live video call with our admissions team for a personalized, guided campus tour with Q&A.</p>
          <a href="/contact/contact.php" class="btn btn-info">
            <i class="bi bi-camera-video me-2"></i>Schedule Video Call
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Transportation & Parking -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Getting to Campus</h2>
        <p class="lead text-muted">Transportation and parking information</p>
      </div>
      <div class="row g-4">
    <div class="col-lg-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <h4 class="mb-4"><i class="bi bi-bus-front text-primary me-2"></i>Public Transportation</h4>
          
          <div class="mb-4">
            <h6 class="fw-bold mb-2">Bus Routes to Accra Campus:</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><span class="badge bg-primary me-2">Route 12</span>From Circle to East Legon</li>
              <li class="mb-2"><span class="badge bg-primary me-2">Route 45</span>From Madina to East Legon</li>
              <li class="mb-2"><span class="badge bg-primary me-2">Route 78</span>From Airport to East Legon</li>
            </ul>
          </div>

          <div class="mb-4">
            <h6 class="fw-bold mb-2">Trotro Stations:</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-geo-alt-fill text-success me-2"></i>East Legon Junction (5 min walk)</li>
              <li class="mb-2"><i class="bi bi-geo-alt-fill text-success me-2"></i>A&C Mall Station (10 min walk)</li>
            </ul>
          </div>

          <div>
            <h6 class="fw-bold mb-2">Ride-Sharing Apps:</h6>
            <div class="d-flex gap-2 flex-wrap">
              <span class="badge bg-dark">Uber</span>
              <span class="badge bg-dark">Bolt</span>
              <span class="badge bg-dark">Yango</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card border-0 shadow h-100">
        <div class="card-body p-4">
          <h4 class="mb-4"><i class="bi bi-p-circle text-success me-2"></i>Parking Information</h4>
          
          <div class="mb-4">
            <h6 class="fw-bold mb-2">Student Parking:</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Free parking for registered students</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Parking permit required (available at registration)</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>200+ parking spaces available</li>
              <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>24/7 security surveillance</li>
            </ul>
          </div>

          <div class="mb-4">
            <h6 class="fw-bold mb-2">Visitor Parking:</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-info-circle text-info me-2"></i>Designated visitor parking available</li>
              <li class="mb-2"><i class="bi bi-info-circle text-info me-2"></i>GHS 5 per hour or GHS 20 per day</li>
              <li class="mb-2"><i class="bi bi-info-circle text-info me-2"></i>First 2 hours free for campus tours</li>
            </ul>
          </div>

          <div>
            <h6 class="fw-bold mb-2">Bicycle Parking:</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-bicycle text-primary me-2"></i>Secure bike racks at all entrances</li>
              <li class="mb-2"><i class="bi bi-bicycle text-primary me-2"></i>Covered parking available</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- FAQ Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
        <p class="lead text-muted">Everything you need to know about visiting our campus</p>
      </div>
      <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
              How long does a campus tour take?
            </button>
          </h3>
          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              A standard campus tour takes approximately 90 minutes. This includes a guided walk through all major facilities, classrooms, labs, library, cafeteria, and student areas. We also allow time for questions and answers.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
              Can I bring family members on the tour?
            </button>
          </h3>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Absolutely! We encourage prospective students to bring parents, guardians, or family members. Just let us know how many people will be joining you when you schedule your visit.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
              Do I need to book in advance?
            </button>
          </h3>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, we recommend booking at least 2 days in advance to ensure availability and proper preparation. However, we do accommodate walk-ins when possible, though availability isn't guaranteed.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
              What should I wear for the campus tour?
            </button>
          </h3>
          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Wear comfortable clothes and shoes as you'll be walking around campus. We recommend casual attire suitable for the weather. There's no dress code for campus tours.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
              Can I meet with faculty or current students?
            </button>
          </h3>
          <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes! Let us know your program of interest when booking, and we'll try to arrange a brief meeting with a faculty member or current student. During open house events, there are dedicated sessions for meeting faculty and students.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
              Is the campus accessible for people with disabilities?
            </button>
          </h3>
          <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, our campus is fully accessible with ramps, elevators, accessible restrooms, and designated parking. Please let us know if you need any specific accommodations when booking your tour.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
              Can I attend a class during my visit?
            </button>
          </h3>
          <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Subject to availability and instructor permission, we can arrange for you to sit in on a class. This must be requested in advance when scheduling your tour. Open house events also feature sample classes and workshops.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
  <!-- Call to Action -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="display-5 fw-bold mb-4">Ready to Experience TecWorld Academy?</h2>
      <p class="lead mb-4">Schedule your campus visit today and see why thousands of students choose us for their tech education.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="#schedule-visit" class="btn btn-light btn-lg px-5">
          <i class="bi bi-calendar-check me-2"></i>Schedule Campus Visit
        </a>
        <a href="/contact/contact.php" class="btn btn-outline-light btn-lg px-5">
          <i class="bi bi-telephone me-2"></i>Contact Admissions
        </a>
        <a href="/Admissions/General/admissions/admissions.php" class="btn btn-outline-light btn-lg px-5">
          <i class="bi bi-file-earmark-text me-2"></i>Apply Now
        </a>
      </div>
      <p class="mt-4 mb-0"><small>Have questions? Call us at +233 55 123 4567 or email tours@tecworldacademy.edu</small></p>
    </div>
  </section>
</div>
<style>
.hover-zoom {
  transition: transform 0.3s ease;
}

.hover-zoom:hover {
  transform: scale(1.05);
}

.object-fit-cover {
  object-fit: cover;
}
</style>
<?php
include(__DIR__ . '/../../Modals/modals/modals.php');
include(__DIR__ . '/../../includes/footer/footer.php');
?>
