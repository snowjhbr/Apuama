<?php
# Inicia a sessão.
#session_start();

include_once "Apuama/app/config/conexao.php";

#Recebe parâmetros para inserção no banco:
$codUsuario = $_POST['codUsuario'];
$nomeFunc = $_POST['nomeFunc'];
$dataFunc = $_POST['dataFunc'];
$cpfFunc = $_POST['cpfFunc'];
$cepFunc = $_POST['cepFunc'];
$ruaFunc = $_POST['ruaFunc'];
$bairroFunc = $_POST['bairroFunc'];
$cidadeFunc = $_POST['cidadeFunc'];
$funcaoFunc = $_POST['funcaoFuncionario'];
$senhaFunc = $_POST['senhaFunc'];
$statusFunc = $_POST['statusFunc'];


if (isset($statusFunc)) {
    $statusFunc = 1;
} else {
    $statusFunc = 0;
}


# Query de update Func:
$query = "UPDATE funcionario SET funcao = '$funcaoFunc' WHERE cod_Func = '$codUsuario'";
$stm = $db->prepare($query);
if ($stm->execute()) {
    $query = "UPDATE usuario SET data_nascimento = '$dataFunc', nome = '$nomeFunc', rua = '$ruaFunc', bairro = '$bairroFunc', cidade = '$cidadeFunc', cep = '$cepFunc', status = '$statusFunc', senha = '$senhaFunc' WHERE cod_usuario = '$codUsuario'";
    $stm = $db->prepare($query);
    if($stm->execute()){
        header("location:Apuama/index.php");
    }
    else{
        header("location:Apuama/app/resources/views/funcionarios/salvaEditaFuncionario.php?error=Apuama/app/resources/views/funcionarios/salvaEditaFuncionario.php");
    }
} else {
    header("location:Apuama/app/resources/views/funcionarios/salvaEditaFuncionario.php?error=Apuama/app/resources/views/funcionarios/salvaEditaFuncionario.php");
}
