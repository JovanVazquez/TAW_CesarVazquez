<?php 

	include_once('bootstrap/link1.php');

?>
 <!-- START PAGE CONTENT -->

<div class="container" style="width: 80%;">
	<div class="row">
	    <div class="col-sm-12">
	        <div class="table-responsive m-b-20">
	            <h1>Reservaciones</h1>
	            <table id="datatable" class="table table-striped table-bordered">
	                <thead>
	                <tr>
						<th>Id Reserva</th>
						<th>Cliente</th>
						<th>Tipo</th>
						<th>Habitacion</th>
						<th>Tipo</th>
						<th>Precio</th>
						<th>Dias Hospedaje</th>


					</tr>
	                </thead>


	                <tbody>
	                <?php

					$vistaUsuario = new MvcController();
					$vistaUsuario -> vistaReservacionesController();
					//$vistaUsuario -> borrarUsuarioController();

					?>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>

<?php

	include_once('bootstrap/link2.php');


if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




