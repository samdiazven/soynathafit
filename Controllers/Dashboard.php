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
            $data['esteban'] = 'esteban';
            $this->views->getView($this, "dashboard", $data);
        }
        
   }
?>