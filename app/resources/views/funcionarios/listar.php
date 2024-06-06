<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Funcionários</title>
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Função</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?php echo $funcionario['cod_funcionario']; ?></td>
                    <td><?php echo $funcionario['nome']; ?></td>
                    <td><?php echo $funcionario['cpf']; ?></td>
                    <td><?php echo $funcionario['função']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
