<?php
namespace inferno\router;

class Route {
    private $path;
    private $viewOrController; // This can be a view file or a controller class
    private $viewDir;
    private $function;
    private static $routes = [];
    private static $requestHandled = false;

    public function __construct($path, $viewOrController, $viewDir, $function = null) {
        $this->path = $path;
        $this->viewOrController = $viewOrController;
        $this->viewDir = $viewDir;
        $this->function = $function;
        self::$routes[] = $this;
    }

    public static function get($path, $view) {
        return new Route($path, $view . '.php', 'views/');
    }

    public static function post($path, $controllerClass, $function) {
        return new Route($path, $controllerClass, 'app/controllers/', $function);
    }

    public static function css() {
        return new Route('/css', 'style.css', 'src/css/');
    }

    public static function js() {
        return new Route('/js', 'script.js', 'src/js/');
    }

    public function match($request) {
        if ($request === $this->path) {
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

        foreach (self::$routes as $route) {
            if ($route->match($request)) {
                self::$requestHandled = true;
                return;
            }
        }

        self::$requestHandled = true;
        echo "404 Not Found";
    }
}