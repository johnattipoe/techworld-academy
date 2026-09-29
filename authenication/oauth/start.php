<?php
session_start();
require_once(__DIR__ . '/oauth.php');

$provider = strtolower(trim((string)($_GET['provider'] ?? '')));
$config = tw_oauth_provider_config($provider);
if ($config === null) {
    tw_oauth_error('That sign-in provider is not supported.');
}

if (empty($config['client_id']) || empty($config['client_secret'])) {
    $keys = [
        'google' => 'GOOGLE_OAUTH_CLIENT_ID and GOOGLE_OAUTH_CLIENT_SECRET',
        'microsoft' => 'MICROSOFT_OAUTH_CLIENT_ID and MICROSOFT_OAUTH_CLIENT_SECRET',
        'yahoo' => 'YAHOO_OAUTH_CLIENT_ID and YAHOO_OAUTH_CLIENT_SECRET',
    ];
    tw_oauth_error('This provider is not configured yet. Add ' . $keys[$provider] . ' to the local .env file.', 503);
}

$state = bin2hex(random_bytes(32));
$verifier = tw_oauth_base64url(random_bytes(64));
$_SESSION['tw_oauth'] = [
    'provider' => $provider,
    'state' => $state,
    'verifier' => $verifier,
    'created_at' => time(),
];

$params = [
    'client_id' => $config['client_id'],
    'redirect_uri' => $config['redirect_uri'],
    'response_type' => 'code',
    'scope' => $config['scope'],
    'state' => $state,
];
if ($config['pkce']) {
    $params['code_challenge'] = tw_oauth_base64url(hash('sha256', $verifier, true));
    $params['code_challenge_method'] = 'S256';
}

header('Location: ' . $config['authorize_url'] . '?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986));
exit;