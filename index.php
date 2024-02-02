<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Usuários</h2>
        <a class="btn btn-primary" href="/project/create.php">Novo Usuário</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>

                <?php
                include 'conn.php';

                //Seleção de todos os itens da tabela "usuario"
                $sql = "SELECT * FROM usuario";
                $result = $connection->query($sql);

                if (!$result) {
                    die("An error has occour while executing this query" . $connection->error);
                }

                //Preenche a tabela com os dados da consulta
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[ID]</td>
                        <td>$row[nome]</td>
                        <td>$row[email]</td>
                        <td>$row[telefone]</td>
                        <td>$row[endereco]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/project/edit.php?id=$row[ID]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='/project/delete.php?id=$row[ID]'>Deletar</a>
                        </td>
                    </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>