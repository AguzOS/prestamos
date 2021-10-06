<header>
	<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <img src="../image/images.jpg" class="img-responsive" href="#">
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav"><!--
      <li class="active"><a href="#">Link</a></li>-->
      <li class="">
        <a href="../main/menu.php" class="" data-toggle="">Inicio <b class=""></b></a>        
      </li>
      <li class="dropdown">
        <a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">Registrar: <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="li"><a href="../forms/registrar_libro.php">Libros</a></li>
          <li class="divider"></li>
          <li class="li"><a href="../forms/registrar_material.php">Materiales</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">Prestamo <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../forms/persona.php">Registrar usuario</a></li>
          <li class="divider"></li>
          <li><a href="../forms/registrar_prestamo.php">Realizar prestamo</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visualizar registro<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../view/view_book.php">Libros</a></li>
          <li class="divider"></li>
          <li><a href="../view/view_material.php">Materiales</a></li>
          <li class="divider"></li>
          <li><a href="../view/view_persona.php">Persona</a></li>
          <li class="divider"></li>
          <li class="nav-item "><a id="a" class="nav-link" href="../view/view_prestamos.php">Ver Prestamos</a></li>
          <li class="divider"></li>
          <li class="nav-item "><a id="a" class="nav-link" href="../view/view_devolucion.php">Ver Devolución</a></li>
          <li class="divider"></li>
        </ul>
      </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="../reportes/Reporte_libros.php" target="_blank">Reporte de libros</a></li>
          <li class="divider"></li>
        <li class="nav-item"><a class="nav-link" href="../reportes/reporte_prestamo.php" target="_blank">Reporte de libros prestados</a></li>
          <li class="divider"></li>
        <li><a href="../reportes/reporte_prestamo_devuelto.php" target="_blank">Reporte de libros devueltos</a></li>
      </ul>
    </li>
    </ul>
    <div class="col-sm-6 col-md-3" style="float: right;">
    <ul class="nav navbar-nav navbar-right">
    <?php
            require_once "../conexion.php";
            $d = new conexion();
      
            $buscar = $d -> dias();
          //  $name = "";
          //  $foto = "";
          $i=0;

          foreach($buscar as $val){
            if ($val['dias']<=0){
              $i++;
              echo "<span id='notification_count'>".$i."</span>";
            }
          }
          ?>
          <li>
            <a id="hover" href="#"  class="over navbar-nav pull-left glyphicon glyphicon-bell" data-spy="scroll" data-toggle="popover" data-placement="bottom" data-content='<?php
          require_once "../conexion.php";
          $null = new conexion();

          $buscar = $null -> dias();
          $no=0;

          foreach ($buscar as $value) {
            $no++;
            if ($value['dias']<=0) {
              echo "<p>° El tiempo de prestamo del libro ".$value['nom_libro']." realizado por ".$value['nom_completo']." a expirado</p>";
            }
          }?>'>
    </a></li>
          <li class="dropdown">
          <?php
                      require_once "../conexion.php";
                      $null = new conexion();

                      $buscar = $null -> foto_admin($_SESSION['idadmi']);
                      $name = "";
                      $foto = "";

                      foreach ($buscar as $value) {
                        $name = $value['nom_completo'];
                        $foto = $value['foto'];
                      }
                    ?>
            <a  data-toggle="dropdown">
              <img src="../admin/<?=$foto?>" alt="" class="img-circle" style="width:30px; height:30px;">    <?php echo $name ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a  class="glyphicon glyphicon-user nav-link" href="../update/update_admin.php"> Ver Perfil</a>
              </li>
          <li class="divider"></li>
              <li>
                <a  class="glyphicon glyphicon-refresh nav-link" href="../update/update_contra.php"> Cambiar contraseña</a>
              </li>
          <li class="divider"></li>
              <li>
                <a  class="fa fa-sign-out nav-link" href="../delete/sesion_destroy.php">Cerrar Sesion</a>
              </li>
            </ul>
        </li>
      </ul>
    </div>    
  </div><!-- /.navbar-collapse -->
</nav>
</header>
<style>
  .popover {
    height: 400px;
    overflow-y: scroll;
    width: 1000%;
  }
  p:hover{
    background-color: #dcdcdc;
  }
  #notification_count {
    padding: 3px 4px 3px 4px;
    background: #cc0000;
    color: #ffffff;
    font-weight: bold;
    margin-left: 24px;
    border-radius: 10px;
    -moz-border-radius: 9px; 
    -webkit-border-radius: 9px;
    position: absolute;
    margin-top: 2px;
    font-size: 11px;
  }
</style>
<script>
  $(document).ready(function(){
    $('.over').popover({title: "Notificaciones", content: '', php: true, html: true, placement: "bottom"});
  });
  </script>