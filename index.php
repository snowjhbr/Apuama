<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/app/routes/routes.php";

// Verificação de ambiente
if (php_sapi_name() !== 'cli-server' && !isset($_SERVER['REQUEST_URI'])) {
    die("Erro: Este script deve ser executado em um servidor web.");
}

// Inicia a sessão se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$request = $_SERVER['REQUEST_METHOD'];

// Determina o tipo de usuário, se logado
$tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : '';

try {
    // Verifica se a rota e o método HTTP existem
    if (!isset($router[$request])) {
        throw new Exception("A rota não existe");
    }

    if (!array_key_exists($uri, $router[$request])) {
        throw new Exception("A rota não existe");
    }

    // Verifica se o controlador está definido e inclui o arquivo de controladores
    $controllerFunction = $router[$request][$uri];
    if (!function_exists($controllerFunction)) {
        require_once __DIR__."/app/controllers/{$controllerFunction}.php";
    }

    // Executa o controlador associado à rota
    if (function_exists($controllerFunction)) {
        $controllerFunction();
    } else {
        throw new Exception("O controlador não existe");
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

// HTML Dinâmico com Base no Tipo de Usuário
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gerenciamento de Aluguel de Carros</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="/app/resources/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/app/resources/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/app/resources/css/icon.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div id="wrapper1">
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <img src="/app/resources/images/carros_logo.png" alt="Logo" width="940" height="200">
                    <h1><a href="#">Sistema de Gerenciamento de Aluguel de Carros</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <?php
                        // Menu dinâmico baseado no tipo de usuário
                        if ($tipo === 'F') {
                            echo "<li class='current_page_item'><a href='indexFuncionario.php' accesskey='1' title=''>Principal</a></li>";
                        } elseif ($tipo === 'C') {
                            echo "<li class='current_page_item'><a href='indexCliente.php' accesskey='1' title=''>Principal</a></li>";
                        } else {
                            echo "<li class='current_page_item'><a href='index.php' accesskey='1' title=''>Principal</a></li>";
                        }

                        // Link de login/logout dinâmico
                        if (isset($_SESSION['cpf'])) {
                            echo "<li><a href='login/logout.php' accesskey='2' title=''>Logout</a></li>";
                        } else {
                            echo "<li><a href='login/login.php' accesskey='2' title=''>Login</a></li>";
                        }
                        ?>
                        <li><a href="categorias/economicos.php" accesskey="3" title="">Econômicos</a></li>
                        <li><a href="categorias/utilitarios.php" accesskey="4" title="">Utilitários</a></li>
                        <li><a href="categorias/suv.php" accesskey="5" title="">SUV</a></li>
                        <li><a href="categorias/luxo.php" accesskey="6" title="">Luxo</a></li>
                        <li><a href="contato.php" accesskey="7" title="">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper2">
            <div id="welcome" class="container">
                <div class="title">
                    <h2>Bem-vindo(a) ao sistema de aluguel de automóveis</h2>
                </div>
                <h3>Este é um sistema desenvolvido para facilitar o <strong>gerenciamento</strong> de aluguel de veículos.</h3>
            </div>
        </div>
        <div id="wrapper3">
            <div id="portfolio" class="container">
                <div class="title">
                    <h2>Vantagens de se alugar um automóvel</h2>
                </div>
                <div class="column1">
                    <div class="box">
                        <span class="icon icon-wrench"></span>
                        <h3>Não se preocupe com manutenção</h3>
                        <p>A manutenção é por nossa conta. Apenas preocupe-se em dirigir!</p>
                    </div>
                </div>
                <div class="column2">
                    <div class="box">
                        <span class="icon icon-trophy"></span>
                        <h3>Ganhe tempo, notoriedade e agilidade!</h3>
                        <p>Use o automóvel para poupar tempo, ganhar notoriedade e agilidade!</p>
                    </div>
                </div>
                <div class="column3">
                    <div class="box">
                        <span class="icon icon-key"></span>
                        <h3>Abra possibilidades!</h3>
                        <p>Um automóvel te dá possibilidades de momentos incríveis e inesquecíveis. Um ônibus ou metrô não.</p>
                    </div>
                </div>
                <div class="column4">
                    <div class="box">
                        <span class="icon icon-lock"></span>
                        <h3>Sua viagem assegurada!</h3>
                        <p>Não se preocupe! Todos os automóveis têm seguro. Qualquer problema é só chamar!</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper1">
            <div id="espaço_container" class="container">
                <div class="title">
                    <h2>Temos todos os tipos de automóveis!</h2>
                    <img src="/app/resources/images/veiculos.png" alt="Veículos" width="800" height="280">
                </div>
            </div>
        </div>
        <div id="espaço_container" class="container">
            <div class="title">
                <h2>Acesse nossas redes sociais!</h2>
                <span class="byline">Estamos sempre à disposição de nossos clientes!</span>
            </div>
            <ul class="contact">
                <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                <li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
                <li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
                <li><a href="#" class="icon icon-tumblr"><span>Tumblr</span></a></li>
                <li><a href="#" class="icon icon-rss"><span>RSS</span></a></li>
            </ul>
        </div>
    </div>
</body>
</html>

