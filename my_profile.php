<?php
session_start();
include'admin_conn.php';
if(!isset($_SESSION['uid']))
{
  header("Location:user_login.php");
}
?>
    <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>

        table,tr,td,
         {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h2>MY Profile</h3>
    <div style="text-align: center;margin-top: 50px;">
        <?php
   //make connection with server
   include'admin_conn.php';



       $uid=$_SESSION['uid'];
       $sql="select * from user_reg where uid=$uid";
       $result=mysqli_query($conn,$sql);
       echo "<table>";

       while($row=mysqli_fetch_array($result))
       {
          echo "user_id : "."<b>". $row["uid"]."</b> <br><br>";
          echo "First name : "." <b>".$row["first_name"]."</b> <br><br>";
          echo "Last name : "." <b>".$row["last_name"]."</b><br><br>";
          echo "Email "."<b>".$row["email"]."</b> <br><br>";
          echo "Mobile_no "."<b>".$row["mobile_no"]."</b> <br><br>";
        }
         echo "</table>";

    ?>

    </div>
</body>

</html>