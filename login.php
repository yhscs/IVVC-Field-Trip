<?php
   session_start();
   if(isset($_SESSION['login_user']))
	{
		header("location: admin.php");
		die();
	}
	
	include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {     
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
	  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $mypassword = hash('sha256', $mypassword, $row['salt']); 
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      	
      if($count == 1) 
	  {
		  $_SESSION['login_user'] = $_POST['username'];
		  header("Location: admin.php");
		  die();
	  }
	  else 
	  {$error = "Your username or password is invalid!";}
   }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>YHS IVVC</title>
<link rel="stylesheet" type="text/css" media="screen" href="layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body bgcolor = "#FFFFFF">
<div align = "center">
  <div style = "width:300px; border: solid 1px #333333; " align = "left">
    <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
    <div style = "margin:30px">
      <form action = "" method = "post">
        <label>Username:</label>
        <input type = "text" name = "username" class = "box"/>
        <br />
        <br />
        <label>Password:</label>
        <input type = "password" name = "password" class = "box" />
        <br/>
        <br />
        <input type = "submit" value = " Submit "/>
        <br />
      </form>
      <div style = "font-size:13px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </div>
  </div>
  <p>
      <input id="courseBtn" type="button" class="buttonHome" value="Go Back" onClick="window.location.href='/index.php'"/>
    </p>
</div>
</body>
</html>