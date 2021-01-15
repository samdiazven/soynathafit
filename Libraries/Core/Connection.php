<?php 
    class Connection 
    {
        private $connection;

        public function __construct()
        {
            $connectionString = "mysql:hos=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try
            {
                $this->connection = new PDO($connectionString, DB_USER, DB_PASSWORD);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                $this->connection = "ERROR DE CONEXION";
                echo "ERROR: ". $e->getMessage();
            }
        }
        public function connect()
        {
            return $this->connection;
        }
    }
?>