<?php
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$websiteLanguageEnabled = !preg_match('~^/(?:Admin(?:/|$)|Admin-dashboard(?:/|$)|instructor-dashboard(?:/|$)|lms-dashboard(?:/|$))~i', $requestPath);
if ($websiteLanguageEnabled) {
    require_once __DIR__ . '/../lang/lang.php';
} else {
    $lang = require __DIR__ . '/../../lang/en/en.php';
    if (!function_exists('tw_t')) {
        function tw_t(string $key, ?string $fallback = null): string
        {
            global $lang;
            return (string)($lang[$key] ?? $fallback ?? $key);
        }
    }
}
include __DIR__ . '/../../header/head/head.php';
$e = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};
?>
<!doctype html>
<html lang="<?= $e($page_lang) ?>" prefix="og: https://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $e($page_title) ?></title>
  <meta name="description" content="<?= $e($page_description) ?>">
  <meta name="keywords" content="<?= $e($page_keywords) ?>">
  <meta name="author" content="<?= $e($page_author) ?>">
  <meta name="robots" content="<?= $e($page_robots) ?>">
  <meta name="googlebot" content="<?= $e($page_robots) ?>">
  <meta http-equiv="content-language" content="<?= $e($page_lang) ?>">
  <meta property="og:locale" content="<?= $e($page_locale) ?>">
  <link rel="canonical" href="<?= $e($page_canonical) ?>">
  <?php foreach ($page_alternate_languages as $alternateLanguage => $alternateUrl): ?>
    <link rel="alternate" hreflang="<?= $e($alternateLanguage) ?>" href="<?= $e($alternateUrl) ?>">
  <?php endforeach; ?>
  <meta property="og:site_name" content="<?= $e($page_og_site_name) ?>">
  <meta property="og:type" content="<?= $e($page_og_type) ?>">
  <meta property="og:url" content="<?= $e($page_og_url) ?>">
  <meta property="og:title" content="<?= $e($page_og_title) ?>">
  <meta property="og:description" content="<?= $e($page_og_description) ?>">
  <meta property="og:image" content="<?= $e($page_og_image) ?>">
  <meta name="twitter:card" content="<?= $e($page_tw_card) ?>">
  <meta name="twitter:site" content="<?= $e($page_tw_site) ?>">
  <meta name="twitter:creator" content="<?= $e($page_tw_creator) ?>">
  <meta name="twitter:title" content="<?= $e($page_tw_title) ?>">
  <meta name="twitter:description" content="<?= $e($page_tw_description) ?>">
  <meta name="twitter:image" content="<?= $e($page_tw_image) ?>">
  <meta name="theme-color" content="<?= $e($theme_color) ?>">
  <meta name="apple-mobile-web-app-capable" content="<?= $e($apple_mobile_web_app_capable) ?>">
  <meta name="mobile-web-app-capable" content="<?= $e($apple_mobile_web_app_capable) ?>">
  <meta name="apple-mobile-web-app-status-bar-style" content="<?= $e($apple_mobile_web_app_status_bar_style) ?>">
  <link rel="icon" href="/assets/images/logo.jpeg" type="image/jpeg">
  <link rel="apple-touch-icon" href="/assets/images/logo.jpeg">
  <link rel="manifest" href="/maifest/manifest.json">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
  <link rel="stylesheet" href="/styles/main.css">
  <script type="application/ld+json"><?= json_encode($organization_schema, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
  <script type="application/ld+json"><?= json_encode($website_schema, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
  <?php if (!empty($google_tag_manager_id)): ?>
    <script async src="https://www.googletagmanager.com/gtm.js?id=<?= $e($google_tag_manager_id) ?>"></script>
  <?php endif; ?>
  <?php if (!empty($google_analytics_id)): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $e($google_analytics_id) ?>"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','<?= $e($google_analytics_id) ?>',{anonymize_ip:true});</script>
  <?php endif; ?>
</head>
<body>
  <?php if (!empty($google_tag_manager_id)): ?>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $e($google_tag_manager_id) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <?php endif; ?>