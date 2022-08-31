<?php
$conn = 'mysql:host=localhost;dbname=dbstalucia';
$user = 'root';
$pass = 'Macanudo';
try {
    $pdo = new PDO($conn, $user, $pass, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));   
} catch (PDOException $e) {
    if ($e->getCode() == 1049) {
        echo "Banco de dados selecionado é incorreto!";
    } else {        
        echo $e->getMessage();
    }        
}
?>
