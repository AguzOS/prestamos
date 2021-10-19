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
            # llamar a la lista de datos desde la base de datos
            // $celdas .= "<tr class='edit id='detail>";
            $no++;
            // // $celdas .= "<td id='no' class='text-center'> ".$no." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$no." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$value['nom_libro']." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$value['editorial']." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$value['autor']." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$value['cantidad']." </td>";
            //     $celdas .= "<td id='no' class='text-center'> ".$value['condicion']." </td>";
            //     $celdas .= "<td><a href='../update/update_book.php?idlibros=".$value['idlibros']."&nom_libro=".$value['nom_libro']."&editorial=".$value['editorial']."
            //                 &autor=".$value['autor']."&cantidad=".$value['cantidad']."&condicion=".$value['condicion']."'><button name='' class='btn btn-info glyphicon glyphicon-pencil'>
            //     <span aria-hidden='true'></span></button></a></td>";
            //     $celdas .= "<td><a onclick='borrar(".$value['idlibros'].")'><button name='' class='btn btn-danger glyphicon glyphicon-remove'>
            //     <input value=".$value['idlibros']." hidden id='".$value['idlibros']."_l'>
            //     <span aria-hidden='true'></span></button></a></td>";

            // $celdas .= "</tr>";
            $myArray[] = array("id" => $no, "nombre" => $value['nom_libro'], "editorial" => $value['editorial'], $value['autor'], $value['cantidad'], $value['condicion']);
        }
        
        echo json_encode($myArray);
    ?>