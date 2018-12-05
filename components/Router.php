<?php

class Router{

private $routes;


    
    public function __construct()
    {
        // routes file
        $routesPath = ROOT . '/config/routes.php';

        $check = false;

        // get routes
        $this->routes = include($routesPath);
    }

private function getUri(){
	if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
}

public function run(){
        $check = false;

		$uri = $this->getUri();

		
		foreach ($this->routes as $uriPattern => $path) {     //uripattern = routes-key   path = routes value
			if (preg_match("~$uriPattern~", $uri)) {

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri); //get controller and action

				$segments = explode('/', $internalRoute);
				$controllerName = array_shift($segments) . 'Controller'; //controller name

                $actionName = 'action' . array_shift($segments); //action name

                $parameters = $segments; //parameters

                 // file controller
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // create object
                $controllerObject = new $controllerName;

                // call method with parameters
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters); //call method of class

                // if call method ok we close router
                if ($result != null) {
                    $check = true;
                    break;
                }    
		}
	}
    if (!$check) {
        http_response_code(404);
        include(ROOT . '/views/error/404.php');
        die();
     }
}
}