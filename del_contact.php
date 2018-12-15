<?php 
include 'conn.php';

if(isset($_GET['cont_id'])){   
        $cont_id = $_GET['cont_id'];
        mysqli_query($conn, "DELETE FROM contacts WHERE id = {$cont_id}");
        $_SESSION['messages'][] = ['success', 'Contact has been deleted'];
        header('location: /search.php');
        exit();
    };
    







 ?>