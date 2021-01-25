<?php 
    headerAdmin($data); 
    getModal('agregarRutinaMod', $data);
    getModal('modalEjercicio', $data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-envelope-o"></i> Rutinas  
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Rutinas</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-3"><button class="mb-2 btn btn-primary btn-block" onclick="openModal();" >Crear Rutina</button>
          <div class="tile p-0">
            <h4 class="tile-title folder-head" id="rutinaActual">Lista de Rutinas</h4>
            <div class="tile-body">
              <ul class="nav nav-pills flex-column mail-nav" id="nameRoutines">
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tile">
            <div class="mailbox-controls">
              <div class="animated-checkbox" >
                <h2 id="titleRoutine">Rutina de Perdida</h2>
                <h3 style="color:red;" id="titleDay">Lunes</h3>
              </div>
              <div class="btn-group">
                <button class="btn btn-primary btn-sm" type="button" onclick="changeDay('rest');" ><i class="fa fa-reply"></i></button>
                <button class="btn btn-primary btn-sm disabled" id="btnAgregar" value="disable" onclick="addExercise();" type="button"><i class="fa fa-plus"></i></button>
                <button class="btn btn-primary btn-sm" type="button" onclick="changeDay('add')"><i class="fa fa-share"></i></button>
              </div>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
              <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Modo</th>
                <th>Ver Video</th>
                <th>Eliminar</th>
              </thead>
                <tbody id="listExercises">
                </tbody>
              </table>
            </div>
            <div class="text-right"><span class="text-muted mr-2">Showing 1-15 out of 60</span>
              <div class="btn-group">
                <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-chevron-left"></i></button>
                <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main
<?php footerAdmin($data); ?>