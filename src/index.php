<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="teste.php" method="POST">
        <label for="nome">Nome: </label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <button type="submit">Enviar</button>
    </form>

    <form action="api.php" method="GET"><br><br>
        <button type="submit" id="api" name="api">STEAM</button>
    </form>
</body>
</html>