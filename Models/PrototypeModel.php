<?php
    class PrototypeModel extends Mysql
    {
        public $strName;
        public $strDescription;
        public $intId;
        public function __construct()
        {
            parent::__construct();
        }
        public function obtenerPrototipos()
        {
            $sql = "SELECT * FROM prototype";
            $request = $this->selectAll($sql);
            return $request;
        }
        public function insertarPrototipo(string $name, string $description)
        {
            $this->strName = $name;
            $this->strDescription = $description;
            $sql = "INSERT INTO prototype (name, description) VALUES (?, ?)";
            $arr = array($this->strName, $this->strDescription);
            $request = $this->insert($sql, $arr);
            return $request;
           
        }
        public function getPrototype(int $id){
            $this->intId = $id;
            $sql = "SELECT * FROM prototype WHERE id=$this->intId";
            $request = $this->select($sql);
            return $request;
        }
        public function updatePrototype(int $id, string $name, string $description)
        {
            $this->intId = $id;
            $this->strName = $name;
            $this->strDescription = $description;
            $sql = "SELECT * FROM prototype WHERE name='$this->strName' AND id!=$this->intId";
            $requestSelect = $this->select($sql);
            if(empty($requestSelect)){
                $sqlUpdate = "UPDATE prototype set name=?, description=? WHERE id=$this->intId";
                $arrData = array($this->strName, $this->strDescription);
                $request = $this->update($sqlUpdate, $arrData);
            }else{
                $request = 'exist';
            }
            return $request;
        }
        public function deletePrototype(int $id)
        {
            $this->intId = $id;
            $preSql = "SELECT * FROM prototype WHERE id= $this->intId";
            $request = $this->select($preSql);
            if(empty($request)){
                $response ='error';
            }else{
                $sql = "DELETE FROM prototype WHERE id=$this->intId";
                $requestDel = $this->delete($sql);
                if(!empty($requestDel)){
                    $response = 'ok';
                }else{
                    $response = "error";
                }
            }
            
            return $response;
        }
        public function getUsers()
        {
            $sql = "SELECT * FROM usuarios WHERE enable = 1 AND role = 1";
            $request = $this->selectAll($sql);
            return $request;
        }
    }
?>