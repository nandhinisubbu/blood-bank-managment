<?php session_start(); 
$state_id = $_SESSION["state_id"]; 
$district_id = $_SESSION["district_id"]; 
$city_id = $_SESSION["city_id"];


?>
<?php include('Admin/function.php');

$cn=makeconnection();
if($city_id == 0){
  $s="select count(*) from donarregistration,bloodgroup where donarregistration.b_id='". $_REQUEST["bg"]."' and donarregistration.b_id=bloodgroup.bg_id and donarregistration.state_id = '" . $state_id . "' and donarregistration.district_id = '" . $district_id . "' ";
}
else{
  $s="select count(*) from donarregistration,bloodgroup where donarregistration.b_id='". $_REQUEST["bg"]."' and donarregistration.b_id=bloodgroup.bg_id and donarregistration.state_id = '" . $state_id . "' and donarregistration.district_id = '" . $district_id . "' and donarregistration.city_id = '" . $city_id . "' ";
}

$query=mysqli_query($cn,$s);
$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 5;
$last = ceil($rows/$page_rows);
if($last < 1){
  $last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) { 
  $pagenum = 1; 
} else if ($pagenum > $last) { 
  $pagenum = $last; 
}
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
if($city_id == 0){$sql = "select * from donarregistration,bloodgroup where donarregistration.b_id='". $_REQUEST["bg"]."' and donarregistration.b_id=bloodgroup.bg_id and donarregistration.state_id = '" . $state_id . "' and donarregistration.district_id = '" . $district_id . "' $limit";
}
else {
  $sql = "select * from donarregistration,bloodgroup where donarregistration.b_id='". $_REQUEST["bg"]."' and donarregistration.b_id=bloodgroup.bg_id and donarregistration.state_id = '" . $state_id . "' and donarregistration.district_id = '" . $district_id . "' and donarregistration.city_id = '" . $city_id . "' $limit";
}

$result = mysqli_query($cn, $sql);
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
$paginationCtrls = '';
if($last != 1){
 if ($pagenum > 1) {
  $previous = $pagenum - 1;
  $paginationCtrls .= '<a href="'.$_SERVER['SCRIPT_NAME'].'?bg='. $_REQUEST["bg"].'&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
  for($i = $pagenum-4; $i < $pagenum; $i++){
    if($i > 0){
      $paginationCtrls .= '<a href="'.$_SERVER['SCRIPT_NAME'].'?bg='. $_REQUEST["bg"].'&pn='.$i.'">'.$i.'</a> &nbsp; ';
    }
  }
}
$paginationCtrls .= ''.$pagenum.' &nbsp; ';
for($i = $pagenum+1; $i <= $last; $i++){
  $paginationCtrls .= '<a href="'.$_SERVER['SCRIPT_NAME'].'?bg='. $_REQUEST["bg"].'&pn='.$i.'">'.$i.'</a> &nbsp; ';
  if($i >= $pagenum+4){
    break;
  }
} 
if ($pagenum != $last) {
  $next = $pagenum + 1;
  $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['SCRIPT_NAME'].'?bg='. $_REQUEST["bg"].'&pn='.$next.'">Next</a> ';
}
}

?>



<?php require 'header.php'; ?>

<div style=" height:auto">

 <form method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" width="1100px" style="margin:auto">
    <tr>            
      <td>



        <table cellpadding="0" cellspacing="0" width="800px" height="100px" style="margin:auto; border:0px" class="tableborder">
          <tr><td  align="center"><img src="Images/results.png" height="80px" style="padding-top:20px" /></td></tr>
          <tr><td >&nbsp;</td></tr> 

          <?php
          while($data=mysqli_fetch_array($result))
          {
            $sql = "SELECT ddate from donation where email ='" . $data[9] . "' Order by ddate desc";
            $query = mysqli_query($cn,$sql);
            $res = mysqli_fetch_array($query);
            $date1 = new DateTime("");
            $date2 = new DateTime($res[0]);
            $date1->format('Y-m-d');echo " ";
            $date2->format('Y-m-d');echo " ";   
            $interval = $date1->diff($date2);
            $finalDate = $interval->m;
            ?>
            <tr><td>

              <table cellpadding="0" cellspacing="0" width="700px" height="150px" style="margin:auto; border:none;" class="tableborder">


                <tr><td width="100px"  align="center" style="vertical-align:middle">

                 <a href="doner_pic/<?php echo $data[11] ?>"data-lightbox="image-1"> <img src="doner_pic/<?php echo $data[11] ?>" height="100px" width="100px" style="margin:auto; padding-left:70px; padding-right:105px; float:left" /></a></td>


                 <td width="500px" height="50px" style="vertical-align:top">


                  <table cellpadding="0" width="500px" height="150px" style="border:none">
                   <tr><td colspan="2">&nbsp;</td></tr>
                   <tr><td><span class="title">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td><td><?php echo $data[1]; ?></td><td align="left" width="50%"></td></tr>
                   <tr><td><span class="title">Gender</span></td><td><?php echo $data[2]; ?></td></tr>
                   <tr><td style="width:24px"><span class="title">Mobile No:</span></td><td><?php echo $data[4]; ?></td></tr>
                   <tr><td><span class="title">Email</span></td><td><?php echo $data[9]; ?></td></tr>
                   <tr><td><span class="title">Blood Group</span></td><td><?php echo $data[13]; ?></td></tr>
                   <?php 
                   if($finalDate == 0 || $finalDate >3){ ?>
                     <tr><td><span class="title">Status</span></td><td><?php echo "capable"; ?></td></tr>
                     <?php 
                   }
                   else {
                    ?>
                    <tr><td><span class="title">Status</span></td><td><?php echo "not capable"; ?></td></tr>
                    <?php } ?>
                    <tr><td colspan="2">&nbsp;</td></tr>


                  </table>

                </td></tr></table></td></tr>

                <?php }
                ?>
              </table></td></tr></table></form>

            </div>
            <p><?php echo $textline2; ?></p>
            <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
            <div class="clear"></div>
            <?php require 'footer.php'; ?>