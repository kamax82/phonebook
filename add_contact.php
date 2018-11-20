<?php 
require 'nav.html';
require 'add_contact.html';


require 'conn.php';

if ($_SERVER['REQUEST_METHOD']==='POST'){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$sname = mysqli_real_escape_string($conn, $_POST['sname']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	mysqli_query($conn,
		"INSERT INTO contacts (name, sname, tel, email) 
		VALUES ('{$name}', '{$sname}', {$tel}, '{$email}')");
	}
	 	
		
















 ?>