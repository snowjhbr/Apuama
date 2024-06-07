<?php
# Inicia a sessão.
#session_start();

include_once __DIR__ . "/../../../config/conexao.php";

# Recebe parâmetros para inserção no banco:
$flag = 0;
$nomeFuncionario = $_POST['nomeFuncionario'];
$dataFuncionario = $_POST['dataFuncionario'];
$cpfFuncionario = $_POST['cpfFuncionario'];
$cepFuncionario = $_POST['cepFuncionario'];
$ruaFuncionario = $_POST['ruaFuncionario'];
$bairroFuncionario = $_POST['bairroFuncionario'];
$cidadeFuncionario = $_POST['cidadeFuncionario'];
$funcaoFuncionario = $_POST['funcaoFuncionario'];
$senhaFuncionario = $_POST['senhaFuncionario'];

# Removendo caracteres não numéricos do CPF:
$cpfFuncionario = preg_replace('/\D/', '', $cpfFuncionario);

# Verifica se o CPF tem 11 caracteres:
if (strlen($cpfFuncionario) != 11) {
    die("Erro: O CPF deve conter 11 caracteres.");
}

# Query de inserção:
$query = "INSERT INTO usuario
(data_nascimento, nome, cpf, rua, bairro, cidade, cep, senha, tipo) 
VALUES ('$dataFuncionario', '$nomeFuncionario', '$cpfFuncionario', '$ruaFuncionario', '$bairroFuncionario', '$cidadeFuncionario', '$cepFuncionario', '$senhaFuncionario', 'F')";
# print "<p>$query</p>";
$stm = $db->prepare($query);

if ($stm->execute()) {
    # Atributo cod_usuario eh autoincrement. Resgata-se ele na proxima query:
    $query = "SELECT cod_usuario FROM usuario WHERE cpf = '$cpfFuncionario'";
    # print "<p>query</p>";
    $stm = $db->prepare($query);
    if ($stm->execute()) {
        while ($row = $stm->fetch()) {
            $codUsuario = $row['cod_usuario'];
        }
        # Insercao na tabela cliente:
        $query = "INSERT INTO funcionario(função, cod_funcionario) VALUES ('$funcaoFuncionario', '$codUsuario')";
        $stm = $db->prepare($query);
        if ($stm->execute()) {
            header("location:/index.php");
        }
        else {
            header("location:/app/resources/views/funcionarios/salvaFuncionario.php?error=/app/resources/views/funcionarios/salvaFuncionario.php");
        }
    }
    else {
        header("location:/app/resources/views/funcionarios/salvaFuncionario.php?error=/app/resources/views/funcionarios/salvaFuncionario.php");
    }
} else {
    header("/app/resources/views/funcionarios/salvaFuncionario.php?error=/app/resources/views/funcionarios/salvaFuncionario.php");
}
