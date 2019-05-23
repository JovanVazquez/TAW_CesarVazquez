<?php 
if (isset($_GET['id'])){
	include('database.php');
	$clientes = new Database();
	$id=intval($_GET['id']);
	$res = $clientes->delete($id);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>