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
    <h3>Home Page</h3>
  </div>
  <div id="nav"> <a href="http://ivvc.yhscs.us/">Home</a><br>
    <a href="http://ivvc.yhscs.us/course.php">Course Info</a><br>
    <a href="http://ivvc.yhscs.us/survey.php">Take Survey</a><br>
  </div>
  <div id="body">
    <p>
      <input id="courseBtn" type="button" class="button" value="Course Info" onMouseOver="mouseOverCourse()" onClick="window.location.href='/course.php'"/>
    </p>
    <p>
      <input id="surveyBtn" type="button" class="button" value="Take Survey" onMouseOver="mouseOverSurvey()" onClick="window.location.href='/survey.php'"/>
    </p>
    <p>
      <input id="adminBtn" type="button" class="button" value="Admin Portal" onMouseOver="mouseOverAdmin()" onClick="promptPassword()"/>
    </p>
    <p>
    <h3 id="description">Hover over a button to find out what they do!</h3>
    </p>
  </div>
  <div class="push"></div>
</div>
<div class="footer">
  <h3>Made for YHS IVVC 2016</h3>
</div>
<script>
function mouseOverCourse() 
{
    document.getElementById("description").innerHTML = "Clicking this button will take you to the Course Information page. You will see an overview of all available courses at IVVC as well as a brief descrpition and any necessary requirements as well.";
}

function mouseOverSurvey() 
{
    document.getElementById("description").innerHTML = "Clicking this button will take you to the Course Selection page. Here you will fill out the survey for which two IVVC courses you would be interested in during the field trip.";
}

function mouseOverAdmin() 
{
    document.getElementById("description").innerHTML = "Clicking this button will take you to the Admin page. THIS IS FOR TEACHERS/COUNSELORS ONLY! Appropriate login information is required to access this page.";
}

function promptPassword()
{
	window.location.href='/login.php'
}
</script>
</body>
</html>