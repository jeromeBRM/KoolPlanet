<?php

session_start();

$config = require(__DIR__."/config.php");
$routes = require(__DIR__."/routes.php");
$db = require(__DIR__."/database.php");

function render($view, $data) {
	ob_start();
	require(__DIR__."/views/$view.php");
	$content = ob_get_contents();
	ob_end_clean();

	require(__DIR__."/views/template.php");
}

if(isset($_GET["action"])){
	$action = $_GET["action"];
} else {
	$action = $config["default_action"];
}

/*
list($class, $method) = explode('@', $controller);

$instance = new $class();
$instance->$method();
*/

if (file_exists(__DIR__."/controllers/$action"."Controller.php")) {
	require(__DIR__."/controllers/".$action."Controller.php");
} else {
	render($action);
}