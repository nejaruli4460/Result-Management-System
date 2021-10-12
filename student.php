<?php
include("connection.php");
function grade($sub)
{
   if( $sub>=90)
   echo "AA";
   else if($sub>80  && $sub<90) 
   echo "A+";
   else if($sub>70 &&  $sub<80) 
   echo "A";
   else if($sub>60 &&  $sub<70) 
   echo "B+";
   else if($sub>40  && $sub<60) 
   echo "B";
   else if($sub>30  && $sub<40) 
   echo "C";
   else
   echo "X";
}
function remarks($test)
{
    if($test<30)
    echo "FAIL";
    else
    echo "PASS";
}
if(isset($_POST["sub"]))
{
    $uniname=$_POST["state"];
    $reg=$_POST["reg"];
    $roll=$_POST["roll"];
    $date=$_POST["date"];
    $exam=$_POST["exam"];
    $sql="select * from record where university='".$uniname."' and exam='".$exam."' and reg='".$reg."' and roll='".$roll."' and result_date='".$date."' limit 1";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $res=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <div class="header"><h1><?php echo $res['university']; ?></h1></div>
    <div class="heading">
        <div class="naming">
            <p>Registration Number</p>
            <p>Roll Number</p>
        </div>
        <div class="marking">
            <p><?php echo $res['reg']; ?></p>
            <p><?php echo $res['roll']; ?></p>
        </div>
    </div>
    <table border="1" cellpadding=0 cellspacing=0>
        <strong><tr>
            <td>SUBJECT</td>
            <td>TOTAL</td>
            <td>OBTAINED</td>
            <td>GRADE</td>
            <td>REMARKS</td>
        </tr></strong>
        <tr>
            <td>Subject-1</td>
            <td>100</td>
            <td><?php echo $res['subject-1']; ?></td>
            <td><?php echo grade($res['subject-1']) ?></td>
            <td><?php echo remarks($res['subject-1']) ?></td>
        </tr>
        <tr>
        <td>Subject-2</td>
            <td>100</td>
            <td><?php echo $res['subject-2']; ?></td>
            <td><?php echo grade($res['subject-2']) ?></td>
            <td><?php echo remarks($res['subject-2']) ?></td>
        </tr>
        <tr><td>Subject-3</td>
            <td>100</td>
            <td><?php echo $res['subject-3']; ?></td>
            <td><?php echo grade($res['subject-3']) ?></td>
            <td><?php echo remarks($res['subject-3']) ?></td></tr>
        <tr>
        <td>Subject-4</td>
            <td>100</td>
            <td><?php echo $res['subject-4']; ?></td>
            <td><?php echo grade($res['subject-4']) ?></td>
            <td><?php echo remarks($res['subject-4']) ?></td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td>400</td>
        <td><?php echo $total=$res['subject-1']+$res['subject-2']+$res['subject-3']+$res['subject-4'] ?></td>
        <td>
        <?php echo grade(($total/4)) ?>
        </td>
        <td>
        <?php if($res['subject-1']<30||$res['subject-2']<30||$res['subject-3']<30||$res['subject-4']<30)
        {
            echo "SEMESTER NOT CLEARED";
        }
            else
            echo "SEMESTER CLEARED";
        ?>
        </td>
    </tr>
    <tr>
        <td colspan=3>
            PERCENTAGE
        </td>
        <td>
        <?php if($res['subject-1']<30||$res['subject-2']<30||$res['subject-3']<30||$res['subject-4']<30)
        {
            echo "NOT APPLICABLE";
        }
            else
            {
                $per=$total/4;
                echo $per;
                echo"%";
            }
        ?>  
        </td>

    </tr>
    </table>
    <?php
    }
    else
    {
        echo "<h1>result not found</h1>";
        echo "<a href='index.html'>CHECK ANOTHER RESULT</a>";
    }
}

    ?>
</body>
</html>