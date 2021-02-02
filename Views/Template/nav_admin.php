<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name"><?= $_SESSION['userData']['name']?></p>
      <p class="app-sidebar__user-designation"><?= getRole($_SESSION['userData']['role'])?></p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item" href="<?=base_url();?>/Dashboard/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item" href="<?=base_url();?>/Usuarios/usuarios"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Usuarios</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Entrenadores</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?=base_url();?>/Rutinas/rutinas"><i class="icon fa fa-circle-o"></i>Rutinas</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/Entrenador/ejercicios"><i class="icon fa fa-circle-o"></i>Ejercicios</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/Prototype/prototype"><i class="icon fa fa-circle-o"></i> Prototipos</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/Entrenador/prototype"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Nutricionistas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?=base_url();?>/crearDieta"><i class="icon fa fa-circle-o"></i>Crear Dietas</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/verDieta" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Ver Dietas</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/agregarAlimentos"><i class="icon fa fa-circle-o"></i>A&ntilde;adir Alimentos</a></li>
        <li><a class="treeview-item" href="<?=base_url();?>/PrototypeN/prototypen"><i class="icon fa fa-circle-o"></i> Ver Prototipos</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item" href="<?=base_url();?>/Client/routine"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Mis Rutinas</span></a></li>
    <li><a class="app-menu__item" href="<?=base_url();?>/Client/diet"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Mis Dietas</span></a></li>
    <li><a class="app-menu__item" href="<?=base_url();?>/Client/data"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Datos Personales</span></a></li>
  </ul>
</aside>