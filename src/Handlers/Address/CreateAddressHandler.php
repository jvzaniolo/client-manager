<?php

namespace App\Handlers\Address;

use App\Core\Application;
use App\Core\Database;

class CreateAddressHandler
{
  private $db;

  public function __construct()
  {
    $this->db = Application::get(Database::class);
  }

  public function action()
  {
    $address = $_POST['address'];
    $clientId = $_POST['client_id'];

    try {
      $this->db->query('INSERT INTO addresses (client_id, address, city, state, country, postal_code) VALUES (:client_id, :address, :city, :state, :country, :postal_code)', [
        ':client_id' => $clientId,
        ':address' => $address['address'],
        ':city' => $address['city'],
        ':state' => $address['state'],
        ':country' => $address['country'],
        ':postal_code' => $address['postal_code'],
      ]);

      header('Location: /cliente/editar?id=' . $clientId);
      exit;
    } catch (\Exception $e) {
      return [];
    }
  }
}
