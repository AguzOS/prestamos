<style>
/*:horizontal*/
#ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #fff;
  position: fixed;
  top: 0;
  width: 100%;
}

#li2 {
  float: left;
}

#li2 #a2 {
  display: block;
  color: #000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
#li2 #a2:focus{
  background-color: #0ffff0;
}

/**:vertical */
#lista {
  list-style-type: none;
  margin: 80px 0;
  padding: 0;
  width: 200px;
  background-color: #fff;
  height: 100%; /* Full height */
  position: fixed; /* Make it stick, even on scroll */
}


#li {
  float: left;
  border-top: 1px solid #0ffff0;
}

#li #a {
  display: block;
  color: #000;
  width: 200px;
  padding: 8px 16px;
  text-decoration: none;
  padding-bottom: 30px;
}

/* Change the link color to # (black) on hover */
#li #a:hover {
  background-color: #0fffff;
}
#li #a:focus{
  background-color: #0fff;
}
</style>
<header>
<ul id="ul" class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<div class="navbar-header col-sm-4 col-md-4">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <img src="image/images.jpg" class="img-responsive" href="#">
  </div>
  <div class="col-sm-8 col-md-8" style="float: right;">
        <ul class="nav navbar-nav navbar-right">
     <?php
      require_once "conexion.php";
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
  
        <a id="hover"href="#" style="margin: 32px 0; margin-right:20px;" class="over  navbar-nav pull-left glyphicon glyphicon-bell" data-spy="scroll" data-toggle="popover" data-placement="bottom" data-content='<?php
     require_once "conexion.php";
     $null = new conexion();

     $buscar = $null -> dias();
     $no=0;

     foreach ($buscar as $value) {
       $no++;
       if ($value['dias']<=0) {
        echo "<p>° El tiempo de prestamo del libro ".$value['nom_libro'].", realizado por ".$value['nom_completo']." a expirado</p>";
       }
     }?>'></a>
        <li class="dropdown">
            <?php
                require_once "conexion.php";
                $null = new conexion();

                $buscar = $null -> foto_admin($_SESSION['idadmi']);
                $name = "";
                $foto = "";

                foreach ($buscar as $value) {
                  $name = $value['nom_completo'];
                  $foto = $value['foto'];
                }
              ?>
            <a id="a2"  data-toggle="dropdown" style="margin: 10px 0;">
              <img src="admin/<?=$foto?>" alt="" class="img-circle" style="width:30px; height:30px;">    <?php echo $name ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
            <li>
              <a  class="glyphicon glyphicon-user nav-link" href="update/update_admin.php"> Ver Perfil</a>
            </li>
            <li>
              <a  class="glyphicon glyphicon-refresh nav-link" href="update/update_contra.php"> Cambiar contraseña</a>
            </li>
            <li>
              <a  class="fa fa-sign-out nav-link" href="delete/sesion_destroy.php"> Cerrar Sesion</a>
            </li>
          </ul>
        </li>
    </ul>
  </div>
</ul>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="lista">
    <ul class="nav navbar-nav" ><!--
      <li class="active"><a href="#">Link</a></li>-->
      <li class="" id="li">
        <a href="menu.php" class="" id="a" data-toggle="">Inicio <b class=""></b></a>
      </li>
      <li id="li" class="dropdown">
        <a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">Registrar: <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="li"><a href="forms/registrar_libro.php">Libros</a></li>
          <li class="divider"></li>
          <li class="li"><a href="forms/registrar_material.php">Materiales</a></li>
          <li class="divider"></li>
          <li><a href="forms/persona.php">Persona</a></li>
          <li class="divider"></li>
          <li><a href="forms/registrar_prestamo.php">Prestamo de libro</a></li>
        </ul>
      </li>
      <li class="dropdown" id="li">
        <a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">Ver: <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="view/view_book.php">Libros</a></li>
          <li><a href="view/view_material.php">Materiales</a></li>
          <li><a href="view/view_persona.php">Persona</a></li>
        </ul>
      </li>
	  <li id="li" class="nav-item "><a id="a" class="nav-link" href="view/view_prestamos.php">Ver Prestamos</a></li>
	  <li id="li" class="nav-item "><a id="a" class="nav-link" href="view/view_devolucion.php">Ver Devolución</a></li>
    <li id="li" class="dropdown ">
      <a href="#" id="a" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="reportes/reporte_libros.php" target="_blank">Reporte de libros</a></li>
        <li class="nav-item"><a class="nav-link" href="reportes/reporte_prestamo.php" target="_blank">Reporte de libros prestados</a></li>
        <li><a href="reportes/reporte_prestamo_devuelto.php" target="_blank">Reporte de libros devueltos</a></li>
      </ul>
    </li>
    </ul>
  </div>
</div>
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
    padding: 3px 7px 3px 7px;
    background: #cc0000;
    color: #ffffff;
    font-weight: bold;
    margin-left: 10px;
    border-radius: 9px;
    -moz-border-radius: 9px; 
    -webkit-border-radius: 9px;
    position: absolute;
    margin-top: 11px;
    font-size: 11px;
  }
</style>
<script>
  $(document).ready(function(){
    $('.over').popover({title: "Notificaciones", content: '', php: true, html: true, placement: "bottom"});
  });
  </script>
</header>