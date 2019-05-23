


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Registro</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<script src="assets/plugin/bootstrap/css/bootstrap.min.css"></script>

</head>

<body>

<div id="single-wrapper">
	<?php 

	 require('database.php');

		$clientes = new Database();
		
	  if(isset($_POST) && !empty($_POST)){
	  	
	    $nombres = $clientes->sanitize($_POST['nombre']);
	    $correo = $clientes->sanitize($_POST['correo']);
	    $contrasena = $clientes->sanitize($_POST['contrasena']);
	    
	    $res = $clientes->crear_usuario($nombres,$correo, $contrasena);


	    if($res){
	      $message = "Usuario creado correctamente";
	      $class="alert alert-success";
	    }else{
	      $message = "No se pudo crear el usuario";
	      $class="alert alert-danger";
	    }
	    ?>
	    
	    <div class="<?php echo $class?>">
	      <center> <?php echo $message;?> </center> 
	    </div> 

	<?php } ?>

	<form  method="post" class="frm-single">
		<div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
			<!--  -->
			<div class="frm-title">Registro de usuario</div>

			<!-- -->
			<div class="frm-input"><input name="correo" id="correo" type="email" placeholder="Correo" class="frm-inp"><i class="fa fa-envelope frm-ico"></i></div>
			<!-- -->
			<div class="frm-input"><input name="nombre" id="nombre" type="text" placeholder="Nombre" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- -->
			<div class="frm-input"><input name="contrasena" id="contrasena" type="password" placeholder="Contraseña" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>

			<button type="submit" class="frm-submit">Registrarse<i class="fa fa-arrow-circle-right"></i></button>

			<a href="login.php" class="a-link"><i class="fa fa-sign-in"></i>Iniciar sesion</a>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!--  -->
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