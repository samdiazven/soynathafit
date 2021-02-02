<?php
    class AuthModel extends Mysql
    {
        private $strEmail;
        private $strPassword;
        private $intIdUser;
        private $strToken;

        public function __construct()
        {
            parent::__construct();   
        }

        public function loginUser(string $email, string $password)
        {
            $this->strEmail = $email;
            $this->strPassword = $password;

            $sql = "SELECT  id, enable FROM usuarios WHERE email='$this->strEmail' AND password = '$this->strPassword'";
            $request = $this->select($sql);
            return $request;
        }
        public function currentUser(int $id)
        {
            $this->intIdUser = $id;
            $sql = "SELECT * FROM usuarios WHERE id = $this->intIdUser";
            $request = $this->select($sql);
            return $request;
        }
    }
?>