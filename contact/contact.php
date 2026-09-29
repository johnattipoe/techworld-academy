<?php
// Load security libraries
require_once(__DIR__ . '/../utils/security/security/security.php');

// Initialize security
initSecurity();
setSecurityHeaders();

// Handle form submission
$successMessage = '';
$errorMessage = '';

if (isPostRequest()) {
    // Verify CSRF and rate limiting
    $verification = verifyFormSubmission(5, 300); // 5 attempts per 5 minutes
    
    if ($verification['success']) {
        // Sanitize input
        $data = Sanitizer::sanitizeContactForm($_POST);
        
        // Validate input
        $validationErrors = Validator::validateContactForm($data);
        
        if (empty($validationErrors)) {
            // Process the form (save to database, send email, etc.)
            // For now, we'll just show success
            $successMessage = "Thank you! Your message has been received. We'll get back to you within 24 hours.";
            
            // Destroy CSRF token after successful submission
            CSRF::destroyToken();
            
            // Log success
            logSecurityEvent('form_submission', 'Contact form submitted successfully', [
                'name' => $data['name'],
                'email' => $data['email']
            ]);
        } else {
            $errorMessage = implode('<br>', $validationErrors);
        }
    } else {
        $errorMessage = implode('<br>', $verification['errors']);
        
        // Log security event
        if (isset($verification['rate_limited'])) {
            logSecurityEvent('rate_limit', 'Contact form rate limit exceeded');
        } else {
            logSecurityEvent('csrf_fail', 'CSRF validation failed on contact form');
        }
    }
}

include(__DIR__ . '/../includes/lang/lang.php'); 
include(__DIR__ . '/../includes/header/header.php'); 
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php'); 
?>

<!-- Contact Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-3">Get in Touch</h1>
          <p class="lead mb-4">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
          <div class="d-flex flex-wrap gap-3">
            <div class="d-flex align-items-center">
              <i class="bi bi-telephone-fill fs-4 me-2"></i>
              <div>
                <small>Call Us</small><br>
                <strong>+233 XX XXX XXXX</strong>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <i class="bi bi-envelope-fill fs-4 me-2"></i>
              <div>
                <small>Email Us</small><br>
                <strong>info@tecworldacademy.com</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
          <img src="/assets/main/main.png" alt="Contact Us" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
</section>

<!-- Breadcrumb Section -->
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/index/index.php" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </div>
</nav>

<!-- Contact Information Cards -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-geo-alt-fill text-primary fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Visit Us</h5>
              <p class="card-text mb-2"><strong>Main Campus - Accra</strong></p>
              <p class="card-text text-muted">East Legon, Accra<br>Ghana</p>
              <p class="card-text mb-2 mt-3"><strong>Office Hours</strong></p>
              <p class="card-text text-muted">Monday - Friday: 8:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 3:00 PM</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-telephone-fill text-success fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Call Us</h5>
              <p class="card-text mb-2"><strong>General Inquiries</strong></p>
              <p class="card-text text-muted">+233 XX XXX XXXX</p>
              <p class="card-text mb-2 mt-3"><strong>Admissions</strong></p>
              <p class="card-text text-muted">+233 XX XXX XXXX</p>
              <p class="card-text mb-2 mt-3"><strong>WhatsApp</strong></p>
              <p class="card-text text-muted">+233 XX XXX XXXX</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm text-center">
            <div class="card-body p-4">
              <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="bi bi-envelope-fill text-warning fs-1"></i>
              </div>
              <h5 class="fw-bold mb-3">Email Us</h5>
              <p class="card-text mb-2"><strong>General Information</strong></p>
              <p class="card-text text-muted">info@tecworldacademy.com</p>
              <p class="card-text mb-2 mt-3"><strong>Admissions</strong></p>
              <p class="card-text text-muted">admissions@tecworldacademy.com</p>
              <p class="card-text mb-2 mt-3"><strong>Support</strong></p>
              <p class="card-text text-muted">support@tecworldacademy.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h2 class="fw-bold">Send Us a Message</h2>
                <p class="text-muted">Fill out the form below and we'll get back to you within 24 hours</p>
              </div>
              
              <?php if ($successMessage): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo $successMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
              <?php endif; ?>
              
              <?php if ($errorMessage): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php echo $errorMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
              <?php endif; ?>
              
              <form method="post" action="" id="contactForm">
                <?php echo CSRF::getTokenField(); ?>
                
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your full name" required maxlength="100">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="your.email@example.com" required maxlength="255">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Phone Number</label>
                    <input type="tel" name="phone" class="form-control form-control-lg" placeholder="+233 XX XXX XXXX" maxlength="20">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Subject <span class="text-danger">*</span></label>
                    <select name="subject" class="form-select form-select-lg" required>
                      <option value="">Select a subject</option>
                      <option value="General Inquiry">General Inquiry</option>
                      <option value="Admissions">Admissions</option>
                      <option value="Course Information">Course Information</option>
                      <option value="Payment & Fees">Payment & Fees</option>
                      <option value="Technical Support">Technical Support</option>
                      <option value="Partnership">Partnership Opportunities</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold">How did you hear about us?</label>
                    <select name="source" class="form-select form-select-lg">
                      <option value="">Select an option</option>
                      <option value="Google Search">Google Search</option>
                      <option value="Social Media">Social Media</option>
                      <option value="Friend/Family">Friend or Family</option>
                      <option value="Advertisement">Advertisement</option>
                      <option value="Website">Website</option>
                      <option value="Event">Event or Workshop</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold">Message <span class="text-danger">*</span></label>
                    <textarea name="message" class="form-control form-control-lg" rows="6" placeholder="Tell us more about your inquiry..." required maxlength="5000"></textarea>
                    <small class="text-muted">Maximum 5000 characters</small>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                      <label class="form-check-label" for="newsletter">
                        I would like to receive updates about courses and events
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                      <i class="bi bi-send-fill me-2"></i>Send Message
                    </button>
                  </div>
                </div>
              </form>

              <div class="text-center mt-4">
                <p class="text-muted small mb-0">
                  <i class="bi bi-shield-check text-success me-1"></i>
                  Your information is safe with us. We respect your privacy.
                </p>
                <p class="text-muted small mb-0 mt-2">
                  <i class="bi bi-lock-fill text-primary me-1"></i>
                  Protected by advanced security measures
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Department Contact Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Contact by Department</h2>
        <p class="lead">Reach out to the right team for faster assistance</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-person-badge text-primary fs-1 mb-3"></i>
              <h5 class="card-title">Admissions Office</h5>
              <p class="card-text small text-muted">Enrollment, registration, and application support</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>admissions@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-book text-success fs-1 mb-3"></i>
              <h5 class="card-title">Academic Affairs</h5>
              <p class="card-text small text-muted">Course information, curriculum, and academic support</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>academics@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-cash-stack text-warning fs-1 mb-3"></i>
              <h5 class="card-title">Finance Office</h5>
              <p class="card-text small text-muted">Fees, payment plans, and financial assistance</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>finance@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-briefcase text-info fs-1 mb-3"></i>
              <h5 class="card-title">Career Services</h5>
              <p class="card-text small text-muted">Job placement, internships, and career guidance</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>careers@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-headset text-danger fs-1 mb-3"></i>
              <h5 class="card-title">Technical Support</h5>
              <p class="card-text small text-muted">IT issues, platform access, and technical help</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>support@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-building text-secondary fs-1 mb-3"></i>
              <h5 class="card-title">Corporate Training</h5>
              <p class="card-text small text-muted">Team training and enterprise solutions</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>corporate@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-trophy text-warning fs-1 mb-3"></i>
              <h5 class="card-title">Scholarships</h5>
              <p class="card-text small text-muted">Scholarship applications and financial aid</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>scholarships@tecworld.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-handshake text-primary fs-1 mb-3"></i>
              <h5 class="card-title">Partnerships</h5>
              <p class="card-text small text-muted">Business partnerships and collaborations</p>
              <hr>
              <p class="mb-1"><i class="bi bi-telephone me-2"></i>+233 XX XXX XXXX</p>
              <p class="mb-0"><i class="bi bi-envelope me-2"></i>partnerships@tecworld.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Campus Locations Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Campus Locations</h2>
        <p class="lead">Visit us at any of our three campuses across Ghana</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/computer lab.jpeg" class="card-img-top" alt="Accra Campus">
            <div class="card-body">
              <h5 class="card-title fw-bold">Main Campus - Accra</h5>
              <p class="card-text">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                East Legon, Accra<br>
                <i class="bi bi-telephone-fill text-primary me-2"></i>
                +233 XX XXX XXXX<br>
                <i class="bi bi-clock-fill text-primary me-2"></i>
                Mon-Fri: 8AM-6PM, Sat: 9AM-3PM
              </p>
              <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary w-100">
                <i class="bi bi-map me-2"></i>Get Directions
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/library.jpeg" class="card-img-top" alt="Kumasi Campus">
            <div class="card-body">
              <h5 class="card-title fw-bold">Kumasi Campus</h5>
              <p class="card-text">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                Adum, Kumasi<br>
                <i class="bi bi-telephone-fill text-primary me-2"></i>
                +233 XX XXX XXXX<br>
                <i class="bi bi-clock-fill text-primary me-2"></i>
                Mon-Fri: 8AM-6PM, Sat: 9AM-3PM
              </p>
              <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary w-100">
                <i class="bi bi-map me-2"></i>Get Directions
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <img src="/assets/campus/student lounge.jpeg" class="card-img-top" alt="Takoradi Campus">
            <div class="card-body">
              <h5 class="card-title fw-bold">Takoradi Campus</h5>
              <p class="card-text">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                Market Circle, Takoradi<br>
                <i class="bi bi-telephone-fill text-primary me-2"></i>
                +233 XX XXX XXXX<br>
                <i class="bi bi-clock-fill text-primary me-2"></i>
                Mon-Fri: 8AM-6PM, Sat: 9AM-3PM
              </p>
              <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary w-100">
                <i class="bi bi-map me-2"></i>Get Directions
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Find Us on the Map</h2>
      <p class="lead">Main Campus - Accra</p>
    </div>
    <div class="map-container shadow rounded" style="overflow: hidden;">
      <iframe 
        src="https://maps.google.com/maps?width=100%25&amp;height=450&amp;hl=en&amp;q=Accra,%20Ghana&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" title="TecWorld Academy Location">
      </iframe>
    </div>
  </div>
</section>

<!-- Social Media Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Connect With Us</h2>
        <p class="lead">Follow us on social media for updates, tips, and student stories</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="https://facebook.com/tecworldacademy" target="_blank" class="btn btn-primary btn-lg">
              <i class="bi bi-facebook me-2"></i>Facebook
            </a>
            <a href="https://twitter.com/tecworldacademy" target="_blank" class="btn btn-info btn-lg text-white">
              <i class="bi bi-twitter me-2"></i>Twitter
            </a>
            <a href="https://instagram.com/tecworldacademy" target="_blank" class="btn btn-danger btn-lg">
              <i class="bi bi-instagram me-2"></i>Instagram
            </a>
            <a href="https://linkedin.com/company/tecworldacademy" target="_blank" class="btn btn-primary btn-lg" style="background-color: #0077b5;">
              <i class="bi bi-linkedin me-2"></i>LinkedIn
            </a>
            <a href="https://youtube.com/tecworldacademy" target="_blank" class="btn btn-danger btn-lg">
              <i class="bi bi-youtube me-2"></i>YouTube
            </a>
            <a href="https://wa.me/233XXXXXXXXX" target="_blank" class="btn btn-success btn-lg">
              <i class="bi bi-whatsapp me-2"></i>WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Frequently Asked Questions</h2>
        <p class="lead">Quick answers to common questions</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="contactFaqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#contactFaq1">
                  How quickly will I receive a response?
                </button>
              </h2>
              <div id="contactFaq1" class="accordion-collapse collapse show" data-bs-parent="#contactFaqAccordion">
                <div class="accordion-body">
                  We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly or reach out via WhatsApp.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactFaq2">
                  Can I schedule a campus tour?
                </button>
              </h2>
              <div id="contactFaq2" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                <div class="accordion-body">
                  Yes! You can schedule a campus tour by contacting our admissions office or filling out the contact form above. We offer both physical and virtual tours.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactFaq3">
                  What are your office hours?
                </button>
              </h2>
              <div id="contactFaq3" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                <div class="accordion-body">
                  Our offices are open Monday to Friday from 8:00 AM to 6:00 PM, and Saturdays from 9:00 AM to 3:00 PM. We are closed on Sundays and public holidays.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactFaq4">
                  Do you offer virtual consultations?
                </button>
              </h2>
              <div id="contactFaq4" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                <div class="accordion-body">
                  Yes, we offer virtual consultations via Zoom, Google Meet, or phone calls. Schedule an appointment through our contact form or by calling our admissions office.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactFaq5">
                  How can I speak to a course advisor?
                </button>
              </h2>
              <div id="contactFaq5" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                <div class="accordion-body">
                  You can speak to a course advisor by calling our admissions office, sending an email, or filling out the contact form with "Course Information" as your subject.
                </div>
              </div>
            </div>
          </div>
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
