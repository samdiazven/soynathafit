<?php 
require 'Mailer.php';

    class Controllers 
    {
        public function __construct()
        {
            $this->views = new Views();
            $this->loadModel();
        }
        public function loadModel()
        {
            $model = get_class($this)."Model";
            $rootClass = "Models/".$model.".php";
            if(file_exists($rootClass))
            {
                require_once($rootClass);
                $this->model = new $model();
            }
        }
    }
?>