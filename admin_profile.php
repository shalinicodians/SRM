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
<link rel="stylesheet" type="text/css" href="assets/css/admin_profile.css">

<style>
#loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	display:none;
	border:1px solid #000;
	z-index:111999 !important;
	background: url(<?php echo('assets/img/loading.gif'); ?>) 50% 50% no-repeat rgb(249,249,249);
}
</style>
</head>
<body>
	<div id="loader"></div>
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
<th style="padding-left: 57px;padding-right:50px;font-size: 20px;background-color: blue;color: white">Name</th>
<th style="padding-left: 80px;padding-right:100px;font-size: 20px;background-color: blue;color: white">Email</th>

<th style="padding-left: 20px;padding-right:30px;font-size: 20px;background-color: blue;color: white">Delete</th>
<th style="padding-left: 5px;padding-right:20px;font-size: 20px;background-color: blue;color: white">Active</th>
</tr>
</table>
<hr>
<div style="" class="table">
	<table>
					
			<?php
			if (isset($_REQUEST["emailid"])) {
				$emailid=$_REQUEST["emailid"];
				$delete="delete from teacher where email='$emailid'";
				$data3=mysqli_query($conn,$delete);
				// $res3=mysqli_fetch_array($data3);
				# code...
			}
             $sql1="select * from teacher";
             $data2=mysqli_query($conn,$sql1);
             $t_record=mysqli_num_rows($data2);
             if ($t_record>0) {
             	# code..
             // $res1=mysqli_fetch_assoc($data2);
             while ( $res1=mysqli_fetch_assoc($data2)) {
             	# code...
              ?>
<tr>
	<!-- <td style="padding-left: 30px;padding-right:50px;background-color: #4ad0e8;"><?php //echo($res1["f_name"]." ".$res1["l_name"]);?></td> -->
<td style="padding-left: 0px;padding-right:50px;background-color: #4ad0e8;"><?php echo($res1["f_name"]." ".$res1["l_name"]);?></td>
<td style="padding-left: 40px;padding-right:30px;background-color: #4ad0e8;"><?php echo($res1["email"]);?></td>

<td style="padding-left: 30px;padding-right:30px;background-color:#4ad0e8;"><a href="admin_profile.php?emailid=<?php echo $res1['email']?>">Delete</a></td>
<td style="padding-left: 30px;padding-right:30px;background-color:#4ad0e8;"><input type="checkbox" class="check" name="active" <?php if($res1["active_sattus"] == 1){ echo('checked'); } else{ echo(''); } ?> value="<?php echo($res1["teach_id"]);?>" ></td>
<script type="text/javascript" src="assets/jq_ajax/jquery.min.js"></script>
</tr>
             <?php
              }
              }
             ?>
</table>

</div>
</div>
</div>

</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
	 var ckbox = $("input[name='active']");
	 $('input').on('click', function()
	 {
	 	 $('#loader').show();
	 	var teacher_id = $(this).val();
	 	if ($(this).is(':checked'))
	 	{
	 	 var ischek = 1;
	 	}
	 	else
	 	{
	 	 var ischek = 0;
	 	}
	 	// alert('Id='+ teacher_id + 'Ischeck='+ ischek );
	 	$.ajax({
	 		type: 'POST',
		    url:"http://localhost/SRM/teacheractive.php",
		    data:{'id':teacher_id,'Ischeck':ischek},
		     timeout: 80000,
		    cache: false,
		    success:function(res){
		    	$('#loader').fadeOut(res);
		    }
	 	});
	 	});
	 });
</script>
</html>