<?php


require_once "conexion.php";

class CRUD extends Conexion{


	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroClienteModel($datosModel){


		$tipo = Conexion::conectar()->prepare("SELECT id FROM tipo_cliente WHERE tipo = :tipo");
		$tipo->bindParam(":tipo", $datosModel['tipo'],PDO::PARAM_STR);
		$tipo->execute();

		$tipo = $tipo->fetchColumn();

		$insert = Conexion::conectar()->prepare("INSERT INTO cliente (nombre, id_tipo) VALUES (:nombre, :tipo)");
		$insert->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$insert->bindParam(":tipo", $tipo, PDO::PARAM_INT);

		if($insert->execute())
			return 'success';
		else
			return 'Error';
		

	}

	#-------------------------------------

	public function vistaClientesModel(){


		$stmt = Conexion::conectar()->prepare(
			"SELECT c.id as id, c.nombre as cliente, tc.tipo as tipo
			 FROM cliente as c INNER JOIN tipo_cliente as tc on c.id_tipo = tc.id");
		
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
		

	}

	public function getTipoClientesModel(){


		$stmt = Conexion::conectar()->prepare("SELECT tipo FROM tipo_cliente");
		
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
		

	}

	public function vistaRecervacionModel(){

		
		$stmt = Conexion::conectar()->prepare(
				"SELECT r.id as id_reservacion,
					   c.nombre as nombre_cliente,
				       tc.tipo as tipo_c,
				       h.id as num_habitacion,
				       th.tipo as tipo_h,
				       h.precio as precio,
				       r.dias_hospedaje as dias
				FROM reservacion as r
				INNER JOIN habitacion as h on r.id_habitacion = h.id
				INNER JOIN cliente as c on r.id_cliente = c.id
				INNER JOIN tipo_habitacion as th on h.id_tipo = th.id
				INNER JOIN tipo_cliente as tc on c.id_tipo = tc.id");	
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
		

	}

}

?>