<?php
include 'connect.php';
//sql injection protection
$myusername = stripslashes($_POST["uid"]);
$mypassword = stripslashes($_POST["pwd"]);
$myusername = $conn->real_escape_string($myusername);
$mypassword = $conn->real_escape_string($mypassword);

$sql="select * from login WHERE userid = '{$myusername}' and password='{$mypassword}'";

$result = $conn->query($sql);
$conn->close();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	session_start();
	$_SESSION["user"]=$row["userid"];
	$_SESSION["type"]=$row["usertype"];
    if($row["usertype"]=="admin"){
		header('Location:admin.php');
	}
	else{
	header('Location:student.php');
	}
	$result->close();
} 
else {
	header( "refresh:1;url=index.html" );
	session_start();
	session_destroy();
	echo "<script type=\"text/javascript\">"."window.alert('Invalid username and/or password');"."top.location = 'index.html';"."</script>";
	$result->close();
}
?>