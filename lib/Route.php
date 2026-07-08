<?php
namespace Lib;


    class Route {
        private static $router = [];

        public function get($uri,$callback){
            $url = trim($uri,'/');
            self :: $routes['GET'][$uri] = $callback;
        }
        public function post($uri,$callback){
            $url = trim($uri,'/');
            self :: $routes['POST'][$uri] = $callback;
        }

        public static function dispach() {
            $uri = $_SERVER ['RESQUEST_URI'];
            $url = trim($uri,'/');

            $method = $_SERVER['REQUEST_METHOD'];

            foreach(self :: $routes[$method] as $route => $callback){

                if(strpos($route,':')!== false){


                
                    $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z])+', $route); 

                    return $route;
                    return; 
                }

                if (preg_match("#^$route$#",$uri, $matches)){

                    $params = array_slice($matches,1);
                    /*$response = $callback(...$params);*/

                    if (is_callable($callback)) {
                      $response = $callback(...$params);
                    }
                    if (is_array($callback)) {
                      $controller = new $callback[0];
                      $response = $controller->{$callback[1]}(...$params);
                    }
                    if (is_array($response) || is_object($response)){
                        header('content-Type : application/json');
                        echo json_encode($response);
                    } else {
                        echo $response;
                    }
                    return; 
                }
                
            }
            echo '404 error';
        }
    }