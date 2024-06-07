<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Categoria</title>
</head>
<body>
    <h1>Criar Nova Categoria</h1>
    <form action="/app/controllers/CategoriaController.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
