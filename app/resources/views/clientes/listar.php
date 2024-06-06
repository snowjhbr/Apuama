<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Rua</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Carteira de Motorista</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['data_nascimento']; ?></td>
                    <td><?php echo $cliente['cpf']; ?></td>
                    <td><?php echo $cliente['rua']; ?></td>
                    <td><?php echo $cliente['cep']; ?></td>
                    <td><?php echo $cliente['cidade']; ?></td>
                    <td><?php echo $cliente['bairro']; ?></td>
                    <td><?php echo $cliente['carteira_de_motorista']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
