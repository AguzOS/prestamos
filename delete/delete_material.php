<?php
    $id = $_GET['idm'];

    include "../conexion.php";
    $delete = new conexion();

    $delete -> delete_material($id);
?>
<script>
    window.location="../view/view_material.php";
    setTime(0000);
</script>