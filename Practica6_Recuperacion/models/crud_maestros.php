<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Maestros extends Conexion{

	
	function getTutoresModel(){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM MAESTROS");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function vistaMaestrosModel(){

		if(isset($_GET['id'])){

			$id_maestro = $_GET['id'];


			$stmt = Conexion::conectar()->prepare(
				"SELECT m.id as id, c.nombre as carrera, m.nombre as nombre, m.email as email, m.password as password
				FROM MAESTROS as m 
				INNER JOIN CARRERAS as c ON m.carrera = c.id WHERE m.id = :id_maestro");
			$stmt->bindParam('id_maestro', $id_maestro, PDO::PARAM_INT);
			

		}	
		else{
			$stmt = Conexion::conectar()->prepare(
				"SELECT m.id as id, c.nombre as carrera, m.nombre as nombre, m.email as email, m.password as password
				FROM MAESTROS as m 
				INNER JOIN CARRERAS as c ON m.carrera = c.id");

		}
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		

	}

	public function actualizarMaestroModel($datosModel){

		$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
		$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
		$nombre_carrera->execute();
		$nombre_carrera = $nombre_carrera->fetchColumn();

		$stmt = Conexion::conectar()->prepare("UPDATE MAESTROS SET nombre = :nombre, carrera = :carrera, email = :email, password = :password WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $nombre_carrera, PDO::PARAM_INT);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		
		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	public function registroMaestroModel($datosModel){

		$ex = Conexion::conectar()->prepare("SELECT COUNT(*) FROM MAESTROS WHERE email = :email");
		$ex->bindParam(':email', $datosModel['email'], PDO::PARAM_STR);
		$ex->execute();
		$ex = $ex->fetchColumn();

		if($ex == 0){
			$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
			$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
			$nombre_carrera->execute();
			$nombre_carrera = $nombre_carrera->fetchColumn();

			$stmt = Conexion::conectar()->prepare("INSERT INTO MAESTROS (carrera, nombre, email, password) VALUES (:carrera,:nombre,:email,:password)");	

			$stmt->bindParam(":carrera", $nombre_carrera, PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

			if($stmt->execute())				
				return "success";
			else
				return "error";


			$stmt->close();
		}
		else{
			return "existe";
		}

	}

	public function borrarMaestroModel($datosModel){
		
		$borra = Conexion::conectar()->prepare("DELETE FROM MAESTROS WHERE id = :id");
		$borra->bindParam(':id', $datosModel, PDO::PARAM_INT);
		$borra->execute();

		if($borra->execute())
			return "success";
		else
			return "error";
		
		//se cierra la conexion

		$borra->close();

	}

}

?>