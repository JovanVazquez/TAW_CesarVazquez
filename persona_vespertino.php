<?php

//definir la clase persona

class persona{
    //definir propiedades

public $edad;
public $altura;
public $peso;

//definir metodos de datos
//getters

public function getEdad(){
    return $this->edad;
}
public function getPeso(){
    return $this->peso;

}
public function getAltura(){
    return $this->altura;
}

//definir metodos de asignacion de datos
//setters
public function setEdad($valor){
    $this->edad=$valor;

}
public function setAltura($valor){
    $this->altura=$valor;

}
public function setPeso($valor){
    $this->peso=$valor;

}

//metodo de calculo de IMC accediendo a las propiedades
public function imc(){
    return $this ->peso / ($this->altura * $this->altura);
}

//calcula el IMC accediendo mediante los metodos get
public function imc2(){
    return $this->getPeso() / ($this->getAltura() * $this->getAltura());
}

?>