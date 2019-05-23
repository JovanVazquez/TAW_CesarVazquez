<? php
    class MvcController(){
        //llamar a la plantilla
        public function plantilla{

            //include():  se utiliza para invocar el archivo que contiene wl codigo html.
            include "views/template.php"
        }

        //interaccion y navegacion del usuario
        public function enlacesPaginasController(){
            is (isset($_GET["action"])){
                $enlacesController = $_GET("action");
            }
            else{
                $enlacesController ="index";
            }

            //mandsar parametro a MODELO;
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
            include $respuesta;
        }
    }


?>