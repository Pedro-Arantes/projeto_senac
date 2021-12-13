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
    <title>Listar Paciente</title>
</head>
<body>
    
<h1>Lista de Pacientes</h1>
<hr>
<a href="frmpaciente.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id paciente</th>
           <th>Nome</th>
           <th>CPF</th>  
           <th>Data de Ingresso</th>
           <th>Email</th>
           <th>Celular</th>
           
           
           <th colspan=2>Ações</th>
           
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
            
            
            <td><a href="frmpaciente.php?idpaciente=<?php echo $paciente->idpaciente ?>">Editar</a></td>
            <td><a href="frmpaciente.php?op=del&idpaciente=<?php echo  $paciente->idpaciente ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


</body>