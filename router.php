<?php

require __DIR__ . '/vendor/autoload.php';

require "./web.php";

class Router
{
    public static $validRoutes = [];

    public static function setRoutes($routes)
    {
        self::$validRoutes = $routes;
    }

    public static function handle($method = 'GET', $path = '/')
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        if ($currentMethod != $method) {
            return;
        }

        // Get the base path of the application
        $basePath = dirname($_SERVER['SCRIPT_NAME']);

        // Replace the base path in the current URI
        $currentUri = str_replace($basePath, '', $currentUri);

        // If the current URI is an empty string, set it to "/"
        if ($currentUri === '') {
            $currentUri = '/';
        }

        $validRoutes = self::$validRoutes;
        if (array_key_exists($currentUri, $validRoutes)) {
            
            self::audit_log();
            require_once $validRoutes[$currentUri];
        } else {
            // Check for dynamic routes
            foreach ($validRoutes as $route => $action) {
                // Replace {param} with regex pattern
                $pattern = preg_replace('/{[\w-]+}/', '(\w+)', $route);
                if (preg_match("#^$pattern$#", $currentUri, $matches)) {
                    self::audit_log();
                    array_shift($matches); // remove the first match
                    call_user_func_array($action, $matches);
                    exit();
                }
            }

            // The route is not valid
            // require_once __DIR__ . "/src/error.php";
            self::redirect(isset($_SESSION['user']) ? $_SESSION['user']['role'] : 'Default');
        }
        exit();
    }

    public static function post($path, $callback)
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        // Get the base path of the application
        $basePath = dirname($_SERVER['SCRIPT_NAME']);

        // Replace the base path in the current URI
        $currentUri = str_replace($basePath, '', $currentUri);

        // If the current URI is an empty string, set it to "/"
        if ($currentUri === '') {
            $currentUri = '/';
        }

        if ($currentMethod === 'POST' && $currentUri === $path) {
            self::audit_log();
            call_user_func($callback);
            exit();
        }
    }

    private static function redirect($user){
        $_SESSION['pageNotFound'] = true;

        $base_url = 'master'; // Define your base URL here

        if ($user == 'Product Order') {
            header("Location: /$base_url/po/audit_logs/page=1");
            exit();
        } 
        if ($user == 'Human Resources') {
            header("Location: /$base_url/hr/dashboard");
            exit();
        } 
        if ($user== 'Point of Sales') {
            header("Location: /$base_url/sls/Dashboard");
            exit();
        } 
        if ($user== 'Inventory') {
            header("Location: /$base_url/inv/main");
            exit();
        } 
        if ($user == 'Finance') {
            header("Location: /$base_url/fin/dashboard");
            exit();
        } 
        if ($user== 'Delivery') {
            header("Location: /$base_url/dlv/dashboard");
            exit();
        } 
        if($user == 'Default'){
            header("Location: /$base_url/");
            exit();
        }
    }

    public static function audit_log(){

        $db = Database::getInstance();
        $conn = $db->connect();
    
        $account_id = isset($_SESSION['user']['account_id']) ? $_SESSION['user']['account_id'] : null;
    
        if ($account_id == null) {
            return;
        }
        $date = date('Y-m-d H:i:s');
        $action = $_SERVER['REQUEST_METHOD'].": " . $_SERVER['REQUEST_URI'];
        $sql = "INSERT INTO audit_log (account_id, action, datetime) VALUES (:account_id, :action, :date)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':account_id', $account_id);
        $stmt->bindParam(':action', $action);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }
}

