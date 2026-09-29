<?php
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#content" data-aos-mirror-trigger-element="#content">
  <!-- Header Section -->
  <div class="row mb-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
    <div class="col-12">
      <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/index/index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Accessibility</li>
        </ol>
      </nav>
      <h1 class="display-4 mb-3">Accessibility Statement</h1>
      <p class="lead">TecWorld Academy is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone and applying the relevant accessibility standards.</p>
      <p class="text-muted"><small>Last Updated: October 2, 2025</small></p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="row" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
    <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
      <!-- Side Navigation -->
      <div class="card sticky-top" style="top: 100px;">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Quick Links</h5>
        </div>
        <div class="list-group list-group-flush">
          <a href="#commitment" class="list-group-item list-group-item-action">Our Commitment</a>
          <a href="#standards" class="list-group-item list-group-item-action">Standards</a>
          <a href="#features" class="list-group-item list-group-item-action">Accessibility Features</a>
          <a href="#keyboard" class="list-group-item list-group-item-action">Keyboard Navigation</a>
          <a href="#screen-readers" class="list-group-item list-group-item-action">Screen Readers</a>
          <a href="#text-size" class="list-group-item list-group-item-action">Text Size & Colors</a>
          <a href="#media" class="list-group-item list-group-item-action">Media Accessibility</a>
          <a href="#feedback" class="list-group-item list-group-item-action">Feedback</a>
          <a href="#contact" class="list-group-item list-group-item-action">Contact Us</a>
        </div>
      </div>
    </div>

    <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
      <!-- Our Commitment -->
      <section id="commitment" class="mb-5" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <div class="card">
          <div class="card-body" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
            <h2 class="card-title"><i class="bi bi-heart-fill text-danger me-2"></i>Our Commitment</h2>
            <p>TecWorld Academy is committed to ensuring our website is accessible to everyone, including people with disabilities. We strive to provide an inclusive learning environment where all students can access our educational resources regardless of their abilities.</p>
            <p>We believe that education should be available to all, and we are dedicated to:</p>
            <ul>
              <li>Meeting or exceeding the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA standards</li>
              <li>Continuously testing and improving our website's accessibility</li>
              <li>Training our staff on accessibility best practices</li>
              <li>Listening to feedback from users with disabilities</li>
              <li>Implementing accessibility from the start of all new projects</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Conformance Standards -->
      <section id="standards" class="mb-5" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <div class="card">
          <div class="card-body" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
            <h2 class="card-title"><i class="bi bi-check-circle-fill text-success me-2"></i>Conformance Standards</h2>
            <p>Our website aims to conform to the following accessibility standards:</p>
            <div class="row">
              <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <div class="border rounded p-3 h-100">
                  <h5><i class="bi bi-globe text-primary"></i> WCAG 2.1</h5>
                  <p>Web Content Accessibility Guidelines 2.1 Level AA compliance</p>
                </div>
              </div>
              <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <div class="border rounded p-3 h-100">
                  <h5><i class="bi bi-universal-access text-info"></i> Section 508</h5>
                  <p>U.S. Section 508 compliance standards</p>
                </div>
              </div>
              <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <div class="border rounded p-3 h-100">
                  <h5><i class="bi bi-flag text-success"></i> ADA</h5>
                  <p>Americans with Disabilities Act compliance</p>
                </div>
              </div>
              <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <div class="border rounded p-3 h-100">
                  <h5><i class="bi bi-award text-warning"></i> EN 301 549</h5>
                  <p>European accessibility standard compliance</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Accessibility Features -->
      <section id="features" class="mb-5" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <div class="card">
          <div class="card-body" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
            <h2 class="card-title"><i class="bi bi-star-fill text-warning me-2"></i>Accessibility Features</h2>
            <p>Our website includes the following accessibility features:</p>
            
            <div class="accordion" id="featuresAccordion" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#feature1">
                    <i class="bi bi-keyboard me-2"></i>Full Keyboard Navigation
                  </button>
                </h3>
                <div id="feature1" class="accordion-collapse collapse show" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    All functionality is available using only a keyboard. Users can navigate through the site using Tab, Shift+Tab, Arrow keys, Enter, and Escape keys.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature2">
                    <i class="bi bi-volume-up me-2"></i>Screen Reader Compatibility
                  </button>
                </h3>
                <div id="feature2" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    Our website is compatible with popular screen readers including JAWS, NVDA, VoiceOver, and TalkBack. All images have descriptive alt text, and complex content has appropriate ARIA labels.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature3">
                    <i class="bi bi-type me-2"></i>Adjustable Text Size
                  </button>
                </h3>
                <div id="feature3" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    Text can be resized up to 200% without loss of functionality or content. Use your browser's zoom feature (Ctrl/Cmd + or -) to adjust text size.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature4">
                    <i class="bi bi-palette me-2"></i>High Contrast Mode
                  </button>
                </h3>
                <div id="feature4" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    All text meets WCAG AA contrast ratios (4.5:1 for normal text, 3:1 for large text). High contrast themes are available for users who need enhanced visual clarity.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature5">
                    <i class="bi bi-layout-text-sidebar me-2"></i>Clear Page Structure
                  </button>
                </h3>
                <div id="feature5" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    Semantic HTML5 markup with proper heading hierarchy, landmarks, and regions to help users navigate and understand content structure.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature6">
                    <i class="bi bi-skip-forward me-2"></i>Skip Navigation Links
                  </button>
                </h3>
                <div id="feature6" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    "Skip to main content" links are provided to help keyboard and screen reader users bypass repetitive navigation elements.
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature7">
                    <i class="bi bi-card-text me-2"></i>Descriptive Links
                  </button>
                </h3>
                <div id="feature7" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    All links have clear, descriptive text that makes sense out of context. We avoid generic phrases like "click here" or "read more."
                  </div>
                </div>
              </div>

              <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feature8">
                    <i class="bi bi-table me-2"></i>Accessible Forms
                  </button>
                </h3>
                <div id="feature8" class="accordion-collapse collapse" data-bs-parent="#featuresAccordion">
                  <div class="accordion-body">
                    All form fields have clear labels, instructions, and error messages. Required fields are clearly marked, and validation messages are announced to screen readers.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Keyboard Navigation -->
      <section id="keyboard" class="mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
          <div class="card-body" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
            <h2 class="card-title"><i class="bi bi-keyboard-fill text-primary me-2"></i>Keyboard Navigation Guide</h2>
            <p>Navigate our website using only your keyboard with these shortcuts:</p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="table-dark">
                  <tr>
                    <th>Key</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><kbd>Tab</kbd></td>
                    <td>Move to the next interactive element</td>
                  </tr>
                  <tr>
                    <td><kbd>Shift</kbd> + <kbd>Tab</kbd></td>
                    <td>Move to the previous interactive element</td>
                  </tr>
                  <tr>
                    <td><kbd>Enter</kbd> or <kbd>Space</kbd></td>
                    <td>Activate buttons, links, and controls</td>
                  </tr>
                  <tr>
                    <td><kbd>Esc</kbd></td>
                    <td>Close modals and dropdown menus</td>
                  </tr>
                  <tr>
                    <td><kbd>Arrow Keys</kbd></td>
                    <td>Navigate within menus, carousels, and tabs</td>
                  </tr>
                  <tr>
                    <td><kbd>Home</kbd></td>
                    <td>Go to the beginning of a page or list</td>
                  </tr>
                  <tr>
                    <td><kbd>End</kbd></td>
                    <td>Go to the end of a page or list</td>
                  </tr>
                  <tr>
                    <td><kbd>Ctrl/Cmd</kbd> + <kbd>+</kbd></td>
                    <td>Increase text size</td>
                  </tr>
                  <tr>
                    <td><kbd>Ctrl/Cmd</kbd> + <kbd>-</kbd></td>
                    <td>Decrease text size</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <!-- Screen Reader Support -->
      <section id="screen-readers" class="mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-mic-fill text-info me-2"></i>Screen Reader Support</h2>
            <p>Our website has been tested with the following screen readers:</p>
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-windows text-primary"></i> Windows</h5>
                    <ul>
                      <li>JAWS (Job Access With Speech)</li>
                      <li>NVDA (NonVisual Desktop Access)</li>
                      <li>Narrator</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-apple"></i> macOS/iOS</h5>
                    <ul>
                      <li>VoiceOver (built-in)</li>
                      <li>Compatible with all Apple devices</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-android2 text-success"></i> Android</h5>
                    <ul>
                      <li>TalkBack (built-in)</li>
                      <li>Voice Assistant</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-browser-chrome text-warning"></i> Browser Extensions</h5>
                    <ul>
                      <li>ChromeVox</li>
                      <li>Read&Write</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Text Size and Colors -->
      <section id="text-size" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-fonts text-success me-2"></i>Text Size and Color Options</h2>
            <h5 class="mt-4">Adjusting Text Size</h5>
            <p>You can adjust the text size using your browser's built-in zoom feature:</p>
            <ul>
              <li><strong>Windows/Linux:</strong> Hold <kbd>Ctrl</kbd> and press <kbd>+</kbd> or <kbd>-</kbd></li>
              <li><strong>Mac:</strong> Hold <kbd>Cmd</kbd> and press <kbd>+</kbd> or <kbd>-</kbd></li>
              <li><strong>Mobile:</strong> Use pinch-to-zoom gesture</li>
            </ul>

            <h5 class="mt-4">Color Contrast</h5>
            <p>All text on our website meets WCAG 2.1 Level AA requirements:</p>
            <ul>
              <li>Normal text: minimum 4.5:1 contrast ratio</li>
              <li>Large text (18pt+): minimum 3:1 contrast ratio</li>
              <li>UI components: minimum 3:1 contrast ratio</li>
            </ul>

            <h5 class="mt-4">High Contrast Mode</h5>
            <p>Users can enable high contrast mode through their operating system:</p>
            <ul>
              <li><strong>Windows:</strong> Settings → Ease of Access → High contrast</li>
              <li><strong>Mac:</strong> System Preferences → Accessibility → Display → Increase contrast</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Media Accessibility -->
      <section id="media" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-play-circle-fill text-danger me-2"></i>Media Accessibility</h2>
            <p>We ensure all multimedia content is accessible:</p>
            
            <h5 class="mt-3"><i class="bi bi-camera-video me-2"></i>Video Content</h5>
            <ul>
              <li>Closed captions for all videos</li>
              <li>Transcripts available for download</li>
              <li>Audio descriptions for important visual content</li>
              <li>Keyboard-accessible video controls</li>
            </ul>

            <h5 class="mt-3"><i class="bi bi-headphones me-2"></i>Audio Content</h5>
            <ul>
              <li>Transcripts for all audio-only content</li>
              <li>Volume controls clearly labeled</li>
              <li>No auto-playing audio</li>
            </ul>

            <h5 class="mt-3"><i class="bi bi-file-earmark-pdf me-2"></i>Documents</h5>
            <ul>
              <li>PDFs are tagged for screen reader accessibility</li>
              <li>Alternative formats available upon request (Word, large print, Braille)</li>
              <li>Document structure follows accessibility guidelines</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Known Limitations -->
      <section id="limitations" class="mb-5">
        <div class="card border-warning">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>Known Limitations</h2>
            <p>We are aware of the following accessibility limitations and are actively working to address them:</p>
            <ul>
              <li>Some legacy PDF documents may not be fully accessible - we are working to remediate these</li>
              <li>Third-party embedded content may not always meet our accessibility standards</li>
              <li>Some complex interactive elements are being enhanced for better screen reader support</li>
            </ul>
            <p class="mt-3">We are committed to resolving these issues and regularly update our website to improve accessibility.</p>
          </div>
        </div>
      </section>

      <!-- Feedback -->
      <section id="feedback" class="mb-5">
        <div class="card bg-light">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-chat-left-text-fill text-primary me-2"></i>Accessibility Feedback</h2>
            <p>We welcome your feedback on the accessibility of TecWorld Academy website. Please let us know if you encounter accessibility barriers:</p>
            
            <div class="row mt-4">
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-envelope-fill text-primary" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Email Us</h5>
                  <p><a href="mailto:accessibility@tecworldacademy.edu">accessibility@tecworldacademy.edu</a></p>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-telephone-fill text-success" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Call Us</h5>
                  <p><a href="tel:+233551234567">+233 55 123 4567</a></p>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-mailbox text-info" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Mail Us</h5>
                  <p>Accessibility Department<br>123 Tech Street<br>Accra, Ghana</p>
                </div>
              </div>
            </div>

            <p class="mt-3">We try to respond to feedback within 2 business days.</p>
          </div>
        </div>
      </section>

      <!-- Contact and Support -->
      <section id="contact" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-headset text-success me-2"></i>Accessibility Support</h2>
            <p>If you need assistance accessing any content or using any features on our website, please contact our dedicated accessibility support team:</p>
            
            <div class="alert alert-info mt-3">
              <h5><i class="bi bi-info-circle-fill me-2"></i>Accommodation Requests</h5>
              <p class="mb-0">If you require specific accommodations to access our courses or services, please contact us in advance. We will work with you to provide reasonable accommodations including:</p>
              <ul class="mt-2 mb-0">
                <li>Alternative format course materials</li>
                <li>Extended time for assignments and assessments</li>
                <li>Assistive technology support</li>
                <li>Sign language interpretation (advance notice required)</li>
                <li>Note-taking services</li>
              </ul>
            </div>

            <div class="mt-4">
              <h5>Response Times</h5>
              <ul>
                <li>Critical accessibility issues: Within 24 hours</li>
                <li>General inquiries: Within 2 business days</li>
                <li>Accommodation requests: Within 3 business days</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Assessment and Audit -->
      <section id="assessment" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-clipboard-check-fill text-info me-2"></i>Accessibility Assessment</h2>
            <p>Our website undergoes regular accessibility assessments:</p>
            <ul>
              <li><strong>Last full audit:</strong> September 2025</li>
              <li><strong>Auditor:</strong> Independent third-party accessibility consultants</li>
              <li><strong>Standards tested:</strong> WCAG 2.1 Level AA</li>
              <li><strong>Next scheduled audit:</strong> March 2026</li>
            </ul>

            <h5 class="mt-4">Ongoing Testing</h5>
            <p>We continuously test our website using:</p>
            <ul>
              <li>Automated accessibility testing tools</li>
              <li>Manual testing with assistive technologies</li>
              <li>User testing with people with disabilities</li>
              <li>Regular code reviews for accessibility compliance</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- External Resources -->
      <section id="resources" class="mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#resources" data-aos-mirror-trigger-element="#resources">
        <div class="card">
          <div class="card-body" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#resources" data-aos-mirror-trigger-element="#resources" data-aos-anchor-placement="top-center">
            <h2 class="card-title"><i class="bi bi-book-fill text-warning me-2"></i>Accessibility Resources</h2>
            <p>Learn more about web accessibility:</p>
            <div class="list-group">
              <a href="https://www.w3.org/WAI/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>W3C Web Accessibility Initiative (WAI)
              </a>
              <a href="https://www.ada.gov/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>Americans with Disabilities Act (ADA)
              </a>
              <a href="https://webaim.org/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>WebAIM - Web Accessibility in Mind
              </a>
              <a href="https://www.section508.gov/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>Section 508 Resources
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Formal Complaints -->
      <section id="complaints" class="mb-5" data-aos="fade-up">
        <div class="card border-danger" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-anchor="#complaints" data-aos-mirror-trigger-element="#complaints" data-aos-anchor-placement="top-center">
          <div class="card-body" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-once="true">
            <h2 class="card-title"><i class="bi bi-exclamation-circle-fill text-danger me-2"></i>Formal Complaints Procedure</h2>
            <p>If you are not satisfied with our response to your accessibility feedback, you may file a formal complaint:</p>
            <ol>
              <li>Contact our Accessibility Coordinator in writing at <a href="mailto:accessibility@tecworldacademy.edu">accessibility@tecworldacademy.edu</a></li>
              <li>Provide details of the accessibility barrier and any previous communication</li>
              <li>We will acknowledge your complaint within 2 business days</li>
              <li>We will investigate and provide a written response within 10 business days</li>
              <li>If you remain unsatisfied, you may escalate to our Director of Student Services</li>
            </ol>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>

<?php
include(__DIR__ . '/../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../includes/footer/footer.php');
?>
