<?php

require_once "conexion.php";

class CRUD extends Conexion{

	public function ingresoUsuarioModel($datosModel, $tabla){

		$super_admin = array('nombre' => 'admin','email' => 'admin', 'password' => 'admin' );

		if(!($datosModel["email"] == $super_admin['email'] && $datosModel["password"] == $super_admin['password'])){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");	
			$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		return $super_admin;

	}

	#REGISTRO DE ALUMNOS
	public function registroAlumnoModel($datosModel){

		//primero se verifica si la matricula existe, con la consulta siguiente
		$ex = Conexion::conectar()->prepare("SELECT COUNT(*) FROM ALUMNOS WHERE matricula = :matricula");
		$ex->bindParam(':matricula', $datosModel['matricula'], PDO::PARAM_INT);
		$ex->execute();
		$ex = $ex->fetchColumn();

		if($ex == 0){
			//se obtiene el id de la carrera segun la eleccion
			$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
			$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
			$nombre_carrera->execute();
			$nombre_carrera = $nombre_carrera->fetchColumn();
			//se obtiene el id de la maestro segun la eleccion
			$stmt = Conexion::conectar()->prepare("INSERT INTO ALUMNOS (matricula, nombre, carrera) VALUES (:matricula,:nombre,:carrera)");	
			$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":carrera", $nombre_carrera, PDO::PARAM_INT);

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

	public function vistaAlumnosModel(){


		$stmt = Conexion::conectar()->prepare(
			"SELECT a.matricula as matricula, a.nombre as nombre, c.nombre as carrera
			FROM ALUMNOS as a 
			INNER JOIN CARRERAS as c ON a.carrera = c.id");
		
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}


	function getCarrerasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM CARRERAS");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	#VISTA GRUPOS
	public function vistaGruposModel(){

		if(isset($_GET['id'])){

			$id_maestro = $_GET['id'];


			$stmt = Conexion::conectar()->prepare(
				"SELECT m.id as id, c.nombre as cuatrimesre, m.nombre as nombre 
				FROM GRUPO as m 
				INNER JOIN CARRERAS as c ON m.cuatrimestre = c.id WHERE m.id = :id_grupos");
			$stmt->bindParam('id_grupos', $id_grupos, PDO::PARAM_INT);
			

		}	
		else{
			$stmt = Conexion::conectar()->prepare(
				"SELECT m.id as id, c.nombre as cuatrimestre, m.nombre as nombre
				FROM GRUPO as m 
				INNER JOIN CARRERAS as c ON m.carrera = c.id");

		}
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		

	}

	#REGISTRO DE GRUPOS
	public function registroGruposModel($datosModel){

		//primero se verifica si la matricula existe, con la consulta siguiente
		$ex = Conexion::conectar()->prepare("SELECT COUNT(*) FROM GRUPOS WHERE email = :email");
		//$ex->bindParam(':email', $datosModel['email'], PDO::PARAM_STR);
		$ex->execute();
		$ex = $ex->fetchColumn();

		if($ex == 0){
			//se obtiene el id de la carrera segun la eleccion
			$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
			$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
			$nombre_carrera->execute();
			$nombre_carrera = $nombre_carrera->fetchColumn();


			$stmt = Conexion::conectar()->prepare("INSERT INTO GRUPOS (carrera, nombre) VALUES (:carrera,:nombre)");	

			$stmt->bindParam(":cuatrimestre", $nombre_carrera, PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		

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


}

?>