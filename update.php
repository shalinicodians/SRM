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
<title>admin</title>
<link rel="stylesheet" type="text/css" href="assets/css/Update.css">
<script type="text/javascript" src="assets/jQuery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/validation.js"></script>
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
				<?php 
				if (isset($_REQUEST["edid"])) {
					$edid=$_REQUEST["edid"];
					 $sql1="select * from student where std_id='$edid'";
					 $data1=mysqli_query($conn,$sql1);
					 $row1=mysqli_fetch_array($data1);


				}
				if (isset($_POST["update"])) {
					# code...
					$name=$_POST["name"];
					$fname=$_POST["fname"];
					$gender=$_POST["gender"];
					$contact=$_POST["contact"];
					$update="update student set std_name='$name',std_father_name='$fname',gender='$gender',std_contact='$contact' where std_id='$edid'";
					$data2=mysqli_query($conn,$update);
					header('location:Students_admin.php');
				}
                 
				?>

	<center><div id="heading"><h1>Update Here...</h1></div></center>
	<div style="border: 1px solid blue;width: 800px;height: 300px;margin-left: 40px;border-radius: 5px 5px 5px 5px;background-color: #5ed2db">
		<form id="forms" method="POST">
	<div class="u_wrap1" style="">
		
		<div style="height: 50px;width: 300px;margin-top: 10px;float: left">
			<div style="float: left;font-size: 20px">Name</div><input type="text" value="<?php echo($row1['std_name']);?>" name="name" style="float: left;margin-left: 10px">
		</div>
		<div style="height: 50px;width: 400px;margin-top: 10px;margin-left:40px;float: left">
			<div style="float: left;font-size: 20px">Father's Name</div><input type="text" value="<?php echo($row1['std_father_name']);?>" name="fname" style="float: left;margin-left: 10px">
		</div>
	</div>
	<div class="u_wrap1" style="">
		<div style="height: 50px;width: 300px;margin-top: 10px;float: left">
			<div style="float: left;font-size: 20px">Gender</div><input type="text" value="<?php echo($row1['gender']);?>" name="gender" style="float: left;margin-left: 10px">
		</div>
		<div style="height: 50px;width: 400px;margin-top: 10px;margin-left:40px;float: left">
			<div style="float: left;font-size: 20px">Contact</div><input type="text" value="<?php echo($row1['std_contact']);?>" id="contact" name="contact" style="float: left;margin-left: 10px">
		</div>
	</div>
		<div class="u_wrap1" style="">
		<div style="height: 50px;width: 300px;margin-top: 10px;float: left">
	<input type="submit" value="Update" name="update"/>
		</div>
	</div>
</form>
	</div>
</div>
	


</div>
</div>
</div>

</div>
 <script type="text/javascript">
        $(document).ready(function () {

  $("#contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
  $("#forms").validate({
    rules :{
      contact :{
        required:true,
        minlength: 10
      }
     },
    messages :{
      contact :{
        minlength :'*Incorrect Mobile No*'
      }
    }
  })
});
      </script>	

</body>
</html>