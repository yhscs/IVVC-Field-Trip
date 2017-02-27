<?php
	function mysqli_result($result, $row, $field = 0) 
	{
    	$result->data_seek($row);
    	$data = $result->fetch_array();
    	return $data[$field];
	}
	
	include('config.php');
	
	$per_page = 10;
	
	$sql = "SELECT * FROM courses ORDER BY courseName ASC";
	$result = mysqli_query($db, $sql);

	$total_results = mysqli_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		$start = 0;
		$end = $per_page; 
	}
	
	echo "<h2>Go to page:</h2>";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='course.php?page=$i'>[$i]</a>";
	}
	echo "</p>";
		
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>Course Name</th> <th>Course Description</th></tr>";

	for ($i = $start; $i < $end; $i++)
	{
		if ($i == $total_results) { break; }
		echo "<tr>";
		echo '<td>' . mysqli_result($result, $i, 'courseName') . '</td>';
		echo '<td>' . mysqli_result($result, $i, 'courseDescription') . '</td>';
		echo "</tr>"; 
	}
	echo "</table>"; 	
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>YHS IVVC</title>
<link rel="stylesheet" type="text/css" media="screen" href="layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<p><input id="backBtn" type="button" class="buttonHome" value="Go Back" onClick="window.location.href='/index.php'"/></p>
</body>
</html>