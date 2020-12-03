<?php
include 'connect.php';

$a = stripslashes($_POST["username"]);
$b = stripslashes($_POST["password"]);
$c = stripslashes($_POST["studname"]);
$d = stripslashes($_POST["regno"]);
$e = stripslashes($_POST["email"]);
$f = stripslashes($_POST["mobile"]);
$g = stripslashes($_POST["cgpa"]);
$h = stripslashes($_POST["xthmark"]);
$i = stripslashes($_POST["xiithmark"]);
$j = stripslashes($_POST["arrears"]);

$a = $conn->real_escape_string($a);
$b = $conn->real_escape_string($b);
$c = $conn->real_escape_string($c);
$d = $conn->real_escape_string($d);
$e = $conn->real_escape_string($e);
$f = $conn->real_escape_string($f);
$g = $conn->real_escape_string($g);
$h = $conn->real_escape_string($h);
$i = $conn->real_escape_string($i);
$j = $conn->real_escape_string($j);

$sql = "insert into login values('{$a}','{$b}','student')";
$sql2="insert into details values ('{$a}','{$c}',{$d},'{$e}',{$f},{$g},{$h},{$i},{$j},'no')";
if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
	header( "refresh:1;url=index.html" );
    echo "Created account successfully.";
} 
else {
	header( "refresh:2;url=register.html" );
	echo "Error creating account: ".$conn->error;
}
$conn->close();
?>