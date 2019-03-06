<?php
session_start(); 
/*if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}*/
error_reporting(E_ALL);
ini_set('display_errors', 0);  

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
/*
$link = mysqli_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysqli_select_db($link, $db_database);
mysqli_query( $link, "SET names UTF8");*/

// Those two files can be included only if INCLUDE_CHECK is defined
session_name('tzLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks
?>
<?
$user = $_POST['username'];

if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
    // If you are logged in, but you don't have the tzRemember cookie (browser restart)
    // and you have not checked the rememberMe checkbox:

    $_SESSION = array();
  //   session_destroy();

    // Destroy the session
}
if(isset($_GET['logoff']))
{
    $_SESSION = array();
    session_destroy();
    header("Location: http://diversepodium.com/Online-Ad-Manager/index.php");
die();
}

 if($_POST['submit']=='CREATE ACCOUNT')
{
  // If the Register form has been submitted
    $err = array();

  
 $row = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM online_ads_admin_users WHERE username='{$_POST['username']}'"));

echo $row;

  
if ($row['username'] == $_POST['username'])

 {
	$err[] = '<p style="color:red;">The username entered has already been used!';
	 
  }
  
   if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
    {
        $err[]='<p style="color:red;">User name is too short!</p>';
    }

    if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
    {
        $err[]='<p style="color:red;">Your user name contains invalid characters!</p>';
    }

    if(!checkEmail($_POST['email']))
    {
        $err[]='<p style="color:red;">Invalid e-mail!</p>';
    }

    if(!count($err))
    {
        // If there are no errors
        $password = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
        // Generate a random password

    $_POST['email'] = mysqli_real_escape_string($link, $_POST['email']);
	
        $_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
	//	  $_POST['selected'] = mysqli_real_escape_string($link, $_POST['selected']);
        // Escape the input data

        mysqli_query($link, "INSERT INTO online_ads_admin_users (username,password,email,level,regIP,dt)
                    VALUES(
                    '".$_POST['username']."',
                    '".md5($password)."',
                    '".$_POST['email']."',
					   '".$_POST['selected1']."',
                    '".$_SERVER['REMOTE_ADDR']."',
                     NOW()
        )");
 	$_POST['username'];

      if(mysqli_affected_rows($link)==1)
	 {

$to =  $_POST['email'];
$subject = "USER REGISTRATION - ONLINE AD MANAGER SITE - Your new password";
$headers = 'From: webmaster@diversepodium.com' . "\r\n" .	
			
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	

$message .= "Your username is: " .strip_tags($_POST['username']). "  and your password is: "  . $password;
$message .= "<br><br>";
$message .=  "To log in <a href='http://www.diversepodium.com/Online-Ad-Manager/index.php'>CLICK HERE</a>"; 
$message .=  "<br><br>DO NO REPLY TO THIS E-MAIL";
   // 'Reply-To: webmaster@example.com' . "\r\n" .
   // 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
			
	/*		
	   send_mail(	'webmaster@diversepodium.com',
                    $_POST['email'],
				
                 'USER REGISTRATION - ONLINE AD MANAGER SITE - Your new password',
				 
			     'Your username is:  '.$_POST["username"].' and your password is: '.$password.'   
				  To login go to http://www.diversepodium.com/Online-Ad-Manager/index.php 
			    
				 DO NO REPLY TO THIS E-MAIL');
				 */
				 
				 if(mail){
			 $_SESSION['msg']['reg-success']='<p style="color:#fff;">Your password has been sent to your e-mail!</p>';
			
        }
		}
       else
	   
	  $err[]='<p style="color:#red;">The username entered has already been used!</p>';
    }

    if(count($err))
    {
        $_SESSION['msg']['reg-err'] = implode('<br />',$err);
    }

    header("Location: users.php");
    //exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Ad Manager</title>
    
  <style>
 

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
.footer-index  { background-color: #1c6a80;
           margin-top:180px;
		   padding: 20px 0px 20px 0px;
		    height: auto;
		  position:relative;
   bottom:-50px!important;
   width:100%;
}
body, html {
    display: block;
    background-position: center;
   
    background-repeat: no-repeat;
    height: 100%;
    width: 100%!important;
    background-size: cover!important;}
	</style>
  
    <!-- Required meta tags always come first -->
    
<meta charset="utf-8">
<meta http-equiv="x ua-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1", shrink-to-fit=no">
    
<meta name="generator"/>  

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.7.1/jquery-ui.js"></script>
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
?> </a>

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
 </div>
        </div>
  </header>

   <div class="container">
   <div class="row row-content">

    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">

  
<br>
  <?php
					if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?> 

</div>
        
<div class="col-12 col-sm-12">
<div class="col-sm-12">
<h3>Users</h3>
<div style='border: 1px solid #000;padding: 10px; background-color:#999; position:relative; height:auto;'>
<div class='row'>
<div class='col-sm-4'><b style="color:#fff;">Username</b></div>
<div class='col-sm-4'><b style="color:#fff;">E-mail</b></div>
<div class='col-sm-4'><b style="color:#fff; text-align:left;">ROLE</div></b><br>
</div>
</div>
<?php
function alert(){
?>
<script>
alert('User Deleted!');
</script>
<?php   }

?>
<?php
$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 


 $_POST['selected'] = mysqli_real_escape_string($link, $_POST['selected']);



$o_id = "orderid";     
$o_id = $_GET['orderid'];

if (isset($_POST['delete']) ){

	
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database)
	
	or die ("Cannot connect to mySQL.");
    // mysql delete query 
	
    $query = "DELETE FROM online_ads_admin_users WHERE id=$o_id"; 
    $result = mysqli_query($link, $query);
 
 
 	
alert();
}

else

{  }

?>
<?php
function alert2(){
?>
<script>
alert('User Role Changed!');
</script>
<?php   }

?>
<?php
$selection =  mysqli_real_escape_string($link, $_POST['selected']);

if (isset($_POST['SAVE']) ){
	
alert2();
	
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database)
	
	or die ("Cannot connect to mySQL.");
    // mysql delete query 
	/*
    $query = "UPDATE online_ads_admin_users SET level='".$db_database->real_escape_string($selection)
          ."' WHERE id=".$db_database->real_escape_string($o_id).";";
		  */
  $query = mysqli_query($link,"UPDATE online_ads_admin_users SET level='$selection' WHERE id =$o_id");
  $result = mysqli_query($link, $query);
	
}

else

{  }


$link = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die('Unable to establish a DB connection');
		  
$command = "SELECT id,username,email,level FROM online_ads_admin_users ORDER BY level ASC";

$result = $link->query($command);

while ($data = $result->fetch_object()) 

{
	$old_setting_role = $data->level;	
	
echo "<div style='border: 1px solid #000;padding: 10px; background-color:#cee5d8; position:relative; height:auto;'>";
echo "<div class='row'>";
echo "<div class='col-sm-2'>"; echo "$data->username"; echo "</div>";
echo "<div class='col-sm-3'>"; echo "&nbsp"; echo "$data->email&nbsp;&nbsp;&nbsp;"; echo "</div>";
echo "<div class='col-sm-2'>"; echo "&nbsp"; echo "$data->level&nbsp;&nbsp;&nbsp;"; echo "</div>";
echo '<form action="users.php?orderid='.$data->id.'" method="POST">';
echo "<select name='selected' class='custom-select custom-select-lg col-sm-2'>";
echo "<option selected>Change Role</option>";  
echo "<option value='admin' name='admin'>Admin </option>";
echo "<option value='sales' name='sales'>Sales/Other</option>";
echo "</select>";
echo "<button type='submit' name='SAVE' class='btn btn-warning btn-sm' value='SAVE'>";
echo "&nbsp;SAVE&nbsp;</button>";
echo "</form>";
echo "<div class='col-sm-2'>"; 
echo '<form action="users.php?orderid='.$data->id.'" method="POST">';
echo '<button type="submit"  name="delete"  value="delete" title="DELETE USER"  />

<i class="fa fa-trash"></i>
</button>&nbsp;';
echo "</div>";

echo '</form>';
echo "<br>";


echo "</div>";



echo "</div>";
}

$result->free();
$link->close();


?>



</div>


<br>

<h3>Add New User</h3><br> 
  <?php
				if($_SESSION['msg']['reg-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if($_SESSION['msg']['reg-success'])
						{
							echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
							unset($_SESSION['msg']['reg-success']);
						}
					?> 
<form class="form-inline" action="" method="post">

                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">User Name</label>
                        <input type="text" name="username" id="username" class="form-control form-control-sm mr-1"  value="" placeholder="User Name" size="23">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">E-mail</label>
                        <input type="text" name="email" class="form-control form-control-sm mr-1" id="email" placeholder="e-mail">
                    </div>
                    
                       <div class="form-group">
                        <label class="sr-only">Role</label>
       
<select name="selected1" class="custom-select custom-select-sm" >
<option selected>Select Role</option>
  <option value="admin" name="admin">Administrator</option>
 <option value="sales" name="sales">Sales Team/ OTHER<b><b></option>-->
 
</select>
 </div>       
 <button type="submit" name="submit" class="btn btn-primary btn-sm" value="CREATE ACCOUNT">&nbsp;&nbsp; &nbsp;CREATE USER&nbsp; &nbsp; &nbsp;</button>
                 
                </form>
</div>

</div>
  </div>
  </div>
</div>


</div>
<br>
<br>
<br>
  <footer class="footer-index">
        <div class="container">
            <div class="row">             
           <!--     <div class="col-5 offset-1 col-sm-2">
               
                    <ul class="list-unstyled">
                        <li><a href="https://www.diversebooks.net/">Higher Education Books</a></li>
                        <li><a href="http://diversejobs.net/">Higher Education Jobs</a></li>
                        <li><a href="http://jobs.diversejobs.net/employer/emplogin.html">Post a Job</a></li>
                        <li><a href="http://diverseeducation.com/media-kit/">Advertise</a></li>
                          <li><a href="http://diverseeducation.com/about-us/contact-us/">Contact Us</a></li>
           </ul>  
                </div>   -->
                <div class="col-6 col-sm-5">
                
                  <!--  <address> <h5>Diverse: Issues in Higher Education</h5>  -->
		        
		       <!--      <i class="fa fa-phone fa-lg"></i> 703.385.2981 ext 3053 <br>
		           
		           <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:FrankJ@DiverseEducation.com">FrankJ@DiverseEducation.com</a> -->
		           </address>  <br>
<br>
<br>
                </div>
                <div class="col col-sm-4 align-self-center">
                    <div style="footer-links">
                  <!--      <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/diverseissuesinhighereducation/"><i class="fa fa-instagram"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/DiverseJobs"><i class="fa fa-facebook"></i></a>
                         <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/company/diverse-issues-in-higher-education/"> <i class="fa fa-linkedin"></i></a>
            <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/diverseissues"><i class="fa fa-twitter"></i></a>
           
                    </div>  -->
                </div>
           </div>
<div class="col-12"><br>
<br>
<br>
<br>
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

<!--
<script src="scripts/jquery-1.6.2.min.js"></script>  -->
<style>

 html, body {
      margin: 0;
      padding: 0;
    }

address {color:#fff; }

address a  {color:#fff;  }

</style>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

</html>
 