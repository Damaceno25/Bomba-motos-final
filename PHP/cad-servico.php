<?php
include 'conexao.php'; // conexão PDO, define $pdo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recebe e sanitiza os dados do formulário
    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);
    $veiculo = filter_input(INPUT_POST, 'veiculo', FILTER_SANITIZE_STRING);
    $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
    $data_entrada = $_POST['data_entrada']; // Data deve ser validada
    $tipo_servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $custo = filter_input(INPUT_POST, 'custo', FILTER_SANITIZE_STRING);

    // Validação simples (exemplo)
    if (!$placa || !$veiculo || !$cliente || !$data_entrada || !$tipo_servico || !$descricao || !$custo) {
        die("Erro: Todos os campos são obrigatórios.");
    }

    // Inserção segura com PDO
    $sql = "INSERT INTO servicos 
            (placa, veiculo, cliente, data_entrada, tipo_servico, descricao, custo) 
            VALUES (:placa, :veiculo, :cliente, :data_entrada, :tipo_servico, :descricao, :custo)";
    
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([
            ':placa' => $placa,
            ':veiculo' => $veiculo,
            ':cliente' => $cliente,
            ':data_entrada' => $data_entrada,
            ':tipo_servico' => $tipo_servico,
            ':descricao' => $descricao,
            ':custo' => $custo,
        ]);
        echo "Serviço cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar serviço: " . $e->getMessage();
    }
} else {
    echo "Método inválido.";
}
?>


