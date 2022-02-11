<?php

session_start();

try{
	$pdo = new PDO('sqlite:'.__DIR__.'/db/main.sqlite');
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}
catch (\PDOException $e){
	echo $e->getMessage();
	exit(1);
}

function render($view, $data) {
	ob_start();
	require("views/$view.php");
	$content = ob_get_contents();
	ob_end_clean();

	require("views/template.php");
}

if(isset($_GET["action"])){
	$action = $_GET["action"];
} else {
	$action = "home";
}

$data["pdo"] = $pdo;
$data["login_message"] = isset($_SESSION["login"]) ? "Vous êtes connecté(e) sur le compte de " . $_SESSION["login"] . "." : "";

require("controllers/".$action."Controller.php");