<?php
    class Mysql extends Connection
    {
        private $connection;
        private $strQuery;
        private $arrValues;

        function __construct()
        {
            $this->connection = new Connection();
            $this->connection = $this->connection->connect();
        }

        ///Insertar registros
        public function insert(string $query, array $values)
        {
            $this->strQuery = $query;
            $this->arrValues = $values;
            $insert = $this->connection->prepare($this->strQuery);
            $resInsert = $insert->execute($this->arrValues);
            if($resInsert)
            {
                $lastInsert = $this->connection->lastInsertId();
            }else{
                $lastInsert = 0;
            }
            return $lastInsert;
        }
        ////Buscar un Registro
        public function select(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        //Todos los registros
        public function selectAll(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
        //Actualizar Registro
        public function update(string $query, array $values)
        {
            $this->strQuery = $query;
            $this->arrValues =  $values;
            $update = $this->connection->prepare($this->strQuery);
            $resData = $update->execute($this->arrValues);
            return $resData;
        }
        //BORRAR UN REGISTRO
        public function delete(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $resData = $result->execute();
            return $resData;
        }
    }
?>