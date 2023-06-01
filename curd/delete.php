
<!-- record delete------------------------------------------------------------ -->
<?php
include "db_connect.php";
 $id=$_GET['id'];
 $sql="DELETE FROM student_form where id='$id'";
 $d=mysqli_query($conn,$sql);
 if($d){
    header("location:show.php");
    echo "<script>alert('Record Deleted')</script>";
    }else{
        echo "record not delete";
    }

?>