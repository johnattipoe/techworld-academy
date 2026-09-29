<?php
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');

// Array of available jobs
$jobs = [
  [
    "id" => "webdev_instructor",
    "title" => "Web Development Instructor",
    "department" => "Academic (IT Department)",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-10-30",
    "description" => "Teach and mentor students in HTML, CSS, JavaScript, and PHP. Prepare course materials, assessments, and provide hands-on guidance."
  ],
  [
    "id" => "data_science",
    "title" => "Data Science Intern",
    "department" => "Academic (IT Department)",
    "type" => "Internship",
    "location" => "Accra Campus",
    "deadline" => "2025-11-15",
    "description" => "Work on projects to develop skills in data analysis, machine learning, and data visualization."
  ],
  [
    "id" => "designer",
    "title" => "Graphic Designer",
    "department" => "Marketing & Communications",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-05",
    "description" => "Design and create visuals for social media, websites, and marketing materials."
  ],
  [
    "id" => "software_engineer",
    "title" => "Software Engineer",
    "department" => "IT Department",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-15",
    "description" => "Design, develop, and maintain software solutions for various applications."
  ],
  [
    "id" => "ux_ui_designer",
    "title" => "UX/UI Designer",
    "department" => "Academic (IT Department)",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-05",
    "description" => "Design user interfaces and user experiences for web and mobile applications."
  ],
  [
    "id" => "content_writer",
    "title" => "Content Writer",
    "department" => "Academic (IT Department)",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-15",
    "description" => "Write engaging content for social media, blogs, and educational materials."
  ],
  [
    "id" => "webdev_instructor",
    "title" => "Web Development Instructor",
    "department" => "Academic (IT Department)",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-10-30",
    "description" => "Teach and mentor students in HTML, CSS, JavaScript, and PHP. Prepare course materials, assessments, and provide hands-on guidance."
  ],
  [
    "id" => "data_science",
    "title" => "Data Science Intern",
    "department" => "Academic (IT Department)",
    "type" => "Internship",
    "location" => "Accra Campus",
    "deadline" => "2025-11-15",
    "description" => "Work on projects to develop skills in data analysis, machine learning, and data visualization."
  ],
  [
    "id" => "designer",
    "title" => "Graphic Designer",
    "department" => "Marketing & Communications",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-05",
    "description" => "Design and create visuals for social media, websites, and marketing materials."
  ],
  [
    "id" => "software_engineer",
    "title" => "Software Engineer",
    "department" => "IT Department",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-15",
    "description" => "Design, develop, and maintain software solutions for various applications."
  ],
  [
    "id" => "ux_ui_designer",
    "title" => "UX/UI Designer",
    "department" => "Academic (IT Department)",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-05",
    "description" => "Design user interfaces and user experiences for web and mobile applications."
  ],
  [
    "id" => "data_analyst",
    "title" => "Data Analyst Intern",
    "department" => "Research & Analytics",
    "type" => "Internship",
    "location" => "Remote",
    "deadline" => "2025-11-15",
    "description" => "Assist in collecting and analyzing data from academic projects and marketing campaigns. Requires knowledge of Excel or Python."
  ],
  [
    "id" => "marketing_officer",
    "title" => "Marketing Officer",
    "department" => "Marketing & Communications",
    "type" => "Full-Time",
    "location" => "Accra Campus",
    "deadline" => "2025-11-05",
    "description" => "Plan and execute campaigns, manage social media, and promote TecWorld Academy events and programs."
  ]
];
?>

<div class="container mt-5 mb-5">
  <h1 class="fw-bold mb-3">💼 Career Opportunities</h1>
  <p class="lead">Join our passionate team at TecWorld Academy. Explore current openings and apply to start your journey with us.</p>

  <!-- Search Bar -->
  <div class="input-group mb-4">
    <span class="input-group-text"><i class="bi bi-search"></i></span>
    <input type="text" id="searchBox" class="form-control" placeholder="Search job titles, departments, or types...">
  </div>

  <div class="row g-4" id="jobList">
    <?php foreach ($jobs as $job): ?>
      <div class="col-md-6 job-item">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body d-flex flex-column">
            <h4 class="fw-bold"><?= htmlspecialchars($job["title"]) ?></h4>
            <p class="text-muted mb-1">
              <i class="bi bi-diagram-3 me-1"></i> <?= htmlspecialchars($job["department"]) ?>
            </p>
            <p class="text-muted mb-1">
              <i class="bi bi-geo-alt me-1"></i> <?= htmlspecialchars($job["location"]) ?>
            </p>
            <p class="text-muted mb-2">
              <i class="bi bi-clock me-1"></i> <?= htmlspecialchars($job["type"]) ?>
            </p>
            <p class="small"><?= htmlspecialchars($job["description"]) ?></p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="badge bg-light text-dark border">
                <i class="bi bi-calendar-event me-1"></i> Apply by <?= htmlspecialchars($job["deadline"]) ?>
              </span>
              <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Jobmodal" data-job="<?= htmlspecialchars($job['title']) ?>">
                <i class="bi bi-send me-1"></i> Apply Now
            </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- No Results Message -->
  <div id="noResults" class="text-center text-muted mt-4" style="display:none;">
    <i class="bi bi-emoji-frown display-6 d-block mb-2"></i>
    <p>No job openings match your search criteria.</p>
  </div>
</div>

<!-- Search Script -->
<script>
document.getElementById("searchBox").addEventListener("keyup", function() {
  let filter = this.value.toLowerCase();
  let count = 0;
  document.querySelectorAll(".job-item").forEach(function(item) {
    let text = item.textContent.toLowerCase();
    let visible = text.includes(filter);
    item.style.display = visible ? "" : "none";
    if (visible) count++;
  });
  document.getElementById("noResults").style.display = count ? "none" : "";
});
</script>

<?php
include(__DIR__ . '/..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\includes\footer\footer.php');
?>
