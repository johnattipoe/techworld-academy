<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<section class="bg-info text-dark py-5" data-aos="fade-down"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-7"><span class="badge bg-dark mb-3">Additional Services</span><h1 class="display-4 fw-bold mb-3">Mobile Products People Enjoy Using</h1><p class="lead mb-4">Design and build fast, accessible mobile experiences that connect your customers and your team.</p><a href="/contact/contact.php?service=mobile-development" class="btn btn-dark btn-lg">Build a Mobile Product</a></div><div class="col-lg-5 text-center"><img src="/assets/project/fitness tracker.jpeg" alt="Mobile application development" class="img-fluid rounded shadow"></div></div></div></section>
<section class="py-5" data-aos="fade-up"><div class="container"><div class="text-center mb-5"><h2 class="fw-bold">From first sketch to app store</h2><p class="lead text-muted">A focused product process for useful, reliable mobile experiences.</p></div><div class="row g-4"><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-phone fs-1 text-info"></i><h2 class="h5 mt-3">Product Design</h2><p class="text-muted mb-0">User flows, prototypes, and interfaces shaped around real needs.</p></div></div></div><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-code-slash fs-1 text-primary"></i><h2 class="h5 mt-3">App Development</h2><p class="text-muted mb-0">Scalable mobile builds with clean integrations and maintainable code.</p></div></div></div><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-bug fs-1 text-danger"></i><h2 class="h5 mt-3">Testing and Support</h2><p class="text-muted mb-0">Device testing, launch support, and improvements after release.</p></div></div></div></div></div></section>
<section class="py-5 bg-light"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><h2 class="fw-bold">Build the right first version</h2><p class="text-muted mb-0">We help prioritize the features that prove value quickly, then create a roadmap for what comes next.</p></div><div class="col-lg-4 text-lg-end"><a href="/contact/contact.php?service=mobile-development" class="btn btn-primary btn-lg">Start a product conversation</a></div></div></div></section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
 ?>