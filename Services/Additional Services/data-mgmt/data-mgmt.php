<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<section class="bg-success text-white py-5" data-aos="fade-down"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-7"><span class="badge bg-light text-success mb-3">Additional Services</span><h1 class="display-4 fw-bold mb-3">Data Management You Can Trust</h1><p class="lead mb-4">Organize, protect, and govern your data so your teams can work with confidence.</p><a href="/contact/contact.php?service=data-management" class="btn btn-light btn-lg">Improve Your Data</a></div><div class="col-lg-5 text-center"><img src="/assets/images/user.png" alt="Data management" class="img-fluid rounded shadow"></div></div></div></section>
<section class="py-5" data-aos="fade-up"><div class="container"><div class="row g-4"><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-database-check fs-1 text-success"></i><h2 class="h5 mt-3">Data Quality</h2><p class="text-muted mb-0">Clean, validate, and standardize data for reliable reporting.</p></div></div></div><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-shield-lock fs-1 text-primary"></i><h2 class="h5 mt-3">Governance</h2><p class="text-muted mb-0">Define ownership, access, policies, and responsible data practices.</p></div></div></div><div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-arrow-left-right fs-1 text-warning"></i><h2 class="h5 mt-3">Data Integration</h2><p class="text-muted mb-0">Bring systems together so information flows where it is needed.</p></div></div></div></div></div></section>
<section class="py-5 bg-light"><div class="container"><div class="text-center mb-4"><h2 class="fw-bold">A practical data foundation</h2><p class="text-muted">We help you move from scattered information to a dependable data environment.</p></div><div class="row g-3 text-center"><div class="col-md-3"><div class="p-3 bg-white rounded shadow-sm"><strong>Assess</strong><small class="d-block text-muted">Map your data</small></div></div><div class="col-md-3"><div class="p-3 bg-white rounded shadow-sm"><strong>Design</strong><small class="d-block text-muted">Set standards</small></div></div><div class="col-md-3"><div class="p-3 bg-white rounded shadow-sm"><strong>Implement</strong><small class="d-block text-muted">Improve workflows</small></div></div><div class="col-md-3"><div class="p-3 bg-white rounded shadow-sm"><strong>Govern</strong><small class="d-block text-muted">Keep quality high</small></div></div></div></div></section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php');
 ?>
