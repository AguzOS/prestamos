<?php
session_start();
if ($_SESSION['sesion'] == "SI") {
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

        section {}
    </style>
    <style>
        .panel {
            margin: 2%;
        }


        tr {
            transition: all 0.5s;
        }

        tr:hover {
            background-color: #00ffff;
            transition: 0.5s;
        }

        .btn-warning {
            transition: all 0.8s;
        }

        .btn-warning:hover,
        .btn-warning:focus {
            transition: 0.8s;
            background-color: #428bca;
            border-color: #428bca;
        }

        .panel-footer {
            background-color: #5bc0de;
            color: white;
        }
    </style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <body class="body" onload="">
        <?php include('../lib/header.php'); ?>
        <section>
            <table id="table" data-filter-control="true" data-pagination="true" data-toggle="table" data-height="460" data-pagination="true" data-page-list="[5, 10, All]" data-show-toggle="true" data-show-fullscreen="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="primary" data-sort-name="name" data-sort-order="desc">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="nombre" data-filter-control="input" data-sortable="true">Nombre</th>
                        <th data-field="editorial" data-filter-control="input" data-sortable="true">Editorial</th>
                        <th data-field="autor" data-filter-control="input" data-sortable="true">Autor</th>
                        <th data-field="cantidad" data-filter-control="select" data-sortable="true">Cantidad</th>
                        <th data-field="condicion" data-filter-control="input">Condicion</th>
                    </tr>
                </thead>
            </table>
            <!-- <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div>
                            <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> Libros </h2>
                        </div>
                        <div style="float: right;">
                            <a href="../reportes/Reporte_libros.php" id="rl" style="color:#000;" target="_blank" rel="noopener noreferrer"><img src="../icon/pdf.png" class="img-thumbnail" style="width:40px; height:40px;"></a>
                        </div>
                    </div>
                </div> -->
            <!-- <div class="panel-body table-responsive" id="datos">
                
            </div> -->
            <!-- <div class="table-responsive ">
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
                            $paginas = $total / $num_pagina;
                            $no = 0;
                            ceil($paginas);
                            foreach ($var as $value) {
                                # llamar a la lista de datos desde la base de datos
                                echo "<tr class='edit id='detail>";
                                $no++;
                                echo "<td id='no' class='text-center'> " . $no . " </td>";
                                echo "<td id='no' class='text-center'> " . $value['nom_libro'] . " </td>";
                                echo "<td id='no' class='text-center'> " . $value['editorial'] . " </td>";
                                echo "<td id='no' class='text-center'> " . $value['autor'] . " </td>";
                                echo "<td id='no' class='text-center'> " . $value['cantidad'] . " </td>";
                                echo "<td id='no' class='text-center'> " . $value['condicion'] . " </td>";
                                echo "<td><a href='../update/update_book.php?idlibros=" . $value['idlibros'] . "&nom_libro=" . $value['nom_libro'] . "&editorial=" . $value['editorial'] . "
                                            &autor=" . $value['autor'] . "&cantidad=" . $value['cantidad'] . "&condicion=" . $value['condicion'] . "'><button name='' class='btn btn-info glyphicon glyphicon-pencil'>
                                <span aria-hidden='true'></span></button></a></td>";
                                echo "<td><a onclick='borrar(" . $value['idlibros'] . ")'><button name='' class='btn btn-danger glyphicon glyphicon-remove'>
                                <input value=" . $value['idlibros'] . " hidden id='" . $value['idlibros'] . "_l'>
                                <span aria-hidden='true'></span></button></a></td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div> -->
            <!-- <script>
                    function borrar(id) {
                        var result = confirm("Desea eliminar el registro?");
                        if (result) {
                            del_l = $("#" + id + "_l").val(),
                                $.ajax({
                                    url: "../delete/delete_book.php?idlibros=" + id,
                                    success(data) {
                                        if (data) {
                                            alert("El registro fue eliminado");
                                            location.reload();
                                        }
                                    }
                                })
                        }
                    }
                </script> -->
            <!-- <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/page-jump-to/bootstrap-table-page-jump-to.min.js"></script>
    
    <script>
        function operateFormatter(value, row, index) {
            return [
                '<a class="like" href="javascript:void(0)" title="Like">',
                '<i class="fa fa-eye"></i>',
                '</a>  ',
                '<a class="remove" href="javascript:void(0)" title="Remove">',
                '<i class="fa fa-trash"></i>',
                '</a>'
            ].join('')
        }
        window.operateEvents = {
            'click .like': function(e, value, row, index) {
                $("#table").bootstrapTable("refresh");

            },
            'click .remove': function(e, value, row, index) {
                var datos;
                // console.log(row);
                datos = row["_id"];
                // console.log(row["_id"]);
                $.alert({
                    title: "Borrar",
                    content: "Desea borrar?",
                    buttons: {

                        confirm: function() {
                            $.ajax({
                                type: "POST",
                                url: "../json/borrar_ajax.php",
                                data: {
                                    "data_": datos
                                }
                            }).done(function(response) {
                                console.log(response);
                                $("#table").bootstrapTable("refresh");
                            }).fail(function(jqXHR) {
                                console.log(jqXHR);
                            });
                        },
                        cancel: function() {

                        }
                    }
                })

            }
        }

        function cargartabla() {

            $('#table').bootstrapTable({
                url: "../json/json_prueba.php",
                pagination: true,
                // search: true,
                columns: [{
                    field: 'id',
                    title: 'ID'
                }, {
                    field: 'nombre',
                    title: 'Nombre'
                }, {
                    field: 'editorial',
                    title: 'Editorial'
                }, {
                    field: 'autor',
                    title: 'Autor'
                }, {
                    field: 'cantidad',
                    title: 'Cantidad'
                }, {
                    field: 'condicion',
                    title: 'Condición'
                }, {
                    field: 'opciones',
                    title: 'Opciones',
                    align: 'center',
                    clickToSelect: false,
                    events: window.operateEvents,
                    formatter: operateFormatter
                }],
            })
        }

        cargartabla();
    </script>
    <!-- <script>
        $(document).ready(function() {
            $("#rl").tooltip({
                title: "Reporte de libros",
                placement: "left"
            })
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
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "loadingRecords": "Cargando",
                    "sProcessing": "Procesando...",
                }
            });
        });
    </script> -->

    </html>
<?php
} else {
    header("Location: ../index.php");
}
?>