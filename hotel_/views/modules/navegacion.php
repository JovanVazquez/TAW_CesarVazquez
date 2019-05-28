<?php 

 ?>

<nav>
	<ul><li style="width: 100%; color: #51B8FF;"><?php session_start(); echo $_SESSION['usuario'] ?></li></ul>
	
	<ul>
		
		<?php 
		if($_SESSION['usuario'] == 'admin'){
		?>
		<li><a href="index.php?action=administracion">RESERVACIONES</a></li>
		<li><a href="index.php?action=clientes">CLIENTES</a></li>
		<?php } ?>
		<li><a href="index.php?action=salir">SALIR</a></li>
	</ul>
	
</nav>

<nav style="background: gray;">
	<ul>
		<?php 

		$enlaces = array('agregar' => '', 'editar' => '', 'borrar' => '');

		if($_SESSION['usuario'] == 'admin'){
			switch ($_GET['action']) {
				case 'clientes':
					$enlaces['agregar'] = 'cliente_agregar';
					$enlaces['editar'] = 'cliente_editar';
					$enlaces['borrar'] = 'cliente_eliminar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';					
					break;
				case 'habitaciones':
					$enlaces['agregar'] = 'habitacion_agregar';
					$enlaces['editar'] = 'habitacion_editar';
					$enlaces['borrar'] = 'habitacion_eliminar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';				
					break;
			}
		?>
		<!--li><a href="index.php">Registro</a></li-->
		<?php } ?>
	</ul>
	
</nav>
