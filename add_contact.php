<?php 
include 'conn.php';

$render_content = function(){
global $conn;
include 'add_contact.html';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = $_POST['name'];
	$sname = $_POST['sname'];
	$email = $_POST['email'];

	mysqli_query($conn,
		"INSERT INTO contacts (name, sname, email)
		VALUES ('{$name}', '{$sname}', '{$email}')");

	$id = mysqli_fetch_assoc(mysqli_query($conn,
		"SELECT MAX(id) FROM contacts"))['MAX(id)'];

	$tels = $_POST['tel'];
	$tel = $tels[0];

	mysqli_query($conn,
			"INSERT INTO phones (contact_id, tel, main)
			VALUES ('{$id}', '{$tel}', 1)");
	
	unset($tels[0]);
	
	foreach($tels as $tel){
			mysqli_query($conn,
			"INSERT INTO phones (contact_id, tel, main)
			VALUES ('{$id}', '{$tel}', 0)");
	};

	$_SESSION['messages'][] = ['success', 'Contact has been added'];
	 header('location: /add_contact.php');
     exit();	
	}

};		

include 'nav.html';














 ?>