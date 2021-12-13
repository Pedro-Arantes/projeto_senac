<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "bdclinimax";

try {
    $con = new PDO("mysql:host=$localhost;dbname=$db",$username,$password);
    //debugar-descobrir o q esta sendo respondido.
} catch (PDOException $e) {
    echo "Conexao falhou:<br>".$e->getMessage();
}