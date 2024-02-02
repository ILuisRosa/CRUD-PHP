<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Falha na Conecção" . $connection->connect_error);
}
