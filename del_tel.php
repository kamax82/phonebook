<?php 
include 'conn.php';
$tel_id = $_GET['tel_id'];
mysqli_query($conn, "DELETE FROM phones WHERE id = '{$tel_id}'");
var_dump($tel_id);
var_dump(mysqli_error($conn));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>