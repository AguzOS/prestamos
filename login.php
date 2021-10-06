<div class="" style="padding-left: 640px; background: transparent;">
    <div class='modal-dialog ' style="padding-top: 100px; ">
        <div class='modal-content col-xs-10 col-sm-10 col-md-10 col-lg-10'>
                
            <div class='modal-header '>
                <center>
                    <img src="image/th.jpg" style="border-radius: 100px">
                </center>
                <h4 class='modal-title'> 
                    <center> Biblioteca prestamo de libros </center>
                </h4>
            </div>

            <div class='modal-body'>
                <form method="POST">
                    <div class="form-group">
                        <input class='form-control' type="text" required="true" name="user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input class='form-control' type="password" require="true" name="pwd" placeholder="Contraseña">
                    </div>
            <div class="modal-footer">
				<center>
                    <button class="fa fa-sign-out btn btn-info" type="submit"> Iniciar sesión</button>
                </center>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){

			include('conexion.php');
			$obj=new conexion();

			$usuario=$_POST['user'];
			$pwd=$_POST['pwd'];

			$admin=$obj->session($usuario,sha1($pwd));
			$id=$admin->num_rows;
			$validar=0;
			$nombre="";

			foreach ($admin as $value) {
				# code...
				session_start();
				$_SESSION['idadmi']=$value['idadmi'];
				$_SESSION['nom_completo']=$value['nom_completo'];
				$_SESSION['usuario']=$value['usuario'];
				$_SESSION['contrasenia']=$value['contrasenia'];
				$_SESSION['foto']=$value['foto'];

				$validar=1;

				$_SESSION['sesion']="SI";

				header("Location: main/menu.php");
			}
			if ($validar==0) {
				$_SESSION['sesion']="NO";
				echo "<script>
				toastr.options = {
					'closeButton': true,
					'debug': true,
					'newestOnTop': false,
					'progressBar': false,
					'positionClass': 'toast-top-center',
					'preventDuplicates': false,
					'onclick': null,
					'showDuration': '300',
					'hideDuration': '1000',
					'timeOut': '5000',
					'extendedTimeOut': '1000',
					'showEasing': 'swing',
					'hideEasing': 'linear',
					'showMethod': 'fadeIn',
					'hideMethod': 'fadeOut'
				}
				Command: toastr['warning']('Usuario o contraseña no valida');
					</script>";
			}
		}

	?>
		</div>
	</div>
</div>