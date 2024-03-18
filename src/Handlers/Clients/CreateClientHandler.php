<?php

namespace App\Handlers\Clients;

use App\Core\Application;
use App\Core\Database;
use App\Core\Renderer;

class CreateClientHandler
{
  private $db;
  private $render;

  public function __construct()
  {
    $this->db = Application::get(Database::class);
    $this->render = Application::get(Renderer::class);
  }

  public function action()
  {
    $client = $_POST['client'];
    $errors = [];

    foreach ($client as $key => $value) {
      if (empty ($value)) {
        $errors[$key] = "O campo {$key} é obrigatório";
      }
    }

    if (count($errors) > 0) {
      return [
        'errors' => $errors,
        'client' => $client
      ];
    }

    try {
      $this->db->query('INSERT INTO clients (name, birth_date, cpf, rg, phone, user_id) values (:name, :birth_date, :cpf, :rg, :phone, :user_id)', [
        ':name' => $client['name'],
        ':birth_date' => $client['birth_date'],
        ':cpf' => $client['cpf'],
        ':rg' => $client['rg'],
        ':phone' => $client['phone'],
        ':user_id' => $_SESSION['user_id']
      ]);

      header('Location: /');
      exit;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function render($data)
  {
    // temporary client id
    $clientId = 'new_client_id';
    $actionData = $data['actionData'] ?? [];
    return $this->render->template('cliente.criar', [
      'clientId' => $clientId,
      'client' => $actionData['client'] ?? [],
      'errors' => $actionData['errors'] ?? [],
    ]);
  }
}
