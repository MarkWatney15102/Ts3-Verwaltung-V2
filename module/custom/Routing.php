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
                echo $route->request;
            }
        }
    }

    private function getRoutesList()
    {
        $jsonParser = new JsonParser($_SERVER['DOCUMENT_ROOT'] . "/routes.json");
        $this->routes = $jsonParser->getJsonArray();
    }
}

