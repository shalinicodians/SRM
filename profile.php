<?php
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
<div style="color: white;text-decoration: none;margin-top: -100px;font-size: 20px;float: right;margin-right: 30px;">
        <a href="logout.php" style="color: white;text-decoration: none;">LogOut&nbsp;&times;</a>
      </div>
</div>
<div class="nav_bar" style="border: 1px solid red">
<ul style="list-style-type: none">
<li><a href="profile.php">Home</a></li>
<li><a href="student.php">Entry Of Student </a></li>
<!-- <li><a href="">Add Marks</a></li> -->
</ul>
</div>

<div class="w_wrap" style="border: 1px solid black;">
<div class="wrap" style="border: 1px solid red;">
<div style="border: 1px solid red;height: 200px;width: 250px;margin-left: 20px;margin-top: 20px">
<?php
if(isset($_POST["update"]))
{
$file=$_FILES["file"]["name"];
$temp_name=$_FILES["file"]["tmp_name"];
// $tmp_name=$_FILES["file"]["tmp_name"];
$path="upload/".$file;
// move_uploaded_file($temp_name,$path);
$insert="update teacher set img_path='$file' where email='$email'";
$result=mysqli_query($conn,$insert);

move_uploaded_file($temp_name,$path);




?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="file" style="position: absolute;z-index: 20" >
<input type="submit" name="update" value="update" style="position: absolute;z-index: 20">
<?php
echo "<img src= 'upload/'.$file width='250px' height='200px'/>";

}
?>
</form>

</div>
<div style="margin-top:20px;width: 300px; height:50px">
<h2 style="margin-left: 60px"><?php echo($res3["f_name"]." ".$res3["l_name"]);?></h2>
</div>
</div>


<div class="wrap1" style="border: 1px solid red;">
<div style=" height:50px;width: 750px ">
<em><h1 style="margin-left: 10px"><?php echo("Welcome"." ".$res3["f_name"]);?></h1></em>

</div>
<div class="nav" style="">
<ul style="list-style-type: none">
<li><a href="">Profile</a></li>
<li><a href="">Biography </a></li>
<li><a href="">Teaching Schedule</a></li>
<hr>
</ul>

</div>


</div>
<div class="footer">
<center><h1 style="color: white">Terms and Condition</h1></center>
</div>
</div>
 </body>
</html>
