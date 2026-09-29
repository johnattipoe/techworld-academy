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
          <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
        </ol>
      </nav>
      <h1 class="display-4 mb-3"><i class="bi bi-shield-lock me-3"></i>Privacy Policy</h1>
      <p class="lead">Your privacy is critically important to us. This Privacy Policy explains how TecWorld Academy collects, uses, shares, and protects your personal information.</p>
      <div class="alert alert-info">
        <div class="row">
          <div class="col-md-6">
            <i class="bi bi-info-circle-fill me-2"></i><strong>Last Updated:</strong> October 2, 2025
          </div>
          <div class="col-md-6 text-md-end">
            <i class="bi bi-calendar-check me-2"></i><strong>Effective Date:</strong> October 2, 2025
          </div>
        </div>
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
          <a href="#introduction" class="list-group-item list-group-item-action">Introduction</a>
          <a href="#info-collect" class="list-group-item list-group-item-action">Information We Collect</a>
          <a href="#how-collect" class="list-group-item list-group-item-action">How We Collect</a>
          <a href="#how-use" class="list-group-item list-group-item-action">How We Use</a>
          <a href="#sharing" class="list-group-item list-group-item-action">Information Sharing</a>
          <a href="#data-security" class="list-group-item list-group-item-action">Data Security</a>
          <a href="#data-retention" class="list-group-item list-group-item-action">Data Retention</a>
          <a href="#your-rights" class="list-group-item list-group-item-action">Your Rights</a>
          <a href="#children" class="list-group-item list-group-item-action">Children's Privacy</a>
          <a href="#international" class="list-group-item list-group-item-action">International Transfers</a>
          <a href="#updates" class="list-group-item list-group-item-action">Policy Updates</a>
          <a href="#contact" class="list-group-item list-group-item-action">Contact Us</a>
        </div>
      </div>
    </div>

    <div class="col-lg-9">
      <!-- Introduction -->
      <section id="introduction" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-info-circle-fill text-primary me-2"></i>Introduction</h2>
            <p>TecWorld Academy ("we," "us," "our") is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy describes:</p>
            <ul>
              <li>What information we collect from you</li>
              <li>How we collect that information</li>
              <li>Why we collect it</li>
              <li>How we use, share, and protect it</li>
              <li>Your rights regarding your personal information</li>
            </ul>

            <div class="alert alert-success mt-4">
              <h5><i class="bi bi-shield-check me-2"></i>Our Privacy Commitment</h5>
              <p class="mb-0">We will never sell your personal information to third parties. We only share your information as described in this policy and as necessary to provide our educational services.</p>
            </div>

            <p class="mt-3">This policy applies to all services offered by TecWorld Academy, including:</p>
            <ul>
              <li>Our website (www.tecworldacademy.edu)</li>
              <li>Mobile applications</li>
              <li>Online courses and learning platforms</li>
              <li>Student portals and dashboards</li>
              <li>Email communications</li>
              <li>Physical campus services</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Information We Collect -->
      <section id="info-collect" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-collection-fill text-success me-2"></i>Information We Collect</h2>
            <p>We collect different types of information depending on how you interact with our services:</p>

            <div class="accordion" id="infoCollectAccordion">
              <!-- Personal Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#personal-info">
                    <i class="bi bi-person-fill text-primary me-2"></i>Personal Identification Information
                  </button>
                </h3>
                <div id="personal-info" class="accordion-collapse collapse show" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We collect:</strong></p>
                    <ul>
                      <li>Full name</li>
                      <li>Email address</li>
                      <li>Phone number</li>
                      <li>Mailing address</li>
                      <li>Date of birth</li>
                      <li>Gender</li>
                      <li>Nationality</li>
                      <li>Identification documents (passport, national ID)</li>
                      <li>Photographs (for student ID cards)</li>
                    </ul>
                    <p><strong>When we collect it:</strong> During account registration, course enrollment, and application processes.</p>
                  </div>
                </div>
              </div>

              <!-- Academic Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#academic-info">
                    <i class="bi bi-mortarboard-fill text-info me-2"></i>Academic and Educational Information
                  </button>
                </h3>
                <div id="academic-info" class="accordion-collapse collapse" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We collect:</strong></p>
                    <ul>
                      <li>Previous education history</li>
                      <li>Transcripts and certificates</li>
                      <li>Course enrollment information</li>
                      <li>Academic performance and grades</li>
                      <li>Assignment submissions</li>
                      <li>Test and exam results</li>
                      <li>Attendance records</li>
                      <li>Learning progress and analytics</li>
                      <li>Course completion certificates</li>
                    </ul>
                    <p><strong>When we collect it:</strong> Throughout your enrollment and participation in our courses.</p>
                  </div>
                </div>
              </div>

              <!-- Financial Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#financial-info">
                    <i class="bi bi-credit-card-fill text-warning me-2"></i>Financial Information
                  </button>
                </h3>
                <div id="financial-info" class="accordion-collapse collapse" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We collect:</strong></p>
                    <ul>
                      <li>Payment card information (processed securely through third-party processors)</li>
                      <li>Billing address</li>
                      <li>Transaction history</li>
                      <li>Payment receipts</li>
                      <li>Refund requests</li>
                      <li>Financial aid applications</li>
                      <li>Scholarship information</li>
                    </ul>
                    <p><strong>Note:</strong> We do not store complete credit card numbers. Payment information is processed securely through PCI-DSS compliant payment processors (Stripe, PayPal).</p>
                  </div>
                </div>
              </div>

              <!-- Technical Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technical-info">
                    <i class="bi bi-laptop-fill text-success me-2"></i>Technical and Usage Information
                  </button>
                </h3>
                <div id="technical-info" class="accordion-collapse collapse" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We automatically collect:</strong></p>
                    <ul>
                      <li>IP address</li>
                      <li>Browser type and version</li>
                      <li>Operating system</li>
                      <li>Device information</li>
                      <li>Pages visited and time spent</li>
                      <li>Referring website</li>
                      <li>Clickstream data</li>
                      <li>Cookies and tracking technologies (see our <a href="cookies.php">Cookie Policy</a>)</li>
                      <li>Login times and session duration</li>
                    </ul>
                    <p><strong>Purpose:</strong> To improve our services, troubleshoot technical issues, and analyze usage patterns.</p>
                  </div>
                </div>
              </div>

              <!-- Communication Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#communication-info">
                    <i class="bi bi-chat-dots-fill text-danger me-2"></i>Communication Information
                  </button>
                </h3>
                <div id="communication-info" class="accordion-collapse collapse" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We collect:</strong></p>
                    <ul>
                      <li>Email correspondence</li>
                      <li>Live chat messages</li>
                      <li>Phone call recordings (with your consent)</li>
                      <li>Feedback and survey responses</li>
                      <li>Support ticket information</li>
                      <li>Forum and discussion board posts</li>
                      <li>Social media interactions</li>
                    </ul>
                    <p><strong>Purpose:</strong> To respond to your inquiries, provide support, and improve our services.</p>
                  </div>
                </div>
              </div>

              <!-- Employment Information -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#employment-info">
                    <i class="bi bi-briefcase-fill text-secondary me-2"></i>Employment and Career Information
                  </button>
                </h3>
                <div id="employment-info" class="accordion-collapse collapse" data-bs-parent="#infoCollectAccordion">
                  <div class="accordion-body">
                    <p><strong>We collect (if you use our career services):</strong></p>
                    <ul>
                      <li>Resume/CV</li>
                      <li>Work history</li>
                      <li>Skills and certifications</li>
                      <li>Portfolio projects</li>
                      <li>LinkedIn profile</li>
                      <li>Job preferences</li>
                      <li>Interview feedback</li>
                    </ul>
                    <p><strong>Purpose:</strong> To provide career placement services and connect you with potential employers.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- How We Collect Information -->
      <section id="how-collect" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-arrow-down-circle-fill text-info me-2"></i>How We Collect Information</h2>
            <p>We collect information through various methods:</p>

            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card h-100 border-primary">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-pencil-square text-primary"></i> Direct Collection</h5>
                    <p class="card-text">Information you provide directly when you:</p>
                    <ul class="small">
                      <li>Create an account</li>
                      <li>Enroll in courses</li>
                      <li>Fill out forms</li>
                      <li>Contact support</li>
                      <li>Participate in surveys</li>
                      <li>Attend events</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="card h-100 border-success">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-robot text-success"></i> Automated Collection</h5>
                    <p class="card-text">Information collected automatically through:</p>
                    <ul class="small">
                      <li>Cookies and tracking pixels</li>
                      <li>Log files</li>
                      <li>Analytics tools</li>
                      <li>Browser information</li>
                      <li>Device identifiers</li>
                      <li>Location data</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="card h-100 border-warning">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-people text-warning"></i> Third-Party Sources</h5>
                    <p class="card-text">Information from external sources:</p>
                    <ul class="small">
                      <li>Social media platforms (with your permission)</li>
                      <li>Previous educational institutions</li>
                      <li>Employer references</li>
                      <li>Payment processors</li>
                      <li>Marketing partners</li>
                      <li>Public databases</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="card h-100 border-danger">
                  <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-camera-video text-danger"></i> Educational Activities</h5>
                    <p class="card-text">Information from learning activities:</p>
                    <ul class="small">
                      <li>Coursework submissions</li>
                      <li>Quiz and exam responses</li>
                      <li>Discussion participation</li>
                      <li>Video recordings (if applicable)</li>
                      <li>Project submissions</li>
                      <li>Peer evaluations</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- How We Use Information -->
      <section id="how-use" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-gear-wide-connected text-warning me-2"></i>How We Use Your Information</h2>
            <p>We use the information we collect for the following purposes:</p>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="table-dark">
                  <tr>
                    <th>Purpose</th>
                    <th>Description</th>
                    <th>Legal Basis</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Provide Services</strong></td>
                    <td>Deliver educational courses, process enrollments, manage accounts</td>
                    <td>Contract Performance</td>
                  </tr>
                  <tr>
                    <td><strong>Communication</strong></td>
                    <td>Send course updates, respond to inquiries, provide support</td>
                    <td>Legitimate Interest</td>
                  </tr>
                  <tr>
                    <td><strong>Academic Records</strong></td>
                    <td>Maintain transcripts, issue certificates, track progress</td>
                    <td>Contract Performance</td>
                  </tr>
                  <tr>
                    <td><strong>Payment Processing</strong></td>
                    <td>Process tuition payments, refunds, and financial transactions</td>
                    <td>Contract Performance</td>
                  </tr>
                  <tr>
                    <td><strong>Personalization</strong></td>
                    <td>Customize learning experience, recommend courses</td>
                    <td>Legitimate Interest</td>
                  </tr>
                  <tr>
                    <td><strong>Analytics</strong></td>
                    <td>Analyze usage patterns, improve services, measure effectiveness</td>
                    <td>Legitimate Interest</td>
                  </tr>
                  <tr>
                    <td><strong>Marketing</strong></td>
                    <td>Send promotional materials, newsletters (with consent)</td>
                    <td>Consent</td>
                  </tr>
                  <tr>
                    <td><strong>Security</strong></td>
                    <td>Detect fraud, prevent unauthorized access, ensure safety</td>
                    <td>Legitimate Interest</td>
                  </tr>
                  <tr>
                    <td><strong>Legal Compliance</strong></td>
                    <td>Comply with legal obligations, respond to lawful requests</td>
                    <td>Legal Obligation</td>
                  </tr>
                  <tr>
                    <td><strong>Research</strong></td>
                    <td>Conduct educational research (with anonymized data)</td>
                    <td>Legitimate Interest</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="alert alert-info mt-3">
              <h5><i class="bi bi-info-circle me-2"></i>Marketing Communications</h5>
              <p class="mb-0">You can opt-out of marketing emails at any time by clicking the "unsubscribe" link in any promotional email or by updating your preferences in your account settings.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Information Sharing -->
      <section id="sharing" class="mb-5">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title"><i class="bi bi-share-fill text-danger me-2"></i>How We Share Your Information</h2>
            <p>We do not sell your personal information. We may share your information in the following circumstances:</p>

            <div class="accordion" id="sharingAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#service-providers">
                    <i class="bi bi-tools text-primary me-2"></i>Service Providers
                  </button>
                </h3>
                <div id="service-providers" class="accordion-collapse collapse show" data-bs-parent="#sharingAccordion">
                  <div class="accordion-body">
                    <p>We share information with third-party service providers who help us operate our business:</p>
                    <ul>
                      <li><strong>Cloud hosting providers:</strong> AWS, Google Cloud</li>
                      <li><strong>Payment processors:</strong> Stripe, PayPal, Mobile Money providers</li>
                      <li><strong>Email services:</strong> SendGrid, Mailchimp</li>
                      <li><strong>Analytics:</strong> Google Analytics, Hotjar</li>
                      <li><strong>Customer support:</strong> Intercom, Zendesk</li>
                      <li><strong>Learning Management System:</strong> Moodle, Canvas</li>
                    </ul>
                    <p>These providers are bound by confidentiality agreements and can only use your information to provide services to us.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#academic-partners">
                    <i class="bi bi-building text-success me-2"></i>Academic and Industry Partners
                  </button>
                </h3>
                <div id="academic-partners" class="accordion-collapse collapse" data-bs-parent="#sharingAccordion">
                  <div class="accordion-body">
                    <p>With your consent, we may share information with:</p>
                    <ul>
                      <li>Accreditation bodies for certification purposes</li>
                      <li>Partner universities for credit transfer</li>
                      <li>Potential employers (career services)</li>
                      <li>Industry partners for internship placements</li>
                      <li>Certification authorities (e.g., CompTIA, AWS, Microsoft)</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#legal-requirements">
                      <i class="bi bi-file-earmark-text text-warning me-2"></i>Legal Requirements
                  </button>
                </h3>
                  <div id="legal-requirements" class="accordion-collapse collapse" data-bs-parent="#sharingAccordion">
                    <div class="accordion-body">
                      <p>We may disclose your information when required by law or to:</p>
                          <ul>
                            <li>Comply with legal processes, court orders, or government requests</li>
                            <li>Enforce our Terms of Service and other agreements</li>
                            <li>Protect our rights, property, or safety</li>
                            <li>Protect the rights, property, or safety of our users</li>
                            <li>Prevent fraud or illegal activities</li>
                            <li>Respond to emergency situations</li>
                          </ul>
                      </div>
                    </div>
                  </div>
              <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#business-transfers">
                  <i class="bi bi-arrow-left-right text-danger me-2"></i>Business Transfers
                </button>
              </h3>
              <div id="business-transfers" class="accordion-collapse collapse" data-bs-parent="#sharingAccordion">
                <div class="accordion-body">
                  <p>In the event of a merger, acquisition, bankruptcy, or sale of assets, your information may be transferred to the acquiring entity. We will notify you via email and/or prominent notice on our website before your information becomes subject to a different privacy policy.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aggregated-data">
                  <i class="bi bi-bar-chart text-info me-2"></i>Aggregated and Anonymized Data
                </button>
              </h3>
              <div id="aggregated-data" class="accordion-collapse collapse" data-bs-parent="#sharingAccordion">
                <div class="accordion-body">
                  <p>We may share aggregated or anonymized information that cannot identify you individually for:</p>
                  <ul>
                    <li>Educational research and analysis</li>
                    <li>Industry reports and statistics</li>
                    <li>Marketing and promotional purposes</li>
                    <li>Service improvement initiatives</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Data Security -->
    <section id="data-security" class="mb-5">
      <div class="card border-success">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-shield-lock-fill text-success me-2"></i>Data Security</h2>
          <p>We take the security of your personal information seriously and implement industry-standard measures to protect it:</p>

          <div class="row">
            <div class="col-md-6 mb-3">
              <h5><i class="bi bi-lock-fill text-primary"></i> Technical Measures</h5>
              <ul>
                <li>SSL/TLS encryption for data in transit</li>
                <li>AES-256 encryption for data at rest</li>
                <li>Secure data centers with 24/7 monitoring</li>
                <li>Regular security audits and penetration testing</li>
                <li>Multi-factor authentication (MFA)</li>
                <li>Firewall protection and intrusion detection</li>
                <li>Regular software updates and patches</li>
              </ul>
            </div>

            <div class="col-md-6 mb-3">
              <h5><i class="bi bi-people-fill text-info"></i> Organizational Measures</h5>
              <ul>
                <li>Access controls and role-based permissions</li>
                <li>Employee training on data protection</li>
                <li>Confidentiality agreements with staff</li>
                <li>Background checks for employees</li>
                <li>Incident response procedures</li>
                <li>Data minimization practices</li>
                <li>Regular security awareness programs</li>
              </ul>
            </div>
          </div>

          <div class="alert alert-warning mt-3">
            <h5><i class="bi bi-exclamation-triangle me-2"></i>Important Notice</h5>
            <p class="mb-0">While we implement strong security measures, no method of transmission over the internet or electronic storage is 100% secure. We cannot guarantee absolute security. If you become aware of any security breach, please contact us immediately at <a href="mailto:security@tecworldacademy.edu">security@tecworldacademy.edu</a></p>
          </div>

          <h5 class="mt-4">Data Breach Notification</h5>
          <p>In the event of a data breach that affects your personal information, we will:</p>
          <ul>
            <li>Notify affected users within 72 hours of discovering the breach</li>
            <li>Report the breach to relevant regulatory authorities</li>
            <li>Provide information about the nature of the breach</li>
            <li>Offer guidance on protective measures you can take</li>
            <li>Take immediate action to prevent further unauthorized access</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Data Retention -->
    <section id="data-retention" class="mb-5">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-clock-history text-info me-2"></i>Data Retention</h2>
          <p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this policy, unless a longer retention period is required by law.</p>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>Data Type</th>
                  <th>Retention Period</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Account Information</td>
                  <td>Duration of account + 7 years</td>
                  <td>Legal and audit requirements</td>
                </tr>
                <tr>
                  <td>Academic Records</td>
                  <td>Permanent (transcripts, certificates)</td>
                  <td>Educational records regulations</td>
                </tr>
                <tr>
                  <td>Financial Records</td>
                  <td>7 years after last transaction</td>
                  <td>Tax and accounting laws</td>
                </tr>
                <tr>
                  <td>Course Content</td>
                  <td>Duration of enrollment + 3 years</td>
                  <td>Student reference and support</td>
                </tr>
                <tr>
                  <td>Communication Records</td>
                  <td>3 years</td>
                  <td>Customer service and dispute resolution</td>
                </tr>
                <tr>
                  <td>Marketing Data</td>
                  <td>Until consent withdrawn + 30 days</td>
                  <td>Respect for user preferences</td>
                </tr>
                <tr>
                  <td>Website Analytics</td>
                  <td>26 months</td>
                  <td>Service improvement</td>
                </tr>
                <tr>
                  <td>Job Application Data</td>
                  <td>2 years after application</td>
                  <td>Future opportunities</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h5 class="mt-4">Data Deletion</h5>
          <p>After the retention period expires, we will:</p>
          <ul>
            <li>Securely delete or anonymize your personal information</li>
            <li>Remove data from all active systems and backups</li>
            <li>Ensure third-party processors also delete the data</li>
            <li>Maintain only anonymized data for statistical purposes</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Your Rights -->
    <section id="your-rights" class="mb-5">
      <div class="card border-primary">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-person-check-fill text-primary me-2"></i>Your Privacy Rights</h2>
          <p>You have the following rights regarding your personal information:</p>

          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-eye text-primary"></i> Right to Access</h5>
                  <p class="card-text">Request a copy of the personal information we hold about you.</p>
                  <a href="mailto:privacy@tecworldacademy.edu?subject=Data Access Request" class="btn btn-sm btn-outline-primary">Request Access</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-pencil text-success"></i> Right to Rectification</h5>
                  <p class="card-text">Request correction of inaccurate or incomplete information.</p>
                  <a href="profile-settings.php" class="btn btn-sm btn-outline-success">Update Information</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-trash text-danger"></i> Right to Erasure</h5>
                  <p class="card-text">Request deletion of your personal information (subject to legal requirements).</p>
                  <a href="mailto:privacy@tecworldacademy.edu?subject=Data Deletion Request" class="btn btn-sm btn-outline-danger">Request Deletion</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-pause-circle text-warning"></i> Right to Restrict Processing</h5>
                  <p class="card-text">Request limitation on how we use your information.</p>
                  <a href="mailto:privacy@tecworldacademy.edu?subject=Restrict Processing" class="btn btn-sm btn-outline-warning">Request Restriction</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-download text-info"></i> Right to Data Portability</h5>
                  <p class="card-text">Receive your data in a machine-readable format.</p>
                  <a href="export-data.php" class="btn btn-sm btn-outline-info">Export Data</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-hand-thumbs-down text-secondary"></i> Right to Object</h5>
                  <p class="card-text">Object to processing for marketing or legitimate interests.</p>
                  <a href="preferences.php" class="btn btn-sm btn-outline-secondary">Manage Preferences</a>
                </div>
              </div>
            </div>
          </div>

          <div class="alert alert-info mt-4">
            <h5><i class="bi bi-info-circle me-2"></i>How to Exercise Your Rights</h5>
            <p>To exercise any of these rights:</p>
            <ol class="mb-0">
              <li>Email us at <a href="mailto:privacy@tecworldacademy.edu">privacy@tecworldacademy.edu</a> with your request</li>
              <li>Include your full name, email address, and student ID (if applicable)</li>
              <li>Specify which right you wish to exercise</li>
              <li>We will respond within 30 days</li>
            </ol>
          </div>

          <h5 class="mt-4">Filing a Complaint</h5>
          <p>If you believe we have not handled your personal information properly, you have the right to file a complaint with:</p>
          <ul>
            <li><strong>Our Data Protection Officer:</strong> <a href="mailto:dpo@tecworldacademy.edu">dpo@tecworldacademy.edu</a></li>
            <li><strong>Ghana Data Protection Commission:</strong> <a href="https://www.dataprotection.org.gh" target="_blank">www.dataprotection.org.gh</a></li>
            <li><strong>Phone:</strong> +233 302 971 170</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Children's Privacy -->
    <section id="children" class="mb-5">
      <div class="card border-warning">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-person-heart text-warning me-2"></i>Children's Privacy</h2>
          <p>Our services are not intended for children under the age of 13. We do not knowingly collect personal information from children under 13.</p>
          
          <h5 class="mt-3">For Users Aged 13-17</h5>
          <p>If you are between 13 and 17 years old:</p>
          <ul>
            <li>We require parental or guardian consent for enrollment</li>
            <li>Parents/guardians can access, modify, or delete their child's information</li>
            <li>We limit data collection to what is necessary for educational services</li>
            <li>We do not use children's data for marketing purposes</li>
          </ul>

          <div class="alert alert-warning mt-3">
            <h5><i class="bi bi-exclamation-triangle me-2"></i>Parents and Guardians</h5>
            <p class="mb-0">If you believe we have inadvertently collected information from a child under 13, or if you wish to review, modify, or delete your child's information, please contact us immediately at <a href="mailto:privacy@tecworldacademy.edu">privacy@tecworldacademy.edu</a></p>
          </div>
        </div>
      </div>
    </section>

    <!-- International Transfers -->
    <section id="international" class="mb-5">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-globe text-primary me-2"></i>International Data Transfers</h2>
          <p>Your information may be transferred to and processed in countries other than Ghana, including:</p>
          <ul>
            <li>United States (cloud hosting services)</li>
            <li>European Union (customer support services)</li>
            <li>Other countries where our service providers operate</li>
          </ul>

          <h5 class="mt-3">Data Protection Safeguards</h5>
          <p>When transferring data internationally, we ensure appropriate safeguards:</p>
          <ul>
            <li>Standard Contractual Clauses (SCCs) approved by the EU Commission</li>
            <li>Data Processing Agreements with all processors</li>
            <li>Adequacy decisions where applicable</li>
            <li>Privacy Shield Framework compliance (where applicable)</li>
            <li>Encryption during transfer and storage</li>
          </ul>

          <div class="alert alert-info mt-3">
            <p class="mb-0"><i class="bi bi-info-circle me-2"></i>If you are located in the European Economic Area (EEA), we comply with GDPR requirements for international data transfers.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- California Privacy Rights -->
    <section id="california" class="mb-5">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-flag-fill text-danger me-2"></i>California Privacy Rights (CCPA)</h2>
          <p>If you are a California resident, you have additional rights under the California Consumer Privacy Act (CCPA):</p>
          
          <div class="table-responsive">
            <table class="table">
              <thead class="table-light">
                <tr>
                  <th>Right</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Right to Know</strong></td>
                  <td>Request information about data collected, used, disclosed, or sold in the past 12 months</td>
                </tr>
                <tr>
                  <td><strong>Right to Delete</strong></td>
                  <td>Request deletion of personal information we have collected</td>
                </tr>
                <tr>
                  <td><strong>Right to Opt-Out</strong></td>
                  <td>Opt-out of the sale of personal information (Note: We do not sell personal information)</td>
                </tr>
                <tr>
                  <td><strong>Right to Non-Discrimination</strong></td>
                  <td>Not be discriminated against for exercising your CCPA rights</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="mt-3"><strong>California residents can exercise these rights by:</strong></p>
          <ul>
            <li>Calling our toll-free number: 1-800-XXX-XXXX</li>
            <li>Emailing: <a href="mailto:ccpa@tecworldacademy.edu">ccpa@tecworldacademy.edu</a></li>
            <li>Submitting a request through our online form</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Policy Updates -->
    <section id="updates" class="mb-5">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-arrow-clockwise text-success me-2"></i>Changes to This Privacy Policy</h2>
          <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or other factors.</p>

          <h5 class="mt-3">How We Notify You</h5>
          <p>When we make material changes to this policy, we will:</p>
          <ul>
            <li>Update the "Last Updated" date at the top of this page</li>
            <li>Send an email notification to registered users</li>
            <li>Display a prominent notice on our website for 30 days</li>
            <li>For significant changes, request your consent where required by law</li>
          </ul>

          <div class="alert alert-success mt-3">
            <h5><i class="bi bi-bell me-2"></i>Stay Informed</h5>
            <p class="mb-0">We encourage you to review this Privacy Policy periodically. Your continued use of our services after changes are posted constitutes your acceptance of the updated policy.</p>
          </div>

          <h5 class="mt-4">Version History</h5>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Version</th>
                  <th>Date</th>
                  <th>Changes</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>4.0</td>
                  <td>October 2, 2025</td>
                  <td>Updated data retention periods, added AI processing disclosure</td>
                </tr>
                <tr>
                  <td>3.5</td>
                  <td>June 1, 2025</td>
                  <td>Added California Privacy Rights section</td>
                </tr>
                <tr>
                  <td>3.0</td>
                  <td>January 15, 2025</td>
                  <td>Enhanced security measures section, updated third-party list</td>
                </tr>
                <tr>
                  <td>2.0</td>
                  <td>July 10, 2024</td>
                  <td>GDPR compliance updates</td>
                </tr>
                <tr>
                  <td>1.0</td>
                  <td>March 1, 2024</td>
                  <td>Initial publication</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Information -->
    <section id="contact" class="mb-5">
      <div class="card border-primary">
        <div class="card-body">
          <h2 class="card-title"><i class="bi bi-envelope-open-fill text-primary me-2"></i>Contact Us About Privacy</h2>
          <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:</p>

          <div class="row mt-4">
            <div class="col-md-6 mb-4">
              <div class="card bg-light h-100">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-person-badge text-primary"></i> Data Protection Officer</h5>
                  <p><strong>Name:</strong> Dr. Kwame Asante</p>
                  <p><strong>Email:</strong> <a href="mailto:dpo@tecworldacademy.edu">dpo@tecworldacademy.edu</a></p>
                  <p><strong>Phone:</strong> +233 55 123 4567</p>
                  <p class="mb-0"><strong>Hours:</strong> Monday - Friday, 9 AM - 5 PM GMT</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card bg-light h-100">
                <div class="card-body">
                  <h5 class="card-title"><i class="bi bi-building text-success"></i> Main Office</h5>
                  <p><strong>Address:</strong><br>
                  TecWorld Academy<br>
                  Privacy Department<br>
                  123 Tech Street, East Legon<br>
                  Accra, Ghana</p>
                  <p class="mb-0"><strong>General Inquiries:</strong> <a href="mailto:privacy@tecworldacademy.edu">privacy@tecworldacademy.edu</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="alert alert-info">
            <h5><i class="bi bi-clock me-2"></i>Response Time</h5>
            <p class="mb-0">We aim to respond to all privacy inquiries within 30 days. For urgent matters, please mark your email as "Urgent" in the subject line.</p>
          </div>
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
