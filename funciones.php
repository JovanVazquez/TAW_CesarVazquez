<? php
	//funcion sin parametros
function saludo(){
	echo "hola<br>";
}
saludo();

//funciones con parametros
function despedida ($adios){
	echo $adios."<br>";
}
despedida("adios salida");

//funcion con retorno
function retorno ($retornar){
	return $retornar;
}
echo retorno ("esto es un retorno");


?>
