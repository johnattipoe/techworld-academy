<?php 
session_start();
include(__DIR__ . '/../includes/lang/lang.php');
include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-3">Empower Your Future with Technology</h1>
          <p class="lead mb-4">Join Ghana's premier technology academy and unlock your potential with cutting-edge courses in software development, AI, cybersecurity, and more.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="/Admissions/General/admissions/admissions.php" class="btn btn-light btn-lg px-4">Enroll Now</a>
            <a href="/Courses/courses.php" class="btn btn-outline-light btn-lg px-4">Browse Courses</a>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/main/main.png" alt="Students learning technology" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-4 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="row text-center">
        <div class="col-6 col-md-3">
          <h3 class="fw-bold text-primary">5000+</h3>
          <p class="mb-0">Students Graduated</p>
        </div>
        <div class="col-6 col-md-3">
          <h3 class="fw-bold text-primary">50+</h3>
          <p class="mb-0">Expert Instructors</p>
        </div>
        <div class="col-6 col-md-3">
          <h3 class="fw-bold text-primary">100+</h3>
          <p class="mb-0">Courses Available</p>
        </div>
        <div class="col-6 col-md-3">
          <h3 class="fw-bold text-primary">95%</h3>
          <p class="mb-0">Job Placement Rate</p>
        </div>
      </div>
    </div>
</section>

<!-- Featured Courses Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Featured Courses</h2>
        <p class="lead">Discover our most popular programs designed to prepare you for tomorrow's careers</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/project/e-commerce.jpeg" class="card-img-top" alt="Web Development">
            <div class="card-body">
              <h5 class="card-title">Full Stack Web Development</h5>
              <p class="card-text">Master modern web technologies including HTML5, CSS3, JavaScript, React, Node.js, and database management.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">6 Months</span>
                <span class="fw-bold text-success">GH₵ 2,500</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/web-dev/web-dev.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/project/sale prediction.jpeg" class="card-img-top" alt="Data Analytics">
            <div class="card-body">
              <h5 class="card-title">Data Analytics & Visualization</h5>
              <p class="card-text">Learn to analyze data, create insights, and build interactive dashboards using Python, R, and Tableau.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">4 Months</span>
                <span class="fw-bold text-success">GH₵ 2,000</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/data-analytics/data-analytics.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/cert/cert-cisco.jpeg" class="card-img-top" alt="Cybersecurity">
            <div class="card-body">
              <h5 class="card-title">Cybersecurity Fundamentals</h5>
              <p class="card-text">Protect digital assets and learn ethical hacking, network security, and risk assessment techniques.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">5 Months</span>
                <span class="fw-bold text-success">GH₵ 2,800</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Digital Skills/cybersecurity/cybersecurity.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/main/main.png" class="card-img-top" alt="AI and Machine Learning">
            <div class="card-body">
              <h5 class="card-title">AI & Machine Learning</h5>
              <p class="card-text">Dive into artificial intelligence, machine learning algorithms, and neural networks with hands-on projects.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">8 Months</span>
                <span class="fw-bold text-success">GH₵ 3,500</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/ai/ai.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/blog/career tip.jpeg" class="card-img-top" alt="Digital Marketing">
            <div class="card-body">
              <h5 class="card-title">Digital Marketing & SEO</h5>
              <p class="card-text">Master social media marketing, Google Ads, SEO strategies, and content marketing for business growth.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">3 Months</span>
                <span class="fw-bold text-success">GH₵ 1,800</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Digital Skills/marketing/marketing.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/project/fitness tracker.jpeg" class="card-img-top" alt="UX/UI Design">
            <div class="card-body">
              <h5 class="card-title">UX/UI Design</h5>
              <p class="card-text">Create engaging user experiences and beautiful interfaces using Figma, Adobe XD, and design principles.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">4 Months</span>
                <span class="fw-bold text-success">GH₵ 2,200</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/ui-ux/ui-ux.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/main/main.png" class="card-img-top" alt="Mobile App Development">
            <div class="card-body">
              <h5 class="card-title">Mobile App Development</h5>
              <p class="card-text">Build native and cross-platform mobile applications using React Native, Flutter, and modern development tools.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">6 Months</span>
                <span class="fw-bold text-success">GH₵ 2,600</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/mobile-dev/mobile-dev.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/campus/computer lab.jpeg" class="card-img-top" alt="Cloud Computing">
            <div class="card-body">
              <h5 class="card-title">Cloud Computing & DevOps</h5>
              <p class="card-text">Master AWS, Azure, Google Cloud, Docker, Kubernetes, and modern cloud infrastructure deployment strategies.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">5 Months</span>
                <span class="fw-bold text-success">GH₵ 3,000</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/cloud/cloud.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm">
            <img src="/assets/cert/cert-aws.jpeg" class="card-img-top" alt="Blockchain Development">
            <div class="card-body">
              <h5 class="card-title">Blockchain & Cryptocurrency</h5>
              <p class="card-text">Explore blockchain technology, smart contracts, DeFi, NFTs, and cryptocurrency development with Solidity.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">6 Months</span>
                <span class="fw-bold text-success">GH₵ 3,200</span>
              </div>
            </div>
            <div class="card-footer bg-transparent">
              <a href="/Courses/Technology/blockchain/blockchain.php" class="btn btn-primary w-100">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <a href="/Courses/courses.php" class="btn btn-outline-primary btn-lg">View All Courses</a>
      </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose TecWorld Academy?</h2>
        <p class="lead">We're committed to delivering world-class education that transforms careers</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-award-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Industry-Certified Programs</h5>
            <p>All our courses are designed with industry standards and provide globally recognized certifications.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-person-check-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Expert Instructors</h5>
            <p>Learn from experienced professionals who bring real-world expertise to the classroom.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-laptop-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Modern Learning Environment</h5>
            <p>State-of-the-art facilities with the latest technology and software for hands-on learning.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-briefcase-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Career Support</h5>
            <p>Comprehensive career services including job placement assistance and interview preparation.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-clock-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Flexible Learning</h5>
            <p>Choose from full-time, part-time, weekend, and online learning options that fit your schedule.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="text-primary mb-3">
              <i class="bi bi-people-fill" style="font-size: 3rem;"></i>
            </div>
            <h5>Strong Alumni Network</h5>
            <p>Join a vibrant community of over 5,000 graduates working in top tech companies worldwide.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Learning Pathways Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Your Learning Journey</h2>
        <p class="lead">A structured path from beginner to professional</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-body text-center">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="mb-0">1</h3>
              </div>
              <h5 class="card-title">Enroll</h5>
              <p class="card-text">Choose your program and complete the simple enrollment process with our admissions team.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-body text-center">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="mb-0">2</h3>
              </div>
              <h5 class="card-title">Learn</h5>
              <p class="card-text">Engage with expert instructors through hands-on projects, practical assignments, and real-world scenarios.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-body text-center">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="mb-0">3</h3>
              </div>
              <h5 class="card-title">Build</h5>
              <p class="card-text">Create an impressive portfolio of projects that showcase your skills to potential employers.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-body text-center">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <h3 class="mb-0">4</h3>
              </div>
              <h5 class="card-title">Launch</h5>
              <p class="card-text">Graduate with certification and land your dream job with support from our career services team.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What Our Students Say</h2>
        <p class="lead">Hear from our graduates who have transformed their careers</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The Web Development program at TecWorld Academy completely changed my career. The hands-on approach and expert instructors made all the difference."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Kwame Asante.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Kwame Asante</h6>
                  <small class="text-muted">Full Stack Developer at MTN Ghana</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The Data Analytics course equipped me with practical skills that I use daily. The career support team helped me land my dream job."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Akosua Mensah.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Akosua Mensah</h6>
                  <small class="text-muted">Data Scientist at Vodafone Ghana</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The flexible learning options allowed me to study while working. The cybersecurity program is world-class and very practical."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Emmanuel Osei.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Emmanuel Osei</h6>
                  <small class="text-muted">Cybersecurity Analyst at GCB Bank</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"I transitioned from teaching to UX design thanks to TecWorld Academy. The portfolio projects helped me showcase my skills to employers."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Ama Boateng.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Ama Boateng</h6>
                  <small class="text-muted">UX Designer at Jumia Ghana</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The AI and Machine Learning course opened up amazing opportunities. Now I'm working on cutting-edge AI projects every day."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Kofi Adjei.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Kofi Adjei</h6>
                  <small class="text-muted">ML Engineer at Microsoft Ghana</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="text-warning mb-3">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="card-text">"The digital marketing course was comprehensive and practical. I now run successful campaigns for multiple clients across Africa."</p>
              <div class="d-flex align-items-center">
                <img src="/assets/person/Abena Owusu.jpeg" alt="Student" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h6 class="mb-0">Abena Owusu</h6>
                  <small class="text-muted">Digital Marketing Manager at Unilever</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Partners & Hiring Companies</h2>
        <p class="lead">Top organizations trust our graduates</p>
      </div>
      <div class="row align-items-center justify-content-center g-4">
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/mtn.jpeg" alt="MTN Ghana" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/vodafone.png" alt="Vodafone" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/Microsoft.png" alt="Microsoft" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/Google.png" alt="Google" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/IBM.png" alt="IBM" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/Jumia.jpeg" alt="Jumia" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/GCB Bank.png" alt="GCB Bank" class="img-fluid" style="max-height: 80px;">
        </div>
        <div class="col-6 col-md-3 text-center">
          <img src="/assets/parteners/Andela.jpeg" alt="Andela" class="img-fluid" style="max-height: 80px;">
        </div>
      </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-dark text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Ready to Transform Your Career?</h2>
          <p class="lead mb-0">Join thousands of successful graduates and start your journey into the tech industry today.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/Admissions/General/admissions/admissions.php" class="btn btn-light btn-lg px-5">Get Started Now</a>
        </div>
      </div>
    </div>
</section>

<!-- Upcoming Events & Workshops Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Upcoming Events & Workshops</h2>
        <p class="lead">Join our tech community events and expand your network</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Oct 15, 2025</span>
                <span class="badge bg-success">Free</span>
              </div>
              <h5 class="card-title">AI & Machine Learning Bootcamp</h5>
              <p class="card-text">A full-day intensive workshop on practical AI applications and machine learning fundamentals.</p>
              <div class="d-flex align-items-center text-muted mb-2">
                <i class="bi bi-clock me-2"></i>
                <small>9:00 AM - 5:00 PM</small>
              </div>
              <div class="d-flex align-items-center text-muted mb-3">
                <i class="bi bi-geo-alt me-2"></i>
                <small>Main Campus, Accra</small>
              </div>
              <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Oct 22, 2025</span>
                <span class="badge bg-success">Free</span>
              </div>
              <h5 class="card-title">Web Development Hackathon</h5>
              <p class="card-text">24-hour coding challenge with prizes for the best web applications. Open to all skill levels.</p>
              <div class="d-flex align-items-center text-muted mb-2">
                <i class="bi bi-clock me-2"></i>
                <small>Friday 6:00 PM - Saturday 6:00 PM</small>
              </div>
              <div class="d-flex align-items-center text-muted mb-3">
                <i class="bi bi-geo-alt me-2"></i>
                <small>Innovation Hub, Accra</small>
              </div>
              <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="badge bg-danger">Oct 28, 2025</span>
                <span class="badge bg-warning text-dark">GH₵ 50</span>
              </div>
              <h5 class="card-title">Cybersecurity Masterclass</h5>
              <p class="card-text">Learn from industry experts about the latest cybersecurity threats and defense strategies.</p>
              <div class="d-flex align-items-center text-muted mb-2">
                <i class="bi bi-clock me-2"></i>
                <small>2:00 PM - 6:00 PM</small>
              </div>
              <div class="d-flex align-items-center text-muted mb-3">
                <i class="bi bi-camera-video me-2"></i>
                <small>Online (Zoom)</small>
              </div>
              <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register Now
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/Resources/Community/events/events.php" class="btn btn-primary">View All Events</a>
      </div>
    </div>
</section>

<!-- Success Stories / Case Studies Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Success Stories</h2>
        <p class="lead">Real transformations from our graduates</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/assets/person/Sarah Adu.jpeg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Success Story">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">From Accountant to Software Engineer</h5>
                  <p class="card-text"><strong>Sarah Adu</strong> transitioned from accounting to software development in just 6 months.</p>
                  <div class="mb-2">
                    <small class="text-muted">Previous: Accountant</small><br>
                    <small class="text-success fw-bold">Current: Senior Developer at Hubtel</small>
                  </div>
                  <div class="d-flex gap-2 mb-3">
                    <span class="badge bg-info">300% Salary Increase</span>
                    <span class="badge bg-primary">6 Months</span>
                  </div>
                  <!-- Read Full Story Links -->
                  <a href="#" class="text-primary fw-semibold text-decoration-none" data-bs-toggle="modal" data-bs-target="#storySarah">
                    Read Full Story <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/assets/person/Daniel Mensah.jpeg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Success Story">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Breaking Into Data Science</h5>
                  <p class="card-text"><strong>Daniel Mensah</strong> went from unemployed graduate to data scientist at a top bank.</p>
                  <div class="mb-2">
                    <small class="text-muted">Previous: Unemployed Graduate</small><br>
                    <small class="text-success fw-bold">Current: Data Scientist at Ecobank</small>
                  </div>
                  <div class="d-flex gap-2 mb-3">
                    <span class="badge bg-info">First Tech Job</span>
                    <span class="badge bg-primary">4 Months</span>
                  </div>
                  <a href="#" class="text-primary fw-semibold text-decoration-none" data-bs-toggle="modal" data-bs-target="#storyDaniel">
                    Read Full Story <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Course Categories Filter Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Explore by Category</h2>
        <p class="lead">Find the perfect course for your career goals</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <a href="/Courses/courses.php?category=programming" class="text-decoration-none">
            <div class="card h-100 shadow-sm border-0 text-center hover-card">
              <div class="card-body">
                <div class="text-primary mb-3">
                  <i class="bi bi-code-slash" style="font-size: 3rem;"></i>
                </div>
                <h5 class="card-title">Programming</h5>
                <p class="card-text text-muted">15 Courses Available</p>
                <span class="badge bg-primary">Beginner to Advanced</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <a href="/Courses/courses.php?category=design" class="text-decoration-none">
            <div class="card h-100 shadow-sm border-0 text-center hover-card">
              <div class="card-body">
                <div class="text-primary mb-3">
                  <i class="bi bi-palette" style="font-size: 3rem;"></i>
                </div>
                <h5 class="card-title">Design</h5>
                <p class="card-text text-muted">8 Courses Available</p>
                <span class="badge bg-primary">Beginner to Advanced</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <a href="/Courses/courses.php?category=data-science" class="text-decoration-none">
            <div class="card h-100 shadow-sm border-0 text-center hover-card">
              <div class="card-body">
                <div class="text-primary mb-3">
                  <i class="bi bi-graph-up" style="font-size: 3rem;"></i>
                </div>
                <h5 class="card-title">Data Science</h5>
                <p class="card-text text-muted">12 Courses Available</p>
                <span class="badge bg-primary">Beginner to Advanced</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <a href="/Courses/courses.php?category=business" class="text-decoration-none">
            <div class="card h-100 shadow-sm border-0 text-center hover-card">
              <div class="card-body">
                <div class="text-primary mb-3">
                  <i class="bi bi-briefcase" style="font-size: 3rem;"></i>
                </div>
                <h5 class="card-title">Business & Marketing</h5>
                <p class="card-text text-muted">10 Courses Available</p>
                <span class="badge bg-primary">Beginner to Advanced</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
</section>

<!-- Live Class Schedule Preview Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Upcoming Class Intake</h2>
        <p class="lead">Secure your spot in our next batch</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Full Stack Web Development</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-calendar-event text-primary"></i>
                <strong> Start Date:</strong> November 1, 2025
              </div>
              <div class="mb-3">
                <i class="bi bi-clock text-primary"></i>
                <strong> Schedule:</strong> Mon - Fri, 6:00 PM - 9:00 PM
              </div>
              <div class="mb-3">
                <i class="bi bi-people text-primary"></i>
                <strong> Available Seats:</strong> <span class="badge bg-warning text-dark">8 / 25</span>
              </div>
              <div class="mb-3">
                <span class="badge bg-success">Weekend Option Available</span>
              </div>
              <a href="/Admissions/General/admissions/admissions.php?course=webdev" class="btn btn-primary w-100">Enroll Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Data Analytics</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-calendar-event text-primary"></i>
                <strong> Start Date:</strong> November 8, 2025
              </div>
              <div class="mb-3">
                <i class="bi bi-clock text-primary"></i>
                <strong> Schedule:</strong> Sat - Sun, 9:00 AM - 4:00 PM
              </div>
              <div class="mb-3">
                <i class="bi bi-people text-primary"></i>
                <strong> Available Seats:</strong> <span class="badge bg-success">15 / 30</span>
              </div>
              <div class="mb-3">
                <span class="badge bg-info">Online Option Available</span>
              </div>
              <a href="/Admissions/General/admissions/admissions.php?course=data" class="btn btn-primary w-100">Enroll Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-primary h-100">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Cybersecurity</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-calendar-event text-primary"></i>
                <strong> Start Date:</strong> November 15, 2025
              </div>
              <div class="mb-3">
                <i class="bi bi-clock text-primary"></i>
                <strong> Schedule:</strong> Mon - Fri, 9:00 AM - 12:00 PM
              </div>
              <div class="mb-3">
                <i class="bi bi-people text-primary"></i>
                <strong> Available Seats:</strong> <span class="badge bg-danger">3 / 20</span>
              </div>
              <div class="mb-3">
                <span class="badge bg-danger">Almost Full!</span>
              </div>
              <a href="/Admissions/General/admissions/admissions.php?course=cyber" class="btn btn-primary w-100">Enroll Now</a>
            </div>
          </div>
        </div>
      </div>
        <div class="text-center mt-5 mb-4">
        <button class="btn btn-outline-primary btn-lg px-4 py-2" data-bs-toggle="modal" data-bs-target="#scheduleModal">
          <i class="bi bi-calendar3 me-2"></i> View Full Schedule
        </button>
      </div>
      </div>
    </div>
</section>

<!-- Instructors Spotlight Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Meet Our Expert Instructors</h2>
        <p class="lead">Learn from industry professionals with years of real-world experience</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="/assets/person/Kofi Adjei.jpeg" alt="Instructor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="card-title">Dr. Kwabena Frimpong</h5>
              <p class="text-primary mb-2">AI & Machine Learning</p>
              <p class="card-text small text-muted">PhD in Computer Science, 15+ years in AI research. Former Google AI Engineer.</p>
              <div class="d-flex justify-content-center gap-2">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-github"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="/assets/person/Akosua Mensah.jpeg" alt="Instructor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="card-title">Jennifer Antwi</h5>
              <p class="text-primary mb-2">UX/UI Design</p>
              <p class="card-text small text-muted">12 years of design experience. Senior Designer at Microsoft. Adobe Certified Expert.</p>
              <div class="d-flex justify-content-center gap-2">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-dribbble"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="/assets/person/Daniel Mensah.jpeg" alt="Instructor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="card-title">Michael Osei</h5>
              <p class="text-primary mb-2">Cybersecurity Expert</p>
              <p class="card-text small text-muted">20 years in cybersecurity. CISSP Certified. Former Security Director at Vodafone.</p>
              <div class="d-flex justify-content-center gap-2">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-github"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm text-center h-100">
            <div class="card-body">
              <img src="/assets/person/Abena Owusu.jpeg" alt="Instructor" class="rounded-circle mb-3" width="120" height="120">
              <h5 class="card-title">Abena Ofosu</h5>
              <p class="text-primary mb-2">Full Stack Developer</p>
              <p class="card-text small text-muted">10 years development experience. Lead Developer at MTN. AWS Certified Solutions Architect.</p>
              <div class="d-flex justify-content-center gap-2">
                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-primary"><i class="bi bi-github"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
       <!-- Button Trigger -->
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#instructorsModal">
        <i class="bi bi-people-fill me-1"></i> Meet All Instructors
      </a>
      </div>
    </div>
</section>

<!-- Student Projects Gallery Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Student Projects Showcase</h2>
        <p class="lead">See what our students are building</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/e-commerce.jpeg" class="card-img-top" alt="Project">
            <div class="card-body">
              <span class="badge bg-primary mb-2">Web Development</span>
              <h5 class="card-title">E-Commerce Platform</h5>
              <p class="card-text small">Full-featured online marketplace with payment integration, user authentication, and admin dashboard.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">By Kofi Mensah</small>
                <div>
                  <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
                  <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/sale prediction.jpeg" class="card-img-top" alt="Project">
            <div class="card-body">
              <span class="badge bg-success mb-2">Data Science</span>
              <h5 class="card-title">Sales Prediction Dashboard</h5>
              <p class="card-text small">Interactive dashboard for sales forecasting using machine learning algorithms and real-time data visualization.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">By Ama Darko</small>
                <div>
                  <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
                  <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/project/fitness tracker.jpeg" class="card-img-top" alt="Project">
            <div class="card-body">
              <span class="badge bg-info mb-2">Mobile Development</span>
              <h5 class="card-title">Fitness Tracking App</h5>
              <p class="card-text small">Cross-platform mobile app for workout tracking, nutrition planning, and progress monitoring.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">By Yaw Boateng</small>
                <div>
                  <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
                  <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/project/projects/projects.php" class="btn btn-outline-primary">View More Projects</a>
      </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Frequently Asked Questions</h2>
        <p class="lead">Find answers to common questions about our programs</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  Do I need prior experience to enroll?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  No prior experience is required for most of our beginner courses. We offer programs for all skill levels, from complete beginners to advanced professionals looking to upskill.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  What are the payment options available?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We offer flexible payment plans including full upfront payment with discounts, monthly installments, and scholarship opportunities. You can pay via mobile money, bank transfer, or credit/debit card.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  Will I receive a certificate after completing the course?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes! Upon successful completion of your program, you'll receive an industry-recognized certificate from TecWorld Academy. Many of our courses also prepare you for international certifications.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  Can I study online or do I have to attend physically?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We offer both in-person and online learning options for most courses. You can choose the format that best fits your schedule and learning preferences.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                  Do you provide job placement assistance?
                </button>
              </h2>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely! Our career services team provides resume building, interview preparation, job matching, and direct connections with hiring companies. We have a 95% job placement rate.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                  What is the class size and schedule?
                </button>
              </h2>
              <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We maintain small class sizes (20-30 students) to ensure personalized attention. Classes are available on weekdays, weekends, and evenings to accommodate working professionals.
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <a href="/About/faq/faq.php" class="btn btn-outline-primary">View All FAQs</a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Virtual Campus Tour Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Virtual Campus Tour</h2>
        <p class="lead">Explore our state-of-the-art facilities</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <img src="/assets/campus/computer lab.jpeg" class="card-img-top" alt="Computer Lab">
            <div class="card-body">
              <h5 class="card-title">Modern Computer Labs</h5>
              <p class="card-text">Equipped with high-performance computers, dual monitors, and the latest software for optimal learning experience.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <img src="/assets/campus/classromm.jpeg" class="card-img-top" alt="Classroom">
            <div class="card-body">
              <h5 class="card-title">Interactive Classrooms</h5>
              <p class="card-text">Smart boards, projectors, and comfortable seating designed for collaborative and interactive learning sessions.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <img src="/assets/campus/library.jpeg" class="card-img-top" alt="Library">
            <div class="card-body">
              <h5 class="card-title">Resource Library</h5>
              <p class="card-text"> Extensive collection of tech books, online resources, and quiet study spaces with high-speed internet access.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <img src="/assets/campus/student lounge.jpeg" class="card-img-top" alt="Student Lounge">
            <div class="card-body">
              <h5 class="card-title">Student Lounge</h5>
              <p class="card-text">Relaxation area with gaming consoles, coffee bar, and networking spaces for students to connect and collaborate.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/campus/campus-tour/campus-tour.php" class="btn btn-primary">Take Full Virtual Tour</a>
        <a href="/campus/visit/visit.php" class="btn btn-outline-primary">Schedule Physical Visit</a>
      </div>
    </div>
</section>

<!-- Financing Options Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Flexible Payment Options</h2>
        <p class="lead">Making quality education accessible to everyone</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-cash-stack fs-3"></i>
              </div>
              <h5 class="card-title">Full Payment</h5>
              <p class="card-text">Pay upfront and save</p>
              <h3 class="text-primary fw-bold">15% OFF</h3>
              <p class="text-muted small">One-time payment discount</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-calendar-check fs-3"></i>
              </div>
              <h5 class="card-title">Installment Plan</h5>
              <p class="card-text">Split payment into installments</p>
              <h3 class="text-success fw-bold">3-6 Months</h3>
              <p class="text-muted small">Flexible monthly payments</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-trophy fs-3"></i>
              </div>
              <h5 class="card-title">Scholarships</h5>
              <p class="card-text">Merit-based funding</p>
              <h3 class="text-warning fw-bold">Up to 50%</h3>
              <p class="text-muted small">For qualifying students</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-clock-history fs-3"></i>
              </div>
              <h5 class="card-title">Early Bird</h5>
              <p class="card-text">Register early and save</p>
              <h3 class="text-info fw-bold">10% OFF</h3>
              <p class="text-muted small">Book 2 weeks in advance</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/financing/financing/financing.php" class="btn btn-primary">Learn More About Financing</a>
      </div>
    </div>
</section>

<!-- Blog/News Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Latest From Our Blog</h2>
        <p class="lead">Stay updated with tech trends and academy news</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/career tip.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-primary">Career Tips</span>
                <small class="text-muted">Sep 25, 2025</small>
              </div>
              <h5 class="card-title">10 Skills Every Developer Needs in 2025</h5>
              <p class="card-text">Discover the most in-demand technical and soft skills that will set you apart in the competitive tech job market.</p>
              <a href="/blog/blog-post 1/blog-post 1.php" class="text-primary fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/success stories.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success">Success Story</span>
                <small class="text-muted">Sep 22, 2025</small>
              </div>
              <h5 class="card-title">From Beginner to Full Stack Developer in 6 Months</h5>
              <p class="card-text">Meet Samuel, who transformed his career through dedication and our comprehensive web development program.</p>
              <a href="/blog/blog-post 2/blog-post 2.php" class="text-primary fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/cert-iso.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-info">Tech Trends</span>
                <small class="text-muted">Sep 20, 2025</small>
              </div>
              <h5 class="card-title">The Rise of AI in Ghana's Tech Industry</h5>
              <p class="card-text">Explore how artificial intelligence is reshaping Ghana's technology landscape and creating new opportunities.</p>
              <a href="/blog/blog-post 3/blog-post 3.php" class="text-primary fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/Resources/Community/blog/blog.php" class="btn btn-outline-primary">View All Articles</a>
      </div>
    </div>
</section>

<!-- Accreditations & Certifications Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Accreditations & Certifications</h2>
        <p class="lead">Globally recognized credentials</p>
      </div>
      <div class="row align-items-center g-4">
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-aws.jpeg" alt="AWS Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">AWS Authorized Training Partner</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-microsoft.png" alt="Microsoft Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">Microsoft Learn Partner</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-google.png" alt="Google Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">Google Career Certificates</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-comptia.png" alt="CompTIA Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">CompTIA Authorized Partner</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-cisco.jpeg" alt="Cisco Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">Cisco Networking Academy</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-adobe.png" alt="Adobe Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">Adobe Certified Instructor</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-ec-council.jpeg" alt="EC-Council Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">EC-Council Accredited</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6 text-center" data-aos="fade-up">
          <div class="p-3">
            <img src="/assets/cert/cert-iso.jpeg" alt="ISO Certification" class="img-fluid mb-2" style="max-height: 80px;">
            <p class="small mb-0">ISO 9001:2015 Certified</p>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Job Board Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Current Job Opportunities</h2>
        <p class="lead">Exclusive job openings for our students and alumni</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="card-title mb-1">Junior Full Stack Developer</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building"></i> MTN Ghana</p>
                </div>
                <span class="badge bg-success">Full-Time</span>
              </div>
              <p class="card-text small mb-3">We're looking for a passionate full stack developer to join our digital innovation team. Experience with React and Node.js required.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-light text-dark me-1"><i class="bi bi-geo-alt"></i> Accra</span>
                  <span class="badge bg-light text-dark"><i class="bi bi-cash"></i> GH₵ 4,000 - 6,000</span>
                </div>
                <!-- Apply Now Button (triggers modal) -->
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Jobmodal" data-job="Software Engineer">
                  Apply Now
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="card-title mb-1">Data Analyst</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building"></i> Ecobank Ghana</p>
                </div>
                <span class="badge bg-success">Full-Time</span>
              </div>
              <p class="card-text small mb-3">Join our analytics team to derive insights from customer data and help drive strategic business decisions.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-light text-dark me-1"><i class="bi bi-geo-alt"></i> Accra</span>
                  <span class="badge bg-light text-dark"><i class="bi bi-cash"></i> GH₵ 5,000 - 7,000</span>
                </div>
                <!-- Apply Now Button (triggers modal) -->
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Jobmodal" data-job="Software Engineer">
                  Apply Now
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="card-title mb-1">UX/UI Designer</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building"></i> Jumia Ghana</p>
                </div>
                <span class="badge bg-info">Contract</span>
              </div>
              <p class="card-text small mb-3">Design intuitive and beautiful user experiences for our e-commerce platform. Figma and Adobe XD proficiency required.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-light text-dark me-1"><i class="bi bi-geo-alt"></i> Remote</span>
                  <span class="badge bg-light text-dark"><i class="bi bi-cash"></i> GH₵ 3,500 - 5,500</span>
                </div>
                <!-- Apply Now Button (triggers modal) -->
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Jobmodal" data-job="Software Engineer">
                  Apply Now
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="card-title mb-1">Cybersecurity Intern</h5>
                  <p class="text-muted mb-0"><i class="bi bi-building"></i> GCB Bank</p>
                </div>
                <span class="badge bg-warning text-dark">Internship</span>
              </div>
              <p class="card-text small mb-3">6-month internship opportunity to gain hands-on experience in cybersecurity operations and threat analysis.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="badge bg-light text-dark me-1"><i class="bi bi-geo-alt"></i> Accra</span>
                  <span class="badge bg-light text-dark"><i class="bi bi-cash"></i> GH₵ 1,500 - 2,000</span>
                </div>
                <!-- Apply Now Button (triggers modal) -->
              <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Jobmodal" data-job="Software Engineer">
                Apply Now
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="job /jobs.php" class="btn btn-primary">View All Opportunities</a>
      </div>
    </div>
</section>

<!-- Alumni Network Section -->
<section class="py-5 bg-dark text-white" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Join Our Global Alumni Network</h2>
        <p class="lead">Connect with 5,000+ graduates working worldwide</p>
      </div>
      <div class="row g-4 align-items-center">
        <div class="col-lg-6" data-aos="fade-up">
          <img src="/assets/alumi/Alumni Network 1.jpeg" alt="Alumni Network" class="img-fluid rounded shadow" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <h3 class="mb-4">Alumni Benefits</h3>
          <div class="d-flex mb-3">
            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
            <div>
              <h5>Lifetime Access</h5>
              <p class="mb-0">Free access to updated course materials and resources forever</p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
            <div>
              <h5>Networking Events</h5>
              <p class="mb-0">Exclusive meetups, conferences, and social gatherings</p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
            <div>
              <h5>Job Referrals</h5>
              <p class="mb-0">Priority access to job opportunities from partner companies</p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
            <div>
              <h5>Mentorship Program</h5>
              <p class="mb-0">Get paired with senior alumni for career guidance</p>
            </div>
          </div>
          <a href="/Resources/Community/alumni/alumni.php" class="btn btn-light btn-lg mt-3">Join Alumni Network</a>
        </div>
      </div>
      <div class="row mt-5 text-center">
        <div class="col-md-3 col-6 mb-3">
          <h2 class="fw-bold">30+</h2>
          <p>Countries Worldwide</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <h2 class="fw-bold">200+</h2>
          <p>Partner Companies</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <h2 class="fw-bold">5000+</h2>
          <p>Alumni Members</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <h2 class="fw-bold">GH₵ 6.5K</h2>
          <p>Average Starting Salary</p>
        </div>
      </div>
    </div>
</section>

<!-- Learning Resources Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Free Learning Resources</h2>
        <p class="lead">Start your tech journey with our free materials</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <i class="bi bi-file-earmark-pdf text-danger fs-1 mb-3"></i>
              <h5 class="card-title">E-Books</h5>
              <p class="card-text">Download free programming guides and tutorials</p>
              <a href="/Resources/Academic/E-Books/E-Books.php" class="btn btn-outline-primary btn-sm">Browse E-Books</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <i class="bi bi-play-circle text-primary fs-1 mb-3"></i>
              <h5 class="card-title">Video Tutorials</h5>
              <p class="card-text">Watch free introductory course videos</p>
              <a href="/Resources/Academic/tutorials/tutorials.php" class="btn btn-outline-primary btn-sm">Watch Videos</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <i class="bi bi-code-square text-success fs-1 mb-3"></i>
              <h5 class="card-title">Code Samples</h5>
              <p class="card-text">Access project templates and code snippets</p>
              <a href="/Resources/Academic/Code Samples/Code Samples.php" class="btn btn-outline-primary btn-sm">Get Code</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body">
              <i class="bi bi-journal-text text-warning fs-1 mb-3"></i>
              <h5 class="card-title">Study Guides</h5>
              <p class="card-text">Download comprehensive study materials</p>
              <a href="/Resources/Academic/Study Guides/Study Guides.php" class="btn btn-outline-primary btn-sm">Get Guides</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Social Proof Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Awards & Recognition</h2>
        <p class="lead">Recognized for excellence in tech education</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="p-4">
            <i class="bi bi-trophy-fill text-warning fs-1 mb-3"></i>
            <h5>Best Tech Academy 2024</h5>
            <p class="text-muted">Ghana Education Awards</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="p-4">
            <i class="bi bi-star-fill text-warning fs-1 mb-3"></i>
            <h5>4.9/5 Rating</h5>
            <p class="text-muted">From 2,500+ Student Reviews</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="p-4">
            <i class="bi bi-award-fill text-primary fs-1 mb-3"></i>
            <h5>Innovation Award</h5>
            <p class="text-muted">West Africa Tech Summit 2024</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="p-4">
            <i class="bi bi-patch-check-fill text-success fs-1 mb-3"></i>
            <h5>Verified Partner</h5>
            <p class="text-muted">Google, Microsoft & AWS</p>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <h4 class="mb-4">As Featured In</h4>
        <div class="row justify-content-center align-items-center g-4">
          <div class="col-md-2 col-6">
            <img src="/assets/logo/BBC.png" alt="BBC" class="img-fluid grayscale" style="max-height: 40px;">
          </div>
          <div class="col-md-2 col-6">
            <img src="/assets/logo/CNN.png" alt="CNN" class="img-fluid grayscale" style="max-height: 40px;">
          </div>
          <div class="col-md-2 col-6">
            <img src="/assets/logo/TECHCHURCH.png" alt="TechCrunch" class="img-fluid grayscale" style="max-height: 40px;">
          </div>
          <div class="col-md-2 col-6">
            <img src="/assets/logo/FORBES.png" alt="Forbes" class="img-fluid grayscale" style="max-height: 40px;">
          </div>
          <div class="col-md-2 col-6">
            <img src="/assets/logo/GHANAWEB.png" alt="GhanaWeb" class="img-fluid grayscale" style="max-height: 40px;">
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Comparison Table Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why TecWorld Stands Out</h2>
        <p class="lead">See how we compare to other tech academies</p>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
          <thead class="table-primary">
            <tr>
              <th>Features</th>
              <th class="text-center">TecWorld Academy</th>
              <th class="text-center">Other Academies</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Job Placement Rate</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> 95%</td>
              <td class="text-center">60-70%</td>
            </tr>
            <tr>
              <td><strong>Industry-Certified Instructors</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> Yes</td>
              <td class="text-center"><i class="bi bi-x-circle-fill text-danger"></i> Limited</td>
            </tr>
            <tr>
              <td><strong>Hands-on Projects</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> 15+ Per Course</td>
              <td class="text-center">5-8 Per Course</td>
            </tr>
            <tr>
              <td><strong>Career Support</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> Lifetime Access</td>
              <td class="text-center">3-6 Months Only</td>
            </tr>
            <tr>
              <td><strong>Class Size</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> 20-25 Students</td>
              <td class="text-center">40-60 Students</td>
            </tr>
            <tr>
              <td><strong>Payment Plans</strong></td>
              <td class="text-center"><i class="bi bi-check-circle-fill text-success"></i> Flexible Options</td>
              <td class="text-center"><i class="bi bi-x-circle-fill text-danger"></i> Full Payment Only</td>
            </tr>
            <tr>
              <td><strong>Alumni Network</strong></td>
              <td class="text-center">
                <i class="bi bi-check-circle-fill text-success"></i> 5,000+ Worldwide
              </td>
              <td class="text-center">Limited</td>
            </tr>

            <tr>
              <td><strong>Learning Format</strong></td>
              <td class="text-center">
                <i class="bi bi-check-circle-fill text-success"></i> In-Person & Online
              </td>
              <td class="text-center">In-Person Only</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</section>

<!-- Student Support Services Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Student Support Services</h2>
        <p class="lead">We're here to support you every step of the way</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-person-heart text-primary fs-1"></i>
              </div>
              <h5 class="card-title">One-on-One Mentorship</h5>
              <p class="card-text">Get paired with industry mentors who guide you through your learning journey and career development.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-headset text-success fs-1"></i>
              </div>
              <h5 class="card-title">24/7 Technical Support</h5>
              <p class="card-text">Access round-the-clock technical assistance for any course-related questions or technical issues.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-people text-warning fs-1"></i>
              </div>
              <h5 class="card-title">Study Groups</h5>
              <p class="card-text">Join peer study groups for collaborative learning, project work, and exam preparation.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-chat-dots text-info fs-1"></i>
              </div>
              <h5 class="card-title">Career Counseling</h5>
              <p class="card-text">Receive personalized career advice, resume reviews, and interview preparation from our career experts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-book text-danger fs-1"></i>
              </div>
              <h5 class="card-title">Resource Library</h5>
              <p class="card-text">Access our extensive library of books, videos, tutorials, and documentation available 24/7.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-shield-check text-secondary fs-1"></i>
              </div>
              <h5 class="card-title">Mental Wellness Support</h5>
              <p class="card-text">Access counseling services and wellness programs to maintain healthy work-life balance during studies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Corporate Training Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7" data-aos="fade-up">
          <h2 class="fw-bold mb-4">Corporate Training Solutions</h2>
          <p class="lead mb-4">Upskill your team with customized training programs designed for businesses</p>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                  <h5>Custom Curriculum</h5>
                  <p>Tailored courses to match your business needs</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                  <h5>On-Site Training</h5>
                  <p>We come to your office location</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                  <h5>Flexible Schedule</h5>
                  <p>Training that fits your work calendar</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="d-flex">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                  <h5>Group Discounts</h5>
                  <p>Special rates for team training</p>
                </div>
              </div>
            </div>
          </div>
          <a href="/Services/Training/training/training.php" class="btn btn-light btn-lg">Request Corporate Training</a>
        </div>
        <div class="col-lg-5 text-center mt-4 mt-lg-0" data-aos="fade-up">
          <img src="/assets/about/about us.jpeg" alt="Corporate Training" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Scholarship Opportunities Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Scholarship Opportunities</h2>
        <p class="lead">Making tech education accessible to everyone</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-primary shadow-sm">
            <div class="card-header bg-primary text-white text-center">
              <h4 class="mb-0">Merit Scholarship</h4>
            </div>
            <div class="card-body text-center">
              <h2 class="text-primary fw-bold mb-3">50% OFF</h2>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>For exceptional students</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Based on entrance exam</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Academic excellence required</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Renewable each semester</li>
              </ul>
              <a href="/scholarship/scholarships/scholarships.php" class="btn btn-primary w-100">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-success shadow-sm">
            <div class="card-header bg-success text-white text-center">
              <h4 class="mb-0">Women in Tech</h4>
            </div>
            <div class="card-body text-center">
              <h2 class="text-success fw-bold mb-3">40% OFF</h2>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>For female students</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>All tech courses eligible</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mentorship included</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Limited slots available</li>
              </ul>
              <a href="/scholarship/scholarships/scholarships.php" class="btn btn-success w-100">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-warning shadow-sm">
            <div class="card-header bg-warning text-dark text-center">
              <h4 class="mb-0">Need-Based Aid</h4>
            </div>
            <div class="card-body text-center">
              <h2 class="text-warning fw-bold mb-3">30% OFF</h2>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Financial assistance</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Income verification needed</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Multiple recipients</li>
                <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Rolling applications</li>
              </ul>
              <a href="/scholarship/scholarships/scholarships.php" class="btn btn-warning w-100">Apply Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <p class="lead mb-3">Have questions about scholarships?</p>
        <a href="/contact/contact.php" class="btn btn-outline-primary">Contact Admissions</a>
      </div>
    </div>
</section>

<!-- Video Introduction Section -->
<section class="py-5" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Experience TecWorld Academy</h2>
      <p class="lead">Watch our videos to see what makes us special</p>
    </div>

    <!-- Main Intro Video -->
    <div class="row g-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#content" data-aos-mirror-trigger-element="#content" data-aos-mirror-class="aos-fade-up">
      <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="ratio ratio-16x9 shadow-lg rounded overflow-hidden">
          <video controls poster="/assets/main/main.png" class="w-100 rounded" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="text-center mt-4" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
          <h5 class="mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">Still have questions?</h5>
          <a href="/contact/contact.php" class="btn btn-primary me-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">Contact Us</a>
          <a href="/campus/campus-tour/campus-tour.php" class="btn btn-outline-primary">Schedule a Visit</a>
        </div>
      </div>
    </div>

    <!-- Sub Videos -->
    <div class="row g-4 mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
      <div class="col-lg-4" data-aos="fade-up">
        <div class="card border-0 shadow-sm" data-aos="fade-up">
          <div class="ratio ratio-16x9" data-aos="fade-up">
            <video controls poster="/assets/main/main.png" class="w-100 rounded" data-aos="fade-up">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="card-body" data-aos="fade-up">
            <h5 class="card-title">A Day in the Life</h5>
            <p class="card-text small text-muted">Experience a typical day as a TecWorld student</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up">
        <div class="card border-0 shadow-sm">
          <div class="ratio ratio-16x9">
            <video controls poster="/assets/campus/computer lab.jpeg" class="w-100 rounded">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="card-body" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
            <h5 class="card-title">Virtual Campus Tour</h5>
            <p class="card-text">Explore our state-of-the-art facilities</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up">
        <div class="card border-0 shadow-sm">
          <div class="ratio ratio-16x9">
            <video controls poster="/assets/alumi/Alumni Network.jpeg" class="w-100 rounded">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="card-body" data-aos="fade-up">
            <h5 class="card-title">Graduate Success Stories</h5>
            <p class="card-text">Hear from our successful alumni</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-6">
          <h3 class="fw-bold mb-3">Stay Updated</h3>
          <p class="mb-4">Get the latest news about new courses, events, and opportunities in the tech industry.</p>
          <form class="row g-3 justify-content-center">
            <div class="col-12 col-md-auto">
              <input type="email" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <div class="col-12 col-md-auto">
              <button type="submit" class="btn btn-light btn-lg fw-bold">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-5 bg-primary text-white text-center" data-aos="fade-up">
    <div class="container">
      <h2 class="fw-bold">Contact Us</h2>
      <p class="lead">Have questions? We'd love to hear from you!</p>
      <a href="/contact/contact.php" class="btn btn-light btn-lg px-5 mt-4">Get in Touch</a>
    </div>
</section>


<?php 
include(__DIR__ . '/../Modals/modals/modals.php');
include(__DIR__ . '/../includes/footer/footer.php');
?>