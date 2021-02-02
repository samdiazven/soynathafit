<?php 
    headerAdmin($data); 
    getModal('viewusermod', $data);
    getModal('addPrototype', $data);
?>
    <main class="app-content">
        <div class="app-title">
            <div>
            <h1><i class="fa fa-dashboard"></i> <?=$data['page_title'];?>
            </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url();?>/Entrenador/prototype">Agregar Prototipos</a></li>
            </ul>
        </div>
       
        <div class="row">
            <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablaAddPrototype">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Prototipo</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
      </div>
    </main>
<?php footerAdmin($data); ?>