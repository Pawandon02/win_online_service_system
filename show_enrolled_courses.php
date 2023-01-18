<?php
session_start();
include'admin_conn.php';
if(!isset($_SESSION['name']))
{
  header("Location:admin_login.php");
}
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
    <h3>Students record</h3>
    <div style="text-align: center;margin-top: 50px;">
        <?php
   //make connection with server
     
  $sql="select * from enrolled_course";
  $result=mysqli_query($conn,$sql);
     echo "<table><tr><th>eid</th><th>user_id</th><th>username</th><th>User_Email</th><th>Course id</th><th>Course_Name</th><th>Enrolled Date</th><th>Status</th></tr>";
     while($row=mysqli_fetch_array($result))
     {
      ?>
        <tr>
            <td>
                <?php echo $row["eid"]; ?>
            </td>
            <td>
                <?php echo $row["uid"]; ?>
            </td>
            <td>
                <?php echo $row["uname"]; ?>
            </td>
            <td>
                <?php echo $row["uemail"]; ?>
            </td>
            
            <td>
                <?php echo $row["cid"]; ?>
            </td>
            <td>
                <?php echo $row["cname"]; ?>
            </td>
            <td>
                <?php echo $row["e_date"]; ?>
            </td>
            <td>
                <?php 
                  if($row["status"]=="approved"){
                    echo "<font color='green'>Approved</font>";
                  }
                  else{
                    echo "<a href='admin_approve_enroll.php?eid=$row[0]'><font color='red'>approve</font></a>";
                  }
                 ?>
            </td>

          <!--  <td><a href="view_profile.php?uid=<?php echo $row['uid'] ;?>">view</a></td> -->
                
        </tr>
        <?php
     }
?>
    </div>
</body>

</html>