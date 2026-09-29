<?php
// Public website translations only. Dashboard layouts do not load this helper.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$supportedLanguages = ['en', 'es', 'fr'];
$requestedLanguage = $_GET['lang'] ?? null;
if (is_string($requestedLanguage)) {
    $requestedLanguage = strtolower(trim($requestedLanguage));
    if (in_array($requestedLanguage, $supportedLanguages, true)) {
        $_SESSION['lang'] = $requestedLanguage;
    }
}
$currentLanguage = $_SESSION['lang'] ?? 'en';
if (!in_array($currentLanguage, $supportedLanguages, true)) {
    $currentLanguage = 'en';
    $_SESSION['lang'] = 'en';
}
$langFile = __DIR__ . '/../../lang/' . $currentLanguage . '/' . $currentLanguage . '.php';
$lang = is_file($langFile) ? require $langFile : require __DIR__ . '/../../lang/en/en.php';

if (!function_exists('tw_t')) {
    function tw_t(string $key, ?string $fallback = null): string
    {
        global $lang;
        return (string)($lang[$key] ?? $fallback ?? $key);
    }
}

if (!function_exists('tw_translate_public_html')) {
    function tw_translate_public_html(string $html): string
    {
        global $lang;
        $phrases = $lang['__phrases'] ?? [];
        if (!$phrases || ($_SESSION['lang'] ?? 'en') === 'en') {
            return $html;
        }
        $protected = [];
        $html = preg_replace_callback('~<(script|style|pre|code)\b[^>]*>.*?</\1\s*>~is', static function ($match) use (&$protected): string {
            $token = 'TW_PUBLIC_TRANSLATION_BLOCK_' . count($protected) . '_END';
            $protected[$token] = $match[0];
            return $token;
        }, $html) ?? $html;
        $html = preg_replace_callback('~>([^<>]+)<~u', static function ($match) use ($phrases): string {
            $raw = $match[1];
            $phrase = trim(html_entity_decode($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($phrase === '' || !array_key_exists($phrase, $phrases)) {
                return $match[0];
            }
            preg_match('/^\s*/u', $raw, $left);
            preg_match('/\s*$/u', $raw, $right);
            $translated = htmlspecialchars((string)$phrases[$phrase], ENT_NOQUOTES | ENT_SUBSTITUTE, 'UTF-8');
            return '>' . ($left[0] ?? '') . $translated . ($right[0] ?? '') . '<';
        }, $html) ?? $html;
        $html = preg_replace_callback("~\\b(placeholder|aria-label|title|alt)=(['\"])(.*?)\\2~is", static function ($match) use ($phrases): string {
            $value = trim(html_entity_decode($match[3], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if (!array_key_exists($value, $phrases)) {
                return $match[0];
            }
            return $match[1] . '=' . $match[2] . htmlspecialchars((string)$phrases[$value], ENT_COMPAT | ENT_SUBSTITUTE, 'UTF-8') . $match[2];
        }, $html) ?? $html;
        return $protected ? strtr($html, $protected) : $html;
    }
}

if (!defined('TW_PUBLIC_TRANSLATION_BUFFER_STARTED')) {
    define('TW_PUBLIC_TRANSLATION_BUFFER_STARTED', true);
    ob_start('tw_translate_public_html');
}

if (!function_exists('tw_lang_url')) {
    function tw_lang_url(string $language): string
    {
        if (!in_array($language, ['en', 'es', 'fr'], true)) {
            $language = 'en';
        }
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
        if (substr($path, 0, 2) === '//') {
            $path = '/';
        }
        $query = [];
        parse_str((string)(parse_url($requestUri, PHP_URL_QUERY) ?? ''), $query);
        $query['lang'] = $language;
        return $path . '?' . http_build_query($query);
    }
}