<?php 

function handle_user_request(){
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['password'])){
		return [
		'name' => $_POST ['name'],
		'pass' => $_POST ['password']
		];
	}
	return NULL;
}

function register_user($user_array){
	global $conn;
	$name = $user_array['name'];
	$is_admin = $name === 'admin' ? 1 : 0;
	$pass = password_hash($user_array['pass'], PASSWORD_DEFAULT);

	mysqli_query($conn,
		"INSERT INTO users (name, pass, is_admin) VALUES ('{$name}', '{$pass}', {$is_admin})");
	if (!mysqli_error($conn)) {
		login_user([
			'name' => $name,
			'pass' => $user_array ['pass']	
		]);

	}else{
		echo mysqli_error($conn);
	}
}




function login_user($user_array){
	global $conn;
	$name = $_POST['name'];
	$user = mysqli_fetch_assoc(mysqli_query($conn,	"SELECT * FROM users WHERE name ='{$user_array['name']}'"));
	$corr_user = mysqli_fetch_assoc(mysqli_query($conn,	"SELECT name FROM users WHERE name ='$name'"));
	
	if ($name == $corr_user['name']) {
		if ($_SESSION['attempts']<3){
			if(password_verify($user_array['pass'], $user['pass'])){ 
			$_SESSION['messages'][] = ['success', 'You are loged in'];
			unset($user['pass']);
			$_SESSION['user'] = $user;
			end_and_home();
			}else{
				$_SESSION['messages'][] = ['danger', 'Incorrect password'];	
				$_SESSION['attempts']++;
			}
		}
		elseif($_POST['code'] == $_SESSION['code']){
			if(password_verify($user_array['pass'], $user['pass'])){
				$_SESSION['messages'][] = ['success', 'You are loged in'];
				unset($user['pass']);
				$_SESSION['user'] = $user;
				end_and_home();
			}else{
				$_SESSION['messages'][] = ['danger', 'Incorrect password'];	
			}

		}else{
				$_SESSION['messages'][] = ['danger', 'Incorrect captcha'];	
			}
	}else{
				$_SESSION['messages'][] = ['danger', 'User does not exist' ];	
				$_SESSION['attempts']++;
			}
}



function logout_user(){
	unset($_SESSION['user']);
	$_SESSION['messages'][] = ['success', 'You are loged out'];
	$_SESSION['attempts']=0;
	header('location: /login.php');
	exit();
}


function only_for_admin(){
	global $user;
	if (!$user || !$user['is_admin']) {
		$_SESSION['messages'][] = ['danger', 'Only adnins allowed'];
		end_and_home();
	}

}

function end_and_home(){
	header('location: /index.php');
	exit();

}













// function get_name_from_post(){
// 	if (isset($_POST['name'])) {
// 		return $_POST['name'];
// 	}
// 	return NULL;
// }


// function save_category($name){
// 	global $conn;
// 	mysqli_query($conn, "INSERT INTO categories(name) VALUES('{$name}')");
// 		if(mysqli_error($conn)){
// 			$_SESSION['messages'][] = ['warning', "Category '{$name}' already exists"];
// 		}else{
// 			$_SESSION['messages'][] = ['success', "Category '{$name}' has been created"];
// 		}	
// 		header('location:' . $_SERVER['REQUEST_URI']);
// 		exit();
// 	}

// function save_maker($name){
// 	global $conn;
// 	mysqli_query($conn, "INSERT INTO makers(name) VALUES('{$name}')");
// 		if(mysqli_error($conn)){
// 			$_SESSION['messages'][] = ['warning', "Makers '{$name}' already exists"];
// 		}else{
// 			$_SESSION['messages'][] = ['success', "Makers '{$name}' has been created"];
// 		}	
// 		header('location:' . $_SERVER['REQUEST_URI']);
// 		exit();
// 	}

// function get_item_from_post(){
// 	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// 		foreach (['model', 'category', 'maker'] as $var) {
// 			if (isset($_POST[$var])) {
// 				$$var = $_POST[$var];
// 			}else{
// 				$$var = NULL;
// 			}
// 		}
// 		if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
// 			$destination = '/public/'. time(). '.png';
// 			move_uploaded_file($_FILES['image']['tmp_name'], '..' . $destination);
// 		}else{
// 			$destination = NULL;
// 		}
// 		return[
// 			'model' => $model,
// 			'category' => $category,
// 			'maker' => $maker,
// 			'image_path' => $destination
// 		];
// 	}
// }


// function save_item($item){
// 	var_dump($item);
// }

 ?>