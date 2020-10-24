<?php include('admin/function.php'); ?>
<?php require 'header.php'; ?>
<div style="height:auto; width:500px; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
	<form method="post" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" width="500px" height="480px" style="margin:auto" >

			<tr><td colspan="2" align="center"><img src="Images/brequest.png" height="90px" /></td></tr>

			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>   



			<tr><td class="lefttd" align="center"> Name:</td><td><input type="text" name="t1" required="required"  title="please enter only character  between 5 to 15 for donor name" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">Gender</td><td><input name="r1" type="radio" value="male" checked="checked">Male<input name="r1" type="radio" value="female">Female</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">Age</td><td><input type="number" name="t2" required="required" pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">Mobile No</td><td><input type="number" name="t3"  required="required" pattern="[0-9]{10,12}" title="please enter only numbers between 10 to 12 for mobile no." /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">Select Blood Group </td><td><select name="t4" required><option value="">Select</option>
				<?php
				$cn=makeconnection();
				$s="select * from bloodgroup";
				$result=mysqli_query($cn,$s);
				$r=mysqli_num_rows($result);
	//echo $r;
				while($data=mysqli_fetch_array($result))
				{
					echo "<option value=$data[1]>$data[1]</option>";	
				}
				mysqli_close($cn);

				?>



			</select></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">E-Mail</td><td><input type="email" name="t5" required="required" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td class="lefttd" align="center">Till Required Date</td><td>
				<select name="month">
					<option value="1">JAN</option>
					<option value="2">FEB</option>
					<option value="3">MARCH</option>
					<option value="4">APRIL</option>
					<option value="5">MAY</option>
					<option value="6">JUNE</option>
					<option value="7">JULY</option>
					<option value="8">AUG</option>
					<option value="9">SEPT</option>
					<option value="10">OCT</option>
					<option value="11">NOV</option>
					<option value="12">DEC</option>
				</select>
				<select name="day">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<input type="text" name="year" style=" width:50px"  /></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td class="lefttd" align="center">Hospital Name</td><td><input type="text" name="t8" required="required" /></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td class="lefttd" align="center">Detail</td><td><textarea name="t7"></textarea></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td><td><input type="submit" value="Submit" name="sbmt" style="border:0px; margin-bottom: 10px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr></table>

			</form>
		</div>

		<div class="clear"></div>
		<?php require 'footer.php'; ?>

		<?php
		if(isset($_POST["sbmt"])) 
		{
			

			$cn=makeconnection();
			$d=$_POST["year"]."/".$_POST["month"]."/".$_POST["day"];
			$s="insert into requestes(name,gender,age,mobile,bgroup,email,reqdate,detail,hospital_name) values('" . $_POST["t1"] ."','" . $_POST["r1"] . "','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"] . "','" . $_POST["t5"] . "','" . $d .  "','" .  $_POST["t7"]  ."','" .  $_POST["t8"]  ."')";
			
			
			$q=mysqli_query($cn,$s);
			mysqli_close($cn);
			if($q>0)
			{
				echo "<script>alert('Record Save');</script>";
			}
			else
				{echo "<script>alert('Saving Record Failed');</script>";
		}
		
	}	
	

	?> 
