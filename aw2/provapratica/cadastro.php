<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <h1>Matheus Ikeda - 1752545 - 413</h1>
    <div class="formulario">
        <h2>CADASTRO</h2>
        <form action="./usuarios.php" method="post">
            <input type="text" name="nome" id="nome" placeholder="Nome" required><br>
            <input type="number" name="idade" id="idade" placeholder="Idade" required><br>
            <input type="text" name="email" id="email" placeholder="E-mail" required><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>