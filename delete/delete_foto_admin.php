<?php
    $id_a = $_GET['idadmi'];
    $foto_a = $_GET['foto'];

    include("../conexion.php");
    $null = new conexion();

    if (!file_exists($foto)) {
        # code...
        unlink("../admin/".$foto);
        $null -> borrar_foto_admin($id_a);
    }
?>
<script>
    window.location="../update/update_admin.php";
    setTime(0000);
</script>