<?php
// app/models/Reserva.php

require_once 'Database.php';

class Reserva {
    public $id;
    public $id_usuario;
    public $id_sala;
    public $data_inicio;
    public $data_fim;
    public $motivo;
    public $status_reserva;

    public static function criar($id_usuario, $id_sala, $data_inicio, $data_fim, $motivo) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO reservas (id_usuario, id_sala, data_inicio, data_fim, motivo, status_reserva) VALUES (?, ?, ?, ?, ?, 'Pendente')");
        $stmt->execute([$id_usuario, $id_sala, $data_inicio, $data_fim, $motivo]);
        return $pdo->lastInsertId();
    }

    public static function listarTodas() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("
            SELECT r.*, u.nome AS usuario_nome, s.nome_sala
            FROM reservas r
            JOIN usuarios u ON r.id_usuario = u.id_usuario
            JOIN salas s ON r.id_sala = s.id_sala
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function aprovar($id_reserva) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("UPDATE reservas SET status_reserva = 'Aprovada' WHERE id_reserva = ?");
        $stmt->execute([$id_reserva]);
    }

    public static function rejeitar($id_reserva) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("UPDATE reservas SET status_reserva = 'Rejeitada' WHERE id_reserva = ?");
        $stmt->execute([$id_reserva]);
    }
}
