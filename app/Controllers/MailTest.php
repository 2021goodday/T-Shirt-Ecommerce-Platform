<?php

namespace App\Controllers;

use App\Config\MailConfig;

class MailTest extends BaseController
{
    public function sendTestEmail()
    {
        $mail = MailConfig::getMailer();
        if ($mail) {
            try {
                $mail->addAddress('investor11724@gmail.com', 'Investor11724'); // Replace with recipient email and name
                $mail->Subject = 'Test Email from CodeIgniter';
                $mail->Body    = 'This is a test email sent from the T-Shirt E-commerce Platform.';
                $mail->send();
                return 'Message has been sent successfully.';
            } catch (\Exception $e) {
                return 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            return 'Mailer could not be configured.';
        }
    }
}
