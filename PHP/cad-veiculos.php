<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_nome = $_POST['cliente_nome'];
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $data_entrada = $_POST['data_entrada'];

    $stmt = $pdo->prepare("INSERT INTO veiculos (cliente_nome, placa, modelo, data_entrada) VALUES (?, ?, ?, ?)");
    $stmt->execute([$cliente_nome, $placa, $modelo, $data_entrada]);

    echo "Veículo cadastrado com sucesso! <a href='../Consultas/consul-veiculo.html'>Ver veículos</a>";
}
?>
