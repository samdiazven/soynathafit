<?php
    class UsuariosModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();   
        }
        public function getUsuarios()
        {
            $sql = "SELECT * FROM usuarios";
            $select = $this->selectAll($sql);
            return $select;
        }
    }
?>