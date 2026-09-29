<?php
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');

// Folder for video tutorials
$videoDir = __DIR__ . "/../../assets/videos/";
$videoUrl = "../../assets/videos/";

// Define tutorials (filename => title/description)
$tutorials = [
  "tutorial1.mp4" => [
    "title" => "Intro to Python Programming",
    "desc" => "Learn the basics of Python, variables, loops, and functions."
  ],
  "tutorial2.mp4" => [
    "title" => "Getting Started with Web Development",
    "desc" => "Step-by-step guide to building your first website with HTML, CSS, and JS."
  ],
  "tutorial3.mp4" => [
    "title" => "Data Science Basics",
    "desc" => "Understand data analysis, visualization, and beginner-level machine learning."
  ],
  "tutorial4.mp4" => [
    "title" => "Cybersecurity Essentials",
    "desc" => "Protect yourself online: firewalls, encryption, and best security practices."
  ]
];
?>

<div class="container mt-5 mb-5">
  <h1 class="fw-bold">🎥 Video Tutorials</h1>
  <p class="lead">Watch step-by-step tutorials on programming, data science, cybersecurity, and more.</p>

  <!-- Search Bar -->
  <div class="input-group mb-4">
    <span class="input-group-text"><i class="bi bi-search"></i></span>
    <input type="text" id="searchBox" class="form-control" placeholder="Search tutorials...">
  </div>

  <div class="row g-4" id="videoList">
    <?php foreach ($tutorials as $file => $info): ?>
      <div class="col-md-6 video-item">
        <div class="card shadow-sm h-100">
          <div class="ratio ratio-16x9">
            <video controls class="w-100 rounded">
              <source src="<?= $videoUrl . $file ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($info['title']) ?></h5>
            <p class="card-text text-muted"><?= htmlspecialchars($info['desc']) ?></p>
            <a href="<?= $videoUrl . $file ?>" download class="btn btn-sm btn-success">
              <i class="bi bi-download me-1"></i> Download
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Search Filter Script -->
<script>
document.getElementById("searchBox").addEventListener("keyup", function() {
  let filter = this.value.toLowerCase();
  document.querySelectorAll(".video-item").forEach(function(item) {
    let text = item.textContent.toLowerCase();
    item.style.display = text.includes(filter) ? "" : "none";
  });
});
</script>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
