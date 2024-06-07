<?php
include_once "/app/config/conexao.php";
$placaAutomovel = $_POST['placaAutomovel'];


# Query de inserção:
$query = "UPDATE automovel SET manutencao = '0' WHERE placa = '$placaAutomovel'";
print "<p>$query</p>";
$stm = $db->prepare($query);

if ($stm->execute()) {
    header("location:/app/resources/views/carro/todos_mecanica.php");
} else {
    print "<p>Faiô</p>";
    header("location:/app/resources/views/carro/todos_mecanica.php?error=/app/resources/views/carro/todos_mecanica.php");
}
?>