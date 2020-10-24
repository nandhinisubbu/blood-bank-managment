<?php include('admin/function.php'); ?>
<?php include('header.php'); ?>
<div class="main_ridoy_body">
<div class="main_ridoy">
				  <img height="80px" style="margin:auto; margin-top:10px" src="Images/camps.png">
					<br /><br />
<div class="border">
<table cellpadding="0" cellspacing="0" width="auto">
            
							<?php
								$cn=makeconnection();
								$s="select * from camp,state,city where camp.state=state.state_id and camp.city=city.city_id";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);
									//echo $r;
									$n=0;
									while($data=mysqli_fetch_array($result))
									{
										if($n%2==0)
										{
										?>
		<tr>
								<?php
							}?> 
         <td> 

<div class="cont_table">		 
			<table id="table_cont" cellpadding="0" cellspacing="0" class="tableborder" width="" style="border:none">
			
					<tr>
						<td id="camp_title" ><?php echo $data[1]; ?></td>
					</tr>
					
					<tr>
						<td align="centr"> 
							<a href="Admin/pic/<?php echo $data[5] ?>"data-lightbox="image-1"> <img id="camp_img" src="Admin/pic/<?php echo $data[5] ?>"/></a>
						</td>
					</tr>
					
					<tr>
						<td><p id="text">Organised By: <?php echo $data[2]; ?></p></td>
					</tr>
						  
						
					<tr>
						<td id="text">State: <?php echo $data[8]; ?></td>
					</tr>
						 
					<tr>
						<td id="text">City: <?php echo $data[10]; ?></td>
					</tr>
						  
					<tr>
						<td id="text"><p><?php echo $data[2]; ?></p></td>
					</tr>
					
					<tr>
						<td id="view_camp_gallery" class="title"><a href="campgallary.php?cid=<?php echo $data[0];  ?>"><p id="ctext">View Camp Gallary</p></td>
					</tr>
						
			</table>
</div>
</div>
     </td>
        <?php
        if($n%2==1)
	 {
	 ?>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
         <tr><td colspan="2">&nbsp;</td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
        <?php
	}
	$n=$n+1;
		
	}?>
	
	
</table>

</div>
</div>
      <div class="clear"></div>
<?php include 'footer.php'; ?>