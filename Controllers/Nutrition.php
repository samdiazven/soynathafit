<?php 
    class Nutrition extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
        }
        
        public function diet()
        {
            $data['js'] = "Diet";
            $data['page_tag'] = "Dietas - SoyNathaFit";
            $data['page_title'] = "Dietas - SoyNathaFit";
            $data['page_id'] = 12;
            $this->views->getView($this, 'diet', $data);
        }
        public function prototype()
        {
            $data['js'] = "Nutrition";
            $data['page_tag'] = "Prototipos - SoyNathaFit";
            $data['page_title'] = "Prototipos - SoyNathaFit";
            $data['page_id'] = 13;
            $this->views->getView($this, 'prototype', $data);
        }
        public function users()
        {
            $data['js'] = "Nutrition";
            $data['page_tag'] = "Usuarios - SoyNathaFit";
            $data['page_title'] = "Usuarios - SoyNathaFit";
            $data['page_id'] = 14;
            $this->views->getView($this, 'users', $data);
        }

        public function addDiet() {
            if($_POST && $_FILES)
            {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $idPrototype = intval($_POST['idPrototype']);
                $week = intval($_POST['week']);

                $directorio = 'Assets/dietas/';
                $archivo = $directorio . basename($_FILES['file']['name']);
                $nameArchivo = $_FILES['file']['name'];
                $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                if($tipoArchivo !== 'pdf') {
                    $arrData = array('status' => false, 'msg' => 'Solo se Aceptan Archivos PDF');
                }
                else { 
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                        $request = $this->model->createDiet($idPrototype, $name, $description, $week, $nameArchivo);
                        if( $request > 0) {
                            $arrData = array('status' => true, 'msg' => "El plan fue creado Satisfactoriamente");
                        }else {
                            $arrData = array('status' => false, 'msg' => 'Hubo un error');
                        }
                    }else {
                        $arrData = array('status' => false, 'msg' => 'Hubo un error al Subir el archivo');
                    }
                }
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getDiets()
        {
            $request = $this->model->getDiets();
            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else {
                $arrData = array('status' => false, 'msg' => 'Oooppps Hubo un error');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getDiet($id)
        {
            $idVal = intval($id);
            $request = $this->model->getDiet($idVal);
            if(!empty($request))
            {
                $prototype = $this->model->getPrototype($request['id_prototype']);
                $arrData = array('status' => true, 'data' => $request, 'prototipo' => $prototype);
            }else {
                $arrData = array('status' => false, 'msg' => 'Oooppps Hubo un error');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function deleteDiet($id)
        {
            $intId = intval($id);
            $request = $this->model->deleteDiet($intId);
            if(empty($request))
            {
                $arrData = array('status' => false, 'msg' => 'Oppps Hubo un error');
            }else {
                $arrData = array('status' => true, 'msg' => 'Eliminado Correctamente');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function downloadDiet($file)
        {
            $archivo = "Assets/dietas/".$file;
            if(isset($file))
            {
                if(file_exists($archivo))
                {
                    header("Cache-Control: no-cache, must-revalidate");
                    header("Pragma: no-cache");
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=".$archivo);
                    readfile($archivo);
                }else {
                    echo "Archivo no disponible";
                }
            }
        }
    }
?>