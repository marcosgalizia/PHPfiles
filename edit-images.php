<?php
session_start();
@ini_set('display_errors', 0);

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
 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add/Remove Art work - Online Ad Manager</title>
    
  <style>
 



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
<link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"><link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

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



</div>
    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">
 <?php
 

	
	if(($_SESSION['id']) || ($_SESSION['username'] )) 
	 
echo '<h4>Edit Art-work</h4>';



else 
	  {
		  header ("Location: index.php");
	  }
	//echo '<h1>Please, <a href="index.php">login</a></h1>';  
    ?>
    
    
<?php
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 


$db_database = new MySQLi ($db_host, $db_user, $db_pass, $db_database)

or die ("Cannot connect to mySQL.");

 
$submit_clientname = $_POST['Client_Name'];

$submit_attachment1 = $_POST['image1'];

$submit_attachment2 = $_POST['image2'];

$submit_attachment3 = $_POST['image3'];

$submit_attachment4 = $_POST['image4'];

$submit_attachment5 = $_POST['image5'];


   
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

$submit_attachment5 = $_FILES['image5']['name'];

$target5 = "uploads/".basename($image5);



   $o_id = "orderid";     

    $o_id = $_GET['orderid'];


$command = "SELECT * FROM Banner_orders_submitted WHERE id =" . $o_id; 


$placeholder = "p-holder.png";

$attachment1 = mysqli_real_escape_string ($command ,$_POST['image1']);
$attachment2 = mysqli_real_escape_string ($command ,$_POST['image2']);
$attachment3 = mysqli_real_escape_string ($command ,$_POST['image3']);
$attachment4 = mysqli_real_escape_string ($command ,$_POST['image4']);
$attachment5 = mysqli_real_escape_string ($command ,$_POST['image5']);


$result = $db_database->query($command);
while ($data = $result->fetch_object())  {
	
	
echo "<br/><div style='width: auto; border: 1px solid #ddd; padding: 10px;'><h5 style='color:#a09f9f; float:left;'><b>Art-work for </b></h5>
<b><h5>&nbsp;&nbsp;$data->client_name</h5></b></div>";

	
	$old_setting_client = $data->client_name;

	$old_setting_attachment1 = $data->image1_url;
	$old_setting_attachment2 = $data->image2_url;
   	$old_setting_attachment3 = $data->image3_url;
	$old_setting_attachment4 = $data->image4_url;
	$old_setting_attachment5 = $data->image5_url;

     

if ($_POST["submit1"] == "x")





{

$command = "UPDATE Banner_orders_submitted SET image1_url = 'NULL' WHERE id='$o_id'";  

$success = $db_database->query($command);
	
}
	

	  
if($success  == true)
  {
     echo "<p style='color:red; font-weight:bold;'>IMAGE REMOVED!</p>";
	  echo "<meta http-equiv='refresh' content='0'>";
  }


if ($_POST["submit2"] == "x")


{
	
$command = "UPDATE Banner_orders_submitted SET image2_url = 'NULL' WHERE id='$o_id'";  

$success2 = $db_database->query($command);
	
	}

if($success2 == true)
  {
     echo "<p style='color:red; font-weight:bold;'>IMAGE REMOVED!</p>";
	  echo "<meta http-equiv='refresh' content='0'>";
  }
  
  
if ($_POST["submit3"] == "x")


{
	
$command = "UPDATE Banner_orders_submitted SET image3_url = 'NULL' WHERE id='$o_id'";  

$success3 = $db_database->query($command);
	
	}

if($success3 == true)
  {
     echo "<p style='color:red; font-weight:bold;'>IMAGE REMOVED!</p>";
	  echo "<meta http-equiv='refresh' content='0'>";
  }



if ($_POST["submit4"] == "x")


{
	
$command = "UPDATE Banner_orders_submitted SET image4_url = 'NULL' WHERE id='$o_id'";  

$success4 = $db_database->query($command);
	
	}

if($success4 == true)
  {
     echo "<p style='color:red; font-weight:bold;'>IMAGE REMOVED!</p>";
	  echo "<meta http-equiv='refresh' content='0'>";
  }

if ($_POST["submit5"] == "x")

{
	
$command = "UPDATE Banner_orders_submitted SET image5_url = 'NULL' WHERE id='$o_id'";  

$success5 = $db_database->query($command);
	
}

if($success5 == true)
  {
     echo "<p style='color:red; font-weight:bold;'>IMAGE REMOVED!</p>";
	 echo "<meta http-equiv='refresh' content='0'>";
	 
  }

if(($_POST["submit"] == "SAVE CHANGES")  )
{
	
$attachment1 = mysqli_real_escape_string ($command ,$_POST['image1']);

$attachment2 = mysqli_real_escape_string ($command ,$_POST['image2']);

$attachment3 = mysqli_real_escape_string ($command ,$_POST['image3']);

$attachment4 = mysqli_real_escape_string ($command ,$_POST['image4']);

$attachment5 = mysqli_real_escape_string ($command ,$_POST['image5']);

	
$success = $db_database->query($command);



$command = "SELECT * FROM Banner_orders_submitted where id=" . $o_id;  



$success = true;

 /*  IMAGES UPLOADING  */
	
	
// $image1 = $_POST['image1'];


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

if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1))  


 {

  $command = "UPDATE Banner_orders_submitted SET image1_url='".$db_database->real_escape_string($submit_attachment1)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target1 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image1);
		   
	  echo $rows[image1_url]; 
	 echo "<meta http-equiv='refresh' content='0'>";

} 



 if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2))  


 {


  $command = "UPDATE Banner_orders_submitted SET image2_url='".$db_database->real_escape_string($submit_attachment2)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target2 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image2);
		   
	   echo $rows[image2_url]; 
	 echo "<meta http-equiv='refresh' content='0'>";

   
} 

 if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3))  


 {


 $command = "UPDATE Banner_orders_submitted SET image3_url='".$db_database->real_escape_string($submit_attachment3)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target3 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image3);
		   
	        echo $rows[image3_url]; 
 echo "<meta http-equiv='refresh' content='0'>";

} 

 if (move_uploaded_file($_FILES['image4']['tmp_name'], $target4))  


 {

	 
  $command = "UPDATE Banner_orders_submitted SET image4_url='".$db_database->real_escape_string($submit_attachment4)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target4 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image4);
	       echo $rows[image4_url]; 
		 echo "<meta http-equiv='refresh' content='0'>";

   
} 

 if (move_uploaded_file($_FILES['image5']['tmp_name'], $target5))  


 {

  $command = "UPDATE Banner_orders_submitted SET image5_url='".$db_database->real_escape_string($submit_attachment5)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
           $success = $db_database->query($command);
	       $target5 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image5);
		   
	   echo $rows[image5_url]; 
		 echo "<meta http-equiv='refresh' content='0'>";

   
} 


if($success == true)
  {
     echo "<p style='color:red; font-weight:bold;'><br/><br/>CHANGES SAVED!</p>";
   
       $old_setting_client = $submit_clientname;
	$old_setting_attachment1 = $submit_attachment1;
	$old_setting_attachment2 = $submit_attachment2;
	$old_setting_attachment3 = $submit_attachment3;
	$old_setting_attachment4 = $submit_attachment4;
	$old_setting_attachment5 = $submit_attachment5;
	
	
	/* NOTIFICATION OF ART WORK UPDATE */
	
	
	$user = $_SESSION['username'];
	
	
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
//$message .= '<p>User <b>'.$user.'</b> has updated art-work for <b>' . $data->client_name .' </b> in the Online Ads Manager web site,<br>

$message .= '<p>User <b>'.$user.'</b> has updated art-work for <b> Order # '.$data->id .'  ( '. $data->client_name .')</b> in the Online Ads Manager web site,

to log in click the link below:<br><br>
 http://diversepodium.com/Online-Ad-Manager/index.php';
$message .= "</body></html>";

$subject = 'Art work has been updated for '. $data->client_name;

mail (''.$old_setting_email1.'', $subject, $message, $headers);  
mail (''.$old_setting_email2.'', $subject, $message, $headers);  
mail (''.$old_setting_email3.'', $subject, $message, $headers);  
mail (''.$old_setting_email4.'', $subject, $message, $headers);

//mail ('mgalizia@cmapublishing.com, diverseads@diverseeducation.com', $subject, $message, $headers);   

  }
  else
  {
	  
	 $submit_clientname != $old_setting_client;
	 $submit_attachment1 !=  $old_setting_attachment1;
	 $submit_attachment2 !=  $old_setting_attachment2;
     $submit_attachment3 !=  $old_setting_attachment3;
     $submit_attachment4 !=  $old_setting_attachment4;
	 $submit_attachment5 !=  $old_setting_attachment5;
    
	
 }
	}
	
	}

?>

 
<?php

echo '<form action="" method="POST" enctype="multipart/form-data">';
echo '<br>';
echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';

echo '<span>Choose file</span>';

echo '<input type="file" name="image1" value="'.$target1.'"  />'; 


$image1 = $submit_attachment1; 

$image1 = mysqli_query($db_database, $command);

while ($rows = mysqli_fetch_assoc($image1))


{
$target1 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image1_url']; 
	 
    echo "<img src='$target1' />";



}


//header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");
  


echo '<input type="submit" name="submit1" value="x" />'; 

echo '</div>';


echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';

echo '<span>Choose file</span>';


echo '<input type="file" name="image2" value="'.$old_setting_attachment2.'" />'; 

$image2 = $submit_attachment2; 

$image2 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image2))
{       
    $target2 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image2_url'];    
    
 echo "<img src='$target2' />";
   
  
}

//header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");
  

echo '<input type="submit" name="submit2" value="x" />'; 

echo '</div>';

/* start upload image */


echo '<div class="file-path-wrapper">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
echo '<span>Choose file</span>';



echo '<input type="file" name="image3" value="'.$old_setting_attachment3.'" />';


$image3 = $submit_attachment3; 

$image3 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image3))
{       
    $target3 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image3_url'];    
    

    echo "<img src='$target3' />";
   
  
}

//header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");
echo '<input type="submit" name="submit3" value="x" />'; 

echo '</div>';
echo '<div class="file-path-wrapper">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';

echo '<span>Choose file</span>';  

echo '<input type="file" name="image4" value="'.$old_setting_attachment4.'" />';

$image4 = $submit_attachment4; 

$image4 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image4))
{       
 $target4 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image4_url'];    
    
 echo "<img src='$target4' />";
   
  
}

//header("Location: http://diversepodium.com/Online-Ad-Manager/order-details.php");


echo '<input type="submit" name="submit4" value="x" />'; 
echo '</div>';


echo '<div class="file-path-wrapper">';

echo '</div>';
echo '</div>';
echo '</div>';

echo '</div>';

echo '</div>';
echo '<div class="row" style="margin-left: 0px;">';
echo '<div class="file-field">';
echo '<div class="btn btn-primary btn-sm">';
echo '<span>Choose file</span>';
?>
<?php
echo '<input type="file" name="image5" value="'.$old_setting_attachment5.'" />'; 

$image5 = $submit_attachment5; 

$image5 = mysqli_query($db_database, $command);

while($rows = mysqli_fetch_assoc($image5))
{       
  $target5 =  "http://diversepodium.com/Online-Ad-Manager/uploads/".$rows['image5_url'];    
  
  
  
   echo "<img src='$target5' />";
   
  
}


echo '<input type="submit" name="submit5" value="x" />'; 



?>


<?php          
echo '</div>';
echo '<div class="file-path-wrapper">';
?>

<?php
echo '</div>';
echo '</div>';
echo '</div>';
?>

<?php
echo '</div><br/>';

?>
<button type="submit" name="submit" class="btn btn-warning btn-lg" style="margin:0 auto; width: 40%; display:block;" value="SAVE CHANGES">
&nbsp;SAVE CHANGES&nbsp;</button>
</form> 
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

echo '<input type="submit" name="submit1" value="x" />'; 
echo '<input type="submit" name="submit1" value="SAVE CHANGES" />'; 
echo '</div>';
echo '</form>';
        
*/

?>

  </div>
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

    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-5 offset-1 col-sm-2">
               
             <!--       <ul class="list-unstyled">
                        <li><a href="http://www.diversebooks.net/">Higher Education Books</a></li>
                        <li><a href="http://diversejobs.net/">Higher Education Jobs</a></li>
                        <li><a href="http://jobs.diversejobs.net/employer/emplogin.html">Post a Job</a></li>
                        <li><a href="http://diverseeducation.com/media-kit/">Advertise</a></li>
                          <li><a href="http://diverseeducation.com/about-us/contact-us/">Contact Us</a></li>
                         
                        
                        
                    </ul>  -->
                </div>
                <div class="col-6 col-sm-5">
                
                 <!--   <address> <h5>Diverse: Issues in Higher Education</h5>  -->
		        
		       <!--      <i class="fa fa-phone fa-lg"></i> 703.385.2981 ext 3053 <br>
		           
		           <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:FrankJ@DiverseEducation.com">FrankJ@DiverseEducation.com</a> -->
		           </address>  <br>
<br>
<br>

                </div>
                <div class="col col-sm-4 align-self-center">
            <!--        <div style="footer-links">
                        <a class="btn btn-social-icon btn-instagram" href="http://www.instagram.com/diverseissuesinhighereducation/"><i class="fa fa-instagram"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/DiverseJobs"><i class="fa fa-facebook"></i></a>
                         <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/company/diverse-issues-in-higher-education/"> <i class="fa fa-linkedin"></i></a>
            <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/diverseissues"><i class="fa fa-twitter"></i></a>
      
                    </div>  -->
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

  

</html>
 