<?php

namespace App\Core;

class Router
{
    public static function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $routes = [
            ['GET', '/', [\App\Controllers\PageController::class, 'home']],
            ['GET', '/login', [\App\Controllers\AuthController::class, 'showLogin']],
            ['POST', '/login', [\App\Controllers\AuthController::class, 'login']],
            ['GET', '/register', [\App\Controllers\AuthController::class, 'showRegister']],
            ['POST', '/register', [\App\Controllers\AuthController::class, 'register']],
            ['POST', '/logout', [\App\Controllers\AuthController::class, 'logout']],
            ['GET', '/posts', [\App\Controllers\PostController::class, 'feed']],
            ['POST', '/posts', [\App\Controllers\PostController::class, 'create']],
        ];

        foreach ($routes as [$routeMethod, $path, $handler]) {
            if ($method === $routeMethod && $uri === $path) {
                [$controllerClass, $action] = $handler;
                $controller = new $controllerClass();
                $controller->$action();
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}
