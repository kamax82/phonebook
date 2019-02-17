<?php 
include 'conn.php';

$render_content = function(){
global $conn;
 $cont_id = $_GET['cont_id'];

    $prefilled = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contacts WHERE id = '{$cont_id}'"));
    
    $pre_tel_main = mysqli_fetch_assoc(mysqli_query($conn, "SELECT contact_id, tel FROM phones WHERE contact_id = '{$cont_id}' AND main = 1"));
    $pre_tels = mysqli_query($conn, "SELECT id, contact_id, tel FROM phones WHERE contact_id = '{$cont_id}'  AND main = 0");
	$pre_tel = mysqli_fetch_assoc($pre_tels);
	
	include 'edit_contact.html';
	


	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = $_POST['name'];
	$sname = $_POST['sname'];
	$email = $_POST['email'];

	mysqli_query($conn,
		"UPDATE contacts SET name = '{$name}', sname = '{$sname}', email = '{$email}'
		WHERE id = '{$cont_id}'");

	$pre_tels = $_POST['tel'];
	
	$phones_id = mysqli_query($conn, "SELECT id FROM phones WHERE contact_id = '{$cont_id}'");
		foreach($phones_id as $id){
			$pid[]=$id['id'];
		}

	if(count($pid) < count($pre_tels)){
		$chunk = count($pid);
		$pre_tels_chunk = array_chunk($pre_tels, $chunk);
		$pre_tels_orig = $pre_tels_chunk[0];
		for($i = 0; $i < $chunk; $i++){
			unset($pre_tels[$i]);
		};

		$pid_tel = array_combine($pid, $pre_tels_orig);
	
			foreach($pid_tel as $key => $value){
				mysqli_query($conn,
				"UPDATE phones SET tel = '{$value}'
				WHERE id = '{$key}'");
			}
		
			foreach($pre_tels as $pre_tel){
				mysqli_query($conn,
				"INSERT INTO phones (contact_id, tel, main)
				VALUES ('{$cont_id}', '{$pre_tel}', 0)");
			}

	};

		$_SESSION['messages'][] = ['success', 'Contact has been updated'];
		unset($_SESSION['cont_id']);
		header('location: /search.php');
        exit();
	};
	 	
};		
         
include 'nav.html';

?>