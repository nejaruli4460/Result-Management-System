<?php
include("connection.php");
if(isset($_POST["sub"]))
{
    $name=$_POST["uname"];
    $password=$_POST["pass"];
    $sql="select * from admin_login where username='".$name."' and password='".$password."'  limit 1";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    if($count)
    {
        header("location:admin.php");
    }
    else{
        echo "login failed";
    }
}
?>