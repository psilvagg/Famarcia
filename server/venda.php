<?php
include '../db/config.php';

if (isset($_POST['vender'])) {
    $medicamentoId = $_POST['medicamento_id'];
    $quantidadeVendida = $_POST['quantidade_vendida'];

    $stmt = $conn->prepare("SELECT quantidade FROM medicamentos WHERE id = ?");
    $stmt->bind_param("i", $medicamentoId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantidadeAtual = $row['quantidade'];

        if ($quantidadeAtual >= $quantidadeVendida) {
            $novaQuantidade = $quantidadeAtual - $quantidadeVendida;
            $updateStmt = $conn->prepare("UPDATE medicamentos SET quantidade = ? WHERE id = ?");
            $updateStmt->bind_param("ii", $novaQuantidade, $medicamentoId);
            $updateStmt->execute();

            echo "Venda realizada com sucesso!";
        } else {
            echo "Quantidade em estoque insuficiente!";
        }
    } else {
        echo "Medicamento não encontrado!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Venda de Medicamentos</h2>

        <form method="post">
            <div class="mb-3">
                <label for="medicamento_id" class="form-label">Selecione o Medicamento:</label>
                <select id="medicamento_id" name="medicamento_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    <?php
                    $medicamentos = $conn->query("SELECT id, nome FROM medicamentos");
                    while ($medicamento = $medicamentos->fetch_assoc()) {
                        echo "<option value=\"{$medicamento['id']}\">{$medicamento['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantidade_vendida" class="form-label">Quantidade a Vender:</label>
                <input type="number" id="quantidade_vendida" name="quantidade_vendida" class="form-control" required>
            </div>
            <button type="submit" name="vender" class="btn btn-primary">Vender</button>
        </form>
        <div class="mt-3">
            <a href="listagem.php" class="btn btn-secondary">Voltar à Listagem</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
