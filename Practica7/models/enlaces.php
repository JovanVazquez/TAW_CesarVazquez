<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "alumnos" || $enlaces == "salir" || $enlaces == "maestros" || 
		   $enlaces == "alumno_editar" || $enlaces == "alumno_borrar" || $enlaces == "alumno_agregar" ||
		   $enlaces == "maestro_borrar" || $enlaces == "maestro_agregar" || $enlaces == "maestro_editar"){

			$module =  "views/modules/".$enlaces.".php";
		
		}
		else{

			$module =  "views/modules/ingresar.php";
		
		}
		
		return $module;

	}

}

?>
