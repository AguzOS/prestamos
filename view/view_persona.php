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
	<body class="body" >
		<?php include('../lib/header.php');?>
		<section >
         <div class="panel panel-success" id="div">
            <div class="panel-heading">
                <div class="row">
                <div >
                    <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> Usuarios </h2> </div>
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
            <table class="table table-hover" id="persona">
                <thead>
                    <tr>
                    <th class="text-center"> No. </th>
                    <th class="text-center"> Nombre completo </th>
                    <th class="text-center"> Dirección </th>
                    <th class="text-center"> Foto INE </th>
                    <th class="text-center"> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once "../conexion.php";
                        $obj = new conexion();

                        $word = "";
                        $var = $obj->view_users($word);
                        $no = 0;

                        foreach ($var as $value) {
                            # llamar a la lista de datos desde la base de datos
                            echo "<tr class='edit id='detail>";
                            $no++;
                                echo "<td id='no' class='text-center'> ".$no." </td>";
                                echo "<td id='no' class='text-center'> ".$value['nom_completo']." </td>";
                                echo "<td id='no' class='text-center'> ".$value['direccin']." </td>";
                                echo "<td id='no' class='text-center'> 
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#".$value['idusuarios']."'>
                                            ".$value['foto_ine']."
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class='modal fade' id='".$value['idusuarios']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content modal-lg'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'><h4>Datos de ".$value['nom_completo']."</h4></h5>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='container-fluid'>
                                                            <div class='row'>
                                                                <div class='col-xs-5 col-sm-5 col-md-5 col-lg-5'>
                                                                    <h3>Nombre: ".$value['nom_completo']."</h3>
                                                                    <h3>Dirección: ".$value['direccin']."</h3>
                                                                </div>
                                                                <div class='col-xs-7 col-sm-7 col-md-7 col-lg-7'>
                                                                    <img src='../foto/".$value['foto_ine']."' style='width: 70%;' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>";
                                echo "<td><a href='../update/update_persona.php?idusuarios=".$value['idusuarios']."&nom_completo=".$value['nom_completo']."&direccin=".$value['direccin']."
                                            &foto_ine=".$value['foto_ine']."'><button name='' class='btn btn-info glyphicon glyphicon-pencil'>
                                <span aria-hidden='true'></span></button></a>";?>
                                <a onclick="borrar('<?=$value['idusuarios']?>','<?=$value['foto_ine']?>')">
                                <input type="" name="foto" value="<?=$value['foto_ine']?>" hidden id="<?=$value['foto_ine']?>_foto">
                                <button name='' class='btn btn-danger glyphicon glyphicon-trash'>
                                <?php
                                echo"
                                <input value=".$value['idusuarios']." hidden id='".$value['idusuarios']."_u'>
                                <span aria-hidden='true'></span></button></a></td>";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
            </div>
            <script>
                function borrar(id,foto) {
                    var result = confirm("Desea eliminar el registro?");
                    if (result) {
                        var fotos = document.getElementById(foto+"_foto").value;
                        del_l = $("#"+id+"_u").val(),
                        $.ajax({
                            url:"../delete/delete_persona.php?idusuarios="+id+"&foto_ine="+fotos,
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
            $(".form-control").tooltip({title: "Buscar por nombre de usuarios", placement: "top"});
            $("#persona").DataTable({
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