<?php
    // require_once('core/DatabaseConfiguration.php');
    // require_once('core/DatabeseConnection.php');
    // require_once('models/UserModel.php');
    require_once('vendor/autoload.php');


    $databaseConfiguration = new App\Core\DatabaseConfiguration('localhost', 'root', 'root', 'auction_project');
    $databaseConnection = new App\Core\DatabaseConnection($databaseConfiguration);

    $userModel = new App\Models\UserModel($databaseConnection);

    // $user = $userModel->getAll();
    // print_r($user);

    // $user = $userModel->getById(2);
    // print_r($user);

    $user = $userModel->getByUsername('mariola');

    $message = 'Ovaj korisnik ne postoji!';
    if ($user !== NULL) {
      $message = print_r($user, true);
    }
    echo $message;


    $categoryModel = new App\Models\CategoryModel($databaseConnection);
    $categories = $categoryModel->getAll();
    print_r($categories);
