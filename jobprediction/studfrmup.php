<?php

session_start();
if(!($_SESSION["type"]=='student'))
{
header('location:logout.php');
}

include 'connect.php';

$sql="select * from details WHERE regno = {$_SESSION["reg"]}";
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
		<li><a href="student.php">Home</a></li>
		<li><a href="studfrmup.php">Update Details</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>
</div>
<fieldset style = "width: 60%;">
	<legend>Update Details</legend>
	<form action = "studup.php" method = "POST">
		<pre>Email    :</pre><input class = "tbox" type = "text" name = "email" placeholder = "Enter your new E-mail ID" value = "<?php echo $row["emailid"]?>" required/><br/><br/>
		<pre>Mobile   :</pre><input class = "tbox" type = "text" name = "mobile" placeholder = "Enter your new Mobile Number" value = "<?php echo $row["mobile"]?>" required/><br/><br/>
		<pre>CGPA     :</pre><input class = "tbox" type = "text" name = "cgpa" placeholder = "Enter your new CGPA" value = "<?php echo $row["cgpa"]?>" required/><br/><br/>
		<pre>10th mark:</pre><input class = "tbox" type = "text" name = "xthmark" placeholder = "Enter your new 10th mark percentage upto 2 decimals" value = "<?php echo $row["xthmark"]?>" required/><br/><br/>
		<pre>12th mark:</pre><input class = "tbox" type = "text" name = "xiithmark" placeholder = "Enter your new 12th mark percentage upto 2 decimals" value = "<?php echo $row["xiithmark"]?>" required/><br/><br/>
		<pre>Arrears  :</pre><input class = "tbox" type = "text" name = "arrears" placeholder = "Enter your new arrear count or 0 if no arrears" value = "<?php echo $row["arrears"]?>" required/><br/><br/>
		<input type = "submit" value = "update"/>
	</form>
</fieldset>
</body>
</html>	