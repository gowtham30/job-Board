<?php
session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}
error_reporting(0);

include 'connect.php';

$a = $_GET["xmark"];
$b = $_GET["xiimark"];
$c = $_GET["cgpa"];
$d = $_GET["arrear"];
$e = $_GET["placed"];
$_SESSION["xmark"] = $a;
$_SESSION["xiimark"] = $b;
$_SESSION["cgpa"] = $c;
$_SESSION["arrear"] = $d;
$_SESSION["placed"] = $e;
$sql = "SELECT * FROM details where xthmark >= {$a} and xiithmark >= {$b} and cgpa >= {$c} and arrears <= {$d} and placed in ({$e})";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$_SESSION["list"] = $result;
		echo "<table border = \"2\"><tr><th>Register Number</th><th>Name</th><th>Email-ID</th><th>Mobile</th><th>cgpa</th><th>12th mark</th><th>10thmark</th><th>Arrears</th><th>Placed</th></tr>"; 
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["regno"]."</td><td>".$row["stdname"]."</td><td>".$row["emailid"]."</td><td>".$row["mobile"]."</td><td>".$row["cgpa"]."</td><td>".$row["xiithmark"]."</td><td>".$row["xthmark"]."</td><td>".$row["arrears"]."</td><td>".$row["placed"]."</td></tr>";
    }
	echo "</table>";
	echo "<br/><br/>Send message to these students <br/> <br/>";
	echo "<form method = \"POST\" action = \"listmsg.php\"><textarea name = \"msg\" rows = \"10\" cols = \"50\" maxlength=\"475\" placeholder = \"Enter your message here\"></textarea><br/><br/><input type = \"submit\" value = \"Send Message\"/></form>";
} else {
    echo "Fetching Failed";
}
$conn->close();
?>