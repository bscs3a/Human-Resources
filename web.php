<?php 
require "./public/finance/routes.php";
require "./public/sales/routes.php";
require "./public/delivery/routes.php";
require "./public/humanResources/routes.php";
require "./public/inventory/routes.php";
require "./public/admin/routes.php";
require "./public/productOrder/routes.php";

$default = [
    '/' => "./src/landing.php",
    '/404' => "./src/error.php",
];

$role = isset($_SESSION['user']) ? $_SESSION['user']['role'] : 'Default';


$keywords = [
    'Product Order' => $po,
    'Human Resources' => $hr,
    'Point of Sales' => $sls,
    'Inventory' => $inv,
    'Finance' => $fin,
    'Delivery' => $dlv,
    'Default' => $default
];

// assign only array based on array, asd
$routes = $keywords[$role];

// if (isset($keywords[$role])) {
//     $routes = $keywords[$role];
// } else {
//     $routes = $keywords['Default'];
// }

Router::setRoutes($routes);

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/Master'; // change me according to your root folder name
$path = str_replace($basePath, '', $path);


foreach ($routes as $route => $action) {
    if (strpos($route, '{') !== false) {
        // This is a dynamic route
        $pattern = str_replace('{id}', '(\d+)', $route);
        if (preg_match("#^$pattern$#", $path, $matches)) {
            // Call the action with the id as a parameter
            $action($matches[1]);
            exit();
        }
    } else if ($path === $route || $path === $route . '/') {
        // This is a static route
        include $action;
        exit();
    }
}

$currentUri = $_SERVER['REQUEST_URI'];
Router::handle('GET', $currentUri);