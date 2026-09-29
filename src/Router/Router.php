<?php
namespace TWApp;

class Router
{
    protected $routes = [];

    public function get(string $path, callable $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

        $handler = $this->routes[$method][$uri] ?? null;
        if ($handler) {
            call_user_func($handler);
            return;
        }

        // Not found
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo 'Not Found';
    }
}
