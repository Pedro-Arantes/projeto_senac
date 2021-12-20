<?php 

$idreserva = isset($_GET["idreserva"]) ? $_GET["idreserva"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;

  try {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdclinimax";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha);


    if ($op=="del") {
      $sql = "DELETE from tblreserva where idreserva=:idreserva";
      $stmt = $con->prepare($sql);
      $stmt->bindValue(":idreserva",$idreserva);
      $stmt->execute();
      header("Location:listarreserva1.php"); 
    }

    if ($idreserva) {

      $sql = "SELECT * from tblreserva where idreserva=:idreserva";
      $stmt = $con->prepare($sql);
      $stmt->bindValue(":idreserva",$idreserva);
      $stmt->execute();
      $reserva = $stmt->fetch(PDO::FETCH_OBJ);

    }
    if ($_POST) {
      if ($_POST["idreserva"]) {
        $sql = "UPDATE tblreserva set idprof=:idprof,sala=:sala,datareserva=:datareserva,horareserva=:horareserva where idreserva=:idreserva";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idprof", $_POST["idprof"]);
        $stmt->bindValue(":sala", $_POST["sala"]);
        $stmt->bindValue(":datareserva", $_POST["datareserva"]);
        $stmt->bindValue(":horareserva", $_POST["horareserva"]);
        $stmt->bindValue(":idreserva",$_POST["idreserva"]);
        $stmt->execute();
              
      } else {
        $sql = "INSERT into tblreserva(idprof,sala,datareserva,horareserva) values (:idprof,:sala,:datareserva,:horareserva)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idprof",$_POST["idprof"]);
        $stmt->bindValue(":sala",$_POST["sala"]);
        $stmt->bindValue(":datareserva",$_POST["datareserva"]);
        $stmt->bindValue(":horareserva",$_POST["horareserva"]);
        $stmt->execute(); 
      }
      header("Location:listarreserva1.php");
    }
  } catch (PDOException $e) {
    echo "erro".$e->getMessage;
  }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CliniMax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="ico_clinica.webp" alt="" width="30" height="24" class="d-inline-block align-text-top">
        CliniMax
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logar/ceo.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmprof1.php">Profissional</a></li>
            <li><a class="dropdown-item" href="frmreserva1.php">Reserva</a></li>
           
            
          </ul>
        </li>
        <!--Itens separados na navbar-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmpaciente1.php">Paciente</a></li>
            <li><a class="dropdown-item" href="frmpagamento1.php">Pagamento</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="frmservico1.php">Serviço</a></li>
            <li><a class="dropdown-item" href="frmconsulta1.php">Consulta</a></li>
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

  <!--Inicio do formulário-->
  <div class="container">
  <!--Enunciado do formulário e da pagina-->
  <h1>Cadastro de Reserva:</h1>
  <form method="post">
    <div class="row" >
      <div class='row'>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Id Profissional</label>
        <input type="text" name="idprof" required class="form-control"    value="<?php echo isset($reserva) ? $reserva->idprof : null ?>"><br>
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="col-auto">
        <label for="cpf" class="form-label" name="sa">Sala</label>
        <input type="text" name="sala" required class="form-control"    value="<?php echo isset($reserva) ? $reserva->sala : null ?>"><br>
      </div>
      </div>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Data da Reserva</label>
        <input type="date" name="datareserva" required class="form-control"    value="<?php echo isset($reserva) ? $reserva->datareserva : null ?>"><br>
      <div id="emailHelp" class="form-text">email de contato.</div>
      </div>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Hora da Reserva</label>
        <input type="text" name="horareserva" class="form-control"    value="<?php echo isset($reserva) ? $reserva->horareserva : null ?>"><br>
      <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="col-auto">
      <input type="hidden"     name="idreserva"   value="<?php echo isset($reserva) ? $reserva->idreserva : null ?>">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1"> </label>
      </div>
      <div>
        <button type="submit" class="col-auto btn btn-success">Cadastrar</button>
        <button type="reset" class="col-auto btn btn-danger">Apagar</button>
      </div>
      
    </div>
  </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>