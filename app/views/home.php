<?php $this->layout('master', ['title' => 'User Profile']) ?>

<h1>Home</h1>
<p>Hello, <?=$this->e($name='antonio')?></p>
<p><?php echo $mensagem; ?></p>

<?php foreach ($itens as $item): ?>
    <li><?php echo $item; ?></li>
<?php endforeach; ?>

<a href="/contact">contact</a>