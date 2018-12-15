<?php 
include 'conn.php';


$render_content = function(){
global $conn;
include 'add_contact.html';

if ($_SERVER['REQUEST_METHOD']==='POST'){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$sname = mysqli_real_escape_string($conn, $_POST['sname']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	mysqli_query($conn,
		"INSERT INTO contacts (name, sname, tel, email) 
		VALUES ('{$name}', '{$sname}', {$tel}, '{$email}')");
	$_SESSION['messages'][] = ['success', 'Contact has been added'];
	 header('location: /add_contact.php');
     exit();	
	}
};		


include 'nav.html';














 ?>