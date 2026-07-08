<?php

use lib\Route;
use app\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']
);
Route::get('/contact', function(){
    return'hola desde la pagina de contacto';
});
Route::get('/about', function(){
    return'hola desde la pagina acerca de';
});
Route::get('/courses/:slug', function($slug){
    return'El curso es: ' . $slug;
});
Route::dispatch();