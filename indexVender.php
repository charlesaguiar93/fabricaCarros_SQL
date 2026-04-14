
<?php
require_once __DIR__ . '/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fábrica de Carro - Bootstrap - SQL</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stely.css">
</head>
<body>
 <p><a href="index.html"> 🔚Voltar ao menu</a></p>
<div class="container mt-5">
    <h2>💸 Vender um carro</h2>
    <p>Informe <b>modelo</b> e <b>cor</b> do carro a ser vendido.</p>

    <form method="POST" action="processa.php">
        <input type="hidden" name="acao" value="vender">

        <div class="form-group">
            <label>Modelo:</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Cor:</label>
            <input type="text" name="cor" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">Vender</button>
    </form>

    <hr>

    <h3>📋 Estoque atual</h3>

    <?php
    $stmt = $pdo->query("SELECT * FROM listar_estoque");
    ?>

  
<table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Cor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stmt as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['modelo']; ?></td>
                    <td><?= $row['cor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>