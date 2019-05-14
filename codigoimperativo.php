<?php
//Codigo imperativo espaguetti
$automovil1=(object)["marca"=>"Chevrolet","modelo"=>"Chevy"];
$automovil2=(object)["marca"=>"Ford","modelo"=>"Lobo"];
$automovil3=(object)["marca"=>"Honda","modelo"=>"CRV"];


//función con parametros para imprimir determinado automovil
function mostrar ($automovil){
    echo "<p> Hola soy un $automovil->marca, modelo $automovil->modelo</p>";
}

mostrar($automovil1);
var_dump($automovil1)
mostrar($automovil2);
mostrar($automovil3);

?>