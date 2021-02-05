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
            <div class="col-md-3">
            <div class="tile p-0">
                <h4 class="tile-title folder-head text-center" id="rutinaActual">Semanas</h4>
                <div class="tile-body">
                <ul class="nav nav-pills flex-column mail-nav" id="ListDiet">
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(1);" >Semana 1</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(2);" >Semana 2</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(3);" >Semana 3</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(4);" >Semana 4</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(5);" >Semana 5</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeekN(6);" >Semana 6</a></li>
                </ul>
                </div>
            </div>
            </div>
            <div class="col-md-9">
            <div class="tile">
                <div class="mailbox-controls">
                <div class="animated-checkbox" >
                    <h2 id="titleRoutine">Seleccione una Semana</h2>
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