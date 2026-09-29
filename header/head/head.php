<?php

// -----------------------------
// Security headers
// -----------------------------
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.googletagmanager.com https://www.google-analytics.com https://connect.facebook.net; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com; font-src https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com data:; img-src 'self' data: https: blob:; connect-src 'self' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google-analytics.com https://www.googletagmanager.com; frame-src 'self' https://maps.google.com https://www.google.com;");

// -----------------------------
// Cache control for static assets
// -----------------------------
if (preg_match('/\.(css|js|jpg|jpeg|png|gif|svg|woff|woff2|ttf|eot)$/i', $_SERVER['REQUEST_URI'])) {
    header("Cache-Control: public, max-age=31536000");
    header("Expires: " . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
} else {
    header("Cache-Control: no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
}

// -----------------------------
// Session handling
// -----------------------------
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.cookie_samesite', 'Strict');
    ini_set('session.use_strict_mode', 1);
    session_start();
}

// Regenerate session ID periodically for security
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 1800) {
    session_regenerate_id(true);
    $_SESSION['created'] = time();
}

// -----------------------------
// CSRF Token
// -----------------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function get_csrf_token(): string {
    return $_SESSION['csrf_token'] ?? '';
}

function verify_csrf_token(string $token): bool {
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

// -----------------------------
// Database Configuration
// -----------------------------
define('DB_HOST', 'localhost');
define('DB_NAME', 'tecworld_academy');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// -----------------------------
// Site Configuration
// -----------------------------
define('SITE_NAME', 'TecWorld Academy');
define('SITE_URL', 'https://www.tecworld.academy');
define('SITE_EMAIL', 'info@tecworld.academy');
define('SITE_PHONE', '+233 XX XXX XXXX');
define('SITE_ADDRESS', 'Accra, Ghana');

// Social Media Links
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/people/TechWorld-Academy-Solution-Hub/61581411140471/');
define('SOCIAL_TWITTER', 'https://x.com/TechworldH85412');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/tecworldacademy');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/tecworldacademy');
define('SOCIAL_YOUTUBE', 'https://youtube.com/@tecworldacademy');
define('SOCIAL_TIKTOK', 'https://tiktok.com/@tecworldacademy');

// -----------------------------
// Current Page Detection
// -----------------------------
$page_name = basename($_SERVER['PHP_SELF'], '.php');
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// -----------------------------
// Page Meta Descriptions
// -----------------------------
$page_descriptions = [
    'index' => 'Transform your career with TecWorld Academy\'s comprehensive technology courses. Expert instructors, hands-on learning, and industry-recognized certifications in web development, data science, cybersecurity, and more.',
    'about' => 'Learn about TecWorld Academy, our mission, vision, experienced instructors, and commitment to providing world-class technology education in Ghana and across Africa.',
    'courses' => 'Explore our comprehensive technology courses including web development, data science, cybersecurity, AI, cloud computing, mobile development, and more. Industry-recognized certifications available.',
    'course-details' => 'Get detailed information about our technology courses, curriculum, schedule, fees, and learning outcomes. Start your journey to tech excellence today.',
    'contact' => 'Get in touch with TecWorld Academy. Contact us for course inquiries, admissions, corporate training, or general information. We are here to help you succeed.',
    'admissions' => 'Apply to TecWorld Academy today. Learn about our admission process, requirements, scholarships, payment plans, and start your technology career journey with us.',
    'schedule' => 'View the complete class schedule for all TecWorld Academy courses. Find the perfect time slot for your learning journey with flexible onsite, online, and hybrid options.',
    'projects' => 'Explore outstanding projects built by TecWorld Academy students. See real-world applications across web development, data science, mobile apps, UI/UX design, and cybersecurity.',
    'testimonials' => 'Read success stories from our alumni. Discover how TecWorld Academy has transformed careers and lives through quality technology education.',
    'blog' => 'Stay updated with the latest technology trends, tips, tutorials, and industry insights from TecWorld Academy\'s expert instructors and guest writers.',
    'faq' => 'Find answers to frequently asked questions about courses, admissions, payments, schedules, certifications, and more at TecWorld Academy.',
    'careers' => 'Join the TecWorld Academy team. Explore career opportunities for instructors, administrative staff, and technology professionals.',
    'events' => 'Discover upcoming tech events, workshops, webinars, hackathons, and networking sessions hosted by TecWorld Academy.',
    'alumni' => 'Connect with TecWorld Academy alumni network. Access exclusive resources, job opportunities, and community events.',
    'partnerships' => 'Partner with TecWorld Academy for corporate training, curriculum development, or technology education initiatives.',
    'default' => 'Transform your career with TecWorld Academy\'s comprehensive technology courses. Expert instructors, hands-on learning, and industry-recognized certifications in web development, data science, cybersecurity, and more.'
];

$page_description = $page_descriptions[$page_name] ?? $page_descriptions['default'];

// -----------------------------
// Page Titles
// -----------------------------
$page_titles = [
    'index' => 'TecWorld Academy - Premier Technology Education in Ghana',
    'about' => 'About Us - TecWorld Academy',
    'courses' => 'Our Courses - TecWorld Academy',
    'course-details' => 'Course Details - TecWorld Academy',
    'contact' => 'Contact Us - TecWorld Academy',
    'admissions' => 'Admissions - Apply Now - TecWorld Academy',
    'schedule' => 'Class Schedule - TecWorld Academy',
    'projects' => 'Student Projects - TecWorld Academy',
    'testimonials' => 'Success Stories - TecWorld Academy',
    'blog' => 'Tech Blog - TecWorld Academy',
    'faq' => 'FAQ - Frequently Asked Questions - TecWorld Academy',
    'careers' => 'Careers - Join Our Team - TecWorld Academy',
    'events' => 'Events & Workshops - TecWorld Academy',
    'alumni' => 'Alumni Network - TecWorld Academy',
    'partnerships' => 'Corporate Partnerships - TecWorld Academy',
    'default' => 'TecWorld Academy - Premier Technology Education'
];

$page_title = $page_titles[$page_name] ?? $page_titles['default'];

// -----------------------------
// Page Keywords
// -----------------------------
$page_keywords_array = [
    'index' => 'TecWorld Academy, technology education Ghana, coding bootcamp Ghana, web development courses, data science training, cybersecurity courses, tech school Accra',
    'about' => 'about TecWorld Academy, our mission, our vision, tech education Ghana, experienced instructors',
    'courses' => 'technology courses, web development, data science, cybersecurity, cloud computing, AI courses, mobile development, UI/UX design, Ghana',
    'admissions' => 'apply to TecWorld Academy, admission requirements, scholarships, payment plans, enroll now',
    'schedule' => 'class schedule, course timetable, onsite classes, online classes, hybrid learning',
    'projects' => 'student projects, portfolio, real-world projects, tech showcase',
    'default' => 'TecWorld Academy, technology education, career transformation, world-class education, premier technology education provider'
];

$page_keywords = $page_keywords_array[$page_name] ?? $page_keywords_array['default'];

// -----------------------------
// Page Author
// -----------------------------
$page_author = 'TecWorld Academy';

// -----------------------------
// Open Graph Meta Tags
// -----------------------------
$page_og_titles = [
    'index' => 'TecWorld Academy - Premier Technology Education in Ghana',
    'about' => 'About TecWorld Academy - Transforming Careers Through Tech Education',
    'courses' => 'Technology Courses - TecWorld Academy',
    'admissions' => 'Apply Now - Start Your Tech Career - TecWorld Academy',
    'default' => 'TecWorld Academy - Premier Technology Education'
];

$page_og_title = $page_og_titles[$page_name] ?? $page_og_titles['default'];
$page_og_description = $page_description;
$page_og_image = SITE_URL . '/assets/images/og-image.jpg';
$page_og_url = $current_url;
$page_og_type = 'website';
$page_og_site_name = SITE_NAME;

// -----------------------------
// Twitter Meta Tags
// -----------------------------
$page_tw_card = 'summary_large_image';
$page_tw_title = $page_og_title;
$page_tw_description = $page_description;
$page_tw_image = $page_og_image;
$page_tw_site = '@tecworldacademy';
$page_tw_creator = '@tecworldacademy';

// -----------------------------
// Canonical Link
// -----------------------------
$page_canonical = $current_url;

// -----------------------------
// Robots Meta Tag
// -----------------------------
$robots_rules = [
    'admin' => 'noindex, nofollow',
    'login' => 'noindex, nofollow',
    'register' => 'noindex, nofollow',
    'dashboard' => 'noindex, nofollow',
    'default' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'
];

$page_robots = $robots_rules[$page_name] ?? $robots_rules['default'];

// -----------------------------
// Structured Data (Schema.org)
// -----------------------------
$organization_schema = [
    "@context" => "https://schema.org",
    "@type" => "EducationalOrganization",
    "name" => SITE_NAME,
    "url" => SITE_URL,
    "logo" => SITE_URL . "/assets/images/logo.jpeg",
    "description" => "Premier technology education provider in Ghana",
    "address" => [
        "@type" => "PostalAddress",
        "addressLocality" => "Accra",
        "addressCountry" => "Ghana"
    ],
    "contactPoint" => [
        "@type" => "ContactPoint",
        "telephone" => SITE_PHONE,
        "contactType" => "customer service",
        "email" => SITE_EMAIL
    ],
    "sameAs" => [
        SOCIAL_FACEBOOK,
        SOCIAL_TWITTER,
        SOCIAL_INSTAGRAM,
        SOCIAL_LINKEDIN,
        SOCIAL_YOUTUBE
    ]
];

$website_schema = [
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => SITE_NAME,
    "url" => SITE_URL,
    "potentialAction" => [
        "@type" => "SearchAction",
        "target" => SITE_URL . "/search?q={search_term_string}",
        "query-input" => "required name=search_term_string"
    ]
];

// -----------------------------
// Analytics & Tracking
// -----------------------------
$google_analytics_id = ''; // Set this to the real GA4 ID when configured.
$google_tag_manager_id = ''; // Set this to the real GTM ID when configured.
$facebook_pixel_id = ''; // Set this to the numeric Pixel ID when configured.

// -----------------------------
// Language & Region
// -----------------------------
$page_lang = !empty($websiteLanguageEnabled) ? ($_SESSION['lang'] ?? 'en') : 'en';
$localeMap = ['en' => 'en_GH', 'es' => 'es_ES', 'fr' => 'fr_FR'];
$page_locale = $localeMap[$page_lang] ?? 'en_GH';
$page_alternate_languages = [
    'en' => SITE_URL,
    // Add other languages if available
];

// -----------------------------
// Breadcrumb Schema
// -----------------------------
function generate_breadcrumb_schema(array $items): string {
    $breadcrumb_list = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => []
    ];
    
    foreach ($items as $position => $item) {
        $breadcrumb_list["itemListElement"][] = [
            "@type" => "ListItem",
            "position" => $position + 1,
            "name" => $item['name'],
            "item" => $item['url']
        ];
    }
    
    return json_encode($breadcrumb_list, JSON_UNESCAPED_SLASHES);
}

// -----------------------------
// Theme & Appearance
// -----------------------------
$theme_color = '#667eea';
$theme_color_dark = '#764ba2';
$apple_mobile_web_app_capable = 'yes';
$apple_mobile_web_app_status_bar_style = 'black-translucent';

// -----------------------------
// Preload Critical Resources
// -----------------------------
$preload_resources = [
    ['href' => '/styles/main.css', 'as' => 'style'],
];

// -----------------------------
// Prefetch/Preconnect Domains
// -----------------------------
$preconnect_domains = [
    'https://fonts.googleapis.com',
    'https://fonts.gstatic.com',
    'https://cdn.jsdelivr.net',
    'https://cdnjs.cloudflare.com'
];

$dns_prefetch_domains = [
    'https://www.google-analytics.com',
    'https://www.googletagmanager.com',
    'https://connect.facebook.net'
];

?>