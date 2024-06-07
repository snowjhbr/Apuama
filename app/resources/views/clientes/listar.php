<?php
// Iniciar a sessão
session_start();

// configuração da conexão com o banco de dados
include_once __DIR__ . '/../../../config/conexao.php';

// Consulta ao banco de dados para recuperar os clientes
try {
    $stmt = $db->prepare("SELECT id, nome, email, telefone FROM cliente");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao consultar os clientes: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<?php
// Inicia a sessão.
session_start();

if (isset($_SESSION['cpf'])) {
    $cpf = $_SESSION['cpf'];
    $tipo = $_SESSION['tipo'];
} else {
    $tipo = '';
}

include_once __DIR__ . '/../../../config/conexao.php';

// Consulta ao banco de dados para recuperar os clientes
try {
    $stmt = $db->prepare("SELECT id, nome, email, telefone FROM clientes");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao consultar os clientes: " . $e->getMessage();
    exit;
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistema de Gerenciamento de Aluguel de Automóveis</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="/app/resources/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/app/resources/css/fonts.css" rel="stylesheet" type="text/css" media="all" />

    <!--- Esta funcao formata mascara dos inputs-->
    <script type="text/javascript">
        function formatar_mascara(src, mascara) {
            var campo = src.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(campo);
            if(texto.substring(0,1) != saida) {
                src.value += texto.substring(0,1);
            }
        }
    </script>
</head>

<body>
    <div id="wrapper1">
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <div id="wrapper1">
                        <div id="espaço_container" class="container">
                            <div id="logo_site">
                                <img src="/app/resources/images/carros_logo.png" alt="some text" width=940 height=200>
                            </div>
                        </div>
                    </div>
                    <h1><a href="#">Sistema de Gerenciamento de Aluguel de Carros</a></h1>
                    <div id="menu">
                        <div id="divtitulocadastra">Lista de Clientes</div>
                        <div id="wrapperlogin">
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($cliente['id']); ?></td>
                                            <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
                                            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                                            <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div id="wrapper1">
                                <button id="botaoCancelar" class="button" onclick="window.location.href='/index.php';">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

