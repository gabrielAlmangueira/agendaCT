<?php
// routes/web.php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        require __DIR__ . '/../app/controllers/ReservaController.php';
        $controller = new ReservaController();
        $controller->listar();
        break;
    case '/reservas':
        require __DIR__ . '/../app/controllers/ReservaController.php';
        $controller = new ReservaController();
        $controller->listar();
        break;
    case '/reservas/criar':
        require __DIR__ . '/../app/controllers/ReservaController.php';
        $controller = new ReservaController();
        $controller->criar();
        break;
    case '/salas':
        require __DIR__ . '/../app/controllers/SalaController.php';
        $controller = new SalaController();
        $controller->listar();
        break;
    case '/usuarios/cadastro':
        require __DIR__ . '/../app/controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->cadastro();
        break;
    case '/usuarios/login':
        require __DIR__ . '/../app/controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->login();
        break;
    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
