<?php

$result = "";

if (isset($_SESSION["login"])) {
    session_unset();
    $result = "Vous êtes déconnecté.";
}

render("login", ["result" => $result]);