<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $telefone, $endereco]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Cliente</title>
  <style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: repeating-linear-gradient(0deg, #3a3a3a, #3a3a3a 1px, #4a4a4a 2px),
        radial-gradient(circle at top left, #5a5a5a, #2a2a2a);
    background-blend-mode: overlay;
    color: white;
    }

        .alerta-sucesso {
    background-color: #0d0d0d;
    border: 2px solid #00ff55;
    border-radius: 15px;
    padding: 20px 30px;
    color: #00ff55;
    font-size: 18px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 200px auto;
    text-align: center;
    box-shadow: 0 0 15px rgba(0, 255, 100, 0.2);
    animation: aparecer 0.3s ease-in-out;
    }

    .alerta-sucesso a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #00ff55;
    color: #0d0d0d;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.2s ease;
    }

    .alerta-sucesso a:hover {
    background-color: #00cc44;
    color: white;
    }

    @keyframes aparecer {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
    }

  </style>
</head>
<body>

  <div class="alerta-sucesso" id="mensagem-sucesso">
    ✅ Cliente cadastrado com sucesso!<br>
    <a href="../Consultas/consul-cliente.html">Ver clientes</a>
  </div>

  <script>
    // Esconde o aviso depois de 5 segundos
    setTimeout(function() {
      const alerta = document.getElementById('mensagem-sucesso');
      if (alerta) {
        alerta.style.display = 'none';
      }
    }, 30000);
  </script>

</body>
</html>
