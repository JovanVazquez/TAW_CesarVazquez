<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "alumnos" || $enlaces == "salir" || $enlaces == "grupos" || 
		   $enlaces == "alumno_agregar" ||
		   $enlaces == "grupos_agregar" ){

			$module =  "views/modules/".$enlaces.".php";
		
		}
		else{

			$module =  "views/modules/ingresar.php";
		
		}
		
		return $module;

	}

}

?>
