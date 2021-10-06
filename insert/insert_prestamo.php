<?php
    $id = "";
    $id2 = "";
    $c = "";
    $d = "";
    if (isset($_POST['usuario'])) {
        # code...
        $id = $_POST['usuario'];
    }
    if (isset($_POST['book'])) {
        # code...
        $id2 = $_POST['book'];
    }
    if (isset($_POST['c'])) {
        # code...
        $c = $_POST['c'];
    }
    if (isset($_POST['d'])) {
        # code...
        $d = $_POST['d'];
    }

    require_once "../conexion.php";
    $null = new conexion();

    $null->insert_prestamo($id,$id2,$c,$d);
?>