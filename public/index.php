<?php
// index.php
// This file handles routing based on the URL and method, 
// and directs to the appropriate controller actions.
require '../config/routes.php';

// Get the URL and and HTTP method of the request
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Handle routing for login and logout routes
if ($uri == '/login' && $method == 'POST') {
    $controller = new \App\Controller\AuthController();
    $controller->login();
} elseif ($uri == '/logout' && $method == 'POST') {
    $controller = new \App\Controller\AuthController();
    $controller->logout();
} else {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(['status' => 'error', 'message' => 'Route not found']);
}
