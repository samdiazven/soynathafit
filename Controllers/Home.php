<?php
    class Home extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function home()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "home";
            $data['page_title'] = "Pagina Principal";
            $data['page_name'] = "Home";
            $this->views->getView($this, "home", $data);
        }
        
   }
?>