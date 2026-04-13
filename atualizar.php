
<?php

include 'conexao.php';

 $modelo = $_POST['modelo'] ?? '';
 $cor = $_POST['cor'] ?? '';
 $id = $_POST['id'] ?? '';


$sql = "UPDATE listar_estoque SET
modelo = '$modelo', cor = '$cor' WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: form_fabricar");








?>