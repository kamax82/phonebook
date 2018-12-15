<?php 
include 'conn.php';

$render_content = function(){
global $conn;
include 'search_contact.html';
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
      
      };
    };
};      

   
   
include 'nav.html';