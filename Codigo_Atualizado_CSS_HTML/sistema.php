<?php
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['nome_empresa']) == true) and (!isset($_SESSION['cnpj']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION["nome_empresa"]);
        unset($_SESSION["cnpj"]);
        unset($_SESSION["senha"]);
        header('Location: login.php');
    }
    $logado = $_SESSION['nome_empresa'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistema hehe</title>
    <style>
         body{
            background-image: linear-gradient(to right,rgb(169, 40, 230), #5013c3);
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
<nav id= "nave" class="navbar navbarNav navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Sistema hehe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
  </nav>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
</body>
</html>
