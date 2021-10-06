<?php

require '../mpdf/vendor/autoload.php';

require_once "../conexion.php";
$null = new conexion();
$obj = $null->reporte_prestamo_devuelto();
$no = 0;

$mpdf = new \Mpdf\Mpdf();
$html = '<img src="../image/b.jpg" width="300" height="100"/>
<center><h3>REPORTE DE LIBROS DEVUELTOS</h3></center>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #0ca;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0ca;
    color: white;
  }
  </style>
<table class="table table-hover" id="customers">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Usuario </th>
                    <th class="text-center"> Dirección </th>
                    <th class="text-center"> Libro </th>
                    <th class="text-center"> Cantidad </th>
                    <th class="text-center"> Fecha entrega </th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach ($obj as $key => $value) {
                    $no++;
                    $html .= '<tr class="edit" id="detail">
                                <td id="no" class="text-center">'.$no.'</td>
                                <td id="no" class="text-center">'.$value['nom_completo'].'</td>
                                <td id="no" class="text-center">'.$value['direccin'].'</td>
                                <td id="no" class="text-center">'.$value['nom_libro'].'</td>
                                <td id="no" class="text-center">'.$value['cantidad_prestamo'].'</td>
                                <td id="no" class="text-center">'.$value['tiempo'].'</td>';
                    $html .= '</tr>';
                }
            $html .='</tbody>
                </table>';
$mpdf->WriteHTML($html);
$mpdf -> AliasNbPages();
$mpdf->Output();
?>