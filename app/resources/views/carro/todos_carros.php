<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todos os Carros</title>
</head>
<body>
    <h1>Lista de Carros</h1>
    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Cor</th>
                <th>Chassis</th>
                <th>Modelo</th>
                <th>Direção Assistida</th>
                <th>Ar Condicionado</th>
                <th>Manutenção</th>
                <th>Nro de Porta</th>
                <th>Quilometragem</th>
                <th>Transmissão</th>
                <th>Marca</th>
                <th>Tipo de Combustível</th>
                <th>Renavam</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carros as $carro): ?>
                <tr>
                    <td><?php echo $carro['placa']; ?></td>
                    <td><?php echo $carro['cor']; ?></td>
                    <td><?php echo $carro['chassis']; ?></td>
                    <td><?php echo $carro['modelo']; ?></td>
                    <td><?php echo $carro['direcao_assistida'] ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo $carro['ar_condicionado'] ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo $carro['manutencao'] ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo $carro['nro_de_porta']; ?></td>
                    <td><?php echo $carro['quilometragem']; ?></td>
                    <td><?php echo $carro['transmissao']; ?></td>
                    <td><?php echo $carro['marca']; ?></td>
                    <td><?php echo $carro['tipo_de_combustivel']; ?></td>
                    <td><?php echo $carro['renavam']; ?></td>
                    <td><?php echo $carro['tipo']; ?></td>
                    <td><?php echo $carro['status']; ?></td>
                    <td><?php echo $carro['valor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
