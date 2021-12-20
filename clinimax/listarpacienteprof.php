<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblpaciente";
    $qry = $con->query($sql);
    $paciente = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Listar Paciente</title>
</head>
<body>
    <div class="container">
    <h1>Lista de Pacientes</h1>
<hr>
<a  class="btn btn-outline-success" href="frmpacienteprof.php">Novo Cadastro</a>
<a  class="btn btn-outline-secondary" href="logar/prof.php">home</a>
<hr>
<table class="table table-dark table-striped ">
    <thead>
        <tr>
           <th>id paciente</th>
           <th>Nome</th>
           <th>CPF</th>  
           <th>Data de Ingresso</th>
           <th>Email</th>
           <th>Celular</th>
           
           
           
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($paciente as $paciente) { ?>
        <tr>
            <td><?php echo $paciente->idpaciente ?></td>
            
            <td><?php echo $paciente->nome ?></td>
            <td><?php echo $paciente->cpf ?></td>
            <td><?php echo $paciente->datadeingresso ?></td>
            <td><?php echo $paciente->email ?></td>
            <td><?php echo $paciente->cel ?></td>
            
            
            

        </tr>
        <?php } ?>
    </tbody>
</table>
    </div>
<
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


</body>