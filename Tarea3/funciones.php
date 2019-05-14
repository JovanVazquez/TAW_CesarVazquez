<?php

//se define la clase
class persona{
    //se definen propiedades
    public $calificacion1;
    public $calificacion2;
    public $calificacion3;
}

//......... Se definen métodos de obtención de datos
    
//getters

	public function getCalificacion1(){
		return $this -> calificacion1;
	}
	public function getCalificacion2(){
		return $this -> calificacion2;
	}
    public function getCalificacion3(){
    	return $this -> calificacion3;
    }

    //......... Se definen métodos de asignación de datos
    
    //setters

    public function setCalificacion1($valor){
    	$this -> calificacion1=$valor;
    }

    public function setCalificacion2($valor){
    	$this -> calificacion2=$valor;
    }
    public function setCalificacion3($valor){
    	$this -> calificacion3=$valor;
    }

    //Método de cálculo de promedio

    public function promedio(){
    	return ($this -> calificacion1 + $this -> calificacion2 + $this -> calificacion3) / 3;
    }

}

?>