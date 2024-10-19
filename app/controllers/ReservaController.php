<?php
// app/controllers/ReservaController.php

require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/Sala.php';

class ReservaController {
    public function listar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuarios/login');
            exit;
        }

        $reservas = Reserva::listarTodas();
        require __DIR__ . '/../views/reservas/listar.php';
    }

    public function criar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuarios/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usuario = $_SESSION['usuario']['id_usuario'];
            $id_sala = $_POST['id_sala'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];
            $motivo = $_POST['motivo'];

            Reserva::criar($id_usuario, $id_sala, $data_inicio, $data_fim, $motivo);
            header('Location: /reservas');
        } else {
            $salas_disponiveis = Sala::listarDisponiveis($_GET['data_inicio'] ?? date('Y-m-d'), $_GET['data_fim'] ?? date('Y-m-d'));
            require __DIR__ . '/../views/reservas/criar.php';
        }
    }

    // Métodos para aprovação e rejeição podem ser adicionados aqui:
    public function aprovar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /usuarios/login');
            exit;
        }

        if ($_SESSION['usuario']['papel'] !== 'Administrador') {
            header('Location: /reservas');
            exit;
        }

        Reserva::aprovar($_GET['id_reserva']);
        header('Location: /reservas');
    }
}
