<?php

namespace App\Handlers;

use App\Core\Application;
use App\Core\Database;
use App\Core\Renderer;
use App\Core\Validator;

class LoginHandler
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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = [];

        if (!Validator::string($email)) {
            $errors['email'] = 'Email é obrigatório';
        }

        if (!Validator::string($password)) {
            $errors['password'] = 'Senha é obrigatório';
        }

        if (count($errors) > 0) {
            return [
                'errors' => $errors,
                'email' => $email,
                'password' => $password
            ];
        }

        try {
            $user = $this->db->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email,
            ])->fetch();

            if (!$user || !password_verify($password, $user['password_hash'])) {
                $errors['form'] = 'Credenciais inválidas';
                return [
                    'errors' => $errors,
                    'email' => $email,
                    'password' => ''
                ];
            }

            $_SESSION['user_id'] = $user['id'];

            header('Location: /');
            exit;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render($data)
    {
        $actionData = $data['actionData'] ?? [];
        return $this->render->template('login', [
            'errors' => $actionData['errors'] ?? [],
            'email' => $actionData['email'] ?? '',
            'password' => $actionData['password'] ?? ''
        ]);
    }
}