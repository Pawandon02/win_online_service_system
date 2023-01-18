<?php
include'admin_conn.php';
//get data from user
$femail=$_POST["uemail"];
$pwd=$_POST["pswd"];
	// $sql="insert into users (username,password)values('$fname',$pwd)";
$sql="select * from admin_login where email='$femail' and passsword=$pwd";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
	// echo $sql;
	// $result=mysqli_query($conn,$sql);
	if($row){
		  session_start();
		  $_SESSION['name']="Priyank";
          header("location:admin_welcome.php") ;
	}
	else{
		echo "username or password  is incorrect";
	}
?>