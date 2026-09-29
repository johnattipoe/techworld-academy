<?php
require_once(__DIR__ . '/../../config/env/env.php');

function tw_oauth_provider_config(string $provider): ?array
{
    $configs = [
        'google' => [
            'client_id' => env('GOOGLE_OAUTH_CLIENT_ID', ''),
            'client_secret' => env('GOOGLE_OAUTH_CLIENT_SECRET', ''),
            'redirect_uri' => env('GOOGLE_OAUTH_REDIRECT_URI', 'http://localhost:8000/authenication/oauth/callback.php'),
            'authorize_url' => 'https://accounts.google.com/o/oauth2/v2/auth',
            'token_url' => 'https://oauth2.googleapis.com/token',
            'userinfo_url' => 'https://openidconnect.googleapis.com/v1/userinfo',
            'scope' => 'openid email profile',
            'pkce' => true,
        ],
        'microsoft' => [
            'client_id' => env('MICROSOFT_OAUTH_CLIENT_ID', ''),
            'client_secret' => env('MICROSOFT_OAUTH_CLIENT_SECRET', ''),
            'redirect_uri' => env('MICROSOFT_OAUTH_REDIRECT_URI', 'http://localhost:8000/authenication/oauth/callback.php'),
            'tenant' => env('MICROSOFT_OAUTH_TENANT', 'common'),
            'authorize_url' => null,
            'token_url' => null,
            'userinfo_url' => 'https://graph.microsoft.com/oidc/userinfo',
            'scope' => 'openid profile email',
            'pkce' => true,
        ],
        'yahoo' => [
            'client_id' => env('YAHOO_OAUTH_CLIENT_ID', ''),
            'client_secret' => env('YAHOO_OAUTH_CLIENT_SECRET', ''),
            'redirect_uri' => env('YAHOO_OAUTH_REDIRECT_URI', 'http://localhost:8000/authenication/oauth/callback.php'),
            'authorize_url' => 'https://api.login.yahoo.com/oauth2/request_auth',
            'token_url' => 'https://api.login.yahoo.com/oauth2/get_token',
            'userinfo_url' => 'https://api.login.yahoo.com/openid/v1/userinfo',
            'scope' => 'openid email profile',
            'pkce' => false,
        ],
    ];

    if (!isset($configs[$provider])) {
        return null;
    }

    $config = $configs[$provider];
    if ($provider === 'microsoft') {
        $tenant = preg_replace('/[^a-zA-Z0-9.-]/', '', (string)$config['tenant']);
        $tenant = $tenant ?: 'common';
        $config['authorize_url'] = 'https://login.microsoftonline.com/' . $tenant . '/oauth2/v2.0/authorize';
        $config['token_url'] = 'https://login.microsoftonline.com/' . $tenant . '/oauth2/v2.0/token';
    }

    return $config;
}

function tw_oauth_request(string $url, ?array $fields = null, array $headers = []): array
{
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    if ($fields !== null) {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($fields));
    }

    $body = curl_exec($curl);
    $status = (int)curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    $error = curl_error($curl);
    curl_close($curl);

    if ($body === false || $status < 200 || $status >= 300) {
        error_log('OAuth HTTP request failed (' . $status . '): ' . $error);
        throw new RuntimeException('The identity provider could not complete the request.');
    }

    $data = json_decode($body, true);
    if (!is_array($data)) {
        throw new RuntimeException('The identity provider returned an invalid response.');
    }

    return $data;
}

function tw_oauth_base64url(string $value): string
{
    return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
}

function tw_oauth_error(string $message, int $status = 400): void
{
    http_response_code($status);
    header('Content-Type: text/html; charset=UTF-8');
    $escaped = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    echo '<!doctype html><html lang="en"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Sign-in unavailable</title><body style="font:16px system-ui,sans-serif;max-width:38rem;margin:10vh auto;padding:1.5rem"><h1>Sign-in unavailable</h1><p>' . $escaped . '</p><p><a href="/authenication/login/login.php">Login</a> · <a href="/authenication/register/register.php">Register</a></p></body></html>';
    exit;
}