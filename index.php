<?php
    $source = 'mysql:host=localhost;dbname=auction_project;charset=utf8';
    $user   = 'root';
    $pass   = 'root';
    $db = new PDO($source, $user, $pass);

    //način na koji uzimamo category id metodom get iz linka
    $auctionId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $prep = $db->prepare('SELECT * FROM auction WHERE auction_id = ?');
    $res = $prep->execute([$auctionId]); //$res vraća true ili false

    $auction = NULL; //polazimo od pretpostavke da je niz prazan, da nema kategorija
    if ($res) {
      $auction = $prep->fetch(PDO::FETCH_OBJ);
    }
    print_r($auction);

 ?>
