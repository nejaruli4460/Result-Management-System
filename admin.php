<?php
include("connection.php");
session_start();
if(isset($_POST["sub"]))
{
 $uniname=$_POST["uniname"];
 $date=$_POST["date"];
 $exam=$_POST["exam"];
 $sql="insert into university_record(university_name,date,exam) values('$uniname','$date','$exam')";
 $result=mysqli_query($con,$sql);
 $_SESSION["uname"]=$uniname;
 $_SESSION["date"]=$date;
 $_SESSION["exam"]=$exam;
 header("location:admintwo.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js">
    </script>
</head>
<body>
    <form action="" method="post" class="one">
        <p>University Name</p> <select class="input" name="uniname">
                    <option value="Calcutta University">Calcutta University</option>
                    <option value="GourBanga University">GourBanga University</option>
                    <option value="West Bengal State University">West Bengal State University</option>
                    <option value="Kalyani University">Kalyani University</option>
                </select>
        <p>Result date</p><input type="text" name="date" placeholder="example:2021-08-23" required>
        <p>Examination name</p>
                <select name="exam" class="input">
                    <option value="sem-1">sem-1</option>
                    <option value="sem-2">sem-2</option>
                    <option value="sem-3">sem-3</option>
                    <option value="sem-4">sem-4</option>
                    <option value="sem-5">sem-5</option>
                    <option value="sem-6">sem-6</option>
                </select>
        <input type="submit" value="submit" name="sub" id="submit">
    </form>
</body>
</html>