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
	</style>
	<body class="body">
		<?php include('../lib/header.php');?>
		<section >
			
<br>
			 <div>
			 	<br><br>
                <center>
                    <img src="../image/img.png" style="border-radius: 100px">
                </center>
                
            </div>
		</section>
	</body>
</html>
<?php
	}
	else {
		header("Location: ../index.php");
	}
?>