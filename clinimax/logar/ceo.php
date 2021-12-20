<?php



session_start();
include_once('seguranca.php');

include('../conexao/conexao.php');

seguranca_adm();









?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CEO</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="../ico_clinica.webp" alt="" width="30" height="24" class="d-inline-block align-text-top">
        CliniMax
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="administrador.php">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../listarprofissional1.php">Listar Profissional</a></li>
            <li><a class="dropdown-item" href="../listarreserva1.php">Listar Reserva</a></li>
            
          </ul>
        </li>
        <!--Itens separados na navbar-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../listarpaciente1.php">Listar Paciente</a></li>
            <li><a class="dropdown-item" href="../listarpagamento1.php">Listar Pagamento</a></li>
            <li><hr class="dropdown-divider"></li>

            <li><a class="dropdown-item" href="../listarprofissional1.php">Listar Profissional</a></li>
            <li><a class="dropdown-item" href="../listarservico1.php">Listar Serviço</a></li>
            <li><a class="dropdown-item" href="../listarconsultas1.php">Listar Consulta</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../frmpaciente1.php">Paciente</a></li>
            <li><a class="dropdown-item" href="../frmpagamento1.php">Pagamento</a></li>
            <li><a class="dropdown-item" href="../frmreserva1.php">Reserva</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../frmservico1.php">Serviço</a></li>
            <li><a class="dropdown-item" href="../frmconsulta1.php">Consulta</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Busca" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Busca</button>
      </form>
    </div>
  </div>
</nav>
    <div class="border rounded border-success border-5 container">
    <?php echo "<br><h2>Olá - ".$_SESSION['usuarionome']."<h2><hr>"; ?>
    <h1>Seja Bem vindo! u.u</h1>
    <p>Deseja Ver a lista de Pacientes?</p>
    <a class="btn btn-info" href="../listarpaciente1.php">Listar Pacientes</a>
    <p>Ou deseja adicionar um novo?</p>
    <a class="btn btn-info" href="../frmpaciente1.php">Cadastrar Paciente</a>
    
    <hr>
    <?php echo "<a class='btn btn-outline-warning' href='sair.php'>Deslogar</a>";  ?>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>