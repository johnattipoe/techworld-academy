<!-- Application Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg">
      
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title fw-bold" id="applyModalLabel">Application Form</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body p-4">
        <form action="../../process-application.php" method="POST">
          <!-- Full Name -->
          <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Enter full name" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Enter email" required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Phone Number</label>
            <input type="tel" class="form-control rounded-3" id="phone" name="phone" placeholder="Enter phone number" required>
          </div>

          <!-- Course Selection -->
          <div class="mb-3">
            <label for="course" class="form-label fw-semibold">Select Course</label>
            <select class="form-select rounded-3" id="course" name="course" required>
              <option value="">Choose a course...</option>
              <option value="business-management">Business Management</option>
              <option value="self-development">Self Development</option>
              <option value="digital-marketing">Digital Marketing</option>
              <option value="cybersecurity">Cybersecurity</option>
              <option value="web-development">Web Development</option>
              <option value="graphic-design">Graphic Design</option>
              <option value="data-analytics">Data Analytics</option>
              <option value="artificial-intelligence">Artificial Intelligence</option>
              <option value="digital-marketing">Digital Marketing</option>
              <option value="entrepreneurship">Entrepreneurship</option>
              <option value="leadership">Leadership Development</option>
              <option value="time-management">Time Management</option>
              <option value="productivity">Productivity Tips</option>
              <option value="mindfulness">Mindfulness & Meditation</option>
              <option value="software-solutions">Software Solutions</option>
              <option value="custom-software">Custom Software</option>
              <option value="outsourcing">IT Outsourcing</option>
            </select>
          </div>

          <!-- Upload Documents -->
          <div class="mb-3">
            <label for="documents" class="form-label fw-semibold">Upload Documents</label>
            <input type="file" class="form-control rounded-3" id="documents" name="documents[]" multiple>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success rounded-3">Submit Application</button>
      </div>
    </div>
  </div>
</div>
<!-- End Application Modal -->

<!-- start cookie consent modal -->
<!-- Cookie Consent Modal -->
<div class="modal fade" id="cookieConsentModal" tabindex="-1" aria-labelledby="cookieConsentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cookieConsentModalLabel">Cookie Preferences</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You can choose which types of cookies you want to allow:</p>
        <form>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" checked disabled>
            <label class="form-check-label">Essential Cookies (Required)</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Performance Cookies</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Functional Cookies</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox">
            <label class="form-check-label">Advertising Cookies</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Preferences</button>
      </div>
    </div>
  </div>
</div>
<!-- End cookie consent modal -->


<!-- start chat box -->
<!-- Floating Chat Box -->
<div id="chatBox" class="card shadow-lg position-fixed" 
     style="width: 300px; height: 400px; bottom: 90px; right: 20px; display: none; z-index: 1100; resize: both; overflow: hidden;">
  
  <!-- Header -->
  <div class="card-header bg-info text-white d-flex justify-content-between align-items-center cursor-move" id="chatHeader">
    <span><i class="bi bi-chat-dots me-2"></i>Live Chat</span>
    <button class="btn btn-sm btn-light" onclick="toggleChatBox()">&times;</button>
  </div>
  
  <!-- Messages -->
  <div class="card-body" id="chatMessages" style="overflow-y: auto; height: 280px;">
    <p class="text-muted small">Welcome! How can we help you today?</p>
    <div class="p-2 mb-2 bg-light rounded">
      <strong>Support:</strong> Hi there 👋, feel free to ask us anything.
    </div>
  </div>
  
  <!-- Input -->
  <div class="card-footer">
    <div class="input-group">
      <input type="text" id="chatInput" class="form-control" placeholder="Type your message...">
      <button class="btn btn-info text-white" type="button" id="sendMessage">
        <i class="bi bi-send"></i>
      </button>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  // Toggle chat box visibility
  function toggleChatBox() {
    const chatBox = document.getElementById("chatBox");
    chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "block" : "none";
  }

  // Send message
  document.getElementById("sendMessage").addEventListener("click", function() {
    const input = document.getElementById("chatInput");
    const messages = document.getElementById("chatMessages");

    if (input.value.trim() !== "") {
      const msg = document.createElement("div");
      msg.classList.add("p-2", "mb-2", "bg-primary", "text-white", "rounded");
      msg.innerText = "You: " + input.value;
      messages.appendChild(msg);
      input.value = "";
      messages.scrollTop = messages.scrollHeight;
    }
  });

  // Make chat box draggable
  dragElement(document.getElementById("chatBox"), document.getElementById("chatHeader"));

  function dragElement(elmnt, header) {
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

    if (header) {
      header.onmousedown = dragMouseDown;
    } else {
      elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;
      document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;
      elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
      elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
      document.onmouseup = null;
      document.onmousemove = null;
    }
  }
</script>
<!-- End chat box -->

<!-- Start Job Modal -->
<!-- Job Modal -->
<div class="modal fade" id="Jobmodal" tabindex="-1" aria-labelledby="JobmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="JobmodalLabel">Apply for Job</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Job application form goes here -->
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
          </div>
          <div class="mb-3">
            <label for="coverLetter" class="form-label">Cover Letter</label>
            <textarea class="form-control" id="coverLetter" name="coverLetter" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Job Modal -->

<!-- start visit modal -->
<!-- Visit Modal -->
<div class="modal fade" id="visitModal" tabindex="-1" aria-labelledby="visitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="visitModalLabel">
          <i class="bi bi-geo-alt-fill me-2"></i>Schedule a Campus Visit
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <form action="submit_visit.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Preferred Visit Date</label>
            <input type="date" class="form-control" name="visit_date" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Number of Visitors</label>
            <input type="number" class="form-control" name="num_visitors" min="1" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Additional Notes (optional)</label>
            <textarea class="form-control" name="notes" rows="3"></textarea>
          </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-send-fill me-1"></i> Submit Request
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end visit modal -->

<!-- Register Modal -->
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="registerModalLabel">
          <i class="bi bi-pencil-square me-2"></i> Workshop Registration
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <form action="submit_registration.php" method="POST" class="needs-validation" novalidate>
        <div class="modal-body bg-light">
          <div class="row g-3">
            
            <!-- Full Name -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Full Name</label>
              <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
            </div>

            <!-- Phone -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="+233 55 123 4567" required>
            </div>

            <!-- Event Select -->
            <div class="col-md-6">
              <label class="form-label fw-semibold">Select Event</label>
              <select name="event" class="form-select" required>
                <option value="">-- Choose an Event --</option>
                <option>Full Stack Development Bootcamp</option>
                <option>AI and Data Science Trends 2025</option>
                <option>Tech Innovation Challenge</option>
              </select>
            </div>

            <!-- Message -->
            <div class="col-12">
              <label class="form-label fw-semibold">Additional Message (Optional)</label>
              <textarea name="message" class="form-control" rows="3" placeholder="Any special requirements or questions..."></textarea>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer bg-white border-top-0">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Cancel
          </button>
          <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-send me-1"></i> Submit Registration
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Register Modal -->


<!-- ================= MODALS ================= -->
<!-- start story modals -->
<!-- Sarah Adu Modal -->
<div class="modal fade" id="storySarah" tabindex="-1" aria-labelledby="storySarahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="storySarahLabel">
          From Accountant to Software Engineer
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="text-center mb-3">
          <img src="/assets/person/Sarah Adu.jpeg" class="img-fluid rounded shadow-sm" alt="Sarah Adu" style="max-height: 300px; object-fit: cover;">
        </div>

        <p><strong>Sarah Adu</strong> made a bold career move from accounting to software engineering. After completing our 6-month full stack development program, she landed a position at <strong>Hubtel</strong> as a <strong>Senior Developer</strong>.</p>

        <p>Her transformation showcases the power of structured learning, mentorship, and hands-on projects. Within months, she mastered HTML, CSS, JavaScript, and backend development with PHP and Node.js.</p>

        <div class="mt-3">
          <span class="badge bg-info me-2">300% Salary Increase</span>
          <span class="badge bg-success">6 Months</span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Daniel Mensah Modal -->
<div class="modal fade" id="storyDaniel" tabindex="-1" aria-labelledby="storyDanielLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="storyDanielLabel">
          Breaking Into Data Science
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="text-center mb-3">
          <img src="/assets/person/Daniel Mensah.jpeg" class="img-fluid rounded shadow-sm" alt="Daniel Mensah" style="max-height: 300px; object-fit: cover;">
        </div>

        <p><strong>Daniel Mensah</strong> was an unemployed graduate seeking direction. After enrolling in our Data Science track, he developed advanced skills in Python, SQL, and predictive modeling. Today, he works as a <strong>Data Scientist at Ecobank</strong>.</p>

        <p>Through project-based learning and real-world mentorship, Daniel gained the confidence and expertise to analyze business data, automate workflows, and deliver impactful insights.</p>

        <div class="mt-3">
          <span class="badge bg-info me-2">First Tech Job</span>
          <span class="badge bg-success">4 Months</span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End story modals -->

<!-- start schedule modals -->
<!-- Full Schedule Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="scheduleModalLabel">
          <i class="bi bi-calendar3 me-2"></i> Full Class Schedule
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead class="table-primary">
              <tr>
                <th>Course</th>
                <th>Start Date</th>
                <th>Schedule</th>
                <th>Seats</th>
                <th>Mode</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Full Stack Web Development</td>
                <td>Nov 1, 2025</td>
                <td>Mon–Fri, 6PM–9PM</td>
                <td><span class="badge bg-warning text-dark">8 / 25</span></td>
                <td><span class="badge bg-success">Onsite</span></td>
                <td><a href="/Admissions/General/admissions/admissions.php?course=webdev" class="btn btn-sm btn-primary">Enroll</a></td>
              </tr>
              <tr>
                <td>Data Analytics</td>
                <td>Nov 8, 2025</td>
                <td>Sat–Sun, 9AM–4PM</td>
                <td><span class="badge bg-success">15 / 30</span></td>
                <td><span class="badge bg-info">Online</span></td>
                <td><a href="/Admissions/General/admissions/admissions.php?course=data" class="btn btn-sm btn-primary">Enroll</a></td>
              </tr>
              <tr>
                <td>Cybersecurity</td>
                <td>Nov 15, 2025</td>
                <td>Mon–Fri, 9AM–12PM</td>
                <td><span class="badge bg-danger">3 / 20</span></td>
                <td><span class="badge bg-warning text-dark">Hybrid</span></td>
                <td><a href="/Admissions/General/admissions/admissions.php?course=cyber" class="btn btn-sm btn-primary">Enroll</a></td>
              </tr>
              <tr>
                <td>Cloud Computing</td>
                <td>Dec 1, 2025</td>
                <td>Mon–Fri, 6PM–9PM</td>
                <td><span class="badge bg-success">12 / 25</span></td>
                <td><span class="badge bg-info">Online</span></td>
                <td><a href="/Admissions/General/admissions/admissions.php?course=cloud" class="btn btn-sm btn-primary">Enroll</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/schedule/schedule/schedule.php" class="btn btn-primary">
          <i class="bi bi-arrow-right-circle me-1"></i> View Detailed Schedule
        </a>
      </div>
    </div>
  </div>
</div>
<!-- End schedule modals -->

<!-- start instructors modals -->
<?php
// Instructors array
$instructors = [
  [
    "id" => 1,
    "name" => "Kwame Asante",
    "title" => "Full Stack Developer",
    "bio" => "Expert in JavaScript, React, and PHP with 10+ years of experience building enterprise applications.",
    "image" => "/assets/person/Kwame Asante.jpeg",
    "details" => "Kwame has led numerous enterprise projects across Africa. He’s passionate about mentoring developers and has contributed to several open-source frameworks."
  ],
  [
    "id" => 2,
    "name" => "Ama Ofori",
    "title" => "Data Science Instructor",
    "bio" => "Data analytics specialist passionate about Python, AI, and mentoring future data scientists.",
    "image" => "/assets/person/Ama Boateng.jpeg",
    "details" => "Ama has worked with financial institutions on predictive analytics and AI solutions. She also organizes Ghana’s annual Women in Data conference."
  ],
  [
    "id" => 3,
    "name" => "Kojo Mensah",
    "title" => "Cybersecurity Expert",
    "bio" => "Certified Ethical Hacker with 8+ years experience securing digital infrastructures across Africa.",
    "image" => "/assets/person/Kofi Adjei.jpeg",
    "details" => "Kojo has trained over 500 cybersecurity professionals and consults for major banks on network penetration testing and system security."
  ],
  [
    "id" => 4,
    "name" => "Efua Boateng",
    "title" => "Mobile App Developer",
    "bio" => "Android and iOS developer skilled in Flutter and Kotlin, building scalable mobile solutions.",
    "image" => "/assets/person/Abena Owusu.jpeg",
    "details" => "Efua has built award-winning apps in health and fintech. She leads the mobile development mentorship program at the academy."
  ],
  [
    "id" => 5,
    "name" => "/assets/person/Daniel Mensah.jpeg",
    "title" => "Cloud Computing Specialist",
    "bio" => "AWS and Azure certified engineer helping businesses migrate and optimize their cloud infrastructure.",
    "image" => "/assets/person/Akosua Mensah.jpeg",
    "details" => "Michael has over a decade of experience in cloud architecture and DevOps. He’s passionate about teaching scalable cloud solutions."
  ],
];
?>

<!-- Main Instructors Modal -->
<div class="modal fade" id="instructorsModal" tabindex="-1" aria-labelledby="instructorsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="instructorsModalLabel"><i class="bi bi-person-badge me-2"></i> Our Instructors</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="row g-4">
          <?php foreach ($instructors as $instructor): ?>
            <div class="col-md-4 text-center">
              <div class="card border-0 shadow-sm h-100 p-3">
                <img src="<?= htmlspecialchars($instructor['image']) ?>" class="rounded-circle mb-3" width="120" height="120" alt="<?= htmlspecialchars($instructor['name']) ?>">
                <h6 class="fw-bold mb-0"><?= htmlspecialchars($instructor['name']) ?></h6>
                <small class="text-muted"><?= htmlspecialchars($instructor['title']) ?></small>
                <p class="mt-2 small"><?= htmlspecialchars($instructor['bio']) ?></p>
                <button class="btn btn-outline-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#instructorModal<?= $instructor['id'] ?>">
                  <i class="bi bi-eye me-1"></i> View Profile
                </button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Individual Instructor Detail Modals -->
<?php foreach ($instructors as $instructor): ?>
<div class="modal fade" id="instructorModal<?= $instructor['id'] ?>" tabindex="-1" aria-labelledby="instructorModalLabel<?= $instructor['id'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="instructorModalLabel<?= $instructor['id'] ?>">
          <i class="bi bi-person-circle me-2"></i> <?= htmlspecialchars($instructor['name']) ?>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?= htmlspecialchars($instructor['image']) ?>" class="rounded-circle mb-3" width="140" height="140" alt="<?= htmlspecialchars($instructor['name']) ?>">
        <h6 class="fw-bold"><?= htmlspecialchars($instructor['title']) ?></h6>
        <p class="text-muted"><?= htmlspecialchars($instructor['bio']) ?></p>
        <p><?= htmlspecialchars($instructor['details']) ?></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-arrow-left me-1"></i> Back</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Instructors Modal -->