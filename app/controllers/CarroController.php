<?php
include_once "../bd.php";
include_once "../models/CarroModel.php";

class CarroController {
    private $model;

    public function __construct($db) {
        $this->model = new CarroModel($db);
    }

    public function editarCarro() {
        $carroData = [
            'placaAutomovel' => $_POST['placaAutomovel'],
            'corAutomovel' => $_POST['corAutomovel'],
            'chassisAutomovel' => $_POST['chassisAutomovel'],
            'direcaoAutomovel' => isset($_POST['direcaoAutomovel']) ? 1 : 0,
            'arCondicionadoAutomovel' => isset($_POST['ar_condicionadoAutomovel']) ? 1 : 0,
            'manutencaoAutomovel' => isset($_POST['manutencaoAutomovel']) ? 1 : 0,
            'nroDePortaAutomovel' => $_POST['nro_de_portaAutomovel'],
            'quilometragemAutomovel' => $_POST['quilometragemAutomovel'],
            'transmissaoAutomovel' => $_POST['transmissaoAutomovel'],
            'marcaAutomovel' => $_POST['marcaAutomovel'],
            'tipoDeCombustivelAutomovel' => $_POST['tipo_de_combustivelAutomovel'],
            'renavamAutomovel' => $_POST['renavamAutomovel'],
            'statusAutomovel' => isset($_POST['statusAutomovel']) ? 1 : 0,
            'tipoAutomovel' => $_POST['tipoAutomovel'],
            'valorAutomovel' => $_POST['valorAutomovel']
        ];

        if ($this->model->atualizarCarro($carroData)) {
            $this->redirect("../views/indexFuncionario.php");
        } else {
            $this->redirect("salvaEditaCarro.php?error=salvaEditaCarro");
        }
    }

    private function redirect($url) {
        header("location:$url");
        exit();
    }
}

$db = new PDO('mysql:host=localhost;dbname=nomeDoBanco', 'usuario', 'senha'); // Ajuste a conexão com o banco
$controller = new CarroController($db);
$controller->editarCarro();
?>
