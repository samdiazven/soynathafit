<?php
    class HomeModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function insertUser(string $name, string $email, string $password, int $role, int $prototype)
        {
            $query_insert= "INSERT INTO users(name, email, password, role, prototype) VALUES(?,?,?,?,?)";
            $arrData = array($name, $email, $password, $role, $prototype);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }
        public function getUser(int $id)
        {
            $query = "SELECT * FROM users WHERE id=$id";
            $request = $this->select($query);
            return $request;

        }
        public function updateUserr(int $id, string $name, string $email, string $password, int $role, int $prototype )
        {
            $query_update = "UPDATE users SET name = ?, email = ?, password = ?, role = ?, prototype= ? WHERE id=$id";
            $arrData = array($name, $email, $password, $role, $prototype);
            $request = $this->update($query_update, $arrData);
            return $request;
        }

        public function getAllUsers()
        {
            $queryAll = "SELECT * FROM users WHERE 1";
            $request = $this->selectAll($queryAll);
            return $request;
        }

    }
?>