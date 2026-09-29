<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include("../../includes/sidebar.php")
?>


<!-- ACADEMIC CALENDAR HERO -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
  <div class="container text-center">
    <h1 class="fw-bold mb-3">Academic Calendar</h1>
    <p class="lead">Plan your year with TecWorld Academy's official academic schedule.</p>
  </div>
</section>

<!-- CALENDAR HIGHLIGHTS -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-calendar2-check text-success display-5 mb-3"></i>
            <h5 class="fw-bold">Admissions</h5>
            <p class="text-muted">Applications open in January and close in March.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-book-half text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Classes</h5>
            <p class="text-muted">Semester begins in April with lectures and tutorials.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-pencil-square text-danger display-5 mb-3"></i>
            <h5 class="fw-bold">Examinations</h5>
            <p class="text-muted">Exams scheduled in late August for all students.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <i class="bi bi-mortarboard-fill text-secondary display-5 mb-3"></i>
            <h5 class="fw-bold">Graduation</h5>
            <p class="text-muted">Graduation ceremony is held in September.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MONTHLY ACCORDION VIEW -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold text-success mb-4">Monthly Overview</h2>
    <div class="accordion" id="calendarAccordion">
      
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingJan">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJan">
            January
          </button>
        </h2>
        <div id="collapseJan" class="accordion-collapse collapse show" data-bs-parent="#calendarAccordion">
          <div class="accordion-body">
            <ul>
              <li><strong>15th January:</strong> Admissions Open</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingMar">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMar">
            March
          </button>
        </h2>
        <div id="collapseMar" class="accordion-collapse collapse" data-bs-parent="#calendarAccordion">
          <div class="accordion-body">
            <ul>
              <li><strong>1st March:</strong> Application Deadline</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingApr">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApr">
            April
          </button>
        </h2>
        <div id="collapseApr" class="accordion-collapse collapse" data-bs-parent="#calendarAccordion">
          <div class="accordion-body">
            <ul>
              <li><strong>10th April:</strong> Semester Begins</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingAug">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAug">
            August
          </button>
        </h2>
        <div id="collapseAug" class="accordion-collapse collapse" data-bs-parent="#calendarAccordion">
          <div class="accordion-body">
            <ul>
              <li><strong>25th August:</strong> Examinations</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSep">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSep">
            September
          </button>
        </h2>
        <div id="collapseSep" class="accordion-collapse collapse" data-bs-parent="#calendarAccordion">
          <div class="accordion-body">
            <ul>
              <li><strong>15th September:</strong> Graduation Ceremony</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DETAILED TABLE -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold text-success mb-4">Full Calendar Schedule</h2>
    <div class="table-responsive">
      <table class="table table-bordered shadow-sm align-middle">
        <thead class="table-success">
          <tr>
            <th style="width: 25%;">Date</th>
            <th>Event</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-info">
            <td>January 15</td>
            <td>Admissions Open</td>
          </tr>
          <tr class="table-warning">
            <td>March 1</td>
            <td>Application Deadline</td>
          </tr>
          <tr class="table-primary">
            <td>April 10</td>
            <td>Semester Begins</td>
          </tr>
          <tr class="table-danger">
            <td>August 25</td>
            <td>Examinations</td>
          </tr>
          <tr class="table-secondary">
            <td>September 15</td>
            <td>Graduation Ceremony</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- LEGEND -->
    <div class="mt-4">
      <h5 class="fw-bold">Legend</h5>
      <div class="d-flex flex-wrap gap-3">
        <span class="badge bg-info">Admissions</span>
        <span class="badge bg-warning text-dark">Deadlines</span>
        <span class="badge bg-primary">Classes</span>
        <span class="badge bg-danger">Examinations</span>
        <span class="badge bg-secondary">Graduation</span>
      </div>
    </div>

    <!-- DOWNLOAD BUTTON -->
    <div class="mt-4">
      <a href="../../assets/docs/academic-calendar-2025.pdf" class="btn btn-success btn-lg shadow">
        <i class="bi bi-download me-2"></i>Download Full Calendar (PDF)
      </a>
    </div>
  </div>
</section>

<!-- REMINDERS CTA -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="fw-bold text-success mb-3">Stay on Track</h2>
    <p class="text-muted mb-4">Set reminders and get email notifications for deadlines and important academic events.</p>
    <a href="/contact/contact.php" class="btn btn-outline-success btn-lg">
      <i class="bi bi-bell me-2"></i>Get Email Reminders
    </a>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php'); 
?>