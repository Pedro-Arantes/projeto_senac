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
    <title>Listar Vendas</title>
</head>
<body>
    
<h1>Lista de Consultas</h1>
<hr>
<a href="frmconsulta.php">Nova Consulta</a>
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