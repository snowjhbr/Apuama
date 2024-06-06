<?php
require_once '../config/conexao.php';
require_once '../models/Carro.php';

class CarroController {
    private $db;
    private $carro;

    public function __construct($db) {
        $this->carro = new Carro($db);
    }

    public function index() {
        $stmt = $this->carro->readAll();
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../views/carro/todos_carros.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->carro->placa = $_POST['placa'];
            $this->carro->cor = $_POST['cor'];
            $this->carro->chassis = $_POST['chassis'];
            $this->carro->modelo = $_POST['modelo'];
            $this->carro->direcao_assistida = isset($_POST['direcao_assistida']);
            $this->carro->ar_condicionado = isset($_POST['ar_condicionado']);
            $this->carro->manutencao = isset($_POST['manutencao']);
            $this->carro->nro_de_porta = $_POST['nro_de_porta'];
            $this->carro->quilometragem = $_POST['quilometragem'];
            $this->carro->transmissao = $_POST['transmissao'];
            $this->carro->marca = $_POST['marca'];
            $this->carro->tipo_de_combustivel = $_POST['tipo_de_combustivel'];
            $this->carro->renavam = $_POST['renavam'];
            $this->carro->tipo = $_POST['tipo'];
            $this->carro->status = $_POST['status'];
            $this->carro->valor = $_POST['valor'];

            if ($this->carro->create()) {
                echo "Carro adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar carro.";
            }
        } else {
            include_once '../views/carro/inserir_carros.php';
        }
    }
}

// Inicialize o controlador e chame o método apropriado
$controller = new CarroController($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
} else {
    $controller->index();
}
?>
