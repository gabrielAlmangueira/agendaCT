<!-- app/views/usuarios/cadastro.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="/usuarios/cadastro">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        
        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>
        
        <label>Função:</label><br>
        <select name="papel" required>
            <option value="gerente">Gerente</option>
            <option value="administrador">Administrador</option>
        </select><br><br>
        
        <button type="submit">Cadastrar</button>
    </form>
    <p>Já possui uma conta? <a href="/usuarios/login">Login</a></p>
</body>
</html>
