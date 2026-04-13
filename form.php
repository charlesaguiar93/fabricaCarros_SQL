
<form action="processa.php" method="POST">
  <label for="modelo">Modelo:</label>
  <input type="text" id="modelo" name="Modelo" required>

  <label for="cor">Cor:</label>
  <input type="text" id="cor" name="Cor" required>

  <label for="quantidade">Quantidade:</label>
  <input type="number" id="quantidade" name="quantidade" min="1" required>

  <button type="submit" name="acao" value="fabricar">Fabricar</button>
</form>