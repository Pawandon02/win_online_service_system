<?php
session_start();
include'admin_conn.php';
/*
if(!isset($_SESSION['name']))
{
  header("Location:admin_login.php");
}
*/
//get data from use
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $cid=$_POST["cid"];
   $uid=$_POST["uid"];
      $sql="insert into mybooking(cid,uid)values('$cid','$uid')";
      echo $sql;
      $result=mysqli_query($conn,$sql);
      if($result)
      {
      echo "Record Inserted...";
/*
        $sql="select * from mybooking";
        $result=mysqli_query($conn,$sql);
        echo "<table><tr><th>Course Id</th><th>Course_Name</th><th>Course Image</th><th>Course_Description</th><th>Course Duration</th><th>Course Fees</th><th>Update Course</th><th>Delete course</th></tr>";
        while($row=mysqli_fetch_array($result))
        {
          ?>
          <tr>
              <td>
                  <?php echo $row['cid']; ?>
              </td>
              <td>
                  <?php echo $row['uid']; ?>
              </td>
          </tr>
            <?php
        }//while loop
*/
}//if loop result wala
      else
      {
        echo "not inserted ";
      }

}//if post wala
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="text-align: center;margin-top: 50px; ">
        <form action="insert_bookings.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="uname" placeholder="Enter Service ID" name="cid" required><br><br>
            <input type="text" id="uname" placeholder="Enter User ID" name="uid" required><br><br>
            <button type="submit" name="upload">upload</button><br>
        </form>
    </div>
</body>

</html>