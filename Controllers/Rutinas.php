<?php
    class Rutinas extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function rutinas()
        {
            $data['page_id'] =  8;
            $data['js'] = "Rutinas";
            $data['page_tag'] = "Rutinas-SoyNathafit";
            $data['page_title'] = "Rutinas-SoyNathafit";
            $data['page_name'] = "Rutinas";
            $this->views->getView($this, 'rutinas', $data);
        }
        public function getRoutines()
        {
            $arrData = $this->model->getRoutines();
            for($i=0; $i<count($arrData); $i++)
            {
                $arrData[$i]['content'] = '<li class="nav-item" ><a class="nav-link btnRoutine btn btn-primary mr-2 ml-2 mt-1" onclick="selectRoutine('.$arrData[$i]['id'].');" rel="'.$arrData[$i]['id'].'">'.$arrData[$i]['name'].'</a></li>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();

        }
        public function createRoutine()
        {
            if($_POST)
            {
                $strName = $_POST['name'];
                $strDescription = $_POST['description'];
                $intIdPrototype = intval($_POST['idPrototype']);
                $intWeek = intval($_POST['week']);
                $request = $this->model->createRoutine($strName, $strDescription, $intIdPrototype, $intWeek);
                if($request > 0){
                    $arrData = array('status' => true, 'msg' => 'Guardado Correctamente');
                }else{
                    $arrData = array('status' => false, 'msg' => 'Hubo un error al guardar los datos');
                }

            }else{
                $arrData = array('status' => false, 'msg' => 'Hubo un error');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getRoutine($id)
        {
            $intId = intval($id);
            $request = $this->model->getRoutine($intId);
            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else{
                $arrData = array('status' => false, 'msg' => "Hubo un error");
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function exercisesByRoutine($params)
        {
            $explode = explode(',', $params);
            $idRoutine = $explode[0];
            $day = $explode[1];
            $intId = intval($idRoutine);
            $intDay = intval($day);
            $request = $this->model->ExercisesByRoutine($intId, $intDay);
            if(!empty($request)){
                $arrData = array('status' => true, 'data' => $request);
            }else{
                $arrData = array('status' => true, 'msg' => "Hubo un error");
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function insertExercises()
        {
            if($_POST)
            {
                $idRoutine = $_POST['idRoutine'];
                $dayOfWeek = $_POST['dayOfWeek'];
                $idEjercicio = $_POST['idEjercicio'];
                $mode = $_POST['mode'];
                $description = $_POST['description'];
                $request = $this->model->insertExercises($idRoutine, $dayOfWeek, $idEjercicio, $mode, $description);

                if($request > 0)
                {
                    $arrData = array('status' => true, 'msg' => 'Guardado Correctamente');
                }else{
                    $arrData = array('status' => false, 'msg' => 'Hubo un error');
                }
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function deleteExercise($id)
        {
            $intId = intval($id);
            $request = $this->model->deleteExercise($intId);
            if(!empty($request))
            {
                $arrData = array('status' => true, 'msg' => 'Eliminado Sastifactoriamente');
            }else{
                $arrData = array('status' => false, 'msg' => 'Hubo un error');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        
    }
?>