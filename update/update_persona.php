<?php
    session_start();
    if ($_SESSION['sesion']=="SI") {
        # code...
    ob_start();
?>
<!DOCTYPE html>
<head>
    <?php
        include "../lib/head.php";
    ?>
    <style>
        .body {
            background-image: url(../image/libros.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    section{
        margin: 1px 202px;
        background-color: #fff;
        opacity: 100%;
    }
    </style>
        
    <style>
        .formBox{
            margin-top: 10px;
            padding: 10px;
        }
        .formBox  h1{
            margin: 0;
            padding: 0;
            text-align: center;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-size: 20px;
        }
        .inputBox{
            position: relative;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .inputBox .inputText{
            position: absolute;
            font-size: 10px;
            line-height: 10px;
            transition: .5s;
            opacity: .5;
        }
        .inputBox .input{
            position: relative;
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 24px;
            border-bottom: 1px solid rgba(0,0,0,.5);

        }
        .focus .inputText{
            transform: translateY(-30px);
            font-size: 18px;
            opacity: 1;
            color: #00bcd4;

        }
        .button{
            width: 50%;
            height: 50px;
            border: none;
            outline: none;
            background: #03A9F4;
            color: #fff;
            font-size: 20px;
        }
        .button2{
            width: 50%;
            height: 50px;
            border: none;
            outline: none;
            background: #ca1023;
            color: #fff;
            font-size: 20px;
            padding: 15px;
        }
        .button2:hover{
            color:#fff;
        }
        .inputfile {
        width : 0.1px ;
        height : 0.1px ;
        opacity : 0 ;
        overflow : hidden;
        position : absolute;
        z-index : - 1 ;
        }
    </style>

    <!-- estilo para el input type file para subir la imagen-->
    <style>
        body {
        font-family: sans-serif;
        background-color: #eeeeee;
        }

        .file-upload {
        background-color: #ffffff;
        width: 350px;
        margin: 0 auto;
        padding: 20px;
        }

        .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
        }

        .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
        }

        .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
        }

        .file-upload-content {
        display: none;
        text-align: center;
        }

        .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
        }

        .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
        }

        .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
        }

        .file-upload-image {
        max-height: 60%;
        max-width: 60%;
        margin: auto;
        padding: 20px;
        }

        .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
        }

        .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
        }

        .remove-image:active {
        border: 0;
        transition: all .2s ease;
        }
    </style>
</head>
	<body class="body">
        <?php
            include('../lib/header.php');
        ?>
        <section>
            <?php
                if ($_SERVER['REQUEST_METHOD']=='GET') {
                    # almacenar los datos de la tabla en una varible
                    $id_u = $_GET['idusuarios'];
                    $nom = $_GET['nom_completo'];
                    $direccion = $_GET['direccin'];
                    $foto_ine = $_GET['foto_ine'];
                    
            ?>
            <div  id="div">
                <center>
                    <div class="container-fluid">
                        <div class="formBox">
                        <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Modificar datos de usuarios</h1>
                                        </div>
                                    </div>

                                    <input type="text" name="id" hidden required value="<?php echo $id_u?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="inputBox ">
                                                <input type="text" name="n_u" class="input" value="<?php echo $nom?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="inputBox">
                                                <input type="text" name="d_u" class="input" value="<?php echo $direccion?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <?php
                                        require_once "../conexion.php";
                                        $null = new conexion();

                                        $buscar = $null -> search_ine($id_u);
                                        $foto = "";
                                        $disable = "";
                                        
                                        foreach ($buscar as $value) {
                                            # buscamos si existe o no alguna foto
                                            $foto = $value['foto_ine'];
                                        }

                                        if ($foto !== "") {
                                            # por si no existe un archivo en el registro de datos
                                            $disable = "disabled";
                                        }
                                         echo "<div class='col-sm-4'>
                                         <div class='inputBox'>
                                             <div class='file-upload'>";?>
                                                 
                                         </div>
                                         <?php
                                         if ($foto != "") {?>
                                             <a href='' onclick="borrar(<?=$id_u?>,'<?=$foto_ine?>')" ><button type='button' class='remove-image'>Eliminar <span class='image-title'>Foto</span></button></a>
                                         <?php
                                         }
                                         echo"  </div>
                                     </div>
                                     <div class='col-sm-6'>
                                         <div class='image-upload-wrap'>";?>
                                            <input <?=$disable?> class="file-upload-input" type='file' name="foto" required onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                            <?php
                                            if (file_exists("../foto/".$foto_ine)) {
                                                $ruta = "../foto/".$foto_ine."" ?>
                                                <input type="text" value="<?= $id_u?>" id="<?= $id_u?>_p" hidden>
                                                <img src='<?= $ruta?>' id='' class='file-upload-image'>
                                                <input type="text" name="f" value="<?= $foto_ine?>" id="<?= $foto_ine?>_ine" hidden>
                                            <?php                                            
                                            }
                                            else {
                                                echo "<h3>Arastre una imagen</h3>";
                                            }
                                         ?>
                                            </div>
                                         </div>
                                         <div class='file-upload-content'>
                                             <img class='file-upload-image' src='#' alt='your image' />
                                             <div class='image-title-wrap'>
                                             <button type='button' onclick='removeUpload()' class='remove-image'>Remove <span class='image-title'>Uploaded Image</span></button>
                                             </div>
                                         </div>
                                     </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                        <button type="submit" name="" disable class="button  glyphicon glyphicon-floppy-save" value=""> Guardar cambios</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="../view/view_persona.php" type="submit" name="" disable class="button2  glyphicon glyphicon-floppy-remove" value=""> Cancelar</a>
                                        </div>
                                    </div>
                            </form>
                            <?php
                                }
                                else {
                                    require_once "../conexion.php";
                                    $void = new conexion();

                                    if ($_POST['f']=="") {
                                        # Si la foto es modificada se tendra que reincertar por lo cual nesesitamos esta condición
                                        $photo = $_FILES['foto']['name'];
                                        $photo_tmp = $_FILES['foto']['tmp_name'];
                                        $type = $_FILES['foto']['type'];

                                        $extend = array("jpg","png");
                                        $partname = explode(".",$photo);
                                        $aux = end($partname);
                                        $success = in_array($aux, $extend);

                                        if ($_FILES['foto']['error']>0) {
                                            # en caso de que exista un error mandara el siguiente mensaje
                                            echo "<script>alert('error al subir el archivo');</script>";
                                        } else {
                                            # Encaso no exista error alguno
                                            move_uploaded_file($photo_tmp, "../foto/".$photo);
                                            $nombre = $_POST['n_u'];
                                            $direccion = $_POST['d_u'];
                                            $id = $_POST['id'];

                                            $successfull = $void ->update_user($nombre,$direccion,$photo,$id);

                                            if ($successfull) {
                                                echo "<script>alert('Datos modificados');</script>";
                                                header("location: ../view/view_persona.php");
                                            }
                                        }                                        
                                    } else {
                                        # los datos se modifican a ececion de la foto del usuario                                        
                                        $nombre = $_POST['n_u'];
                                        $direccion = $_POST['d_u'];
                                        $id = $_POST['id'];

                                        $data = $void->update_ususarios_sin_foto($nombre,$direccion,$id);
                                        if ($data) {
                                            echo "<script>alert('Datos modificados');</script>";
                                            header("location: ../view/view_persona.php");
                                        }
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <script>
            function borrar(id,foto) {
                var result = confirm("Eliminar foto?");
                if (result) {
                  var f = document.getElementById(foto+"_ine").value;
                  del_f = $("#"+id+"_p").val(),
                  $.ajax({
                      url: "../delete/delete_foto.php?idusuarios="+id+"&foto_ine="+f,
                      success(data){
                          if (data) {
                            alert("La foto fue removida");
                            location.reload();
                          }
                      }
                  })
                }
            }
            function readURL(input) {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                    };

                    reader.readAsDataURL(input.files[0]);

                } else {
                    removeUpload();
                }
                }

                function removeUpload() {
                    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                    $('.file-upload-content').hide();
                    $('.image-upload-wrap').show();
                }
                     $('.image-upload-wrap').bind('dragover', function () {
                        $('.image-upload-wrap').addClass('image-dropping');
                    });
                    $('.image-upload-wrap').bind('dragleave', function () {
                        $('.image-upload-wrap').removeClass('image-dropping');
                });
        </script>
	</body>
</html>
<?php
    ob_end_flush();
    }
    else {
        header("Location: ../index.php");
    }
?>