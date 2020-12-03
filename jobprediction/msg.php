<?php
session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}

include 'connect.php';

$sql = "insert into message (msg,regno) VALUES('{$_POST["msg"]}',-11)";
if ($conn->query($sql) === TRUE) {
header("refresh:1;url=admin.php");
    echo "Message sent successfully";
} else {
		header("refresh:1;url=admin.php");
    echo "Error sending message: " . $conn->error;
}

?>