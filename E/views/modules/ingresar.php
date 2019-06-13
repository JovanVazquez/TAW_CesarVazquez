<!--En esta parte muestro la primera pagina que ve se ve al abrir el proyecto -->
<br><br><br>
<div class="modal-dialog">
<!-- Esto es lo que se ve en nuestro index -->
	<div class="loginmodal-container">
		<h1>Tecnologias y Apliaciones WEB</h1><br>
		<h3>Ingresar al Catalogo</h3>
		
		<form method="post">
			<!-- Estructura de datos que se ingresan-->

			<!-- usuario-->
			<input type="text" placeholder="Usuario" name="usuarioIngreso" required>
			<!-- contraseña obligatoria-->
			<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

			<input type="submit" class="login loginmodal-submit" value="Enviar">

		</form>
	</div>
</div>

<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

// en caso de que se haya ingresado de una manera incorrecta aparecerá un mensaje que hay un fallo al ingresar.
if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>