<?php include('admin/function.php'); ?>
<?php require 'header.php'; ?>
<div style="height:400px; width:100%; margin:auto; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
    <div class="s_bg">
<div class="wrap">
<div class="main_cont">
     <div class="main">
        <div class="content">
         
            <table cellpadding="0" cellspacing="0" height="500px" width="1000px" class="tableborder" style="margin:auto" >
         <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3" align="center"><img src="Images/gallery.png" height="80px" /></td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>  
            
        
             <?php
$cn=makeconnection();
$s="select * from gallary,camp where gallary.camp_id=camp.camp_id and gallary.camp_id='" . $_GET["cid"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$n=0;
	while($data=mysqli_fetch_array($result))
	{
		if($n%3==0)
		{
		?>
    
    
            <tr>
            <?php
			
		}?>
            
            
            <td>
          
            

  <a href="Admin/pic/<?php  echo $data[3] ?>" data-lightbox="roadtrip"><img src="Admin/pic/<?php  echo $data[3] ?>" width="250px" height="200px" style="padding-left:40px" /></a>
  
    </td>
        <?php
        if($n%3==2)
	 {
	 ?>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>
          <tr><td colspan="3">&nbsp;</td></tr>
        <?php
	}
	$n=$n+1;
		
	}?>
    </table>
        
        
	</div></div></div></div></div>
    


      <div class="clear"></div>
<?php require 'footer.php'; ?>