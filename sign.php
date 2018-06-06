<?php 
require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/sign.css">
	<title>signup</title>
</head>
<body>
	<center><h1 style="font-size: 40px"> SignUp Here!!</h1></center>
	<div class="wrapper" style="border:1px solid white">
	<div class="content" style="">
	<form name="myform" id="myform" onsubmit="return validate();" method="post"  >
				<!-- ==================================Nmae======================================= -->
						<div style="" class="wrap1">
						<div class="fname" style="">
						<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 30px">First Name:</h1>
						<input type="text" name="firstname" id="fname" placeholder="Enter Your First Name">
						</div>
						<div class="lname" style="">
						<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 5px">Last Name:</h1>
						<input type="text" name="lastname" placeholder="Enter Your Last Name">
						</div>
						</div>
				<!-- =====================================Email,Mobie===================================================== -->
	<div style="" class="wrap2">
	<div class="email" style="">
	<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 30px; ">Email Id:</h1>
	<input type="text" id="email" name="email" placeholder="Enter Your Email">
	</div>
	<div class="mobile" style="">
	<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 12px">Mobile:</h1>
	<input type="tel" name="mobile" minlength="9" maxlength="10" placeholder="Enter Your Mobile No.">
	</div>
	</div>

				<!-- ==================================================Password,Confirm Password=================================== -->
				<div style="" class="wrap3">
				<div class="password" style="">
				<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 30px;padding-right:30px">Password:</h1>
				<input type="password" name="password" id="password" placeholder="Enter Your Password"><p id="p_msg"></p>
				</div>
				<div class="c_password" style="">
				<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 15px;;padding-right:5px">Confirm Password:</h1>
				<input type="password" name="cpassword" id="cpassword" placeholder="Re-Enter Your Password" >
				</div>
				</div>




		
		
				  <!-- ===========================================Gender,Date=============================================================== -->
			
		
	<div class="field" style="">
	<div class="gender" style="">
	<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 30px">Gender:</h1>
	<input type="radio" name="gender" value="M" class="male"><h3 style="position: absolute;float: left;font-size:25px;color:white;margin-left: 210px">Male</h3>
	<input type="radio" name="gender" value="F" class="male"><h3 style="position: absolute;float: left;font-size:25px;color:white;margin-left: 335px">Female</h3>



	</div>
	<div class="date" style="">
	<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 48px;padding-right:32px">DOB:</h1>
	<input type="date" name="date" placeholder="Enter Your Last Name">
	</div>
	</div>

	<div class="class" style="">
	<h1 style="font-size: 25px;float: left;margin-top: 30px;color: white;margin-left: 48px;padding-right:32px">Class:</h1>
	<select width="350px" height="40px" name="class" >
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select>
	</div>
	<input type="submit" name="submit" id="submit">
	</form>
	</div>
	</div>

	<script type="text/javascript" src="assets/jQuery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/jQuery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/sign.js"></script>
<!-- ===============================================php to insert data=================================== -->
<?php
require("config.php");


         if(isset($_POST["submit"]))
{           
	$email= $_POST["email"];
	$sql3="select email from teacher where email='$email'";
$select = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($select);
          if(mysqli_num_rows($select) > 0)
          {
          	?>
          	
              <script type="text/javascript">
              	
            alert("Email Id already exist");
                
        </script>

            <?php
            
          }
          else{

	
	$fname= $_POST["firstname"];
	$lname= $_POST["lastname"];
	$email= $_POST["email"];
	$mobile= $_POST["mobile"];
	$pass= $_POST["password"];
	 $gender= $_POST["gender"];
	 $class=$_POST["class"];
	$DOB= $_POST["date"];
	(( $gender==='M')?(true):(false));
	(( $gender==='F')?(true):(false));

	$email=$_POST['email'];
// $sql3 = "SELECT email FROM teacher WHERE email = ".$_POST['email'];

        
         
	

	// echo ("fname:".$fname."<br>"."lname:".$lname."<br>"."email:".$email."<br>"."mobile:".$mobile."<br>"."password:".$pass."<br>"."gender:".$gender."<br>"."DOB:".$DOB);
	$sql="insert into teacher(f_name,l_name,email,mobile_no,password,gender,dob,class_id) values ('$fname','$lname','$email','$mobile','$pass','$gender','$DOB','$class')";
	$res= mysqli_query($conn,$sql);
	if($res){
		?>
		<script type="text/javascript">
	alert("Signed In Succeful");
</script>

<?php
}
else{

}

}
}




?>

</body>
</html>