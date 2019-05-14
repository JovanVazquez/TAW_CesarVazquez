<?php

//Se incluye la clase
include "funciones.php";

//Instanciar la clase

//......PERSONA 1.....
$persona = new persona(1);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 1: <br>";
$persona->setCalificacion1(60);
$persona->setCalificacion2(100);
$persona->setCalificacion3(60);

$alumno1 = array ("Unidad 1:"=>$persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno1);

// resultados
foreach ($alumno1 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 2
$persona = new persona(2);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 2 <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(77);
$persona->setCalificacion3(80);

$alumno2 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno2);

//resultados
foreach ($alumno2 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 3
$persona = new persona(3);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 3: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno3 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno3);

//Resultados
foreach ($alumno3 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 4
$persona = new persona(4);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 4: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno4 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno4);

//Resultados
foreach ($alumno4 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 5
$persona = new persona(5);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 5: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno5 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno5);

//Resultados
foreach ($alumno5 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 6
$persona = new persona(3);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 6: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno6 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno6);

//Resultados
foreach ($alumno6 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 7
$persona = new persona(7);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 7: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno7 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno7);

//Resultados
foreach ($alumno7 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 8
$persona = new persona(8);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 8: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno8 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno8);

//Resultados
foreach ($alumno8 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 9
$persona = new persona(9);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 9: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno9 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno9);

//Resultados
foreach ($alumno9 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";

//..... PERSONA 10
$persona = new persona(10);

//Asignacion de valores a las propiedades del objeto
echo"Alumno 10: <br>";
$persona->setCalificacion1(80);
$persona->setCalificacion2(90);
$persona->setCalificacion3(74);

$alumno10 = array ("Unidad 1:"=> $persona->calificacion1, "Unidad 2:" =>$persona->calificacion2, "Unidad 3:"=>$persona->calificacion3);
arsort($alumno10);

//Resultados
foreach ($alumno10 as $key => $val){
	echo $key ."=" . $val . "<br>";
}
if ($persona->calificacion1 <= 60 or $persona->calificacion2 <= 60 or $persona->calificacion3 <= 60 ){
	echo"Promedio: 60";
} 
else{
echo"Promedio: ".$persona->promedio();
}
echo"<br><br>";
?>