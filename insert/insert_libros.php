<?php
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        # code...
        include "../conexion.php";
        $insert = new conexion();

        $id = $_POST['id_a'];
        $nombrel = $_POST['n_l'];
        $editorial = $_POST['e'];
        $autor = $_POST['a'];
        $cantidad = $_POST['c'];
        $descripcion = $_POST['d'];

        echo $insert->insert_book($id,$nombrel,$editorial,$autor,$cantidad,$descripcion);
        header("Location: ../forms/registrar_libro.php");
    }
?>