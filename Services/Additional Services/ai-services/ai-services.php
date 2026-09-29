<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>
?>

<section class="bg-primary text-white py-5" data-aos="fade-down">
	<div class="container"><div class="row align-items-center g-4">
		<div class="col-lg-7"><span class="badge bg-light text-primary mb-3">Additional Services</span><h1 class="display-4 fw-bold mb-3">AI Solutions for Smarter Decisions</h1><p class="lead mb-4">Turn complex data into practical intelligence with responsible AI strategy, automation, and machine-learning solutions built around your goals.</p><div class="d-flex flex-wrap gap-3"><a href="/contact/contact.php?service=ai-services" class="btn btn-light btn-lg">Start an AI Project</a><a href="#ai-services" class="btn btn-outline-light btn-lg">Explore Services</a></div></div>
		<div class="col-lg-5 text-center"><img src="/assets/main/main.png" alt="AI solutions" class="img-fluid rounded shadow"></div>
	</div></div>
</section>

<section id="ai-services" class="py-5" data-aos="fade-up"><div class="container"><div class="text-center mb-5"><h2 class="fw-bold">What We Build</h2><p class="lead text-muted">Practical AI that improves everyday work.</p></div><div class="row g-4">
	<div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-robot fs-1 text-primary"></i><h3 class="h5 mt-3">Intelligent Automation</h3><p class="text-muted mb-0">Automate repetitive workflows, document processing, support responses, and operational decisions.</p></div></div></div>
	<div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-graph-up-arrow fs-1 text-success"></i><h3 class="h5 mt-3">Predictive Analytics</h3><p class="text-muted mb-0">Use your data to forecast demand, identify risks, and discover opportunities earlier.</p></div></div></div>
	<div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body p-4"><i class="bi bi-chat-square-text fs-1 text-warning"></i><h3 class="h5 mt-3">AI Assistants</h3><p class="text-muted mb-0">Create secure assistants that help teams find knowledge and serve customers faster.</p></div></div></div>
</div></div></section>

<section class="py-5 bg-light"><div class="container"><div class="row g-4 align-items-center"><div class="col-lg-6"><h2 class="fw-bold">From idea to measurable impact</h2><p class="text-muted">We start with a focused use case, validate its value, and build a solution your team can understand and maintain.</p><div class="d-flex gap-3 mb-3"><span class="badge bg-primary rounded-pill">01</span><div><strong>Discover</strong><p class="small text-muted mb-0">Define the business problem and success measures.</p></div></div><div class="d-flex gap-3 mb-3"><span class="badge bg-primary rounded-pill">02</span><div><strong>Prototype</strong><p class="small text-muted mb-0">Test the solution with real workflows and data.</p></div></div><div class="d-flex gap-3"><span class="badge bg-primary rounded-pill">03</span><div><strong>Deploy</strong><p class="small text-muted mb-0">Launch, monitor, and improve with your team.</p></div></div></div><div class="col-lg-6"><div class="p-4 bg-white rounded shadow-sm"><h3 class="h5">Ready to explore AI?</h3><p class="text-muted">Tell us what you want to improve and we will suggest a practical next step.</p><a href="/contact/contact.php?service=ai-services" class="btn btn-primary">Book a discovery call</a></div></div></div></div></section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>