<?php
include("conn.php");

$nome = "";
$email = "";
$telefone = "";
$endereco = "";

$errorMessage = "";

//Verifica se os dados foram preenchidos e que nenhum campo está vazio;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    do {
        if (empty($nome) || empty($email) || empty($telefone) || empty($endereco)) {
            $errorMessage = "Por favor, Preencha todos os Campos";
            break;
        }

        //adiciona o usuario no banco
        $sql = "INSERT INTO usuario (nome,email,telefone,endereco)" .
            "VALUES ('$nome', '$email', '$telefone', '$endereco')";

        $result = $connection->query($sql);

        $nome = "";
        $email = "";
        $telefone = "";
        $endereco = "";

        header("location: /project/index.php");
        exit;
    } while (false);
}
