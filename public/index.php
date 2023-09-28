<?php
require_once('../autoload.php');
require_once('../config/app.php');

$uri = isset($_GET['uri']) ? $_GET['uri'] : '';
$uri = explode('/', $uri);

$routeName = isset($uri[0]) ? $uri[0] : '';

if (array_key_exists($routeName, $routes)) {
    $route = $routes[$routeName];
    $controllerClass = $route['controller'];
    $controller = new $controllerClass();

    if (isset($uri[1]) && isset($route['methods'][$uri[1]])) {
        $method = $uri[1];
    } else if (!isset($uri[1])) {
        $method = 'default';
    }

    if (isset($method) && method_exists($controller, $route['methods'][$method])) {
        $method = $route['methods'][$method];
        $controller->$method();
    } else {
        $error->error404();
    }
} else {
    $error->error404();
}
