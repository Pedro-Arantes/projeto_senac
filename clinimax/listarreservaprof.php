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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Listar Reservas</title>
</head>
<body>
<div class="container">
<h1>Lista de Reservas</h1>
<hr>
<a class="btn btn-outline-success" href="frmreservaprof.php">Nova Reserva</a>
<a  class="btn btn-outline-secondary" href="logar/prof.php">home</a>
<hr>
<table class="table table-dark table-striped">
    <thead>
        <tr>
           <th>id reserva</th>
           <th>id profissional</th>
           <th>Sala</th>
           <th>Data</th>  
           <th>Hora</th>
           
           
           
           
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