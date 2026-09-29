<?php
/**
 * Example: Payment Callback Handler
 * Handle payment verification from payment gateways
 */

require_once(__DIR__ . '/../config/payment_config.php');
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../modules/payment_manager.php');

session_start();

$db = PaymentDB::getInstance()->getConnection();
$paymentManager = new PaymentManager($db);

// Get payment reference from query parameters
$reference = $_GET['reference'] ?? $_GET['trxref'] ?? $_GET['token'] ?? null;
$gateway = strtolower($_GET['gateway'] ?? 'paystack');
$allowed_gateways = ['paystack', 'stripe', 'paypal'];

if (!$reference || is_array($reference)) {
    die('Invalid payment reference');
}

if (!in_array($gateway, $allowed_gateways, true)) {
    die('Invalid payment gateway');
}

if (!preg_match('/^[A-Za-z0-9_\-\.]{6,128}$/', $reference)) {
    die('Invalid payment reference');
}

try {
    // Verify payment
    $result = $paymentManager->verifyPayment($reference, $gateway);
    
    if ($result['success']) {
        // Payment successful
        $_SESSION['payment_success'] = true;
        $_SESSION['payment_message'] = 'Payment completed successfully!';
        
        header('Location: ' . PAYMENT_CONFIG['success_url']);
        exit;
        
    } else {
        // Payment failed
        $_SESSION['payment_error'] = $result['message'];
        header('Location: ' . PAYMENT_CONFIG['cancel_url']);
        exit;
    }
    
} catch (Exception $e) {
    $_SESSION['payment_error'] = $e->getMessage();
    header('Location: ' . PAYMENT_CONFIG['cancel_url']);
    exit;
}
