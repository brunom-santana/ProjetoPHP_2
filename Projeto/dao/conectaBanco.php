<?php
$servername = "localhost";
$username = "root";
$password = "7282";
$dbname = "projeto";

$sql = new mysqli($servername, $username, $password, $dbname);

if ($sql->connect_error) {
    die("Conexão falhou: " . $sql->connect_error);
}
?>