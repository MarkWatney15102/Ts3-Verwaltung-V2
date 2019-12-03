<?php 

class Routing
{
    /**
     * @var array
     */
    private $routes;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->getRoutesList();
    }

    public function rout($requestedUri)
    {
        foreach ($this->routes->routes as $route) {
            if ($requestedUri === $route->request) {
                $this->internalRouting($route);
                break;
            } else {
                if(isset($route->secondRequest)) {
                    if($requestedUri === $route->secondRequest) {
                        $this->internalRouting($route);
                        break;
                    }
                }
            }
        }
    }

    private function internalRouting($route)
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller);
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Header/header.php");
        $controller = new $route->controllerName;
        $controller->init(new Title(), $this->config);
        $controller->createView();
    }

    private function getRoutesList()
    {
        $jsonParser = new JsonParser($_SERVER['DOCUMENT_ROOT'] . "/routes.json");
        $this->routes = $jsonParser->getJsonArray();
    }
}

