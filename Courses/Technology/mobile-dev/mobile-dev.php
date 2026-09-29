<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">Mobile Development</h1>
  <p>Learn to build powerful mobile applications for Android and iOS using the latest tools, frameworks, and best practices.</p>

  <h3 class="mt-4">What You’ll Learn</h3>
  <ul>
    <li>Introduction to Mobile Platforms</li>
    <li>Building Android Apps with Kotlin/Java</li>
    <li>iOS Development with Swift</li>
    <li>Cross-Platform Development with Flutter/React Native</li>
  </ul>

  <a href="/Admissions/General/admissions/admissions.php?course=mobile-dev" class="btn btn-primary mt-3">Enroll Now</a>
</div>

<?php 
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
