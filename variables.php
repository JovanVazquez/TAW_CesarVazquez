<? php
	//variable numerica

$numero =5.9;
echo "Esto es un numero: $numero <br>";
var_dump($numero);  //saca las propiedades del numero
echo "<br><br>";

//palabra

$palabra = "ITI";
echo "esto es una palabra: $palabra <br>";
var_dump($palabra);
echo "<br><br>";

$booleana=true;
echo "esto es una variable booleana: $booleana<br>";
var_dump($booleana);
echo "<br><br>";

//arreglos unidimensionales
$arregloColores = array("rojo,amarillo");
echo"esto es una variable de array: $arregloColores[1]<br>";
var_dump($arregloColores);
echo "<br><br>";

//variable arreglo con prioridades
$arregloVerduras = array("verdura1"=>"lechuga","verdura2"=>"cebollas");
echo "esto es un array con propiedades: $arregloVerduras [verdura1]<br>";
var_dump($arregloVerduras);
echo "<br><br>";

//variables de tipo  objeto
/////////////$frutas = array("verdura1"=>"lechuga",);
echo "esto es una variable de tipo objeto: $frutas-> fruta1<br>";
var_dump($frutas);
echo "<br><br>";



?>