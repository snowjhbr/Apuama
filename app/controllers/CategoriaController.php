<?php
include_once __DIR__ . "/../../../config/conexao.php";
require_once 'app/models/Categoria.php';

class CategoriaController {
    private $db;
    private $categoria;

    public function __construct($db) {
        $this->categoria = new Categoria($db);
    }

    public function index() {
        $stmt = $this->categoria->readAll();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once 'app/resources/views/categorias/listar.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->categoria->nome = $_POST['nome'];
            if ($this->categoria->create()) {
                echo "Categoria adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar categoria.";
            }
        } else {
            include_once 'app/resources/views/categorias/criar.php';
        }
    }
}

// Inicialize o controlador e chame o método apropriado
$controller = new CategoriaController($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
} else {
    $controller->index();
}
?>
