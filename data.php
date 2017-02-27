<table border="1">
    <tr>
    	<th>First Name</th>
		<th>Last Name</th>
		<th>Student ID</th>
        <th>Course 1</th>
        <th>Course 2</th>
        <th>Course 3</th>
        <th>0=Afternoon, 1=Morning</th>
	</tr>
	<?php
	include('config.php');
	
	$sql = "SELECT * FROM surveys";
	$result = mysqli_query($db, $sql);
	while($data = mysqli_fetch_assoc($result))
	{
		echo '
		<tr>
			<td>'.$data['firstName'].'</td>
			<td>'.$data['lastName'].'</td>
			<td>'.$data['studentID'].'</td>
			<td>'.$data['course1'].'</td>
			<td>'.$data['course2'].'</td>
			<td>'.$data['course3'].'</td>
			<td>'.$data['morning'].'</td>
		</tr>
		';
	}
	?>
</table>