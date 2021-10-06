<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        # almacenar los datos del formulario en variables

        include "../conexion.php";
        $insert = new conexion();
        
        $photo_u = $_FILES['file']['name'];
        $photo_tmp = $_FILES['file']['tmp_name'];
        $tipo = $_FILES['file']['type'];

        $extencion = array("jpg","png","JPG");
        $partname = explode(".", $photo_u);
        $aux = end($extencion);
        $success = in_array($aux, $extencion);

        if ($success) {
            # Validacion de la imagen a insertar
            if ($_FILES['file']['error']>0) {
                # Por si sucede un error al por el tipo de formato
                echo "<script>alert('Error al subir el archivo');</script>";
                ?>
                    <script>
                        setTimeout("location.href='../forms/persona.php'",0000);
                    </script>
                <?php
            } 
            
            else {
                # no existe error alguno al subir el archivo
                if (!file_exists("../foto")) {
                    # en caso de que la carpeta que coantendra las fotos no exista se creara de manera automatica
                    echo mkdir("../foto", 0777);
                } else {
                    # en caso de que la carpeta exista solo se registrara el usuario
                    move_uploaded_file($photo_tmp, "../foto/".$photo_u);

                    $id = $_POST['id'];
                    $name_full = $_POST['n_f'];
                    $direccion = $_POST['d'];

                    $insert -> insert_usuario($id,$name_full,$direccion,$photo_u);
                    ?>
                    <script>
                        setTimeout("location.href='../forms/registrar_prestamo.php'",0000);
                    </script>
                    <?php
                }
                
            }
            
        }
    }
?>