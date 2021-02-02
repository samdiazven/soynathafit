<?php
    class Entrenador extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
        }
        public function ejercicios()
        {
            $data['page_id'] = 3;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Ejercicios-SoyNathafit";
            $data['page_name'] = "Ejercicios";
            $data['js'] = "Entrenador";
            $this->views->getView($this, "ejercicio", $data);
        }
        public function rutinas()
        {
            $data['page_id'] = 4;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Rutinas-SoyNathafit";
            $data['page_name'] = "Rutinas";
            $this->views->getView($this, "rutina", $data);
        }
        
        public function obtenerEjercicios()
        {
            $arrData = $this->model->getExercises();
            for ($i = 0; $i < count($arrData); $i ++)
            {
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-primary btn-sm btnEditEjer" rel="'.$arrData[$i]['id'].'" title="Editar" ><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-sm btnDelEjer" rel="'.$arrData[$i]['id'].'" title="Eliminar" ><i class="fa fa-times"></i></button>
                                           </div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function setEjercicio()
        {
            $idIntEjer = intval($_POST['idEjercicio']);
            $strName = trim($_POST['name']);
            $strDescription = trim($_POST['description']);
            $strUri = $_POST['uri'];
            if($idIntEjer == 0){
                $requestEjercicio = $this->model->insertExercise($strName, $strDescription, $strUri);
                $option = 1;
            }else{
                $requestEjercicio = $this->model->updateExercise($idIntEjer, $strName, $strDescription, $strUri);
                $option = 2;
            }

            if($requestEjercicio > 0)
            {
                if($option == 1){
                $arrResponse = array('status' => true, 'msg' => 'Se ha Guardado Correctamente');
                }
                else{
                $arrResponse = array('status' => true, 'msg' => 'Se ha Actualizado Correctamente');
                }
            
            }else if($requestEjercicio == 'exist'){
                $arrResponse = array('status' => false, 'msg' => 'Atencion Video Ya Existe');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'No se han podido almacenar los Datos');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getEjercicio(int $idEjercicio)
        {
            $idIntEjer = intval($idEjercicio);
            if($idIntEjer > 0)
            {
                $arrData = $this->model->selectExercise($idIntEjer);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no Encontrados');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function delEjercicio()
        {
            if($_POST)
            {
                $intIdEjer = intval($_POST['idEjer']);
                $requestDelete = $this->model->deleteExercise($intIdEjer);
                if($requestDelete == 'ok')
                {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Ejercicio');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Ejercicio');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }   
            die();
        }

        public function prototype()
        {
            $data['page_title'] = "Usuarios";
            $data['js'] = 'ADDPROTOTYPE';
            $data['page_tag'] = "Usuarios -  SoyNathaFit";
            $this->views->getView($this, 'prototype', $data);
        }
                
    }
?>