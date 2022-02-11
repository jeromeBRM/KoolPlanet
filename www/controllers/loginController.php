<?php
/*if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit(1);
}*/
if (!isset($_POST["login"]) || !isset($_POST["password"]))


$sql = $pdo->query(" SELECT DISTINCT Login FROM User WHERE Login = login;");
$login = $sql->fetch();

$data = array (
    "connected" => false,
    "login" => "",
    "password" => ""
);

render("login", $data);