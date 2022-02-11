<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
}
if (!isset($_POST["login"] || !isset($_POST["password"])))

$data = array (
    "connected" => false,
    "login" => "",
    "password" => ""
);

// 1 ere requete sql qui cherche l'uilisateur login

// SELECT DISTINCT Login FROM User WHERE Login = login;


render("login", $data);