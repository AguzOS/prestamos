<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        # almacenar los datos del formulario en variables

        require_once "../conexion.php";
        $insert = new conexion();
        
        
        if ($_POST['f']=="") {
            # code...
            $photo_a = $_FILES['foto']['name'];
            $photo_tmp = $_FILES['foto']['tmp_name'];
            $tipo = $_FILES['foto']['type'];

            $extencion = array("jpg","png","JPG");
            $partname = explode(".", $photo_a);
            $aux = end($extencion);
            $success = in_array($aux, $extencion);

            if ($success) {
                # Validacion de la imagen a insertar
                if ($_FILES['foto']['error']>0) {
                    # Por si sucede un error al por el tipo de formato
                    echo "<script>alert('Error al subir el archivo');</script>";
                } 
                
                else {
                    # no existe error alguno al subir el archivo
                    if (!file_exists("../admin")) {
                        # en caso de que la carpeta que coantendra las fotos no exista se creara de manera automatica
                        echo mkdir("../admin", 0777);
                    } else {
                        # en caso de que la carpeta exista solo se registrara el usuario
                        move_uploaded_file($photo_tmp, "../admin/".$photo_a);

                        $id = $_POST['id'];
                        $name_full = $_POST['n_a'];
                        $user = $_POST['u_a'];

                        $insert -> update_admin($name_full,$user,$photo_a,$id);
                        header("location: ../update/update_admin.php");
                    }
                }
            }
        } 
        else {
            # code...
            $id = $_POST['id'];
            $name_full = $_POST['n_a'];
            $user = $_POST['u_a'];

            $insert -> update_admin_sin_foto($name_full,$user,$id);
            header("location: ../update/update_admin.php");
        }
    }
?>