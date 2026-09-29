<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- EVENTS.PHP -->

<!-- Page Hero Section -->
<section class="bg-success text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-light text-success mb-3">Community Resources</div>
          <h1 class="display-4 fw-bold mb-3">Events & Workshops</h1>
          <p class="lead mb-4">Join our community events, workshops, hackathons, and networking sessions to connect and grow.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="#upcoming" class="btn btn-light btn-lg px-4">Upcoming Events</a>
            <a href="#past" class="btn btn-outline-light btn-lg px-4">Past Events</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Event Categories Section -->
<section class="py-4 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="?category=all" class="btn btn-success">All Events</a>
        <a href="?category=workshops" class="btn btn-outline-success">Workshops</a>
        <a href="?category=hackathons" class="btn btn-outline-success">Hackathons</a>
        <a href="?category=networking" class="btn btn-outline-success">Networking</a>
        <a href="?category=career-fairs" class="btn btn-outline-success">Career Fairs</a>
        <a href="?category=webinars" class="btn btn-outline-success">Webinars</a>
      </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-5" id="upcoming" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Upcoming Events</h2>
        <p class="lead">Register now for these exciting upcoming events</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="bg-success text-white p-4 text-center h-100 d-flex flex-column justify-content-center">
                  <h1 class="display-4 fw-bold mb-0">09</h1>
                  <p class="mb-0">NOV</p>
                  <small>2025</small>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <div class="mb-2">
                    <span class="badge bg-success">Workshop</span>
                    <span class="badge bg-warning text-dark ms-1">Free</span>
                  </div>
                  <h5 class="fw-bold mb-2">AI & Machine Learning Bootcamp</h5>
                  <p class="mb-2 small">A full-day intensive workshop on practical AI applications and machine learning fundamentals.</p>
                  <p class="mb-2"><i class="bi bi-clock text-success me-2"></i><small>9:00 AM - 5:00 PM</small></p>
                  <p class="mb-3"><i class="bi bi-geo-alt text-success me-2"></i><small>Main Campus, Accra</small></p>
                  <a href="/contact/contact.php?event=ai-bootcamp" class="btn btn-success btn-sm">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="bg-primary text-white p-4 text-center h-100 d-flex flex-column justify-content-center">
                  <h1 class="display-4 fw-bold mb-0">15</h1>
                  <p class="mb-0">NOV</p>
                  <small>2025</small>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <div class="mb-2">
                    <span class="badge bg-primary">Hackathon</span>
                    <span class="badge bg-warning text-dark ms-1">GH₵ 50</span>
                  </div>
                  <h5 class="fw-bold mb-2">Web Development Hackathon</h5>
                  <p class="mb-2 small">24-hour coding challenge with prizes for the best web applications. Open to all skill levels.</p>
                  <p class="mb-2"><i class="bi bi-clock text-primary me-2"></i><small>Friday 6PM - Saturday 6PM</small></p>
                  <p class="mb-3"><i class="bi bi-geo-alt text-primary me-2"></i><small>Innovation Hub, Accra</small></p>
                  <a href="/contact/contact.php?event=web-hackathon" class="btn btn-primary btn-sm">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="bg-warning text-dark p-4 text-center h-100 d-flex flex-column justify-content-center">
                  <h1 class="display-4 fw-bold mb-0">20</h1>
                  <p class="mb-0">NOV</p>
                  <small>2025</small>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <div class="mb-2">
                    <span class="badge bg-warning text-dark">Career Fair</span>
                    <span class="badge bg-success text-white ms-1">Free</span>
                  </div>
                  <h5 class="fw-bold mb-2">Tech Career Fair 2025</h5>
                  <p class="mb-2 small">Meet recruiters from 50+ companies. Bring your CV and be ready for on-the-spot interviews!</p>
                  <p class="mb-2"><i class="bi bi-clock text-warning me-2"></i><small>10:00 AM - 4:00 PM</small></p>
                  <p class="mb-3"><i class="bi bi-geo-alt text-warning me-2"></i><small>Main Campus, Accra</small></p>
                  <a href="/contact/contact.php?event=career-fair" class="btn btn-warning btn-sm">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="bg-info text-white p-4 text-center h-100 d-flex flex-column justify-content-center">
                  <h1 class="display-4 fw-bold mb-0">25</h1>
                  <p class="mb-0">NOV</p>
                  <small>2025</small>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <div class="mb-2">
                    <span class="badge bg-info">Webinar</span>
                    <span class="badge bg-success text-white ms-1">Free</span>
                  </div>
                  <h5 class="fw-bold mb-2">Cybersecurity Masterclass</h5>
                  <p class="mb-2 small">Learn from industry experts about the latest cybersecurity threats and defense strategies.</p>
                  <p class="mb-2"><i class="bi bi-camera-video text-info me-2"></i><small>2:00 PM - 6:00 PM</small></p>
                  <p class="mb-3"><i class="bi bi-laptop text-info me-2"></i><small>Online (Zoom)</small></p>
                  <a href="/contact/contact.php?event=cyber-webinar" class="btn btn-info btn-sm text-white">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Event Calendar Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Event Calendar</h2>
        <p class="lead">Plan ahead with our monthly event schedule</p>
      </div>
      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Nov 9, 2025</strong></td>
                  <td>AI & Machine Learning Bootcamp</td>
                  <td><span class="badge bg-success">Workshop</span></td>
                  <td>Main Campus</td>
                  <td><a href="#" class="btn btn-sm btn-outline-success">Register</a></td>
                </tr>
                <tr>
                  <td><strong>Nov 15, 2025</strong></td>
                  <td>Web Development Hackathon</td>
                  <td><span class="badge bg-primary">Hackathon</span></td>
                  <td>Innovation Hub</td>
                  <td><a href="#" class="btn btn-sm btn-outline-primary">Register</a></td>
                </tr>
                <tr>
                  <td><strong>Nov 20, 2025</strong></td>
                  <td>Tech Career Fair 2025</td>
                  <td><span class="badge bg-warning text-dark">Career Fair</span></td>
                  <td>Main Campus</td>
                  <td><a href="#" class="btn btn-sm btn-outline-warning">Register</a></td>
                </tr>
                <tr>
                  <td><strong>Nov 25, 2025</strong></td>
                  <td>Cybersecurity Masterclass</td>
                  <td><span class="badge bg-info">Webinar</span></td>
                  <td>Online</td>
                  <td><a href="#" class="btn btn-sm btn-outline-info">Register</a></td>
                </tr>
                <tr>
                  <td><strong>Dec 5, 2025</strong></td>
                  <td>Alumni Networking Evening</td>
                  <td><span class="badge bg-secondary">Networking</span></td>
                  <td>Kumasi Campus</td>
                  <td><a href="#" class="btn btn-sm btn-outline-secondary">Register</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Past Events Section -->
<section class="py-5" id="past" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Past Events</h2>
        <p class="lead">Highlights from our recent events</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/computer%20lab.jpeg" class="card-img-top" alt="Python for Data Science Workshop">
            <div class="card-body">
              <span class="badge bg-secondary mb-2">October 15, 2025</span>
              <h5 class="fw-bold mb-2">Python for Data Science Workshop</h5>
              <p class="small mb-2">120 participants learned data analysis with Python, Pandas, and visualization libraries.</p>
              <a href="#" class="btn btn-sm btn-outline-secondary">View Gallery</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/classromm.jpeg" class="card-img-top" alt="Mobile App Hackathon">
            <div class="card-body">
              <span class="badge bg-secondary mb-2">October 8, 2025</span>
              <h5 class="fw-bold mb-2">Mobile App Hackathon</h5>
              <p class="small mb-2">50 developers competed in 24-hour challenge to build innovative mobile applications.</p>
              <a href="#" class="btn btn-sm btn-outline-secondary">View Gallery</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/student%20lounge.jpeg" class="card-img-top" alt="Tech Startup Pitch Night">
            <div class="card-body">
              <span class="badge bg-secondary mb-2">September 28, 2025</span>
              <h5 class="fw-bold mb-2">Tech Startup Pitch Night</h5>
              <p class="small mb-2">10 student startups pitched to investors and industry leaders for funding opportunities.</p>
              <a href="#" class="btn btn-sm btn-outline-secondary">View Gallery</a>
            </div>
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
          <h2 class="fw-bold mb-3">Don't Miss Out on Future Events</h2>
          <p class="lead mb-0">Subscribe to get notified about upcoming workshops, hackathons, and networking events.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php" class="btn btn-light btn-lg px-5">Subscribe</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
