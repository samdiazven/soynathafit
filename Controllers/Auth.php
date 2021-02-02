<?php
    class Auth extends Controllers
    {
        public function __construct()
        {
            session_start();
            if(isset($_SESSION['login']))
            {
                header('location: '.base_url().'/Dashboard/dashboard');
            }
            parent::__construct();
        }

        public function login()
        {
            $data['js'] = 'Auth';
            $data['page_tag'] = "SoyNathaFit - Login";
            $this->views->getView($this, 'login', $data);
        }
        public function loginUser()
        {
            if($_POST)
            {
                $email = trim($_POST['email']);
                $password = hash("SHA256", $_POST['password']) ;
                $request = $this->model->loginUser($email, $password);
                if(empty($request))
                {
                    $arrResponse = array('status' => false, 'msg' => 'El usuario y/o el password son incorrectos');
                }else{
                    $arrData = $request;
                    if($arrData['enable'] == 1)
                    {
                        $_SESSION['idUser'] = $arrData['id'];
                        $_SESSION['login'] = true;
                        $dataUser =  $this->model->currentUser($_SESSION['idUser']);
                        $_SESSION['userData'] = $dataUser;
                        $arrResponse = array('status' => true, 'msg' => 'ok');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario Inahibilitado');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function logout()
        {
            session_start();
            session_unset();
            session_destroy();
            header('location: '.base_url().'/Auth/login');
        }
    }
?>