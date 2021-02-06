<?php
    headerAdmin($data);
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Un d&iacute;a a la vez para lograr tus objetivos!</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?=base_url();?>/Dashboard/dashboard">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-pie-chart fa-3x"></i>
            <div class="info">
              <h4>% Grasa</h4>
              <p><b><?=$data['pdata']['grasa']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-male fa-3x"></i>
            <div class="info">
              <h4>IMC</h4>
              <p><b><?=$data['pdata']['imc']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-heartbeat fa-3x"></i>
            <div class="info">
              <h4>Peso</h4>
              <p><b><?=$data['pdata']['peso']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-font-awesome fa-3x"></i>
            <div class="info">
              <h4>Plan</h4>
              <p><b>PRO</b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Gr&aacute;fica de Progreso</h3>
            <div class="d-flex justify-content-center align-items-center p-5">
                <h2>PR&Oacute;XIMAMENTE</h2>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Registro Semanal</h3>
            <div class="d-flex justify-content-center align-items-center p-5">
                <h2>PR&Oacute;XIMAMENTE</h2>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php
footerAdmin($data);
?>