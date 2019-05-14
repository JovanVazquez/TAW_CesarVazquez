<?php
//incluir la clase
include "persona_vespertino.php";

//instanciar la clase
$persona = new persona();

//asignar valores a las propiedades de objeto

	


if($_POST){

	$persona->setEdad($_POST['edad']);
	$persona->setAltura($_POST['altura']);
	$persona->setPeso($_POST['peso']);

	$_imc = $persona->imc();

	$conexion = new PDO("mysql:dbname=imc;host=localhost", "root", "");

	if($conexion){
		echo "<script> alert('Conectado'); </script>";
	}

	$guarda = $conexion->prepare("INSERT INTO persona (edad, altura, peso, _imc) VALUES (:edad, :altura, :peso, :_imc)");
	$guarda->bindParam(":edad", $_POST['edad'], PDO::PARAM_INT);
	$guarda->bindParam(":altura", $_POST['altura'], PDO::PARAM_STR);
	$guarda->bindParam(":peso", $_POST['peso'], PDO::PARAM_STR);
	$guarda->bindParam(":_imc", $_imc, PDO::PARAM_STR);
	

	if($guarda->execute())
		echo "<script> alert('Datos guardados'); </script>";


}

//impresiones de los resultados

/*echo"<br/>Edad: ".$persona->edad;
echo"<br/>Altura: ".$persona->altura;
echo"<br/>Peso: ".$persona->peso;
echo"<br/>IMC: ".$persona->imc();
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>IMC</title>
</head>
<body>

	<form method="post">

		<input type="number" name="edad" placeholder="Edad"><br>
		<input type="number" step="any" name="altura" placeholder="Altura (en cm)"><br>
		<input type="number" step="any" name="peso" placeholder="Peso"><br>

		<button type="submit">Calcular IMC</button>
		
	</form>

	<br>

	<a href="resultados.php">Ver resultados</a>

</body>
</html>