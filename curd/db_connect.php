<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="responsiveform";
 $conn=mysqli_connect($servername,$username,$password,$dbname);
 if(isset($conn))
 {
    //echo "connection";
 }
 else
 {
    //echo "not connection".mysqli_connect_error();
 }
?>