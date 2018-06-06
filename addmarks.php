<?php

?>
<!DOCTYPE html>
<html><?php
require("config.php");
session_start();
$email = $_SESSION["email"];


$sql="select * from teacher where email='$email' ";
$data=mysqli_query($conn,$sql);
$res3=mysqli_fetch_assoc($data);
$image=$res3["img_path"];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
</head>
<body>
<div style="border: 1px solid red;height: 753px;width: 1532px">
<div style="border: 1px solid red;height: 125px;width: 1532px;background-color: #0c2f47">
<h1 style="margin-left:30px;font-size: 50px;color: white"><em>Student Management Dashboard</em></h1>
</div>
<div class="nav_bar" style="border: 1px solid red">
<ul style="list-style-type: none">
<li><a href="profile.php">Home</a></li>
<li><a href="student.php">Entry Of Student </a></li>
<!-- <li><a href="">Add Marks</a></li> -->
</ul>
</div>

<div style="border:1px solid red; width:1530px;height: 500px;background-color: #91a9d8">
	<table style="margin-left: 300px">
		<form method="post">
		<tr>
			<th style="margin-right: 50px">First Sessional</th>
			<td>English:</td>
			<td><input type="hidden" name="id"></td>
			<td><input type="text" name="eng"></td>
			<td>Maths:</td>
			<td><input type="text" name="maths"></td>
			<td>Biology:</td>
			<td><input type="text" name="bio"></td>
			<td>Chemistry:</td>
			<td><input type="text" name="chem"></td>
			<td><input type="submit" name="Added" value="Add"></td>	
		</tr>
	</form>
		</table>
<?php
if(isset($_REQUEST["Add"]))
{
	 $id=$_REQUEST["add"];//$id=$_POST["std_id"];
	// $eng=$_POST["eng"];
	// $maths=$_POST["maths"];
	// $bio=$_POST["bio"];
	// $chem=$_POST["chem"];
	// echo($eng.$maths.$bio.$chem.$id);
	}
	if(isset($_POST["Added"])){
	 $id=$_REQUEST["add"];//$id=$_POST["std_id"];
	$eng=$_POST["eng"];
	$maths=$_POST["maths"];
	 $bio=$_POST["bio"];
	 $chem=$_POST["chem"];
	 echo($eng.$maths.$bio.$chem.$id);
	$sql1="insert into marks (english,maths,chemistry,biology,stud_id) values ('$eng','$maths','$chem','$bio','$id')";
 $get_data=mysqli_query($conn,$sql1);

 	
	}
//  $sql1="insert into marks (english,maths,chemistry,biology,stud_id) values ('$eng','$maths','$chem','$bio','$id')";
//  $get_data=mysqli_query($conn,$sql1);
//  if($get_data)
// echo("inserted");
// else
// echo("not inserted");
// }
 //$sql2="update marks set english='$eng',maths='$maths',chemistry='$chem',biology='$bio' where stud_id='$id' ";
//  $data4=mysqli_query($conn,$sql2);
//  $res5=mysqli_affected_rows($conn);
//  if($res5)
// echo("success");
// else
// echo("not success");
// }
?>
<hr>
<table style="margin-left:300px;margin-top: 100px">
	<tr >
		<th style="padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px"></th>
		<th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">First Sessional</th>
		<th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Second Sessional</th>
		<th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Third Sessional</th>
		<th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Edit</th>
	</tr>
	<tr>
		<td style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">English</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="english1"> /30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="english2">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="english3">/30</td>
		<td style="background-color: #ebbbed;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px"><a href="">Edit</a></td>
	</tr>
	<tr>
		<td style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Mathematics</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="maths1">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="maths2">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="maths3">/30</td>


		<td style="background-color: #ebbbed;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px"><a href="">Edit</a></td>
	</tr>
	<tr>
		<td style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Biology</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="bio1">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="bio2">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="bio3">/30</td>

		<td style="background-color: #ebbbed;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px"><a href="">Edit</a></td>
	</tr>

	<tr>
		<td style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Chemistry</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="chem1">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="chem2">/30</td>
		<td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><input type="text" name="chem3">/30</td>
		<td style="background-color: #ebbbed;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px"><a href="">Edit</a></td>
	</tr>
</table>

</div>

<!-- <div class="footer">
<center><h1 style="color: white">Terms and Condition</h1></center>
</div> -->
</div>
 </body>
</html>
