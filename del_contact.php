<?php 
include 'conn.php';

if(isset($_GET['cont_id'])){   
        $cont_id = $_GET['cont_id'];
        $query = ["DELETE FROM contacts WHERE id = '{$cont_id}'", 
        		  "DELETE FROM phones WHERE contact_id = '{$cont_id}'"];

        for($i = 0; $i < 2; $i++){
	        mysqli_query($conn, $query[$i]);
        };
      
        $_SESSION['messages'][] = ['success', 'Contact has been deleted'];
        header('location: /search.php');
        exit();
    };
    







 ?>