<?php

/**
 * @property int $idUser
 */

class DashboardModel extends Mysql 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getPDATA($id)
    {
        $this->idUser = $id;
        $sql = "SELECT * FROM data_personal WHERE id_usuario = $this->idUser";
        $request = $this->select($sql);
        return $request;
    }
    public function getPersonal() {
        $sql = "SELECT * FROM usuarios WHERE role != 1 AND enable = 1";
        $request = $this->selectAll($sql);
        return $request;
    }
    public function getClientsAvailable() {
        $sql = "SELECT * FROM usuarios WHERE role = 1 AND enable = 1";
        $request = $this->selectAll($sql);
        return $request;
    }
    public function getClients() {
        $sql = "SELECT * FROM usuarios WHERE role = 1 ";
        $request = $this->selectAll($sql);
        return $request;
    }
}
?>