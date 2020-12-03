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

<script type = "text/javascript">
function myfun()
   {
   var a = document.getElementById("xmark").value;
   var b = document.getElementById("xiimark").value;
   var c = document.getElementById("cgpa").value;
   var d = document.getElementById("arrear").value;
   var e = document.getElementById("placed").value;
        if(window.XMLHttpRequest)
     {
       req=new XMLHttpRequest();
     }
     else
     {
       req=new ActiveXObject("Microsoft.req");
     }

     req.onreadystatechange = function()
     {
       if(req.readyState == 4 && req.status == 200)
       {
         document.getElementById("myID").innerHTML = req.responseText;
       }
     }
  req.open("GET","data.php/?xmark="+a+"&xiimark="+b+"&cgpa="+c+"&arrear="+d+"&placed="+e,true);
  req.send();
  }

</script>



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
Filter parameters
<br/><br/>
<form>
Min 10th mark: <input type = "text" id = "xmark"/>
Min 12th mark: <input type = "text" id = "xiimark"/>
CGPA: <input type = "text" id = "cgpa"/>
Max No of arrears: <input type = "text" id = "arrear"/>
Placed: <select id = "placed">
<option name = "yes" value = "'yes','no'">Yes or No</option>
<option name = "no" value = "'no'"/>No</option>
<option name = "yes" value = "'yes'">Yes</option>
</select>
</form><br/>
<button onclick = "myfun()">Filter</button>

<p id = "myID"></p>
</body>
</html>