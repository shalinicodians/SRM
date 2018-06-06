<?php
require("config.php");
if(isset($_POST["upload"]))
{
	// header("location:profile.php");
	$imageName=$_FILES["image"]["name"];
	$imageData=$_FILES["image"]["tmp_name"];
	$imageType=$_FILES["image"]["type"];
	$imageSize=$_FILES["image"]["size"];
	if($imageType!='image/png'||$imageType!='image/jpg'||$imageType!='image/jpg'){
	echo("incorrect image type");
}
	if($imageSize> 500000){
		echo("file size exceed");
	}
	if(file_exists('upload/' . $imageName)){
    die('File with that name already exists.');
}
if(!move_uploaded_file($imageData, 'upload/' . $imageName)){
    die('Error uploading file - check destination is writeable.');
}

die('File uploaded successfully.');
}
?>