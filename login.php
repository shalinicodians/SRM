<?php
require("config.php");
session_start();
if(isset($_POST["login"]))
{
	$email=$_POST["email"];
	$pass= $_POST["password"];

	
	$sql="select email,password from teacher where email='$email' and password='$pass' ";
	
	$data=mysqli_query($conn,$sql);
	$res=mysqli_fetch_array($data);
	if($res>0)
	{
		

		

		$_SESSION["email"]=$res["email"];
		
		 header("location:profile.php");
		 return true;
	}
	else
	{
	
		?>

		<script type="text/javascript">
		alert("email id and password does not exist");

	</script>

	<?php
	}
}
?>