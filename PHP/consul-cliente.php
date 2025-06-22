<?php
include 'conexao.php'; // isso define $pdo

$clientes = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome"])) {
    $nome = $_POST["nome"];

    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE nome LIKE :nome");
    $stmt->bindValue(':nome', "%$nome%");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($clientes);
?>
    