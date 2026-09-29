<?php 
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php'); 
include("../includes/sidebar.php")
?>


<div class="container mt-5 mb-5">
  <!-- Header Section -->
  <div class="row mb-4">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/index/index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cookie Policy</li>
        </ol>
      </nav>
      <h1 class="display-4 mb-3"><i class="bi bi-cookie me-3"></i>Cookie Policy</h1>
      <p class="lead">This Cookie Policy explains how TecWorld Academy uses cookies and similar tracking technologies on our website.</p>
      <div class="alert alert-info">
        <i class="bi bi-info-circle-fill me-2"></i><strong>Last Updated:</strong> October 2, 2025
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="row">
    <div class="col-lg-3 mb-4">
      <!-- Side Navigation -->
      <div class="card sticky-top" style="top: 100px;">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Contents</h5>
        </div>
        <div class="list-group list-group-flush">
          <a href="#what-are-cookies" class="list-group-item list-group-item-action">What Are Cookies?</a>
          <a href="#why-we-use" class="list-group-item list-group-item-action">Why We Use Cookies</a>
          <a href="#types-of-cookies" class="list-group-item list-group-item-action">Types of Cookies</a>
          <a href="#first-party" class="list-group-item list-group-item-action">First-Party Cookies</a>
          <a href="#third-party" class="list-group-item list-group-item-action">Third-Party Cookies</a>
          <a href="#managing-cookies" class="list-group-item list-group-item-action">Managing Cookies</a>
          <a href="#cookie-table" class="list-group-item list-group-item-action">Cookie Details</a>
          <a href="#consent" class="list-group-item list-group-item-action">Your Consent</a>
          <a href="#contact" class="list-group-item list-group-item-action">Contact Us</a>
        </div>
      </div>
    </div>

    <div class="col-lg-9">
      <!-- What Are Cookies -->
      <section id="what-are-cookies" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-question-circle-fill text-primary me-2"></i>What Are Cookies?</h2>
            <p>Cookies are small text files that are placed on your computer, smartphone, or other device when you visit a website. They are widely used to make websites work more efficiently and provide information to website owners.</p>
            
            <div class="alert alert-light border">
              <h5><i class="bi bi-lightbulb me-2"></i>How Cookies Work</h5>
              <p class="mb-0">When you visit our website, we may place cookies on your device. These cookies contain information such as:</p>
              <ul class="mt-2 mb-0">
                <li>Your preferences and settings</li>
                <li>Login information (if you have an account)</li>
                <li>Shopping cart contents</li>
                <li>Pages you've visited</li>
                <li>Language preferences</li>
              </ul>
            </div>

            <h5 class="mt-4">Other Tracking Technologies</h5>
            <p>In addition to cookies, we may also use similar technologies such as:</p>
            <ul>
              <li><strong>Web Beacons:</strong> Small graphic images (also known as "pixel tags" or "clear GIFs") that may be included on our website and emails</li>
              <li><strong>Local Storage:</strong> Technology that allows us to store data locally in your browser</li>
              <li><strong>Session Storage:</strong> Temporary storage that is deleted when you close your browser</li>
              <li><strong>Flash Cookies:</strong> Local shared objects used by Adobe Flash</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Why We Use Cookies -->
      <section id="why-we-use" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-gear-fill text-success me-2"></i>Why We Use Cookies</h2>
            <p>We use cookies and similar tracking technologies for several purposes:</p>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card h-100 border-success">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-speedometer2 text-success"></i> Essential Functions</h5>
                    <p class="card-text">To enable core website functionality such as page navigation, access to secure areas, and form submission.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100 border-info">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-person-check text-info"></i> User Experience</h5>
                    <p class="card-text">To remember your preferences, settings, and login information so you don't have to re-enter them.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100 border-warning">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-graph-up text-warning"></i> Analytics</h5>
                    <p class="card-text">To understand how visitors use our website, which pages are most popular, and how we can improve.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card h-100 border-danger">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-megaphone text-danger"></i> Marketing</h5>
                    <p class="card-text">To show you relevant advertisements and measure the effectiveness of our marketing campaigns.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Types of Cookies -->
      <section id="types-of-cookies" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-tags-fill text-warning me-2"></i>Types of Cookies We Use</h2>
            
            <div class="accordion" id="cookieTypesAccordion">
              <!-- Strictly Necessary -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#strictly-necessary">
                    <i class="bi bi-shield-check text-success me-2"></i>Strictly Necessary Cookies
                  </button>
                </h3>
                <div id="strictly-necessary" class="accordion-collapse collapse show" data-bs-parent="#cookieTypesAccordion">
                  <div class="accordion-body">
                    <p><strong>Purpose:</strong> These cookies are essential for the website to function properly. They enable core functionality such as security, network management, and accessibility.</p>
                    <p><strong>Can be disabled:</strong> No - these cookies are required for the website to work.</p>
                    <p><strong>Examples:</strong></p>
                    <ul>
                      <li>Session ID cookies</li>
                      <li>Authentication cookies</li>
                      <li>Security cookies</li>
                      <li>Load balancing cookies</li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Performance Cookies -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#performance">
                    <i class="bi bi-speedometer text-info me-2"></i>Performance Cookies
                  </button>
                </h3>
                <div id="performance" class="accordion-collapse collapse" data-bs-parent="#cookieTypesAccordion">
                  <div class="accordion-body">
                    <p><strong>Purpose:</strong> These cookies collect information about how visitors use our website, such as which pages are visited most often and if error messages are received.</p>
                    <p><strong>Can be disabled:</strong> Yes - through your browser settings or our cookie consent tool.</p>
                    <p><strong>Examples:</strong></p>
                    <ul>
                      <li>Google Analytics cookies</li>
                      <li>Page load time measurement</li>
                      <li>Error tracking cookies</li>
                      <li>Traffic analysis cookies</li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Functionality Cookies -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#functionality">
                    <i class="bi bi-gear text-primary me-2"></i>Functionality Cookies
                  </button>
                </h3>
                <div id="functionality" class="accordion-collapse collapse" data-bs-parent="#cookieTypesAccordion">
                  <div class="accordion-body">
                    <p><strong>Purpose:</strong> These cookies allow the website to remember choices you make (such as language, region, or theme) and provide enhanced, personalized features.</p>
                    <p><strong>Can be disabled:</strong> Yes - but disabling may affect website functionality.</p>
                    <p><strong>Examples:</strong></p>
                    <ul>
                      <li>Language preference cookies</li>
                      <li>Theme/display cookies</li>
                      <li>Video player settings</li>
                      <li>Chat widget preferences</li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Targeting/Advertising Cookies -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#targeting">
                    <i class="bi bi-bullseye text-danger me-2"></i>Targeting/Advertising Cookies
                  </button>
                </h3>
                <div id="targeting" class="accordion-collapse collapse" data-bs-parent="#cookieTypesAccordion">
                  <div class="accordion-body">
                    <p><strong>Purpose:</strong> These cookies track your browsing habits to deliver advertisements that are relevant to you and your interests. They may also limit the number of times you see an ad.</p>
                    <p><strong>Can be disabled:</strong> Yes - through your browser settings or our cookie consent tool.</p>
                    <p><strong>Examples:</strong></p>
                    <ul>
                      <li>Facebook Pixel</li>
                      <li>Google Ads cookies</li>
                      <li>Retargeting cookies</li>
                      <li>Social media cookies</li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Social Media Cookies -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#social">
                    <i class="bi bi-share text-warning me-2"></i>Social Media Cookies
                  </button>
                </h3>
                <div id="social" class="accordion-collapse collapse" data-bs-parent="#cookieTypesAccordion">
                  <div class="accordion-body">
                    <p><strong>Purpose:</strong> These cookies enable you to share content on social media platforms and may track your activity across different websites.</p>
                    <p><strong>Can be disabled:</strong> Yes - through your browser settings or our cookie consent tool.</p>
                    <p><strong>Examples:</strong></p>
                    <ul>
                      <li>Facebook "Like" button cookies</li>
                      <li>Twitter "Tweet" button cookies</li>
                      <li>LinkedIn "Share" cookies</li>
                      <li>Instagram embed cookies</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- First-Party Cookies -->
      <section id="first-party" class="mb-5">
        <div class="card border-primary">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-house-fill text-primary me-2"></i>First-Party Cookies</h2>
            <p>First-party cookies are set directly by TecWorld Academy. We have full control over these cookies and use them to:</p>
            <ul>
              <li>Remember your login credentials</li>
              <li>Store your preferences and settings</li>
              <li>Track your course progress</li>
              <li>Maintain your shopping cart</li>
              <li>Analyze website performance</li>
              <li>Prevent fraud and improve security</li>
            </ul>
            <div class="alert alert-info mt-3">
              <i class="bi bi-info-circle me-2"></i>These cookies are essential for providing you with the best possible experience on our website.
            </div>
          </div>
        </div>
      </section>

      <!-- Third-Party Cookies -->
      <section id="third-party" class="mb-5">
        <div class="card border-warning">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-link-45deg text-warning me-2"></i>Third-Party Cookies</h2>
            <p>Third-party cookies are set by external services that we use on our website. We work with the following third-party services:</p>
            
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="table-dark">
                  <tr>
                    <th>Service</th>
                    <th>Purpose</th>
                    <th>Privacy Policy</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Google Analytics</strong></td>
                    <td>Website traffic analysis and reporting</td>
                    <td><a href="https://policies.google.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>Google Ads</strong></td>
                    <td>Advertising and remarketing</td>
                    <td><a href="https://policies.google.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>Facebook Pixel</strong></td>
                    <td>Social media advertising and analytics</td>
                    <td><a href="https://www.facebook.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>YouTube</strong></td>
                    <td>Video embedding and playback</td>
                    <td><a href="https://policies.google.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>Hotjar</strong></td>
                    <td>User behavior analytics and feedback</td>
                    <td><a href="https://www.hotjar.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>Stripe</strong></td>
                    <td>Payment processing</td>
                    <td><a href="https://stripe.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>PayPal</strong></td>
                    <td>Payment processing</td>
                    <td><a href="https://www.paypal.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                  <tr>
                    <td><strong>Intercom</strong></td>
                    <td>Live chat and customer support</td>
                    <td><a href="https://www.intercom.com/privacy" target="_blank">View Policy <i class="bi bi-box-arrow-up-right"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="alert alert-warning mt-3">
              <i class="bi bi-exclamation-triangle me-2"></i><strong>Note:</strong> We do not have control over third-party cookies. Please refer to the respective privacy policies for more information.
            </div>
          </div>
        </div>
      </section>

      <!-- Managing Cookies -->
      <section id="managing-cookies" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-sliders text-success me-2"></i>Managing Your Cookie Preferences</h2>
            <p>You have several options for managing cookies:</p>

            <h5 class="mt-4"><i class="bi bi-toggles me-2"></i>Cookie Consent Tool</h5>
            <p>When you first visit our website, you'll see a cookie banner where you can accept or reject different types of cookies. You can change your preferences at any time by clicking the "Cookie Settings" link in the footer.</p>
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#cookieSettingsModal">
              <i class="bi bi-gear-fill me-2"></i>Manage Cookie Settings
            </button>

            <h5 class="mt-4"><i class="bi bi-browser-chrome me-2"></i>Browser Settings</h5>
            <p>Most web browsers allow you to control cookies through their settings. Here's how to manage cookies in popular browsers:</p>

            <div class="accordion" id="browserAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chrome">
                    <i class="bi bi-browser-chrome text-warning me-2"></i>Google Chrome
                  </button>
                </h3>
                <div id="chrome" class="accordion-collapse collapse" data-bs-parent="#browserAccordion">
                  <div class="accordion-body">
                    <ol>
                      <li>Click the three dots in the top-right corner</li>
                      <li>Go to Settings → Privacy and security → Cookies and other site data</li>
                      <li>Choose your preferred cookie settings</li>
                      <li>To delete existing cookies, click "See all cookies and site data"</li>
                    </ol>
                    <a href="https://support.google.com/chrome/answer/95647" target="_blank" class="btn btn-sm btn-outline-primary">
                      Learn More <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#firefox">
                    <i class="bi bi-browser-firefox text-danger me-2"></i>Mozilla Firefox
                  </button>
                </h3>
                <div id="firefox" class="accordion-collapse collapse" data-bs-parent="#browserAccordion">
                  <div class="accordion-body">
                    <ol>
                      <li>Click the three lines in the top-right corner</li>
                      <li>Go to Settings → Privacy & Security</li>
                      <li>Under "Cookies and Site Data," choose your preferences</li>
                      <li>Click "Manage Data" to view and delete cookies</li>
                    </ol>
                    <a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" class="btn btn-sm btn-outline-primary">
                      Learn More <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#safari">
                    <i class="bi bi-browser-safari text-info me-2"></i>Safari
                  </button>
                </h3>
                <div id="safari" class="accordion-collapse collapse" data-bs-parent="#browserAccordion">
                  <div class="accordion-body">
                    <ol>
                      <li>Click Safari in the menu bar</li>
                      <li>Go to Preferences → Privacy</li>
                      <li>Choose your cookie preferences under "Cookies and website data"</li>
                      <li>Click "Manage Website Data" to view and delete cookies</li>
                    </ol>
                    <a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471" target="_blank" class="btn btn-sm btn-outline-primary">
                      Learn More <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#edge">
                    <i class="bi bi-browser-edge text-primary me-2"></i>Microsoft Edge
                  </button>
                </h3>
                <div id="edge" class="accordion-collapse collapse" data-bs-parent="#browserAccordion">
                  <div class="accordion-body">
                    <ol>
                      <li>Click the three dots in the top-right corner</li>
                      <li>Go to Settings → Cookies and site permissions → Cookies and site data</li>
                      <li>Choose your cookie settings</li>
                      <li>Click "See all cookies and site data" to manage existing cookies</li>
                    </ol>
                    <a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" class="btn btn-sm btn-outline-primary">
                      Learn More <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="alert alert-warning mt-4">
              <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Important:</strong> Blocking all cookies may prevent some features of our website from working properly. Some pages may not display correctly, and you may not be able to access certain features.
            </div>

            <h5 class="mt-4"><i class="bi bi-shield-x me-2"></i>Do Not Track (DNT)</h5>
            <p>Some browsers have a "Do Not Track" (DNT) feature that signals to websites that you don't want to have your online activity tracked. Our website respects DNT signals for non-essential cookies.</p>

            <h5 class="mt-4"><i class="bi bi-phone me-2"></i>Mobile Devices</h5>
            <p>On mobile devices, you can typically manage cookies through your browser settings or device settings:</p>
            <ul>
              <li><strong>iOS:</strong> Settings → Safari → Block All Cookies</li>
              <li><strong>Android:</strong> Browser Settings → Site Settings → Cookies</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Cookie Table -->
      <section id="cookie-table" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-table text-info me-2"></i>Detailed Cookie Information</h2>
            <p>Below is a list of specific cookies used on our website:</p>
            
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>Cookie Name</th>
                    <th>Type</th>
                    <th>Purpose</th>
                    <th>Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><code>session_id</code></td>
                    <td><span class="badge bg-success">Necessary</span></td>
                    <td>Maintains your session state</td>
                    <td>Session</td>
                  </tr>
                  <tr>
                    <td><code>user_token</code></td>
                    <td><span class="badge bg-success">Necessary</span></td>
                    <td>Authenticates logged-in users</td>
                    <td>30 days</td>
                  </tr>
                  <tr>
                    <td><code>csrf_token</code></td>
                    <td><span class="badge bg-success">Necessary</span></td>
                    <td>Prevents cross-site request forgery</td>
                    <td>Session</td>
                  </tr>
                  <tr>
                    <td><code>cookie_consent</code></td>
                    <td><span class="badge bg-success">Necessary</span></td>
                    <td>Stores your cookie preferences</td>
                    <td>1 year</td>
                  </tr>
                  <tr>
                    <td><code>language_pref</code></td>
                    <td><span class="badge bg-primary">Functional</span></td>
                    <td>Remembers your language selection</td>
                    <td>1 year</td>
                  </tr>
                  <tr>
                    <td><code>theme_mode</code></td>
                    <td><span class="badge bg-primary">Functional</span></td>
                    <td>Stores dark/light mode preference</td>
                    <td>1 year</td>
                  </tr>
                  <tr>
                    <td><code>cart_items</code></td>
                    <td><span class="badge bg-primary">Functional</span></td>
                    <td>Maintains shopping cart contents</td>
                    <td>7 days</td>
                  </tr>
                  <tr>
                    <td><code>_ga</code></td>
                    <td><span class="badge bg-info">Analytics</span></td>
                    <td>Google Analytics - distinguishes users</td>
                    <td>2 years</td>
                  </tr>
                  <tr>
                    <td><code>_gid</code></td>
                    <td><span class="badge bg-info">Analytics</span></td>
                    <td>Google Analytics - distinguishes users</td>
                    <td>24 hours</td>
                  </tr>
                  <tr>
                    <td><code>_gat</code></td>
                    <td><span class="badge bg-info">Analytics</span></td>
                    <td>Google Analytics - throttle request rate</td>
                    <td>1 minute</td>
                  </tr>
                  <tr>
                    <td><code>_fbp</code></td>
                    <td><span class="badge bg-warning text-dark">Marketing</span></td>
                    <td>Facebook Pixel - tracks conversions</td>
                    <td>3 months</td>
                  </tr>
                  <tr>
                    <td><code>_hjid</code></td>
                    <td><span class="badge bg-info">Analytics</span></td>
                    <td>Hotjar - user identification</td>
                    <td>1 year</td>
                  </tr>
                  <tr>
                    <td><code>IDE</code></td>
                    <td><span class="badge bg-warning text-dark">Marketing</span></td>
                    <td>Google DoubleClick - ad targeting</td>
                    <td>1 year</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <!-- Your Consent -->
      <section id="consent" class="mb-5">
        <div class="card bg-light">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-hand-thumbs-up-fill text-success me-2"></i>Your Consent</h2>
            <p>By using our website, you consent to our use of cookies in accordance with this Cookie Policy. When you first visit our site, you will be presented with a cookie banner that allows you to:</p>
            <ul>
              <li>Accept all cookies</li>
              <li>Reject non-essential cookies</li>
              <li>Customize your cookie preferences</li>
            </ul>

            <h5 class="mt-4">Withdrawing Consent</h5>
            <p>You can withdraw your consent at any time by:</p>
            <ul>
              <li>Clicking the "Cookie Settings" button below</li>
              <li>Adjusting your browser settings to block cookies</li>
              <li>Deleting existing cookies from your browser</li>
            </ul>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cookieSettingsModal">
              <i class="bi bi-gear-fill me-2"></i>Update Cookie Preferences
            </button>
          </div>
        </div>
      </section>

      <!-- Updates to Policy -->
      <section id="updates" class="mb-5">
        <div class="card border-info">
        <div class="card-body">
            <h2 class="card-title"><i class="bi bi-arrow-repeat text-info me-2"></i>Updates to This Policy</h2>
            <p>We may update this Cookie Policy from time to time to reflect changes in our practices or for legal, operational, or regulatory reasons. When we make changes, we will:</p>
            <ul>
              <li>Update the "Last Updated" date at the top of this page</li>
              <li>Notify you via email if the changes are significant (if you have an account)</li>
              <li>Display a notification banner on our website</li>
            </ul>
            <p>We encourage you to review this Cookie Policy periodically to stay informed about how we use cookies.</p>
            
            <div class="alert alert-info mt-3">
              <h5><i class="bi bi-clock-history me-2"></i>Version History</h5>
              <ul class="mb-0">
                <li><strong>v3.0</strong> - October 2, 2025: Updated third-party cookie list</li>
                <li><strong>v2.5</strong> - June 15, 2025: Added mobile device instructions</li>
                <li><strong>v2.0</strong> - January 10, 2025: Enhanced cookie table details</li>
                <li><strong>v1.0</strong> - March 1, 2024: Initial publication</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Us -->
      <section id="contact" class="mb-5">
        <div class="card border-primary">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-envelope-fill text-primary me-2"></i>Contact Us About Cookies</h2>
            <p>If you have any questions about our use of cookies or this Cookie Policy, please contact us:</p>
            
            <div class="row mt-4">
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-envelope-fill text-primary" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Email</h5>
                  <p><a href="mailto:privacy@tecworldacademy.edu">privacy@tecworldacademy.edu</a></p>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-telephone-fill text-success" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Phone</h5>
                  <p><a href="tel:+233551234567">+233 55 123 4567</a></p>
                  <small class="text-muted">Mon-Fri, 8 AM - 6 PM GMT</small>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="text-center">
                  <i class="bi bi-geo-alt-fill text-danger" style="font-size: 3rem;"></i>
                  <h5 class="mt-2">Address</h5>
                  <p>Data Protection Officer<br>TecWorld Academy<br>123 Tech Street<br>Accra, Ghana</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Additional Resources -->
      <section id="resources" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-book-fill text-warning me-2"></i>Additional Resources</h2>
            <p>Learn more about cookies and online privacy:</p>
            <div class="list-group">
              <a href="https://allaboutcookies.org/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>All About Cookies - Comprehensive cookie information
              </a>
              <a href="https://www.aboutcookies.org/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>AboutCookies.org - How to control and delete cookies
              </a>
              <a href="https://ico.org.uk/for-organisations/guide-to-pecr/cookies-and-similar-technologies/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>ICO - Guide to PECR (UK)
              </a>
              <a href="https://www.youronlinechoices.com/" target="_blank" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-up-right me-2"></i>Your Online Choices - Opt-out of behavioral advertising
              </a>
              <a href="privacy.php" class="list-group-item list-group-item-action">
                <i class="bi bi-shield-lock me-2"></i>Our Privacy Policy
              </a>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>

<!-- Cookie Settings Modal -->
<div class="modal fade" id="cookieSettingsModal" tabindex="-1" aria-labelledby="cookieSettingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="cookieSettingsModalLabel">
          <i class="bi bi-cookie me-2"></i>Cookie Preferences
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>We use cookies to enhance your browsing experience and analyze our traffic. Choose which cookies you want to accept:</p>
        
        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="necessaryCookies" checked disabled>
          <label class="form-check-label" for="necessaryCookies">
            <strong>Strictly Necessary Cookies</strong> <span class="badge bg-success">Required</span>
            <p class="small text-muted mb-0">These cookies are essential for the website to function and cannot be disabled.</p>
          </label>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="functionalCookies" checked>
          <label class="form-check-label" for="functionalCookies">
            <strong>Functional Cookies</strong>
            <p class="small text-muted mb-0">Remember your preferences and settings for a better experience.</p>
          </label>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="analyticsCookies" checked>
          <label class="form-check-label" for="analyticsCookies">
            <strong>Analytics Cookies</strong>
            <p class="small text-muted mb-0">Help us understand how visitors interact with our website.</p>
          </label>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="marketingCookies">
          <label class="form-check-label" for="marketingCookies">
            <strong>Marketing Cookies</strong>
            <p class="small text-muted mb-0">Used to deliver personalized advertisements and measure campaign effectiveness.</p>
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline-primary">Reject All</button>
        <button type="button" class="btn btn-primary">Save Preferences</button>
      </div>
    </div>
  </div>
</div>

<?php
include(__DIR__ . '/../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../includes/footer/footer.php');
?>
