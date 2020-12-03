<?php
session_start();
if(!($_SESSION["type"]=='student'))
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


$e = $conn->real_escape_string($e);
$f = $conn->real_escape_string($f);
$g = $conn->real_escape_string($g);
$h = $conn->real_escape_string($h);
$i = $conn->real_escape_string($i);
$j = $conn->real_escape_string($j);

$sql = "update details set emailid = '{$e}', mobile = {$f}, cgpa = {$g}, xthmark = {$h}, xiithmark = {$i}, arrears = {$j} where regno = {$_SESSION["reg"]}";
if ($conn->query($sql) === TRUE) {
	header( "refresh:2;url=studfrmup.php" );
    echo "Details updated successfully";
} 
else {
	header( "refresh:2;url=studfrmup.php" );
	echo "Error in updating details: ".$conn->error;
}
$conn->close();
?>