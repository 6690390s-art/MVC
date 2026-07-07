<?php

use lib\Route;
Route::get('/', function(){
    echo'hola desde la pagina principal';
});
Route::get('/contact', function(){
    echo'hola desde la pagina de contacto';
});
Route::get('/about', function(){
    echo'hola desde la pagina acerca de';
});
Route::get('/courses/:slug', function($slug){
    echo'hola desde la pagina de cursos';
});
Route::dispatch();