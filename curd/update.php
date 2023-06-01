<!-- select all records-------------------------------------------------------- -->
<?php 
session_start();
include "db_connect.php";
$id= $_GET['id'];

$userprofile=$_SESSION['user_name'];
if($userprofile==true)
{
        
}
else
{
    header('location:login_form.php');
}
$sql="SELECT *FROM student_form where id='$id'";
    $d=mysqli_query($conn,$sql)or die("query unsuccessfull");
    $t=mysqli_num_rows($d);
    $r=mysqli_fetch_assoc($d);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
      <form action="#" method="post">
       <div class="title">
         Update student details
       </div>
     <div class="form">  
       <!-- first name------------------------------------------------------------ -->
       <div class="input_field">
         <lable>First Name</lable>
         <input type="text" class="input"value="<?php echo $r['first_name'];?>" name="fname"required>
       </div>
       <!-- last Name-------------------------------------------------------------- -->
       <div class="input_field">
         <lable>Last Name</lable>
         <input type="text" class="input"value="<?php echo $r['last_name'];?>" name="lname"required>
       </div>
        <!-- passwprd--------------------------------------------------------------- -->
       <div class="input_field">
         <lable>Password</lable>
         <input type="password" class="input" value="<?php echo $r['password'];?>"name="pass" required>
       </div>
        <!-- confirm password-------------------------------------------------------- -->
       <div class="input_field">
         <lable>Confirm Password</lable>
         <input type="password" class="input"value="<?php echo $r['confirm_password'];?>" name="cpass"required>
       </div>
      <!-- Gender--------------------------------------------------------------------- -->
        <div class="input_field">
         <lable>Gender</lable>
        <select class="selectBox" value="<?php echo $r['gender'];?>" name="gender"required>
            <option value="">select</option>
            <option value="male"
            <?php 
             if($r['gender'] == 'male')
             {
              echo "selected";
             }
            ?>
            >male</option>
            <option value="female"
            <?php 
             if($r['gender'] == 'female')
             {
              echo "selected";
             }
            ?>
            >female</option>
        </select>
       </div>
         <!-- Email address--------------------------------------------------- -->
        <div class="input_field">
         <lable>Email Address</lable>
         <input type="email" class="input" value="<?php echo $r['email'];?>"name="email"required>
       </div>
        <!-- Phone number----------------------------------------------------- -->
        <div class="input_field">
         <lable>Phone Number</lable>
         <input type="text" class="input" value="<?php echo $r['phone'];?>" max="10"name="phoneno"required>
       </div>

       <!-- Caste------------------------------------------------------------- -->
       <div class="input_field">
         <lable style="margin-right:100px">Caste</lable>
         <input type="radio" name="t1" value="general" required
         <?php 
          if($r['caste'] == "general")
          {
           echo "checked";
          }
         ?>><lable style="margin-left:5px">General</lable>


         <input type="radio" name="t1" value="obc" required
         <?php 
          if($r['caste'] == "obc")
          {
           echo "checked";
          }
         ?> ><lable style="margin-left:5px">OBC</lable>


         <input type="radio" name="t1" value="sc" required
         <?php 
          if($r['caste'] == "sc")
          {
           echo "checked";
          }
         ?> ><lable style="margin-left:5px">SC</lable>

         <input type="radio" name="t1" value="st" required
         <?php 
          if($r['caste'] == "st")
          {
           echo "checked";
          }
         ?>><lable style="margin-left:5px">ST</lable>
       </div>
        <!-- Address------------------------------------------------------------- -->
        <div class="input_field">
         <lable>Address</lable>
         <textarea  name="address"required>
             <?php echo $r['address'];?>
         </textarea>
       </div>
       <!-- Agree and terms------------------------------------------------------ -->
       <div class="input_field terms">
         <lable class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
         </lable>
         <p>Agree to terms and conditions</p>
       </div>
       <div class="input_field">
          <input type="submit"value="Update Details" class="btn" name="update">
       </div>
      </div>
     </form>
    </div>
</body>
</html> 
<?php
  
  if(isset($_POST['update']))
  {
    $fn   = $_POST['fname'];
    $ln   = $_POST['lname'];
    $p    = $_POST['pass'];
    $cp   = $_POST['cpass'];
    $g    = $_POST['gender'];
    $e    = $_POST['email']; 
    $phone= $_POST['phoneno'];
    $caste= $_POST['t1'];
    $add  = $_POST['address'];

    if($fn!="" && $ln!=""&& $p!=""&& $cp!=""&& $g!=""&& $e!=""&& $phone!=""&& $add!=""&& $caste!=""){
       $sql="UPDATE student_form SET first_name='$fn',last_name='$ln',password='$p',confirm_password='$cp',gender='$g',email='$e',phone='$phone',caste='$caste',address='$add' WHERE id='$id'";
      
       $d=mysqli_query($conn,$sql);
       if($d){
        header("location:show.php");
        }else{
            echo "record not found";
        }
    }
    else{
      echo "<script>alert('please fill the form')</script>";
    }
  }
  ?>




