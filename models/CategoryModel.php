<?php
    namespace App\Models;

    // da bi mogli koristiti DatabaseConnection koji se ne nalazi u ovom imenskom prostoru
    // moramo da kažemo da koristimo taj fajl
    use App\Core\DatabaseConnection; // ili ako ćemo bez ovoga, putanju upisujemo tamo gdje je koristimo

 class CategoryModel {
//sve ono što radimo sa tabelom category, implementiramo u ovoj model
   private $dbc;
         // koristimo simbol & za prosljeđivanje po referenci, odnosno
         // koristimo model (a ne kopiju) koji je već ranije negdje korišten
   public function __construct(DatabaseConnection &$dbc) {
     $this->dbc = $dbc;
   }

   public function getById(int $categoryId) {
     $sql = 'SELECT * FROM category WHERE category_id = ?';
     $prep = $this->dbc->getConnection()->prepare($sql);
     $res = $prep->execute([$categoryId]);
     $category = NULL; // početna pretpostavka da nema categorya?
     if ($res) {
       $category = $prep->fetch(\PDO::FETCH_OBJ);//stavljamo \ ispred PDO jer se klasa PDO nalazi
                                             // u App\Core ...a to smo već imenovali gore pa je
                                             // dovoljno samo \
     }
     return $category;
   }


   public function getAll(): array {
     $sql = 'SELECT * FROM category';
     $prep = $this->dbc->getConnection()->prepare($sql);
     $res = $prep->execute();
     $categories = [];
     if ($res) {
       $categories = $prep->fetchAll(\PDO::FETCH_OBJ);
     }
     return $categories;
   }




 }
