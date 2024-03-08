<?php
require __DIR__ . '/vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

class Router
{
    public static function handle($method = 'GET', $path = '/', $filename =''){
        // print_r($_SERVER);
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        // echo $path; 
        if($currentMethod != $method ){
            require $filename;
        }
      
        // $root = getenv('PROXY_ADDRESS');
        $root = "/Master";

        $pattern = '#^'.$root.$path.'$#sD';
        if(preg_match($pattern, $currentUri)){
            require_once $filename;
            exit();
        }

        return false;
    }
}

