<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        #   ALMACENAMOS LOS DATOS DEL FORM EN VARIABLES
        include("../conexion.php");
        $insert = new conexion();

        $id = $_POST['id_ad'];
        $nm = $_POST['n_m'];
        $numero = $_POST['c'];
        $desc = $_POST['d'];

        $insert->insert_material($id,$nm,$numero,$desc);

        header("Location: ../forms/registrar_material.php");
    }
?>