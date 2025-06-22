<?php
include 'conexao.php';

$sql = "SELECT * FROM veiculos";
$resultado = $conexao->query($sql);

$veiculos = array();

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $veiculos[] = $linha;
    }
}

header('Content-Type: application/json');
echo json_encode($veiculos);
?>
