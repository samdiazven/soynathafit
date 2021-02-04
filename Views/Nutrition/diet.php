<?php 
    headerAdmin($data); 
    getModal('agregarDietaMod', $data);
?>
    <main class="app-content">
        <div class="app-title">
            <div>
            <h1><i class="fa fa-envelope-o"></i> Planes de Alimentaci&oacute;n  
            </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Plan Alimentic&iacute;o</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3"><button class="mb-2 btn btn-primary btn-block" onclick="openModal();" >Agregar Plan</button>
            <div class="tile p-0">
                <h4 class="tile-title folder-head" id="rutinaActual">Lista de Planes</h4>
                <div class="tile-body">
                <ul class="nav nav-pills flex-column mail-nav" id="ListDiet">
                </ul>
                </div>
            </div>
            </div>
            <div class="col-md-9">
            <div class="tile">
                <div class="mailbox-controls">
                <div class="animated-checkbox" >
                    <h2 id="titleRoutine">Seleccione una Dieta</h2>
                </div>
                </div>
                <div class="card">
                    <div class="card-header" id="cardHeader">
                    </div>
                    <div class="card-body" id="cardBody">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </main
<?php footerAdmin($data); ?>