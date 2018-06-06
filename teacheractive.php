<?php 
include('config.php');
$id = $_POST['id'];
$ischek = $_POST['Ischeck'];
$update="update teacher set active_sattus ='$ischek' where teach_id='$id'";
$data=mysqli_query($conn,$update);
if(mysqli_affected_rows($conn) > 0)
{
	echo('success');
}
?>