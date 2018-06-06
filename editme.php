<?php
$name=$_POST["name"];

if(isset($_POST["update"])){
	$name=$_GET["name"];
	$contact=$_GET["contact"];
	$fname=$_GET["fname"];
	$gender=$_GET["gender"];
	$id=$_POST["id"];
	$sql1="update student set std_name='$name',std_contact='$contact',std_father_name='$fname',gender='$gender' where std_id='id'";
	$data1=mysqli_query($conn,$sql1);
	$res1=mysqli_affected_rows($conn);
	if($res1){
		echo("updated");
	}
	else
		echo("not updated");

}

?>