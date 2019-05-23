<?php
	
	//se crea una clase la cual tendrá diferentes funciones
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="root";
		private $dbname="poo_bd";
		function __construct(){
			$this->connect_db();
		}

		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_error());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}

		//funcion para crear un usuario

		public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico){
			$sql = "INSERT INTO `clientes` (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//funcion para leer 
		public function read(){
			$sql = "SELECT * FROM clientes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		//registro unico
		public function single_record($id){
			$sql = "SELECT * FROM clientes where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		//funcion para actualizar clientes
		public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico, $id){
			$sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		//funcion para borrar clientes
		public function delete($id){
			$sql = "DELETE FROM clientes WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

