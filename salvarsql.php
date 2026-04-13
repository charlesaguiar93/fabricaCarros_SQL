<?php

include 'conexao.php';

mysqli_query($conn, "INSERT INTO listar_estoque (modelo, cor)

 VALUES ('{$_POST['modelo']}', '{$_POST['cor']}')");

header("Location: form_fabricar");









?>