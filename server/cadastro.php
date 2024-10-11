<?php
include '../db/config.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $validade = $_POST['validade'];

    $query = "INSERT INTO medicamentos (nome, preco, quantidade, categoria, validade) VALUES ('$nome', '$preco', '$quantidade', '$categoria', '$validade')";
    $conn->query($query);

    header('Location: listagem.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Medicamentos - FVS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Medicamentos</h2>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço:</label>
                        <input type="number" id="preco" name="preco" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <select id="categoria" name="categoria" class="form-select" required>
                            <option value="Analgésico">Analgésico</option>
                            <option value="Antibiótico">Antibiótico</option>
                            <option value="Anti-inflamatório">Anti-inflamatório</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validade" class="form-label">Validade:</label>
                        <input type="date" id="validade" name="validade" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-3 text-center">
            <a href="menu.html" class="btn btn-secondary">Voltar ao Menu</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>