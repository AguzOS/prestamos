<header>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
          <a href="../main/menu.php" cclass="nav-link active" aria-current="page" data-toggle="">Inicio <b class=""></b></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Registrar:
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="li"><a href="../forms/registrar_libro.php" class="dropdown-item">Libros</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="li"><a href="../forms/registrar_material.php" class="dropdown-item">Materiales</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Prestamo:
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a href="../forms/persona.php" class="dropdown-item">Registrar usuario</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a href="../forms/registrar_prestamo.php" class="dropdown-item">Realizar prestamo</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Visualizar registro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a href="../view/view_book.php"  class="dropdown-item">Libros</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="../view/view_material.php"  class="dropdown-item">Materiales</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="../view/view_persona.php"  class="dropdown-item">Persona</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="nav-item "><a id="a" class="nav-link" href="../view/view_prestamos.php"  class="dropdown-item">Ver Prestamos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="nav-item "><a id="a" class="nav-link" href="../view/view_devolucion.php"  class="dropdown-item">Ver Devolución</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a href="../reportes/Reporte_libros.php" target="_blank" class="dropdown-item">Reporte de libros</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="nav-item"><a class="nav-link" href="../reportes/reporte_prestamo.php" target="_blank" class="dropdown-item">Reporte de libros prestados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="../reportes/reporte_prestamo_devuelto.php" target="_blank" class="dropdown-item">Reporte de libros devueltos</a></li>
          </ul>
        </li>

      </ul>
      <div class="d-flex">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                require_once "../conexion.php";
                $d = new conexion();

                $buscar = $d->dias();
                //  $name = "";
                //  $foto = "";
                $i = 0;

                foreach ($buscar as $val) {
                    if ($val['dias'] <= 0) {
                        $i++;
                       
                    }
                } echo "<span id='notification_count'>" . $i . "</span>";
                ?>
                <li class="nav-item">
                    <a id="hover" href="#" class="" data-spy="scroll" data-toggle="popover" data-placement="bottom" data-content='
            <?php
            require_once "../conexion.php";
            $null = new conexion();

            $buscar = $null->dias();
            $no = 0;

            foreach ($buscar as $value) {
                $no++;
                if ($value['dias'] <= 0) {
                    echo "<p>° El tiempo de prestamo del libro " . $value['nom_libro'] . " realizado por " . $value['nom_completo'] . " a expirado</p>";
                }
            } ?>'>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <?php
                    require_once "../conexion.php";
                    $null = new conexion();

                    $buscar = $null->foto_admin($_SESSION['idadmi']);
                    $name = "";
                    $foto = "";

                    foreach ($buscar as $value) {
                        $name = $value['nom_completo'];
                        $foto = $value['foto'];
                    }
                    ?>
                    <a data-toggle="dropdown">
                        <img src="../admin/<?= $foto ?>" alt="" class="img-circle" style="width:30px; height:30px;"> <?php echo $name ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="glyphicon glyphicon-user nav-link" href="../update/update_admin.php"> Ver Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="glyphicon glyphicon-refresh nav-link" href="../update/update_contra.php"> Cambiar contraseña</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="fa fa-sign-out nav-link" href="../delete/sesion_destroy.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </li>
            </ul>
      </div>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
</header>
<style>
  .popover {
    height: 400px;
    overflow-y: scroll;
    width: 1000%;
  }

  p:hover {
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
  $(document).ready(function() {
    $('.over').popover({
      title: "Notificaciones",
      content: '',
      php: true,
      html: true,
      placement: "bottom"
    });
  });
</script>