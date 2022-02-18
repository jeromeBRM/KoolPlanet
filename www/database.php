<?php

try{
	$db = new PDO('sqlite:'.__DIR__.'/db/'.$config["database"]);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}
catch (\PDOException $e){
	echo $e->getMessage();
	exit(1);
}