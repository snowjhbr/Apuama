<?php
include_once "Apuama/app/config/conexao.php";
$placaAutomovel = $_POST['placaAutomovel'];


# Query de inserção:
$query = "UPDATE automovel SET manutencao = '0' WHERE placa = '$placaAutomovel'";
print "<p>$query</p>";
$stm = $db->prepare($query);

if ($stm->execute()) {
    header("location:Apuama/app/resources/views/carro/todos_mecanica.php");
} else {
    print "<p>Faiô</p>";
    header("location:Apuama/app/resources/views/carro/todos_mecanica.php?error=Apuama/app/resources/views/carro/todos_mecanica.php");
}
?>