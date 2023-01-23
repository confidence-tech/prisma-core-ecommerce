<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $includeRoutes = MAIN_URL.'/config/routes.php';
        $this->routes = include ($includeRoutes);
    }

    public function getUri(){
        if (isset($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
        $uri = $this->getUri();

        foreach ($this->routes as $uriPattern=>$path){
            if (preg_match("~$uriPattern~", $uri)){
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segmets = explode('/', $internalRoute);
                $controllerName = array_shift($segmets)."Controller";
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segmets));
                $controllerFile = MAIN_URL.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)){
                    include_once $controllerFile;
                    $controllerObject = new $controllerName;
                    $parameters = $segmets;
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                    if ($result){
                        break;
                    }
                }
            }
        }
    }
}