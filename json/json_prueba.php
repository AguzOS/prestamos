<?php
        require_once "../conexion.php";
        $obj = new conexion();

        $var = $obj->view_book();
        $num_pagina = 7;
        $total = $var->num_rows;
        // echo $total;
        $paginas = $total/$num_pagina;
        $no = 0;
        $celdas = "";
        ceil($paginas);
        foreach ($var as $value) {
            $no++;
            $myArray[] = array("_id" => $value['idlibros'],"id" => $no, "nombre" => $value['nom_libro'], "editorial" => $value['editorial'], "autor" => $value['autor'], "cantidad" => $value['cantidad'], "condicion" => $value['condicion'],);
        }
        
        echo json_encode($myArray);
    ?>