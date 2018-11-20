<?php 

require 'conn.php';

mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS contacts(
			id INT PRIMARY KEY AUTO_INCREMENT,
			name CHAR(20) NOT NULL,
			sname CHAR(20),
			numb INT UNIQUE NOT NULL,
			email CHAR(30) UNIQUE)"
);