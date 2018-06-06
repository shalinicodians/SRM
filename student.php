      
<?php
require("config.php");
session_start();
$email = $_SESSION["email"];


$sql="select * from teacher where email='$email' ";
$data=mysqli_query($conn,$sql);
$res3=mysqli_fetch_assoc($data);
$image=$res3["img_path"];
?>
<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
      <script type="text/javascript" src="assets/jQuery/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="assets/js/validation.js"></script>
      </head>
      <body>
      <div style="border: 1px solid red;height: 750px;width: 1532px">
      <div style="border: 1px solid red;height: 125px;width: 1532px;background-color: #0c2f47">
      <h1 style="margin-left:30px;font-size: 50px;color: white"><em>Student Management Dashboard</em></h1>
      <div style="color: white;text-decoration: none;margin-top: -100px;font-size: 20px;float: right;margin-right: 30px;">
        <a href="logout.php" style="color: white;text-decoration: none;">LogOut&nbsp;&times;</a>
      </div>
      </div>
      <div class="nav_bar" style="border: 1px solid red">
      <ul style="list-style-type: none">
      <li><a href="profile.php">Home</a></li>
      <li><a href="student.php">Entry Of Student </a></li>
      
      </ul>
      </div>

      <div style="border: 1px solid red;height: 500px;width: 1532px ;background-color: #dce2e2">
      <table style="margin-left: 150px;margin-top: 10px">
                        
      <tr>
      <form id="forms" method="post" action="">
      <td style="padding-left: 0px"><b><em>Class:<select name="class" style="width: 120px;height: 20px">  <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      </select></td>
      <input type="hidden" name="emails" value=<?php echo($email);?>>
      <td style="padding-left: 10px"><b><em>Father'sName:</em></b><input type="text" name="f_name"></td>
      <td style="padding-left: 10px"><b><em>Name:</em></b><input type="text" name="name"></td>
      <td style=""><b><em>Gender:<select name="sex" style="width: 120px;height: 20px">
      <option value="male">Male</option>
      <option value="female">Female</option>
      </select></td>
      <td style="padding-left: 10px"><b><em>Contact:</em></b><input type="text" id="contact" maxlength="10" name="contact"></td>
      <td style="padding-left: 10px"><input type="submit" name="queue" value="queue" style="width: 100px;background-color: lightblue"></td>

      </form>
      <?php
                        if(isset($_POST["queue"])){
                        $emails = $_POST["emails"];
                        $name=$_POST["name"];
                        
                        $fa_name=$_POST["f_name"];
                        $class = $_POST['class'];
                        $mobile=$_POST["contact"];
                         $sex=$_POST["sex"];
                        
                        $ins="insert into student(std_name,tech_email,std_father_name,class_id,std_contact,gender) values ('$name','$emails','$fa_name','$class','$mobile','$sex')";
                        $data2 = mysqli_query($conn,$ins);
                        //$st_data=mysqli_fetch_assoc($data2);
                        mysqli_error($conn);
                        echo( mysqli_error($conn));
                        //if($data2>0)
                        // {
                        // echo("inserted");

                        // }
                        // else{
                        // echo("not inserted");
                        // }
                        } 

                        ?>
                        <?if(isset($_REQUEST["add"])){
                          $marks=$_REQUEST["add"];
                          header("location:addmarks.php");
                        }
                        ?>
      <script type="text/javascript">
        $(document).ready(function () {

  $("#contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
  $("#form").validate({
    rules :{
      contact :{
        required:true,
        minlength:10
      }
     },
    messages:{
      contact :{
        minlength :'*Incorrect Mobile No*'
      }
    }
  })
});
      </script>
      </tr>
      </table>
      <hr>
      <div style="border: 1px solid red;width: 1100px;margin-left:100px">
      <table>
      <tr style="margin-left: 50px">
        <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">S.No</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Name</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Email</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Father's Name</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Class </th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Gender</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Contact</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Add Marks</th>
      <th style="background-color: blue;padding-left: 30px;padding-right: 30px;color: white;padding-bottom: 5px;padding-top: 5px">Delete</th>
      </tr>
                          <?php
                          ?>
                          <?php
                          $ins="select * from student where tech_email='$email' order by class_id";
                          $result=mysqli_query($conn,$ins);
                          $data1=mysqli_num_rows($result);
                          //$show=mysqli_fetch_assoc($result);
                          if($data1>0){
                            while( $show=mysqli_fetch_assoc($result)){
                          ?>
      <tr>
      <td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["std_id"]);?></td>
      <td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["std_name"]);?></td>
      <td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["tech_email"]);?></td>
      <td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["std_father_name"]);?></td>
      <td style="background-color:#ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["class_id"]);?></td>
      <td style="background-color: #ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["gender"]);?></td>
      <td style="background-color:#ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><?php echo($show["std_contact"]);?></td>
      <td style="background-color:#ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><a href="addmarks.php?add=<?php echo $show['std_id']?>">AddMarks</a></td>
      <td style="background-color:#ebbbed;padding-left: 50px;padding-right: 50px;padding-bottom: 5px;padding-top: 5px"><a href="student.php?delete=<?php echo $show['std_id']?>">Delete</a></td>
      </tr>

                            <?php
                            }
                            }
                            ?>
                            <?php
                            if(isset($_REQUEST["delete"])){
                            $del=$_REQUEST["delete"];
                            $del_std="delete from student where std_id='$del'";
                            $run=mysqli_query($conn,$del_std);
                            }
                            ?>
                            
      </table>

      </div>
       
      </div>
<div class="footers" style=" border:1px solid black;background-color: black;color: white;width: 1531px;height: 80px;padding-left: 0px">
<center><h1 style="color: white">Terms and Condition</h1></center>
</div>

</div>


      </div>
      </body>
      </html>