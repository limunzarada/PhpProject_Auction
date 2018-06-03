<?php

class DatabaseConnection {
  private $connection;
  private $configuration;

  public function __construct(DatabaseConfiguration $databaseConfiguration) {
    $this->configuration = $databaseConfiguration;
  }

  // ova funkcija će samo prvi put uspostaviti konekciju ako je nema, a svaki naredni
  // će koristiti ovu istu konekciju
  public function getConnection(): PDO {
    if ($this->connection === NULL) {
      // samo ako nije ranije bilo konekcije, pravimo konekciju
      $this->connection = new PDO($this->configuration->getSourceString(),
                                  $this->configuration->getUser(),
                                  $this->configuration->getPass());
    }
    //ili ako je ranije bila već konekcija, onda vraćamo tu konekciju
    return $this->connection;
  }


}
