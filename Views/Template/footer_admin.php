    <!-- Essential javascripts for application to work-->
    <script src="<?=media();?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=media();?>/js/popper.min.js"></script>
    <script src="<?=media();?>/js/bootstrap.min.js"></script>
    <script src="<?=media();?>/js/main.js"></script>
    <script src="<?=media();?>/js/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <?php 
      if($data['js'] === "Usuarios"){
        ?>
          <script src="<?=media();?>/js/functions_usuarios.js"></script>
        <?php
      }
      if($data['js'] === "Entrenador"){
        ?>
          <script src="<?=media();?>/js/functions_ejercicios.js"></script>
        <?php
      }
      if($data['js'] == "Prototype"){
        ?>
          <script src="<?=media();?>/js/functions_prototype.js"></script>
        <?php
      }
      if($data['js'] === "Rutinas"){
        ?>
          <script src="<?=media();?>/js/functions_rutinas.js"></script>
          <script type="text/javascript" src="<?=media();?>/js/plugins/select2.min.js"></script>
        <?php
      }
      if($data['js'] === "Auth") {
        ?>
          <script src="<?=media();?>/js/functions_auth.js"></script>
        <?php
      }
      if($data['js'] === "Dashboard"){
        ?>
          <script src="<?=media();?>/js/functions_dashboard.js"></script>
        <?php
      }
      if($data['js'] === "Client"){
        ?>
          <script src="<?=media();?>/js/functions_client.js"></script>
        <?php
      }
      if($data['js'] === 'ADDPROTOTYPE'){
        ?>
          <script src="<?=media();?>/js/functions_add_prototype.js"></script>
          <script type="text/javascript" src="<?=media();?>/js/plugins/select2.min.js"></script>
        <?php
      }
      if($data['js'] === 'Nutrition') {
        ?>
        <script src="<?=media();?>/js/functions_nutrition.js"></script>
        <?php
      }
      if($data['js'] === "Diet") {
        ?> 
          <script src="<?=media();?>/js/functions_diet.js"></script>
        <?php
      } 
      if($data['js'] === "Data") {
        ?>
          <script src="<?=media();?>/js/functions_data.js"></script>
        <?php
      }
    ?>
    <script src="<?=media();?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?=media();?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=media();?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=media();?>/js/plugins/sweetalert.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>