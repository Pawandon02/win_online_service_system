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
    <form action="show_services.php" method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
        $search_value=$_POST["search"];
        $sql="select * from services where cname like '%$search_value%' or cdesc like '%$search_value%'";

        $res=mysqli_query($conn,$sql);
        // $row=mysqli_fetch_array($res);
 echo "<table><tr><th>cid</th><th>Name</th><th>Image</th><th>Description</th><th>Time</th><th>Fees</th></tr>";
     while( $row=mysqli_fetch_array($res))
     {
      ?>
    <tr>

        <td>
            <?php echo $row['cid']; ?>
        </td>
        <td>
            <?php echo $row['cname']; ?>
        </td>
        <td>
            <?php echo "<img height=100  width=100 src='images/$row[2]'>";?>
        </td>
        <td>
            <?php echo $row['cdesc']; ?>
        </td>
        <td>
            <?php echo $row['cdur']." month"; ?>
        </td>
        <td>
            <?php echo $row['cfees']."Rs."; ?>
        </td>

         <?php
/*         $cid=$row['cid'];
         $uid=$_SESSION['uid'];
         $sqql="select email from user_reg where uid=$uid";
           $result1=mysqli_query($conn,$sqql);
          $row1=mysqli_fetch_array($result1);
          $email=$row1[0];
          $sql="select uemail from enrolled_course where cid=$cid";
          $result2=mysqli_query($conn,$sql);
          $row2=mysqli_fetch_array($result2);

                   if($row2[0]==$email){?>
                     <a href="unenroll_courses.php?id=<?php echo $row['cid'] ;?>"><font color='darkblue'>UnEnroll</font></a>;
                     <?php
                   }
                   else{?>
                    <a href="enroll_courses.php?id=<?php echo $row['cid'] ;?>">Enroll</a>;
                    <?php
                  }
*/
                 ?>
    </tr>
    <?php
     }
}
else{
    $sql="select * from services";
  $result=mysqli_query($conn,$sql);
echo "<table><tr><th>ID</th><th>Name</th><th>Image</th><th>Description</th><th>Time</th><th>Fees</th></tr>";

      while($row=mysqli_fetch_array($result))
     {
      ?>
    <tr>

        <td>
            <?php echo $row['cid']; ?>
        </td>
        <td>
            <?php echo $row['cname']; ?>
        </td>
        <td>
            <?php echo "<img height=100  width=100 src='images/$row[2]'>";?>
        </td>
        <td>
            <?php echo $row['cdesc']; ?>
        </td>
        <td>
            <?php echo $row['cdur']." month"; ?>
        </td>
        <td>
            <?php echo $row['cfees']."Rs."; ?>
        </td>
         <?php
 /*        $cid=$row['cid'];
         $uid=$_SESSION['uid'];
         $uid1=0;
         // $sqql="select email from user_reg where uid=$uid";
         //   $result1=mysqli_query($conn,$sqql);
         //  $row1=mysqli_fetch_array($result1);
         //  $email=$row1[0];
          $sql="select uid from enrolled_course where cid=$cid";
          $result2=mysqli_query($conn,$sql);
          //$row2=mysqli_fetch_array($result2);
          while($row2=mysqli_fetch_array($result2))
          {
                if($row2[0]==$uid)
                {
                 $uid1=$row2[0];
                }
          }
         // echo $uid1 ;
                   if($uid1==$uid){?>
                     <a href="unenroll_courses.php?id=<?php echo $row['cid'] ;?>"><font color='maroon'>UnEnroll</font></a>
                     <?php
                   }
                   else{?>
                    <a href="enroll_courses.php?id=<?php echo $row['cid'] ;?>">Enroll</a>
                    <?php
                  }
*/
                 ?>

      <!-- <td><a href="enroll_courses.php?id=<?php echo $row['cid'] ;?>">Enroll</a></td> -->

    </tr>
    <?php
     }
}
?>
    </form>
    </div>
</body>

</html>