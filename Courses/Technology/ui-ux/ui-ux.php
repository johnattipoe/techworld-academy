<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="mb-4">UI/UX Design</h1>
  <p>Develop skills to design engaging user interfaces and intuitive user experiences using modern design tools and methodologies.</p>

  <h3 class="mt-4">What You’ll Learn</h3>
  <ul>
    <li>Principles of User-Centered Design</li>
    <li>Wireframing and Prototyping</li>
    <li>Design Tools: Figma, Adobe XD</li>
    <li>Usability Testing & Iteration</li>
  </ul>

  <a href="/Admissions/General/admissions/admissions.php?course=ui-ux" class="btn btn-primary mt-3">Enroll Now</a>
</div>

<?php 
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>
