<?php
require_once(__DIR__ . '/../auth/auth.php');
$dashboardLanguageScope = 'lms';
require_once dirname(__DIR__, 3) . '/utils/i18n/dashboard.php';
require_once(__DIR__ . '/../../../utils/security/csrf/csrf.php');
$csrf_token = CSRF::generateToken();
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($dashboardLocale, ENT_QUOTES, 'UTF-8') ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Techworld Technology - Student Dashboard</title>
  <meta name="csrf-token" content="<?php echo htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8'); ?>">

  <!-- Meta Description -->
  <meta name="description" content="Techworld Technology - Student Dashboard">

  <!-- Meta Keywords -->
  <meta name="keywords" content="Techworld Technology, Student Dashboard, Technology Education, Ghana">

  <!-- Meta Author -->
  <meta name="author" content="Techworld Technology">

  <!-- Meta Robots -->
  <meta name="robots" content="index, follow">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/assets/images/logo.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- AOS Animation Library (local fallback) -->
  <link href="/lms-dashboard/css/vendor/aos.css" rel="stylesheet">

  <!-- Swiper CSS (local fallback) -->
  <link href="/lms-dashboard/css/vendor/swiper-bundle.min.css" rel="stylesheet">

  <!-- GLightbox CSS (local fallback) -->
  <link href="/lms-dashboard/css/vendor/glightbox.min.css" rel="stylesheet">

  <!-- Thumbnails placeholders -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/lms-dashboard/css/loading.css"><link rel="stylesheet" href="/lms-dashboard/css/styles.css"><link rel="stylesheet" href="/lms-dashboard/css/tokens.css">

  <!-- custom js -->


  <!-- Note: page scripts (js/main.js) are included at the end of the page (footer) -->

<script>window.TWDashboardPhrases=<?= json_encode($dashboardPhrases, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) ?>;window.twDashTranslate=function(value){return window.TWDashboardPhrases[String(value)]||String(value);};</script></head>
<body class="lms-body dashboard-loading">
<div id="dashboardLoadingScreen" role="status" aria-live="polite" aria-label="Loading learning dashboard">
  <div class="dashboard-loader-card"><span class="dashboard-loader-mark" aria-hidden="true"><i class="bi bi-mortarboard-fill"></i></span><span class="dashboard-loader-spinner" aria-hidden="true"></span><strong class="dashboard-loader-title">Loading your learning space</strong><span class="dashboard-loader-caption">Getting your courses and resources ready</span></div>
</div>
<script>
(function () {
  window.setTimeout(function () {
    var screen = document.getElementById('dashboardLoadingScreen');
    if (screen) {
      screen.classList.add('is-hidden');
      screen.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('dashboard-loading');
    }
  }, 10000);
})();
</script>



