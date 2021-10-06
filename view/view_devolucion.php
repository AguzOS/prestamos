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
         <div class="panel panel-success" id="div">
            <div class="panel-heading">
                <div class="row">
                <div >
                    <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> Prestamos </h2>
                </div>
                    <div style="float: right;">
                        <a href="../reportes/reporte_prestamo_devuelto.php" style="color: #4CAF50" target="_blank" id="r" ><img src="../icon/pdf.png" class="img-thumbnail" style="width:40px; height:40px;"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-hover" id="prestamo">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Usuario </th>
                    <th class="text-center"> Libro </th>
                    <th class="text-center"> Cantidad P.</th>
                    <th class="text-center"> Fecha de entrega </th>
                    <th class="text-center"> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once "../conexion.php";
                        $obj = new conexion();

                        $var = $obj->view_devolucion();
                        $no = 0;

                        foreach ($var as $value) {
                            # llamar a la lista de datos desde la base de datos
                            echo "<tr class='edit id='detail>";
                            $no++;
                                echo "<td id='no' class='text-center'> ".$no." </td>";
                                echo "<td id='no' class='text-center'> ".$value['nom_completo']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['nom_libro']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['cantidad_prestamo']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['tiempo']." </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <script>
                function borrar(id) {
                    var result = confirm("Desea finalizar el prestamo?");
                    if (result) {
                        del_l = $("#"+id+"_p").val(),
                        $.ajax({
                            url:"../delete/delete_prestamo.php?idprestamolibro="+id,
                            success(data){
                                if (data) {
                                    alert("El prestamo fue finalizado");
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
            $("#r").tooltip({title: "Reporte de libros devueltos", placement: "left"});
            $("#prestamo").DataTable({
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
        });
    </script>
</html>
<?php
    }
    else {
        header("Location: ../index.php");
    }
?>