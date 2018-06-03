<?php
    require_once('core/DatabaseConfiguration.php');
    require_once('core/DatabeseConnection.php');
    require_once('models/UserModel.php');

    use App\Core\DatabaseConfiguration;
    use App\Core\DatabaseConnection;
    use App\Models\UserModel;

    $databaseConfiguration = new DatabaseConfiguration('localhost', 'root', 'root', 'auction_project');
    $databaseConnection = new DatabaseConnection($databaseConfiguration);

    $userModel = new UserModel($databaseConnection);

    // $user = $userModel->getAll();
    // print_r($user);

    // $user = $userModel->getById(2);
    // print_r($user);

    $user = $userModel->getByUsername('aanicic');
    $message = 'Ovaj korisnik ne postoji!';
    if ($user !== NULL) {
      $message = print_r($user, true);
    }
    echo $message;

 ?>
