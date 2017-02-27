<?php
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header("location: index.php");
		die();
	}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>YHS IVVC</title>
<link rel="stylesheet" type="text/css" media="screen" href="layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<div class="wrapper">
  <div class="header">
    <h3>YHS IVVC Website</h3>
  </div>
  <div class="subheader">
    <h3>YHS IVVC ADMIN PAGE</h3>
    <h4>REMEMBER TO LOG OUT!</h4>
  </div>
  <div id="body">
    <p>
    <h2><u>Courses</u></h2>
    </p>
    <input id="courseViewBtn" type="button" class="button" value="Manage IVVC Courses" onClick="window.location.href='/courseView.php'"/>
    <p>
    <h2><u>Spreadsheet</u></h2>
    </p>
    <input id="spreadsheetBtn" type="button" class="button" value="Download Spreadsheet" onClick="window.location.href='/download.php'"/>
  </div>
  <div>
    <p>&nbsp;</p>
    <p>
      <input id="courseBtn" type="button" class="buttonHome" value="Log Out" onClick="window.location.href='/logout.php'"/>
    </p>
  </div>
  <div class="push"></div>
</div>
<div class="footer">
  <h3>Made for YHS IVVC 2016</h3>
</div>
</body>
</html>