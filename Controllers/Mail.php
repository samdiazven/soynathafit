<?php
    class Mail extends Controllers 
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function sendMail($params)
        {
            $explode = explode(',',  $params);
            dep($explode);
            $mail = new Mailer();
            $mail->sendMail($explode[0], $explode[1]);
        }
    }

?>