<!-- <ul class="nav">
			<li class="active"><a href="index.php">Home</a></li>	
			<li><a href="registration.php">Donor Registration</a></li>            
			<li><a href="requests.php">send Request</a></li>
            <li><a href="viewrequest.php">View Request</a></li>
            <li><a href="camps.php">Camps</a></li>
            <li><a href="login.php">log In</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="contact.php">Contact Us</a></li>
           	<li><a href="aboutus.php">About</a></li>
            </ul> -->

            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Blood bank Management System</title>
  <link href="css/lightbox.css" rel="stylesheet" />
  <link href="StyleSheet.css" rel="stylesheet" type="text/css" />

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!--slider-->
  <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/lightbox.min.js"></script>
  <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.flexslider.js" type="text/javascript"></script>
  
  <script type="text/javascript">
   $(function () {
     SyntaxHighlighter.all();
   });
   $(window).load(function () {
     $('.flexslider').flexslider({
       animation: "slide",
       animationLoop: false,
       itemWidth: 210,
       itemMargin: 5,
       minItems: 2,
       maxItems: 4,
       start: function (slider) {
         $('body').removeClass('loading');
       }
     });
   });
 </script>
 <script type="text/javascript">
var windowObjectReference = null; // global variable

function openRequestedPopup(strUrl, strWindowName) {
  if(windowObjectReference == null || windowObjectReference.closed) {
    windowObjectReference = window.open(strUrl, strWindowName,
           "resizable,scrollbars,status");
  } else {
    windowObjectReference.focus();
  };
}
</script>
 <style type="text/css">
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
div#pagination_controls{font-size:21px;}
div#pagination_controls > a{ color:#06F; }
div#pagination_controls > a:visited{ color:#06F; }
</style>
</head>

<body>
 <div class="h_bg">
  <div class="wrap">
    <div class="header">
      <div class="logo">
       <h1><a href="index.php"><img src="Images/logo.png" alt=""></a></h1>
     </div>
   </div>
 </div>
</div>
<div class="nav_bg">
  <div class="wrap">
    <ul class="nav">
      <li class="active"><a href="index.php">Home</a></li>  
      <li><a href="registration.php">Donor Registration</a></li>            
      <li><a href="requests.php">send Request</a></li>
            <li><a href="viewrequest.php">View Request</a></li>
            <li><a href="camps.php">Camps</a></li>
            <li><a href="login.php">log In</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="aboutus.php">About</a></li>
            </ul>
  </div>

  </div>