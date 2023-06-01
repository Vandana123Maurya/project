


<?php
session_start();
include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <style>
        h3{
            margin-top:40px;
            margin-left:30px;
            color:white; 
            font-size:2em;
            text-align:center;
        }
        .main{
            background-color:black;
            color:white;"
        }
        .t1{
            margin:auto;
            margin-top:50px;
            width:80%;
            border-radius:5px;
            background-color:white;
            box-shadow:2px 3px 2px gray;
        }
        .action{
           border:2px solid black;
           text-decoration:none;
           padding:10px;
           margin:5px;
          
        }
       .edit .delete{
            background-color:orange;
            text-decoration:none;
            box-shadow:2px 2px 2px gray;
            padding:5px;
            text-decoration:none;
            margin:5px;
        
        }
        .delete:hover{
            background-color:black;
            color:white;
        }
        .edit:hover{
            background-color:black;
            color:white;
        }
        body{
            background-image:linear-gradient(rgb(31, 205, 144),rgb(53, 165, 230));
            background-repeat:no-repeat;
            background-attachment:fixed;
        }
    </style>    
 </head>


  <body>
  <a href="logout_form.php"><input type="submit" name="" value="LOGOUT"style="background-color:blue;
  color:white;padding:10px;font-size:15px;border:none;font-weight:bolder;box-shadow:3px 2px 2px gray;
  border-radius:5px;cursor:pointer"></a>
    <h3>All Records</h3>
    <?php
    $userprofile=$_SESSION['user_name'];
    if($userprofile==true)
    {

    }
    else
    {
        header('location:login_form.php');
    }
    $sql="SELECT *FROM student_form";
    $r=mysqli_query($conn,$sql)or die("query unsuccessfull");
    if(mysqli_num_rows($r)>0)
    {
    ?>
   <table border="2" cellpadding="10px"cellspacing="0"class="t1">
    <thead class="main">
        <th>ID</th>
        <th>STUDENT IMAGE</th>
        <th>FIRST NAME</th>
        <th> LAST NAME</th>
        <th>PASSWORD</th>
        <th>CONFIRM PASSWORD</th>
        <th>GENDER</th>
        <th>EMAIL ADDRESS</th>
        <th>PHONE NUMBER</th>
        <th>CASTE</th>
        <th>ADDRESS</th>
        <th style="width:500px">ACTION</th>
    </thead>
    <tbody>
      <?php
       $i=1;
         while($row=mysqli_fetch_assoc($r))
         {
           
        echo "<tr>
         <td>".$i."</td>
         <td><img src='".$row['stu_image']."' height='120px'width='120px'></td>
         <td>".$row['first_name']."</td>
         <td>".$row['last_name']."</td>
         <td>".$row['password']."</td>
         <td>".$row['confirm_password']."</td>
         <td>".$row['gender']."</td>
         <td>".$row['email']."</td>
         <td>".$row['phone']."</td>
         <td>".$row['caste']."</td>
         <td>".$row['address']."</td>
         <td><a href='update.php?id=$row[id]'><input type='submit'value='Edit' class='edit'></a>
         <a href='delete.php?id=$row[id]'><input type='submit'value='Delete' class='delete' onclick='return fun1();'></a></td>
       </tr>
       ";
       $i++;
     
    
       }
       
       ?>
    </tbody>
   </table>
 
    <?php
    }else{
      echo "<h2>No record found</h2>";
    }
    mysqli_close($conn); ?>
  </body>

  <script>

    function fun1()
    {
        return confirm("Are you sure you want to delete this records");
    }
  </script>
</html>

