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

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var array
     */
    private $pattern = [
        "/param=.+/",
        "/\d+/"
    ];

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->getRoutesList();
    }

    public function rout($request)
    {
        $requestedUri = $this->checkPregMatch($request);
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
        require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . ".php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Header/header.php");
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/settings.json")) {
            $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/settings.json");
            $json = json_decode($file);
            if ($json->include != null) {
                foreach ($json->include as $include) {
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/" . $route->controller . "/" . $include);
                }
            }
        } else {
            throw new \Exception("File Not Found", 1);
        }
        if ($this->config->permissions->checkRoutAccess((int)$route->neededLevel)) {
            $controller = new $route->controllerName;
            $controller->init(new Title(), $this->config, $this->params);
            $controller->createView();                       
        } else {
            throw new \Exception("Access Denied");
        }
    }

    private function getRoutesList()
    {
        $jsonParser = new JsonParser($_SERVER['DOCUMENT_ROOT'] . "/routes.json");
        $this->routes = $jsonParser->getJsonArray();
    }

    private function checkPregMatch(string $rout) 
    {
        foreach ($this->pattern as $pattern) {
            preg_match($pattern, $rout, $matches);
            if (!empty($matches)) {
                $this->params['url_param'] = str_replace('param=', '', $matches[0]);
                $rout = $this->removeParamFromUrl($rout);
            }
        }

        return $rout;
    }

    private function removeParamFromUrl(string $rout) 
    {
        $rout = explode("/", $rout);
        unset($rout[0]);
        
        $flipedRout = array_reverse($rout, false);
        unset($flipedRout[0]);

        $rout = array_reverse($flipedRout, false);

        $rout = implode("/", $rout);

        return "/" . $rout;
    }

    public static function getSubroutingCount()
    {
        $routSeperation = explode("/", $_SERVER['REQUEST_URI']);
        unset($routSeperation[0]);

        return count($routSeperation);
    }
}
