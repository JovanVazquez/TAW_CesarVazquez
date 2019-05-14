<?php
    //definir CLASE para mostrar PROPIEDADES de libros
    class libro{
        public $titulo;
        public $autor;
        public $anio_publicacion;
        public $numero_hojas;
        public $editorial;
        public function libro($_titulo,$_autor,$_anio_publicacion,$_numero_hojas,$_editorial){
            $this->titulo=$_titulo;
            $this->autor=$_autor;
            $this->anio_publicacion=$_anio_publicacion;
            $this->numero_hojas=$_numero_hojas;
            $this->editorial=$_editorial;
        }

    }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
    <?php 
        $libro_1 = new libro("Libro 1","Autor 1","2015","Número de hojas por defecto 235","Editorial UPV");
    ?>
 <body>
     <h1 align="center"><?php echo $libro_1->titulo; ?> </h1>
     <h1 align="center"><?php echo $libro_1->autor;  ?> </h1>
     <h1 align="center"><?php echo $libro_1->anio_publicacion;  ?> </h1>
     <h1 align="center"><?php echo $libro_1->numero_hojas;  ?> </h1>
     <h1 align="center"><?php echo $libro_1->editorial;  ?> </h1>
 </body>
 </html>