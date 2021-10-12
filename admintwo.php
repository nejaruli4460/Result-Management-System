<?php
session_start();
include("connection.php");
$uniname=$_SESSION["uname"];
$date=$_SESSION["date"];
$exam=$_SESSION["exam"];
if(isset($_POST["sub"]))
{
$reg=$_POST["reg"];
$roll=$_POST["roll"];
$dept=$_POST["dept"];
$sub1=$_POST["marks1"];
$sub2=$_POST["marks2"];
$sub3=$_POST["marks3"];
$sub4=$_POST["marks4"];
$sql="insert into record values('$uniname','$date','$exam','$reg','$roll','$dept','$sub1','$sub2','$sub3','$sub4')";
$result=mysqli_query($con,$sql);
echo "<h1 style='color:green;'>Record submitted successfully</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" class="one">
        <p>University Name</p><input type="text" name="uniname" <?php echo"value='$uniname'";?> readonly="readonly">
        <p>Result date</p><input type="text" name="date" placeholder="example:2021-08-23"<?php echo"value='$date'";?>readonly="readonly">
        <p>Examination name</p><input type="text" name="exam"<?php echo"value='$exam'";?>readonly="readonly">
        <p>Registration number</p><input type="text" name="reg"  required >
        <p>Roll number</p><input type="text" name="roll"  required>
        <p>Department</p><input type="text" name="dept"  required>
        <p>subject-1 marks</p><input type="text" name="marks1"  required>
        <p>subject-2 marks</p><input type="text" name="marks2"  required>
        <p>subject-3 marks</p><input type="text" name="marks3"  required>
        <p>subject-4 marks</p><input type="text" name="marks4"  required>
        <input type="submit" value="submit" name="sub">
    </form>
</body>
</html>