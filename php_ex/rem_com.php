<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(!is_numeric($id)){
		header('location: /index.php');
		exit();
	}

	$c = json_decode(trim(file_get_contents('write')));

	if (!key_exists($id, $c)){
		die('There is no such index');
	}
	unset($c[$id]);
	$sc = json_encode(array_values($c));
	file_put_contents('write', $sc);

	header('location: /index.php');
}