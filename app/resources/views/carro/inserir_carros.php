<!DOCTYPE html>
<html### Visão de Inserção de Carro
**app/views/carro/inserir_carros.php**:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Carro</title>
</head>
<body>
    <h1>Inserir Novo Carro</h1>
    <form action="../controllers/CarroController.php" method="POST">
        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required><br>

        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor" required><br>

        <label for="chassis">Chassis:</label>
        <input type="text" id="chassis" name="chassis" required><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br>

        <label for="direcao_assistida">Direção Assistida:</label>
        <input type="checkbox" id="direcao_assistida" name="direcao_assistida"><br>

        <label for="ar_condicionado">Ar Condicionado:</label>
        <input type="checkbox" id="ar_condicionado" name="ar_condicionado"><br>

        <label for="manutencao">Manutenção:</label>
        <input type="checkbox" id="manutencao" name="manutencao"><br>

        <label for="nro_de_porta">Número de Portas:</label>
        <input type="number" id="nro_de_porta" name="nro_de_porta" required><br>

        <label for="quilometragem">Quilometragem:</label>
        <input type="number" id="quilometragem" name="quilometragem" required><br>

        <label for="transmissao">Transmissão:</label>
        <input type="text" id="transmissao" name="transmissao" required><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br>

        <label for="tipo_de_combustivel">Tipo de Combustível:</label>
        <input type="text" id="tipo_de_combustivel" name="tipo_de_combustivel" required><br>

        <label for="renavam">Renavam:</label>
        <input type="text" id="renavam" name="renavam" required><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" id="valor" name="valor" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
