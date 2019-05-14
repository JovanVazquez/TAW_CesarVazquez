<?php
#CLASE: 
//Una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado o identidad.

class Automovil{
    //PROPIEDADES: Son las caracteristicas que puede tener un objeto.
    public $marca;
    public $modelo;

    //METODOS: Es el algoritmo asociado a un objeto que indica la capacidad de lo que éste puede hacer. La unica diferencia entre el metodo y función es que llamamos al metodo funciones a los algoritmos de la programación estructurada.

    public function mostrar(){
        echo "<p> Hola, soy un $this->marca, modelo $this->modelo</p>";
    }

    
}

//OBJETO: Es una entidad provista de metodos o mensajes a los cuales responde propiedades con valores concretos.
$a = new automovil();
$a ->marca = "Chevrolet";
$a ->modelo = "Chevy";
$a ->mostrar();

$b = new automovil();
$b ->marca = "Ford";
$b ->modelo = "Lobo";
$b ->mostrar();

$c = new automovil();
$c ->marca = "Honda";
$c ->modelo = "CRV";
$c ->mostrar();

//Principios de la POO que se cumplen en este ejemplo:

//1. ABSTRACCION: Nuevos tipos de datos (el que quieras lo creas)
//2. ENCAPSULACION: Organiza el codigo en grupos logicos.
//3. OCULTAMIENTO: Oculta detalles de implementacion y expone solo los detalles  que son necesarios

?>