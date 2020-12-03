<?php
include 'connect.php';


//Create Tables
//login table

$sql = "CREATE TABLE `login` (
	`userid` VARCHAR(30) NOT NULL,
	`password` VARCHAR(30) NOT NULL,
	`usertype` SET('admin','student') NOT NULL DEFAULT 'student',
	PRIMARY KEY (`userid`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
    echo "Table login created successfully";
} else {
    echo "Error creating login table: " . $conn->error;
}

//student details table
$sql = "CREATE TABLE `details` (
	`username` VARCHAR(30) NOT NULL,
	`stdname` VARCHAR(100) NOT NULL,
	`regno` BIGINT(20) NOT NULL,
	`emailid` VARCHAR(100) NOT NULL,
	`mobile` BIGINT(20) NOT NULL,
	`cgpa` DECIMAL(4,2) NOT NULL,
	`xthmark` DECIMAL(5,2) NOT NULL,
	`xiithmark` DECIMAL(5,2) NOT NULL,
	`arrears` INT(11) NOT NULL,
	`placed` SET('no','yes') NULL DEFAULT 'no',
	PRIMARY KEY (`regno`),
	INDEX `username` (`username`),
	CONSTRAINT `details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`userid`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;";
if ($conn->query($sql) === TRUE) {
    echo "Table details created successfully";
} else {
    echo "Error creating details table: " . $conn->error;
}

$sql = "CREATE TABLE `message` (
	`msg` VARCHAR(500) NULL DEFAULT NULL,
	`regno` BIGINT(20) NULL DEFAULT NULL,
	`timing` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;";
if ($conn->query($sql) === TRUE) {
    echo "Table Message created successfully";
} else {
    echo "Error creating message table: " . $conn->error;
}

//add admin user
$sql = "insert into login values('admin','admin','admin')";
if ($conn->query($sql) === TRUE) {
    echo "Admin user added successfully";
} else {
    echo "Error in adding admin user: ". $conn->error;
}

$sql = null;
$conn->close();
?>