<?php 

include 'conn.php';

mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS contacts(
			id INT PRIMARY KEY AUTO_INCREMENT,
			name CHAR(20) NOT NULL,
			sname CHAR(20),
			numb INT UNIQUE NOT NULL,
			email CHAR(30) UNIQUE)"
);


mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS users(
			id INT PRIMARY KEY AUTO_INCREMENT,
			name CHAR(20) UNIQUE NOT NULL,
			pass CHAR(60) NOT NULL,
			is_admin BOOLEAN DEFAULT 0)"
);