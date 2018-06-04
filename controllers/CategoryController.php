<?php
    namespace App\Controllers;

class CategoryController extends \App\Core\Controller {

   public function show($id) {
     $categoryModel = new \App\Models\CategoryModel($this->getDatabaseConnection());
     $category = $categoryModel->getById($id);
     $this->set('category', $category);
   }


   public function delete($id) {
     die('Ova opcija još uvijek nije završena....');
   }

}
