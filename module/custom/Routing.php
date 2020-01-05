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

    public function rout($request)
    {
        $request = explode('?', $request, 2);
        $requestedUri = $request[0];
        foreach ($this->routes->routes as $route) {
            if ($requestedUri === $route->request) {
                if (isset($route->neededParams)) {
                    foreach ($route->neededParams as $neededParamas) {
                        if (!isset($_GET[$neededParamas])) {
                            throw new Exception("Missing Paramenter", 1);
                        }
                    }
                }
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
        require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . ".php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Header/header.php");
        try {
          if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/settings.json")) {
            $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/settings.json");
            $json = json_decode($file);
            foreach ($json->include as $include) {
                require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/" . $include);
            }
          }
        } catch (\Exception $e) {
          throw new \Exception("File Not Found", 1);
        }
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
