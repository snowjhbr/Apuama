<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="../controllers/LoginController.php?action=login" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
