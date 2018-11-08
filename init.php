<?php
session_start();
$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');
$users = isset($_SESSION['users']) ? $_SESSION['users'] : NULL;





// $categories = mysqli_query($conn, "SELECT * FROM categories");
