<?php
require("config.php");
session_start();
if(isset($_POST["login"]))
{
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$sql="select admin_email,admin_password from admin where admin_email='$email' and admin_password='$pass'";
	$data=mysqli_query($conn,$sql);
	$res=mysqli_fetch_array($data);
	if($res){
		$_SESSION["email"]=$res["admin_email"];
		header("location:admin_profile.php");
		echo("matched");
	}
	else{
		echo("not matched");
	}
}
?>