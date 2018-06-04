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

    $url = filter_input(INPUT_GET, 'URL');
    $httpMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

    $router = new App\Core\Router();
    $routes = require_once 'Routes.php';
    foreach ($routes as $route) {
        $router->add($route);
    }

    $route = $router->find($httpMethod, $url);
    $arguments = $route->extractArguments($url);
    
    print_r($route);
    print_r($arguments);
    exit;

    # Rutiranje!
    # Smatraćemo da se uvijek traži MainController i njegov metod home

    $controller = new \App\Controllers\MainController($databaseConnection);
    $controller->home();
    $data = $controller->getData();
    // print_r($data);

    foreach ($data as $name => $value) {
        $$name = $value;
    }

    require_once 'views/Main/home.php';
