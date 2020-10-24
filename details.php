<?php 
include 'Admin/function.php';
$cn = makeconnection();
// echo $_REQUEST['q'];
$sql = "select * from requestes where req_id = '". $_REQUEST["q"]."' ";
$query = mysqli_query($cn,$sql);
$result = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details about pateint</title>
	<link rel="stylesheet" href="css/details.css" type="text/css">
</head>
<body>

<div class="main">
<div class="details">
<h2>Details about patient</h2>
<table>
		<tr>
			<td>Name</td>
			<td id="sec"><?php echo $result[1]; ?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><?php echo $result[2]; ?></td>
		</tr>
		<tr>
			<td>Age</td>
			<td><?php echo $result[3]; ?></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><?php echo $result[4]; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $result[5]; ?></td>
		</tr>
		<tr>
			<td>Blood Group</td>
			<td><?php echo $result[6]; ?></td>
		</tr>
		<tr>
			<td>Required Date</td>
			<td><?php echo $result[7]; ?></td>
		</tr>
		<tr>
			<td>Hospital Name</td>
			<td><?php echo $result[9]; ?></td>
		</tr>
		<tr>
			<td>Details</td>
			<td><?php echo $result[8]; ?></td>
		</tr>
		


</table>

</div>
</div>
</body>
</html>