<?php
# Inicia a sessão.
#session_start();

include_once __DIR__ . "/../../../config/conexao.php";

#Recebe parâmetros para inserção no banco:
$flag = 0;
$placaAutomovel = $_POST['placaAutomovel'];
$corAutomovel = $_POST['corAutomovel'];
$chassisAutomovel = $_POST['chassisAutomovel'];
$direcaoAutomovel = isset($_POST['direcaoAutomovel']) ? 1 : 0;
$ar_condicionadoAutomovel = isset($_POST['ar_condicionadoAutomovel']) ? 1 : 0;
$manutencaoAutomovel = isset($_POST['manutencaoAutomovel']) ? 1 : 0;
$nro_de_portaAutomovel = $_POST['nro_de_portaAutomovel'];
$quilometragemAutomovel = $_POST['quilometragemAutomovel'];
$marcaAutomovel = $_POST['marcaAutomovel'];
$tipo_de_combustivelAutomovel = $_POST['tipo_de_combustivelAutomovel'];
$renavamAutomovel = $_POST['renavamAutomovel'];
$tipoAutomovel = $_POST['tipoAutomovel'];
$transmissaoAutomovel = $_POST['transmissaoAutomovel'];
$valorAutomovel = $_POST['valorAutomovel'];

$statusAutomovel = 1;

# Query de inserção:
// Verifica se o campo 'modelo' foi preenchido
if (empty($_POST['modelo'])) {
    die('Erro: O campo modelo é obrigatório.');
}

// Preparar a instrução SQL
$sql = "INSERT INTO automovel (placa, cor, chassi, modelo, is_active, is_new, is_rented, doors, km, other_field, marca, combustivel, another_field, categoria, another_field_2, preco)
        VALUES (:placa, :cor, :chassi, :modelo, :is_active, :is_new, :is_rented, :doors, :km, :other_field, :marca, :combustivel, :another_field, :categoria, :another_field_2, :preco)";

$stmt = $pdo->prepare($sql);

// Vincular os parâmetros
$stmt->bindParam(':placa', $_POST['placa']);
$stmt->bindParam(':cor', $_POST['cor']);
$stmt->bindParam(':chassi', $_POST['chassi']);
$stmt->bindParam(':modelo', $_POST['modelo']);
$stmt->bindParam(':is_active', $_POST['is_active']);
$stmt->bindParam(':is_new', $_POST['is_new']);
$stmt->bindParam(':is_rented', $_POST['is_rented']);
$stmt->bindParam(':doors', $_POST['doors']);
$stmt->bindParam(':km', $_POST['km']);
$stmt->bindParam(':other_field', $_POST['other_field']);
$stmt->bindParam(':marca', $_POST['marca']);
$stmt->bindParam(':combustivel', $_POST['combustivel']);
$stmt->bindParam(':another_field', $_POST['another_field']);
$stmt->bindParam(':categoria', $_POST['categoria']);
$stmt->bindParam(':another_field_2', $_POST['another_field_2']);
$stmt->bindParam(':preco', $_POST['preco']);

// Tentar executar a instrução SQL
try {
    $stmt->execute();
    echo "Carro salvo com sucesso!";
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
