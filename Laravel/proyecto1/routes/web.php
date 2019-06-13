<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Cuando un usuario hace una peticion HTTP, Laravel busca en los aarchivos de rutas una definició que coincida con el patron de la UR según el metodo utilizado, antes caso HTTP, encontrando una coincidencia, la muestra.

Route::get('/', function () {
    return view('welcome');
});



Route::get('/usuario', function () {
    return ('Mostrando ID del usuario: '.$GET['id']);
});

//En el URL poner /usr/?id=5

////////
//Ruta con  Laravel, mostrando ID Usuario con parámetros LIMPIOS.

Route::get('/usuario2/{id}', function ($id) {
    return "Mostrando ID del usuario: {id}";
})->where ('id', '[0-9]+');


///Ruta con dos parametros: nombre y apodo

Route::get('/saludo/{name}/{nickname}', function ($name, $nickname) {
    return "Bienvenido: {$name}, tu nickname e:. {$nickname}";
});



///Ruta con dos parametros: nombre y apodo OPCIONAL

Route::get('/saludo2/{name}/{nickname?}', function ($name, $nickname=null) {
	if($nickname){
    return "Bienvenido: {$name}, tu nickname e:. {$nickname}";
}
else{
	return "Bienvenido: {$name}, NO tienes apodo";
}
});