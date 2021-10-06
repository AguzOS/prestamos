<?php
    $id = $_GET['idlibros'];

    include("../conexion.php");
    $delete = new conexion();

    $delete->delete_book($id);
?>
<script>
    window.location="../view/view_book.php";
    setTime(0000);
</script>