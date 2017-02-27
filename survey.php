<?php
 function renderForm($firstName, $lastName, $studentID, $course1, $course2, $error)
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
<h2>IVVC Course Field Trip</h2>
<h2>Be sure to select two courses and fill out for your ID only!</h2>
  <div> <strong>First Name: *</strong>
    <br/><input type="text" name="firstName" />
    <br/>
    <strong>Last Name: *</strong>
    <br/><input type="text" name="lastName" />
    <br/>
    <strong>ID Number: *</strong>
    <br/><input type="text" name="studentID" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="7" /> 
    <br/>
    <strong>Preferred Time of Day: *</strong>
    <select name="time">
	<option value="-">-</option>
    <option value="1">Morning</option>
    <option value="0">Afternoon</option></select>
    <br />
    <strong>Course 1: *</strong>
    <?php
	include('config.php'); 
	$warning = true;
	
	$sql = "SELECT courseName FROM courses";
	$result = mysqli_query($db, $sql);
	echo '<select name="course1">';
	echo '<option value="-">-</option>';
	while ($row = mysqli_fetch_array($result)) 
	{
   	echo '<option value="'.$row['courseName'].'">'.$row['courseName'].'</option>';
	}
	echo '</select>';
    ?>
    <br />
   	<strong>Course 2: *</strong>
    <?php
	include('config.php'); 
	
	$sql = "SELECT courseName FROM courses";
	$result = mysqli_query($db, $sql);
	echo '<select name="course2">';
	echo '<option value="-">-</option>';
	while ($row = mysqli_fetch_array($result)) 
	{
   	echo '<option value="'.$row['courseName'].'">'.$row['courseName'].'</option>';
	}
	echo '</select>';
    ?>
    <br />
    <strong>Course 3: *</strong>
    <?php
	include('config.php'); 
	
	$sql = "SELECT courseName FROM courses";
	$result = mysqli_query($db, $sql);
	echo '<select name="course3">';
	echo '<option value="-">-</option>';
	while ($row = mysqli_fetch_array($result)) 
	{
   	echo '<option value="'.$row['courseName'].'">'.$row['courseName'].'</option>';
	}
	echo '</select>';
    ?>
    <br />
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
	echo "<script>location.href = '/index.php'</script>";
 }
 
 if (isset($_POST['submit']))
 {
 $firstName = $_POST['firstName'];
 $lastName = $_POST['lastName'];
 $studentID = $_POST['studentID'];
 $course1 = $_POST['course1'];
 $course2 = $_POST['course2'];
 $course3 = $_POST['course3'];
 $morning = $_POST['time'];
 
 $sql ="SELECT * FROM surveys WHERE studentID='$studentID'";
 $result = mysqli_query($db, $sql);
 
 if ($firstName == '' || $lastName == '' || $studentID == '' || $course1 == '-' || $course2 == '-' || $course3 == '-' || $morning == '-')
 {
 $error = 'ERROR: Please fill in all required fields!';
 renderForm($firstName, $lastName, $studentID, $course1, $course2, $error);
 }
 elseif ($course1 == $course2 || $course1 == $course3 || $course2 == $course3)
 {
 $error = 'ERROR: Please choose two different courses!';
 renderForm($firstName, $lastName, $studentID, $course1, $course2, $error);
 }
 
 elseif (mysqli_num_rows($result) !== 0) 
 {
 $error = 'ERROR: This student ID has already submitted a survey!';
 renderForm($firstName, $lastName, $studentID, $course1, $course2, $error);	 
 }
 
 elseif (strlen($studentID) !== 7) 
 {
 $error = 'ERROR: Please enter a valid student ID!';
 renderForm($firstName, $lastName, $studentID, $course1, $course2, $error);	 
 }
 
 else
 {
 	$sql = "INSERT surveys SET firstName='$firstName', lastName='$lastName', studentID='$studentID', course1='$course1', course2='$course2', course3='$course3', morning='$morning'";
 	mysqli_query($db, $sql)
 	or die(mysql_error()); 
 	echo '<script type="text/javascript">alert("' . "Your input was successful! Thank you!" . '"); </script>';
	echo "<meta http-equiv='refresh' content='0;url=http://ivvc.yhscs.us/index.php'>"; 
 }
 }
 else
 {
 renderForm('','','','','','');
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