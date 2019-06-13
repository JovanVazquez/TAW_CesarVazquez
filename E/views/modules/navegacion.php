<?php 
session_start();
 ?>

<nav>
	<ul>
		
		<?php 
		?>
		<!-- En esta parte se muestran los diferentes apartados que se van a mostrar en el programa -->
		<li><a href="index.php?action=alumnos">ALUMNOS</a></li>
		<li><a href="index.php?action=grupo">GRUPOS</a></li>
		<li><a href="index.php?action=salir">SALIR</a></li>
	</ul>
	
</nav>
<!-- Acontinuacion aparecerá la estructura -->
<nav style="background: black;">
	<ul>
		<?php 
		$enlaces = array('agregar' => '', 'editar' => '', 'borrar' => '');

		if($_SESSION['usuario']['nombre'] == 'admin'){
			switch ($_GET['action']) {
				case 'alumnos':
					$enlaces['agregar'] = 'alumno_agregar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';					
					break;
				case 'grupo':
					$enlaces['agregar'] = 'grupo_ingresar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';				
					break;
			}
		?>
	
		<?php } ?>
	</ul>
	
</nav>
