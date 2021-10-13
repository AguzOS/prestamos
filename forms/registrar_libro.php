<?php
    session_start();
    if ($_SESSION["sesion"]=="SI") {
        # code...
?>
<!DOCTYPE html>
<html>
	<?php
		include('../lib/head.php')
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
        background-color:white;
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
        </style>
	<body class="body" onload="registrar_libro_section();">
        <?php include('../lib/header.php');?>
        
        <section>
            <div  id="div">
                <center>
                    <div class="container-fluid">
                        <div class="formBox">
                            <form method="post" action="" id="form_registro_libro">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Registro de libros</h1>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="inputBox ">
                                                <input type="text" name="n_l" class="input" placeholder="Nombre del libro" >
                                                <input type="text" name="id_a" class="input"  value="<?=$_SESSION['idadmi']?>" hidden>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="inputBox">
                                                <input type="text" name="e" class="input" placeholder="Editorial" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="inputBox">
                                                <input type="text" name="a" class="input" placeholder="Autor" >
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="inputBox">
                                                <input type="number" name="c" min="1" class="input" placeholder="Cantidad" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <textarea class="textarea" name="d" placeholder="Descripcion del estado del libro"
                                                rows="10" cols="50" ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" name="" class="button  glyphicon glyphicon-floppy-save" value="Guardar Registro" id="btn_registro_libro"> 
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
        </section>

        <script src="../js/assets.js"></script>
	</body>
</html>
<?php
    }
    else {
        header("Location: ../index.php");
    }
?>