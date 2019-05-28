<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "administracion" || $enlaces == "clientes" || $enlaces == "cliente_agregar"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else{

			$module =  "views/modules/ingresar.php";
		
		}
		return $module;

	}

}

?>