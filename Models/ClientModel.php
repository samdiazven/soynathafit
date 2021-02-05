<?php
/**
 * @property int $id
 * @property int $idPD
 * @property int $week
 * @property int|null $prototypeTrainer
 * @property int|null $prototypeNutrition
 * @property float $height
 * @property float $weight
 * @property float|null $grease
 * @property float $imc
 * @property string $gender
 * @property int $age
 * @property float|null $waist
 * @property string $activity
 * @property string $alergies
 * @property string $operations
 * @property string $patology
 */
    class ClientModel extends Mysql
    {
        private $id;
        private $week;
        private $prototypeTrainer;
        private $prototypeNutrition;

        public function __construct()
        {
            parent::__construct();
        }
        public function getRoutine(int $idPrototype, int $week)
        {
            $this->prototypeTrainer = $idPrototype;
            $this->week = $week;
            $sql = "SELECT * FROM rutinas WHERE id_prototype = $this->prototypeTrainer AND week = $this->week";
            $request = $this->select($sql);
            return $request;
        }
         public function getDiet(int $idPrototype, int $week)
        {
            $this->prototypeNutrition = $idPrototype;
            $this->week = $week;
            $sql = "SELECT * FROM dietas WHERE id_prototype = $this->prototypeNutrition AND week = $this->week";
            $request = $this->select($sql);
            return $request;
        }
        public function addData(
                int $id,
                float $height,
                float $weight,
                string $gender,
                string $age,
                float $waist,
                string $patology,
                string $operations,
                string $alergies,
                float $imc,
                float $grease,
                string $activity
        )
        {
            $this->id = $id;
            $this->height = $height;
            $this->weight = $weight;
            $this->gender = $gender;
            $this->age = $age;
            $this->waist = $waist;
            $this->patology = $patology;
            $this->operations = $operations;
            $this->alergies = $alergies;
            $this->imc = $imc;
            $this->grease = $grease;
            $this->activity = $activity;

            $sql = "INSERT INTO data_personal (id_usuario, altura, peso, sexo, edad, grasa, imc, patologia, operaciones, alergias, registro_actividad, perimetro_cintura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $array = array(
                $this->id,
                $this->height,
                $this->weight,
                $this->gender,
                $this->age,
                $this->grease,
                $this->imc,
                $this->patology,
                $this->operations,
                $this->alergies,
                $this->activity,
                $this->waist
            );
            $request = $this->insert($sql, $array);
            return $request;
        }
        public function getData(int $id)
        {
            $this->id = $id;
            $sql = "SELECT * FROM data_personal WHERE id_usuario = $this->id";
            $request = $this->select($sql);
            return $request;
        }
        public function updateData(
                int $id,
                float $height,
                float $weight,
                string $gender,
                string $age,
                float $waist,
                string $patology,
                string $operations,
                string $alergies,
                float $imc,
                float $grease,
                string $activity
        )
        {
            $this->idPD = $id;
            $this->height = $height;
            $this->weight = $weight;
            $this->gender = $gender;
            $this->age = $age;
            $this->waist = $waist;
            $this->patology = $patology;
            $this->operations = $operations;
            $this->alergies = $alergies;
            $this->imc = $imc;
            $this->grease = $grease;
            $this->activity = $activity;

            $sql = "UPDATE data_personal SET altura = ?, peso = ?, sexo =?, edad=?, grasa=?, imc=?, patologia=?, operaciones=?, alergias=?, registro_actividad=?, perimetro_cintura=? WHERE idPD = $this->idPD";
            $array = array(
                $this->height,
                $this->weight,
                $this->gender,
                $this->age,
                $this->grease,
                $this->imc,
                $this->patology,
                $this->operations,
                $this->alergies,
                $this->activity,
                $this->waist
            );
            $request = $this->insert($sql, $array);
            return $request;
        }
    }
?>