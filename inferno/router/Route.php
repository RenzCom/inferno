<?php
namespace inferno\router;

class Route {
    private $path;
    private $view;
    private $viewDir;
    private static $routes = [];
    private static $requestHandled = false;
    private $method;

    public function __construct($path, $view, $viewDir) {
        $this->path = $path;
        $this->view = $view;
        $this->viewDir = $viewDir;
        self::$routes[] = $this;
    }

    public static function get($path, $view) {
        return new Route($path, $view . '.php', 'views/');
    }

    public static function post($path, $view, $controller = null) {
        if ($controller == null) {
            return new Route($path, $view . '.php', 'views/');
        }
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
                readfile($this->viewDir . $this->view);
            } else if ($this->viewDir === 'src/js/') {
                header('Content-Type: text/javascript');
                readfile($this->viewDir . $this->view);
            } else {
                include $this->viewDir . $this->view;
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