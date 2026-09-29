<?php
// Dashboard localization uses independent per-role session settings.
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$scope = isset($dashboardLanguageScope) && in_array($dashboardLanguageScope, ['admin','instructor','lms'], true) ? $dashboardLanguageScope : 'lms';
$sessionKey = 'dashboard_language_' . $scope;
$requested = $_GET['ui_lang'] ?? null;
if (is_string($requested) && in_array(strtolower(trim($requested)), ['en','es','fr'], true)) $_SESSION[$sessionKey] = strtolower(trim($requested));
$dashboardLanguage = $_SESSION[$sessionKey] ?? 'en';
if (!in_array($dashboardLanguage, ['en','es','fr'], true)) $dashboardLanguage = $_SESSION[$sessionKey] = 'en';
$dashboardLocale = $dashboardLanguage;
$catalog = dirname(__DIR__, 2) . '/lang/dashboard/' . $dashboardLanguage . '.php';
$dashboardPhrases = is_file($catalog) ? require $catalog : [];
if (!function_exists('dash_t')) {
    function dash_t(string $phrase): string { global $dashboardPhrases; return (string)($dashboardPhrases[$phrase] ?? $phrase); }
}
if (!function_exists('dashboard_lang_url')) {
    function dashboard_lang_url(string $language): string {
        if (!in_array($language, ['en','es','fr'], true)) $language = 'en';
        $uri = $_SERVER['REQUEST_URI'] ?? '/'; $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        if (str_starts_with($path, '//')) $path = '/';
        $query = []; parse_str((string)(parse_url($uri, PHP_URL_QUERY) ?? ''), $query); $query['ui_lang'] = $language;
        return $path . '?' . http_build_query($query);
    }
}
if (!function_exists('translate_dashboard_html')) {
    function translate_dashboard_html(string $html): string {
        global $dashboardPhrases; if (!$dashboardPhrases) return $html; $protected = [];
        $html = preg_replace_callback('~<(script|style|pre|code|textarea)\b[^>]*>.*?</\1\s*>~is', static function ($m) use (&$protected) { $token = 'TW_DASHBOARD_BLOCK_' . count($protected) . '_END'; $protected[$token] = $m[0]; return $token; }, $html) ?? $html;
        $html = preg_replace_callback('~>([^<>]+)<~u', static function ($m) use ($dashboardPhrases) {
            $raw = $m[1]; $key = trim(html_entity_decode($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($key === '' || !isset($dashboardPhrases[$key])) return $m[0];
            preg_match('/^\s*/u', $raw, $left); preg_match('/\s*$/u', $raw, $right);
            return '>' . ($left[0] ?? '') . htmlspecialchars((string)$dashboardPhrases[$key], ENT_NOQUOTES | ENT_SUBSTITUTE, 'UTF-8') . ($right[0] ?? '') . '<';
        }, $html) ?? $html;
        $html = preg_replace_callback('~\b(placeholder|aria-label|title|alt)=("|\')(.*?)\2~is', static function ($m) use ($dashboardPhrases) {
            $key = trim(html_entity_decode($m[3], ENT_QUOTES | ENT_HTML5, 'UTF-8')); if (!isset($dashboardPhrases[$key])) return $m[0];
            return $m[1] . '=' . $m[2] . htmlspecialchars((string)$dashboardPhrases[$key], ENT_COMPAT | ENT_SUBSTITUTE, 'UTF-8') . $m[2];
        }, $html) ?? $html;
        return $protected ? strtr($html, $protected) : $html;
    }
}
if (!defined('TW_DASHBOARD_TRANSLATION_BUFFER')) { define('TW_DASHBOARD_TRANSLATION_BUFFER', true); ob_start('translate_dashboard_html'); }
