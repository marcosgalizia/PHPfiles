<?php
//this is a test
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

if($_POST['submit']=='SIGN IN')
{
    // Checking whether the Login form has been submitted

    $err = array();
    // Will hold our errors

    if(!$_POST['username'] || !$_POST['password'])
        $err[] = '<p style="color:#FFF;">All required fields must be filled in!</p>';

    if(!count($err))
    {
        $_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
        $_POST['password'] = mysqli_real_escape_string($link, $_POST['password']);
        $_POST['rememberMe'] = (int)$_POST['rememberMe'];

        // Escaping all input data

        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT id,username,level FROM online_ads_admin_users WHERE username='{$_POST['username']}' AND password='".md5($_POST['password'])."'"));

        if($row['username'])  {
      
            // If everything is OK login

            $_SESSION['username']= $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['rememberMe'] = $_POST['rememberMe'];
       $_SESSION['level'] = $row['level'];
     // Store some data in the session

            setcookie('tzRemember',$_POST['rememberMe']);
            // We create the tzRemember cookie
			
		
			header ('Location: home.php?pageno=1');
			exit();
        }
	
 else $err[]='<p style="color:#fff;">User and/or Password incorrect</p>';
    }

    if($err)
        $_SESSION['msg']['login-err'] = implode('<br />',$err);
        // Save the error messages in the session

    header("Location: index.php");
    exit();
}


else if($_POST['submit']=='CREATE ACCOUNT')
{
  // If the Register form has been submitted
    $err = array();

  
 $row = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM online_ads_admin_users WHERE username='{$_POST['username']}'"));

echo $row;

  
if ($row['username'] == $_POST['username'])

 {
	$err[] = '<p style="color:#fff;">The username entered has already been used!';
	 
  }
  
   if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
    {
        $err[]='<p style="color:#fff;">User name is too short!</p>';
    }

    if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
    {
        $err[]='<p style="color:#fff;">Your user name contains invalid characters!</p>';
    }

    if(!checkEmail($_POST['email']))
    {
        $err[]='<p style="color:#fff;">Invalid e-mail!</p>';
    }


    if(!count($err))
    {
        // If there are no errors
        $password = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
        // Generate a random password

    $_POST['email'] = mysqli_real_escape_string($link, $_POST['email']);
        $_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
        // Escape the input data

        mysqli_query($link, "INSERT INTO online_ads_admin_users (username,password,email,regIP,dt)
                    VALUES(
                    '".$_POST['username']."',
                    '".md5($password)."',
                    '".$_POST['email']."',
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
	   
	  $err[]='<p style="color:#fff;">The username entered has already been used!</p>';
    }

    if(count($err))
    {
        $_SESSION['msg']['reg-err'] = implode('<br />',$err);
    }

    header("Location: index.php");
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
		  position:absolute;
   bottom:-50px!important;
   width:100%;
}
body, html {
    display: block;
    background-position: center;
    background-image: url(background-2.jpg);
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
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    
 <link rel="stylesheet" href="css/bootstrap-social.css"> 
 <link rel="stylesheet" href="css-b-orders/styles.css">



</head>

<body>

<nav class="navbar navbar-inverse navbar-toggleable-sm fixed-top">

<div class="container">


<a class="navbar-brand" href="#"><h3><span class="fa fa-desktop fa-sm"></span>&nbsp;Online Ad Manager</h3></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

<span class="navbar-toggler-icon"></span>

</button>
<div class="col-sm-3"></div>
<div class="collapse navbar-collapse col-sm-6 col-md-12" id="Navbar">


<ul class="navbar-nav"> 
<!--
<li class="nav-item active"><a class="nav-link" href="http://diverseeducation.com/ashe"><span class="fa fa-home fa-lg"></span> Home</a></li> --->
<!--<li class="nav-item"><a class="nav-link" href="/aboutus.html"><span class="fa fa-address-card fa-lg"></span> Finalists</a></li> -->
 <div class="dropdown">
      
   <!--   <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="servicesDropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-trophy fa-lg"></span> Winners/Finalists</a> 
      
      <div class="dropdown-menu" aria-labelledby="servicesDropdown">  
      
         <a class="dropdown-item" href="http://diverseeducation.com/2018-ashe-winners/" target="_blank">2018 Winners</a>  -->
    
    <!--  <a class="dropdown-item" href="#">2016</a>  -->
      
    
   
      </div>
      
      <div class="col-sm-2"></div></div>

<!--
<div class="dropdown">
     
      <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="servicesDropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-trophy fa-lg"></span>Winners </a>
   
      <div class="dropdown-menu" aria-labelledby="servicesDropdown">    
      <a class="dropdown-item" href="http://diverseeducation.com/arthur-ashe-jr-sport-scholars-2017/" target="_blank">2017 Winners</a>
       <a class="dropdown-item" href="http://diverseeducation.com/94911-2/" target="_blank">2017 Finalists</a>
        <a class="dropdown-item" href="http://diverseeducation.com/arthur-ashe-jr-sports-scholars-2016/" target="_blank">2016</a>
        

<!--
<div class="dropdown">
     
<a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="servicesDropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-list fa-lg"></span> Roster </a>
<div class="dropdown-menu" aria-labelledby="servicesDropdown">    
<a class="dropdown-item" href="http://diverseeducation.com/ashe2018-roster/asheteam-roster-2018.php" target="_blank">2018</a>  
  <a class="dropdown-item" href="http://diverseeducation.com/ashe-2017/asheteam-2017.php" target="_blank">2017</a> 
  <a class="dropdown-item" href="http://diverseeducation.com/ashe-2016/asheteam-2016.php" target="_blank">2016</a>  
   <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2015" target="_blank">2015</a>
   <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2014" target="_blank">2014</a>
     <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2013" target="_blank">2013</a>
      <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2012" target="_blank">2012</a>
    <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2011" target="_blank">2011</a>
    <a class="dropdown-item" href="http://diverseeducation.com/ashe-teams/?asyear=2010" target="_blank">2010</a>  
                  
  </div>     
  </div>
<li class="nav-item"><a class="nav-link" href="http://diverseeducation.com/arthur-ashe-press-releases/"><span class="fa fa-bullhorn fa-lg"></span> Press Releases</a></li>

 </ul>   
</div>   -->

</div>

</nav>
<!--
    <header class="jumbotron">
   

 
 <div class="container">
            <div class="row row-header">
          <!--      <div class="col-12 col-md-7 col-sm-12 align-self-center">
             
                    
                    
            </div>-->

        </div>
        </div>
  </header> -->

   <div class="container">
   <div class="row row-content">

    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <!--  <div class="col-sm-2"> </div> -->
           <div class="col">
<div class="col-12 col-sm-12">
<br>
<br>
<br>

  <h3 style="color:#FFF;">SIGN IN</H3>
  
  
<br>
  <?php
					if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?> 
 <form class="form-inline" action="" method="POST">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">User Name</label>
                        <input type="text" name="username" class="form-control form-control-sm mr-1" id="username" placeholder="User Name" size="23">
                    </div>
                   <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm mr-1" id="password" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="rememberMe" id ="rememberMe" type="checkbox" checked="checked" value="1">Remember me
                        </label>
                    </div>
                          &nbsp; &nbsp; &nbsp; <button type="submit" name="submit" class="btn btn-primary btn-sm" value="SIGN IN" id="SIGN IN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SIGN IN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>


                                  
   </form>
    <a href='reset_request.php'><p style="color:#fff;">Forgot Password?</p></a>
</div>
        
<div class="col-12 col-sm-12"><br>
<br>

<!-- <h3 style="color:#FFF;">CREATE AN ACCOUNT</H3><br> -->
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
<!--
    <footer class="footer-index">
        <div class="container">
            <div class="row">             
          <div class="col-5 offset-1 col-sm-2">
                 <ul class="list-unstyled">
                        <li><a href="https://www.diversebooks.net/">Higher Education Books</a></li>
                        <li><a href="http://diversejobs.net/">Higher Education Jobs</a></li>
                        <li><a href="http://jobs.diversejobs.net/employer/emplogin.html">Post a Job</a></li>
                        <li><a href="http://diverseeducation.com/media-kit/">Advertise</a></li>
          <li><a href="http://diverseeducation.com/about-us/contact-us/">Contact Us</a></li>
           </ul>  
                </div>  
                <div class="col-6 col-sm-5">
                
                <address> <h5>Diverse: Issues in Higher Education</h5> 
		        
		      <i class="fa fa-phone fa-lg"></i> 703.385.2981 ext 3053 <br>
		           
		           <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:FrankJ@DiverseEducation.com">FrankJ@DiverseEducation.com</a> 
		           </address>  <br>
<br>
<br>
                </div>
                <div class="col col-sm-4 align-self-center">
                    <div style="footer-links">
                 <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/diverseissuesinhighereducation/"><i class="fa fa-instagram"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/DiverseJobs"><i class="fa fa-facebook"></i></a>
                         <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/company/diverse-issues-in-higher-education/"> <i class="fa fa-linkedin"></i></a>
            <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/diverseissues"><i class="fa fa-twitter"></i></a>
           
                    </div>  
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
    -->

     
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
 