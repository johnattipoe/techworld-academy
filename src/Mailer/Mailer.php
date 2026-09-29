<?php
namespace TWApp;

class Mailer
{
    public static function send(array $opts): bool
    {
        // opts: to, subject, body, from, from_name
        $to = $opts['to'] ?? null;
        $subject = $opts['subject'] ?? '';
        $body = $opts['body'] ?? '';
        $from = $opts['from'] ?? getenv('SMTP_FROM') ?: 'noreply@localhost';
        $fromName = $opts['from_name'] ?? getenv('SMTP_FROM_NAME') ?: 'TechWorld';

        if (!$to) return false;

        $mailerClass = 'PHPMailer\\PHPMailer\\PHPMailer';

        if (class_exists($mailerClass)) {
            $mail = new $mailerClass(true);
            try {
                // SMTP settings from env
                $host = getenv('SMTP_HOST') ?: '';
                $port = (int)(getenv('SMTP_PORT') ?: 587);
                $user = getenv('SMTP_USER') ?: '';
                $pass = getenv('SMTP_PASS') ?: '';
                $secure = strtolower(getenv('SMTP_SECURE') ?: 'tls');

                if ($host === '' || $user === '' || $pass === '' || $from === '') {
                    error_log('Mailer error: SMTP environment variables are not configured.');
                    return false;
                }

                $mail->isSMTP();
                $mail->Host = $host;
                $mail->Port = $port;
                $mail->SMTPAuth = true;
                $mail->Username = $user;
                $mail->Password = $pass;
                $mail->SMTPSecure = ($secure === 'ssl') ? 'ssl' : 'tls';

                $mail->setFrom($from, $fromName);
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
                return true;
            } catch (\Exception $e) {
                error_log('Mailer error: ' . $e->getMessage());
                return false;
            }
        }

        error_log('Mailer error: PHPMailer dependency is missing.');
        return false;
    }
}
