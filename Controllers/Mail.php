<?php
    class Mail extends Controllers 
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function sendMail()
        {
            $mail = new Mailer();
            $mail->sendMail();
        }
    }

?>