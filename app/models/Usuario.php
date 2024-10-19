<?php
// app/models/Usuario.php

require_once 'Database.php';

class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $papel;

    public static function cadastrar($nome, $email, $senha, $papel) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, papel) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT), $papel]);
        return $pdo->lastInsertId();
    }

    public static function login($email, $senha) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}
