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

<body onload="">

    <!-- <div id="toolbar" class="select">
        <select class="form-control">
            <option value="">Export Basic</option>
            <option value="all">Export All</option>
            <option value="selected">Export Selected</option>
        </select>
    </div> -->

    <table id="table"></table>
    <?php require_once "../json/json_prueba.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script>
        var out = "";

        function datos() {
            var result = $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../json/json_prueba.php",
            }).done(function(response) {
                for (let i = 0; i < response.length; i++) {
                    const element = response[i];
                    out = [{
                        id: element[0],
                        name: element[1],
                        price: '$1'
                    }, ]
                }

            }).fail(function(jqXHR) {
                console.log(jqXHR);
            })
        }

        function cargartabla() {

            $('#table').bootstrapTable({
                url: "../json/json_prueba.php",
                pagination: true,
                search: true,
                columns: [{
                    field: 'id',
                    title: 'ID'
                }, {
                    field: 'nombre',
                    title: 'Nombre'
                }, {
                    field: 'editorial',
                    title: 'Editorial'
                }],
            })
        }

        cargartabla();
    </script>

</body>

</html>