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

    # twig file sistem loader
    $loader = new Twig_Loader_Filesystem("./views");
    $twig = new Twig_Environment($loader, [
        "cache" => "./twig-cache",
        "auto_reload" => true // ovo se na kraju projekta briše ili podesi na false
    ]);

    #twig rendering engine
    echo $twig->render($route->getControllerName() . '/' . $route->getMethodName() . '.html', $data);
