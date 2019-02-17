<?php 
include 'conn.php';

$render_content = function(){
global $conn;
include 'search_contact.html';
        if(isset($_REQUEST['search'])){
        $search_request = $_POST['search'];
        
        $search_results = mysqli_query($conn, 
                "SELECT contacts.id, contacts.name, contacts.sname, contacts.email, phones.contact_id, phones.tel
                FROM contacts  
                LEFT JOIN phones
                ON contacts.id = phones.contact_id
                WHERE contacts.name LIKE '%$search_request%' 
                OR contacts.sname LIKE '%$search_request%'
                OR contacts.email LIKE '%$search_request%'
                OR phones.tel LIKE '%$search_request%'
                GROUP BY contacts.name");
           
            foreach($search_results as $search_result) {
                include 'searchlist.html';
            };
        };
  
};      


include 'nav.html';