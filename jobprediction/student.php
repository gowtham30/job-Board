<?php
session_start();
if(!($_SESSION["type"]=='student'))
{
header('location:logout.php');
}

include 'connect.php';

?>
<!Doctype html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class = "box"><h1>Placement portal</h1>
</div>
<div>
<nav >
	<ul>
		<li><x> Welcome : <?php echo $_SESSION["user"]?> </x></li>
		<li><x>Actions :</x></li>
		<li><a href="student.php">Home</a></li>
		<li><a href="studfrmup.php">Update Details</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>
</div>
<br/><br/>
Messages
<br/><br/><br/>
<table border = "2">
<tr><th>Message</th><th>Timestamp</th></tr>
<?php
$sql = "SELECT * FROM details where username = '{$_SESSION["user"]}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$regn = $row["regno"];
$_SESSION["reg"]=$regn;
$sql = "SELECT * FROM message where regno in ({$regn},-11) ORDER BY timing DESC";
$result = $conn->query($sql);

if ($result != null && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["msg"]."</td><td>".$row["timing"]."</td></tr>";
    }
} else {
    echo "<tr><td>No messages</td><td>Not available</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>