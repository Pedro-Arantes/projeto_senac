<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblreserva";
    $qry = $con->query($sql);
    $reserva = $qry->fetchAll(PDO::FETCH_OBJ);
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
    <title>Listar Reservas</title>
</head>
<body>
    
<h1>Lista de Reservas</h1>
<hr>
<a href="frmreserva.php">Nova Reserva</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id reserva</th>
           <th>id profissional</th>
           <th>Sala</th>
           <th>Data</th>  
           <th>Hora</th>
           
           
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($reserva as $reserva) { ?>
        <tr>
            <td><?php echo $reserva->idreserva ?></td>
            <td><?php echo $reserva->idprof ?></td>
            
            <td><?php echo $reserva->sala ?></td>
            <td><?php echo $reserva->datareserva ?></td>
            <td><?php echo $reserva->horareserva ?></td>
            
            
            <td><a href="frmreserva.php?idreserva=<?php echo $reserva->idreserva ?>">Editar</a></td>
            <td><a href="frmreserva.php?op=del&idreserva=<?php echo  $reserva->idreserva ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


</body>