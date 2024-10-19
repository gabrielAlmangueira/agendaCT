<!-- app/views/reservas/criar.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Criar Reserva</title>
</head>
<body>
    <h1>Criar Reserva</h1>
    <form method="POST" action="/reservas/criar">
        <label>Selecione a Sala:</label><br>
        <select name="id_sala" required>
            <?php foreach ($salas_disponiveis as $sala) : ?>
                <option value="<?php echo htmlspecialchars($sala['id_sala']); ?>">
                    <?php echo htmlspecialchars($sala['nome_sala'] . ' - ' . $sala['localizacao']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Data de Início:</label><br>
        <input type="datetime-local" name="data_inicio" required><br><br>

        <label>Data de Fim:</label><br>
        <input type="datetime-local" name="data_fim" required><br><br>

        <label>Motivo do Evento:</label><br>
        <textarea name="motivo" required></textarea><br><br>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>
