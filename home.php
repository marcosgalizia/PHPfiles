<?php
session_start();

echo "this a test";

ini_set('display_errors','1');
	if(($_SESSION['id']) || ($_SESSION['username'] ))
	 	 {

		 }

else 
	  {    

	 header ("Location: index.php");
		 
	  }
	  
	  
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
    <title>Online Ad Manager</title>
    
  <style>
  
/* Blink for Webkit and others
(Chrome, Safari, Firefox, IE, ...)
*/

@-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {opacity: 0.0;}
}
.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.5s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}
    html, body {
      margin: 0;
      padding: 0;
    }

   .impressions-box {
       
        font-size: 17x;
		padding: 10px;
		font-family: "Arial";
		border: dotted thick #CCC;
      }
	  
.jumbotron {
    padding-top: 10px!important;
    margin: 0px auto;
    background: #FFC;
    color: #999;
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"><link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

   
    
 <link rel="stylesheet" href="css/bootstrap-social.css"> 
 <link rel="stylesheet" href="css-b-orders/styles.css">
 
</head>

<body>

<nav class="navbar navbar-inverse navbar-toggleable-sm fixed-top">

<div class="container">




<a class="navbar-brand" href="#"><h3><span class="fa fa-desktop fa-sm"></span>&nbsp;Online Ad Manager</h3><?php

if  
(   $_SESSION['level'] == 'admin' ) 
{
	
	echo "<h5 style='color:#d6cfcf;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Dashboard</h5>";
	
}
else  {
	
	
}
?> </a>



<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

<span class="navbar-toggler-icon"></span>

</button>
<div class="col-sm-3"></div>


<?php require ('includes/floating-menu.php');  ?>


<header class="jumbotron">

<?php  echo $_SESSION['delete'];   ?>
 
<div class="container">
<div align="right">
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" style="right: 5px; position:fixed; bottom: 10px; z-index: 999; float:right;">
<b> ?</b>
</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
 <?php  
	
	
   require ('includes/impressions-available.php');
	  
	  ?>

            <div class="row row-header">
     
          <!--      <div class="col-12 col-md-7 col-sm-12 align-self-center">
             
                    
                    
            </div>-->
     <?php
 //  echo '<h5 style="color:#a09f9f">Hi <b>'.$_SESSION['username'] .'!</b><br><br>Orders submitted:</h5><br />';
	?>
        </div>
        </div>
  </header>

   <div class="container">
   
   <div class="row row-content">
   <div class="col-sm-4 col-md-4" style="top: 10px;">
  
  <div class="accordion md-accordion">
  <div class="card">
   <div class="card-header" role="tab" id="headingThree">
      <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" href="#collapseThree"
        aria-expanded="false" aria-controls="collapseThree" title="Click to collapse/ expand">
<h5 style="color: #1C6A80;"><i class="fas fa-file-invoice-dollar fa-1x"></i> <strong>ACTIVE ORDERS</strong></h5></a>
</div>
 <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">

&nbsp;(ads currently scheduled or running on platform/s)

<?php
$o_id = "orderid";     
$o_id = $_GET['orderid'];
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 
   
$mysqli = new mysqli($db_host,$db_user,$db_pass, $db_database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$result = $mysqli->query 

("SELECT id, user, client_name, duration_start_date, duration_end_date FROM Banner_orders_submitted WHERE status='Active' ORDER BY date DESC");


   $row_cnt = $result->num_rows;

if  ($row_cnt == 0 )  {

echo "<br><br>NO ACTIVE ORDERS";
  // printf("<br>%d ACTIVE ORDERS \n", $row_cnt );

}
	  
$results = $mysqli->query($row_cnt);

while ($data = $result->fetch_object()) 

{

echo "<div style='border: 0px solid #000;padding: 10px; background-color:#fff; color:#000;'>";

if  

( ($_SESSION['username']) != $data->user  &&  $_SESSION['level'] == 'sales' ) 
{


echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>";  echo "View</a>";

}


else  {
echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>";  echo "View/Edit</a>";

}
echo "<b style='float:left;color:red;'>"; echo "$data->client_name &nbsp;&nbsp;&nbsp;";  echo "</b><br>";
//echo "<b style=><br/>Date:&nbsp;&nbsp;"; echo "$data->date&nbsp;</b><br>";

echo "Ad expires on: $data->duration_end_date &nbsp;&nbsp;&nbsp;<br>";

echo "<b style='color:#000;'><i>Created by&nbsp;</i></b>"; echo "<i>$data->user</i>&nbsp;&nbsp;";

echo "</div>";
}
?>

</div>
</div>
</div>
<br>
<div class="card">
<div class="card-header">
<h5 style="color: #1C6A80;"><i class="fas fa-clock fa-1x"></i><strong> UPCOMING ...</strong><br>
</h5></div>
<?php

//$todays_date = date("m/d/Y"); 

//$today = strtotime($todays_date);

		 
$result = $mysqli->query 

("SELECT id, user, client_name, date, duration_start_date, duration_end_date, duration_end_date, impressions, loc_leaderboard, loc_sidebar, loc_footer, 
location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap, notes 
FROM Banner_orders_submitted WHERE status='Ready' ORDER BY date DESC");

$row_cnt = $result->num_rows;

if  ($row_cnt == 0 )  {

echo "No upcoming Ad Orders";
  // printf("<br>%d ACTIVE ORDERS \n", $row_cnt );

}
  
$results = $mysqli->query($row_cnt);

while ($data = $result->fetch_object()) 

{

echo "<div style='border: 0px solid #000;padding: 10px; background-color:#fff; color:#000;'>";

if  

( ($_SESSION['username']) != $data->user  &&  $_SESSION['level'] == 'sales' ) 
{


echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>";  echo "View</a>";

}
else  {
echo "<a href=order-details.php?orderid=".$data->id." target='_blank'>";  echo "View/Edit</a>";

}
echo "<b style='float:left; color:red;'>"; echo "$data->client_name &nbsp;&nbsp;&nbsp;";  echo "</b><br>";
//echo "<b style=><br/>Date:&nbsp;&nbsp;"; echo "$data->date&nbsp;</b><br>";

echo "Starts on: $data->duration_start_date &nbsp;&nbsp;&nbsp; Ends on: $data->duration_end_date <br>";

       
	   echo "<b>Ad Placement:</b><br>";

if  ( $data->loc_sidebar == "Sidebar"  ) {
echo "Sidebar<br>";
}
else  {
	 }
	if  ( $data->loc_leaderboard == "Leaderboard") {
echo  "Leaderboard<br>";
}
else  {
 }
	
		if  ( $data->location_floating == "Floater" ) {
echo "Floater<br>";
}
else  {   }


	   echo "<b>Platforms:</b><br>";
	   
	   
if  ( $data->website_diverse == "Diverse_Education"  ) {
echo "diverseeducation.com<br>";
}
else  {
	 }
	if  ( $data->website_jobs == "Diverse_Jobs") {
echo  "diversejobs.net<br>";
}
else  {
 }
	
		if  ( $data->website_cc == "CCNews" ) {
echo "ccnewsnow.com<br>";
}
else  {   }

	if  ( $data->website_military == "Diverse_Military" ) {
echo "diversemilitary.net<br>";
}
else  {   }

if  ( $data->website_health == "Diverse_Health" ) {
echo "divhealth.net<br>";
}
else  {   }

if  ( $data->news_daily == "Daily_Newsletter" ) {
echo "Daily Newsletter<br>";
}
else  {   }

if  ( $data->news_health == "Health_Newsletter" ) {
echo "Health Newsletter<br>";
}
else  {   }

if  ( $data->news_military == "Military_newsletter" ) {
echo "Military Newsletter<br>";
}
else  {   }

if  ( $data->news_cc == "CC_newsletter" ) {
echo "CC Newsletter<br>";
}
else  {   }

if  ( $data->news_hiring == "Hiring_newsletter" ) {
echo "Hiring Newsletter<br>";
}
else  {   }

if  ( $data->news_recap == "News_Recap" ) {
echo "Recap<br>";
}
else  {   }


	   echo "<b>Number of Impressions:</b>&nbsp;&nbsp;";

if  ( $data->impressions != NULL ) {
echo $data->impressions; echo "<br>";

}
else  {  echo "N/A<br>";  }


	   echo "<b>NOTES:</b>&nbsp;&nbsp;";

if ($data->notes != NULL || $data->notes !="")
{
   echo $data->notes; echo "<br>";  
}
   else {
	   echo  "Not Entered<br>";
 }

echo "<b style='color:#000;'><i>Created by&nbsp;</i></b>"; echo "<i>$data->user</i>&nbsp;&nbsp;";

echo "</div>";
}
// =========================================================================================



?>

</div>
<br>
</div>
<div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">
<div style="color:#000;">
<?php
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 


$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database)
	
or die ("Cannot connect to mySQL.");

$command = "SELECT * FROM ad_zone_thresholds WHERE id=1";


$result = $link->query($command);
while ($data = $result->fetch_object())  {
	
    $leaderboard_threshold = $data->LEADERBOARD;
	        $sidebar_threshold = $data->SIDEBAR;
	        $floater_threshold = $data->FLOATER;
	
}
$result->free();
$link->close();

?>
 <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
  <div class="card">
   <div class="card-header" role="tab" id="headingTwo1">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
        aria-expanded="false" aria-controls="collapseTwo1" title="Click to collapse/ expand">
        <h5 class="mb-0">
        <i class="fas fa-chart-line fa-2x"></i> DELIVERY OF IMPRESSIONS BY AD ZONE ON <b style="color:green;">ACTIVE</b> ORDERS
     </h5>
      </a>
    </div>
   <div id="collapseTwo1" class="collapse show" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
      <div class="card-body" style="padding:10px;">
 (monthly availability (in green), across all websites)<br/>
<?php

	 
$res = $mysqli ->query ( "SELECT SUM(impressions) as sum FROM Banner_orders_submitted 
WHERE Loc_leaderboard = 'Leaderboard' AND status = 'Active'") or die($mysqli->error);


$val = $res -> fetch_array();
    $impressions_leaderboard = $val['sum'];

	$balance_leaderboard =  $leaderboard_threshold - $impressions_leaderboard;
	

if  ($impressions_leaderboard > 0 ) {
echo "<div style='height:auto; padding-top:20px;'>";
echo  "<b style='color:#999';><h5>Leaderboard:</h5></b> ";  echo "<b>&nbsp;"; echo $impressions_leaderboard; echo "</b>"; 
echo " of ";  echo  "<span style='color:green; font-weight:bold'>"; echo $leaderboard_threshold; echo "</span>"; 
echo "</div>";

}

if    
($impressions_leaderboard >= $leaderboard_threshold ) {

echo "<div style='padding-top: 0px;'>";
	echo "<b style='color:red;'>&nbsp;<span class='blink'>Overbooking warning!</span></b>";
echo "</div>";
}

else  if ($impressions_leaderboard < 1 )
  { echo "<br>No impressions delivering on Leaderboard"; }
	  
	  
	  
$res = $mysqli ->query ( "SELECT SUM(impressions) as sum FROM Banner_orders_submitted 
WHERE Loc_sidebar = 'Sidebar' AND status = 'Active'") or die($mysqli->error);

$val = $res -> fetch_array();
$impressions_sidebar = $val['sum'];
$sidebar_balance =  $sidebar_threshhold - $impressions_sidebar; 
 
if  ($impressions_sidebar > 0 ) {
	
echo "<div style='height:auto; padding-top:0px;'>";
echo "<br><b style='color:#999';><h5>Sidebar:</h5></b> "; echo "<b>&nbsp;"; echo $impressions_sidebar; echo "</b>"; 
echo " of "; echo  "<span style='color:green; font-weight:bold'>"; echo $sidebar_threshold; echo "</span>";  
echo "</div>";

}
if ($impressions_sidebar >= $sidebar_threshold ) {
	
echo "<div style='padding-top: 0px;'>";
echo "<b style='color:red;'>&nbsp;<span class='blink'>Overbooking warning!</span></b>";
echo "</div>";
}

else 
if ($impressions_sidebar < 1 )

  {  echo "<br>No impressions delivering on Sidebar"; } 






$res = $mysqli ->query ( "SELECT SUM(impressions) as sum FROM Banner_orders_submitted 
WHERE location_floating = 'Floater' AND status = 'Active'") or die($mysqli->error);

$val = $res -> fetch_array();
    $impressions_floater = $val['sum'];
	
	$balance_floater =  $floater_threshold - $impressions_floater;
	

if  ($impressions_floater > 0 ) {

echo "<div style='height:auto; padding-top:20px;'>";
echo  "<b style='color:#999';><h5>Floater:</h5></b> ";  echo "<b>&nbsp;"; echo $impressions_floater; echo "</b>"; 
echo " of ";  echo  "<span style='color:green; font-weight:bold'>"; echo $floater_threshold; echo "</span>"; 
echo "</div>";
}

if ($impressions_floater >= $floater_threshold ) {
	echo "<div style='padding-top: 0px;'>";
	echo "<b style='color:red;'>&nbsp;<span class='blink'>Overbooking warning!</span></b>";
echo "</div>";
}

else 
if ($impressions_floater < 1 )
  { echo "<br>No impressions delivering on Floater"; }



// END OF CODE CHANGES   

/* ======================================================================================================= */
?>
        
 </div>
    </div>
  </div>
</div>


 </div><br>

<div class="col-sm-10">


<table cellspacing="25px" width="100%">
 <h5 style="color:#333;"><i class="fas fa-database fa-2x"></i> <strong>Orders submitted as of <?php  echo date("F j, Y"); ?></strong> </h5>
<tr>
<td>
<form action="http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1" method="POST">
<button type="submit" name="All" value="All" title="" /><b>All&nbsp;Orders</b></button>
</form>
</td>
<td>
<form action="" method="POST">
<button type="submit" name="pending" value="pending" title=""  /><b>&nbsp;Pending&nbsp;</b></button>
</form>
</td>
<td><form action="" method="POST">
<button type="submit" name="ready" value="ready" title=""  /><b>&nbsp;&nbsp;&nbsp;Ready&nbsp;&nbsp;&nbsp;</b></button>
</form>
</td>
<td><form action="" method="POST">
<button type="submit" name="active" value="active" title=""  /><b>&nbsp;&nbsp;Active&nbsp;&nbsp;</b></button>
</form></td>
<td><form action="" method="POST">
<button type="submit" name="completed" value="completed" title=""  /><b>Completed</b></button>
</form></td>
<td><form action="" method="POST">
<button type="submit" name="cancelled" value="cancelled" title=""  /><b>Cancelled</b></button>
</form></td>
<td>            
<a class="nav-link" href="home.php?pageno=1" style="width:50px;"><span class="fas fa-redo-alt fa-2x" title="Reload"></span></a></td>
</tr>
</table>
</div>
<?php
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 
   
$link = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die('Unable to establish a DB connection');
/*
$db_select = mysqli_select_db($link, $db_database);  */
   
// if($e_id>0) {

//$page = 1; 

//if (is_numeric($_GET['page'])) 

//{    

// $page = intval($_GET['page']); }
$o_id = "orderid";     
$o_id = $_GET['orderid'];
   
//
//function fetch_results($page, $dbase)

//{
$offset = 0;
$page_result = 10; 
	
if  (($_GET['pageno']))
{
/* $page_value = $_GET['pageno'];
 if($page_value > 1)
 {	
  $offset = ($page_value - 1) * $page_result;
 }*/
}



$command =  "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted ORDER BY date DESC";  



if (isset($_POST['pending'])) {
	 

$command =   "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted WHERE status='Pending' ORDER BY date DESC";  


}

 if (isset($_POST['ready'])) {
	 


$command =  "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted WHERE status='Ready' ORDER BY date DESC";  


}
 if (isset($_POST['active'])) {
	 


$command =  "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted WHERE status='Active' ORDER BY date DESC";  
 }

 if (isset($_POST['completed'])) {
	 


$command = "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted WHERE status='Completed' ORDER BY date DESC";  

}
 if (isset($_POST['cancelled'])) {
	 


$command = "SELECT user, id, date, client_name, contact, phone, email, duration_start_date, duration_end_date, impressions, contact, image1_url, 
status, sales_agent, loc_sidebar, loc_leaderboard, location_floating, website_diverse, website_jobs, website_cc, website_military, website_health,
news_daily, news_health, news_military, news_cc, news_hiring, news_recap FROM Banner_orders_submitted WHERE status='Cancelled' ORDER BY date DESC";  


}


$target1 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image1);
	
$target2 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image2);

$target3 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image3);
        
$target4 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image4);
	   
$target5 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image5);

echo "<div style='overflow:scroll; overflow-x:hidden; height: 500px; border: 1px solid #000;padding: 10px; background-color:#cee5d8; color:#000;'>";

$result = $link->query($command);
while ($data = $result->fetch_object()) {




	// WHEN AD CAMPAIGN EXPIRES , THIS CODE CHANGES STATUS TO "COMPLETED"  
	
$end = $data->duration_end_date;
$todays_date = date("m/d/Y"); 

$today = strtotime($todays_date);
$completed = "Completed";

if  ((strtotime($end) < $today ) && ($data->status == 'Active'))
 {
	
//$o_id = "orderid";     
//$o_id = $data->id;

$command = "UPDATE Banner_orders_submitted SET status='Completed' WHERE id = " . $data->id;
	echo "<meta http-equiv='refresh'
content='0;URL=http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1'>";
	  
	 if(mysqli_query($link, $command)){ 
    
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  

	
}
 /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   */


echo "<div style='border: 1px solid #000;padding: 10px; height: 40px;background-color:#cee5d8; color:#000;'>";
//echo "<b>&nbsp;"; echo "$data->date&nbsp;</b>";
echo "<b style='float:left; color:red; width: 250px; overflow-x: hidden; white-space: nowrap;'>"; echo "$data->client_name &nbsp;&nbsp;&nbsp;";  echo "</b>";
echo "<b style='float:right; width: 240px; overflow-x: hidden; white-space: nowrap; color:green;'>Sales Rep:&nbsp;&nbsp;"; echo "$data->sales_agent&nbsp;</b></div>";
echo "<div style='border: 1px solid #000;padding: 10px; background-color:#fff; color:#000;'>";
echo "<span class='fa fa-user fa-lg'></span>";echo "&nbsp;$data->contact&nbsp;&nbsp;";
echo "<span class='fa fa-phone fa-lg'></span>&nbsp;&nbsp;"; echo "$data->phone &nbsp;&nbsp;";
echo "<span class='fa fa-envelope fa-lg'></span>&nbsp;&nbsp;"; echo "<a href='mailto:$data->email'>$data->email</a>&nbsp;&nbsp;";
echo "<b style='color:green; float:right'>Order # $data->id&nbsp;&nbsp;</b><br>";
echo "<b style='color: red;'>Start Run Date:&nbsp;&nbsp;</b>"; echo "$data->duration_start_date &nbsp;&nbsp;&nbsp;";


echo "<b style='color: red;'>End Run Date:&nbsp;&nbsp;</b>"; echo "$data->duration_end_date&nbsp;<br>";


 echo "<b>Ad Placement:</b> ";

if  ( $data->loc_sidebar == "Sidebar"  ) {
echo "Sidebar  ";
}
else  {
	 }
	if  ( $data->loc_leaderboard == "Leaderboard") {
echo  "Leaderboard   ";
}
else  {
 }
	
		if  ( $data->location_floating == "Floater" ) {
echo "Floater  ";
}
else  {   }


	   echo "<b>Platforms:</b> ";
	   
	   
if  ( $data->website_diverse == "Diverse_Education"  ) {
echo "diverseeducation.com  ";
}
else  {
	 }
	if  ( $data->website_jobs == "Diverse_Jobs") {
echo  "diversejobs.net  ";
}
else  {
 }
	
		if  ( $data->website_cc == "CCNews" ) {
echo "ccnewsnow.com  ";
}
else  {   }

	if  ( $data->website_military == "Diverse_Military" ) {
echo "diversemilitary.net  ";
}
else  {   }

if  ( $data->website_health == "Diverse_Health" ) {
echo "divhealth.net  ";
}
else  {   }

if  ( $data->news_daily == "Daily_Newsletter" ) {
echo "Daily Newsletter  ";
}
else  {   }

if  ( $data->news_health == "Health_Newsletter" ) {
echo "Health Newsletter  ";
}
else  {   }

if  ( $data->news_military == "Military_newsletter" ) {
echo "Military Newsletter  ";
}
else  {   }

if  ( $data->news_cc == "CC_newsletter" ) {
echo "CC Newsletter  ";
}
else  {   }

if  ( $data->news_hiring == "Hiring_newsletter" ) {
echo "Hiring Newsletter  ";
}
else  {   }

if  ( $data->news_recap == "News_Recap" ) {
echo "Recap  ";
}
else  {   }

echo "<br><b style='color:green;'>Impressions:</b>  "; echo "$data->impressions&nbsp;&nbsp;";


echo "<br><b style='color:#000;'><i>Created by&nbsp;</i></b>"; echo "<i>$data->user</i>&nbsp;&nbsp;";


if ($data->status == "Active")

{


echo "<div style='color:white; float:right; border: 1px solid #000; background-color: green; 
padding: 3px; text-align:center; width:110px; font-weight:bold;'>$data->status</div>";

}
else

if ($data->status == "Pending")

{


echo "<div style='float:right; color:#FFF; border: 1px solid #000; background-color: orange; padding: 3px; text-align:center; width:110px; font-weight:bold;'>$data->status</div>";

}



if ($data->status == "Ready")

{


echo "<div style='float:right; color:#000; border: 1px solid #000; background-color: yellow; padding: 3px; text-align:center; width:110px; font-weight:bold;'>$data->status</div>";

}


else
if ($data->status == "Cancelled")

{


echo "<div style='color:#FFF; float:right; border: 1px solid #000; background-color: red; padding: 3px; text-align:center; width:110px; font-weight:bold;'>$data->status</div>";

}
else

if ($data->status == "Completed")

{


echo "<div style='color:#FFF; float:right; border: 1px solid #000; background-color: #999; padding: 3px; text-align:center; width:110px; font-weight:bold;'>$data->status</div>";

}

if  

( ($_SESSION['username']) != $data->user  &&  $_SESSION['level'] == 'sales' ) 
{


}

else {
	
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=edit-images.php?orderid=".$data->id." target='_blank'><span class='fa fa-image fa-lg' title='Add/Remove Artwork' style='float:right; margin-top:10px; padding:2px;' /></a></span>";
	
}

if  

( ($_SESSION['username']) != $data->user  &&  $_SESSION['level'] == 'sales' ) 
{


echo "<a href=order-details.php?orderid=".$data->id." target='target'><span class='fa fa-eye fa-lg' title='View Order' style='float:right; margin-top:10px; padding: 2px;' /></a></span>";

}
else {
	
echo "<a href=order-details.php?orderid=".$data->id." target='target'><span class='fa fa-edit fa-lg' title='View/Edit' style='float:right; margin-top:10px; padding: 2px;' /></a></span>";

	
}


echo "</div>";
}

$result->free();
$link->close();

echo $row;
		
	echo "<br/>";

echo "</div>";
/*
$page = 1; 


if (is_numeric($_GET['page'])) 

{    
 $page = intval($_GET['page']); }



//$row = mysqli_num_rows($command);



$num =   ($row / 10);

//echo $num;

if($_GET['pageno'] > 1)
{
 echo "<a href = 'home.php?pageno=".($_GET['pageno'] - 1)." '><i><< Previous</i></a>";
}
//for($i = 1 ; $i <= $num ; $i++)
//{
//echo "<a href = 'registered.php?pageno='. $i .' >'. $i .'</a>";
//}

if  ($num != 1) 


{
 echo "<a href = 'home.php?pageno=".($_GET['pageno'] + 1)." '>&nbsp;&nbsp;<i>Next >></i></a>";
}
else 
{

}
  */
$_SESSION['delete'] = " ";
  /*

echo "<p style='font-family:Verdana, Geneva, sans-serif;
	font-style:italic;
	font-size:12px; margin: 10px; color:red;';>Page "; echo $page;  echo  " of ";  echo $pages;  "</p>";
*/
?>
  
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
		           </address> 

  </div>
               <div class="col-sm-4">
          <div style="color:#999;"> Recommended Internet browsers
              <a href="https://www.google.com/chrome/?brand=CHBD&gclid=EAIaIQobChMI9PLJ27-23QIVEY3ICh3P5ATuEAAYASABEgLZePD_BwE&gclsrc=aw.ds&dclid=CNL1kN2_tt0CFcgbDAodZ3EItQ" target="_blank"><img src="http://diversepodium.com/Online-Ad-Manager/images/chrome.png"  width="50px" height="auto" title="Google Chrome"></a>
                <a href="https://www.microsoft.com/en-us/download/internet-explorer.aspx" target="_blank">  <img src="http://diversepodium.com/Online-Ad-Manager/images/IE.png" width="50px" height="auto" title="MS Explorer"><br></a>
</div>
<br>
<br>

   </div> 
  <!--   
                <div class="col col-sm-4 align-self-center">
             
    

                </div>  -->
           </div>
           <div class="row justify-content-center">  
           
                <div class="col-12">
                    <p> &copy; <?php echo date("Y"); ?> Cox, Matthews & Associates, Inc</p>
                </div>
           </div>
        </div>
    </footer>

     
 <!-- jQuery first, then Thether, then Bootstrap JS. -->
  
     <script src="node_modules/jquery/dist/jquery.min.js"></script>
    
    <script src="node_modules/tether/dist/js/tether.min.js"></script>
    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
   
   
</body>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 

</html>
 
