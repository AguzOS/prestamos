<?php
    session_start();
    if ($_SESSION['sesion']=="SI") {
        # code...
    ob_start();
?>
<!DOCTYPE html>
<html>
	<?php
		include('../lib/head.php');
	?>
	
	<body class="body">
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
                width: 50%;
                height: 50px;
                background: transparent;
                border: none;
                outline: none;
                font-size: 24px;
                border-bottom: 1px solid rgba(0,0,0,.5);

            }
            .textarea{
                position: relative;
                width: 50%;
                height: 100px;
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
        </style>
        <?php
            include('../lib/header.php');
        ?>
        <section>
            <?php
                if ($_SERVER['REQUEST_METHOD']=='GET') {
                    # almacenar los datos de la tabla en una varible
                    $idm = $_GET['idm'];
                    $nom = $_GET['nombre'];
                    $cant = $_GET['cantidad'];
                    $condicion = $_GET['condicion'];
            ?>
            <div  id="div">
                <center>
                    <div class="container-fluid">
                        <div class="formBox">
                            <form method="post" action="">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Modificar dato del libros</h1>
                                        </div>
                                    </div>

                                    <input type="text" name="id" value="<?php echo $idm; ?>" hidden>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="inputBox ">
                                                <input type="text" name="n_m" value="<?php echo $nom; ?>"class="input" placeholder="Nombre del libro" require>
                                            </div>
                                        </div>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="inputBox">
                                                <input type="number" name="c" value="<?php echo $cant; ?>" class="input" placeholder="Cantidad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <textarea class="textarea" name="d" placeholder="Descripcion del estado del libro"
                                                rows="10" cols="50"> <?php echo $condicion; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" name="" class="button glyphicon glyphicon-floppy-save" value=""> Guardar cambios</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="../view/view_material.php" type="submit" name="" class="button2 glyphicon glyphicon-floppy-remove" value=""> Cancelar</a>
                                        </div>
                                    </div>
                            </form>
                            <?php
                                }
                                else {
                                    require_once("../conexion.php");
                                    $obj = new conexion();

                                    $n=$_POST['n_m'];
                                    $c=$_POST['c'];
                                    $con=$_POST['d'];
                                    $id_m=$_POST['id'];

                                    $obj->update_data_material($n,$c,$con,$id_m);
                                    header("Location: ../view/view_material.php");
                                }
                            ?>
                        </div>
                    </div>
                </center>
            </div>
        </section> 
	</body>
</html>
<?php
    ob_end_flush();
    }
    else {
        header("Location: ../index.php");
    }
?>