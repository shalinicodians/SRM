<?php
require("config.php");
$email= $_POST["email"];
$sql3="select email from teacher where email='$email'";
$select = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($select);
         if(isset($_POST["submit"]))
{
          if(mysqli_num_rows($select) > 0)
          {
          	?>
          	
              <script type="text/javascript">
              	
            alert("EmailId already exist");
                
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

        
         $sql1="select email from teacher where email='$email'";
         $result=mysqli_query($conn,$sql1);
         $get_data=mysqli_fetch_assoc($result);
	

	// echo ("fname:".$fname."<br>"."lname:".$lname."<br>"."email:".$email."<br>"."mobile:".$mobile."<br>"."password:".$pass."<br>"."gender:".$gender."<br>"."DOB:".$DOB);
	$sql="insert into teacher(f_name,l_name,email,mobile_no,password,gender,dob,class_id) values ('$fname','$lname','$email','$mobile','$pass','$gender','$DOB','$class')";
	$res= mysqli_query($conn,$sql);
	if($res){
	echo ("inserted");
}
else{
	echo("not inserted");
}

}
}




?>