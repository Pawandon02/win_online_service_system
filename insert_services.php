<?php
session_start();
include'admin_conn.php';
if(!isset($_SESSION['name']))
{
  header("Location:admin_login.php");
}
//get data from use
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $cname=$_POST["cname"];
   $cdesc=$_POST["cdesc"];
   $cdur=$_POST["cdur"];
   $cfees=$_POST["cfees"];
   $filename=$_FILES["uploadfile"]["name"];
   $tempname=$_FILES["uploadfile"]["tmp_name"];
   $folder='images/'.$filename;
   // $sql="select cname from courses where cname='$cname'";
   // $result=mysqli_query($conn,$sql);
   // if($result)
   // {
   //  echo "course already insert";
   // }
   // else
   // {
      if(move_uploaded_file($tempname, $folder))
   {
      $sql="insert into services(cname,cimg,cdesc,cdur,cfees)values('$cname','$filename','$cdesc',$cdur,$cfees)";
      echo $sql;
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        $sql="select * from services";
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
                  <?php echo $row['cname']; ?>
              </td>
              <td>
                  <?php echo "<img height=100  width=100 src='images/$row[2]'>";?>
              </td>
              <td>
                  <?php echo $row['cdesc']; ?>
              </td>
              <td>
                  <?php echo $row['cdur']." Days"; ?>
              </td>
              <td>
                  <?php echo $row['cfees']."Rs."; ?>
              </td>
              <td><a href="manage_courses.php?id=<?php echo $row['cid'] ;?>&btn=<?php echo "update" ;?>">update</a></td>
              <td><a href="manage_courses.php?id=<?php echo $row['cid']; ?>&btn=<?php echo "delete" ;?> ">Delete</a></td>
          </tr>
            <?php
        }//while loop
      }//if loop result wala
      else
      {
        echo "not inserted ";
      }
    }//move if loop
    else{
      echo "file not uploaded ";
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
        <form action="insert_services.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="uname" placeholder="Enter course name" name="cname" required><br><br>
            <input type="file" name="uploadfile"><br>
            <input type="text" id="cdesc" placeholder="Enter description" name="cdesc" required><br><br>
            <input type="text" id="cdur" placeholder="Enter duration" name="cdur" required><br><br>
            <input type="text" id="cfees" placeholder="Enter fees" name="cfees" required><br><br>
            <button type="submit" name="upload">upload</button><br>
        </form>
    </div>
</body>

</html>