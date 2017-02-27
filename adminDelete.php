<?php
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
		die();
	}
	
	include("config.php");
	if (isset($_GET['id']) && is_numeric($_GET['id']))
 	{

 		$id = $_GET['id'];
 
 		$sql = "DELETE FROM courses WHERE id='$id'";
 		$result = mysqli_query($db, $sql)
		 or die(mysql_error()); 
 
  		echo "<meta http-equiv='refresh' content='0;url=http://ivvc.yhscs.us/courseView.php'>";
 	}
 else
 {
 	echo "<meta http-equiv='refresh' content='0;url=http://ivvc.yhscs.us/courseView.php'>";
 }
?>
