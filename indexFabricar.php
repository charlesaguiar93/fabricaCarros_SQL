<!DOCTYPE html>
<html lang="BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fábrica de Carro - Bootstrap - SQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stely.css">
</head>
<body>
    
    <p><a href="index.html"> 🔚Voltar ao menu</a></p>
    <div class="container mb-4  border-info"><br><br>
         <div class="card card-custom border-info bg-dark">
             <div class="card-body text-primary">
    <h2 class="display-4 "><i class="bi bi-house-gear-fill text-primary"></i> Fabricar carros <i class="bi bi-car-front-fill"></i></h2>
        
        <form method="POST" action="processa.php" class="form-group col-md-6">
            <input type="hidden" name="acao" value="fabricar">


  <div class="input-group mb-3">
  <input type="text" name="modelo" class="form-control" placeholder="Modelo" aria-label="Modelo" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text text-primary" id="basic-addon2">Modelo</span>
  </div>
</div>

 <div class="input-group mb-3">
  <input type="text" name="cor" class="form-control" placeholder="Cor" aria-label="Cor" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text text-primary" id="basic-addon2">Cor</span>
  </div>
</div>

  <div class="input-group mb-3">
  <input type="number" name="quantidade" class="form-control" placeholder="Quantidade" aria-label="Quantidade" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text text-primary" id="basic-addon2">Quantidade</span>
  </div>
  </div>
   <button type="reset" class="btn btn-primary btn-lg">Limpar</button>
   <button type="submit" class="btn btn-success btn-lg">Fabricar</button>
   </div>
</div>
   </div>
           
        </form>
      


        
</body>
</html>