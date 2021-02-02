<?php
/**
 * @property int $id
 * @property int $week
 * @property int|null $prototypeTrainer
 */
    class ClientModel extends Mysql
    {
        private $id;
        private $week;
        private $prototypeTrainer;

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
    }
?>