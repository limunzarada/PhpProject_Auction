<?php
    namespace App\Controllers;

class MainController {
   // nikada, ali nikada bazi podataka ne pristupamo direktno iz kontrolera (uvijek i samo iz modela)
   private $dbc;

   public function __construct(\App\Core\DatabaseConnection &$dbc) {
     $this->dbc = $dbc;
   }

   public function home() {
     $categoryModel = new \App\Models\CategoryModel($this->dbc);
     $categories = $categoryModel->getAll();

     return [
       'categories' => $categories
     ];

     // potom pozivamo nekoga ko će generisati korisnički interfejs, odnosno
     //da pozovemo ili kreiramo komponentu koja će kreirati view (html kod)
   }

}
