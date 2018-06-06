<?php
require("config.php");
session_start();
$email=$_SESSION["email"];
$sql="select * from admin";
$data=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#box{
			position: absolute;
			z-index: 20;
			cursor: pointer;
			 width: 600px;
			 height: 200px;
			 background-color:#dad6db;
			 display: none;
			 border: 1px solid black;
			 border-radius: 10px 10px 10px 10px
		}
	</style>
<title>admin</title>
<link rel="stylesheet" type="text/css" href="assets/css/admin_profile.css">
</head>
<body>
	<div style="" class="nav">
	<h1 style="color: white; float: left;margin-left: 10px;margin-bottom: 20px"><em>Admin Panel</em></h1>
	<a href="admin_login.php" style="color: white;text-decoration: none;margin-top: 24px;font-size: 20px;float: right;margin-right: 30px"><em>| LogOut |</em></a>
	<h2 style="color: white; float: right; margin-right: 30px"><em><?php echo("Welcome"." ".$res["admin_name"].","); ?></em></h2>

	</div>
				<div class="wrap1" style="border: 1px solid white;">
				<div class="sidebar" style="border: 1px solid white">
				<center><h2><em>Student Management Dashboard</em></h2></center>
				<hr style="color: black">
				<ul style="list-style-type: none;width: 200px;background-color: #41d0f4">
				<li><a href="admin_profile.php">Teachers</a></li>
				<li><a href="Students_admin.php">Students</a></li>
				</ul>
				</div>
				<div class="content">
				<div class="heading" style="">
				<h2><em>Dashboard Setting</em></h2>
				</div>
				<hr>
<div class="wrap_content" style="">
<table>
<tr>
	<th style="padding-left: 28px;padding-right:28px;font-size: 20px;background-color: blue;color: white">S.No</th>
<th style="padding-left: 100px;padding-right:50px;font-size: 20px;background-color: blue;color: white">Name</th>
<th style="padding-left: 30px;padding-right:30px;font-size: 20px;background-color: blue;color: white">Contact</th>
<th style="padding-left: 20px;padding-right:40px;font-size: 20px;background-color: blue;color: white">Edit</th>
<!-- <th style="padding-left: 20px;padding-right:44px;font-size: 20px;background-color: blue;color: white">Add</th> -->
<th style="padding-left: 20px;padding-right:40px;font-size: 20px;background-color: blue;color: white">Delete</th>
<!-- <th style="padding-left:0px;padding-right:5px;font-size: 20px;background-color: blue;color: white">Active</th> -->
</tr>
</table>
<hr>
<div style="" class="table">
	<table>
			<?php
			if(isset($_REQUEST["delid"]))
			{
				$delid=$_REQUEST["delid"];
			$del="delete from student where std_id='$delid'";
			mysqli_query($conn,$del);
		}
             $sql1="select std_name,std_contact,std_id from student";
             $data2=mysqli_query($conn,$sql1);
             $t_record=mysqli_num_rows($data2);
             if ($t_record>0) {
             	# code..
             // $res1=mysqli_fetch_assoc($data2);
             while ( $res1=mysqli_fetch_assoc($data2)) {
             	
              ?>
<tr>
	<td style="padding-left: 50px;padding-right:30px;background-color: #4ad0e8;" name=""><?php echo($res1["std_id"]);?></td>
<td style="padding-left: 50px;padding-right:30px;background-color: #4ad0e8;" id="name"><?php echo($res1["std_name"]);?></td>
<td style="padding-left: 10px;padding-right:30px;background-color: #4ad0e8;"><?php echo($res1["std_contact"]);?></td>
<td style="padding-left: 30px;padding-right:30px;background-color: #4ad0e8;"><a href="update.php?edid=<?php echo $res1['std_id']?>">Edit</a></td>
<!-- <td style="padding-left: 30px;padding-right:30px;background-color: #4ad0e8;"><button onclick="add()" style="background-color: blue;color: white">Add</button></td> -->
<td style="padding-left: 30px;padding-right:30px;background-color: #4ad0e8;"><a href="Students_admin.php?delid=<?php echo $res1['std_id']?>">Delete</a></td>
<!-- <td style="padding-left: 10px;padding-right:10px;background-color:#4ad0e8;"><input type="checkbox" name="active" value="1"></td> -->
</tr>
	<?php
	}
	}
	?>
	<?php
      $sql2="select * from student";
      $data3=mysqli_query($conn,$sql2);
      $res3=mysqli_fetch_array($data3);
     
	?>
	<div id="box">
		
	</div>
	
	
</table>
<script>
	
            
</script>

</div>

</div>
</div>


</div>
</body>
</html>