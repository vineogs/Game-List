<?php
$host = 'db';
$dbname = 'meu_banco';
$user = 'usuario';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];

        $stmt = $pdo->prepare("INSERT INTO usuarios (nome) VALUES (:nome)");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }
    
    echo "Dados inseridos";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>