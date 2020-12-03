<?php
session_start();
if(!($_SESSION["type"]=='admin'))
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
		<li><a href="admin.php">Home</a></li>
		<li><a href="filter.php">Filter Students</a></li>
		<li><a href="edit.php">Edit Students details</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>
</div>
<br/><br/>
Students list
<br/><br/><br/>
<?php
$sql = "SELECT * FROM details";
$result = $conn->query($sql);
if ($result != null && $result->num_rows > 0) {
    // output data of each row
	echo "<table border = \"2\"><tr><th>Register Number</th><th>Name</th><th>Email-ID</th><th>Mobile</th><th>cgpa</th><th>12th mark</th><th>10thmark</th><th>Arrears</th><th>Placed</th></tr>"; 
    while($row = $result->fetch_assoc()) {
	   echo "<tr><td>".$row["regno"]."</td><td>".$row["stdname"]."</td><td>".$row["emailid"]."</td><td>".$row["mobile"]."</td><td>".$row["cgpa"]."</td><td>".$row["xiithmark"]."</td><td>".$row["xthmark"]."</td><td>".$row["arrears"]."</td><td>".$row["placed"]."</td></tr>";
    }
	echo "</table>";
} else {
    echo "No data available";
}
$conn->close();
?>
<br/>
<br/>
Send Message to all students
<br/>
<br/>
<form method = "POST" action = "msg.php">
<textarea name = "msg" rows = "10" cols = "50" maxlength="475" placeholder = "Enter your message here"></textarea><br/>
<br/>
<input type = "submit" value = "Send Message"/>
</form>

</body>
</html>