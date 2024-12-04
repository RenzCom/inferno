<?php
namespace inferno\router;

class Route {
    private $path;
    private $viewOrController; // This can be a view file or a controller class
    private $viewDir;
    private $function;
    private $methods;
    private static $routes = [];
    private static $requestHandled = false;

    public function __construct($path, $viewOrController, $viewDir, $function = null, $methods = ['GET']) {
        $this->path = $path;
        $this->viewOrController = $viewOrController;
        $this->viewDir = $viewDir;
        $this->function = $function;
        $this->methods = $methods;
        self::$routes[] = $this;
    }

    public static function get($path, $view, $function = null) {
        if (is_null($function)) {
            return new Route($path, $view . '.php', 'views/', null, ['GET']);
        } else {
            return new Route($path, $view, 'app/controllers/', $function, ['GET']);
        }
    }

    public static function post($path, $controllerClass, $function) {
        return new Route($path, $controllerClass, 'app/controllers/', $function, ['POST']);
    }

    public static function any($path, $controllerClass, $viewOrFunctions, $methods) {
        foreach ($methods as $index => $method) {
            $viewOrFunction = $viewOrFunctions[$index][0];
            $isFunction = $viewOrFunctions[$index][1];
            if ($method === 'GET' && !$isFunction) {
                new Route($path, $viewOrFunction . '.php', 'views/', null, ['GET']);
            } else {
                new Route($path, $controllerClass, 'app/controllers/', $viewOrFunction, [$method]);
            }
        }
    }
    
    public static function css() {
        return new Route('/css', 'style.css', 'src/css/');
    }

    public static function js() {
        return new Route('/js', 'script.js', 'src/js/');
    }

    public function match($request, $method) {
        if ($request === $this->path) {
            if (!in_array($method, $this->methods)) {
                http_response_code(405);
                echo '405 | Method not allowed';
                exit();
            }

            if ($this->viewDir === 'src/css/') {
                header('Content-Type: text/css');
                readfile($this->viewDir . $this->viewOrController);
            } else if ($this->viewDir === 'src/js/') {
                header('Content-Type: text/javascript');
                readfile($this->viewDir . $this->viewOrController);
            } else {
                if ($this->function) {
                    $controllerInstance = new $this->viewOrController();
                    $controllerInstance->{$this->function}();
                } else if (class_exists($this->viewOrController)) {
                    $controllerInstance = new $this->viewOrController(); 
                    if (method_exists($controllerInstance, 'handle')) {
                        echo 'method exists';
                        return $controllerInstance->handle();
                    }
                } else {
                    include $this->viewDir . $this->viewOrController;
                }
            }
            return true;
        }
        return false;
    }

    public static function handleRequest($request) {
        if (self::$requestHandled) {
            return;
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route->match($request, $method)) {
                self::$requestHandled = true;
                return;
            }
        }

        self::$requestHandled = true;
        echo "404 Not Found";
    }
}