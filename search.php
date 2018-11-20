<?php 
require 'nav.html';
require 'search_contact.html';
require 'conn.php';

if(isset($_REQUEST['search'])){
	
    $search_request = $_POST['search'];

   	$result = mysqli_query($conn,
   			"SELECT *
             FROM contacts 
             WHERE name LIKE '%$search_request%'
             OR sname LIKE '%$search_request%'
             OR tel LIKE '%$search_request%'
             OR email LIKE '%$search_request%'"
   			);
  	    foreach ($result as $search_result) {
 		include 'searchlist.html';
 	}
		
}

if(isset($_REQUEST['delete_cont'])) {

$cont_id_del = ($_POST['id']);
$del = ysqli_query($conn, 
	"DELETE FROM contacts WHERE contacts.id = 'id'" );
}


       











	

















 ?>