<?php
include("conn.php");

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM usuario WHERE id = $id";
    $connection->query($sql);
}

header("location:/project/index.php");
exit;
