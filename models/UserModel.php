<?php
 class UserModel {
//sve ono što radimo sa tabelom user, implementiramo u ovoj model
   private $dbc;
         // koristimo simbol & za prosljeđivanje po referenci, odnosno
         // koristimo model (a ne kopiju) koji je već ranije negdje korišten
   public function __construct(DatabaseConnection &$dbc) {
     $this->dbc = $dbc;
   }

   public function getById(int $userId) {
     $sql = 'SELECT * FROM user WHERE user_id = ?';
     $prep = $this->dbc->getConnection()->prepare($sql);
     $res = $prep->execute([$userId]);
     $user = NULL; // početna pretpostavka da nema usera?
     if ($res) {
       $user = $prep->fetch(PDO::FETCH_OBJ);
     }
     return $user;
   }


   public function getAll(): array {
     $sql = 'SELECT * FROM user';
     $prep = $this->dbc->getConnection()->prepare($sql);
     $res = $prep->execute();
     $users = [];
     if ($res) {
       $users = $prep->fetchAll(PDO::FETCH_OBJ);
     }
     return $users;
   }


   public function getByUsername(string $username) {
     $sql = 'SELECT * FROM user WHERE username = ?';
     $prep = $this->dbc->getConnection()->prepare($sql);
     $res = $prep->execute([$username]);
     $user = NULL;
     if ($res) {
       $user = $prep->fetch(PDO::FETCH_OBJ);
     }
     return $user;
   }










 }
