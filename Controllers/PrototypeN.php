<?php
    class PrototypeN extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
            session_start();
            if(empty($_SESSION['login'])){
                header('location: '.base_url().'/Auth/login');
            }
        }

        public function obtenerPrototipos()
        {
            $arrData = $this->model->obtenerPrototipos();
            for($i=0; $i < count($arrData); $i++)
            {
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-primary btn-sm btnEdit" onclick="editPrototype('.$arrData[$i]['id'].');" title="Editar" ><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-sm btnDel" onclick="deletePrototype('.$arrData[$i]['id'].');" title="Eliminar" ><i class="fa fa-times"></i></button>
                                           </div>';

            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function setPrototype()
        {
            $intId = intval($_POST['idPrototype']);
            $strName = trim($_POST['name']);
            $strDescription = trim($_POST['description']);
            if($intId > 0){
                $request = $this->model->updatePrototype($intId, $strName, $strDescription);
                $option = 1;
            }else{
                $request = $this->model->insertarPrototipo($strName, $strDescription);
                $option = 2;
            }
            if($request > 0) {
                if($option == 1){
                    $arrData = array('status' => true, 'msg' => 'Actualizado Correctamente');
                }
                else{
                    $arrData = array('status' => true, 'msg' => 'Creado Correctamente');
                }
            }else if($request == 'exist'){
                    $arrData = array('status' => false, 'msg' => 'El prototipo ya existe');
            }
            else{
                $arrData = array('status' => false, 'msg' => "Hubo un error al procesar la peticion");
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getPrototype($id)
        {
            $intProto = intval($id);
            $request = $this->model->getPrototype($intProto);

            if(!empty($request))
            {
                $arrData = array('status' => true, 'data' => $request);
            }else{
                $arrData = array('status' => false, 'msg' => "Hubo un error");
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function deletePrototype($id)
        {
            $intId = intval($id);
            $request = $this->model->deletePrototype($intId);

            if($request == 'ok'){
                $arrData = array('status' => true, 'msg' => 'Se ha eliminado Sastifactoriamente');
            }else{
                $arrData = array('status' => false, 'msg' => "Hubo un error al procesar la peticion");
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function getUsers()
        {
            $arrData = $this->model->getUsers();
            if(!empty($arrData)) 
            {
                for($i = 0; $i < count($arrData); $i++ )
                {
                    if(empty($arrData[$i]['id_prototype_nutricionista'])){
                        $arrData[$i]['proto'] = "No Tiene Prototipos Agregados";
                    }else {
                        $proto = $this->model->getPrototype($arrData[$i]['id_prototype_nutricionista']);
                        if(empty($proto)){
                            $arrData[$i]['proto'] = "No hay Prototipo para Mostrar";
                        }else {
                            $arrData[$i]['proto'] = $proto['name'];
                        }
                    }
                    
                    $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm" onclick="viewUser('.$arrData[$i]['id'].')"  title="Ver" ><i class="fa fa-eye"></i></button>
                <button class="btn btn-success btn-sm" onclick="addPrototype('.$arrData[$i]['id'].')"  title="Cargar Prototipo" ><i class="fa fa-upload"></i></button>
                                           </div>';
                }
                
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }