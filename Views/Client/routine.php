<?php 
    headerAdmin($data); 
    getModal('modalVideo', $data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-free-code-camp"></i> Rutinas  
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Rutinas</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="tile p-0">
            <h4 class="tile-title folder-head text-center" id="rutinaActual">Semanas</h4>
            <div class="tile-body">
              <ul class="nav nav-pills flex-column mail-nav" id="nameRoutines">
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(1);" >Semana 1</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(2);" >Semana 2</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(3);" >Semana 3</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(4);" >Semana 4</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(5);" >Semana 5</a></li>
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectWeek(6);" >Semana 6</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tile">
            <div class="mailbox-controls">
              <div class="animated-checkbox" >
                <h2 id="titleRoutine">Seleccione una Semana</h2>
                <h3 style="color:red;" id="titleDay"></h3>
                <input type="hidden" id="dayWeek" value="<?=$data['day']?>">
                <input type="hidden" id="idRoutine" value="">
              </div>
              <div class="btn-group">
                <button class="btn btn-primary btn-sm disabled" type="button" id="btnBackward" onclick="changeDay('rest');" ><i class="fa fa-reply"></i></button>
                <button class="btn btn-primary btn-sm disabled" type="button" id="btnForward" onclick="changeDay('add')"><i class="fa fa-share"></i></button>
              </div>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
              <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Modo</th>
                <th>Ver Video</th>
              </thead>
                <tbody id="listExercises">
                </tbody>
              </table>
            </div>
         </div>
        </div>
      </div>
    </main
<?php footerAdmin($data); ?>