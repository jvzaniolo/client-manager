<?php

namespace App\Handlers\Clients;

use App\Core\Application;
use App\Core\Database;
use App\Core\Renderer;

class ListClientHandler
{
  private $db;
  private $render;

  public function __construct()
  {
    $this->db = Application::get(Database::class);
    $this->render = Application::get(Renderer::class);
  }

  public function loader()
  {
    $clients = $this->db->query("SELECT * FROM clients WHERE user_id = :user_id", [
      ':user_id' => $_SESSION['user_id']
    ])->fetchAll();

    foreach ($clients as &$client) {
      $client['addresses_count'] = $this->db->query("SELECT COUNT(*) FROM addresses WHERE client_id = :client_id", [
        ':client_id' => $client['id']
      ])->fetchColumn();
    }

    return $clients;
  }

  public function render($data)
  {
    return $this->render->template('index', [
      'clients' => $data['loaderData']
    ]);
  }
}
