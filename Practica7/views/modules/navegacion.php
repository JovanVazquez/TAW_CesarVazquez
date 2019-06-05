<?php 
session_start();
 ?>

<nav>
	<ul>
		
		<?php 
	//	if($_SESSION['usuario']['nombre'] == 'admin'){
		?>
		<li><a href="index.php?action=alumnos">ALUMNOS</a></li>
		<li><a href="index.php?action=maestros">MAESTROS</a></li>
		<li><a href="index.php?action=materias">MATERIAS</a></li>
		<li><a href="index.php?action=salir">SALIR</a></li>
	</ul>
	
</nav>

<nav style="background: black;">
	<ul>
		<?php 

		$enlaces = array('agregar' => '', 'editar' => '', 'borrar' => '');

		if($_SESSION['usuario']['nombre'] == 'admin'){
			switch ($_GET['action']) {
				case 'alumnos':
					$enlaces['agregar'] = 'alumno_agregar';
					$enlaces['editar'] = 'alumno_editar';
					$enlaces['borrar'] = 'alumno_borrar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';					
					break;
				case 'maestros':
					$enlaces['agregar'] = 'maestro_agregar';
					$enlaces['editar'] = 'maestro_editar';
					$enlaces['borrar'] = 'maestro_borrar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';				
					break;
					case 'materias':
					$enlaces['agregar'] = 'materias_agregar';
					$enlaces['editar'] = 'materias_editar';
					$enlaces['borrar'] = 'materias_borrar';
					echo '<li><a href="index.php?action='.$enlaces['agregar'].'">AGREGAR</a></li>';				
					break;
			}
		?>
		<!--li><a href="index.php">Registro</a></li-->
		<?php } ?>
	</ul>
	
</nav>
