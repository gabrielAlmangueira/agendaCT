<?php
// app/models/Sala.php

require_once 'Database.php';

class Sala {
    public $id;
    public $nome_sala;
    public $localizacao;
    public $capacidade;
    public $status;

    public static function listarTodas() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT * FROM salas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function listarDisponiveis($data_inicio, $data_fim) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("
            SELECT * FROM salas s
            WHERE s.id_sala NOT IN (
                SELECT r.id_sala FROM reservas r
                WHERE (r.data_inicio <= ? AND r.data_fim >= ?) AND r.status_reserva = 'Aprovada'
            )
        ");
        $stmt->execute([$data_fim, $data_inicio]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
