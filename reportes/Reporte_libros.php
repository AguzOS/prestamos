<?php

require '../mpdf/vendor/autoload.php';
require_once "../conexion.php";
$null = new conexion();
$obj = $null->view_book();
$no = 0;
$mpdf = new \Mpdf\Mpdf();
$html = '<img src="../image/b.jpg" width="300" height="100"/>
<center><h3>REPORTE DE LIBROS</h3></center>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #000;
    color: white;
  }
  </style>
<table class="table table-hover" id="customers">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Libro </th>
                    <th class="text-center"> Editorial </th>
                    <th class="text-center"> Autor </th>
                    <th class="text-center"> Cantidad </th>
                    <th class="text-center"> Condición </th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach ($obj as $key => $value) {
                    $no++;
                    $html .= '<tr class="edit" id="detail">
                                <td id="no" class="text-center">'.$no.'</td>
                                <td id="no" class="text-center">'.$value['nom_libro'].'</td>
                                <td id="no" class="text-center">'.$value['editorial'].'</td>
                                <td id="no" class="text-center">'.$value['autor'].'</td>
                                <td id="no" class="text-center">'.$value['cantidad'].'</td>
                                <td id="no" class="text-center">'.$value['condicion'].'</td>';
                    $html .= '</tr>';
                }
            $html .='</tbody>
                </table>';
$mpdf->WriteHTML($html);
$mpdf -> AliasNbPages();
$mpdf->Output('Reporte de libros.pdf', \Mpdf\Output\Destination::INLINE);
?>