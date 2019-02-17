<?php 
include 'conn.php';

$render_content = function(){
global $conn;
 $cont_id = $_GET['cont_id'];

    $detail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contacts WHERE id = '{$cont_id}'"));
    
    $tels = mysqli_query($conn, "SELECT phones.contact_id, phones.tel FROM phones WHERE phones.contact_id = '{$cont_id}'");
    $tel = mysqli_fetch_assoc($tels);

	
		include 'detail_contact.html';

	
	
	 	
};		
         


include 'nav.html';




 ?>