<?php
// app/controllers/SalaController.php

require_once __DIR__ . '/../models/Sala.php';

class SalaController {
    public function listar() {
        $salas = Sala::listarTodas();
        require __DIR__ . '/../views/salas/listar.php';
    }

    public function criar() {
        // Implementar criação de salas se necessário
    }

    // Outros métodos como visualizar sala podem ser adicionados aqui
}
