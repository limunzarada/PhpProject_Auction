<?php
    namespace App\Core;

class Controller {
  // nikada, ali nikada bazi podataka ne pristupamo direktno iz kontrolera (uvijek i samo iz modela)
  private $dbc;
  private $data = [];

   // imenovanjem funkcije kao konačna, sprečavamo mogućnost da je iko (neka klasa npr) promijeni kasnije
  final public function __construct(\App\Core\DatabaseConnection &$dbc) {
    $this->dbc = $dbc;
  }

  // konekciju omogućujemo klasama koje nasljeđuju Controller preko getera
  final public function &getDatabaseConnection(): \App\Core\DatabaseConnection {
    return $this->dbc;
  }


  final protected function set(string $name, $value): bool{
    $result = false;

    if (preg_match('/^[a-z][a-z0-9]+(?:[A-Z][a-z0-9]+)*$/', $name)) {
      $this->data[$name] = $value;
      $result = true;
    }
    return $result;
  }


  final public function getData(): array {
    return $this->data;
  }






}
