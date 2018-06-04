<?php

    require_once 'vendor/autoload.php';


    $databaseConfiguration = new App\Core\DatabaseConfiguration('localhost', 'root', 'root', 'auction_project');
    $databaseConnection = new App\Core\DatabaseConnection($databaseConfiguration);

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
