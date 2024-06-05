<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/app/resources/css/master.css">
  <link rel="stylesheet" href="/app/resources/css/<?= $style ?>.css">
  <title> <?=$this->e($title)?> </title>
</head>
<body>
  <div class="header">
    <div class="container_logo">
      <figure>
        <img src="https://i.pinimg.com/736x/c6/6c/fa/c66cfa5861caafaa60b4c1c5efe866bc.jpg" alt="">
      </figure>
      <h1>
        APUMA
      </h1>
    </div>
    <nav>
      <ul class="container_nav">
        <li>
          <a href="/serviços">Serviços</a>
        </li>
        <li>
          <a href="/produtos">Produtos</a>
        </li>
        <li>
          <a href="/contato">Contato</a>
        </li>
        <li>
          <a href="/suporte_cliente">Suporte ao cliente</a>
        </li>
      </ul>
    </nav>
    <ul>
      <li>
        <a href="">ICONE</a>
      </li>
      <li>
        <a href="">ICONE</a>
      </li>
      <li>
        <a href="">ICONE</a>
      </li>
    </ul>
  </div>
  <?= $this->section('content') ?>
</body>
</html>
