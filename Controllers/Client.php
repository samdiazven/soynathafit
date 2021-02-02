<?php

    class Client extends Controllers 
    { 
        public $intId; 
        public $intWeek;
        public $intPrototypeTrainer;

        public function __construct()
        {
            parent::__construct();
            
            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
            $this->intId = $_SESSION['idUser'];
            $this->intPrototypeTrainer = $_SESSION['userData']['id_prototype'];
        }
        public function routine()
        {
            $data['page_tag'] = 'Mis Rutinas - SoyNathaFit';
            $data['js'] = 'Client';
            $data['day'] = date('N') - 1;
            $this->views->getView($this, 'routine', $data);
        }
        public function diet()
        {
            $data['js'] = 'Client';
            $this->views->getView($this, 'diet', $data);
        }
        public function data()
        {
            $data['js'] = 'Client';
            $this->views->getView($this, 'data', $data);
        }

        public function getRoutine($week) 
        {
            $this->intWeek = $week;
            $request = $this->model->getRoutine($this->intPrototypeTrainer, $this->intWeek);
            if(empty($request))
            {
                $arrData = array('status' => false, 'msg' => 'No hay Datos Para Mostrar');
            }else {
                $arrData = array('status' => true, 'data' => $request);
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>