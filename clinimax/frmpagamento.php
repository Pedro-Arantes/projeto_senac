<?php 

$idpagamento = isset($_GET["idpagamento"]) ? $_GET["idpagamento"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdclinimax";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblpagamento where idpagamento= :idpagamento";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idpagamento",$idpagamento);
            $stmt->execute();
            header("Location:listarpagamento.php");
        }


        if($idpagamento){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblpagamento where idpagamento= :idpagamento";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idpagamento",$idpagamento);
            $stmt->execute();
            $pagamento = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if($_POST){
          if($_POST["idpagamento"]){
              $sql = "UPDATE tblpagamento SET modalidade=:modalidade, valor=:valor, idpaciente=:idpaciente WHERE idpagamento =:idpagamento";
              $stmt = $con->prepare($sql);
              $stmt->bindValue(":modalidade", $_POST["modalidade"]);
              $stmt->bindValue(":valor", $_POST["valor"]);
              $stmt->bindValue(":idpaciente", $_POST["idpaciente"]);
              $stmt->bindValue(":idpagamento", $_POST["idpagamento"]);
              $stmt->execute(); 
          } else {
              $sql = "INSERT INTO tblpagamento(modalidade,valor,idpaciente) VALUES (:modalidade,:valor,:idpaciente)";
              $stmt = $con->prepare($sql);
              $stmt->bindValue(":modalidade",$_POST["modalidade"]);
              $stmt->bindValue(":valor",$_POST["valor"]);
              $stmt->bindValue(":idpaciente",$_POST["idpaciente"]);
              $stmt->execute(); 
          }
          header("Location:listarpagamento.php");
      } 
    } catch(PDOException $e){
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listarpagamanto.php">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmprof.php">Profissional</a></li>
            <li><a class="dropdown-item" href="frmreserva.php">Reserva</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Consulta</a></li>
          </ul>
        </li>
        <!--Itens separados na navbar-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmpaciente.php">Paciente</a></li>
            <li><a class="dropdown-item" href="frmpagamento.php">Pagamento</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="frmservico.php">Serviço</a></li>
            <li><a class="dropdown-item" href="frmconsulta.php">Consulta</a></li>
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
  <h1>Pagamento:</h1>
  <form method="post">
    <div class="row" >
      <div class='row'>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Modalidade</label>
        <input type="text" name="modalidade"    class="form-control"    value="<?php echo isset($pagamento) ? $pagamento->modalidade : null ?>"><br>
        <div id="emailHelp" class="form-text">Tipo de pagamento,particular ou plano.</div>
      </div>
      <div class="col-auto">
        <label for="cpf" class="form-label" name="cpf">Valor</label>
        <input type="text" name="valor"    class="form-control"    value="<?php echo isset($pagamento) ? $pagamento->valor : null ?>"><br>
      </div>
      </div>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">id do paciente</label>
        <input type="text" name="idpaciente"    class="form-control"    value="<?php echo isset($pagamento) ? $pagamento->idpaciente : null ?>"><br>
        <div id="emailHelp" class="form-text">numero de identificação do paciente .</div>
      </div>

      <div class="col-auto">
      <input type="hidden"     name="idpagamento"   value="<?php echo isset($pagamento) ? $pagamento->idpagamento : null ?>">
      </div>
      
      
      <div class="mb-3 form-check">
        <input type="checkbox" required class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">concorda em efetuar o pagamento. </label>
      </div>
      <div>
        <button type="submit" class="col-auto btn btn-success">Cadastrar</button>
        <button type="reset" class="col-auto btn btn-danger">Apagar</button>
      </div>
      
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>