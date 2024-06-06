<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Cliente</title>
</head>
<body>
    <h1>Criar Novo Cliente</h1>
    <form action="../controllers/ClienteController.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>
        
        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" required><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br>

        <label for="carteira_de_motorista">Carteira de Motorista:</label>
        <input type="text" id="carteira_de_motorista" name="carteira_de_motorista" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
