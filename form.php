<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style_js.css">
	<title>my first js</title>
</head>
<body>
	<div id="#body">
	
	<div class="form" style="border: 1px solid black" id="form">
		<h1 style="font-size: 70px;margin-left: 100px ;margin-top:80px;float: left">Log In...</h1>
			<img src="assets/img/43a13a0065d888d798aa3be3c658aeac-hand-holding-key-icon-by-vexels (1).png" class="key"/>
			<div class="myform" style="/*border:1px solid red*/;float: left">
				<form onsubmit="return myfunction()"; method="post" >
			
	            <h3 style="color: blue;text-shadow: 5px 5px 15px hotpink;" class="fname"> Email Id:</h3>
	             <input type="email" id="email" name="email" placeholder="Enter Your Email"  /><p id="demo"></p><br>
	             <h3 style="color: blue;text-shadow: 5px 5px 15px hotpink" class="password"> Password:</h3>
	             <input type="password" id="password" name="password" placeholder="Enter Your Password" /><p id="demo_pass"></p>
	             <input type="submit" id="submit" name="login" value="LogIn"  />
	         </form>
	             
	              
			</div>
		</div>
			
<script type="text/javascript">
	function myfunction(){
		$('#body').css('min-height', screen.height);
		
		// var y=document.getElementById("email").value;
		 var z=document.getElementById("password").value;
		// var s=document.getElementById("submit").value;
		 var message=document.getElementById('demo');
		  var msg=document.getElementById('demo_pass');
		var x=document.getElementById('email').value;
		
		if (x=="")  {
	      message.innerHTML="*please fill this field*";

          return false;
		}
		else if (z=="") {
	      msg.innerHTML="*please fill this field*";

          return false;
		}
	}
	
</script>
<?php
require("config.php");
session_start();
if(isset($_POST["login"]))
{
	$email=$_POST["email"];
	$pass= $_POST["password"];

	// echo ("email:".$email."<br>"."password".$pass);

	$sql="select email,password from teacher where email='$email' and password='$pass' ";
	
	$data=mysqli_query($conn,$sql);
	$res=mysqli_fetch_array($data);

	
	if($res>0)
	{
		$sql1="select email,password from teacher where email='$email' and password='$pass' and active_sattus='1'";
	    $res1=mysqli_query($conn,$sql1);
	    $data1=mysqli_fetch_array($res1);
	   if($data1>0){
		$_SESSION["email"]=$res["email"];
		
		 header("location:profile.php");
		 return true;
		
		
	}
	else{
		?>
		<script type="text/javascript">
			alert("Not Active");
		</script>
		<?php
	}	
	}
	
	else{
		?>
		<script type="text/javascript">
			alert("email id password incorrect");
		</script>
		<?PHP
	}
	
}
?>
</body>
</html>