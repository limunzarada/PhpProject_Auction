<?php
    namespace App\Controllers;

class MainController extends \App\Core\Controller {

   public function home() {
     $categoryModel = new \App\Models\CategoryModel($this->getDatabaseConnection());
     $categories = $categoryModel->getAll();

     $this->set('categories', $categories); //ako nam treba više vrijednosti, ponavljamo
                                            // metodu set onoliko puta koiliko nam treba

   }

}
