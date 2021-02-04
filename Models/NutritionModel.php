<?php
    /**
     * @property int $idPrototype
     * @property int $idRutinas
     * @property string $name
     * @property string|null $description
     * @property string $archivo
     * @property int $week
     */
    class NutritionModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function createDiet(int $idPrototype, string $name, string $description, int $week, string $archivo)
        {
            $this->idPrototype = $idPrototype;
            $this->name = $name;
            $this->description = $description;
            $this->archivo = $archivo;
            $this->week = $week;
            
            $sql = "INSERT INTO dietas (name, description, file, week, id_prototype) VALUES (?, ?, ?, ?, ?)";
            $array = array($this->name, $this->description, $this->archivo, $this->week, $this->idPrototype);
            $insert = $this->insert($sql, $array);
            return $insert;
        }

        public function getDiets()
        {
            $sql = "SELECT * FROM dietas WHERE 1";
            $request = $this->selectAll($sql);
            return $request;
        }
        public function getDiet( int $id)
        {
            $this->idRutinas = $id;
            $sql = "SELECT * FROM dietas WHERE id = $this->idRutinas";
            $request = $this->select($sql);
            return $request;
        }
        public function getPrototype(int $id)
        {
            $this->idPrototype = $id;
            $sql = " SELECT  name, description FROM prototype_nutricionista WHERE id = $this->idPrototype";
            $request = $this->select($sql);
            return $request;
        }
        public function deleteDiet(int $id)
        {
            $this->idRutinas = $id;
            $sql = "DELETE FROM dietas WHERE id = $this->idRutinas";
            $request = $this->delete($sql);
            return $request;
        }
    }

?>