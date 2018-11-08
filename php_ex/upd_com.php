!	

<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(!is_numeric($id)){
		header('location: /index.php');
		exit();
	}

	$c = json_decode(trim(file_get_contents('write')));

	if (!key_exists($id, $c)){
		die('There is no such index');
	}
	$comment = $c[$id];
	
	if ($_SERVER['REQUEST_METHOD']==='POST'){
		$comment = [$_POST['name'], $_POST['value']];
		$c[$id] = $comment;
		$sc = json_encode($c);
	file_put_contents('write', $sc);
	header("location: /index.php");
	exit();
	}
}
?>
<form method="POST">
	<input required type="text" name="name" placeholder="username" value="<?= $comment[0]?>"><br>
	<textarea required type="text" name="value"><?= $comment[1]?></textarea>
	<input type="submit" value="Save">
</form>