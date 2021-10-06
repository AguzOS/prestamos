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
        opacity: 100%;
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
	<body class="body">
		<?php include('../lib/header.php');?>
		<section>
         <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                <div>
                    <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> Materiales </h2>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="table-responsive">
                
            <table class="table table-hover" id="tabla">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Nombre libro </th>
                    <th class="text-center"> Cantidad </th>
                    <th class="text-center"> Descripcion del material </th>
                    <th class="text-center"> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once "../conexion.php";
                        $obj = new conexion();

                        $letras = "";

                        $var = $obj->view_material($letras);
                        $no = 0;

                        foreach ($var as $value) {
                            # llamar a la lista de datos desde la base de datos
                            echo "<tr class='edit id='detail>";
                            $no++;
                                echo "<td id='no' class='text-center'> ".$no." </td>";
                                echo "<td id='no' class='text-center'> ".$value['nombre']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['cantidad']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['condicion']." </td>";
                                echo "<td><a href='../update/update_material.php?idm=".$value['idm']."&nombre=".$value['nombre']."&cantidad=".$value['cantidad']."&condicion=".$value['condicion']."'><button name='' class='btn btn-info glyphicon glyphicon-pencil'>
                                <span aria-hidden='true'></span></button></a>
                                <a onclick='borrar(".$value['idm'].")'><button name='' class='btn btn-danger glyphicon glyphicon-remove'>
                                <input value=".$value['idm']." hidden id='".$value['idm']."_l'>
                                <span aria-hidden='true'></span></button></a></td>";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
            </div>
            <script>
                function borrar(id) {
                    $result = confirm("Desear borrar el registro?");
                    if ($result) {
                        borrar = $("#"+id+"_m").val(),
                        $.ajax({
                            url:"../delete/delete_material.php?idm="+id,
                            success(data){
                                if (data) {
                                    alert("El registro se elimino");
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
           $(".form-control").tooltip({title: "Buscar por el nombre del material", placement: "top"});
           $("#tabla").DataTable({
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
           })
        })
    </script>
</html>
<?php
    }
    else{
        header("Location: ../index.php");
    }
?>