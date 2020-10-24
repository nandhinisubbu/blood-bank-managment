<?php include('admin/function.php'); 

$cn=mysqli_connect("localhost","root","","bloodbank");
$sql = "SELECT COUNT(*) FROM requestes";
$query = mysqli_query($cn, $sql);
$row = mysqli_fetch_row($query);
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 10;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
    $last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT * FROM requestes ORDER BY UNIX_TIMESTAMP(reqdate) ASC $limit";
$query = mysqli_query($cn, $sql);
// This shows the user what page they are on, and the total number of pages
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
    /* First we check if we are on page one. If we are then we don't need a link to 
       the previous page or the first page so we do nothing. If we aren't then we
       generate links to the first page, and to the previous page. */
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
        // Render clickable number links that should appear on the left of the target page number
        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
            }
        }
    }
    // Render the target page number, but without it being a link
    $paginationCtrls .= ''.$pagenum.' &nbsp; ';
    // Render clickable number links that should appear on the right of the target page number
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
        if($i >= $pagenum+4){
            break;
        }
    }
    // This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
}



?>
<?php require 'header.php'; ?>
<div style="height:auto; width:1000px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">
 <table cellpadding="20" cellspacing="20" width="1000px" height="200px"  style="margin:auto" >

   <tr><td colspan="7" align="center"><img src="Images/brequest.png" height="90px" /></td></tr>

   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
 <tr style="background-color:bisque" align="center" class="bold">            
             <td class="bold" style="color:red"  >Blood Group</td>
             <td align="center">Name</td>
             <td align="center">Mobile No</td>
             <td align="center">Email</td>
            <td align="center">Till Required Date</td>
        </tr>
                   



<?php
	while($data=mysqli_fetch_array($query))
	{
        $Weddingdate = new DateTime($data['7']);
        $date = date_format($Weddingdate, 'd-m-Y');
        if((new DateTime($date) >= new DateTime(""))){
            echo"<tr><td  style=' padding-left:50px'><a href='details.php?q=". $data[0] ."' target='PromoteFirefoxWindow'
 onclick='openRequestedPopup(this.href, this.target); return false;'>$data[6]</a></td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:60px'>$date</td></tr>";
        }
				
			}
			mysqli_close($cn);
			?>


</table>
</form>
        </div>
           <p><?php echo $textline2; ?></p>
 <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
        <div class="clear"></div>
<?php require 'footer.php'; ?>