<?php
include 'conexao.php'; // Deve definir $pdo

$servicos = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["servico"])) {
    $termo = $_POST["servico"];

    $stmt = $pdo->prepare("SELECT * FROM servicos WHERE descricao LIKE :termo");
    $stmt->bindValue(':termo', "%$termo%");
    $stmt->execute();
    $servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($servicos);
?>
