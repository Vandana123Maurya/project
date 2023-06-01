
<?php 
include "db_connect.php";
?>



  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>

<body>
    <div class="container">
      <form action="#" method="post" enctype="multipart/form-data">
       <div class="title">
           Registration Form
       </div>
     <div class="form"> 
      
      <div class="input_field">
        <lable>Image</lable>
        <input type="file" name="uploadfile" style=" width:100%">
        <!-- <input type="submit"name="submit"value="upload file"> -->
       </div>
       <div class="input_field">
         <lable>First Name</lable>
         <input type="text" class="input" name="fname"required>
       </div>

       <div class="input_field">
         <lable>Last Name</lable>
         <input type="text" class="input" name="lname"required>
       </div>

       <div class="input_field">
         <lable>Password</lable>
         <input type="password" class="input" name="pass" required>
       </div>

       <div class="input_field">
         <lable>Confirm Password</lable>
         <input type="password" class="input"name="cpass"required>
       </div>
      
        <div class="input_field">
         <lable>Gender</lable>
        <select class="selectBox" name="gender"required>
            <option value="">select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
       </div>

        <div class="input_field">
         <lable>Email Address</lable>
         <input type="email" class="input"name="email"required>
       </div>

        <div class="input_field">
         <lable>Phone Number</lable>
         <input type="text" class="input"name="phoneno"required>
       </div>

       <div class="input_field">
         <lable style="margin-right:100px">Caste</lable>
         <input type="radio" name="t1" value="general" required><lable style="margin-left:5px">General</lable>
         <input type="radio" name="t1" value="obc" required><lable style="margin-left:5px">OBC</lable>
         <input type="radio" name="t1" value="sc" required><lable style="margin-left:5px">SC</lable>
         <input type="radio" name="t1" value="st" required><lable style="margin-left:5px">ST</lable>
       </div>

        <div class="input_field">
         <lable>Address</lable>
         <textarea name="address"required></textarea>
       </div>

       <div class="input_field terms">
         <lable class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
         </lable>
         <p>Agree to terms and conditions</p>
       </div>
       <div class="input_field">
          <input type="submit"value="register" class="btn" name="sub">
       </div>
      </div>
     </form>
    </div>
</body>
</html>
<?php
  if(isset($_POST['sub']))
  {
     $filename= $_FILES["uploadfile"]["name"];
     $tempname= $_FILES["uploadfile"]["tmp_name"];
     $folder="images/".$filename;
     move_uploaded_file($tempname,$folder);

    $fn   = $_POST['fname'];
    $ln   = $_POST['lname'];
    $p    = $_POST['pass'];
    $cp   = $_POST['cpass'];
    $g    = $_POST['gender'];
    $e    = $_POST['email']; 
    $phone= $_POST['phoneno'];
    $caste= $_POST['t1'];
    $add  = $_POST['address'];

    
       $sql="INSERT INTO student_form (stu_image,first_name,last_name,password,confirm_password,gender,email,phone,caste,address)VALUES('$folder','$fn','$ln','$p','$cp','$g','$e','$phone','$caste','$add')";
       $d=mysqli_query($conn,$sql);
       if($d){
        header("location:show.php");
        }else{
            echo "record not found";
        }
  }
  ?>


