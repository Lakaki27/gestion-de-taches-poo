<?php
class Router
{
    private $routes = [];
    public function add($path, $callback)
    {
        $this->routes[$path] = $callback;
    }
    
    private function getCallback($path)
    {
        $callback = null;
        
        foreach ($this->routes as $pattern => $route) {
            if (preg_match("@".$pattern."@", $path)) {
                $callback = $route;
            }
        }
        
        return $callback ?? null;
    }

    public function dispatch()
    {
        $path = strtok($_SERVER['REQUEST_URI'], '?') ?: '/';
        
        $callback = $this->getCallback($path);
        
        if (!$callback) {
            http_response_code(404);
            echo "Page non trouvée";
            return;
        }
        echo call_user_func($callback);
    }
}
