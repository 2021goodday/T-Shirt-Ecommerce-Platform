<?php

namespace App\Config;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailConfig {
    public static function getMailer() {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Outlook
            $mail->SMTPAuth = true;
            $mail->Username = 'programmer311698@outlook.com'; // email address
            $mail->Password = 'feggih-7koqci-kaRryq'; // email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS encryption
            $mail->Port = 587; // TCP port

            // Sender
            $mail->setFrom('programmer311698@outlook.com', 'T-Shirt E-commerce Platform');

            return $mail;
        } catch (Exception $e) {
            echo "Mail configuration error: " . $mail->ErrorInfo;
            return null;
        }
    }
}
