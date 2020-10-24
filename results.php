<?php
$mysqli = new mysqli('localhost', 'root', '', 'bloodbank');
if(!$mysqli)
{
	echo 'database not connected';
}
$find = $_GET['find'];
switch ($find)
{
	case 'state':
	$query = 'SELECT state_id, state_name FROM state';
	break;
	case 'district':
	$query = 'SELECT dis_id, dis_name FROM district WHERE
	state_id='.$_GET['id'];
	break;
	case 'city':
	$query = 'SELECT city_id, city_name FROM city
	WHERE district='.$_GET['id'];
	break;
	default:
	break;
	// case 'information':
	// $query = 'SELECT id, description FROM towninfo
	// WHERE townId='.$_GET['id'] .' LIMIT 1';
	// break;
}
if ($mysqli->query($query))
{
	$result = $mysqli->query($query);
	if($find == 'city'){
		?>

	<option value="0">All</option>
<?php 
}
else{
	?>

<option value ="">Select</option>
		<?php
	}
		while($row = $result->fetch_array())
		{
			?>
			<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
			<?php
		}
}
?>