<?php

session_start();
if(!($_SESSION["type"]=='admin'))
{
header('location:logout.php');
}

include 'connect.php';

$regno = $_POST["reg"];
$_SESSION["spl"] = $regno;

$sql="select * from details WHERE regno = {$regno}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


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
<fieldset style = "width: 60%;">
	<legend>Update Details</legend>
	<form action = "adminup.php" method = "POST">
		<pre>Email    :</pre><input class = "tbox" type = "text" name = "email" placeholder = "Enter the new E-mail ID" value = "<?php echo $row["emailid"]?>" required/><br/><br/>
		<pre>Mobile   :</pre><input class = "tbox" type = "text" name = "mobile" placeholder = "Enter the new Mobile Number" value = "<?php echo $row["mobile"]?>" required/><br/><br/>
		<pre>CGPA     :</pre><input class = "tbox" type = "text" name = "cgpa" placeholder = "Enter the new CGPA" value = "<?php echo $row["cgpa"]?>" required/><br/><br/>
		<pre>10th mark:</pre><input class = "tbox" type = "text" name = "xthmark" placeholder = "Enter the new 10th mark percentage upto 2 decimals" value = "<?php echo $row["xthmark"]?>" required/><br/><br/>
		<pre>12th mark:</pre><input class = "tbox" type = "text" name = "xiithmark" placeholder = "Enter the new 12th mark percentage upto 2 decimals" value = "<?php echo $row["xiithmark"]?>" required/><br/><br/>
		<pre>Arrears  :</pre><input class = "tbox" type = "text" name = "arrears" placeholder = "Enter the new arrear count or 0 if no arrears" value = "<?php echo $row["arrears"]?>" required/><br/><br/>
		<pre>Placed   :</pre><input class = "tbox" type = "text" name = "placed" value = "<?php echo $row["placed"]?>" list="placedip" required/><br/><br/>
		<datalist id="placedip"><option value="yes"><option value="no"></datalist> 
		<input type = "submit" value = "update"/>
	</form>
</fieldset>
</body>
</html>	