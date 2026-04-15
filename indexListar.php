
<?php
include 'conexao.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stely.css">
</head>
<body>

    <p><a href="index.html"> 🔚Voltar ao menu</a></p>
    <div class="container mt-5">
        <h2><i class="bi bi-card-checklist"></i> Estoque atual</h2>

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
    
</body>
</html>