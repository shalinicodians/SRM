<?php
require("config.php");
$sql="select * from student ";
$data=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/edit.css"/>
<style type="text/css">
input[type=text]{

margin-top: -18px;
margin-left:-350px;
border-radius: 10px
}
input[type=button]{
	margin-left: 250px
}
body{
	/*background-color: black;
	opacity: 0.6*/
}
	</style>
}

</head>
<body>

	<div class="forms" style="border: 1px solid #1c6d06;width: 700px;height: 300px;background-color:#414444;box-shadow: 10px 10px 10px black">
	<form method="post">
<table>
	<div style="width: 100%;height: 30px;background-color: #e89247;margin-top: 30px"><center><h2>Update...</h2></center></div>
	<tr>
	
	<td style="font-size: 20px ;height:10px;padding-left: 50px;color: white"><h5><b><em>Name:</em></b></h5></td>
	<td style=" width :180px;height: 10px"><input type="text" name="name" placeholder="<?php echo($res['std_name'])?>" style="width: 200px;height: 30px;"></td>
	<td style="font-size: 20px ;height:10px;margin-left:-120px;float:left;;color: white"><h5><b><em>Contact:</em></b></h5></td>
	<td style=" width :180px;height: 10px"><input type="text" name="contact" placeholder="<?php echo($res['std_contact'])?>" style="width: 200px;height: 30px;margin-top: -18px;margin-left:-50px;border-radius: 10px"></td>
	
</tr>
<!-- ================================================= -->
<tr>
	
	<td style="font-size: 20px ;width:500px;height:30px; padding-left: 20px;color: white"><h5><b><em>Father's Name:</em></b></h5></td>
	<td style=" width :180px;height: 10px"><input type="text" name="fname" placeholder="<?php echo($res['std_father_name'])?>" style="width: 200px;height: 30px;"></td>
	<td style="font-size: 20px ;height:10px;padding-left:10px;float:left;margin-left: -100px;color: white"><h5><b><em>Sex :</em></b></h5></td>
	<td style=" width :180px;height: 10px"><input type="text" name="gender" placeholder="<?php echo($res['gender'])?>" style="width: 200px;height: 30px;margin-top: -18px;margin-left:-50px;border-radius: 10px"></td>
</tr>
<tr>
	<td style="width: 900px;height: 30px;"><input type="button" name="update" onsubmit="return update();" value="Update" style="background-color:#e89247;width: 200px;height: 30px"></td>
</tr>

<div id="box">
</div>
</table>
</form>
</div>
<script type="text/javascript">
	function update()
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if (this.readyState==4 && this.status==200) {
		document.getElementById("box").innerHTML=this.responseText;
		
		
	}
};
xmlhttp.open("GET","editme.php",true);
xmlhttp.send();
	}
            
</script>
<?php
// $name=$_POST["name"];

// if(isset($_POST["update"])){
// 	$name=$_GET["name"];
// 	$contact=$_GET["contact"];
// 	$fname=$_GET["fname"];
// 	$gender=$_GET["gender"];
// 	$id=$_POST["id"];
// 	$sql1="update student set std_name='$name',std_contact='$contact',std_father_name='$fname',gender='$gender' where std_id='id'";
// 	$data1=mysqli_query($conn,$sql1);
// 	$res1=mysqli_affected_rows($conn);
// 	if($res1){
// 		echo("updated");
// 	}
// 	else
// 		echo("not updated");



?>
</div>
</body>
</html>