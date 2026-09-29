<?php
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-3 rounded">
      <li class="breadcrumb-item"><a href="/index/index.php" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="blog.php" class="text-decoration-none">Blog</a></li>
      <li class="breadcrumb-item active" aria-current="page">From Beginner to Full Stack Developer in 6 Months</li>
    </ol>
  </nav>

  <!-- Blog Header -->
  <div class="text-center mb-4">
    <span class="badge bg-success px-3 py-2">Success Story</span>
    <h1 class="fw-bold mt-3">From Beginner to Full Stack Developer in 6 Months</h1>
    <p class="text-muted mb-3"><i class="bi bi-calendar-event"></i> Sep 22, 2025</p>
    <img src="assets/images/blog2.jpg" class="img-fluid rounded shadow-sm mb-4" alt="Samuel's Success Story">
  </div>

  <!-- Blog Content -->
  <div class="col-lg-10 mx-auto">
    <p class="lead">
      Meet <strong>Samuel</strong>, a passionate learner who transformed his career from a complete beginner to a professional
      <strong>Full Stack Developer</strong> in just six months through dedication, mentorship, and TecWorld Academy’s comprehensive web development program.
    </p>

    <h4 class="mt-4">A Journey Fueled by Determination</h4>
    <p>
      Before joining TecWorld Academy, Samuel had no background in coding. He worked in customer service but always dreamed of building websites and apps.
      “I started with zero experience,” he recalls. “The structured curriculum and hands-on projects helped me understand every concept step by step.”
    </p>

    <h4 class="mt-4">Hands-On Learning and Mentorship</h4>
    <p>
      Samuel enrolled in the <strong>Full Stack Web Development Bootcamp</strong>, where he learned HTML, CSS, JavaScript, React, PHP, and MySQL.
      Regular mentorship sessions, group projects, and real-world challenges helped him apply theory to practice effectively.
    </p>

    <blockquote class="blockquote border-start border-4 border-primary ps-3 my-4">
      <p class="mb-0">“The instructors were always available to help. They pushed me beyond my comfort zone and guided me to build a professional portfolio.”</p>
      <footer class="blockquote-footer mt-2">Samuel, Full Stack Developer</footer>
    </blockquote>

    <h4 class="mt-4">Building a Professional Portfolio</h4>
    <p>
      Within months, Samuel developed several real-world projects — including e-commerce sites, personal blogs, and admin dashboards.
      His GitHub portfolio caught the attention of recruiters, leading to multiple job interviews and offers.
    </p>

    <h4 class="mt-4">Landing His Dream Job</h4>
    <p>
      After completing the program, Samuel secured a position as a <strong>Junior Full Stack Developer</strong> at a top software company in Accra.
      “I never imagined I’d be working in tech this quickly,” he says proudly. “TecWorld Academy gave me the tools and confidence I needed.”
    </p>

    <div class="alert alert-success mt-5">
      <i class="bi bi-lightbulb-fill me-2"></i>
      <strong>Inspired?</strong> Enroll in our <a href="/Courses/courses.php" class="alert-link">Web Development Program</a> today and start your journey toward becoming a Full Stack Developer.
    </div>
  </div>

  <!-- Back to Blog -->
  <div class="text-center mt-5">
    <a href="/Resources/Community/blog/blog.php" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left me-1"></i> Back to Blog
    </a>
  </div>

</div>

<?php
include(__DIR__ . '/..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\includes\footer\footer.php');
?>
