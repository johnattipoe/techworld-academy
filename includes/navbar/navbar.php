<!-- Top Info Bar -->
  <div class="bg-primary text-white py-2 small">
    <div class="container d-flex flex-wrap justify-content-center justify-content-md-between align-items-center">
      <div class="mb-1 mb-md-0 text-center text-md-start" data-aos="fade-down">
        <strong>Enrollment for 2025 is now open!</strong>
        <a href="/Admissions/General/admissions/admissions.php" class="text-white fw-bold text-decoration-underline ms-1" data-aos="fade-down" data-aos-delay="200">
          Apply Today
        </a>
      </div>

      <div class="text-center">
        <span class="me-3"><i class="bi bi-telephone-fill"></i> +233 55 123 4567</span>
        <span class="me-3"><i class="bi bi-envelope-fill"></i> info@tecworldacademy.edu</span>
        <span class="me-3"><i class="bi bi-geo-alt-fill"></i> Accra, Ghana</span>
      </div>

      <div class="text-center">
        <a href="https://www.facebook.com/people/TechWorld-Academy-Solution-Hub/61581411140471/" class="text-white me-2"><i class="bi bi-facebook"></i></a>
        <a href="https://x.com/TechworldH85412" class="text-white me-2"><i class="bi bi-twitter"></i></a>
        <a href="https://www.instagram.com/techworldacademysolutionhub/" class="text-white me-2"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/company/tecworldacademy" class="text-white"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm" data-aos="fade-down" data-aos-delay="100">
    <div class="container">

      <!-- Brand / Logo -->
      <a class="navbar-brand d-flex align-items-center"  data-aos="fade-right" href="/index/index.php">
        <img src="/assets/images/logo.jpeg" alt="TecWorld Academy" height="40" class="me-2 rounded" data-aos="fade-right">
        <span class="fw-bold">TecWorld Academy</span>
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Items -->
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <!-- Home -->
          <li class="nav-item" data-aos="fade-down">
            <a class="nav-link active" aria-current="page" href="/index/index.php"><?= htmlspecialchars(tw_t('home'), ENT_QUOTES, 'UTF-8') ?></a>
          </li>

          <!-- About Dropdown -->
          <li class="nav-item dropdown" data-aos="fade-down">
            <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(tw_t('about'), ENT_QUOTES, 'UTF-8') ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
              <li><a class="dropdown-item" href="/About/about/about.php">About Us</a></li>
              <li><a class="dropdown-item" href="/About/team/team.php">Our Team</a></li>
              <li><a class="dropdown-item" href="/About/history/history.php">History</a></li>
              <li><a class="dropdown-item" href="/About/mission/mission.php">Mission & Vision</a></li>
              <li><a class="dropdown-item" href="/About/faq/faq.php">FAQs</a></li>
            </ul>
          </li>

          <!-- Courses Mega Dropdown -->
          <li class="nav-item dropdown" data-aos="fade-down">
            <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(tw_t('courses'), ENT_QUOTES, 'UTF-8') ?>
            </a>
            <div class="dropdown-menu dropdown-menu-center p-4 mx-auto" aria-labelledby="coursesDropdown" style="min-width: 800px; max-width: 1000px; max-height: 500px; overflow-y: auto; overflow-x: hidden; scrollbar-width: thin; scrollbar-color: #888 #f1f1f1;">
              <div class="row">
                <div class="col-6">
                  <h6 class="dropdown-header">Technology</h6>
                  <a class="dropdown-item" href="/Courses/Technology/web-dev/web-dev.php">Web Development</a>
                  <a class="dropdown-item" href="/Courses/Technology/software/software.php">Software Solutions</a>
                  <a class="dropdown-item" href="/Courses/Technology/data-analytics/data-analytics.php">Data Analytics</a>
                  <a class="dropdown-item" href="/Courses/Technology/ai/ai.php">Artificial Intelligence</a>
                </div>
                <div class="col-6">
                  <h6 class="dropdown-header">Digital Skills</h6>
                  <a class="dropdown-item" href="/Courses/Digital Skills/digital-skills/digital-skills.php">Digital Literacy</a>
                  <a class="dropdown-item" href="/Courses/Digital Skills/graphic-design/graphic-design.php">Graphic Design</a>
                  <a class="dropdown-item" href="/Courses/Digital Skills/marketing/marketing.php">Digital Marketing</a>
                  <a class="dropdown-item" href="/Courses/Digital Skills/cybersecurity/cybersecurity.php">Cybersecurity</a>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <h6 class="dropdown-header">Business</h6>
                  <a class="dropdown-item" href="/Courses/Business/business/business.php">Business Management</a>
                  <a class="dropdown-item" href="/Courses/Business/finance/finance.php">Financial Management</a>
                  <a class="dropdown-item" href="/Courses/Business/leadership/leadership.php">Leadership Development</a>
                  <a class="dropdown-item" href="/Courses/Business/entrepreneurship/entrepreneurship.php">Entrepreneurship</a>
                </div>
                <div class="col-6">
                  <h6 class="dropdown-header">Personal Development</h6>
                  <a class="dropdown-item" href="/Courses/Personal Development/self-development/self-development.php">Self-Development</a>
                  <a class="dropdown-item" href="/Courses/Personal Development/time-management/time-management.php">Time Management</a>
                  <a class="dropdown-item" href="/Courses/Personal Development/productivity/productivity.php">Productivity Tips</a>
                  <a class="dropdown-item" href="/Courses/Personal Development/mindfulness/mindfulness.php">Mindfulness & Meditation</a>
                </div>
              </div>
            </div>
          </li>

          <!-- Services Mega Dropdown -->
          <li class="nav-item dropdown" data-aos="fade-down">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(tw_t('services'), ENT_QUOTES, 'UTF-8') ?>
            </a>
            <div class="dropdown-menu p-4 dropdown-menu-center p-4 mx-auto" aria-labelledby="servicesDropdown" style="min-width: 800px; max-width: 1000px; max-height: 500px; overflow-y: auto; overflow-x: hidden; scrollbar-width: thin; scrollbar-color: #888 #f1f1f1;">
              <div class="row">

                <!-- IT Solutions -->
                <div class="col-6 col-md-3" data-aos="fade-right">
                  <h6 class="dropdown-header">IT Solutions</h6>
                  <a class="dropdown-item" href="/Services/IT Solutions/consulting/consulting.php">IT Consulting</a>
                  <a class="dropdown-item" href="/Services/IT Solutions/custom-software/custom-software.php">Custom Software</a>
                  <a class="dropdown-item" href="/Services/IT Solutions/outsourcing/outsourcing.php">IT Outsourcing</a>
                  <a class="dropdown-item" href="/Services/IT Solutions/infrastructure/infrastructure.php">Infrastructure Services</a>
                </div>

                <!-- Training -->
                <div class="col-6 col-md-3 mt-3 mt-md-0" data-aos="fade-left">
                  <h6 class="dropdown-header">Training</h6>
                  <a class="dropdown-item" href="/Services/Training/training/training.php">Corporate Training</a>
                  <a class="dropdown-item" href="/Services/Training/digital-workshops/digital-workshops.php">Workshops & Bootcamps</a>
                  <a class="dropdown-item" href="/Services/Training/certifications/certifications.php">Certifications</a>
                  <a class="dropdown-item" href="/Services/Training/internships/internships.php">Internship Programs</a>
                </div>

                <!-- Support -->
                <div class="col-6 col-md-3 mt-3 mt-md-0" data-aos="fade-right">
                  <h6 class="dropdown-header">Support</h6>
                  <a class="dropdown-item" href="/Services/Support/support/support.php">Tech Support</a>
                  <a class="dropdown-item" href="/Services/Support/maintenance/maintenance.php">System Maintenance</a>
                  <a class="dropdown-item" href="/Services/Support/cloud-support/cloud-support.php">Cloud Support</a>
                  <a class="dropdown-item" href="/Services/Support/security/security.php">Cybersecurity Services</a>
                </div>

                <!-- Additional Services --> 
                <div class="col-6 col-md-3 mt-3 mt-md-0" data-aos="fade-left"> 
                  <h6 class="dropdown-header">Additional Services</h6> 
                  <a class="dropdown-item" href="/Services/Additional Services/networking/networking.php">Networking Solutions</a> 
                  <a class="dropdown-item" href="/Services/Additional Services/ai-services/ai-services.php">AI & Automation</a> 
                  <a class="dropdown-item" href="/Services/Additional Services/data-mgmt/data-mgmt.php">Data Management</a> 
                  <a class="dropdown-item" href="/Services/Additional Services/business-intel/business-intel.php">Business Intelligence</a> 
                  <a class="dropdown-item" href="/Services/Additional Services/mobile-dev/mobile-dev.php">Mobile App Development</a> 
                </div>

              </div>
            </div>
          </li>

          <!-- Admissions Mega Dropdown -->
          <li class="nav-item dropdown" data-aos="fade-down" data-aos-delay="300">
            <a class="nav-link dropdown-toggle" href="#" id="admissionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(tw_t('admissions'), ENT_QUOTES, 'UTF-8') ?>
            </a>
            <div class="dropdown-menu p-3" aria-labelledby="admissionsDropdown" style="min-width:400px;">
              <div class="row">
                <!-- Column 1 -->
                <div class="col-6">
                  <h6 class="dropdown-header">General</h6>
                  <a class="dropdown-item" href="/Admissions/General/admissions/admissions.php">Overview</a>
                  <a class="dropdown-item" href="/Admissions/General/requirements/requirements.php">Requirements</a>
                  <a class="dropdown-item" href="/Admissions/General/apply/apply.php">How to Apply</a>
                  <a class="dropdown-item" href="/Admissions/General/calendar/calendar.php">Academic Calendar</a>
                </div>

                <!-- Column 2 -->
                <div class="col-6">
                  <h6 class="dropdown-header">Financial Aid</h6>
                  <a class="dropdown-item" href="/Admissions/Financial Aid/fees/fees.php">Tuition & Fees</a>
                  <a class="dropdown-item" href="/Admissions/Financial Aid/scholarships/scholarships.php">Scholarships</a>
                  <a class="dropdown-item" href="/Admissions/Financial Aid/payment/payment.php">Payment Plans</a>
                  <a class="dropdown-item" href="/Admissions/Financial Aid/support/support.php">Student Support</a>
                </div>

                <!-- Column 3 -->
                <div class="col-6 mt-3">
                  <h6 class="dropdown-header">Academic Programs</h6>
                  <a class="dropdown-item" href="/Admissions/Academic Programs/Bachelor's Degree/Bachelor's Degree.php">Bachelor's Degree</a>
                  <a class="dropdown-item" href="/Admissions/Academic Programs/Master's Degree/Master's Degree.php">Master's Degree</a>
                  <a class="dropdown-item" href="/Admissions/Academic Programs/PhD Program/PhD Program.php">PhD Program</a>
                  <a class="dropdown-item" href="/Admissions/Academic Programs/Certificate Programs/Certificate Programs.php">Certificate Programs</a>
                </div>

              </div>
            </div>
          </li>

          <!-- Resources Mega Dropdown -->
          <li class="nav-item dropdown" data-aos="fade-down" data-aos-delay="300">
            <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars(tw_t('resources'), ENT_QUOTES, 'UTF-8') ?>
            </a>
            <div class="dropdown-menu p-3" aria-labelledby="resourcesDropdown" style="min-width: 400px;">
              <div class="row">
                <div class="col-6">
                  <h6 class="dropdown-header">Academic</h6>
                  <a class="dropdown-item" href="/Resources/Academic/library/library.php">Library</a>
                  <a class="dropdown-item" href="/Resources/Academic/E-Books/E-Books.php">E-Books</a>
                  <a class="dropdown-item" href="/Resources/Academic/Code Samples/Code Samples.php">Code Samples</a>
                  <a class="dropdown-item" href="/Resources/Academic/Study Guides/Study Guides.php">Study Guides</a>
                  <a class="dropdown-item" href="/Resources/Academic/tutorials/tutorials.php">Video Tutorials</a>
                  <a class="dropdown-item" href="/Resources/Academic/support/support.php">Student Support</a>
                  <a class="dropdown-item" href="/Resources/Academic/career/career.php">Career Center</a>
                </div>
                <div class="col-6">
                  <h6 class="dropdown-header">Community</h6>
                  <a class="dropdown-item" href="/Resources/Community/blog/blog.php">Blog</a>
                  <a class="dropdown-item" href="/Resources/Community/events/events.php">Events</a>
                  <a class="dropdown-item" href="/Resources/Community/alumni/alumni.php">Alumni Network</a>
                </div>
              </div>
            </div>
          </li>

          <!-- Contact -->
          <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
            <a class="nav-link" href="/contact/contact.php"><?= htmlspecialchars(tw_t('contact'), ENT_QUOTES, 'UTF-8') ?></a>
          </li>
        </ul>
        <?php if (!empty($websiteLanguageEnabled)): ?>
        <!-- Public website language selector -->
        <div class="dropdown ms-lg-3 mt-2 mt-lg-0" data-aos="fade-down" data-aos-delay="500">
          <?php $activeLanguage = $_SESSION['lang'] ?? 'en'; ?>
          <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-label="<?= htmlspecialchars(tw_t('language'), ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars(strtoupper($activeLanguage), ENT_QUOTES, 'UTF-8') ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item<?= $activeLanguage === 'en' ? ' active' : '' ?>" lang="en" href="<?= htmlspecialchars(tw_lang_url('en'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(tw_t('english'), ENT_QUOTES, 'UTF-8') ?></a></li>
            <li><a class="dropdown-item<?= $activeLanguage === 'fr' ? ' active' : '' ?>" lang="fr" href="<?= htmlspecialchars(tw_lang_url('fr'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(tw_t('french'), ENT_QUOTES, 'UTF-8') ?></a></li>
            <li><a class="dropdown-item<?= $activeLanguage === 'es' ? ' active' : '' ?>" lang="es" href="<?= htmlspecialchars(tw_lang_url('es'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(tw_t('spanish'), ENT_QUOTES, 'UTF-8') ?></a></li>
          </ul>
        </div>
        <?php endif; ?>
        <!-- Login/Register Buttons -->
        <div class="d-flex ms-lg-3 mt-2 mt-lg-0" data-aos="fade-down" data-aos-delay="600">
          <a href="/authenication/login/login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
          <a href="/authenication/register/register.php" class="btn btn-primary btn-sm">Register</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Custom JavaScript for Navbar -->
  <script>
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navbarToggler.addEventListener('click', function() {
      navbarCollapse.classList.toggle('show');
    });
  </script>