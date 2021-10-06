<?php
    session_start();
    if ($_SESSION['sesion']=="SI") {
        # code...
?>
<!DOCTYPE html>
<html>
	<?php
		include('../lib/head.php')
	?>
	<style>
	.body {
		background-image: url(../image/libros.jpg);
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size: 100% 100%;
		}
    section{
    }
    </style>
    <style>
        .panel
        {
          margin: 2%;
        }


        tr
        {
          transition: all 0.5s;
        }
        tr:hover
        {
          background-color: #00ffff;
          transition: 0.5s;
        }
        .btn-warning
        {
          transition: all 0.8s;
        }

        .btn-warning:hover, .btn-warning:focus
        {
          transition: 0.8s;
          background-color: #428bca;
          border-color: #428bca;
        }

        .panel-footer
        {
          background-color: #5bc0de;
          color: white;
        }
    </style>
	<body class="body" onload="">
		<?php include('../lib/header.php');?>
		<section >
         <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div >
                        <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> Libros </h2>
                    </div>
                    <div style="float: right;">
                        <a href="../reportes/Reporte_libros.php" id="rl" style="color:#000;" target="_blank" rel="noopener noreferrer"><img src="../icon/pdf.png" class="img-thumbnail" style="width:40px; height:40px;"></a>
                    </div>
                </div>
            </div>  
            <!-- <div class="panel-body table-responsive" id="datos">
                
            </div> -->
            <div class="table-responsive ">
            <table class="table table-hover" id="libro">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Nombre libro </th>
                    <th class="text-center"> Editorial </th>
                    <th class="text-center"> Autor </th>
                    <th class="text-center"> Cantidad </th>
                    <th class="text-center"> Descripcion del libro </th>
                    <th class="text-center"> </th>
                    <th class="text-center"> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once "../conexion.php";
                        $obj = new conexion();

                        $var = $obj->view_book();
                        $num_pagina = 7;
                        $total = $var->num_rows;
                        // echo $total;
                        $paginas = $total/$num_pagina;
                        $no = 0;
                        ceil($paginas);
                        foreach ($var as $value) {
                            # llamar a la lista de datos desde la base de datos
                            echo "<tr class='edit id='detail>";
                            $no++;
                                echo "<td id='no' class='text-center'> ".$no." </td>";
                                echo "<td id='no' class='text-center'> ".$value['nom_libro']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['editorial']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['autor']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['cantidad']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['condicion']." </td>";
                                echo "<td><a href='../update/update_book.php?idlibros=".$value['idlibros']."&nom_libro=".$value['nom_libro']."&editorial=".$value['editorial']."
                                            &autor=".$value['autor']."&cantidad=".$value['cantidad']."&condicion=".$value['condicion']."'><button name='' class='btn btn-info glyphicon glyphicon-pencil'>
                                <span aria-hidden='true'></span></button></a></td>";
                                echo "<td><a onclick='borrar(".$value['idlibros'].")'><button name='' class='btn btn-danger glyphicon glyphicon-remove'>
                                <input value=".$value['idlibros']." hidden id='".$value['idlibros']."_l'>
                                <span aria-hidden='true'></span></button></a></td>";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>

            </div>
            <script>
                function borrar(id) {
                    var result = confirm("Desea eliminar el registro?");
                    if (result) {
                      del_l = $("#"+id+"_l").val(),
                      $.ajax({
                          url:"../delete/delete_book.php?idlibros="+id,
                          success(data){
                              if (data) {
                                alert("El registro fue eliminado");
                                location.reload();
                              }
                          }
                      })
                    }                    
                }                      
            </script>
            <div class="panel-footer">
                <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                </div>
            </div>
            </div>
		</section>
    </body>
    <script>
        $(document).ready(function(){
            $("#rl").tooltip({title: "Reporte de libros", placement: "left"})
            $("#libro").DataTable({
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "loadingRecords": "Cargando",
			     "sProcessing":"Procesando...",
            }
            });
        });
    </script>
</html>
<?php   
    }
    else{
        header("Location: ../index.php");
    }
?>