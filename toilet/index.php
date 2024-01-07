<?php
define('BASE_PATH', __DIR__ . "/app/");
define('BASE_URL', "http://localhost/toilet");
date_default_timezone_set('Asia/Jakarta');

session_start();
require_once BASE_PATH . "Models/Users.php";
require_once BASE_PATH . "Models/Toilets.php";

$request_uri = $_SERVER['REQUEST_URI'];
$uri_segments = explode('/', trim($request_uri, '/'));

$controller_name = ucfirst(!empty($uri_segments[1]) ? $uri_segments[1] : 'home') . 'Controller';
$method_name = !empty($uri_segments[2]) ? $uri_segments[2] : 'index';

$controller_path = "app/Controllers/$controller_name.php";

$controller = [
    'UserController', 'ToiletController'
];

if (($controller_name == 'UserController' || ($controller_name == 'ToiletController' && $method_name == "index")) && $_SESSION['user']['role'] != "Admin") {
    $_SESSION['alert'] = ['danger', 'You aren\'t Unauthorized'];
    header("Location: " . BASE_URL . "/home");
    exit;
}

if (file_exists($controller_path)) {
    require_once $controller_path;

    $controller = new $controller_name();

    if (method_exists($controller, $method_name)) {
        $params = array_slice($uri_segments, 3);

        call_user_func_array([$controller, $method_name], $params);
    } else {
        $controller->index();
    }
} else {
    require_once "app/Controllers/HomeController.php";

    $homeController = new HomeController();
    $homeController->index();
}