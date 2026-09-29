<?php
/**
 * Payment System Configuration
 * Load this file before using any payment features
 */

// Load environment variables (assuming .env file is in project root)
if (file_exists(__DIR__ . '/../../.env')) {
    $lines = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value, " \t\n\r\0\x0B\"'");
        
        putenv("$name=$value");
        $_ENV[$name] = $value;
    }
}

// Helper function to get environment variables
if (!function_exists('env')) {
    function env($key, $default = null) {
        $value = getenv($key);
        return $value !== false ? $value : $default;
    }
}

// Payment Configuration
define('PAYMENT_CONFIG', [
    // Default gateway
    'default_gateway' => env('DEFAULT_PAYMENT_GATEWAY', 'paystack'),
    
    // Currency
    'currency' => env('PAYMENT_CURRENCY', 'GHS'),
    
    // Mode (sandbox/live)
    'mode' => env('PAYMENT_MODE', 'sandbox'),
    
    // Paystack
    'paystack' => [
        'secret_key' => env('PAYSTACK_SECRET_KEY'),
        'public_key' => env('PAYSTACK_PUBLIC_KEY'),
    ],
    
    // Stripe
    'stripe' => [
        'secret_key' => env('STRIPE_SECRET_KEY'),
        'public_key' => env('STRIPE_PUBLIC_KEY'),
    ],
    
    // PayPal
    'paypal' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SECRET'),
        'mode' => env('PAYMENT_MODE', 'sandbox')
    ],
    
    // Callbacks
    'callback_url' => env('APP_URL') . '/payment/callback',
    'success_url' => env('APP_URL') . '/payment/success',
    'cancel_url' => env('APP_URL') . '/payment/cancel',
    
    // Invoice settings
    'invoice_path' => __DIR__ . '/../invoices/',
    'invoice_prefix' => 'INV',
    
    // Installment settings
    'min_installments' => 2,
    'max_installments' => 12,
    'min_down_payment_percentage' => 20,
    
    // Features
    'enable_installments' => true,
    'enable_scholarships' => true,
    'enable_refunds' => true,
    
    // Email notifications
    'send_payment_confirmation' => true,
    'send_invoice_email' => true,
    'admin_notification_email' => env('ADMIN_EMAIL', 'admin@tecworldacademy.edu'),
]);

// Create necessary directories
$dirs = [
    __DIR__ . '/../invoices/',
    __DIR__ . '/../logs/',
    __DIR__ . '/../uploads/scholarship_documents/'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}
