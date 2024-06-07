<?php
include_once __DIR__ . "/../../../config/conexao.php";
require_once 'app/models/Cliente.php';

class ClienteController {
    private $db;
    private $cliente;

    public function __construct($db) {
        $this->cliente = new Cliente($db);
    }

    public function index() {
        $stmt = $this->cliente->readAll();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once 'app/resources/views/clientes/listar.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cliente->nome = $_POST['nome'];
            $this->cliente->data_nascimento = $_POST['data_nascimento'];
            $this->cliente->cpf = $_POST['cpf'];
            $this->cliente->rua = $_POST['rua'];
            $this->cliente->cep = $_POST['cep'];
            $this->cliente->cidade = $_POST['cidade'];
            $this->cliente->bairro = $_POST['bairro'];
            $this->cliente->carteira_de_motorista = $_POST['carteira_de_motorista'];
            
            if ($this->cliente->create()) {
                echo "Cliente adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar cliente.";
            }
        } else {
            include_once 'app/resources/views/clientes/criar.php';
        }
    }
}

// Inicialize o controlador e chame o método apropriado
$controller = new ClienteController($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
} else {
    $controller->index();
}
?>
