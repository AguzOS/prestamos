<?php
    $data = $_REQUEST['datos'];
    // if ($_SERVER['REQUEST_METHOD']=="POST") {
        # code...
        include "../conexion.php";
        $insert = new conexion();

    //     $id = $_POST['id_a'];
    //     $nombrel = $_POST['n_l'];
    //     $editorial = $_POST['e'];
    //     $autor = $_POST['a'];
    //     $cantidad = $_POST['c'];
    //     $descripcion = $_POST['d'];

        $insert->insert_book($data['id_a'],$data['n_l'],$data['e'],$data['a'],$data['c'],$data['d']);
    //     header("Location: ../forms/registrar_libro.php");
    // }
?>