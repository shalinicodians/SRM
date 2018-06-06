<?php
            require("config.php");
            session_start();
            if(isset($_POST["queue"])){
              $email = $_SESSION["email"];
              $name=$_POST["name"];
              $fa_name=$_POST["f_name"];
              $sex=$_POST["sex"];
              $mobile=$_POST["contact"];
            
               $class = $_POST['class'];

            // $sql1="select email from register where email='$var1'";
                 // echo($email.' '.$name.' '.$fname.' '.$sex.' '.$mobile.' '.$class);
         $sql="insert into student(std_name,tech_email,std_father_name,class_id,std_contact,gender) values('$name','$email',$fa_name','$class','$mobile','$sex')";
         $data2 = mysqli_query($conn,$sql);
         if($data2)
         {
         echo("inserted");
        //      // while ($row = mysqli_fetch_assoc($data1)) { 
        //      ?> 
        //     <!-- <tr>
        //     <td><?php //echo $row["Name"]; ?></td>
        //     <td><?php //echo $row["father_name"]; ?></td>
        //     </tr> -->
 
        //     <?php 
            }
            else{
              echo("not inserted");
            }
            } 
            ?> 

