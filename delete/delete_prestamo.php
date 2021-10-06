<?php
    $idprestamo = $_GET['idprestamolibro'];

    include "../conexion.php";
    $null = new conexion();

    $null->borrar_prestamo($idprestamo);
?>
<script>
    window.location = "../view/view_prestamos.php";
    setTime(0000);
</script>