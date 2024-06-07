<?php
include_once __DIR__ . "/../../../config/conexao.php";
include_once "app/models/AluguelModel.php";

class AluguelController {
    private $model;

    public function __construct($db) {
        $this->model = new AluguelModel($db);
    }

    public function salvarAluguel() {
        session_start();
        $cpfCliente = $_SESSION['cpf'];
        $placaAutomovel = $_POST['placa'];
        $dataLocacao = $_POST['dataLocacao'];
        $dataDevolucao = $_POST['dataDevolucao'];

        if ($this->model->isCarroAlugado($placaAutomovel, $dataLocacao, $dataDevolucao)) {
            $this->redirectComMensagem("app/resources/views/tentarNovamente.php", "Carro já está alugado no período. Troque as datas ou troque o carro.");
        } else {
            $valorDiaria = $this->model->getValorDiaria($placaAutomovel);
            $dias = (strtotime($dataDevolucao) - strtotime($dataLocacao)) / (60 * 60 * 24);
            $valorTotal = $valorDiaria * $dias;
            $lastId = $this->model->inserirLocacao($valorTotal, $dataLocacao, $dataDevolucao, $placaAutomovel);
            $codCliente = $this->model->getClienteId($cpfCliente);
            
            if ($this->model->inserirReserva($placaAutomovel, $codCliente, $lastId)) {
                $this->redirectComMensagem("/indexCliente.php", "Reserva efetuada.");
            } else {
                $this->redirectComMensagem("app/resources/views/carro/salvaAluguel.php", "Erro ao salvar a reserva.");
            }
        }
    }

    private function redirectComMensagem($url, $mensagem) {
        echo '<script type="text/javascript">alert("'.$mensagem.'");</script>';
        header("location:$url");
        exit();
    }
}

$db = new PDO('mysql:host=localhost;dbname=nomeDoBanco', 'usuario', 'senha'); // Ajuste a conexão com o banco
$controller = new AluguelController($db);
$controller->salvarAluguel();
?>
