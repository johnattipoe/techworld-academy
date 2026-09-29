TechWorld Academy — PDF + PHPMailer examples

This workspace contains example code that generates PDFs with FPDF and sends them with PHPMailer.

Files of interest
- `examples/send_pdf_with_phpmailer.php` — CLI example that generates a PDF and sends it via PHPMailer.
- `lms-dashboard/send_pdf.php` — A small web form to generate a PDF and email it. Restricted to logged-in users via the site's `system files/function.php` helper.

Configuration (Windows PowerShell)

1) Recommended: use Composer to install PHPMailer and dependencies

Open PowerShell in the project root and run:

```powershell
cd "C:\Users\JOYCE\3D Objects\TECHWORLD ACADEMY AND SOLUTION"
composer require phpmailer/phpmailer
```

This creates `vendor/autoload.php` which the examples require.

2) Set environment variables in PowerShell (temporary for the session)

```powershell
$env:SMTP_HOST = 'smtp.example.com'
$env:SMTP_PORT = '587'
$env:SMTP_USER = 'user@example.com'
$env:SMTP_PASS = 'secret'
$env:SMTP_FROM = 'user@example.com'
$env:SMTP_FROM_NAME = 'TechWorld LMS'
$env:SMTP_SECURE = 'tls'
```

To make them persistent across PowerShell sessions, use `[Environment]::SetEnvironmentVariable` (requires admin for Machine-level):

```powershell
[Environment]::SetEnvironmentVariable('SMTP_HOST','smtp.example.com','User')
[Environment]::SetEnvironmentVariable('SMTP_PORT','587','User')
[Environment]::SetEnvironmentVariable('SMTP_USER','user@example.com','User')
[Environment]::SetEnvironmentVariable('SMTP_PASS','secret','User')
[Environment]::SetEnvironmentVariable('SMTP_FROM','user@example.com','User')
[Environment]::SetEnvironmentVariable('SMTP_FROM_NAME','TechWorld LMS','User')
[Environment]::SetEnvironmentVariable('SMTP_SECURE','tls','User')
```

Note: Avoid committing secrets into source control. Prefer a secrets manager or environment-based provisioning for production.

3) Running the CLI example

```powershell
php .\examples\send_pdf_with_phpmailer.php
```

4) Running the web form locally (for testing)

```powershell
php -S localhost:8000 -t "C:\Users\JOYCE\3D Objects\TECHWORLD ACADEMY AND SOLUTION"

php -S localhost:8000 -t .

http://localhost:8000/index/index.php

# Browse to: http://localhost:8000/lms-dashboard/send_pdf.php
```

Security checklist
- Store SMTP credentials in environment variables or a secrets manager. Do not check them into Git.
- The `lms-dashboard/send_pdf.php` page is restricted with `require_login()` using the project's `system files/function.php`. Ensure your session handling is secure (cookie flags, session_regenerate_id on login, HTTPS in production).
- Rate-limit or restrict the send action to prevent abuse (e.g., only allow logged-in users and throttle frequency).
- Log errors server-side rather than displaying detailed error messages to users.
- Validate and sanitize all user inputs (the example uses basic email validation and HTML-escapes message content).

If you'd like, I can:
- Wire `lms-dashboard/send_pdf.php` directly into a specific LMS page or navigation item.
- Add server-side logging of send attempts (file or DB) with success/failure state.
- Add rate-limiting or per-user quotas.

