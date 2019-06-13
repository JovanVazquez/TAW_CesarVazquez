<?php

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

			$respuesta = CRUD::ingresoUsuarioModel($datosController, "MAESTROS");
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

	public function editarAlumnosController(){

		$datosController = $_GET["id"];
		$respuesta = CRUD::editarAlumnoModel($datosController);
		$carreras = CRUD::getCarrerasModel();

		echo '<div class="form-group">
                <label for="exampleInputEmail1">Matricula</label>
                <input type="text" class="form-control" disabled placeholder="Matricula" value="'.$respuesta[0]["matricula"].'" name="matricula">
            </div>
			<div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre"  value="'.$respuesta[0]["nombre"].'" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Carrera</label>
                <select class="form-control" name="carrera"><option>'.$respuesta[0]["carrera"].'</option>';
                foreach ($carreras as $key => $car) {
                	echo "<option>".$car['nombre']."</option>";
                }
          echo '</select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>';

	}

	public function actualizarAlumnoController(){

		if(isset($_POST['nombre'])){

			$datosController = array( "matricula"=>$_GET['id'],
									  "nombre"=>strtoupper($_POST["nombre"]),
							          "carrera"=>strtoupper($_POST["carrera"]));
			
			$respuesta = CRUD::actualizarAlumnoModel($datosController);

			if($respuesta == "success"){
				echo '<script> alert("Se actualizo correctamente") </script>';
				echo '<script> window.location = "index.php?action=alumnos"; </script>';
			}

			else{

				echo "error";

			}

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
	
	public function borrarAlumnoController(){

		if(isset($_GET["id"])){
			$datosController = $_GET["id"];
			
			$respuesta = CRUD::borrarAlumnoModel($datosController);

			if($respuesta == "success"){

				echo '<script> alert("Se eliminó correctamente") </script>';				
			
			}
			else{
				echo '<script> alert("error") </script>';
			}
			echo '<script> window.location = "index.php?action=alumnos"; </script>';

		}

	}

	public function vistaMaestrosController(){

		$respuesta = CRUD::vistaMaestrosModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["password"].'</td>
				<td><a href="index.php?action=maestro_editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=maestro_borrar&id='.$item["id"].'"><button>Eliminar</button></a></td>
		    </tr>';

		}

	}

	public function editarMaestroController(){

		$respuesta = CRUD::vistaMaestrosModel();
		$carreras = CRUD::getCarrerasModel();
		
		//se realiza la estructura del formulario de edicion

		echo '<div class="form-group">
                <label for="exampleInputEmail1">Id</label>
                <input type="text" class="form-control" disabled placeholder="Id" value="'.$respuesta[0]["id"].'" name="id">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Carrera</label>
                <select class="form-control" name="carrera"><option>'.$respuesta[0]["carrera"].'</option>';
                foreach ($carreras as $key => $car) {
                	echo "<option>".$car['nombre']."</option>";
                }
          echo '</select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre"  value="'.$respuesta[0]["nombre"].'" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"  value="'.$respuesta[0]["email"].'" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password"  value="'.$respuesta[0]["password"].'" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>';

	}
	public function actualizarMaestroController(){

		if(isset($_POST['nombre'])){

			$datosController = array( "id"=>$_GET['id'],
									  "nombre"=>strtoupper($_POST["nombre"]),
							          "carrera"=>strtoupper($_POST["carrera"]),
				                      "email"=>$_POST["email"],
				                      "password"=>$_POST["password"]);
			
			$respuesta = CRUD::actualizarMaestroModel($datosController);

			if($respuesta == "success"){

				echo '<script> alert("Se actualizo correctamente") </script>';
				echo '<script> window.location = "index.php?action=maestros"; </script>';

			}

			else{

				echo "error";

			}

		}
	
	}
	public function agregarMaestrosController(){

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
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar">
            </div>';

	}

	public function registroMaestroController(){

		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>strtoupper($_POST["nombre"]),
							          "carrera"=>strtoupper($_POST["carrera"]),
				                      "email"=>$_POST["email"],
				                      "password"=>$_POST["password"]);

			$respuesta = CRUD::registroMaestroModel($datosController);

			if($respuesta == "success"){
				echo '<script> alert("Se Agregó correctamente") </script>';
			}

			else if($respuesta == "Error"){

				echo '<script> alert("Error") </script>';
			}
			else{
				echo '<script> alert("Ya existe el email ingresado") </script>';
			}

			echo '<script> window.location = "index.php?action=maestros"; </script>';

		}

	}
	
	public function borrarMaestroController(){

		if(isset($_GET["id"])){
			$datosController = $_GET["id"];

			$respuesta = CRUD::borrarMaestroModel($datosController);

			if($respuesta == "success")
				echo '<script> alert("Se eliminó correctamente") </script>';				
		
			else{
				echo '<script> alert("No se puede eliminar, se asignó como Tutor a un alumno. Para eliminar cambie de tutor al alumno") </script>';
			}
			echo '<script> window.location = "index.php?action=maestros"; </script>';

		}

	}
	public function vistaMateriasController(){

		$respuesta = CRUD::vistaMateriasModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["encaragdo"].'</td>
				<td>'.$item["turno"].'</td>
				<td>'.$item["creditos"].'</td>
				<td><a href="index.php?action=materias_editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=materias                                                                                                                 _borrar&id='.$item["id"].'"><button>Eliminar</button></a></td>
		    </tr>';

		}

	}
	
}

////
?>