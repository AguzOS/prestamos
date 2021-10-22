<?php
    $datos = $_REQUEST['data_'];
    require_once "../conexion.php";
    $delete = new conexion();
    $delete->delete_book($datos);
?>