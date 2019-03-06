<?php
session_start();
	if(($_SESSION['id']) || ($_SESSION['username'])) 
	 	 
echo '';
	
else 
	  {    

		  header ("Location: index.php");
		 
	  }
	//echo '<h1>Please, <a href="index.php">login</a></h1>';  
    
   
ini_set('display_errors','1');

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
    <title>Online Ads Manager</title>
    
  <style>

    html, body {
      margin: 0;
      padding: 0;
    }

  

address {color:#fff; }

address a  {color:#fff;  }


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
   echo '<h4 style="color:#a09f9f">Search Data Base</h4><br />';
	?>
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

</div>
<br>-->
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
    <div class="col-sm col-md-8 flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">

<form name="search_form" action="search_orders.php#down" method="POST">
<div class="form-group col-sm-8">
    <label for="formGroupExampleInput">Sales Rep</label>
    <input type="text" name="search_agent" class="form-control form-control-sm" id="Sales_Agent" value=""/>
  </div>
 <div class="form-group col-sm-8">
    <label for="formGroupExampleInput">Client Name</label>
    <input type="text" name="search_client" class="form-control form-control-sm" id="Client_Name" value=""/>
  </div>
<div class="form-group col-sm-4">
Start run date 
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name="Start_date" class="form-control" data-provide="datepicker" value="" />
</div>  
</div>
<div class="form-group col-sm-4">
End run date 
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>

<input type="text" name="End_date" class="form-control" data-provide="datepicker" name="End_date" value="" />
</div>
</div>  

<div class="form-group col-sm-8">
 
<h5>Status</h5>
<select name="search_status" class="custom-select custom-select-lg mb-3" >
 <option selected></option> 
  <option value="PENDING" name="PENDING">Pending</option>redu
   <option value="READY" name="READY">Ready</option>
  <option value="ACTIVE" name="ACTIVE">Active <b>*<b></option>
    <option value="COMPLETED" name="COMPLETED">Completed</option>
  <option value="CANCELLED" name="CANCELLED">Cancelled</option>
 
</select>
</div>


<div class="row col-sm-8"> 
<div class="form-group col-sm-6 offset-2">
 

<h5>Ad Location on website/newsletter</h5>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Leaderboard" id="Leaderboard" value="Leaderboard">
  <label class="form-check-label" for="inlineCheckbox1">Leaderboard</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  name="Sidebar" id="Sidebar"  value="Sidebar">
  <label class="form-check-label" for="inlineCheckbox2">Sidebar</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Floater" id="Floater" value="Floater">
  <label class="form-check-label" for="inlineCheckbox3">Floater</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Footer" id="Footer" value="Footer">
  <label class="form-check-label" for="inlineCheckbox4">Footer</label>
</div>
<input type="hidden" name="orderid" value="orderid" />
  </div>
  </div>
  <div class="row">
 <div class="form-group col-sm-4 offset-1">

<div align="left"><b>WEB SITES</b></div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Diverse_Education" id="Diverse_Education" value="Diverse_Education">
  <label class="form-check-label" for="inlineCheckbox1">Diverse Education</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  name="Diverse_Jobs" id="Diverse_Jobs"  value="Diverse_Jobs">
  <label class="form-check-label" for="inlineCheckbox2">Diverse Jobs</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="CCNews" id="CCNews" value="CCNews">
  <label class="form-check-label" for="inlineCheckbox3">CCNEWS</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Diverse_Health" id="Diverse_Health" value="Diverse_Health">
  <label class="form-check-label" for="inlineCheckbox3">Diverse Health</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Diverse_Military" id="Diverse_Military" value="Diverse_Military">
  <label class="form-check-label" for="inlineCheckbox3">Diverse Military</label>
</div>
</div>
 <div class="form-group col-sm-4 offset-1">

<div align="left"><b>NEWSLETTERS</b></div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Daily_Newsletter" id="Daily_Newsletter" value="Daily_Newsletter">
  <label class="form-check-label" for="inlineCheckbox1">Diverse Daily</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Military_newsletter" id="Military_newsletter"  value="Military_newsletter">
  
  <label class="form-check-label" for="inlineCheckbox2">Military</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="CC_newsletter" id="CC_newsletter" value="CC_newsletter">
  <label class="form-check-label" for="inlineCheckbox3">CC</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Health_Newsletter" id="Health_Newsletter" value="Health_Newsletter">
  <label class="form-check-label" for="inlineCheckbox3">Health</label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="Hiring_newsletter" id="Hiring_newsletter"  value="Hiring_newsletter">
  
  <label class="form-check-label" for="inlineCheckbox3">Hiring</label>
</div> 

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="News_Recap" id="News_Recap" value="News_Recap">
  <label class="form-check-label" for="inlineCheckbox3">Recap</label>
</div>

</div>
</div>


 <a name='down'></a>
   
    <button type="submit" name="search" class="btn btn-warning btn-lg" style="margin:0 auto; width: 40%; display:block;" value="search">&nbsp;SEARCH&nbsp;</button>
 <!--   <button type="reset" class="btn btn-danger btn-lg" style="margin:0 auto; width: 40%; display:block;" value="RESET">&nbsp;RESET&nbsp;</button>-->
</form>

</div>
<?php

$page = 1; 

if (is_numeric($_GET['page'])) 


{    
 $page = intval($_GET['page']); }

function fetch_results($page,$db_database)   

{
$db_host		= 'localhost';
$db_user		= 'diversep_Marcos';
$db_pass		= 'b%$De90!@@?>:Z$%&';
$db_database	= 'diversep_web_ad_manager'; 
   

$link = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die('Unable to establish a DB connection');

   
$o_id = "orderid";     
$o_id = $_GET['orderid'];
   

$sqli = "SELECT id, client_name, duration_start_date, duration_end_date, status, sales_agent, loc_leaderboard, loc_sidebar, location_floating, loc_footer,  
website_diverse, website_jobs, website_cc, website_military, website_health, news_daily, news_health, news_military, news_cc, news_hiring, news_recap, impressions FROM Banner_orders_submitted WHERE id=id";   
   
   
   
  if (isset($_POST['search'])) {
	  
	  $search_term_client = mysqli_real_escape_string($link, $_POST['search_client']);
	  $search_term_startdate = mysqli_real_escape_string($link, $_POST['Start_date']);
	  $search_term_enddate = mysqli_real_escape_string($link, $_POST['End_date']);
	  $search_term_status = mysqli_real_escape_string($link, $_POST['search_status']);
	  $search_term_agent = mysqli_real_escape_string($link, $_POST['search_agent']);
	  $search_term_leaderboard = mysqli_real_escape_string($link, $_POST['Leaderboard']);
	  $search_term_sidebar = mysqli_real_escape_string($link, $_POST['Sidebar']);
	  $search_term_floater = mysqli_real_escape_string($link, $_POST['Floater']);
      $search_term_footer = mysqli_real_escape_string($link, $_POST['Footer']);
	  $search_term_diverse = mysqli_real_escape_string($link, $_POST['Diverse_Education']);
      $search_term_military = mysqli_real_escape_string($link, $_POST['Diverse_Military']);
	  $search_term_ccnews = mysqli_real_escape_string($link, $_POST['CCNews']);
      $search_term_health = mysqli_real_escape_string($link, $_POST['Diverse_Health']);
	  $search_term_diversej = mysqli_real_escape_string($link, $_POST['Diverse_Jobs']);	
	  $search_term_dailynews = mysqli_real_escape_string($link, $_POST['Daily_Newsletter']);
	  $search_term_ccnewsletter = mysqli_real_escape_string($link, $_POST['CC_newsletter']);
	  $search_term_militarynews = mysqli_real_escape_string($link, $_POST['Military_newsletter']);
	  $search_term_hiringnews = mysqli_real_escape_string($link, $_POST['Hiring_newsletter']);
	  $search_term_newsrecap = mysqli_real_escape_string($link, $_POST['News_Recap']);
	  $search_term_healthnews = mysqli_real_escape_string($link, $_POST['Health_Newsletter']);
	 
	 // $search_terms_newsletters = mysqli_real_escape_string ($link, $_POST['search_newsletters']);
	  
	  
  }
   
   
   if ($_GET['client_name'] != "")   
   
   
   $search_term_client = $_GET['client_name'];
   
   
   if ($_GET['duration_start_date'] != "")
   
   
   $search_term_startdate = $_GET['duration_start_date'];
   
   
   if ($_GET['duration_end_date'] != "")
   
   
   $search_term_enddate = $_GET['duration_end_date'];
   
   
    if ($_GET['status'] != "")
   
   
   $search_term_status = $_GET['status'];
   
      
    if ($_GET['sales_agent'] != "")
   
   
   $search_term_agent = $_GET['sales_agent'];


    if ($_GET['loc_leaderboard'] != "")
   
   
   $search_term_leaderboard = $_GET['loc_leaderboard'];
   

if ($_GET['loc_sidebar'] != "")
   
   
   $search_term_sidebar = $_GET['loc_sidebar'];
   
if ($_GET['loc_footer'] != "")
   
   
   $search_term_footer = $_GET['loc_footer'];
   

if ($_GET['location_floating'] != "")
   
   
   $search_term_floater = $_GET['location_floating'];
   
   
if ($_GET['website_diverse'] != "")
   
   
   $search_term_diverse = $_GET['website_diverse'];


if ($_GET['website_cc'] != "")
   
   
   $search_term_ccnews = $_GET['website_cc'];
   
   
   if ($_GET['website_military'] != "")
   
   
   $search_term_military = $_GET['website_military'];
   
   
   if ($_GET['website_health'] != "")
   
   
   $search_term_health = $_GET['website_health'];
   
   
   if ($_GET['website_jobs'] != "")
   
   
   $search_term_diversej = $_GET['website_jobs'];


 if ($_GET['news_daily'] != "")
 
 $search_term_dailynews = $_GET['news_daily'];


 if ($_GET['news_health'] != "")
 
 $search_term_healthnews = $_GET['news_health'];


 if ($_GET['news_hiring'] != "")
 
 $search_term_hiringnews = $_GET['news_hiring'];
 

 if ($_GET['news_military'] != "")
 
 $search_term_military_news = $_GET['news_military'];
 

 if ($_GET['news_recap'] != "")
 
 $search_term_recapnews = $_GET['news_recap'];

if ($_GET['news_cc'] != "")
 
 $search_term_ccnewsletter = $_GET['news_cc'];


  $sqli .= " AND";
  
  
   $terms = 0;
   
   if ($search_term_client != "")
   
   {
	   $terms++;
	   
	   $sqli .= " client_name LIKE '%{$search_term_client}%'";
	   
   }
   
   // SEARCH BY LOCATION //
   if ($search_term_leaderboard != "")
   
   {
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;
	   
	   $sqli .= " loc_leaderboard LIKE '%{$search_term_leaderboard}%'";
	   
   }
	   
	   if ($search_term_sidebar != "")
   
   {
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	  $terms++;
     $sqli .= " loc_sidebar LIKE '%{$search_term_sidebar}%'";
	   
   }
	   
	    if ($search_term_floater != "")
   
   {
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	  $terms++;
	
   $sqli .= " location_floating LIKE '%{$search_term_floater}%'";
   }
   
    if ($search_term_footer != "")
   
   {
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	  $terms++;
	   
  $sqli .= " loc_footer LIKE '%{$search_term_footer}%'";
	
}

// END SEARCH BY LOCATION //

// SEARCH BY WEBSITE //




 if ($search_term_diverse != "")
   {
	   if ($terms > 0 )
	   {   
		$sqli .= " AND";   
	   }
	     $terms++;
	   
	   $sqli .= " website_diverse LIKE '%{$search_term_diverse}%'";
   }
	   
	    if ($search_term_health != "")
		
		{
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;
	   
	   $sqli .= " website_health LIKE '%{$search_term_health}%'";
	   
		}
	   
	   
	  if ($search_term_ccnews != "")
		{
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;
     
	    $sqli .= " website_cc LIKE '%{$search_term_ccnews}%'";
	}
		
		
       if ($search_term_military != "")
		{
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;
	   
	    $sqli .= " website_military LIKE '%{$search_term_military}%'";

}
  if ($search_term_diversej != "")
		{
	   if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;
	   
	    $sqli .= " website_jobs LIKE '%{$search_term_diversej}%'";

}

if ($search_term_dailynews != "")

{

if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_daily LIKE '%{$search_term_dailynews}%'";
	
}
	
if ($search_term_militarynews != "")

{

if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_military LIKE '%{$search_term_militarynews}%'";
	
}
	
if ($search_term_healthnews != "")

{
if ($terms > 0 )
	   
	   {   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_health LIKE '%{$search_term_healthnews}%'";
	
}

if ($search_term_newsrecap != "")

{
if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_recap LIKE '%{$search_term_newsrecap}%'";
	
}


if ($search_term_ccnewsletter != "")

{
if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_cc LIKE '%{$search_term_ccnewsletter}%'";
	
}

if ($search_term_hiringnews != "")

{
if ($terms > 0 )
	   
	   {
		   
		$sqli .= " AND";   
	   }
	   
	   $terms++;

	$sqli .= " news_hiring LIKE '%{$search_term_hiringnews}%'";
	
}

// END //
 if ($search_term_startdate != "")
   
   {
	
	 if($terms > 0 )
	   {
		   
	   $sqli .= " AND";
	
	   }
	   
	   $terms++;
	   
	   $sqli .= " duration_start_date LIKE '%{$search_term_startdate}%'";
	   
	   
   }
   if ($search_term_enddate != "")
   
   {
	   
	   if($terms > 0)
	   
	 
	 { $sqli .=" AND";  }
	 

   $terms++;
   
   $sqli .=" duration_end_date LIKE '%{$search_term_enddate}%'";
   
   }
   
   if ($search_term_status != "")
   
   {
	   
	   if($terms > 0)
	   
	 
	 { $sqli .=" AND";  }
	 

   $terms++;
   
   $sqli .=" status LIKE '%{$search_term_status}%'";
   
   }
   
  
  if ($search_term_agent != "")
   
   {
	   
	   if($terms > 0)
	   
	 
	 { $sqli .=" AND";  }
	 

   $terms++;
   
   $sqli .=" sales_agent LIKE '%{$search_term_agent}%'";
   
   }

   if ($terms == 0)
   
   {
	   
	$displayResults = 0;   
  
   }
   
   else  {
	   
	   
	   	
$total_records = mysqli_num_rows(mysqli_query($link,$sqli));

$pages =  ceil($total_records / 10);

if  ($total_records > 1) {

echo  "<br/><h5><strong>$total_records</strong> records found</h5><br/>";

}

else  

{  echo   "<br/><h5><strong>$total_records</strong> record found</h5><br/>";           }
	   

 }
  
  if  ($pages > 1)  {
	  
	  
	echo "<p style='font-family:Verdana, Geneva, sans-serif;
	font-style:italic;
	font-size:12px; margin: 10px; color:red;';>Page "; echo $page;  echo  " of ";  echo $pages;  "</p><br/>";  
  }
 
if (!(is_numeric($page)) || $page < 1) 

  { 

    $page = 1;   

  }  //if page = 0 or null or page 1

$sqli .= " LIMIT ".(($page - 1) * 10).",10" ;   // LIMIT 10,10
  


  //$sql = "SELECT * FROM event;"; //no sql connection
$displayResults = 1;


if($terms == 0)
{

$displayResults = 0;

  
}

else

{  

$query = mysqli_query($link, $sqli) or die (mysqli_error($link));
}
?>



<?php

$search_array = array();

if($displayResults == 0)

{

 return $search_array;

}

 
echo "<table class='table-hover' width='auto' cellpadding='4' cellpadding='4' style='font-size:13px; font-family:Verdana, Geneva, sans-serif;'>";


echo '<tr style="bg-color:#000;">';

echo "<td width='auto' bgcolor='#FFF;'></td>";

echo "<td width='25%' bgcolor='#FFF;'><b>Client Name</b></td>";

echo "<td width='' bgcolor='#FFCD42;'><b>Start Date</b></td>";

echo "<td width='' bgcolor='#FFCD42;'><b>End Date</b></td>";
echo "<td width='' bgcolor='#FFCD42;'><b>Status</b></td>";
echo "<td  width='20%' bgcolor='yellow'><b>Ad location</b></td>";
echo "<td bgcolor='yellow'></td>";
echo "<td bgcolor='yellow'></td>";
echo "<td bgcolor='yellow'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'><b style='color:#FFF;'> Platforms</b></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='blue;'></td>";
echo "<td bgcolor='#000;'><b style='color:#FFF;'>Impressions</b></td>";

echo "</tr>";



while ($row = mysqli_fetch_assoc($query))    

 {  array_push($search_array, $row)
 

  ?>
  
  
  <?
  
    $o_id = $_GET['orderid'];
   
 $o_id = "orderid";   
 
 
 
  ?>

<tr>

<td width="auto"><?php echo "<a href=order-details.php?orderid=".$row[id]." target=_blank><span class='fa fa-file fa-lg' title='Go to order'  /></a>" ?></td>

<td><?php echo $row ['client_name']; ?></td>

<td><?php echo $row ['duration_start_date']; ?></td>

<td><?php echo $row ['duration_end_date']; ?></td>

<td><?php echo $row ['status']; ?></td>

<?php
if (($row['loc_sidebar'] != " ")  &&  ($row['loc_sidebar'] != "0" ))
   {

echo "<td>";  echo $row ['loc_sidebar']; echo "</td>";
   }
   
   else   {   echo "<td>";  echo  "</td>";  }  

?>
<?php
   
  if (($row['loc_leaderboard'] != " ")  &&  ($row['loc_leaderboard'] != "0" ))
   {

echo "<td>";  echo $row ['loc_leaderboard']; echo "</td>";
}
else   {   echo "<td>";  echo  "</td>";  }  

?>

<?php
   
  if (($row['location_floating'] != " " )  &&  ($row['location_floating'] != "0"))
   {

echo "<td>";  echo $row ['location_floating'];  echo "</td>";
  }
   else 
   // if ($row['location_floating'] = "" &&  $row['location_floating'] = '0')
   
    {    echo "<td>";  echo  "</td>";  }
   
   ?>

<?php

if (($row['loc_footer']  != " " ) && ($row['loc_footer'] != "0"))
{
echo "<td>";    echo $row ['loc_footer'];   echo "</td>";
}


else  {
	
	  echo "<td>";  echo  "</td>"; 
}


?>
<?php

if (($row['website_jobs'] != " ") && ($row['website_jobs'] != "0"))
{
echo "<td>";   echo $row ['website_jobs']; echo "</td>";

}
else   {
  echo "<td>";  echo  "</td>"; 
	
}
?>
<?php
if (($row['website_diverse'] != "") && ($row['website_diverse'] != "0"))
{
echo "<td>";   echo $row ['website_diverse']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
	
}
?>

<?php
if (($row['website_military'] != " ") && ($row['website_military'] != "0"))
{
echo "<td>";   echo $row ['website_military']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
       }
?>

<?php
if (($row['website_health'] != NULL) && ($row['website_health'] != "0"))
{
echo "<td>";   echo $row ['website_health']; echo "</td>";

}
else   {
		 echo "<td>";  echo  "</td>"; 
	
}
?>

<?php
if (($row['website_cc'] != NULL) && ($row['website_cc'] != "0"))
{
echo "<td>";   echo $row['website_cc']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
}
?>

<?php
if (($row['news_daily'] != NULL) && ($row['news_daily'] != "0"))
{
echo "<td>";   echo $row['news_daily']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
}
?>

<?php
if (($row['news_health'] != NULL) && ($row['news_health'] != "0"))
{
echo "<td>";   echo $row['news_health']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
}
?>

<?php
if (($row['news_military'] != NULL) && ($row['news_military'] != "0"))
{
echo "<td>";   echo $row['news_military']; echo "</td>";

}
else   {
		echo "<td>";  echo  "</td>"; 
}
?>

<?php

if (($row['news_cc'] != NULL)  && ($row['news_cc'] != "0"))

{
	echo "<td>";  echo $row['news_cc']; echo "</td>";
	
}
else  {
	
		echo "<td>";  echo  "</td>"; 
	
}

?>


<?php

if (($row['news_recap'] != NULL)  && ($row['news_recap'] != "0"))

{
	echo "<td>";  echo  $row['news_recap']; echo "</td>";
	
}
else  {
	
		echo "<td>";  echo  "</td>"; 
	
}

?>

<?php

if (($row['news_hiring'] != NULL)  && ($row['news_hiring'] != "0"))


{
	echo "<td>";  echo  $row['news_hiring']; echo "</td>";
	
}
else  {
	
echo "<td>";  echo  "</td>"; 
	
}

?>
<?php

if (($row['impressions'] != NULL)  && ($row['impressions'] != "0"))

{
	echo "<td>";  echo  $row['impressions']; echo "</td>";
	
}
else  {
	
		echo "<td>";  echo  "</td>"; 
	
}

?>

</tr>

<?php   }  return $search_array; 

}; ?>

<?php

if (isset($_POST['search']))  {
	
$search_term_agent = $_POST['search_agent'];

$search_term_client = $_POST['search_client'];

$search_term_startdate = $_POST['search_startdate'];

$search_term_enddata = $_POST['search_enddate'];

$search_term_status = $_POST['search_status'];

$search_term_leaderboard = $_POST['leaderboard'];

//$search_term_websites =  $_POST['search_websites'];

//$search_terms_newsletters = $_POST['search_newsletters'];

}


if($_GET['sales_agent'] != "")


$search_term_agent = $_GET['sales_agent'];

   
if($_GET['client_name'] != "")


$search_term_client = $_GET['client_name'];

   
if ($_GET['duration_start_date'] != "")


$search_term_startdate = $_GET['duration_start_date'];  


if ($_GET['duration_end_date'] != "")


$search_term_enddate = $_GET['duration_end_date'];  


if ($_GET['status'] != "")


$search_term_status = $_GET['status'];  



if ($_GET['loc_leaderboard'] != "")
   
   
$search_term_location = $_GET['loc_leaderboard'];
   

if ($_GET['loc_sidebar'] != "")
   
   
   $search_term_location = $_GET['loc_sidebar'];
   
if ($_GET['loc_footer'] != "")
   
   
   $search_term_location = $_GET['loc_footer'];
   

if ($_GET['location_floating'] != "")
   
   
   $search_term_location = $_GET['location_floating'];
   
   
if ($_GET['website_diverse'] != "")


$search_term_websites = $_GET['website_diverse'];


if ($_GET['website_jobs'] != "")


$search_term_websites = $_GET['website_jobs'];


if ($_GET['website_cc'] != "")


$search_term_websites = $_GET['website_cc'];


if ($_GET['website_military'] != "")


$search_term_websites = $_GET['website_military'];



if ($_GET['website_health'] != "")


$search_term_websites = $_GET['website_health'];




$page = 1; 

if (is_numeric($_GET['page'])) 

 

{ $page = intval($_GET['page']); } 

$search_array = fetch_results($page,$db_database);

$array_count = count($search_array); 


if ($page <= 1) { ?><br/><< Previous</a> <? } 

else {  
?>
<a href="search_orders.php?page=<? echo ($page - 1); ?>&sales_agent=<? echo $search_term_agent; ?>&client_name=<? echo $search_term_client; ?>&duration_start_date=<? echo $search_term_startdate; ?>&duration_end_date=<? echo $search_term_enddate; ?>&status=<? echo $search_term_status; ?>
&loc_leaderboard=<? echo $search_term_leaderboard; ?>&loc_sidebar=<? echo $search_term_sidebar; ?>&loc_footer=<? echo $search_term_footer; ?>&loc_floater=<? echo $search_term_floater; ?>&website_diverse=<? echo $search_term_diverse; ?>
&website_jobs=<? echo $search_term_diversej; ?>&website_cc=<? echo $search_term_ccnews; ?>&website_military=<? echo $search_term_military; ?>
&website_health=<? echo $search_term_health; ?>&website_jobs=<? echo $search_term_diversej; ?>&news_daily=<? echo $search_term_dailynews; ?>
&news_health=<? echo $search_term_healthnews; ?>&news_military=<? echo $search_term_militarynews; ?>&news_cc=<? echo $search_term_ccnewslettter; ?>
&news_hiring=<? echo $search_term_hiringnews; ?>&news_recap=<? echo $search_term_newsrecap; ?><? echo '#down'; ?>"><br/><< Previous</a><? } 

if ($array_count < 10) {    ?>Next >></a><? } 

else {  ?><a href="search_orders.php?page=<? echo ($page + 1); ?>&sales_agent=<? echo $search_term_agent; ?>&client_name=<? echo $search_term_client; ?>&duration_start_date=<? echo $search_term_startdate; ?>&duration_end_date=<? echo $search_term_enddate; ?>&status=<? echo $search_term_status; ?>
&loc_leaderboard=<? echo $search_term_leaderboard; ?>&loc_sidebar=<? echo $search_term_sidebar; ?>&loc_footer=<? echo $search_term_footer; ?>&loc_floater=<? echo $search_term_floater; ?>&website_diverse=<? echo $search_term_diverse; ?>
&website_jobs=<? echo $search_term_diversej; ?>&website_cc=<? echo $search_term_ccnews; ?>&website_military=<? echo $search_term_military; ?>
&website_health=<? echo $search_term_health; ?>&website_jobs=<? echo $search_term_diversej; ?>&news_daily=<? echo $search_term_dailynews; ?>
&news_health=<? echo $search_term_healthnews; ?>&news_military=<? echo $search_term_militarynews; ?>&news_cc=<? echo $search_term_ccnewslettter; ?>
&news_hiring=<? echo $search_term_hiringnews; ?>&news_recap=<? echo $search_term_newsrecap; ?><? echo '#down'; ?>"><? echo $displayResults; ?>Next page >></a><? } ?><br />

</table>

<?
;
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
		 padding: '5px',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>
</html>
 