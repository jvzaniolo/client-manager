<?php

namespace App\Handlers\Clients;

use App\Core\Application;
use App\Core\Database;
use App\Core\Renderer;

class DeleteClientHandler
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
        try {
            $clientId = $_REQUEST['id'];

            $this->db->query('DELETE FROM clients WHERE id = :client_id', [
                ':client_id' => $clientId
            ]);

            header('Location: /', true, 302);
            exit;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}