<?php
session_start();
require_once '../config/conexao.php';
require_once '../models/Usuario.php';

class LoginController {
    private $db;
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];

            $user = $this->usuario->login($cpf, $senha);
            if ($user) {
                $_SESSION['usuario_id'] = $user['id'];
                header("Location: ../views/login/success.php");
            } else {
                echo "Login falhou. CPF ou senha incorretos.";
            }
        } else {
            include_once '../views/login/login.php';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../views/login/logout.php");
    }
}

// Inicialize o controlador e chame o método apropriado
$controller = new LoginController($db);
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'logout':
        $controller->logout();
        break;
    default:
        $controller->login();
        break;
}
?>
