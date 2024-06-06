<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Funcionário</title>
</head>
<body>
    <h1>Criar Novo Funcionário</h1>
    <form action="../controllers/FuncionarioController.php?action=create" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>
        
        <label for="funcao">Função:</label>
        <input type="text" id="funcao" name="funcao" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
