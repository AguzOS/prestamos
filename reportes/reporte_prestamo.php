<?php

require '../mpdf/vendor/autoload.php';
require_once "../conexion.php";
$null = new conexion();
$obj = $null->reporte_prestamo();
$no = 0;
$dia=0;
$mpdf = new \Mpdf\Mpdf();
$html = '<img src="../image/b.jpg" width="300" height="100"/>
<center><h3>REPORTE DE LIBROS PRESTADOS</h3></center>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #4CAF50;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
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
                    <th class="text-center"> Dias restantes </th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach ($obj as $key => $value) {
                    $no++;
                    $current_date=strtotime(date('Y-m-d'));
                                    $old_date=strtotime($value['tiempo']);
                                    $diferencia=$old_date - $current_date;
                                    $tiempo=floor($diferencia/(60*60*24));
                                    $dias = $tiempo+$dia;
                    $html .= '<tr class="edit" id="detail">
                                <td id="no" class="text-center">'.$no.'</td>
                                <td id="no" class="text-center">'.$value['nom_completo'].'</td>
                                <td id="no" class="text-center">'.$value['direccin'].'</td>
                                <td id="no" class="text-center">'.$value['nom_libro'].'</td>
                                <td id="no" class="text-center">'.$value['cantidad_prestamo'].'</td>
                                <td id="no" class="text-center">'.$value['tiempo'].'</td>';
                                if ($dias<=0) {
                                    $html.= "<td class='text-center'>El tiempo expiro</td>";
                                } else {
                                    $html.= "<td class='text-center'>$dias</td>";
                                }
                    $html .= '</tr>';
                }
            $html .='</tbody>
                </table>';
$mpdf->WriteHTML($html);
$mpdf -> AliasNbPages();
$mpdf->Output('Reporte de libros prestados.pdf', \Mpdf\Output\Destination::INLINE);
?>