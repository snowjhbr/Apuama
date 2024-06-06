<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>
    <form action="../controllers/FuncionarioController.php?action=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $funcionario['cod_funcionario']; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $funcionario['nome']; ?>" required><br>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $funcionario['cpf']; ?>" required><br>
        
        <label for="funcao">Função:</label>
        <input type="text" id="funcao" name="funcao" value="<?php echo $funcionario['função']; ?>" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
