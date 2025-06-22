<?php
require '..conexao.php';

$stmt = $pdo->query("SELECT * FROM motos ORDER BY criado_em DESC");
$motos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Motos Cadastradas</title>
  <style>
    .moto {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px;
    }
    img {
      max-width: 200px;
      height: auto;
    }
  </style>
</head>
<body>
  <h1>Motos Cadastradas</h1>
  <?php foreach ($motos as $moto): ?>
    <div class="moto">
      <h2><?= htmlspecialchars($moto['modelo']) ?> - <?= htmlspecialchars($moto['marca']) ?></h2>
      <p>Ano: <?= $moto['ano'] ?> | Preço: R$ <?= number_format($moto['preco'], 2, ',', '.') ?></p>
      <?php if (!empty($moto['imagem'])): ?>
        <img src="imagens/<?= htmlspecialchars($moto['imagem']) ?>" alt="Imagem da moto">
      <?php endif; ?>
      <p><?= nl2br(htmlspecialchars($moto['descricao'])) ?></p>
    </div>
  <?php endforeach; ?>
</body>
</html>
