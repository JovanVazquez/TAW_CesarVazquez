
<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<!--Este es un archivo para crear la ventana de login -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Iniciar Sesion</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">


	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">

	<?php

	require('database.php');

	$clientes = new Database();

	if(isset($_POST) && !empty($_POST)){

	    $correo = $clientes->sanitize($_POST['correo']);
	    $contrasena = $clientes->sanitize($_POST['contrasena']);



	    $res = $clientes->leer_usuario($correo, $contrasena);

	    $datos = mysqli_fetch_assoc($res);

	  

	    if( $datos['correo'] == $correo && $datos['contrasena'] == $contrasena  ){
	      $message = "Usuario registrado";
	      $class="alert alert-success";

	      $_SESSION["correo"] = $datos['correo'];
	      $_SESSION["nombre"] = $datos['nombre'];

	      header('Location: index.php');

	    }else{
	      $message = "Usuario no registrado";
	      $class="alert alert-danger";
	    }

		?>
		    
	    <div class="<?php echo $class?>">
	      <center> <?php echo $message;?> </center> 
	    </div> 

	<?php } ?>

	<!-- Aqui se muestra el orden que lleva nuestro login -->
	<form method="post"  class="frm-single">
		<div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
		<!-- Titulo -->
			<div class="frm-title">Login - Entrar</div>
		
		<!-- Correo electronico -->
			<div class="frm-input"><input name="correo" id="correo" type="text" placeholder="correo" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
		<!--Contraseña -->
			<div class="frm-input"><input name="contrasena" id="contrasena" type="password" placeholder="Contraseña" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
		
		<!-- Iniciar Sesión -->
			<button type="submit" class="frm-submit">Iniciar Sesion<i class="fa fa-arrow-circle-right"></i></button>
			
			<a href="registro.php" class="a-link"> <i class="fa fa-key"></i> Crear una nueva cuenta</a>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- -->
		</div>
		<!-- -->
	</form>
	<!--  -->
</div>

	
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>