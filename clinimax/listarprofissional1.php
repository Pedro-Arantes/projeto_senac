<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblprofissional";
    $qry = $con->query($sql);
    $prof = $qry->fetchAll(PDO::FETCH_OBJ);
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

    <title>Listar Profissionais</title>
</head>
<body>
<div class="container">
<h1>Lista de Profissionais</h1>
<hr>
<a  class="btn btn-outline-success"href="frmprof1.php">Novo Cadastro</a>
<a  class="btn btn-outline-secondary" href="logar/ceo.php">home</a>
<hr>
<table class="table table-dark table-striped">
    <thead>
        <tr>
           <th>id profissional</th>
           <th>Nome</th>
           <th>Email</th>  
           <th>Graduação</th>
           <th>Especialização</th>
           <th>Salário</th>
           <th>Disponibilidade</th>
           
           
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($prof as $prof) { ?>
        <tr>
            <td><?php echo $prof->idprof ?></td>
            
            <td><?php echo $prof->nome ?></td>
            <td><?php echo $prof->email ?></td>
            <td><?php echo $prof->graduacao ?></td>
            <td><?php echo $prof->especialidade ?></td>
            <td><?php echo $prof->salario ?></td>
            <td><?php echo $prof->disponibilidade ?></td>
            
            
            
            <td><a class="btn btn-outline-warning" href="frmprof1.php?idprof=<?php echo $prof->idprof ?>">Editar</a></td>
            <td><a class="btn btn-outline-danger" href="frmprof1.php?op=del&idprof=<?php echo  $prof->idprof ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</div>    

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


</body>