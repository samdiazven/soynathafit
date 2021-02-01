<?php
    class Auth extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function login()
        {
            $data['page_id'] = 10;

            $this->views->getView($this, 'login', $data);
        }
    }
?>