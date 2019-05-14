<?php

$conexion = new PDO("mysql:dbname=imc;host=localhost", "root", "");

$resultados = $conexion->prepare("SELECT * FROM persona");
$resultados->execute();

$resultados = $resultados->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultados IMC</title>
</head>
<body>
	
	<table style="">
		<thead >
			<tr>
				<td style="border: double;" width="100">Id</td>
				<td style="border: double;" width="100">Edad</td>
				<td style="border: double;" width="100">Altura</td>
				<td style="border: double;" width="100">Peso</td>
				<td style="border: double;" width="100">IMC</td>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($resultados as $key => $value){ 
				echo "<tr>";
				echo "<td width='100'>".$value["id"]."</td>";
				echo "<td width='100'>".$value["edad"]."</td>";
				echo "<td width='100'>".$value["altura"]."</td>";
				echo "<td width='100'>".$value["peso"]."</td>";
				echo "<td width='100'>".$value["_imc"]."</td>";
				echo "</tr>";
			}

			?>

		</tbody>
	</table>

	<a href="index2.php">Formulario</a>
	
</body>
</html>