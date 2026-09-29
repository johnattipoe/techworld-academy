<?php
// lms/send_pdf.php
// Small UI + handler to generate PDF and send via PHPMailer
// - Shows a simple form to enter recipient email and message
// - Protects with a CSRF token stored in session
// - Sanitizes input and sends the generated PDF as attachment

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$dashboardLanguageScope = 'lms';
require_once dirname(__DIR__, 2) . '/utils/i18n/dashboard.php';

// bring in shared helpers and auth guard
require_once(__DIR__ . '/../includes/db/db.php');
if (empty($_SESSION['user_id']) || strtolower((string)($_SESSION['role'] ?? '')) !== 'student') { header('Location: /authenication/login/login.php'); exit; }
require_once(__DIR__ . '/../fpdf/fpdf/fpdf.php');

// CSRF helper
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Simple email sanitizer/validator
function sanitize_email($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : false;
}

$mailerClass = 'PHPMailer\\PHPMailer\\PHPMailer';
$exceptionClass = 'PHPMailer\\PHPMailer\\Exception';
$mailerAvailable = false;
if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require(__DIR__ . '/../../vendor/autoload.php');
    $mailerAvailable = class_exists($mailerClass);
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf($token)) {
        $errors[] = 'Invalid CSRF token.';
    }

    $to = sanitize_email($_POST['to'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$to) $errors[] = 'Please provide a valid recipient email.';
    if ($subject === '') $errors[] = 'Please provide a subject.';

    if (!$mailerAvailable) {
        $errors[] = 'Mailer dependency is missing. Run composer install in the project root.';
    }

    if (empty($errors)) {
        // Generate PDF in memory
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,10,'TECHWORLD ACADEMY - LMS PDF',0,1,'C');
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0,6,htmlspecialchars($message) . "\n\nGenerated: " . date('c'));

        // Save to temp file
        $tmp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'lms_pdf_' . bin2hex(random_bytes(6)) . '.pdf';
        $pdf->Output('F', $tmp);

        try {
            $mail = new $mailerClass(true);

            $smtpHost = getenv('SMTP_HOST') ?: '';
            $smtpPort = (int)(getenv('SMTP_PORT') ?: 587);
            $smtpUser = getenv('SMTP_USER') ?: '';
            $smtpPass = getenv('SMTP_PASS') ?: '';
            $smtpFrom = getenv('SMTP_FROM') ?: $smtpUser;
            $smtpFromName = getenv('SMTP_FROM_NAME') ?: 'TechWorld LMS';
            $smtpSecure = strtolower(getenv('SMTP_SECURE') ?: 'tls');

            if ($smtpHost === '' || $smtpUser === '' || $smtpPass === '' || $smtpFrom === '') {
                throw new $exceptionClass('SMTP environment variables are not configured.');
            }

            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUser;
            $mail->Password = $smtpPass;
            $mail->SMTPSecure = ($smtpSecure === 'ssl') ? 'ssl' : 'tls';
            $mail->Port = $smtpPort;

            $mail->setFrom($smtpFrom, $smtpFromName);
            $mail->addAddress($to);

            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->addAttachment($tmp, 'lms_document.pdf');

            $mail->send();
            $success = 'Email sent successfully.';
        } catch (Exception $e) {
            $detail = $mail->ErrorInfo ?: $e->getMessage();
            $errors[] = 'Mailer Error: ' . $detail;
        }

        @unlink($tmp);
    }
}

$token = csrf_token();
?><!doctype html>
<html lang="<?= htmlspecialchars($dashboardLocale, ENT_QUOTES, 'UTF-8') ?>">
<head>
<meta charset="utf-8">
<title>Send PDF - LMS</title>
<link rel="stylesheet" href="/styles/main.css">
</head>
<body>
<div class="container">
    <div class="dropdown dashboard-language mb-3"><button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Language"><?= strtoupper(htmlspecialchars($dashboardLanguage, ENT_QUOTES, 'UTF-8')) ?></button><ul class="dropdown-menu"><li><a class="dropdown-item" lang="en" href="<?= htmlspecialchars(dashboard_lang_url('en'), ENT_QUOTES, 'UTF-8') ?>">English</a></li><li><a class="dropdown-item" lang="es" href="<?= htmlspecialchars(dashboard_lang_url('es'), ENT_QUOTES, 'UTF-8') ?>">Español</a></li><li><a class="dropdown-item" lang="fr" href="<?= htmlspecialchars(dashboard_lang_url('fr'), ENT_QUOTES, 'UTF-8') ?>">Français</a></li></ul></div><h1>Send PDF via Email</h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?php echo htmlspecialchars($e); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($token); ?>">
        <div>
            <label for="to">Recipient email</label>
            <input id="to" name="to" type="email" required value="<?php echo isset($_POST['to'])?htmlspecialchars($_POST['to']):''; ?>">
        </div>
        <div>
            <label for="subject">Subject</label>
            <input id="subject" name="subject" type="text" required value="<?php echo isset($_POST['subject'])?htmlspecialchars($_POST['subject']):'Your LMS PDF'; ?>">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6"><?php echo isset($_POST['message'])?htmlspecialchars($_POST['message']):"This PDF contains course information."; ?></textarea>
        </div>
        <div>
            <button type="submit">Generate PDF & Send</button>
        </div>
    </form>
</div>
</body>
</html>
