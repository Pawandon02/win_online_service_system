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
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php

    $uid=$_SESSION['uid'];
    $sql="select cid,status from mybooking where uid=$uid";
     $result=mysqli_query($conn,$sql);
     echo "<table><tr><th>Course name</th><th>Course image</th><th>Course description</th><th>course duration</th><th>Course fees</th><th>Booking ID</th><th>Status</th></tr>";

    while($row=mysqli_fetch_array($result))
    {
    	$cid=$row[0];
    	$status=$row[1];
    	if($status=="approved")
    	{

    	     $sqql="select * from services s,mybooking m where s.cid=$cid and s.cid=m.cid";
    	      $res=mysqli_query($conn,$sqql);
    	      while( $row1=mysqli_fetch_array($res))
               {
                  ?>
                    <tr>

                    <td>
                        <?php echo $row1['cname']; ?>
                    </td>
                    <td>
                        <?php echo "<img height=100  width=100 src='images/$row1[2]'>";?>
                    </td>
                    <td>
                        <?php echo $row1['cdesc']; ?>
                    </td>
                    <td>
                        <?php echo $row1['cdur']." month"; ?>
                    </td>
                    <td>
                        <?php echo $row1['cfees']."Rs."; ?>
                    </td>
                    <td>
                        <?php echo $row1['bid']; ?>
                    </td>
                    <td>
                        <?php echo $row1['status']; ?>
                    </td>
                   </tr><?php
                }
    	}
    	else{
    		echo "your enrolled course will be appear here shortly.....";
    	}

    }
echo "</table>";
?>
</body></html>