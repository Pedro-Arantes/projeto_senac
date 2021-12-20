<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblservico";
    $qry = $con->query($sql);
    $servico = $qry->fetchAll(PDO::FETCH_OBJ);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Listar Serviços</title>
</head>
<body>

<div class="container">
<h1>Lista de Serviços</h1>
<hr>
<a class="btn btn-outline-success"href="frmservico.php">Novo Serviço</a>
<a  class="btn btn-outline-secondary" href="logar/administrador.php">home</a>
<hr>
<table class="table table-dark table-striped">
    <thead>
        <tr>
           <th>id serviço</th>
           <th>Tipo</th>
           <th>Exame</th>  
           
           
           
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($servico as $servico) { ?>
        <tr>
            <td><?php echo $servico->idservico ?></td>
            
            <td><?php echo $servico->tipo ?></td>
            <td><?php echo $servico->exame ?></td>
            
            
            
            <td><a class="btn btn-outline-warning" href="frmservico.php?idservico=<?php echo $servico->idservico ?>">Editar</a></td>
            <td><a class="btn btn-outline-danger" href="frmservico.php?op=del&idservico=<?php echo  $servico->idservico ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
    

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


