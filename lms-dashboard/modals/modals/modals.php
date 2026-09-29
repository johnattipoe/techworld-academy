<!-- ==================== HELP MODAL ==================== -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-question-circle me-2"></i> Help & Support</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p class="mb-3">Need assistance? Explore our FAQs or reach out to our support team below.</p>

        <!-- FAQ Accordion -->
        <div class="accordion mb-4" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                How do I reset my password?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Click “Forgot Password” on the login page and follow the instructions sent to your email.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How can I contact support?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                You can contact us directly at <a href="mailto:support@example.com">support@example.com</a> or use the contact form below.
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Options -->
        <h6 class="fw-bold">Still need help?</h6>
        <ul class="list-unstyled mb-3">
          <li><i class="bi bi-book me-2 text-primary"></i><a href="../help/faq.php" class="text-decoration-none">Full FAQ Page</a></li>
          <li><i class="bi bi-envelope me-2 text-primary"></i><a href="../help/contact.php" class="text-decoration-none">Contact Support</a></li>
        </ul>

        <form class="mt-3">
          <div class="mb-3">
            <label for="helpMessage" class="form-label">Quick Message</label>
            <textarea id="helpMessage" class="form-control" rows="3" placeholder="Describe your issue..."></textarea>
          </div>
          <button type="submit" class="btn btn-info w-100 text-white">Send Message</button>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ==================== SETTINGS MODAL ==================== -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="settingsModalLabel"><i class="bi bi-gear me-2"></i> Account Settings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <!-- Language -->
          <div class="mb-3">
            <label for="languageSelect" class="form-label">Preferred Language</label>
            <select id="languageSelect" class="form-select">
              <option>English</option>
              <option>French</option>
              <option>Spanish</option>
            </select>
          </div>

          <!-- Theme -->
          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="darkModeSwitch">
            <label class="form-check-label" for="darkModeSwitch">Enable Dark Mode</label>
          </div>

          <!-- Notifications -->
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="emailNotify" checked>
            <label class="form-check-label" for="emailNotify">Receive Email Notifications</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="smsNotify">
            <label class="form-check-label" for="smsNotify">Receive SMS Notifications</label>
          </div>

          <!-- Privacy -->
          <div class="mb-3">
            <label class="form-label fw-bold">Privacy Options</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="privacyLevel" id="publicProfile" checked>
              <label class="form-check-label" for="publicProfile">Public Profile</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="privacyLevel" id="privateProfile">
              <label class="form-check-label" for="privateProfile">Private Profile</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ==================== PROFILE MODAL ==================== -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="profileModalLabel"><i class="bi bi-person me-2"></i> My Profile</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="/assets/images/user.png" alt="User Avatar" class="img-fluid rounded-circle mb-3" width="120" height="120">
            <p class="fw-bold mb-0"><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'John Doe'); ?></p>
            <p class="text-muted"><?php echo htmlspecialchars($_SESSION['user_email'] ?? 'user@example.com'); ?></p>
          </div>
          <div class="col-md-8">
            <form>
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? 'John Doe'); ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? 'user@example.com'); ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Change Password</label>
                <input type="password" class="form-control" placeholder="Enter new password">
              </div>
              <div class="mb-3">
                <label class="form-label">Member Since</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION['join_date'] ?? 'January 2024'); ?>" disabled>
              </div>
              <button type="submit" class="btn btn-success w-100">Update Profile</button>
            </form>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
