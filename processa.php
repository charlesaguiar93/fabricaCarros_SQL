

<?php

/* declare(strict_types=1) ação faz com que o PHP exija que as tipagem  sejam do tipo especificado
declarados como (tipos string, int, float, bool) */

//declare(strict_types=1);

require_once __DIR__ . '/modelo/Carro.php';
require_once __DIR__ . '/modelo/Fabrica.php';
include 'conexao.php';


session_start();

// garante que existe uma fábrica na sessão
/* O operador instanceof é utilizado para verificar se um objeto é instância de uma determinada
classe. Ele retorna true (verdadeiro) ou false (falso). */
if (!isset($_SESSION['fabrica']) || !($_SESSION['fabrica'] instanceof Fabrica)) {
    $_SESSION['fabrica'] = new Fabrica();
}

$fabrica = $_SESSION['fabrica'];

$acao = $_POST['acao'] ?? '';

echo '<p><a href="index.html"> 🔚Voltar ao menu</a></p>';

switch ($acao) {

    //case 'form_fabricar':
      /* echo '
         
   
         <div class="card card-custom border-info bg-light  border-info">
             <div class="card-body" >
             <h2>🏭 Fabricar carros🚙</h2>
        <form method="POST" action="processa.php" class="form-group">
            <input type="hidden" name="acao" value="fabricar">

            <label>Modelo:</label>
            <input type="text" name="modelo" required><br><br>

            <label>Cor:</label>
            <input type="text" name="cor" required><br><br>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" min="1" required><br><br>

            <button type="reset">Limpar</button>
            <button type="submit">Fabricar</button>
        </form>'; 
      */
         // echo "<h2>🏭 Fabricar carros🚙</h2>";
        
     

       // break;

    case 'fabricar':

        /* trim - faz a remoção de espaços em branco no início e no fim da string */
        $modelo = trim($_POST['modelo'] ?? '');
        $cor = trim($_POST['cor'] ?? '');
        $quantidade = (int)($_POST['quantidade'] ?? 0);

        if ($modelo === '' || $cor === '' || $quantidade < 1) {
            echo "<p>❌ Dados inválidos.</p>";
            break;
        }

        $fabrica->fabricarCarro($modelo, $cor, $quantidade);
        $_SESSION['fabrica'] = $fabrica;

        for ($i = 0; $i < $quantidade; $i++) {
        
            /* Essa variável armazena a instrução SQL para inserir um novo carro no estoque */
        $stmt = $pdo->prepare("INSERT INTO listar_estoque (modelo, cor) VALUES (:modelo, :cor)");
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':cor', $cor);
        $stmt->execute();

        //mysqli_query($conn, "INSERT INTO listar_estoque (modelo, cor) VALUES ('{$modelo}', '{$cor}')");

       
        }
        
  echo "<p>✅ {$quantidade} carro(s) {$modelo}, {$cor} salvo(s) no banco!</p>";


      //  echo "<p>✅ Fabricados <b>{$quantidade}</b> carro(s) — Modelo: <b>{$modelo}</b>, Cor: <b>{$cor}</b>.</p>";
        //$fabrica->listarCarros();
        break;

    case 'form_vender':
        echo "<h2>💸 Vender um carro</h2>";
        echo "<p>Informe <b>modelo</b> e <b>cor</b> do carro a ser vendido.</p>";

        echo '
        <form method="POST" action="processa.php">
            <input type="hidden" name="acao" value="vender">

            <label>Modelo:</label>
            <input type="text" name="modelo" required><br><br>

            <label>Cor:</label>
            <input type="text" name="cor" required><br><br>

            <button type="submit">Vender</button>
        </form>';

        echo "<hr>";
        $fabrica->listarCarros();
        break;
/* -------------------------------------------------------------------------------------------------- */
    case 'vender':
       
         $modelo = trim($_POST['modelo'] ?? '');
        $cor = trim($_POST['cor'] ?? '');

        if ($modelo === '' || $cor === '') {
            echo "<p>❌ Dados inválidos.</p>";
            break;
        }

        $ok = $fabrica->venderCarro($modelo, $cor);
        $_SESSION['fabrica'] = $fabrica;

      /* Essa variável armazena a instrução SQL para deletar um carro do estoque */
      $sql = "DELETE FROM listar_estoque 
        WHERE modelo = :modelo AND cor = :cor 
        LIMIT 1";

      $stmt = $pdo->prepare($sql);

      $stmt->bindParam(':modelo', $modelo);
      $stmt->bindParam(':cor', $cor);

      $stmt->execute();
       
       
       
       
        /*    foreach ($conn->query("SELECT id FROM listar_estoque WHERE modelo = '{$modelo}' AND cor = '{$cor}' LIMIT 1") as $row) {
            $id = $row['id'];
            mysqli_query($conn, "DELETE FROM listar_estoque WHERE id = {$id}");
        }
 */
        
     
        if ($ok) {
            echo "<p>✅ Carro vendido! Modelo: <b>{$modelo}</b> | Cor: <b>{$cor}</b></p>";
        } else {
            echo "<p>❌ Não encontrei nenhum carro com Modelo: <b>{$modelo}</b> e Cor: <b>{$cor}</b>.</p>";
        }

        $fabrica->listarCarros();
        break;

    case 'listar':
        $fabrica->listarCarros();
        break;

    case 'sair':
        session_destroy();

        /* Essa variável armazena a instrução SQL para truncar a tabela listar_estoque 
         TRUNCATE TABLE listar_estoque exclui todos os registros ate os ids */
        $stmt = $pdo->prepare("TRUNCATE TABLE listar_estoque");
        $stmt->execute();
      


        echo "<h2>👋 Sessão finalizada! Obrigado por usar nosso sistema.</h2>";
       
        break;

    default:
        echo "<p>Escolha uma opção no menu.</p>";
        break;


        

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Processamento</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/">
<link rel="stylesheet" href="indexFabricar.php">
</head>

<body>

