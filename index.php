<?php
    require_once 'Configuration.php';
    require_once 'vendor/autoload.php';


    $databaseConfiguration = new App\Core\DatabaseConfiguration(
             Configuration::DATABASE_HOST,
             Configuration::DATABASE_USER,
             Configuration::DATABASE_PASS,
             Configuration::DATABASE_NAME
           );
    $databaseConnection = new App\Core\DatabaseConnection($databaseConfiguration);

    $url = strval(filter_input(INPUT_GET, 'URL'));
    $httpMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

    $router = new App\Core\Router();
    $routes = require_once 'Routes.php';
    foreach ($routes as $route) {
        $router->add($route);
    }

    $route = $router->find($httpMethod, $url);
    $arguments = $route->extractArguments($url);

    $fullControllername = '\\App\\Controllers\\' . $route->getControllerName() . 'Controller';

    $controller = new $fullControllername($databaseConnection);
    call_user_func_array([$controller, $route->getMethodName()], $arguments);
    $data = $controller->getData();


    foreach ($data as $name => $value) {
        $$name = $value;
    }

    require_once 'views/' . $route->getControllerName() . '/' . $route->getMethodName() . '.php';
