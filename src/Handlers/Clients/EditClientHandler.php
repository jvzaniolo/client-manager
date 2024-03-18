<?php

namespace App\Handlers\Clients;

use App\Core\Application;
use App\Core\Database;
use App\Core\Renderer;

class EditClientHandler
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
    $clientId = $_GET['id'];

    $client = $this->db->query('SELECT * FROM clients WHERE id = :id', [
      ':id' => $clientId,
    ])->fetch();

    if (!$client) {
      http_response_code(404);
      return $this->render->template('404');
    }

    $client['addresses'] = $this->db->query('SELECT * FROM addresses WHERE client_id = :client_id', [
      ':client_id' => $clientId,
    ])->fetchAll();

    return ['client' => $client];
  }

  public function action()
  {
    $client = $_POST['client'];
    $clientId = $_REQUEST['id'];
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
      $this->db->query('UPDATE clients SET name = :name, birth_date = :birth_date, cpf = :cpf, rg = :rg, phone = :phone WHERE id = :client_id', [
        ':name' => $client['name'],
        ':birth_date' => $client['birth_date'],
        ':cpf' => $client['cpf'],
        ':rg' => $client['rg'],
        ':phone' => $client['phone'],
        ':client_id' => $clientId,
      ]);

      header('Location: /');
      exit;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function render($data)
  {
    $loaderData = $data['loaderData'] ?? [];
    $actionData = $data['actionData'] ?? [];
    return $this->render->template('cliente.editar.$id', [
      'client' => $actionData ? $actionData['client'] : $loaderData['client'],
      'errors' => $actionData['errors'] ?? []
    ]);
  }
}
