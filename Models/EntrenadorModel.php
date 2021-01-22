<?php
    class EntrenadorModel extends Mysql
    {
        public $intIdEjercicio;
        public $strName;
        public $strDescription;
        public $strUri;
        public function __construct()
        {
            parent::__construct();
        }
        public function getExercises()
        {
            $sql = "SELECT * FROM ejercicios WHERE 1";
            $request = $this->selectAll($sql);
            return $request;

        }
        public function insertExercise(string $name, string $description, string $uri)
        {
            $this->strName = $name;
            $this->strDescription = $description;
            $this->strUri = $uri;

            $query_insert = "INSERT INTO ejercicios(name, description, uri) VALUES(?, ?, ?)";
            $arrData = array($this->strName, $this->strDescription, $this->strUri);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }
        public function selectExercise(int $idExercise)
        {
            $this->intIdEjercicio = $idExercise;

            $query = "SELECT * FROM ejercicios WHERE  id = $this->intIdEjercicio";
            $request = $this->select($query);
            return $request;
        }
        public function updateExercise(int $id, string $name, string $description, string $uri){
            $this->intIdEjercicio = $id;
            $this->strName = $name;
            $this->strDescription = $description;
            $this->strUri = $uri;
            $preSql = "SELECT * FROM ejercicios WHERE name='$this->strName' AND id !=$this->intIdEjercicio";
            $request =  $this->select($preSql);
            if(empty($request)){
                $sql = "UPDATE ejercicios SET name=?, description=?, uri=? WHERE id=$this->intIdEjercicio";
                $arrData = array($this->strName, $this->strDescription, $this->strUri);
                $request = $this->update($sql, $arrData);
            }else{
                $request = "exist";
            }
            return $request;
        }
        public function deleteExercise(int $id){
            $this->intIdEjercicio = $id;
            $preSql = "SELECT * FROM ejercicios WHERE id= $this->intIdEjercicio";
            $request = $this->select($preSql);
            if(empty($request))
            {
                $response = "error";
            }else{
                $sql = "DELETE FROM ejercicios WHERE id=$this->intIdEjercicio";
                $delete = $this->delete($sql);
                if(!empty($delete)){
                    $response = 'ok';
                }else {
                    $response ="error";
                }
            }
            return $response;
        }
    }

?>