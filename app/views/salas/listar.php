<!-- app/views/salas/listar.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Salas</title>
</head>
<body>
    <h1>Listagem de Salas</h1>
    <table border="1">
        <tr>
            <th>Nome da Sala</th>
            <th>Localização</th>
            <th>Capacidade</th>
            <th>Status</th>
        </tr>
        <?php foreach ($salas as $sala) : ?>
            <tr>
                <td><?php echo htmlspecialchars($sala['nome_sala']); ?></td>
                <td><?php echo htmlspecialchars($sala['localizacao']); ?></td>
                <td><?php echo htmlspecialchars($sala['capacidade']); ?></td>
                <td><?php echo htmlspecialchars($sala['status']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/reservas/criar">Criar Nova Reserva</a>
</body>
</html>
