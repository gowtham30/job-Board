<?php
session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}

include 'connect.php';

$e = stripslashes($_POST["email"]);
$f = stripslashes($_POST["mobile"]);
$g = stripslashes($_POST["cgpa"]);
$h = stripslashes($_POST["xthmark"]);
$i = stripslashes($_POST["xiithmark"]);
$j = stripslashes($_POST["arrears"]);
$k = stripslashes($_POST["placed"]);


$e = $conn->real_escape_string($e);
$f = $conn->real_escape_string($f);
$g = $conn->real_escape_string($g);
$h = $conn->real_escape_string($h);
$i = $conn->real_escape_string($i);
$j = $conn->real_escape_string($j);
$k = $conn->real_escape_string($k);

$sql = "update details set emailid = '{$e}', mobile = {$f}, cgpa = {$g}, xthmark = {$h}, xiithmark = {$i}, arrears = {$j}, placed = '{$k}' where regno = {$_SESSION["spl"]}";
if ($conn->query($sql) === TRUE) {
	header( "refresh:2;url=edit.php" );
    echo "Details updated successfully";
} 
else {
	header( "refresh:2;url=adminfrmup.php" );
	echo "Error in updating details: ".$conn->error;
}
$conn->close();
?>