<?php
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
		die();
	}
 function renderForm($courseName, $courseDescription, $error)
 {
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>YHS IVVC</title>
<link rel="stylesheet" type="text/css" media="screen" href="layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<?php 
 if ($error != '')
 {
 echo '<div style="font-size:16px; color:#cc0000; margin-top:10px">'.$error.'</div>';
 }
 ?>
<form action="" method="post">
<h2>Adding New Course</h2>
<h2>IF THE COURSE IS SENIOR EXCLUSIVE, PLEASE TYPE "(SENIOR ONLY)" BEFORE THE COURSE TITLE!</h2>
  <div> <strong>Course Name: *</strong>
    <br/><textarea cols="50" name="courseName"></textarea>
    <br/>
    <strong>Course Description: *</strong>
    <br/><textarea rows="4" cols="50" name="courseDescription"></textarea>
    <br/>
    <p>* required</p>
    <input type="submit" id="submitBtn" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Cancel">
  </div>
</form>
</body>
</html>
<?php 
 }
 
 include('config.php');
 
 if (isset($_POST['cancel']))
 { 
	echo "<script>location.href = '/courseView.php'</script>";
 }
 
 if (isset($_POST['submit']))
 { 
 $courseName = $_POST['courseName'];
 $courseDescription = $_POST['courseDescription'];
 
 if ($courseName == '' || $courseDescription == '')
 {
 $error = 'ERROR: Please fill in all required fields!';
 
 renderForm($courseName, $courseDescription, $error);
 }
 else
 {
 $sql = "INSERT courses SET courseName='$courseName', courseDescription='$courseDescription'";
 mysqli_query($db, $sql)
 or die(mysql_error()); 
 
 header("Location: courseView.php"); 
 }
 }
 else
 {
 renderForm('','','');
 }
?>
<script>
document.getElementById('submitBtn').addEventListener("click", function(){
    window.btn_clicked = true;
});
window.onbeforeunload = function(){
    if(!window.btn_clicked){
        return 'WARNING! Your input will not be saved.';
    }
};
</script>