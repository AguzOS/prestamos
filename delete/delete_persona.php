<?php
    $id = $_GET['idusuarios'];
    $foto = $_GET['foto_ine'];

    include "../conexion.php";
    $null = new conexion();

    if (!file_exists($foto)) {
        # code...
        unlink("../foto/".$foto);
        $null -> delete_user($id);
    }
?>
<script>
    window.location="../view/view_persona.php";
    setTime(0000);
</script>