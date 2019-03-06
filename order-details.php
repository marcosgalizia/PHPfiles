<?php
session_start();
@ini_set('display_errors', 0);

	if(($_SESSION['level']) || ($_SESSION['username']) || ($_SESSION['id']))
	 
	 {

	 }

else if (!($_SESSION['id']) || !($_SESSION['username'])) 
	  {
		  
		  header ("Location: index.php");
	
	  }
	//echo '<h1>Please, <a href="index.php">login</a></h1>';  
   


session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);


if(isset($_GET['logoff']))
{
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}


$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 


$db_database = new MySQLi ($db_host, $db_user, $db_pass, $db_database)

or die ("Cannot connect to mySQL.");

 $o_id = "orderid";     

 $o_id = $_GET['orderid'];

$orderid = $_GET['orderid'];

$user = $_SESSION['username'];

$client = $_POST['Client_Name'];
  
  
  
 $_SESSION['error'] = " "; 
?>

<?php 
	
$command = "SELECT * FROM notif_emails WHERE id=1";
$result = $db_database->query($command);
while ($data = $result->fetch_object())  {
	     $old_setting_email1 = $data->email1;
	     $old_setting_email2 = $data->email2;
	     $old_setting_email3 = $data->email3;
	     $old_setting_email4 = $data->email4;
   $old_setting_promo_email2 = $data->email5;
   $old_setting_promo_email2 = $data->email6;
   $old_setting_promo_email3 = $data->email7;
   $old_setting_promo_email4 = $data->email8;	
   $old_setting_promo_email5 = $data->email9;
 
}

?>
<!DOCTYPE html>
<html lang="en">
   <title>Online Ad Manager</title>
<head>

  <style>
  
.form-control {
	
 background-color: #E5E5E5!important;
 color: #000!important;
	
}
  /*
  [class*="col-"] {
    margin-bottom: 20px;
}
*/
.video  {   
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 30px;
    margin-top: 0px!important;
    position: relative;
	width: 300px;
}

	.carousel {
    background:#94be5a;
}
.carousel-item {
  height: 200px;
 
}
.carousel-item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 200px;
}

.carousel-caption {
    text-align: right;
}

.carousel-caption {
  position: absolute;
  right: 2%!important;
  bottom: 80px;
  left:  45%!important;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: $carousel-caption-color;
  text-align: left!important;
}

.carousel-control-next, 
.carousel-control-prev  {

	
	width: 7%!important;
	color: #333!important;
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
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    
 <link rel="stylesheet" href="css/bootstrap-social.css"> 
 <link rel="stylesheet" href="css-b-orders/styles.css">
 

<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>

<script>
  googletag.cmd.push(function() {
    googletag.defineSlot('/1035663/SIDEBAR_AASHE_PAGE', [300, 250], 'div-gpt-ad-1514314096560-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

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
<?php echo '<h4 style="color:#a09f9f"><br>View/Edit Order</h4>';  ?>  

<div style="float:right; position:absolute; right: 99px; margin-top:-18px;">
<a class="nav-link"  href="javascript:if(window.print)window.print()" style="width:50px;"><span class="fa fa-print fa-2x" title="print"></span></a>
</div>
<div style="float:right; position:relative; right: 125px; margin-top: -10px;">
<?php
if (($_SESSION['username'] == $user ) && ($_SESSION['level'] == "admin")  ){
	
echo '<form action="" method="POST">';
echo '<button type="submit" name="delete" value="delete" title="Delete Order, THIS ACTION CANNOT BE UNDONE"  /><span class="fa fa-trash fa-1x"> </span></button>';
echo '</form>';

}
else if (($_SESSION['username'] != $user ) && ($_SESSION['level'] == "admin")  ){
	
echo '<form action="" method="POST">';
echo '<button type="submit" name="delete" value="delete" title="Delete Order, THIS ACTION CANNOT BE UNDONE"  /><span class="fa fa-trash fa-1x"> </span></button>';
echo '</form>';

}
else if (($_SESSION['username'] != $user ) && ($_SESSION['level'] != "admin") ){
}
else if  /*(($_SESSION['username'] != $user ) &&*/  ($_SESSION['level'] != "admin") 

{
}

?>

<?php
	 
if (isset($_POST['delete'])) {
	 

	 $deleted = "<p style='color:red; text-align:center;'><h4><b>ORDER DELETED!</b></h4></p>";
	 
$o_id = "orderid";     
$o_id = $_GET['orderid'];
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database)
	
	or die ("Cannot connect to mySQL.");
    // mysql delete query 
	
    $query = "DELETE FROM Banner_orders_submitted WHERE id=$o_id";
    
    $result = mysqli_query($link, $query);
    
    if($result) {
function clear_user_input($value) {
if (get_magic_quotes_gpc()) $value=stripslashes($value);
$value= str_replace( "\n", '', trim($value));
$value= str_replace( "\r", '', $value);
return $value;
}		
$body ="Here is the data that was submitted:\n ";
foreach ($_POST as $key => $value) {
		$key = clear_user_input($key);
		$value = clear_user_input($value);
		if ($key=='extras') {
		
		if (is_array($_POST['extras']) ){
			$body .= "$key: ";
			$counter =1;
			foreach ($_POST['extras'] as $value) {
			
				if (sizeof($_POST['extras']) == $counter) {
					$body .= "$value\n";
					break;}	
				
				else {
						$body .= "$value, ";	
		                $counter += 1;
						}
				}
} else {

					$body .= "$key: $value\n";
				}
		} else {

			$body .= "$key: $value\n";
			}
}	
extract($_POST);
$email = clear_user_input($email);
$name = clear_user_input($Name); 
$headers .= "Reply-To: ". strip_tags($_POST['Email_address']) . "\r\n";
/*$headers .= "CC: mgalizia@cmapublishing.com\r\n";*/
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message .= '<html><body>';
$message .= '<p>User <b>'.$user.'</b> has deleted <b> Order # '.$orderid.'  ( '.$submit_clientname.')</b> from the Online Ads Manager web site.';
$message .= "</body></html>";
$subject = 'ORDER DELETED FROM ONLINE AD MANAGER SITE';
/* e-mail sending conditionals  */

mail (''.$old_setting_email1.'', $subject, $message, $headers);  
mail (''.$old_setting_email2.'', $subject, $message, $headers);  
mail (''.$old_setting_email3.'', $subject, $message, $headers);  
mail (''.$old_setting_email4.'', $subject, $message, $headers);  

$_SESSION['delete'] = $deleted;
echo "<meta http-equiv='refresh'
content='0;URL=http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1'>";
//header ('Location:http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1'); 
//echo "<div style='background-color: red; color:#fff; padding:10px;'>";
//echo "<B>ORDER REMOVED!!!</B>";
//echo "</div>";
}else
{
 echo 'Data Not Deleted';
    }
    mysqli_close($link);
	}


?>
</div>
 <!--
 <div align="right">
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" style="right: 5px; position:fixed; bottom: 10px; z-index: 999; float:right;">
  <b>?</b>
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
     -->
   <?php  
// require ('includes/impressions-available.php');
	  
	  ?>
   
<div class="row row-header">
 <!--      <div class="col-12 col-md-7 col-sm-12 align-self-center">
             
    </div>-->
<!--
 <div align="center" style="color:#c15f09; font-weight:bold;"><h4><b>2018 Arthur Ashe Jr Sports Scholars will be announced on April 5, 2018</b></h4></div>  -->
        </div>
        </div>
  </header>

   <div class="container">
   <div class="row row-content">
   <div class="col-sm-4 col-md-3" style="top: 10px;">


<?php

if  
(   $_SESSION['level'] == 'admin' ) 


{


 if(isset($_POST['update'])){

        $value = $_POST['status'];
		
        $command = mysqli_query($db_database,"UPDATE Banner_orders_submitted SET status = '$value' WHERE id = $o_id");
		
		echo "Status changed to <b><p style='color:red;'> $value</p></b>";
    }
	
echo '<form method="post" action="" enctype="multipart/form-data">';
echo '<select name="status">';
echo  '<option value="Change Status">Change Status</option>';
echo  '<option value="Pending">Pending</option>';
echo  '<option value="Ready">Ready</option>';
echo  '<option value="Active">Active</option>';
echo  '<option value="Cancelled">Cancelled</option>';
echo  '<option value="Completed">Completed</option>';
echo  '</select>';
echo '<button type="submit" name="update" class="btn btn-warning btn-sm" value="update" >UPDATE</button>';
echo '</form>';


$command = "SELECT status FROM Banner_orders_submitted WHERE id = $o_id";
$result = mysqli_query($db_database, $command);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
	
$status = $row['status'];
    }
} 
else {
  echo "NOT SELECTED";
}

mysqli_close($command);


if ( isset($_POST['update']))  {
	

	
function clear_user_input($value) {
if (get_magic_quotes_gpc()) $value=stripslashes($value);
$value= str_replace( "\n", '', trim($value));
$value= str_replace( "\r", '', $value);
return $value;
}		
		

$body ="Here is the data that was submitted:\n ";



foreach ($_POST as $key => $value) {
		$key = clear_user_input($key);
		$value = clear_user_input($value);
		if ($key=='extras') {
		
		if (is_array($_POST['extras']) ){
			$body .= "$key: ";
			$counter =1;
			foreach ($_POST['extras'] as $value) {
			
				if (sizeof($_POST['extras']) == $counter) {
					$body .= "$value\n";
					break;}	
				
				else {
						$body .= "$value, ";	
		                $counter += 1;
						}
				}
} else {

					$body .= "$key: $value\n";
				}
		} else {

			$body .= "$key: $value\n";
			}
}	

extract($_POST);
$email = clear_user_input($email);
$name = clear_user_input($Name); 


$headers .= "Reply-To: ". strip_tags($_POST['Email_address']) . "\r\n";
/*$headers .= "CC: mgalizia@cmapublishing.com\r\n";*/
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message .= '<html><body>';
$message .= '<p>User <b>'.$user.'</b> has changed status to <b style="color: red;">'.$status.'</b> for <b> Order # '.$orderid.'  ( '.$submit_clientname.')</b> in the Online Ads Manager web site,
<br>to log in click the link below:<br><br>
 http://diversepodium.com/Online-Ad-Manager/index.php';
$message .= "</body></html>";

$subject = 'AD ORDER STATUS CHANGED';

/* e-mail sending conditionals  */
mail (''.$old_setting_email1.'', $subject, $message, $headers);  
mail (''.$old_setting_email2.'', $subject, $message, $headers);  
mail (''.$old_setting_email3.'', $subject, $message, $headers);  
mail (''.$old_setting_email4.'', $subject, $message, $headers);  
}
}
else  {
	
	
}

?>
<!--
<h3>ACTIVITY</h3>
-->

</div>
    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">
 
    
<?php

$imp_number = "^[\d]*$";

$submit_clientname = $_POST['Client_Name'];

$submit_sagent = $_POST['sales_agent'];

$submit_contact = $_POST['Contact_Name'];

$submit_email = $_POST['Email_address'];

$submit_phone = $_POST['Phone'];

$submit_locleaderboard = $_POST['Leaderboard'];

$submit_locsidebar = $_POST['Sidebar'];

$submit_locfloating = $_POST['Floating'];

$submit_locfooter = $_POST['Footer'];

$submit_startdate = $_POST['Start_date'];

$submit_enddate = $_POST['End_date'];

$submit_impressions = $_POST['Number_of_impressions'];

$submit_statuspending = $_POST['Status_pending'];

$submit_statusactive = $_POST['Status_active'];

$submit_statuscancelled = $_POST['Status_cancelled'];

$submit_bannerURL = $_POST['Banner_Url'];

$submit_diverseeducation = $_POST['Diverse Education'];

$submit_diversejobs = $_POST['Diverse_Jobs'];

$submit_ccnewsnow = $_POST['CCNews'];

$submit_dmilitary = $_POST['Diverse_Military'];

$submit_dhealth = $_POST['Diverse_Health'];

$submit_dnewsletter = $_POST['Daily_Newsletter'];

$submit_CCNewsletter = $_POST['CC_newsletter'];

$submit_militarynews = $_POST['Military_newsletter'];

$submit_healthnews = $_POST['Health_Newsletter'];

$submit_Hiringnewsletter = $_POST['Hiring_newsletter'];

$submit_newsrecap = $_POST['News_Recap'];

$submit_attachment1 = $_POST['image1'];

$submit_attachment2 = $_POST['image2'];

$submit_attachment3 = $_POST['image3'];

$submit_attachment4 = $_POST['image4'];

$submit_attachment5 = $_POST['image5'];

$submit_notes = $_POST['order_notes'];

//$command = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die('Unable to establish a DB connection');

/*  Image upload to server */

$submit_attachment1 = $_FILES['image1']['name'];

$target1 = "uploads/".basename($image1);

$submit_attachment2 = $_FILES['image2']['name'];

$target2 = "uploads/".basename($submit_attachment2);

$submit_attachment3 = $_FILES['image3']['name'];

$target3 = "uploads/".basename($image3);

$submit_attachment4 = $_FILES['image4']['name'];

$target4 = "uploads/".basename($image4);

$submit_attachment4 = $_FILES['image5']['name'];

$target5 = "uploads/".basename($image5);

$command = "SELECT * FROM Banner_orders_submitted WHERE id =" . $o_id; 


$attachment1 = mysqli_real_escape_string ($command ,$_POST['image1']);
$attachment2 = mysqli_real_escape_string ($command ,$_POST['image2']);
$attachment3 = mysqli_real_escape_string ($command ,$_POST['image3']);
$attachment4 = mysqli_real_escape_string ($command ,$_POST['image4']);
$attachment5 = mysqli_real_escape_string ($command ,$_POST['image5']);


$result = $db_database->query($command);
while ($data = $result->fetch_object())  {
	
	
	$old_setting_client = $data->client_name;
	$old_setting_sagent = $data->sales_agent;
	$old_setting_contact = $data->contact;
	$old_setting_email = $data->email;
	$old_setting_phone = $data->phone;
	$old_setting_loc_sidebar = $data->loc_sidebar;
	$old_setting_loc_leaderboard = $data->loc_leaderboard;
	$old_setting_loc_footer = $data->loc_footer;
	$old_setting_loc_floating = $data->location_floating;
	$old_setting_dur_start_date = $data->duration_start_date;
	$old_setting_dur_end_date = $data->duration_end_date;
	$old_setting_impressions = $data->impressions;
    $old_setting_status_pending = $data->status;
    $old_setting_status_active = $data->status;
	$old_setting_status_cancelled = $data->status;
	$old_setting_banner_url = $data->url;
	$old_setting_webdiverse = $data->website_diverse;
    $old_setting_wjobs = $data->website_jobs;
	$old_setting_wcc = $data->website_cc; 
    $old_setting_wmilitary = $data->website_military;
    $old_setting_whealth = $data->website_health; 
	$old_setting_newsdaily = $data->news_daily;
	$old_setting_newshealth = $data->news_health;
	$old_setting_newsmilitary = $data->news_military;
	$old_setting_newscc = $data->news_cc;
	$old_setting_newshiring = $data->news_hiring;
	$old_setting_newsrecap = $data->news_recap;
	$old_setting_attachment1 = $data->image1_url;
	$old_setting_attachment2 = $data->image2_url;
   	$old_setting_attachment3 = $data->image3_url;
	$old_setting_attachment4 = $data->image4_url;
	$old_setting_attachment5 = $data->image5_url;
	$old_setting_notes = $data->notes;
	$date_submitted = $data->date;
    $id = $data->id;
    $user = $data->user; 


if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   

{

}


else  

if   (($_POST["submit"] == "SAVE CHANGES") &&   ( ($_SESSION['username']) == $user  || $_SESSION['level'] == 'admin')  ) 


{
	
$attachment1 = mysqli_real_escape_string ($command ,$_POST['image1']);

$attachment2 = mysqli_real_escape_string ($command ,$_POST['image2']);

$attachment3 = mysqli_real_escape_string ($command ,$_POST['image3']);

$attachment4 = mysqli_real_escape_string ($command ,$_POST['image4']);

$attachment5 = mysqli_real_escape_string ($command ,$_POST['image5']);

	
$success = $db_database->query($command);


$command = "SELECT * FROM Banner_orders_submitted where id=" . $o_id;  



$placeholder  = "place-holder.png";


$success = true;

/*

$adlocations = "";
        for ($i=0; $i < count($_POST['adlocations']); $i++) {
	    $adlocations = adlocations . $_POST['adlocation'][$i] . " "; 
		$updateSQL = sprintf("UPDATE Banner_orders_submitted SET category='%s' WHERE id=$o_id, $adlocations);
	}
*/

if($submit_clientname!= $old_setting_client)
   {
     $command = "UPDATE Banner_orders_submitted SET client_name='".$db_database->real_escape_string($submit_clientname)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	
   }      
     
if($submit_sagent!= $old_setting_sagent)
   {
     $command = "UPDATE Banner_orders_submitted SET sales_agent='".$db_database->real_escape_string($submit_sagent)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	
   }      
     
 
   if($submit_contact!= $old_setting_contact)
   {
	   
     $command = "UPDATE Banner_orders_submitted SET contact='".$db_database->real_escape_string($submit_contact)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	
   }    
   
   if($submit_email!= $old_setting_email)
   {
	   
     $command = "UPDATE Banner_orders_submitted SET email='".$db_database->real_escape_string($submit_email)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	
   }   
   
   
    if($submit_phone != $old_setting_phone)
   {
     $command = "UPDATE Banner_orders_submitted SET phone='".$db_database->real_escape_string($submit_phone)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }   
   /*
   
   if (($submit_locleaderboard !=  $old_setting_loc_leaderboard) &&  ($old_setting_loc_leaderboard = "Leaderboard") )
   {
	   
	   
	   $command = "INSERT INTO Banner_orders_submitted ( loc_leaderboard )

 '$location_leaderboard')";
  $success = $db_database->query($command);
   }*/
/*
	   
     $command = "UPDATE Banner_orders_submitted SET loc_leaderboard'".$db_database->real_escape_string($submit_locleaderboard)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }     */
   
     if($submit_locsidebar != $old_setting_loc_sidebar )
   {
     $command = "UPDATE Banner_orders_submitted SET loc_sidebar='".$db_database->real_escape_string($submit_locsidebar)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }   
   
     if($submit_locfooter != $old_setting_loc_footer )
   {
     $command = "UPDATE Banner_orders_submitted SET loc_footer='".$db_database->real_escape_string($submit_locfooter)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }   
 
     if($submit_startdate != $old_setting_dur_start_date )
   {
     $command = "UPDATE Banner_orders_submitted SET duration_start_date='".$db_database->real_escape_string($submit_startdate)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }    
   
     if($submit_enddate != $old_setting_dur_end_date )
   {
     $command = "UPDATE Banner_orders_submitted SET duration_end_date='".$db_database->real_escape_string($submit_enddate)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }   
   
   
     //changes to code on  10-22-2018
    
if  (!preg_match ("/$imp_number/", $submit_impressions))  
	
{
	
 $error_message = "<p style='color: red;'>Number of impressions cannot contain commas or periods!</h4></p>";



}

else if (preg_match ("/$imp_number/", $submit_impressions)) 

  { $_SESSION['error'] = ""; 
  
   }



if ($error_message)  {
	
	$_SESSION['error'] = $error_message; 

     

header('Location: http://www.diversepodium.com/Online-Ad-Manager/order-details.php');

}

 // END OF CHANGES
 
  
 
  if($submit_impressions != $old_setting_impressions )
   {
     $command = "UPDATE Banner_orders_submitted SET impressions='".$db_database->real_escape_string($submit_impressions)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }  
 
 /*
     if($submit_statuspending != $old_setting_status_pending )
   {
     $command = "UPDATE Banner_orders_submitted SET status='".$db_database->real_escape_string($submit_statuspending)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }  
 
  
    if($submit_statusactive != $old_setting_status_active )
   {
     $command = "UPDATE Banner_orders_submitted SET status='".$db_database->real_escape_string($submit_statusactive)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   }  
 
     if($submit_statuscancelled!= $old_setting_status_cancelled )
   {
     $command = "UPDATE Banner_orders_submitted SET status='".$db_database->real_escape_string($submit_statuscancelled)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   */
   
      if($submit_bannerURL != $old_setting_banner_url)
   {
     $command = "UPDATE Banner_orders_submitted SET url='".$db_database->real_escape_string($submit_bannerURL)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
   } 
   
     if($submit_diverseeducation != $old_setting_webdiverse)
   {
     $command = "UPDATE Banner_orders_submitted SET website_diverse='".$db_database->real_escape_string($submit_diverseeducation)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
     if($submit_diversejobs!= $old_setting_wjobs)
   {
     $command = "UPDATE Banner_orders_submitted SET website_jobs='".$db_database->real_escape_string($submit_diversejobs)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
    if($submit_ccnewsnow != $old_setting_wcc)
   {
     $command = "UPDATE Banner_orders_submitted SET website_cc='".$db_database->real_escape_string($submit_ccnewsnow)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
   
           if($submit_dmilitary != $old_setting_wmilitary)
   {
     $command = "UPDATE Banner_orders_submitted SET website_military='".$db_database->real_escape_string($submit_dmilitary)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
  
     if($submit_dhealth != $old_setting_whealth)
   {
     $command = "UPDATE Banner_orders_submitted SET website_health='".$db_database->real_escape_string($submit_dhealth)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
       if($submit_dnewsletter != $old_setting_newsdaily)
   {
     $command = "UPDATE Banner_orders_submitted SET news_daily='".$db_database->real_escape_string($submit_dnewsletter)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
      if($submit_CCNewsletter != $old_setting_newscc )
   {
     $command = "UPDATE Banner_orders_submitted SET newscc='".$db_database->real_escape_string($submit_CCNewsletter)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
    if($submit_militarynews != $old_setting_newsmilitary )
   {
     $command = "UPDATE Banner_orders_submitted SET news_military='".$db_database->real_escape_string($submit_militarynews)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
        if($submit_healthnews != $old_setting_newshealth )
   {
     
	 $command = "UPDATE Banner_orders_submitted SET news_health='".$db_database->real_escape_string($submit_healthnews)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
    if($submit_Hiringnewsletter != $old_setting_newshiring )
   {
     
	 $command = "UPDATE Banner_orders_submitted SET news_hiring='".$db_database->real_escape_string($submit_Hiringnewsletter)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
 
        if($submit_newsrecap != $old_setting_newsrecap )
   {
     
	 $command = "UPDATE Banner_orders_submitted SET news_recap='".$db_database->real_escape_string($submit_newsrecap)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
   
   
/*  IMAGES UPLOADING  */	
// $image1 = $_POST['image1'];

  
//$command ="SELECT image1_url FROM Banners_orders_submitted WHERE id='$o_id'";



//$image1 = $submit_attachment1; 

$image1 = $_FILES['image1']['name'];


$target1 = "uploads/".basename($image1);


$image2 = $_FILES['image2']['name'];

$target2 = "uploads/".basename($image2);


$image3 = $_FILES['image3']['name'];

$target3 = "uploads/".basename($image3);


$image4 = $_FILES['image4']['name'];

$target4 = "uploads/".basename($image4);

$image5 = $_FILES['image5']['name'];

$target5 = "uploads/".basename($image5);


//if ( is_uploaded_file($_FILES['image1']['$image1']) &&  ($_FILES['image1']['$image1'] ))

if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1))  {


$command = "UPDATE Banner_orders_submitted SET image1_url='".$db_database->real_escape_string($submit_attachment1)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target1 = "http://diversepodium.com/ONLINE-AD-MANAGER-DEVSITE/uploads/".basename($image1);

} 
 
/* if   ($submit_attachment2!= $old_setting_attachment2 )*/
  if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2))  
  	
   {
     
	 $command = "UPDATE Banner_orders_submitted SET image2_url='".$db_database->real_escape_string($submit_attachment2)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

  			$target2 = "http://diversepodium.com/ONLINE-AD-MANAGER-DEVSITE/uploads/".basename($image2);
  
   } 
 
    //if($submit_attachment3!= $old_setting_attachment3)
	
	if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3))  
   {
     
	 $command = "UPDATE Banner_orders_submitted SET image3_url='".$db_database->real_escape_string($submit_attachment3)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	 
	 $target3 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image3);

   } 
 
 
  //  if($submit_attachment4!= $old_setting_attachment4)
  if (move_uploaded_file($_FILES['image4']['tmp_name'], $target4))  
   {
     
	 $command = "UPDATE Banner_orders_submitted SET image4_url='".$db_database->real_escape_string($submit_attachment4)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

     $target4 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image4);

   
   } 
 //  if($submit_attachment5!= $old_setting_attachment5)
   
   if (move_uploaded_file($_FILES['image5']['tmp_name'], $target5))  
   {
     
	 $command = "UPDATE Banner_orders_submitted SET image5_url='".$db_database->real_escape_string($submit_attachment5)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

    $target5 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image5);

   } 
 
    if($submit_notes!= $old_setting_notes)  
   {
      $command = "UPDATE Banner_orders_submitted SET notes='".$db_database->real_escape_string($submit_notes)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);

   } 
 
 //   {
  
  
if($success == true)
  {
	  
    echo "<p style='color:red; font-weight:bold;'>ORDER UPDATED!</p>";
 
    $old_setting_sagent = $submit_sagent;
    $old_setting_client = $submit_clientname;
    $old_setting_contact = $submit_contact;
    $old_setting_email = $submit_email;
    $old_setting_phone = $submit_phone;
	$old_setting_loc_leaderboard = $submit_locleaderboard;
    $old_setting_loc_sidebar = $submit_locsidebar;
	$old_setting_loc_floating = $submit_locfloating;
	$old_setting_loc_footer = $submit_locfooter;
	$old_setting_dur_start_date = $submit_startdate;
	$old_setting_dur_end_date = $submit_enddate;
	$old_setting_impressions =  $submit_impressions;
/*	$old_setting_status_pending = $submit_statuspending;
	$old_setting_status_active  = $submit_statusactive; 
	$old_setting_status_cancelled = $submit_statuscancelled;  */
    $old_setting_banner_url = $submit_bannerURL; 
	$submit_diverseeducation = $old_setting_webdiverse;
	$old_setting_wjobs = $submit_diversejobs;
    $old_setting_wmilitary = $submit_dmilitary;
	$old_setting_whealth = $submit_dhealth;

	$old_setting_newsdaily = $submit_dnewsletter;
	$old_setting_newscc = $submit_CCNewsletter;
	$old_setting_newsmilitary = $submit_militarynews;
	$old_setting_newshealth =  $submit_healthnews;
	$old_setting_newshiring = $submit_Hiringnewsletter;
	$old_setting_newsrecap =  $submit_newsrecap;
	$old_setting_attachment1 = $submit_attachment1;
	$old_setting_attachment2 = $submit_attachment2;
	$old_setting_attachment3 = $submit_attachment3;
	$old_setting_attachment4 = $submit_attachment4;
	$old_setting_attachment5 = $submit_attachment5;
	$old_setting_notes = $submit_notes;

		
$user = $_SESSION['username'];

	/* send NOTIFICATION BY EMAIL  */
	
function clear_user_input($value) {
if (get_magic_quotes_gpc()) $value=stripslashes($value);
$value= str_replace( "\n", '', trim($value));
$value= str_replace( "\r", '', $value);
return $value;
}		
		
$body ="Here is the data that was submitted:\n ";


foreach ($_POST as $key => $value) {
		$key = clear_user_input($key);
		$value = clear_user_input($value);
		if ($key=='extras') {
		
		if (is_array($_POST['extras']) ){
			$body .= "$key: ";
			$counter =1;
			foreach ($_POST['extras'] as $value) {
			
				if (sizeof($_POST['extras']) == $counter) {
					$body .= "$value\n";
					break;}	
				
				else {
						$body .= "$value, ";	
		                $counter += 1;
						}
				}
} else {

					$body .= "$key: $value\n";
				}
		} else {

			$body .= "$key: $value\n";
			}
}	

extract($_POST);
$email = clear_user_input($email);
$name = clear_user_input($Name); 


$headers .= "Reply-To: ". strip_tags($_POST['Email_address']) . "\r\n";
/*$headers .= "CC: mgalizia@cmapublishing.com\r\n";*/
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message .= '<html><body>';
$message .= '<p>User <b>'.$user.'</b> has updated <b> Order # '.$id.'  ( '.$submit_clientname.')</b> in the Online Ads Manager web site,
to log in click the link below:<br><br>
 http://diversepodium.com/Online-Ad-Manager/index.php';
$message .= "</body></html>";

$subject = 'AD ORDER UPDATE - '. strip_tags($_POST['Client_Name']);

/* e-mail sending conditionals  */


mail (''.$old_setting_email1.'', $subject, $message, $headers);  
mail (''.$old_setting_email2.'', $subject, $message, $headers);  
mail (''.$old_setting_email3.'', $subject, $message, $headers);  
mail (''.$old_setting_email4.'', $subject, $message, $headers);  

header ('Location: http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1'); 

	
  }
  
 }
  else
  {
	  
     $submit_sagent != $old_setting_sagent;
     $submit_clientname != $old_setting_client;
     $submit_contact !=  $old_setting_contact ;
	 $submit_email != $old_setting_email;
     $submit_phone != $old_setting_phone;
     $submit_locsidebar != $old_setting_loc_sidebar;  
     $submit_locfloating != $old_setting_loc_floating; 
	 $submit_locleaderboard != $old_setting_loc_leaderboard;  
     $submit_locfooter != $old_setting_loc_footer;
	 $submit_stardate != $old_setting_dur_start_date;
     $submit_enddate != $old_setting_dur_end_date;
     $submit_impressions != $old_setting_impressions;
	/* $submit_statuspending != $old_setting_status_pending;
	 $submit_statusactive != $old_setting_status_active;
	 $submit_statuscancelled != $old_setting_status_cancelled; */
     $submit_bannerURL != $old_setting_banner_url;
     $submit_diverseeducation != $old_setting_webdiverse;
	 $submit_diversejobs != $old_setting_wjobs;
	 $submit_dmilitary != $old_setting_wmilitary;
	 $submit_dhealth != $old_setting_dhealth;
	 $submit_dnewsletter != $old_setting_newsdaily; 
	 $submit_CCNewsletter != $old_setting_newscc;
     $submit_militarynews != $old_setting_newsmilitary;
	 $submit_healthnews != $old_setting_newshealth;
     $submit_Hiringnewsletter != $old_setting_newshiring;
	 $submit_newsrecap != $old_setting_newsrecap;
	 $submit_attachment1 !=  $old_setting_attachment1;
	 $submit_attachment2 !=  $old_setting_attachment2;
     $submit_attachment3 !=  $old_setting_attachment3;
     $submit_attachment4 !=  $old_setting_attachment4;
	 $submit_attachment5 !=  $old_setting_attachment5;
     $submit_notes != $old_setting_notes;
	
 }

}
?>
<?php
/*
echo  '<select name="selected" class="custom-select custom-select-lg mb-3">';
echo  '<option selected>Not Selected</option>';
echo  '<option value="value="'.$old_setting_status_pending.'" name="Status_pending"<?php  if ($_SESSION["selected"] == "Pending")  echo "selected"; ?>Pending</option>';
echo  '<option value="'.$old_setting_status_active.'" name="Status_active"<?php  if ($_SESSION["selected"] == "Active")  echo "selected"; ?>Active <b>*<b></option>';
echo  '<option value=""'.$old_setting_status_cancelled.'" name="Status_cancelled"<?php  if ($_SESSION["selected"] == "Cancelled")  echo "selected"; ?>Cancelled</option>';
echo  '</select>';
*/
echo "<div style='background-color:#e3f6f7; padding: 5px; width:auto; border: 1px dotted #ccc;'>";
echo "&nbsp;&nbsp;&nbsp;Order #: ";  echo "<b>"; echo $id;  echo "</b><h4>"; echo "&nbsp;&nbsp;"; echo $old_setting_client; echo "</h4>";
echo "&nbsp;&nbsp;&nbsp;Submitted on  ";  echo "<b>"; echo $date_submitted; echo "</b><br>";
echo "&nbsp;&nbsp;&nbsp;Created by&nbsp;";  echo "<i><b>"; echo $user; echo "</b></i><br/>";
if  
(   $_SESSION['level'] == 'admin' ) 
{
echo '<b><p style="float:right; position:relative; margin-top: -106px; margin-left: 15px;border: 2px solid; 
		padding: 5px; width: 120px; text-align:center;">';  echo $status; echo '</p></b>';
}
else {}
echo "<br>";
echo "</div>";
echo '<form action="" method="POST" enctype="multipart/form-data">';
echo "<br>";

if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   

{

}
else  if  (($_SESSION['username'] == $user ) ||  ($_SESSION['level'] == "admin"))   {

echo "<button type='submit' name='submit' class='btn btn-warning btn-sm' style='float:right; width: 20%; display:block;' value='SAVE CHANGES'>";
echo "&nbsp;SAVE CHANGES&nbsp;</button>";
}


echo $_SESSION['error'];   // Display error on screen 

if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {

echo '<div class="form-group col-sm-8">';
echo '<br>';
echo '<label for="formGroupExampleInput"><b class="fields">SALES REP</b></label><br>';
echo   $old_setting_sagent;
echo '</div>';

}


else  {
	
	
echo '<div class="form-group col-sm-8">';
echo '<br>';
echo '<label for="formGroupExampleInput"><b>SALES REP</b></label>';
echo '<input type="text" name="sales_agent"  class="form-control" id="sales_agent" value="'.$old_setting_sagent.'"/>';
echo '</div>';
	
}

if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))  {

echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput"><b>CLIENT NAME</b></label><br>';
echo  $old_setting_client;
echo '</div>';
}


else  {

echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput"><b>CLIENT NAME</b></label>';
echo '<input type="text" name="Client_Name" class="form-control" id="Client_Name" value="'.$old_setting_client.'"/>';
echo '</div>';
	
}

if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))  {

echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput2"><b>Contact Name</b></label><br>';

if ($old_setting_contact == "")  {
	
	echo "Not entered";
}
echo  $old_setting_contact;
echo '</div>';

}
else  {
	echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput2"><b>Contact Name</b></label>';
echo '<input type="text" name="Contact_Name" class="form-control" id="Contact_Name" value="'.$old_setting_contact.'"/>';
echo '</div>';

}



if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))  {

echo '<div class="form-group col-sm-8">'; 
echo '<label for="formGroupExampleInput2"><b>E-mail</b></label><br>';
echo $old_setting_email; 
echo '</div>';

}

else    {
	
echo '<div class="form-group col-sm-8">'; 
echo '<label for="formGroupExampleInput2"><b>E-mail</b></label>';
echo '<input type="text" name="Email_address" class="form-control" id="Email_address" value="'.$old_setting_email.'" />';
echo '</div>';
	
}


if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))  {


echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput2"><b>Phone number</b></label><br>';
echo $old_setting_phone;
echo '</div>';
}
else  {
	
echo '<div class="form-group col-sm-8">';
echo '<label for="formGroupExampleInput2"><b>Phone number</b></label>';
echo '<input type="text" name="Phone" class="form-control" id="Phone" value="'.$old_setting_phone.'" />';
echo '</div>';
	
	
}

if  (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))
{

echo '<div class="form-group col-sm-5 offset-1">';
echo '<div align="left"><b>AD PLACEMENT ON WEB/NEWSLETTER</b></div>';

/* fetching object starts */
echo '<div class="form-check">';

 $location_leaderboard = mysqli_real_escape_string ($command ,$_POST['Leaderboard']);

$command = "SELECT * FROM Banner_orders_submitted WHERE id = $o_id";


$result = $db_database->query($command);
 
while ($data = $result->fetch_object())

 {

if  (($data->loc_leaderboard == 0 )  && isset($_POST['Leaderboard'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_leaderboard='Leaderboard'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Leaderboard" value="Leaderboard"checked disabled/>';
		echo "<meta http-equiv='refresh' content='0'>";
				
	    }

else if   (!isset($_POST['Leaderboard'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_leaderboard=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	echo "<meta http-equiv='refresh' content='0'>";
	 
	/*
echo '<input class="form-check-input" type="checkbox"checked="checked" disabled />';
echo "<br>Leaderboard location removed";
*/

}
if  (($data->loc_leaderboard == "Leaderboard" ))
{ 
echo '<input class="form-check-input" type="checkbox" name="Leaderboard" id="Leaderboard" value="Leaderboard"checked disabled/>'; 

	}
  else   {
    echo '<input class="form-check-input" type="checkbox"  name="Leaderboard" id="Leaderboard" value="Leaderboard"  disabled/>';
		
		}
	
echo '<label class="form-check-label" for="inlineCheckbox2">Leaderboard</label>';
echo '</div>';
echo '<div class="form-check">';   /* fetching object starts */ 

if  (($data->loc_sidebar == 0 )  && isset($_POST['Sidebar'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_sidebar='Sidebar'

					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Sidebar"  value="Sidebar"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Sidebar'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_sidebar=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	 	echo "<meta http-equiv='refresh' content='0'>";

}
if ($data->loc_sidebar == "Sidebar")
{

echo '<input class="form-check-input" type="checkbox" name="Sidebar" id="Sidebar" value="Sidebar"checked  disabled/>';

}


else  {
		
	echo '<input class="form-check-input" type="checkbox"  name="Sidebar" id="Sidebar"  value="Sidebar" disabled/>';
		
}
	
echo  '<label class="form-check-label" for="inlineCheckbox1">Sidebar</label>';
echo  '</div>';
echo  '<div class="form-check">';   /* fetching object starts */


if  (($data->location_floating == 0 )  && isset($_POST['Floater'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET location_floating='Floater'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
            $success = $db_database->query($command);
	        echo '<input class="form-check-input" type="checkbox" name="Floater"  value="Floater"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Floater'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET location_floating=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
		echo "<meta http-equiv='refresh' content='0'>";
	
}

if ($data->location_floating == "Floater")  {

echo  '<input class="form-check-input" type="checkbox" name="Floater" id="Floating" value="Floater"checked disabled/>';

}
else  {
		
	echo '<input class="form-check-input" type="checkbox"  name="Floater" id="Floater"  value="Floater" disabled/>';
		
}

echo  '<label class="form-check-label" for="inlineCheckbox1">Floater (only on web sites)</label>';
echo  '</div>';
echo  '<div class="form-check">';     /* fetching object starts */

if  (($data->loc_footer == 0 )  && isset($_POST['Footer'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_footer='Footer'
				     WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Footer"  value="Footer"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
		
	    }

else if   (!isset($_POST['Floating'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_footer=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
		echo "<meta http-equiv='refresh' content='0'>";

}


if ($data->loc_footer == "Footer")  {

echo '<input class="form-check-input" type="checkbox" name="Footer" id="Footer" value="" checked disabled/>';

}

else   {
	
echo '<input class="form-check-input" type="checkbox"  name="Footer" id="Footer" value="" disabled/>';
	
}
echo '<label class="form-check-label" for="inlineCheckbox3">Footer</label>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="form-group col-sm-4 offset-1">';
echo '<div align="left"><b>WEB SITES</b></div>';
echo '<div class="form-check">';
	
if  (($data->website_diverse == 0 )  && isset($_POST['Diverse_Education'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_diverse='Diverse_Education'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Education" id="Diverse_Education" value="Diverse_Education"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }


else if   (!isset($_POST['Diverse_Education'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_diverse=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_diverse == "Diverse_Education")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Education" id="Diverse_Education" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Education" id="Diverse_Education" value="" disabled/>';
	
}

echo '<label class="form-check-label" for="inlineCheckbox1">Diverse Education</label>';
echo '</div>';
echo '<div class="form-check">';    

if  (($data->website_jobs == 0 )  && isset($_POST['Diverse_Jobs'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_jobs='Diverse_Jobs'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Jobs" id="Diverse_Jobs" value="Diverse_Jobs"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Jobs'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_jobs=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_jobs == "Diverse_Jobs")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Jobs" id="Diverse_Jobs" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Jobs" id="Diverse_Jobs" value="" disabled/>';
	
}



echo '<label class="form-check-label" for="inlineCheckbox2">Diverse Jobs</label>';
echo '</div>';
echo '<div class="form-check">';  
if  (($data->website_cc == 0 )  && isset($_POST['CCNews'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_cc='CCNews'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="CCNews" id="Diverse_Jobs" value="CCNews"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['CCNews'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET CCNews=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_cc == "CCNews")
{
echo '<input class="form-check-input" type="checkbox" name="CCNews" id="CCNews" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="CCNews" id="CCNews" value="" disabled/>';
	
}
 
?>

<?php
echo '<label class="form-check-label" for="inlineCheckbox3">CCNEWS</label>';
echo '</div>';
echo '<div class="form-check">';

if  (($data->website_health == 0 )  && isset($_POST['Diverse_Health'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_health='Diverse_Health'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Health" id="Diverse_Health" value="Diverse_Health"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Health'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_health=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_health == "Diverse_Health")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Health" id="Diverse_Health" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Health" id="Diverse_Health" value="" disabled/>';
	
}
?>
<?php
echo '<label class="form-check-label" for="inlineCheckbox3">Diverse Health</label>';
echo '</div>';

echo '<div class="form-check">';

if  (($data->website_military == 0 )  && isset($_POST['Diverse_Military'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_military='Diverse_Military'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Military" id="Diverse_Military" value="Diverse_Military"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Military'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_military=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_military == "Diverse_Military")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Military" id="Diverse_Military" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Military" id="Diverse_Military" value="" disabled/>';
	
}
 
?>
<?php
echo '<label class="form-check-label" for="inlineCheckbox3">Diverse Military</label>';
echo '</div>';
echo '<div class="form-check">';
echo '</div>';
echo '</div>';
echo '<div class="form-group col-sm-4 offset-1">';
echo '<div align="left"><b>NEWSLETTERS</b></div>';
echo '<div class="form-check">';

if  (($data->news_daily == 0 )  && isset($_POST['Daily_Newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_daily='Daily_Newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Daily_Newsletter" id="Daily_Newsletter" value="Daily_Newsletter"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Daily_Newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_daily=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_daily == "Daily_Newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Daily_Newsletter" id="Daily_Newsletter" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Daily_Newsletter" id="Daily_Newsletter" value="" disabled/>';
	
}
 

?>

<?php   
echo '<label class="form-check-label" for="inlineCheckbox1">Diverse Daily</label>';
echo '</div>';
echo '<div class="form-check">';



if  (($data->news_military == 0 )  && isset($_POST['Military_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_military='Military_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Military_newsletter" id="Military_newsletter" value="Military_newsletter"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Military_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_military=0
		 WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_military == "Military_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Military_newsletter" id="Military_newsletter" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Military_newsletter" id="Military_newsletter" value="" disabled/>';
	
}
 
?>
<?php   
echo '<label class="form-check-label" for="inlineCheckbox2">Military</label>';
echo '</div>';
echo '<div class="form-check">';   


if  (($data->news_cc == 0 )  && isset($_POST['CC_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_cc='CC_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="CC_newsletter" id="CC_newsletter" value="CC_newsletter"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['CC_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_cc=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_cc== "CC_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="CC_newsletter" id="CC_newsletter" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="CC_newsletter" id="CC_newsletter" value="" disabled/>';
	
}
?>

<?php

echo '<label class="form-check-label" for="inlineCheckbox3">CC</label>';
echo '</div>';
echo '<div class="form-check">';  

if  (($data->news_health == 0 )  && isset($_POST['Health_Newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_health='Health_Newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Health_Newsletter" id="Health_Newsletter" value="Health_Newsletter"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Health_Newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_health=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_health== "Health_Newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Health_Newsletter" id="Health_Newsletter" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Health_Newsletter" id="Health_Newsletter" value="" disabled/>';
	
}
?>
<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Health</label>';
echo '</div>';
echo '<div class="form-check">';


if  (($data->news_hiring == 0 )  && isset($_POST['Hiring_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_hiring='Hiring_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Hiring_newsletter" id="Hiring_newsletter" value="Hiring_newsletter"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Hiring_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_hiring=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_hiring== "Hiring_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Hiring_newsletter" id="Hiring_newsletter" value="" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Hiring_newsletter" id="Hiring_newsletter" value="" disabled/>';
	
}

?>

<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Hiring</label>';
echo '</div>'; 
echo '<div class="form-check">';  

if  (($data->news_recap == 0 )  && isset($_POST['News_Recap'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_recap='News_Recap'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="News_Recap" id="News_Recap" value="News_Recap"checked disabled/>';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['News_Recap'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_recap=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_recap== "News_Recap")
{
echo '<input class="form-check-input" type="checkbox" name="News_Recap" id="News_Recap" value="News_Recap" checked disabled/>';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="News_Recap" id="News_Recap" value="" disabled/>';
	
}
}

?>
<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Recap</label>';
echo '</div>';
echo '</div>';
echo '</div>';


// END OF CHECK BOXES  //


}

// START CHECK BOXES AVAILABLE FOR EDITING  //

else  {

echo '<div class="form-group col-sm-5 offset-1">';
echo '<div align="left"><b>AD PLACEMENT ON WEB/NEWSLETTER</b></div>';

/* fetching object starts */
echo '<div class="form-check">';

 $location_leaderboard = mysqli_real_escape_string ($command ,$_POST['Leaderboard']);

$command = "SELECT * FROM Banner_orders_submitted WHERE id = $o_id";


$result = $db_database->query($command);
 
while ($data = $result->fetch_object())

 {

if  (($data->loc_leaderboard == 0 )  && isset($_POST['Leaderboard'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_leaderboard='Leaderboard'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Leaderboard"  value="Leaderboard"checked />';
		
			echo "<meta http-equiv='refresh' content='0'>";
				
	    }

else if   (!isset($_POST['Leaderboard'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_leaderboard=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	echo "<meta http-equiv='refresh' content='0'>";
	 
	/*
echo '<input class="form-check-input" type="checkbox"checked="checked" disabled />';
echo "<br>Leaderboard location removed";
*/

}
if  (($data->loc_leaderboard == "Leaderboard" ))
{ 
echo '<input class="form-check-input" type="checkbox" name="Leaderboard" id="Leaderboard" value="Leaderboard"checked />'; 

	}
  else   {
    echo '<input class="form-check-input" type="checkbox"  name="Leaderboard" id="Leaderboard" value="Leaderboard"  />';
		
		}
	
echo '<label class="form-check-label" for="inlineCheckbox2">Leaderboard</label>';
echo '</div>';
echo '<div class="form-check">';   /* fetching object starts */ 

if  (($data->loc_sidebar == 0 )  && isset($_POST['Sidebar'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_sidebar='Sidebar'

					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Sidebar"  value="Sidebar"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Sidebar'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_sidebar=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
	 	echo "<meta http-equiv='refresh' content='0'>";

}
if ($data->loc_sidebar == "Sidebar")
{

echo '<input class="form-check-input" type="checkbox" name="Sidebar" id="Sidebar" value="Sidebar"checked  />';

}

else  {
	echo '<input class="form-check-input" type="checkbox"  name="Sidebar" id="Sidebar"  value="Sidebar" />';
		
}
	
echo  '<label class="form-check-label" for="inlineCheckbox1">Sidebar</label>';
echo  '</div>';
echo  '<div class="form-check">';   /* fetching object starts */


if  (($data->location_floating == 0 )  && isset($_POST['Floater'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET location_floating='Floater'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
            $success = $db_database->query($command);
	        echo '<input class="form-check-input" type="checkbox" name="Floater"  value="Floater"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Floater'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET location_floating=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
		echo "<meta http-equiv='refresh' content='0'>";
	
}

if ($data->location_floating == "Floater")  {

echo  '<input class="form-check-input" type="checkbox" name="Floater" id="Floating" value="Floater"checked />';

}
else  {
		
	echo '<input class="form-check-input" type="checkbox"  name="Floater" id="Floater"  value="Floater" />';
		
}

echo  '<label class="form-check-label" for="inlineCheckbox1">Floater (only on web sites)</label>';
echo  '</div>';
echo  '<div class="form-check">';     /* fetching object starts */

if  (($data->loc_footer == 0 )  && isset($_POST['Footer'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET loc_footer='Footer'
				     WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Footer"  value="Footer"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
		
	    }

else if   (!isset($_POST['Floating'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET loc_footer=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
		echo "<meta http-equiv='refresh' content='0'>";

}


if ($data->loc_footer == "Footer")  {

echo '<input class="form-check-input" type="checkbox" name="Footer" id="Footer" value="" checked />';

}

else   {
	
echo '<input class="form-check-input" type="checkbox"  name="Footer" id="Footer" value="" />';
	
}
echo '<label class="form-check-label" for="inlineCheckbox3">Footer</label>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="form-group col-sm-4 offset-1">';
echo '<div align="left"><b>WEB SITES</b></div>';
echo '<div class="form-check">';
	
if  (($data->website_diverse == 0 )  && isset($_POST['Diverse_Education'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_diverse='Diverse_Education'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Education" id="Diverse_Education" value="Diverse_Education"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }


else if   (!isset($_POST['Diverse_Education'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_diverse=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_diverse == "Diverse_Education")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Education" id="Diverse_Education" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Education" id="Diverse_Education" value="" />';
	
}

echo '<label class="form-check-label" for="inlineCheckbox1">Diverse Education</label>';
echo '</div>';
echo '<div class="form-check">';    

if  (($data->website_jobs == 0 )  && isset($_POST['Diverse_Jobs'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_jobs='Diverse_Jobs'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Jobs" id="Diverse_Jobs" value="Diverse_Jobs"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Jobs'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_jobs=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_jobs == "Diverse_Jobs")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Jobs" id="Diverse_Jobs" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Jobs" id="Diverse_Jobs" value="" />';
	
}



echo '<label class="form-check-label" for="inlineCheckbox2">Diverse Jobs</label>';
echo '</div>';
echo '<div class="form-check">';  
if  (($data->website_cc == 0 )  && isset($_POST['CCNews'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_cc='CCNews'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="CCNews" id="Diverse_Jobs" value="CCNews"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['CCNews'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET CCNews=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_cc == "CCNews")
{
echo '<input class="form-check-input" type="checkbox" name="CCNews" id="CCNews" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="CCNews" id="CCNews" value="" />';
	
}
 
?>

<?php
echo '<label class="form-check-label" for="inlineCheckbox3">CCNEWS</label>';
echo '</div>';
echo '<div class="form-check">';

if  (($data->website_health == 0 )  && isset($_POST['Diverse_Health'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_health='Diverse_Health'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Health" id="Diverse_Health" value="Diverse_Health"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Health'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_health=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_health == "Diverse_Health")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Health" id="Diverse_Health" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Health" id="Diverse_Health" value="" />';
	
}
?>
<?php
echo '<label class="form-check-label" for="inlineCheckbox3">Diverse Health</label>';
echo '</div>';

echo '<div class="form-check">';

if  (($data->website_military == 0 )  && isset($_POST['Diverse_Military'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET website_military='Diverse_Military'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Diverse_Military" id="Diverse_Military" value="Diverse_Military"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Diverse_Military'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET website_military=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->website_military == "Diverse_Military")
{
echo '<input class="form-check-input" type="checkbox" name="Diverse_Military" id="Diverse_Military" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Diverse_Military" id="Diverse_Military" value="" />';
	
}
 
?>
<?php
echo '<label class="form-check-label" for="inlineCheckbox3">Diverse Military</label>';
echo '</div>';
echo '<div class="form-check">';
echo '</div>';
echo '</div>';
echo '<div class="form-group col-sm-4 offset-1">';
echo '<div align="left"><b>NEWSLETTERS</b></div>';
echo '<div class="form-check">';

if  (($data->news_daily == 0 )  && isset($_POST['Daily_Newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_daily='Daily_Newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Daily_Newsletter" id="Daily_Newsletter" value="Daily_Newsletter"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Daily_Newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_daily=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_daily == "Daily_Newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Daily_Newsletter" id="Daily_Newsletter" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Daily_Newsletter" id="Daily_Newsletter" value="" />';
	
}
 

?>

<?php   
echo '<label class="form-check-label" for="inlineCheckbox1">Diverse Daily</label>';
echo '</div>';
echo '<div class="form-check">';



if  (($data->news_military == 0 )  && isset($_POST['Military_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_military='Military_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Military_newsletter" id="Military_newsletter" value="Military_newsletter"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Military_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_military=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_military == "Military_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Military_newsletter" id="Military_newsletter" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Military_newsletter" id="Military_newsletter" value="" />';
	
}
 
?>
<?php   
echo '<label class="form-check-label" for="inlineCheckbox2">Military</label>';
echo '</div>';
echo '<div class="form-check">';   


if  (($data->news_cc == 0 )  && isset($_POST['CC_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_cc='CC_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="CC_newsletter" id="CC_newsletter" value="CC_newsletter"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['CC_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_cc=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_cc== "CC_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="CC_newsletter" id="CC_newsletter" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="CC_newsletter" id="CC_newsletter" value="" />';
	
}
?>

<?php

echo '<label class="form-check-label" for="inlineCheckbox3">CC</label>';

echo '</div>';
echo '<div class="form-check">';  

if  (($data->news_health == 0 )  && isset($_POST['Health_Newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_health='Health_Newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Health_Newsletter" id="Health_Newsletter" value="Health_Newsletter"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Health_Newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_health=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_health== "Health_Newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Health_Newsletter" id="Health_Newsletter" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Health_Newsletter" id="Health_Newsletter" value="" />';
	
}
?>
<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Health</label>';
echo '</div>';
echo '<div class="form-check">';


if  (($data->news_hiring == 0 )  && isset($_POST['Hiring_newsletter'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_hiring='Hiring_newsletter'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="Hiring_newsletter" id="Hiring_newsletter" value="Hiring_newsletter"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['Hiring_newsletter'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_hiring=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_hiring== "Hiring_newsletter")
{
echo '<input class="form-check-input" type="checkbox" name="Hiring_newsletter" id="Hiring_newsletter" value="" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="Hiring_newsletter" id="Hiring_newsletter" value="" />';
	
}

?>

<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Hiring</label>';
echo '</div>'; 
echo '<div class="form-check">';  

if  (($data->news_recap == 0 )  && isset($_POST['News_Recap'] ))
 
	 {   
		 $command = "UPDATE Banner_orders_submitted SET news_recap='News_Recap'
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
				
		echo '<input class="form-check-input" type="checkbox" name="News_Recap" id="News_Recap" value="News_Recap"checked />';
			echo "<meta http-equiv='refresh' content='0'>";
	    }

else if   (!isset($_POST['News_Recap'])  &&  isset($_POST['submit']))
 

{ 
  $command = "UPDATE Banner_orders_submitted SET news_recap=0
					  WHERE id=".$db_database->real_escape_string($o_id).";";
     $success = $db_database->query($command);
     echo "<meta http-equiv='refresh' content='0'>";

}

if ($data->news_recap== "News_Recap")
{
echo '<input class="form-check-input" type="checkbox" name="News_Recap" id="News_Recap" value="News_Recap" checked />';

}

else   {
	
	echo '<input class="form-check-input" type="checkbox"  name="News_Recap" id="News_Recap" value="" />';
	
}
}

?>
<?php

echo '<label class="form-check-label" for="inlineCheckbox3">Recap</label>';
echo '</div>';
echo '</div>';
echo '</div>';

}
// END OF CHECK BOXES ON EDITING MODE  //



echo '<div class="form-group col-sm-4">';
echo '<b>Start run date</b>';
echo '<div class="input-group">';
echo '<div class="input-group-addon">';
echo '<i class="fa fa-calendar"></i>';


echo '</div>';



if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {


echo '<input type="text" class="form-control" data-provide="datepicker" name="Start_date" value="'.$old_setting_dur_start_date.'"disabled/>';
echo '</div>';  
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<b>End run date</b>'; 
echo '<div class="input-group">';
echo '<div class="input-group-addon">';
echo '<i class="fa fa-calendar"></i>';

echo '</div>';
}

else  {
	
	
echo '<input type="text" class="form-control" data-provide="datepicker" name="Start_date" value="'.$old_setting_dur_start_date.'"/>';
echo '</div>';  
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<b>End run date</b>'; 
echo '<div class="input-group">';
echo '<div class="input-group-addon">';
echo '<i class="fa fa-calendar"></i>';

echo '</div>';
	
	
}



if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {


echo '<input type="text" class="form-control" data-provide="datepicker" name="End_date" value="'.$old_setting_dur_end_date.'"disabled />';
echo '</div>'; 
echo '</div>';

}

else   {
	
echo '<input type="text" class="form-control" data-provide="datepicker" name="End_date" value="'.$old_setting_dur_end_date.'" />';
echo '</div>'; 
echo '</div>';


}

if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {

echo '<div class="form-group col-sm-6">';
echo '<label for="formGroupExampleInput2"><b>Number of Impressions</b></label><br>';
echo $old_setting_impressions;
echo '</div>';

}

else  {
	
	
	echo '<div class="form-group col-sm-6">';
echo '<label for="formGroupExampleInput2"><b>Number of Impressions</b></label>'; echo "<br><span style='color:blue;'>&nbsp;(Enter 0 (zero) or leave blank when number of impressions does not apply)</span>";
echo '<input type="text" name="Number_of_impressions" class="form-control" id="Number_of_impressions" max-length="10" value="'.$old_setting_impressions.'" />';
echo '</div>';
	
	
}



if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {

echo '<div class="form-group col-sm-6">';
echo '<label for="formGroupExampleInput2"><b>Banner URL</b></label><br>';

if  ($old_setting_banner_url == "")  {
	
	echo "Not entered";
}

echo $old_setting_banner_url;
echo '</div>';
echo '</div>';

}
else  {
	echo '<div class="form-group col-sm-6">';
echo '<label for="formGroupExampleInput2"><b>Banner URL</b></label>';
echo '<input type="text" name="Banner_Url" class="form-control" id="Banner_Url" value="'.$old_setting_banner_url.'"/>';
echo '</div>';
echo '</div>';
	
}

echo '<b>ART WORK</b>';
?>

<?php

$result = $db_database->query($command);
 
while ($data = $result->fetch_object())

 {
if  (
     ($data->image1_url == NULL ) && 
     ($data->image2_url == NULL ) && 
     ($data->image3_url == NULL ) &&
	 ($data->image4_url == NULL ) && 
	 ($data->image5_url == NULL ) 
	 )
 {
	 echo  "<br><p style='color:red;'>Art-work has not been attached to this order</p><br><br>";
	 
 }
 
 else
	 
{
?>

<?php

echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
//echo '<span>Choose file</span>';
//echo '<input type="file" name="image1" value="'.$old_setting_attachment1.'" />'; 


$image1 = $submit_attachment1; 

$image1 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image1))
{       
 
 $target1 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image1_url'];    

 echo "<img src='$target1' />";
 
}  
//echo '<input type="submit" name="submit1" value="Remove" />'; 

echo '<br/>';

echo '<div class="file-path-wrapper">';

//echo '<input class="file-path validate" type="text" placeholder="Upload your file">';
echo '</div>';
echo '</div>';

echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
//echo '<input type="file" name="image2" value="'.$old_setting_attachment2.'" />'; 

$image2 = $submit_attachment2; 

$image2 = mysqli_query($db_database, $command);


while($rows = mysqli_fetch_assoc($image2))
{       

 
 $target1 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image2_url'];    

 echo "<img src='$target1' />";
 
}  

header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");
  
//echo '<input type="submit" name="submit2" value="Remove" />'; 

echo '</div>';

/* start upload image */


echo '<div class="file-path-wrapper">';

//echo '<input class="file-path validate" type="text" placeholder="Upload your file">';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
//echo '<span>Choose file</span>';


//echo '<input type="file" name="image3" value="'.$old_setting_attachment3.'" />';

$image3 = $submit_attachment3; 

$image3 = mysqli_query($db_database, $command);


while($rows = mysqli_fetch_assoc($image3))
{       
 
 
 $target3 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image3_url'];    
    

 echo "<img src='$target3' />";
  
}
header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");
  
//echo '<input type="submit" name="submit2" value="Remove" />'; 

echo '</div>';

echo '</div>';

echo '</div>';
echo '<div class="file-field">';

echo '<div class="btn btn-primary btn-sm">';

//echo '<span>Choose file</span>';  

//echo '<input type="file" name="image4" value="'.$old_setting_attachment4.'" />';


$image4 = $submit_attachment4; 

$image4 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image4))
{       
    $target4 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image4_url'];    
    

 echo "<img src='$target4' />";
}


//echo '<input type="submit" name="submit2" value="Remove" />'; 

echo '</div>';

echo '<div class="file-path-wrapper">';
//echo '<input class="file-path validate" type="text" placeholder="Upload your file">';
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
//echo '<span>Choose file</span>';
?>

<?php  //<input type="file" name="image5" value="'.$old_setting_attachment5.'" />
?>

<?php
header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");


//echo '<input type="file" name="image5" value="'.$old_setting_attachment5.'" />';

$image5 = $submit_attachment5; 

$image5 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image5))
{       
 $target5 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image5_url'];    
    

 echo "<img src='$target5' />";
  
}


?>
<?php
header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");

?>



<?php          
echo '</div>';
echo '<div class="file-path-wrapper">';
?>
<!--<input class="file-path validate" type="text" placeholder="Upload your file"> -->
<?php
echo '</div>';
echo '</div>';
echo '</div>';


}


 }

echo '<div class="form-group">';

?>
<?php



if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   {




echo '<br><label for="exampleFormControlTextarea1"><b>NOTES</b></label><br>'; 

if ($old_setting_notes == "")   {
	
	echo  "Not entered";
	
}

echo $old_setting_notes; 

?>

<? echo $_SESSION['$submit_notes'] ?>
<?php
echo '</div>';
}

else   {
	
	echo '<br><label for="exampleFormControlTextarea1"><b>NOTES</b></label><br>';
	echo '<textarea name="order_notes" class="form-control" id="order_notes" name="order_notes" value="'.$old_setting_notes.'" rows="5">
'.$old_setting_notes.' </textarea>';
?>

<? echo $_SESSION['$submit_notes'] ?>
<?php
echo '</div>';
	
}



?>




<?php

if
( ($_SESSION['username']) != $user  &&  $_SESSION['level'] == 'sales' ) 

{

}

else  {

echo "<button type='submit' name='submit' class='btn btn-warning btn-lg' style='margin:0 auto; width: 40%; display:block;' value='SAVE CHANGES'>";
echo "&nbsp;SAVE CHANGES&nbsp;</button>";
	
}

?>
</form> 
<br>
<br>
<br>

</div>
<?php
/*


echo '<form action="" name="photoupload1" method="POST" enctype="multipart/form-data">'; 
echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';

echo '<span>Choose file</span>';

echo '<input type="file" name="image1" value="'.$old_setting_attachment1.'" />'; 

$image1 = $submit_attachment1; 

$image1 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image1))
{       
    $target1 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image1_url'];    
  
   echo "<img src='$target1' />";
}

echo '<input type="submit" name="submit1" value="Remove" />'; 
echo '<input type="submit" name="submit1" value="SAVE CHANGES" />'; 
echo '</div>';
echo '</form>';
        
*/

?>
  </div>
  </div>
</div>


</div>

    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-5 offset-1 col-sm-2">
               
             <!--       <ul class="list-unstyled">
                        <li><a href="https://www.diversebooks.net/">Higher Education Books</a></li>
                        <li><a href="http://diversejobs.net/">Higher Education Jobs</a></li>
                        <li><a href="http://jobs.diversejobs.net/employer/emplogin.html">Post a Job</a></li>
                        <li><a href="http://diversepodium.com/media-kit/">Advertise</a></li>
                          <li><a href="http://diversepodium.com/about-us/contact-us/">Contact Us</a></li>
                         
                        
                        
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
		           
		           <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:FrankJ@diversepodium.com">FrankJ@diversepodium.com</a> -->
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

<style>


    html, body {
      margin: 0;
      padding: 0;
    }


</style>


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>



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
     

 
 