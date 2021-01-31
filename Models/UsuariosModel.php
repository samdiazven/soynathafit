<?php
    class UsuariosModel extends Mysql
    {
        public $strName;
        public $strEmail;
        public $strPassword;
        public $intId;
        public $intEnable;
        public $intPrototype;
        public $intRole;

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
        public function createUser(string $name, string $email, int $role, int $enable)
        {
            $this->strName = $name;
            $this->strEmail = $email;
            $this->intRole = $role;
            $this->intEnable = $enable;
            $sql = "INSERT INTO usuarios (name, email, role, enable) VALUES (?, ?, ?, ?)";
            $array = array($this->strName, $this->strEmail, $this->intRole, $this->intEnable);
            $request = $this->insert($sql, $array);
            return $request;
        }
        public function getUserByEmail(string $email, int $role) {
            $this->strEmail = $email;
            $this->intRole = $role;
            $select = "SELECT * FROM usuarios WHERE email = '$this->strEmail' AND role = $role";
            $request = $this->select($select);
            return $request;
        } 
        public function updateUser(int $id, string $name, string $email, int $role, int $enable) {
            $this->intId = $id;
            $this->strName = $name;
            $this->strEmail = $email;
            $this->intRole = $role;
            $this->intEnable = $enable;
            $sql = "UPDATE usuarios set name = ?, email = ?, role = ?, enable = ? WHERE id=$this->intId";
            $array = array($this->strName, $this->strEmail, $this->intRole, $this->intEnable);
            $request = $this->update($sql, $array);
            return $request;
        }
        public function deleteUser(int $id)
        {
            $this->intId = $id;
            $sql = "DELETE FROM usuarios WHERE id = $this->intId";
            $request = $this->delete($sql);
            return $request;
        }
        public function getUserById(int $id) {
            $this->intId = $id;
            $select = "SELECT * FROM usuarios WHERE id = $this->intId";
            $request = $this->select($select);
            return $request;
        }
    }
?>