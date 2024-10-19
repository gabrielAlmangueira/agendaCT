<?php
// app/controllers/UsuarioController.php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    public function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $papel = $_POST['papel'];

            Usuario::cadastrar($nome, $email, $senha, $papel);
            header('Location: /usuarios/login');
        } else {
            require __DIR__ . '/../views/usuarios/cadastro.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = Usuario::login($email, $senha);
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: /reservas');
            } else {
                $erro = "E-mail ou senha inválidos.";
                require __DIR__ . '/../views/usuarios/login.php';
            }
        } else {
            require __DIR__ . '/../views/usuarios/login.php';
        }
    }

    // Outros métodos como perfil e logout podem ser adicionados aqui
}
