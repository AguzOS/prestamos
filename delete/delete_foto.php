<?php
    $id_u = $_GET['idusuarios'];
    $foto = $_GET['foto_ine'];

    include("../conexion.php");
    $null = new conexion();

    if (!file_exists($foto)) {
        # code...
        unlink("../foto/".$foto);
        $null -> delete_foto($id_u);
    }
?>
<script>
    window.location="../update/update_persona.php";
    setTime(0000);
</script>