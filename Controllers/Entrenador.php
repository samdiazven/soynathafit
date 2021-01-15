<?php
    class Entrenador extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function ejercicios()
        {
            $data['page_id'] = 3;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Ejercicios-SoyNathafit";
            $data['page_name'] = "Ejercicios";
            $this->views->getView($this, "ejercicio", $data);
        }
        public function rutinas()
        {
            $data['page_id'] = 4;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Rutinas-SoyNathafit";
            $data['page_name'] = "Rutinas";
            $this->views->getView($this, "rutina", $data);
        }
        
                
    }
?>