<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if(($_POST["usuarioIngreso"] == "admin" && $_POST["passwordIngreso"] == "admin")||
				$_POST["usuarioIngreso"] == "recepcion" && $_POST["passwordIngreso"] == "recepcion"){

				session_start();

				$_SESSION["usuario"] = $_POST["usuarioIngreso"];
				//$_SESSION["id_usuario"] = $respuesta['id'];
				if($_SESSION["usuario"]=='admin'){
					header("location:index.php?action=administracion");	
				}
				/*else{
					header("location:index.php?action=reservacion");
				}*/
			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#------------------------------------

	public function vistaReservacionesController(){

		$respuesta = CRUD::vistaRecervacionModel();


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_reservacion"].'</td>
				<td>'.$item["nombre_cliente"].'</td>
				<td>'.$item["tipo_c"].'</td>
				<td>'.$item["num_habitacion"].'</td>
				<td>'.$item["tipo_h"].'</td>
				<td>'.$item["precio"].'</td>
				<td>'.$item["dias"].'</td>
			</tr>';

		}

	}
	#------------------------------------

	public function vistaClientesController(){

		$respuesta = CRUD::vistaClientesModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["cliente"].'</td>
				<td>'.$item["tipo"].'</td>';
				if($_SESSION['usuario'] == "admin"){
					echo '<td><a href="index.php?action=cliente_editar&id='.$item["id"].'"><button>Editar</button></a></td>
						  <td><a href="index.php?action=cliente_eliminar&id='.$item["id"].'"><button>Eliminar</button></a></td>';
				}
		echo '</tr>';

		}
	}
	public function agregarClienteController(){


		$tipo = CRUD::getTipoClientesModel();

		echo '<div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tipo Cliente</label>
                <select class="form-control" name="tipo">';
                foreach ($tipo as $key => $t) {
                	echo "<option>".$t['tipo']."</option>";
                }
          echo '</select>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar">
            </div>';

	}
	#------------------------------------
	public function registroClienteController(){

		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>strtoupper($_POST["nombre"]), "tipo" => $_POST["tipo"]);

			$respuesta = CRUD::registroClienteModel($datosController);

			if($respuesta == "success"){
				echo '<script> alert("Se Agregó correctamente") </script>';
			}

			else if($respuesta == "Error"){

				echo '<script> alert("Error") </script>';
			}
			else{
				echo '<script> alert("Ya existe la carrera ingresado") </script>';
			}

			echo '<script> window.location = "index.php?action=clientes"; </script>';

		}

	}
		
}

////
?>