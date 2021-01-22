<?php
    class RutinasModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getRoutines()
        {
          $sql = "SELECT * FROM rutinas";
          $request = $this->selectAll($sql);
          return $request;
        }
    }
?>