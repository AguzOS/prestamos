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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</head>

<style>
    #toolbar {
        margin: 0;
    }
</style>

<body onload="">
    <table id="table" data-filter-control="true" data-pagination="true" data-toggle="table"
  data-height="460"
  data-pagination="true"
  data-page-list="[5, 10, All]" data-show-toggle="true" 
  data-show-fullscreen="true" 
  data-show-columns="true" 
  data-show-refresh="true">

        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="nombre" data-filter-control="input">Nombre</th>
                <th data-field="editorial" data-filter-control="input">Editorial</th>
                <th data-field="autor" data-filter-control="input">Autor</th>
                <th data-field="cantidad" data-filter-control="select">Cantidad</th>
                <th data-field="condicion" data-filter-control="input">Condicion</th>
            </tr>
        </thead>
    </table>

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
                // alert('You click like action, row: ' + JSON.stringify(row));
                var datos;
                // console.log(row);
                datos = row;
                console.log(datos["_id"]);

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
                                data: { "data_": datos }
                            }).done(function(response) {
                                console.log(response);
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
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    clickToSelect: false,
                    events: window.operateEvents,
                    formatter: operateFormatter
                }],
            })
        }

        cargartabla();
    </script>

</body>

</html>