<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    // Upload da imagem
    $imagem = '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeImagem = basename($_FILES['imagem']['name']);
        $destino = 'imagens/' . $nomeImagem;

        // Garante a existência da pasta
        if (!is_dir('imagens')) {
            mkdir('imagens', 0777, true);
        }

        move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);
        $imagem = $nomeImagem;
    }

    // Inserção no banco
    $sql = "INSERT INTO motos (modelo, marca, ano, preco, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$modelo, $marca, $ano, $preco, $descricao, $imagem]);

    echo "Moto cadastrada com sucesso. <a href='consulta.php'>Ver motos cadastradas</a>";
}
?>

