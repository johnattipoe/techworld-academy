<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
$dashboardLanguageScope = 'instructor';
require_once dirname(__DIR__, 3) . '/utils/i18n/dashboard.php';
require_once(__DIR__ . '/../csrf/csrf.php');
$instructorCsrfToken = instructor_csrf_token();
$pageTitle = isset($pageTitle) ? $pageTitle : 'Instructor workspace';
?>
<!doctype html><html lang="<?= htmlspecialchars($dashboardLocale, ENT_QUOTES, 'UTF-8') ?>" class="<?= (($_SESSION['theme'] ?? 'light') === 'dark') ? 'dark-theme' : '' ?>"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#f4f7fb">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> · Instructor workspace</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="/instructor-dashboard/css/loading.css"><link rel="stylesheet" href="/instructor-dashboard/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script><script>window.TWDashboardPhrases=<?= json_encode($dashboardPhrases, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) ?>;window.twDashTranslate=function(value){return window.TWDashboardPhrases[String(value)]||String(value);};</script></head><body class="instructor-body dashboard-loading">
<div id="dashboardLoadingScreen" role="status" aria-live="polite" aria-label="Loading instructor workspace">
  <div class="dashboard-loader-card"><span class="dashboard-loader-mark" aria-hidden="true"><i class="fa-solid fa-chalkboard-user"></i></span><span class="dashboard-loader-spinner" aria-hidden="true"></span><strong class="dashboard-loader-title">Loading instructor workspace</strong><span class="dashboard-loader-caption">Preparing your courses and students</span></div>
</div>


