<?php 

$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');

$categories = mysqli_query($conn, "SELECT * FROM categories");
$posts = mysqli_query($conn, "SELECT title, content, categories.name as category 
						FROM posts JOIN categories ON categories.id = post.category_id
						ORDER BY posts.id DESC LIMIT 10");


$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');

if ($_SERVER['REQUEST_METHOD']==='POST'){
	$title = addslashes($_POST['title']);
	$content = addslashes($_POST['content']);
	$category_id = (int)$_POST['category_id'];

	mysqli_query($conn, "INSERT INTO posts(title, content, category_id)
						VALUES ('{$title}', '{$content}', {$category_id})");
	if (!mysqli_error($conn)) {
		header('location: /index.php');
		exit();
	}
	echo mysqli_error($conn);
}


include '_header.html';


include '_post_form.html';
include '_newest_posts.html';

include '_footer.html';
?>



 