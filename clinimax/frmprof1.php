<?php 

$idprof = isset($_GET["idprof"]) ? $_GET["idprof"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;

  
  try {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdclinimax";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

    if($op=="del"){
        $sql = "DELETE  FROM  tblprofissional where idprof= :idprof";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idprof",$idprof);
        $stmt->execute();
        header("Location:listarprofissional.php");
    }


    if($idprof){
        //estou buscando os dados do cliente no BD
        $sql = "SELECT * FROM  tblprofissional where idprof= :idprof";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idprof",$idprof);
        $stmt->execute();
        $prof = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($cliente);
    }
    if($_POST){
      if($_POST["idprof"]){
          $sql = "UPDATE tblprofissional SET nome=:nome, graduacao=:graduacao, salario=:salario,disponibilidade=:disponibilidade,especialidade=:especialidade,email=:email WHERE idprof=:idprof ";
          $stmt = $con->prepare($sql);
          $stmt->bindValue(":nome", $_POST["nome"]);
          $stmt->bindValue(":graduacao", $_POST["graduacao"]);
          $stmt->bindValue(":salario", $_POST["salario"]);
          $stmt->bindValue(":disponibilidade", $_POST["disponibilidade"]);
          $stmt->bindValue(":especialidade", $_POST["especialidade"]);
          $stmt->bindValue(":email", $_POST["email"]);
          $stmt->bindValue(":idprof", $_POST["idprof"]);
          $stmt->execute(); 
      } else {

          $sql = "INSERT INTO tblprofissional (nome,graduacao,salario,disponibilidade,especialidade,email) VALUES (:nome,:graduacao,:salario,:disponibilidade,:especialidade,:email)";
          $stmt = $con->prepare($sql);

          $stmt->bindValue(":nome",$_POST["nome"]);
          $stmt->bindValue(":graduacao",$_POST["graduacao"]);
        
          $stmt->bindValue(":salario",$_POST["salario"]);
          $stmt->bindValue(":disponibilidade",$_POST["disponibilidade"]);
          $stmt->bindValue(":especialidade",$_POST["especialidade"]);
          $stmt->bindValue(":email",$_POST["email"]);
        
        
          $stmt->execute(); 
      }
      header("Location:listarprofissional.php");
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
  <h1>Cadastro do Profissional:</h1>
  <form method="post">
    <div class="row" >
      <div class='row'>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input type="text" name="nome"  required  class="form-control"    value="<?php echo isset($prof) ? $prof->nome : null ?>"><br>
        <div id="emailHelp" class="form-text">Nome completo.</div>
      </div>
      <div class="col-auto">
        <label for="cpf" class="form-label" >Email</label>
        <input type="email" name="email" required class="form-control"    value="<?php echo isset($prof) ? $prof->email : null ?>"><br>
      </div>
      </div>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Graduação</label>
        <input type="text" name="graduacao" required class="form-control"    value="<?php echo isset($prof) ? $prof->graduacao : null ?>"><br>
      <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Especialização</label>
        <input type="text" name="especialidade" class="form-control"    value="<?php echo isset($prof) ? $prof->especialidade : null ?>"><br>
      <div id="emailHelp" class="form-text"></div>
      </div>
      <div class='row'>
      <div class="col-auto">
        <label for="exampleInputEmail1" class="form-label">Sálario</label>
        <input type="text" name="salario" required class="form-control"    value="<?php echo isset($prof) ? $prof->salario : null ?>"><br>
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="col-auto">
        <label for="cpf" class="form-label" >Disponibilidade</label>
        <input type="text" name="disponibilidade" required class="form-control"  value="<?php echo isset($prof) ? $prof->disponibilidade : null ?>"><br>
      </div>

      <div class="col-auto">
      <input type="hidden"     name="idprof"   value="<?php echo isset($prof) ? $prof->idprof : null ?>">
      </div>
      
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">concorda em receber email avisando sobre consultas. </label>
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