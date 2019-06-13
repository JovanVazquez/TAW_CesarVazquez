<?php
// en esta clase se tiene el control 
class MvcController{

	
	public function pagina(){	
		
		include "views/template.php";
	
	}

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

	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "email"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = CRUD::ingresoUsuarioModel($datosController, "GRUPO");
			if($respuesta["email"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;
				$_SESSION["usuario"] = $respuesta;
				if($respuesta['email']=='admin'){
					header("location:index.php?action=alumnos");	
				}
				else{
					header("location:index.php?action=alumnos");
				}				

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	public function vistaAlumnosController(){

		$respuesta = CRUD::vistaAlumnosModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td><a href="index.php?action=alumno_editar&id='.$item["matricula"].'"><button>Editar</button></a></td>
			    <td><a href="index.php?action=alumno_borrar&id='.$item["matricula"].'"><button>Eliminar</button></a></td>
				</tr>';

		}

	}
	public function agregarAlumnosController(){

		$carreras = CRUD::getCarrerasModel();

		echo '<div class="form-group">
                <label for="exampleInputEmail1">Matricula</label>
                <input type="number" class="form-control" placeholder="Matricula" name="matricula" required>
            </div>
			<div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Carrera</label>
                <select class="form-control" name="carrera"><option>';
                foreach ($carreras as $key => $car) {
                	echo "<option>".$car['nombre']."</option>";
                }
          echo '</select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar">
            </div>';

	}
	public function registroAlumnoController(){

		if(isset($_POST["matricula"])){
			$datosController = array( "matricula"=>$_POST["matricula"], 
								      "nombre"=>strtoupper($_POST["nombre"]),
								      "carrera"=>strtoupper($_POST["carrera"]));
			$respuesta = CRUD::registroAlumnoModel($datosController);

			if($respuesta == "success")
				echo '<script> alert("Se Agregó correctamente") </script>';

			else if($respuesta == "Error")
				echo '<script> alert("Error") </script>';
			else
				echo '<script> alert("Ya existe la matricula ingresada") </script>';

			echo '<script> window.location = "index.php?action=alumnos"; </script>';
		}

	}

	public function vistaGruposController(){

		$respuesta = CRUD::vistaGruposModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["cuatrimestre"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a></a></td>
				<td><a></a></td>
		    </tr>';

		}

	}
	public function agregarGruposController(){

		$carreras = CRUD::getCarrerasModel();
		echo '<div class="form-group">
                <label for="exampleInputPassword1">Carrera</label>
                <select class="form-control" name="carrera">';
                foreach ($carreras as $key => $car) {
                	echo "<option>".$car['nombre']."</option>";
                }
          echo '</select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar">
            </div>';

	}

	public function registroGruposController(){

		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>strtoupper($_POST["nombre"]),
							          "cuatrimestre"=>strtoupper($_POST["cuatrimestre"]),

			$respuesta = CRUD::registroGruposModel($datosController);

			if($respuesta == "success"){
				echo '<script> alert("Se Agregó correctamente") </script>';
			}

			else if($respuesta == "Error"){

				echo '<script> alert("Error") </script>';
			}
			else{
				echo '<script> alert("Error") </script>';
			}

			echo '<script> window.location = "index.php?action=grupo"; </script>';

		}

	}

	
}

////
?>