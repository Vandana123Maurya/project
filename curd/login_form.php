
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Document</title>
</head>

<body>
<form action="#" method="post">
<div class="container">
    <div class="center">
        <h1>Login Form</h1>
        
        <div class="form">
               <input type="text" class="input" name="email" placeholder="Email" required>
               <input type="password" class="input" name="password" placeholder="Password" required>
               <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password?</a></div>
               <input type="submit" class="btn" name="login" value="login">
               <div class="signup">New Member  <a href="addRecord.php" class="link1">Signup more</a></div>
        </div>
       
    </div>
</div>
</form>
</body>
<script>
  function message()
  {
    alert('password yad karo');
  }
</script>
</html>

<?php
include "db_connect.php";
if(isset($_POST['login']))
{
    $uemail=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM student_form where email='$uemail' && password='$password'";
    $d=mysqli_query($conn,$sql);
    $t=mysqli_num_rows($d);
    // echo $t;
    if($t == 1)
    {
      $_SESSION['user_name']=$uemail;
     header('location:show.php');//redirect file
    
    }
    else
    {
      echo "login fail";
    }
}



?>