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
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="app/resources/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="app/resources/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link href="app/resources/css/icon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

</head>

<body>
    <div id="wrapper1">
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <div id="wrapper1">
                        <div id="espaço_container" class="container">
                            <div id="logo_site">
                                <img src="app/resources/images/carros_logo.png" alt="some text" width=940 height=200>
                            </div>
                        </div>
                    </div>
                    <h1><a href="#">Sistema de Gerenciamento de Aluguel de Carros</a></h1>
                    <div id="menu">
                        <ul>
                            <?php
                            if ($tipo = 'F') {
                                print "<li class='current_page_item'><a href='indexFuncionario.php' accesskey='1' title=''>Principal</a></li>";
                            } else if ($tipo = 'C') {
                                print "<li class='current_page_item'><a href='indexCliente.php' accesskey='1' title=''>Principal</a></li>";
                            } else {
                                print "<li class='current_page_item'><a href='index.php' accesskey='1' title=''>Principal</a></li>";
                            }

                            ?>
                            <?php if (isset($_SESSION['cpf'])) {
                                print "<li><a href='app/resources/views/login/logout.php' accesskey='2' title=''>Logout</a></li>";
                            } else {
                                print "<li><a href='app/resources/views/login/login.php' accesskey='2' title=''>Login</a></li>";
                            }
                            ?>
                            <li><a href="app/resources/views/categorias/economicos.php" accesskey="3" title="">Econômicos</a></li>
                            <li><a href="app/resources/views/categorias/utilitarios.php" accesskey="4" title="">Utilitários</a></li>
                            <li><a href="app/resources/views/categorias/suv.php" accesskey="5" title="">SUV</a></li>
                            <li><a href="app/resources/views/categorias/luxo.php" accesskey="6" title="">Luxo</a></li>
                            <li><a href="app/resources/views/contato.php" accesskey="7" title="">Contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="wrapper2">
                <div id="welcome" class="container">
                    <div class="title">
                        <h2>Bem-vindo(a) ao sistema de aluguel de automoveis</h2>
                    </div>
                    <h3>Este é um sistema desenvolvido para facilitar o <strong>gerenciamento</strong> de aluguel de veículos.</h3>
                </div>
            </div>
            <div id="wrapper3">
                <div id="portfolio" class="container">
                    <div class="title">
                        <h2>Opções do sistema:</h2>
                    </div>
                    <div class="column1">
                        <div class="box">
                            <span class="icon icon-wrench"></span>
                            <form method="post" action="app/resources/views/clientes/editar_cliente.php">
                                <h3>Alterar meus dados</h3>
                                <p>Altere seus dados cadastrados. Como: Nome, CPF, etc.</p>
                                <button type="submit" id="botaofun1" class="button">
                                    Alterar Dados
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="column2">
                        <div class="box">
                            <span class="icon icon-shopping-cart"></span>
                            <form method="post" action="app/resources/views/categorias/interface_economicos.php">
                                <h3>Alugar um Automovel</h3>
                                <p>Escolha um carro que atenda sua necessidade!</p>
                                <button type="submit" id="botaofun2" class="button">
                                    Alugar automovel
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="column3">
                    <div class="box">
                        <span class="icon icon-shopping-cart"></span>
                        <form method="post" action="app/resources/views/clientes/interface_cancelar_reserva.php">
                            <h3>Cancelar reservas</h3>
                            <p>Cancele reservas abertas, caso tenha desistido ou errado algum detelhe.</p>
                            <button type="submit" id="botaofun2" class="button">
                                Cancelar reserva
                            </button>
                        </form>
                        </div>
                        </div>
                        <div class="column4">
                            <div class="box">
                                <span class="icon icon-shopping-cart"></span>
                                <form method="post" action="app/resources/views/clientes/buscar_reservas.php">
                                    <h3>Buscar reservas</h3>
                                    <p>Busque todas as reservas que estão abertas em seu nome.</p>
                                    <button type="submit" id="botaofun2" class="button">
                                        Buscar reserva
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wrapper1">
                <div id="espaço_container" class="container">
                    <div class="title">
                        <h2>Temos todos os tipos de automóveis!</h2>
                        <img src="app/resources/images/veiculos.png" alt="some text" width=800 height=280>
                    </div>
                </div>
            </div>
            <div id="espaço_container" class="container">
                <div class="title">
                    <h2>Acesse nossas redes sociais!</h2>
                    <span class="byline">Estamos sempre a disposição de nossos clientes!</span>
                </div>
                <ul class="contact">
                    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                    <li><a href="#" class="icon icon-facebook"><span></span></a></li>
                    <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
                    <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
                    <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
                </ul>
                <div id="espaço_container" class="container">
                </div>
            </div>
</body>

</html>