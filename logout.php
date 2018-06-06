<?php
session_start(); 
$email=$_SESSION["email"];

 session_destroy(); 
 header("location:form.php");
exit();
?>