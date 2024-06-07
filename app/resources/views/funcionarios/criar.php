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

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Validação básica
    if (!empty($nome) && !empty($email) && !empty($telefone)) {
        try {
            $stmt = $db->prepare("INSERT INTO funcionarios (nome, email, telefone) VALUES (:nome, :email, :telefone)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->execute();
            $mensagem = "Funcionário cadastrado com sucesso!";
        } catch (PDOException $e) {
            $mensagem = "Erro ao cadastrar o funcionário: " . $e->getMessage();
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos.";
    }
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
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(campo);
            if (texto.substring(0, 1) != saida) {
                src.value += texto.substring(0, 1);
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
                                <img src="/app/resources/images/carros_logo.png" alt="Logo" width=940 height=200>
                            </div>
                        </div>
                    </div>
                    <h1><a href="#">Sistema de Gerenciamento de Aluguel de Carros</a></h1>
                    <div id="menu">
                        <div id="divtitulocadastra">Cadastrar Funcionário</div>
                        <div id="wrapperlogin">
                            <?php if (!empty($mensagem)): ?>
                                <p><?php echo htmlspecialchars($mensagem); ?></p>
                            <?php endif; ?>
                            <form enctype="multipart/form-data" method="POST" action="">
                                <label id="textocadastra">Nome:</label>
                                <input type="text" id="campo" name="nome" required />
                                <br>
                                <label id="textocadastra">Email:</label>
                                <input type="email" id="campo" name="email" required />
                                <br>
                                <label id="textocadastra">Telefone:</label>
                                <input type="text" id="campo" maxlength="14" onkeypress="formatar_mascara(this,'##-#####-####')" name="telefone" required />
                                <br>
                                <div id="wrapper1">
                                    <button type="submit" id="botaoCadastro" class="button">
                                        Cadastrar
                                    </button>
                                    <button id="botaoCancelar" class="button" formaction="/index.php">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
