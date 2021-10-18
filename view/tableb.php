<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
</head>

<style>
    #toolbar {
        margin: 0;
    }
</style>

<body>

    <div id="toolbar" class="select">
        <select class="form-control">
        <option value="">Export Basic</option>
        <option value="all">Export All</option>
        <option value="selected">Export Selected</option>
      </select>
    </div>

    <table id="table" data-show-export="true" data-pagination="true" data-side-pagination="server" data-click-to-select="true" data-toolbar="#toolbar" data-show-toggle="true" data-show-columns="true" >
        
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
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script>
        var $table = $('#table')

        $(function() {
            $('#toolbar').find('select').change(function() {
                $table.bootstrapTable('destroy').bootstrapTable({
                    exportDataType: $(this).val(),
                    exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
                    columns: [{
                        field: 'state',
                        checkbox: true,
                        visible: $(this).val() === 'selected'
                    }, {
                        field: 'id',
                        title: 'ID'
                    }, {
                        field: 'nombre',
                        title: 'Nombre libro'
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
                        title: 'Condicion'
                    }, {
                        field: 'editar',
                        title: 'Editar'
                    }, {
                        field: 'borrar',
                        title: 'Borrar'
                    },]
                })
            }).trigger('change')
        })
    </script>

</body>

</html>