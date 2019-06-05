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

	#REGISTRO DE USUARIOS
	public function registroAlumnoModel($datosModel){

		//primero se verifica si la matricula existe, con la consulta siguiente
		$ex = Conexion::conectar()->prepare("SELECT COUNT(*) FROM ALUMNOS WHERE matricula = :matricula");
		$ex->bindParam(':matricula', $datosModel['matricula'], PDO::PARAM_INT);
		$ex->execute();
		$ex = $ex->fetchColumn();
			/*
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
			*/
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

	public function editarAlumnoModel($datosModel){

		$stmt = Conexion::conectar()->prepare(
				"SELECT a.matricula as matricula, a.nombre as nombre, c.nombre as carrera
				FROM ALUMNOS as a 
				INNER JOIN CARRERAS as c ON a.carrera = c.id WHERE a.matricula = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	public function actualizarAlumnoModel($datosModel){
		//se obtiene el id de la tabla de carreras segun el nombre
		$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
		$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
		$nombre_carrera->execute();
		$nombre_carrera = $nombre_carrera->fetchColumn();

		//se hace la consulta para actualizar la tabla de alumnos		
		$stmt = Conexion::conectar()->prepare("UPDATE ALUMNOS SET nombre = :nombre, carrera = :carrera WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $nombre_carrera, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	public function borrarAlumnoModel($datosModel){

		$borra = Conexion::conectar()->prepare("DELETE FROM ALUMNOS WHERE matricula = :matricula");
		$borra->bindParam(':matricula', $datosModel, PDO::PARAM_INT);
		$borra->execute();

		if($borra->execute())
			return "success";
		else
			return "error";

		$borra->close();

	}

	function getTutoresModel(){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM MAESTROS");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getCarrerasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM CARRERAS");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	#VISTA MAESTROS
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

	#ACTUALIZAR MAESTRO
	public function actualizarMaestroModel($datosModel){

		//se obtiene el id de la tabla de carreras segun el nombre
		$nombre_carrera = Conexion::conectar()->prepare("SELECT id FROM CARRERAS WHERE nombre = :nombre_carrera");
		$nombre_carrera->bindParam(':nombre_carrera', $datosModel['carrera']);
		$nombre_carrera->execute();
		$nombre_carrera = $nombre_carrera->fetchColumn();

		//se hace la consulta para actualizar la tabla de alumnos
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


	#REGISTRO DE MAESTROS
	public function registroMaestroModel($datosModel){

		//primero se verifica si la matricula existe, con la consulta siguiente
		$ex = Conexion::conectar()->prepare("SELECT COUNT(*) FROM MAESTROS WHERE email = :email");
		$ex->bindParam(':email', $datosModel['email'], PDO::PARAM_STR);
		$ex->execute();
		$ex = $ex->fetchColumn();

		if($ex == 0){
			//se obtiene el id de la carrera segun la eleccion
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

	#BORRAR MAESTRO

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