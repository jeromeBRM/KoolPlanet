<?php

session_start();

$pdo = new PDO('sqlite:'.__DIR__.'/db/main.sqlite');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function render($view) {
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

require("controllers/".$action."Controller.php");