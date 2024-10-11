<?php
include '../db/config.php';

// Inicializa as variáveis de busca e ordenação
$searchTerm = ''; // Termo de busca
$orderBy = 'nome'; // Ordem padrão

// Verifica se um termo de busca foi enviado
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
}

// Verifica se uma opção de ordenação foi selecionada
if (isset($_POST['orderBy'])) {
    $orderBy = $_POST['orderBy'];
}

// Prepara a consulta com filtro de busca e ordenação
$query = "SELECT * FROM medicamentos WHERE nome LIKE ? ORDER BY $orderBy";
$stmt = $conn->prepare($query);
$searchTerm = "%$searchTerm%"; // Adiciona os caracteres '%' para busca parcial
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listagem de Medicamentos</h2>

        <!-- Formulário de busca e ordenação -->
        <form method="post" class="mb-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="searchTerm" placeholder="Buscar medicamento pelo nome" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <button class="btn btn-primary" type="submit" name="search">Buscar</button>
            </div>

            <div class="mb-3">
                <label for="orderBy" class="form-label">Ordenar por:</label>
                <select id="orderBy" name="orderBy" class="form-select" onchange="this.form.submit()">
                    <option value="nome" <?php echo ($orderBy === 'nome') ? 'selected' : ''; ?>>Nome</option>
                    <option value="preco" <?php echo ($orderBy === 'preco') ? 'selected' : ''; ?>>Preço</option>
                    <option value="quantidade" <?php echo ($orderBy === 'quantidade') ? 'selected' : ''; ?>>Quantidade</option>
                    <option value="categoria" <?php echo ($orderBy === 'categoria') ? 'selected' : ''; ?>>Categoria</option>
                </select>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th>Validade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                                <td><?php echo htmlspecialchars($row['preco']); ?></td>
                                <td><?php echo htmlspecialchars($row['quantidade']); ?></td>
                                <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                                <td><?php echo htmlspecialchars($row['validade']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhum medicamento encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3 text-center">
            <a href="menu.html" class="btn btn-secondary">Voltar ao Menu</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>