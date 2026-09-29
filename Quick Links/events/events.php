<?php 
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">Upcoming Events</h1>
  <p>Stay updated with our workshops, seminars, and special events.</p>

  <div class="row g-4 mt-4">
    <!-- Event 1 -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">AI & Data Science Workshop</h5>
          <p class="card-text">Join our hands-on workshop to explore AI tools and real-world data applications.</p>
          <p class="text-muted small">📅 October 15, 2025 | 📍 Online</p>
          <a href="#" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Cybersecurity Bootcamp</h5>
          <p class="card-text">Learn practical cybersecurity skills to safeguard your digital world.</p>
          <p class="text-muted small">📅 November 5, 2025 | 📍 Accra Campus</p>
          <a href="#" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include(__DIR__ . '/..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\includes\footer\footer.php'); 
?>
