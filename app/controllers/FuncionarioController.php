<?php
require_once '../config/conexao.php';
require_once '../models/Funcionario.php';

class FuncionarioController {
    private $db;
    private $funcionario;

    public function __construct($db) {
        $this->funcionario = new Funcionario($db);
    }

    public function index() {
        $stmt = $this->funcionario->readAll();
        $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../views/funcionarios/listar.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->funcionario->nome = $_POST['nome'];
            $this->funcionario->cpf = $_POST['cpf'];
            $this->funcionario->funcao = $_POST['funcao'];

            if ($this->funcionario->create()) {
                echo "Funcionário adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar funcionário.";
            }
        } else {
            include_once '../views/funcionarios/criar.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->funcionario->id = $_POST['id'];
            $this->funcionario->nome = $_POST['nome'];
            $this->funcionario->cpf = $_POST['cpf'];
            $this->funcionario->funcao = $_POST['funcao'];

            if ($this->funcionario->update()) {
                echo "Funcionário atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar funcionário.";
            }
        } else {
            $id = $_GET['id'];
            $stmt = $this->funcionario->readById($id);
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            include_once '../views/funcionarios/editar.php';
        }
    }
}

// Inicialize o controlador e chame o método apropriado
$controller = new FuncionarioController($db);
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    default:
        $controller->index();
        break;
}
?>
