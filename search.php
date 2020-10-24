<?php session_start(); ?>
<?php include('Admin/function.php'); ?>
<?php require 'header.php'; ?>


<div style="height:350px;">

	<form method="post" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" width="500px" height="250px" class="tableborder" style="margin:auto; margin-top:100px;" >
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2" align="center"><img src="Images/search.png" height="80px" /></td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td class="lefttd" style="padding-left:40px">Select Blood Group </td><td><select name="s2" required><option value="">Select</option>

				<?php
				$cn=makeconnection();
				$s="select * from bloodgroup";
				$result=mysqli_query($cn,$s);
				$r=mysqli_num_rows($result);
	//echo $r;
				while($data=mysqli_fetch_array($result))
				{
					if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
					{
						echo "<option value=$data[0] selected>$data[1]</option>";
					}
					else
					{
						echo "<option value=$data[0]>$data[1]</option>";
					}



				}
				mysqli_close($cn);

				?>



			</select>

			<?php
			if(isset($_POST["show"]))
			{
				$cn=makeconnection();
				$s="select * from bloodgroup where bg_id='" .$_POST["s2"] ."'";
				$result=mysqli_query($cn,$s);
				$r=mysqli_num_rows($result);
	//echo $r;
				$data=mysqli_fetch_array($result);
				$bg_id=$data[0];
				$bg_name=$data[1];



				mysqli_close($cn);
			}
			?>

		</td></tr>
		<tr><td>&nbsp;</td></tr> 
		<!-- state -->

		<tr><td class="lefttd" style="padding-left:40px">Select State </td><td><select name="state" id="stateList" required><option value="">Select</option>

		</select></td></tr>


		<!-- District -->
		<tr><td>&nbsp;</td></tr>
		<tr><td class="lefttd" style="padding-left:40px">Select District </td><td><select name="district" id="districtList" required><option value="">Select</option>
		</select></td></tr>


		<!-- city -->
		<tr><td>&nbsp;</td></tr>
		<tr><td class="lefttd" style="padding-left:40px">Select City </td><td><select name="city" id="townList" required><option value="">select</option>
		</select></td></tr>
		<tr><td>&nbsp;</td></tr>      
		<tr><td>&nbsp;</td><td><input type="submit" value="Search" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>

		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

	</table>




</form>
</div>


<div class="clear"></div>
<?php require 'footer.php'; ?>
<?php 
if(isset($_POST["sbmt"]))
{
	//header("location:result.php?bg=".$_POST["s2"]);
	$_SESSION['state_id'] = $_POST['state'];
	$_SESSION['district_id'] = $_POST['district'];
	$_SESSION['city_id'] = $_POST['city'];
	echo "<script>location.replace('result.php?bg=". $_POST["s2"] ."');</script>";
}

?>

