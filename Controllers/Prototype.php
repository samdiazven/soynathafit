<?php
    class Prototype extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function prototype()
        {
            $data['page_id'] = 5;
            $data['page_tag'] = "Dashboard-SoyNathafit";
            $data['page_title'] = "Prototipos-SoyNathafit";
            $data['page_name'] = "prototipos";
            $data['js'] = "Prototype";
            $this->views->getView($this, "prototype", $data);
        }
        public function obtenerPrototipos()
        {
            $arrData = $this->model->obtenerPrototipos();
            for($i=0; $i < count($arrData); $i++)
            {
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-primary btn-sm btnEdit" rel="'.$arrData[$i]['id'].'" title="Editar" ><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-sm btnDel" rel="'.$arrData[$i]['id'].'" title="Eliminar" ><i class="fa fa-times"></i></button>
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
        public function deletePrototype()
        {
            if($_POST){
                $intId = intval($_POST['id']);
                $request = $this->model->deletePrototype($intId);

                if($request == 'ok'){
                    $arrData = array('status' => true, 'msg' => 'Se ha eliminado Sastifactoriamente');
                }else{
                    $arrData = array('status' => false, 'msg' => "Hubo un error al procesar la peticion");
                }
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

?>