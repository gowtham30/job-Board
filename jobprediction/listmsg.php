<?php
session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}

include 'connect.php';

$a = $_SESSION["xmark"];
$b = $_SESSION["xiimark"];
$c = $_SESSION["cgpa"];
$d = $_SESSION["arrear"];
$e = $_SESSION["placed"];
$sql = "SELECT * FROM details where xthmark >= {$a} and xiithmark >= {$b} and cgpa >= {$c} and arrears <= {$d} and placed in ({$e})";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$i = $result->num_rows;
 do{
       $sql = "insert into message (msg,regno) VALUES('{$_POST["msg"]}',{$row["regno"]})";
	   $conn->query($sql);
	   $i=$i-1;
	   $row = $result->fetch_assoc();
    }while($i>0);
if (!($conn->error)) {
	header("refresh:1;url=filter.php");
    echo "Messages sent successfully";
} else {
	header("refresh:1;url=filter.php");
    echo "Error sending messages: " . $conn->error;
}

$conn->close();

?>