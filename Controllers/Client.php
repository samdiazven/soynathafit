<?php
    /**
     * @property int $intId
     * @property int $intWeek
     * @property int $intPrototypeTrainer
     * @property int $intPrototypeNutrition
     */
    class Client extends Controllers 
    { 
        public $intId; 
        public $intWeek;
        public $intPrototypeTrainer;
        public $intPrototypeNutrition;

        public function __construct()
        {
            parent::__construct();
            
            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
            $this->intId = $_SESSION['idUser'];
            $this->intPrototypeTrainer = $_SESSION['userData']['id_prototype'];
            $this->intPrototypeNutrition = $_SESSION['userData']['id_prototype_nutricionista'];
        }
        public function routine()
        {
            $data['page_tag'] = 'Mis Rutinas - SoyNathaFit';
            $data['js'] = 'Client';
            $data['day'] = date('N');
            $this->views->getView($this, 'routine', $data);
        }
        public function diet()
        {
            $data['page_tag'] = 'Mis Dietas - SoyNathaFit';
            $data['js'] = 'Client';
            $this->views->getView($this, 'diet', $data);
        }
        public function data()
        {
            $data['page_tag'] = 'Mis Datos - SoyNathaFit';
            $data['js'] = 'Data';
            $this->views->getView($this, 'data', $data);
        }

        public function getRoutine($week) 
        {
            $this->intWeek = $week;
            $request = $this->model->getRoutine($this->intPrototypeTrainer, $this->intWeek);
            if(empty($request))
            {
                $arrData = array('status' => false, 'msg' => 'No hay Datos Para Mostrar');
            }else {
                $arrData = array('status' => true, 'data' => $request);
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getDiet($week)
        {
            $this->intWeek = $week;
            $request = $this->model->getDiet($this->intPrototypeNutrition, $this->intWeek);

            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else {
                $arrData = array('status' => false, 'msg' => "No se encontro dieta para esta Semana!");
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function addData()
        {
            if($_POST)
            {
                $idPD = intval($_POST['idPD']);
                $height = $_POST['height'];
                $weight = $_POST['weight'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $waist = $_POST['waist'];
                $activity = $_POST['activity'];
                $patology = $_POST['patology'];
                $operations = $_POST['operations'];
                $alergies = $_POST['alergies'];
                $imc = getIMC($weight, $height);
                if(!empty($waist)){
                    $grease = getGrease($waist, $gender, $age);
                }else {
                    $grease = "";
                }
                if($_POST['isModifiable'] === 'true'){
                    $request = $this->model->updateData(
                    $idPD,
                    $height,
                    $weight,
                    $gender,
                    $age,
                    $waist,
                    $patology,
                    $operations,
                    $alergies,
                    $imc,
                    $grease,
                    $activity
                    );
                    if($request != null) {
                        $arrData = array('status' => true, 'msg' => 'Actualizado Satisfactoriamente');
                    }else {
                        $arrData = array('status' => false, 'msg' => 'Oopps hubo un error');
                    }
                }
                else {
                    $request = $this->model->addData(
                    $this->intId,
                    $height,
                    $weight,
                    $gender,
                    $age,
                    $waist,
                    $patology,
                    $operations,
                    $alergies,
                    $imc,
                    $grease,
                    $activity
                    );
                    if($request > 0) {
                        $arrData = array('status' => true, 'msg' => 'guardado Satisfactoriamente');
                    }else {
                        $arrData = array('status' => false, 'msg' => 'Oopps hubo un error');
                    }
                }
                
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        public function getData()
        {
            $request = $this->model->getData($this->intId);
            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else {
                $arrData = array('status' => false);
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getDataPersonal($id)
        {
            $request = $this->model->getData($id);
            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else {
                $arrData = array('status' => false);
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>
