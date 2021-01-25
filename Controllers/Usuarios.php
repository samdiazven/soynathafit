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
            $data['page_id'] = 5;
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
                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-primary btn-sm btnEdit" onclick="editUser('.$arrData[$i]['id'].')" rel="'.$arrData[$i]['id'].'" title="Editar" ><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-sm btnDel" rel="'.$arrData[$i]['id'].'" title="Eliminar" ><i class="fa fa-times"></i></button>
                                           </div>';

            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>