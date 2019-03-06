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

$user = $_SESSION['username'];

$client = $_POST['Client_Name'];
  
$_SESSION['error'] = " "; 

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
<?php echo '<h4 style="color:#a09f9f"><br><br>
E-mail Automation</h4>';  ?>  
<!--
<div style="float:right; position:absolute; right: 99px; margin-top:-18px;">
<a class="nav-link"  href="javascript:if(window.print)window.print()" style="width:50px;"><span class="fa fa-print fa-2x" title="print"></span></a>
</div>
<div style="float:right; position:relative; right: 125px; margin-top: -10px;">
</div>
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
      </div>-->
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
 <!--  <div class="col-sm-4 col-md-3" style="top: 10px;">

<h3>ACTIVITY</h3>
</div> -->
    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">
<?php


$good_email = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i";

$submit_email1 = $_POST['email1'];

$submit_email2 = $_POST['email2'];

$submit_email3 = $_POST['email3'];

$submit_email4 = $_POST['email4'];

$submit_email5 = $_POST['email5'];

$submit_promo_e1 = $_POST['email_promo1'];

$submit_promo_e2 = $_POST['email_promo2'];

$submit_promo_e3 = $_POST['email_promo3'];

$submit_promo_e4 = $_POST['email_promo4'];

$submit_promo_e5 = $_POST['email_promo5'];


$command = "SELECT * FROM notif_emails WHERE id=1";

$result = $db_database->query($command);
while ($data = $result->fetch_object())  {
	
	     $old_setting_email1 = $data->email1;
	     $old_setting_email2 = $data->email2;
	     $old_setting_email3 = $data->email3;
	     $old_setting_email4 = $data->email4;
   $old_setting_promo_email1 = $data->email5;
   $old_setting_promo_email2 = $data->email6;
   $old_setting_promo_email3 = $data->email7;
   $old_setting_promo_email4 = $data->email8;	
   $old_setting_promo_email5 = $data->email9;

  
if (($_SESSION['username'] != $user ) &&  ($_SESSION['level'] != "admin"))   

{

}


else  if   (($_POST["submit"] == "SAVE CHANGES") && ( ($_SESSION['username']) == $user  || $_SESSION['level'] == 'admin')  ) 

{

$success = $db_database->query($command);

$command = "SELECT * FROM notif_emails WHERE id=1";

$success = true;

if($submit_email1!= $old_setting_email1)

   {
     $command = "UPDATE notif_emails SET email1='".$db_database->real_escape_string($submit_email1)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }      
     
if($submit_email2!= $old_setting_email2)
   {
     $command = "UPDATE notif_emails SET email2='".$db_database->real_escape_string($submit_email2)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }      
     

  if($submit_email3!= $old_setting_email3)
   {
     $command = "UPDATE notif_emails SET email3='".$db_database->real_escape_string($submit_email3)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }      
   
   if($submit_email4!= $old_setting_email4)
   {
	 $command = "UPDATE notif_emails SET email4='".$db_database->real_escape_string($submit_email4)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
   
    if($submit_promo_e1!= $old_setting_promo_email1)
   {
	   
     $command = "UPDATE notif_emails SET email5='".$db_database->real_escape_string($submit_promo_e1)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
      if($submit_promo_e2!= $old_setting_promo_email2)
   {
	   
     $command = "UPDATE notif_emails SET email6='".$db_database->real_escape_string($submit_promo_e2)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
     
	 if($submit_promo_e3!= $old_setting_promo_email3)
	  
   {
	   
     $command = "UPDATE notif_emails SET email7='".$db_database->real_escape_string($submit_promo_e3)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
     if($submit_promo_e4!= $old_setting_promo_email4)
	  
   {
	   
     $command = "UPDATE notif_emails SET email8='".$db_database->real_escape_string($submit_promo_e4)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
     if($submit_promo_e5!= $old_setting_promo_email5)
	  
   {
	   
     $command = "UPDATE notif_emails SET email9='".$db_database->real_escape_string($submit_promo_e5)
          ."' WHERE id>".$db_database->real_escape_string(0).";";
     $success = $db_database->query($command);
	
   }   
   
  
else if (preg_match ($good_email, $submit_email1)) 

  { 
  
   }
   
else if(empty($_POST['email1'])) 

{
}
else   {
	     $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	
 }
 
 
 if (preg_match ( $good_email, $submit_email2)) 

  {  }
   
  else if(empty($_POST['email2'])) 

{
}
else   {
	    $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }
   
if (preg_match ( $good_email, $submit_email3)) 

  { 
  
   }
   
  else if(empty($_POST['email3'])) 

{
}
else   {
	      $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }

if (preg_match ($good_email, $submit_email4)) 

  { 
  
   }
   
  else if(empty($_POST['email4'])) 

{
}
else   {
	     $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }
if (preg_match( $good_email, $submit_promo_e1))

{   }

else if (empty($_POST['email_promo1']))

{}
else   {
	    $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	  
   }


if (preg_match( $good_email, $submit_promo_e2))

{   }

else if (empty($_POST['email_promo2']))

{}
else   {
	     $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }

if (preg_match( $good_email, $submit_promo_e3))

{   }

else if (empty($_POST['email_promo3']))

{}
else   {
	    $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	  
   }

if (preg_match( $good_email, $submit_promo_e4))

{   }

else if (empty($_POST['email_promo4']))

{}
else   {
	     $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }
   if (preg_match( $good_email, $submit_promo_e5))

{   }

else if (empty($_POST['email_promo5']))

{}
else   {
	   $success == false;
	   $error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
	   
   }



if ($error_message)  {
	
	$_SESSION['error'] = $error_message; 

     

header('Location: http://www.diversepodium.com/Online-Ad-Manager/order-details.php');

}
 
 //   {
  
if(($success == true)  && ($error_message == false ))
  {
	  
    echo "<p style='color:red; font-weight:bold;'>CHANGES SAVED!</p>";
 
    $old_setting_email1 = $submit_email1;
    $old_setting_email2 = $submit_email2;
	$old_setting_email3 = $submit_email3;
	$old_setting_email4 = $submit_email4;
	$old_setting_promo_email1 = $submit_promo_e1;
	$old_setting_promo_email2 = $submit_promo_e2;
	$old_setting_promo_email3 = $submit_promo_e3;
	$old_setting_promo_email4 = $submit_promo_e4;
	$old_setting_promo_email5 = $submit_promo_e5;
	
   
  }

 else
     {
	 $submit_email1 != $old_setting_email1;
     $submit_email2 != $old_setting_email2;
	 $submit_email3 != $old_setting_email3;
	 $submit_email4 != $old_setting_email4;
	 $submit_promo_e1 != $old_setting_promo_email1;
	 $submit_promo_e2 != $old_setting_promo_email2;
	 $submit_promo_e3 != $old_setting_promo_email3;
	 $submit_promo_e4 != $old_setting_promo_email4;
	 $submit_promo_e5 != $old_setting_promo_email5;

}
}
}

?>

<?php


echo '<form action="email-notification-settings.php" method="POST" enctype="multipart/form-data">';
echo "<br>";

echo "<button type='submit' name='submit' class='btn btn-warning btn-sm' style='float:right; width: 20%; display:block;' value='SAVE CHANGES'>";
echo "&nbsp;SAVE CHANGES&nbsp;</button>";
echo $_SESSION['error'];   // Display error on screen 

echo '<h5>Ad Orders:</h5>';	
echo '<p>E-mails are sent to these addresses when an Ad Order is submitted, edited, deleted or its status changes.</p>';
echo '<div class="form-group col-sm-4">';
echo '<br>';
echo '<label for="formGroupExampleInput"><b>E-mail 1:</b></label>';
echo '<input type="text" name="email1" class="form-control" id="email1" value="'.$old_setting_email1.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput"><b>E-mail 2:</b></label>';
echo '<input type="text" name="email2" class="form-control" id="email12" value="'.$old_setting_email2.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput2"><b>E-mail 3:</b></label>';
echo '<input type="text" name="email3" class="form-control" id="email3" value="'.$old_setting_email3.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput2"><b>E-mail 4:</b></label>';
echo '<input type="text" name="email4" class="form-control" id="email4" value="'.$old_setting_email4.'"/>';
echo '</div>';
echo '<br><h5>Marketing Promos:</h5>';	
echo '<p>E-mails are sent to these addresses when a new Marketing Promo is uploaded to the system.</p>';
echo '<div class="form-group col-sm-4">';
echo '<br>';
echo '<label for="formGroupExampleInput"><b>E-mail 1:</b></label>';
echo '<input type="text" name="email_promo1"  class="form-control" id="email_promo1" value="'.$old_setting_promo_email1.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput"><b>E-mail 2:</b></label>';
echo '<input type="text" name="email_promo2" class="form-control" id="email_promo2" value="'.$old_setting_promo_email2.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput2"><b>E-mail 3:</b></label>';
echo '<input type="text" name="email_promo3" class="form-control" id="email_promo3" value="'.$old_setting_promo_email3.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput2"><b>E-mail 4:</b></label>';
echo '<input type="text" name="email_promo4" class="form-control" id="email_promo4" value="'.$old_setting_promo_email4.'"/>';
echo '</div>';
echo '<div class="form-group col-sm-4">';
echo '<label for="formGroupExampleInput2"><b>E-mail 5:</b></label>';
echo '<input type="text" name="email_promo5" class="form-control" id="email_promo5" value="'.$old_setting_promo_email5.'"/>';
echo '</div>';
/*
echo "<button type='submit' name='submit' class='btn btn-warning btn-lg' style='margin:0 auto; width: 40%; display:block;' value='SAVE CHANGES'>";
echo "&nbsp;SAVE CHANGES&nbsp;</button>";*/

?>
</form> 
<br>
<br>
<br>

</div>
  </div>
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
     

 
 