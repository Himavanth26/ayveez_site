Ayveez Systems - simple site package
===================================

Included:
- index.php
- contact.php (PHPMailer example + fallback)
- assets/css/styles.css (blur+fade+gradient overlay for background)
- assets/js/main.js
- assets/images/Logo.png  <- copied from uploaded screenshot: /mnt/data/Screenshot 2025-11-24 102943.png
- assets/images/hero-right.jpg <- same screenshot used for hero visual

How to use
----------
1. Extract the zip to your web server document root (e.g., C:/xampp/htdocs/ayveez_site or /var/www/html/ayveez_site).
2. Ensure folder structure is preserved.

PHPMailer setup (recommended)
-----------------------------
1. Install PHPMailer with Composer in the site root:
   composer require phpmailer/phpmailer

2. Edit contact.php and set SMTP credentials:
   $smtpHost = 'smtp.example.com';
   $smtpUser = 'smtp_user@example.com';
   $smtpPass = 'smtp_password';
   $smtpPort = 587;
   $to = 'hello@ayveez.com';

3. After installing composer packages, contact.php will detect vendor/autoload.php and use PHPMailer to send emails.

Local dev note (XAMPP)
----------------------
- PHP's mail() often won't work on local XAMPP. Use PHPMailer with SMTP (for example, use Gmail SMTP or a service like SendGrid).
- If mail sending fails the script writes contact-log.txt to the site root for debugging.

Files included
--------------
- assets/images/Logo.png  (copied from your uploaded screenshot)
- assets/images/hero-right.jpg  (copied from your uploaded screenshot)

Download
--------
The packaged zip is available for download as 'ayveez_site.zip'.
