<?php
include("conn.php");
//include("edit.php");

$id = "";
$nome = "";
$email = "";
$telefone = "";
$endereco = "";

$errorMessage = "";

//Consulta e mostra os dados do usuário em seus respectivos campos;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET['id'])) {
        header("location: /project/index.php");
        exit;
    }

    $id = $_GET["id"];

    //Seleciona os dados do usuario no banco
    $sql = "SELECT * FROM usuario WHERE ID=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:/project/index.php");
        exit;
    }

    $nome = $row['nome'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $endereco = $row['endereco'];
} else {

    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    //verifica se há campos vazios
    do {
        if (empty($nome) || empty($email) || empty($telefone) || empty($endereco)) {
            $errorMessage = "Por favor, Preencha todos os Campos";
            break;
        }

        //realiza a edição dos dados no banco
        $sql = "UPDATE usuario " .
            "SET nome ='$nome', email='$email', telefone='$telefone', endereco = '$endereco' " .
            "WHERE ID = $id";

        $result = $connection->query($sql);

        header("location: /project/index.php");
        exit;
    } while (false);
}
