<?php
    class RutinasModel extends Mysql
    {
        public $intIdRoutine;
        public $intIdPrototype;
        public $intIdExercise;
        public $strName;
        public $strDescription;
        public $intWeek;
        public $intDay;
        public $strMode;

        public function __construct()
        {
            parent::__construct();
        }

        public function getRoutines()
        {
          $sql = "SELECT * FROM rutinas";
          $request = $this->selectAll($sql);
          return $request;
        }
        public function createRoutine(string $name, string $description, int $idPrototype, int $week)
        {
            $this->strName = $name;
            $this->strDescription = $description;
            $this->intIdPrototype = $idPrototype;
            $this->intWeek = $week;
            $sql = "INSERT INTO rutinas (name, description, id_prototype, week) VALUES (?,?,?,?)";
            $arrData = array($this->strName, $this->strDescription, $this->intIdPrototype, $this->intWeek);
            $insert = $this->insert($sql, $arrData);
            return $insert;
        }
        public function getRoutine(int $id)
        {
            $this->intIdRoutine = $id;
            $sql = "SELECT * FROM rutinas WHERE id=$this->intIdRoutine";
            $request = $this->select($sql);
            return $request;
        }
        public function ExercisesByRoutine(int $idRoutine, int $day)
        {
            $this->intIdRoutine = $idRoutine;
            $this->intDay = $day;
            $sql = "SELECT * FROM ejercicios_rutina INNER JOIN ejercicios WHERE ejercicios_rutina.id_ejercicio = ejercicios.id AND ejercicios_rutina.id_rutina = $this->intIdRoutine AND ejercicios_rutina.day = $this->intDay";
            $request = $this->selectAll($sql);
            return $request;
        }
        public function insertExercises(int $idRoutine, int $dayOfWeek, int $idEjercicio, string $mode, string $description)
        {
            $this->intIdRoutine = $idRoutine;
            $this->intDay = $dayOfWeek;
            $this->intIdExercise = $idEjercicio;
            $this->strMode = $mode;
            $this->strDescription = $description;
            $sql = "INSERT INTO ejercicios_rutina (id_ejercicio, id_rutina, mode, day, description) VALUES (?, ?, ?, ?, ?)";
            $arr = array($this->intIdExercise, $this->intIdRoutine, $this->strMode, $this->intDay, $this->strDescription);
            $insert = $this->insert($sql, $arr);
            return $insert;
        }
        public function deleteExercise(int $id)
        {
            $this->intIdExercise = $id;
            $sql = "DELETE FROM ejercicios_rutina WHERE idER = $this->intIdExercise";
            $delete = $this->delete($sql);
            return $delete;
        }
    }
?>