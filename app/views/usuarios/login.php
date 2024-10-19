<!-- app/views/usuarios/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login de Usuário</title>
</head>
<body>
    <h1>Login de Usuário</h1>
    <?php if (isset($erro)) : ?>
        <p style="color:red;"><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="POST" action="/usuarios/login">
        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    <p>Não possui uma conta? <a href="/usuarios/cadastro">Cadastre-se</a></p>
</body>
</html>
