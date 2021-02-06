<?php
    class Dashboard extends Controllers
    {
        public function __construct()
        {
            parent::__construct();

            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
        }
        public function dashboard()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Dashboard-SoyNathafit";
            $data['page_name'] = "Dashboard";
            $data['js'] = 'Dashboard';
            if($_SESSION['userData']['role'] == 1) {
                $personalData = $this->model->getPDATA($_SESSION['idUser']);
                $data['pdata'] = $personalData;
                $this->views->getView($this, "dashboard_client", $data);
            }else{
                $numberClient = count($this->model->getClients());
                $numberPersonal = count($this->model->getPersonal());
                $clientsAvailable = count($this->model->getClientsAvailable());
                $data['numberClients'] = $numberClient;
                $data['numberPersonal'] = $numberPersonal;
                $data['clientsAvailable'] = $clientsAvailable;
                $this->views->getView($this, "dashboard_admin", $data);
            }
        }
        
        
    }
?>