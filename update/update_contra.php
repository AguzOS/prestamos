<?php
	session_start();
	if ($_SESSION['sesion']=="SI") {
?>
<!DOCTYPE html>
<html>
	<?php
		include('../lib/head.php');
	?>
	<style>
	.body {
		background-image: url(../image/libros.jpg);
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size: 100% 100%;
		}
        
    section{
        margin: 1px 250px;
    }
	</style>
	<body class="body">
		<?php include('../lib/header.php');?>
		<section>
        
				<div class='modal-dialog modal-sm'>
					<div class='modal-content'>
							
						<div class='modal-header'>
							<h4 class='modal-title'>Modificar Contraseña </h4>
						</div>
						<?php 
							$id=$_SESSION['idadmi'];
							$pass = $_SESSION['contrasenia'];
						?>
						<div class='modal-body'>
							<form method="POST">
								<div class="form-group">
									<input type="text" hidden required="true" name="admi" value="<?= $id?>">
									<input type="text" hidden required="true" name="pass" value="<?= $pass?>">
								</div>
								<div class="form-group">
									<label>Nueva Contraseña</label>
									<input class='form-control' type="password" required="true" name="npwd">
								</div>
								<div class="form-group">
									<label>Repetir Contraseña</label>
									<input class='form-control' type="password" require="true" name="rpwd">
								</div>
								<div class="form-group">
									<label>Introdusca su contraseña actual</label>
									<input class='form-control' type="password" require="true" name="np">
								</div>
						<div class="modal-footer">
							<button class="btn btn-success">Guardar Cambios</button>
							<a href="../main/menu.php" class="btn btn-danger" >Cancelar</a>
						</div>
							</form>
						</div>
					</div>
				</div>
				<?php
					if ($_SERVER['REQUEST_METHOD']=="POST") {
						# code...
						require_once "../conexion.php";
						$contrasenia = new conexion();
						$npwd = $_POST['npwd'];
						$repeat = $_POST['rpwd'];
						$password = $_POST['pass'];
						$np = $_POST['np'];
						$idadmi = $_POST['admi'];
						if ($npwd==$repeat) {
							if (sha1($np)==$password) {
								$contrasenia->update_pass(sha1($npwd),$idadmi);
								
								echo "<script>alert('Su contraseña fue modificada');
									window.location='../menu.php';
									setTime(0000);
								</script>";
							} 
							else {
								
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
								Command: toastr['warning']('La contraseña actual no coincide');
								</script>";
							}
							
						} 
						else {
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
							Command: toastr['info']('La contraseña nueva no coincide');
								</script>";
						}
					}
				?>
		</section>
	</body>
</html>
<?php
	}
	else {
		header("Location: index.php");
	}
?>