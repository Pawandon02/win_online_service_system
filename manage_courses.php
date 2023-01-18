<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php
  include'admin_conn.php';
    $aid=$_GET["id"];
    $btn=$_GET["btn"];  
    $sql = "select * from courses where cid=$aid";
    $result=mysqli_query($conn,$sql); // select query
    $data = mysqli_fetch_array($result); // fetch data
    if($btn=='update')
    {
      ?>
    <h3>Update Data</h3>

    <form action="update_confirm.php" method="POST" enctype="multipart/form-data">
        <input type="text" id="cid" placeholder="Enter course id" name="cid" readonly="true"
            value="<?php echo $data['cid'] ?>" required><br><br>
        <input type="text" id="cname" placeholder="Enter course name" name="cname" value="<?php echo $data['cname'] ?>"
            required><br><br>
        <input type="file" name="uploadfile" value="<?php echo $data['cimg'] ?>"><br><br>
        <input type="text" id="cdesc" placeholder="Enter description" name="cdesc" value="<?php echo $data['cdesc'] ?>"
            required><br><br>
        <input type="text" id="cdur" placeholder="Enter duration" name="cdur" value="<?php echo $data['cdur'] ?>"
            required><br><br>
        <input type="text" id="cfees" placeholder="Enter fees" name="cfees" value="<?php echo $data['cfees'] ?>"
            required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    }
    else{
        $sql="delete from courses where cid='$aid'";
        $result = mysqli_query($conn,$sql);
          if($result) 
        {
         echo "deleteed succesfully"; // redirects to all records page
          ?>
    <p><a href="display_all_courses.php">click here to see the change</a></p>
    <?php
        }
      }
    ?>
</body>

</html>