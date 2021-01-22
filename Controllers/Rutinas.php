<?php
    class Rutinas extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function rutinas()
        {
            $data['page_id'] =  8;
            $data['js'] = "Rutinas";
            $data['page_tag'] = "Rutinas-SoyNathafit";
            $data['page_title'] = "Rutinas-SoyNathafit";
            $data['page_name'] = "Rutinas";
            $this->views->getView($this, 'rutinas', $data);
        }
        public function getRoutines()
        {
            $arrData = $this->model->getRoutines();
            for($i=0; $i<count($arrData); $i++)
            {
                $arrData[$i]['content'] = '<li class="nav-item"><a class="nav-link" href="#" rel="'.$arrData[$i]['id'].'"><i class="fa fa-envelope-o fa-fw"></i> '.$arrData[$i]['name'].'</a></li>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();

        }
    }
?>