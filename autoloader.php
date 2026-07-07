<?php

spl_autoload_register(function($class){
    $ruta ='../' , str_replace("\\", "/", $class) . ".php";

    if (file_exists($ruta)){
        require_once $ruta;
    }else{
        die("no se puede cargar la clase $clase");
    }
});