<?php
include "connect.php";
session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}?>
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
Select a student
<br/><br/>


<?php
$sql = "SELECT * FROM details";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<form action = \"adminfrmup.php\" method = \"POST\">";
echo "<select name = \"reg\">";
    // output data of each row
	while($row = $result->fetch_assoc()) {
	   echo "<option value = \"".$row["regno"]."\">".$row["stdname"]."</option>";
    }
echo "</select><input type = \"submit\" value = \"Update\"/></form>";
}
else
echo "No data found";	
?>
<br/><br/>
</body>

</html>
<?php 
$conn->close();
?>