<?php 

class Routing
{
    /**
     * @var array
     */
    private $routes;

    public function __construct()
    {
        $this->getRoutesList();
    }

    public function redirect($requestedUri)
    {
        foreach ($this->routes->routes as $route) {
            if ($requestedUri == $route->request) {
                require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller);
                $controller = new $route->controllerName;
                $controller->init(new Title());
                break;
            }
        }
    }

    private function getRoutesList()
    {
        $jsonParser = new JsonParser($_SERVER['DOCUMENT_ROOT'] . "/routes.json");
        $this->routes = $jsonParser->getJsonArray();
    }
}

