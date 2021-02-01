<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Mail/Exception.php';
require 'Mail/PHPMailer.php';
require 'Mail/SMTP.php';

    class Mailer extends PHPMailer
    {
        public function __construct()
        {
            parent::__construct(true);
        }
        public function sendMail()
        {
            try {
                //Server settings
                $this->isSMTP();                                            // Send using SMTP
                $this->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $this->SMTPAuth   = true;                                   // Enable SMTP authentication
                $this->Username   = 'samueldiazven.sd@gmail.com';                     // SMTP username
                $this->Password   = 'samuel.1997';                               // SMTP password
                $this->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $this->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $this->setFrom('samueldiazven.sd@gmail.com', 'Samuel Diaz');
                $this->addAddress('samueldiazkoc@gmail.com');     // Add a recipient
                // $this->addAddress('ellen@example.com');               // Name is optional
                // $this->addReplyTo('info@example.com', 'Information');
                // $this->addCC('cc@example.com');
                // $this->addBCC('bcc@example.com');

                // Attachments
                // $this->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $this->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $this->isHTML(true);                                  // Set email format to HTML
                $this->Subject = 'Here is the subject';
                $this->Body    = 'This is the HTML message body <b>in bold!</b>';
                $this->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $this->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
            }
        }
    }
   

?>