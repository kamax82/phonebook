<?php 
include 'conn.php';

$render_content = function(){
global $conn;
 $cont_id = $_GET['cont_id'];

    $prefilled = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contacts WHERE id = {$cont_id}"));
	include 'edit_contact.html';
	
	if ($_SERVER['REQUEST_METHOD']==='POST'){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$sname = mysqli_real_escape_string($conn, $_POST['sname']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

  	   	mysqli_query($conn,
		"UPDATE contacts SET name = '{$name}', sname = '{$sname}', tel = '{$tel}', email = '{$email}' 
		WHERE contacts.id = {$cont_id}");
		$_SESSION['messages'][] = ['success', 'Contact has been updated'];
		unset($_SESSION['cont_id']);
		header('location: /search.php');
        exit();
	}
	 	
};		
         






        //     if(isset($_GET['edit_cont'])){  
        // $cont_id = $_GET['cont_id'];
        // $prefilled = mysqli_query($conn, "SELECT * FROM contacts WHERE id = {$cont_id}");
        // foreach ($prefilled as $edit) {
        //     include 'searchlist.html';
        // include 'add_contact.html';
        // };
        // // return $prefilled;
        // var_dump( $prefilled);
        // };
    
      



include 'nav.html';














 ?>