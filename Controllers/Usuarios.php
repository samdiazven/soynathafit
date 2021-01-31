<?php
    class Usuarios extends Controllers
    {
        public function __construct()
        {
            parent::__construct();   
        }
        public function usuarios()
        {
            $data['js'] = "Usuarios";
            $data['page_id'] = 7;
            $data['page_tag'] = "Usuarios-SoyNathafit";
            $data['page_title'] = "Usuarios-SoyNathafit";
            $data['page_name'] = "usuarios";
            $this->views->getView($this, 'usuarios', $data);   
        }
        public function getUsuarios()
        {
            $arrData = $this->model->getUsuarios();
            for($i = 0; $i<count($arrData); $i++)
            {
                $arrData[$i]['role'] = getRole($arrData[$i]['role']);
                $arrData[$i]['enable'] == 1 ? $arrData[$i]['enable'] = '<div class="text-center"><span class="badge badge-success">Habilitado</span></div>' : $arrData[$i]['enable'] = '<div class="text-center"><span class="badge badge-warning">Inhabilitado</span></div>';
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm btnView" onclick="viewUser('.$arrData[$i]['id'].')" rel="'.$arrData[$i]['id'].'" title="Ver" ><i class="fa fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btnEdit" onclick="editUser('.$arrData[$i]['id'].')" rel="'.$arrData[$i]['id'].'" title="Editar" ><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-sm btnDel" onclick="deleteUser('.$arrData[$i]['id'].')" rel="'.$arrData[$i]['id'].'" title="Eliminar" ><i class="fa fa-times"></i></button>
                                           </div>';

            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function createUser(){
            
            if($_POST){
                if(isset($_POST['enable'])){
                    $enable = intval($_POST['enable']);
                }else{
                    $enable = 0;
                } 
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $role = intval($_POST['role']);
                $firstRequest = $this->model->getUserByEmail($email, $role);
                if(!empty($firstRequest)){
                    $arrData = array('status' => false, 'msg' => 'El usuario ya Existe');

                }else{

                    $request = $this->model->createUser($name, $email, $role, $enable);
                    if($request > 0)
                    {
                        $arrData = array('status' => true, 'msg' => 'Creado satisfactoriamente');
                    }else{
                        $arrData = array('status' => false, 'msg' => 'Ooops Hubo un error');
                    }

                }
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        public function deleteUser($id)
        {
            $request = $this->model->deleteUser($id);
            if(!empty($request)){
                $arrData = array('status' => true, 'msg' => 'Fue Eliminado Correctamente');
            }else{
                $arrData = array('status' => false, 'msg' => 'Oooops Hubo un Error');
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function updateUser($id)
        {
            if($_POST){
                if(isset($_POST['enable'])){
                    $enable = intval($_POST['enable']);
                }else{
                    $enable = 0;
                } 
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $role = intval($_POST['role']);
                $request = $this->model->updateUser($id, $name, $email, $role, $enable);

                if(!empty($request)){
                    $arrData = array('status' => true, 'msg' => 'El usuario Fue Actualizado');
                }else {
                    $arrData = array('status' => false, 'msg' => 'Oooops Hubo un error');
                }
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function getUserById($id)
        {
            $request = $this->model->getUserById($id);

            $arrData = array('data' => $request);

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        
    }
?>