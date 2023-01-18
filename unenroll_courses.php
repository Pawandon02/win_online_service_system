<?php
session_start();
include'admin_conn.php';
if(!isset($_SESSION['uid']))
{
  header("Location:user_login.php");
}
?>
<?php
     if(isset($_GET["id"]))
    {
         $cid=$_GET["id"];
         $uid=$_SESSION['uid'];
         $sql="delete from enrolled_course where cid=$cid and uid=$uid";
         $result=mysqli_query($conn,$sql);
         if($result)
         {
         	header("Location:show_courses.php");
         }
         else{
         	echo "not unenroll successfully";
         }
     }
?>