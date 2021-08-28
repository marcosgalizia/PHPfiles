<?php

// this is a test
session_start();
	if(($_SESSION['id']) || ($_SESSION['username'])) 
	 	 
echo '';
	
else 
	  {    

		  header ("Location: index.php");
		 
	  }
	//echo '<h1>Please, <a href="index.php">login</a></h1>';  
    
   
ini_set('display_errors','0');

session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);


if(isset($_GET['logoff']))
{
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Banner Ad dimensions - Online Ad Manager</title>
    
  <style>
  

    html, body {
      margin: 0;
      padding: 0;
    }

  
.row-content {
    margin: 0px auto;
    padding: 20px!important 0px!important 0px!important 0px!important;
    border-bottom: 0px ridge;
    min-height: 400px;
}

.container {
    width: 1250px!important;
    max-width: 100%;
}
	</style>
    
    
    <!-- Required meta tags always come first -->
    
<meta charset="utf-8">
<meta http-equiv="x ua-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1", shrink-to-fit=no">
<meta name="generator"/>  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    
 <link rel="stylesheet" href="css/bootstrap-social.css"> 
 <link rel="stylesheet" href="css-b-orders/styles.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-toggleable-sm fixed-top">
<div class="container">
<a class="navbar-brand" href="#"><h3><span class="fa fa-desktop fa-sm"></span>&nbsp;Online Ad Manager</h3>
<?php
if  
(   $_SESSION['level'] == 'admin' ) 
{
echo "<h5 style='color:#d6cfcf;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Dashboard</h5>";

}
else  {

}
?>
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

<span class="navbar-toggler-icon"></span>

</button>
<div class="col-sm-3"></div>
<?php require ('includes/floating-menu.php');  ?>
<header class="jumbotron">
 <div class="container">
<div class="row row-header">
     <!-- <div class="col-12 col-md-7 col-sm-12 align-self-center">
</div>-->
   <h3>Ad Dimensions</h3>


        </div>
        </div>
  </header>

   <div class="container">
   
   <div class="row row-content">
   <div class="col-sm-4 col-md-4" style="top: 10px;">
  <!--
<div class="activity-box">
<h5 style="color: #1C6A80;"><strong>ACTIVE ORDERS</strong><br>
(ads currently scheduled or running on platform/s)</h5>
<?php
$o_id = "orderid";     
$o_id = $_GET['orderid'];

$db_host		= 'localhost';
$db_user		= 'diversep_Marcos';
$db_pass		= 'b%$De90!@@?>:Z$%&';
$db_database	= 'diversep_web_ad_manager'; 
   
$link = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die('Unable to establish a DB connection');



$command = "SELECT id, user, client_name, duration_start_date, duration_end_date FROM Banner_orders_submitted WHERE status='Active' ORDER BY date DESC";  

$result = $link->query($command);
while ($data = $result->fetch_object()) {

echo "<div style='border: 0px solid #000;padding: 10px; background-color:#fff; color:#000;'>";
echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>";  echo "Edit</a>";


echo "<b style='float:left; color:red;'>"; echo "$data->client_name &nbsp;&nbsp;&nbsp;";  echo "</b><br>";
//echo "<b style=><br/>Date:&nbsp;&nbsp;"; echo "$data->date&nbsp;</b><br>";

echo "Ad expires on: $data->duration_end_date &nbsp;&nbsp;&nbsp;<br>";

echo "<b style='color:#000;'><i>Created by&nbsp;</i></b>"; echo "<i>$data->user</i>&nbsp;&nbsp;";

echo "</div>";
}

?>

</div>-->
<br>

<div class="activity-box">

<h5 style="color: #1C6A80;">Latest Orders:</h5>
<?php


$command = "SELECT id, user, client_name FROM Banner_orders_submitted ORDER BY date DESC LIMIT 3";  

$result = $link->query($command);
while ($data = $result->fetch_object()) {

echo "<div style='border: 0px solid #000;padding: 10px; background-color:#fff; color:#000;'>";
echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>
<b style='float:left; color:red;'>"; echo "$data->client_name &nbsp;&nbsp;&nbsp;";  echo "</b><br>";
//echo "<b style=><br/>Date:&nbsp;&nbsp;"; echo "$data->date&nbsp;</b><br>";

echo "<b style='color:#000;'><i>Created by&nbsp;</i></b>"; echo "<i>$data->user</i>&nbsp;&nbsp;";
echo "</a>";
echo "</div>";
}

$result->free();
$link->close();

?>


</div>


</div>
    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">


<p style="color: red;font-weight:bold;">Image formats accepted:  jpeg, png, gif and/or animated gif  </p>
<div style="border: 1px solid #000; padding: 7px; background-color:red; color:#fff; font-weight:bold;">
MANDATORY:  MUST VERIFY BANNER DIMENSIONS BEFORE ATTACHING TO ORDERS.<br><br>

<ol>
<li>SAVE ART WORK TO PC</li>
<li>RIGHT MOUSE CLICK ON IMAGE</li>
<li>CLICK PROPERTIES > DETAILS,  DIMENSIONS WILL SHOW IN PIXELS.</li>
</ol>
 </div>
 <br><br>
 
<picture>
<img src="http://diversepodium.com/Online-Ad-Manager/images/Leaderboard.png" class="img-fluid img-thumbnail" alt="...">
</picture>
    <br>
<br>

    
    <picture>
<img src="http://diversepodium.com/Online-Ad-Manager/images/sidebar.png" class="img-fluid img-thumbnail" alt="...">
</picture>
    <br><br>


    <picture>
<img src="http://diversepodium.com/Online-Ad-Manager/images/mobile-portrait.png" class="img-fluid img-thumbnail" alt="...">
</picture>
    <br>
<br>

    
    <picture>
<img src="http://diversepodium.com/Online-Ad-Manager/images/mobile-landscape.png" class="img-fluid img-thumbnail" alt="...">
</picture>
    
   
</div>
</div>
</div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

</div>

    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-5 offset-1 col-sm-2">
               
             <!--       <ul class="list-unstyled">
                        <li><a href="https://www.diversebooks.net/">Higher Education Books</a></li>
                        <li><a href="http://diversejobs.net/">Higher Education Jobs</a></li>
                        <li><a href="http://jobs.diversejobs.net/employer/emplogin.html">Post a Job</a></li>
                        <li><a href="http://diverseeducation.com/media-kit/">Advertise</a></li>
                          <li><a href="http://diverseeducation.com/about-us/contact-us/">Contact Us</a></li>
                         
                        
                        
                    </ul>  -->
                </div>
                <div class="col-12 col-sm-12">
                <p style="color:#fff;">
                 <b>ORDER STATUS REFERENCE:</b><br><br>


                <b>PENDING:</b>   Order has not been approved or data or art-work are missing.<br>
               <b> READY: </b> Order has been approved and <b>ALL</b> required data and art-work has been entered to form.
<br>
       <b> ACTIVE: </b>Ad has been scheduled to start running on platform/s.<br>
               <b>COMPLETED:</b> The ad campaign has expired on the web site and/or newsletter.<br>
                <b>CANCELLED</b>
                </p>
                
                 <!--   <address> <h5>Diverse: Issues in Higher Education</h5>  -->
		        
		       <!--      <i class="fa fa-phone fa-lg"></i> 703.385.2981 ext 3053 <br>
		           
		           <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:FrankJ@DiverseEducation.com">FrankJ@DiverseEducation.com</a> -->
		           </address>  <br>
<br>
<br>

                </div>
                <div class="col col-sm-4 align-self-center">
             
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-12">
                    <p> &copy; <?php echo date("Y"); ?> Cox, Matthews & Associates</p>
                </div>
           </div>
        </div>
    </footer>

     
 <!-- jQuery first, then Thether, then Bootstrap JS. -->
  
     <script src="node_modules/jquery/dist/jquery.min.js"></script>
    
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
   
   
</body>


  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 

</html>
 