<?php

//En esta sección se va a desplegar una nueva ventana ára agregar grupos

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

include_once('bootstrap/link1.php');

?>
<div class="container" style="width: 80%;">
	<div class="row">
	    <div class="col-sm-12">
	        <h1 class="m-b-20 header-title"><b>NUEVO GRUPO</b></h1>

	        <form method="post">
	            <?php

	            $nuevoGrupo = new MvcController();
				$nuevoGrupo -> agregarGrupoController();
				$nuevoGrupo -> registroGrupoController();

	            ?>
	        </form>
	    </div>
    </div>
</div>

<?php include_once('bootstrap/link1.php'); ?>