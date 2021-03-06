<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblconsulta";
    $qry = $con->query($sql);
    $consulta = $qry->fetchAll(PDO::FETCH_OBJ);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Listar Vendas</title>
</head>
<body>
    
<h1>Lista de Consultas</h1>
<hr>
<a href="frmconsulta.php">Nova Consulta</a>
<a  class="btn btn-outline-secondary" href="logar/administrador.php">home</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id consulta</th>
           <th>Data da Consulta</th>
           <th>Hora da Consulta</th>  
           <th>id do paciente</th>
           <th>id do profissional</th>
           <th>id do Serviço</th>
           
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($consulta as $consulta) { ?>
        <tr>
            <td><?php echo $consulta->idconsulta ?></td>
            <td><?php echo date ("d,m,y",strtotime($consulta->dataconsulta)) ?></td>
            <td><?php echo $consulta->horaconsulta ?></td>
            <td><?php echo $consulta->idpaciente ?></td>
            <td><?php echo $consulta->idprof ?></td>
            <td><?php echo $consulta->idservico ?></td>
            <td><a href="frmconsulta.php?idconsulta=<?php echo $consulta->idconsulta ?>">Editar</a></td>
            <td><a href="frmconsulta.php?op=del&idconsulta=<?php echo  $consulta->idconsulta ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>