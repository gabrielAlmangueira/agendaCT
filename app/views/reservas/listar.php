<!-- app/views/reservas/listar.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Reservas</title>
</head>
<body>
    <h1>Listagem de Reservas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Sala</th>
            <th>Data Início</th>
            <th>Data Fim</th>
            <th>Motivo</th>
            <th>Status</th>
        </tr>
        <?php foreach ($reservas as $reserva) : ?>
            <tr>
                <td><?php echo htmlspecialchars($reserva['id_reserva']); ?></td>
                <td><?php echo htmlspecialchars($reserva['usuario_nome']); ?></td>
                <td><?php echo htmlspecialchars($reserva['nome_sala']); ?></td>
                <td><?php echo htmlspecialchars($reserva['data_inicio']); ?></td>
                <td><?php echo htmlspecialchars($reserva['data_fim']); ?></td>
                <td><?php echo htmlspecialchars($reserva['motivo']); ?></td>
                <td><?php echo htmlspecialchars($reserva['status_reserva']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/reservas/criar">Criar Nova Reserva</a>
</body>
</html>
