<html>
<div class="container">
<?php

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname1     = "logindatabase";
    $dbname2     ="feedback";        
    // Create connection
    $conn = new mysqli($servername, $username, $password);
            
    // Check connection
    if ($conn->connect_error) 
    { 
		die("<p align='center'>Connection failed:</p> " . $conn->connect_error);
    }
	else
	{
		echo("Connection Established\r\n");
	}
	
	// Create database
	$sql = "CREATE DATABASE $dbname1";
	if ($conn->query($sql) === TRUE) {
		echo "<br/>Database ".$dbname1." created successfully<br/>";
	} 
	else 
	{
		echo "<br/>Error creating database: " . $conn->error;
	}
	
	$conn->close();
	
	$conn = new mysqli($servername, $username, $password, $dbname1);
	$sql1 = "CREATE TABLE admin(
	           id BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
			   username VARCHAR(255) NOT NULL UNIQUE KEY,
			   email VARCHAR(20) NOT NULL,
			   password VARCHAR(255) NOT NULL UNIQUE KEY
		)";
		
		
		if ($conn->query($sql1) === TRUE) {
			echo "<br/> Table Admin created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	$sql2 = "CREATE TABLE adminusers(
	        id BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(255) NOT NULL,
			username VARCHAR(255) NOT NULL UNIQUE KEY,
			rollno VARCHAR(11) UNIQUE KEY NOT NULL,
			branch VARCHAR(50) NOT NULL,
			year INT(1) NOT NULL,
			section VARCHAR(1) NOT NULL,
			semester INT(1) NOT NULL,
			profession VARCHAR(20) NOT NULL,
			password VARCHAR(255) NOT NULL UNIQUE KEY,
			email VARCHAR(20) NOT NULL,
			photo LONGBLOB NOT NULL
	)";
	    if ($conn->query($sql2) === TRUE) {
			echo "<br/> Table Adminusers created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	$sql3 = "CREATE TABLE facultydetails(
	        slno BIGINT(255) AUTO_INCREMENT UNIQUE KEY ,
			facultyid VARCHAR(20) PRIMARY KEY NOT NULL,
			fullname VARCHAR(255) NOT NULL,
			email VARCHAR(100) NOT NULL,
			branch VARCHAR(50) NOT NULL,
			photo LONGBLOB NOT NULL,
			username VARCHAR(100) NOT NULL UNIQUE KEY,
			password VARCHAR(255) NOT NULL UNIQUE KEY
			
	)";
        if ($conn->query($sql3) === TRUE) {
			echo " <br/>Table Facultydetails created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	
	$sql4 = "CREATE TABLE subjects(
	        id BIGINT(255) AUTO_INCREMENT UNIQUE KEY,
			subjectid VARCHAR(20) PRIMARY KEY,
			subjectname VARCHAR(255),
			branch VARCHAR(50),
			year INT(1),
			semester VARCHAR(1)
			
	)";
        if ($conn->query($sql4) === TRUE) {
			echo "<br/> Table Subjects created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
		$sql5 = "CREATE TABLE lecturers(
	        id BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
			subjectid VARCHAR(20),
			facultyid VARCHAR(20),
			branch VARCHAR(50) NOT NULL,
			year INT(2) NOT NULL,
			section VARCHAR(1) NOT NULL,
			FOREIGN KEY(subjectid) REFERENCES subjects(subjectid) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY(facultyid) REFERENCES facultydetails(facultyid) ON DELETE CASCADE ON UPDATE CASCADE
	)";
        if ($conn->query($sql5) === TRUE) {
			echo " <br/>Table Lecturers created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	$conn->close();
	$conn = new mysqli($servername, $username, $password);
            
    // Check connection
    if ($conn->connect_error) 
    { 
		die("<p align='center'>Connection failed:</p> " . $conn->connect_error);
    }
	else
	{
		echo("<br/>Connection Established\r\n");
	}
	$sql6 = "CREATE DATABASE $dbname2";
	if ($conn->query($sql6) === TRUE) {
		echo "<br/>Database ".$dbname2." created successfully<br/>";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	
	$conn->close();
	$conn = new mysqli($servername, $username, $password, $dbname2);
	$sql7 = "CREATE TABLE faculty(
	           id BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
			   branch VARCHAR(50) NOT NULL,
			   section VARCHAR(50) NOT NULL,
			   year INT(1) NOT NULL,
			   subjectid VARCHAR(20) NOT NULL,
			   facultyid VARCHAR(20) NOT NULL,
			    q1 INT(10) NOT NULL,
				q2 INT(10) NOT NULL,
				q3 INT(10) NOT NULL,
				q4 INT(10) NOT NULL,
				q5 INT(10) NOT NULL,
				extra TEXT
		)";
		
		
		if ($conn->query($sql7) === TRUE) {
			echo "<br/> Table faculty created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	$sql8 = "CREATE TABLE infrastructure(
	           id BIGINT(255) AUTO_INCREMENT PRIMARY KEY,
			   branch VARCHAR(50) NOT NULL,
			   year INT(1) NOT NULL,
			   section VARCHAR(1) NOT NULL,
			   type VARCHAR(20) NOT NULL,
			   feedback TEXT
		)";
		
		
		if ($conn->query($sql8) === TRUE) {
			echo "<br/>Table infrastructure created successfully<br/>";
		} 
		else {
			echo "<br/>Error creating table: " . $conn->error;
		}
	$conn->close();
	$conn = new mysqli($servername, $username, $password, $dbname1);
	$pass="admin";
	$password=md5($pass);
	$sql9="INSERT INTO admin(username,email,password) VALUES('admin','admin123@gmail.com','$password')";
	if ($conn->query($sql9) === TRUE) {
		echo "<br/> Table records added successfully<br/>";
	} 
	else {
		echo "<br/>Error adding records to the table. " . $conn->error;
	}
	$conn->close();
?>
</div>
</html>