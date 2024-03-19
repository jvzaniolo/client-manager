<?php

namespace App\Core;

use PDO;

class Database
{
  private PDO $connection;

  public function __construct($dsn)
  {
    $this->connection = new PDO(dsn: $dsn, options: [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
  }

  public function query($sql, $params = [])
  {
    $statement = $this->connection->prepare($sql);
    $statement->execute($params);
    return $statement;
  }
}
