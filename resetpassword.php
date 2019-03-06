<?php
ini_set ('display_errors', '0');

define('INCLUDE_CHECK',true);

//require 'connect.php';
//require 'functions.php';

// Those two files can be included only if INCLUDE_CHECK is defined

session_name('tzLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();


$_SESSION['email'] = $_POST['email'];


$_SESSION['pass0'] = $_POST['pass0'];




if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
    // If you are logged in, but you don't have the tzRemember cookie (browser restart)
    // and you have not checked the rememberMe checkbox:

    $_SESSION = array();
    session_destroy();

    // Destroy the session
}

if(isset($_GET['logoff']))
{
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}

if($_POST['submit']=='ENTER')
{
    // Checking whether the Login form has been submitted

    $err = array();
    // Will hold our errors

    if(!$_POST['username'] || !$_POST['password'])
        $err[] = 'All the fields must be filled in!';

    if(!count($err))
    {
        $_POST['username'] = mysqli_real_escape_string($_POST['username']);
        $_POST['password'] = mysqli_real_escape_string($_POST['password']);
        $_POST['rememberMe'] = (int)$_POST['rememberMe'];

        // Escaping all input data

        $row = mysqli_fetch_assoc(mysqli_query("SELECT id,username FROM online_ads_admin_users WHERE username='{$_POST['username']}' AND password='".md5($_POST['password'])."'"));

        if($row['username'])
        {
            // If everything is OK login

            $_SESSION['username']=$row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['rememberMe'] = $_POST['rememberMe'];
       


            // Store some data in the session

            setcookie('tzRemember',$_POST['rememberMe']);
            // We create the tzRemember cookie
        }
        else $err[]='Wrong username and/or password!';
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

    if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
    {
        $err[]='Your username must be between 3 and 32 characters!';
    }

    if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
    {
        $err[]='Invalid username!';
    }

    if(!checkEmail($_POST['email']))
    {
        $err[]='Invalid e-mail address!';
    }

    if(!count($err))
    {
        // If there are no errors
        $password = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
        // Generate a random password

        $_POST['email'] = mysqli_real_escape_string($_POST['email']);
        $_POST['username'] = mysqli_real_escape_string($_POST['username']);
        // Escape the input data

        mysqli_query("	INSERT INTO online_ads_admin_users(username,password,email,regIP,dt)
                    VALUES(
                    '".$_POST['username']."',
                    '".md5($password)."',
                    '".$_POST['email']."',
                    '".$_SERVER['REMOTE_ADDR']."',
                    NOW()
        )");

        if(mysqli_affected_rows($link)==1)
        {
            send_mail(	'webmaster@diversepodium.com',
                    $_POST['email'],
                    'Webmaster - Online Ads Manager - Your new password',
                    'Your new password is: '.$password);
                    $_SESSION['msg']['reg-success']='We sent you an e-mail with your password!';
        }
        else $err[]='Username has already been used!';
    }

    if(count($err))
    {
        $_SESSION['msg']['reg-err'] = implode('<br />',$err);
    }

    header("Location: index.php");
    exit();
}

$script = '';
if($_SESSION['msg'])
{
    // The script below shows the sliding panel on page load
    $script = '
    <script type="text/javascript">
    $(function(){
        $("div#panel").show();
        $("#toggle a").toggle();
    });
    </script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Password Reset - Online Ad Manager</title>
<style>
 
  /*
  [class*="col-"] {
    margin-bottom: 20px;
}
*/


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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/ui/1.7.1/jquery-ui.js"></script>
   
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    
<link rel="stylesheet" href="css/bootstrap-social.css"> 
<link rel="stylesheet" href="css-b-orders/styles.css">
<script async='async' src='http://www.googletagservices.com/tag/js/gpt.js'></script>
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


<a class="navbar-brand" href="index.php"><h3><span class="fa fa-desktop fa-sm"></span>&nbsp;Online Ad Manager</h3></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

<span class="navbar-toggler-icon"></span>

</button>
<div class="col-sm-3"></div>
<div class="collapse navbar-collapse col-sm-6 col-md-12" id="Navbar">


<ul class="navbar-nav"> 

<!--
<li class="nav-item"><a class="nav-link" href="home.php?pageno=1"><span class="fa fa-home fa-lg"></span>&nbsp;&nbsp;</a></li>



<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-plus fa-lg"></span> Add New</a></li>

<li class="nav-item"><a class="nav-link" href="/aboutus.html"><span class="fa fa-search fa-lg"></span> Search Orders</a></li> 
 <div class="dropdown">

<a class="nav-item nav-link" href="#"><span class="fa fa-cloud-download fa-lg"></span> Download All</a> 
 <div class="col-sm-2"></div></div>



<li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-user fa-lg"></span></a></li>

<li class="nav-item"><a class="nav-link" href="?logoff" alt="log out"><span class="fa fa-sign-out fa-lg"></span> Log Out</a></li>
-->

 </ul>   
</div>  

</div>

</nav>
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
  <!-- <div class="col-sm-4 col-md-3" style="top: 10px;">

<h3> ACTIVITY</h3>
</div>-->
    <div class="col-sm col-md flex-first">
       <div class="row row-content">
    <div class="col-sm-4"> </div> 
           <div class="col">


    <?php echo $script; ?>

 
<div class="col-12 col-sm-12">



<form name="resetpassword" action="" method="POST">

 <div class="form-group col-sm-4">
 <h4>Password Reset:</h4>
    <label for="formGroupExampleInput">Email Address:</label>
    <input type="text" name="email" id="email"  value="<?php echo $_SESSION['email'] ?>" class="form-control" />
  </div>
 <div class="form-group col-sm-4">
    <label for="formGroupExampleInput">Temporary Password:</label>
    <input type="password" name="pass0" id="pass0"  value="<?php echo $_SESSION['pass0'] ?>" class="form-control"  />
  </div>
   <div class="form-group col-sm-4">
    <label for="formGroupExampleInput">New Password:</label>
    <input type="password" name="pass1" class="form-control" />
  </div>
    <div class="form-group col-sm-4">
    <label for="formGroupExampleInput">Confirm Password:</label>
    <input type="password" name="pass2" class="form-control" />
  </div>
  
 
 <button type="submit" name="submit" class="btn btn-warning btn-lg" style="width: 250px;" value="Reset Password">&nbsp;RESET PASSWORD&nbsp;</button>
  
 
</form> 

<?php

// RESET PASSOWORD CODE
// this first part is the same as the coding in the first script
// the $tpass variable is what we will pass to the database
 
if(isset($_POST['submit'])) {


$db_host		= 'localhost';
$db_user		= 'diversep_Marcos';
$db_pass		= 'b%$De90!@@?>:Z$%&';
$db_database	= 'diversep_web_ad_manager';  



/* End config */

$link = mysqli_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysqli_select_db($link, $db_database);
mysqli_query($link, "SET names UTF8");

 
// check temporary password and user email in database

$email = mysqli_real_escape_string($link, $_POST['email']);
 $pass0 = md5($_POST['pass0']);
 
// query the db for the user's account info.


$result = mysqli_query($link, "SELECT email FROM online_ads_admin_users WHERE email ='$email' AND password ='$pass0'") or die();
 
//$sqli = "SELECT email FROM online_ads_admin_users WHERE email = '$email' AND password = '$pass0'";
//$result = mysqli_query($link, $sqli);
 
// if the user's info is not found, then they get a failure message

if (mysqli_num_rows($result)== 0){
echo "Invalid credentials";

}
 
// if the temporary password matches, then we process 
// the new password
else {
$pass1 = mysqli_real_escape_string($link, $_POST['pass1']);
$pass2 = mysqli_real_escape_string( $link, $_POST['pass2']);

 
// check the second entered password against the first,
// to see if they are a match
if($pass2 != $pass1) {
echo "Passwords do not match";
exit;
}  
 
// if they match, continue to process the password
else {
$password = $pass2;
}

// we use the second entered password as our valid password,
// giving it the variable name ($password)
 
// next update database with the user's new password
 
 
 
$result = mysqli_query($link, "UPDATE online_ads_admin_users SET password = md5('$password')
WHERE email = '$email' ") or die();
 

//$sqli = "UPDATE online_ads_admin_users SET password = md5('$password')
//WHERE email = '$email' ";


/*if   (empty($_POST["email"])  ||  (empty($_POST["pass0"])) || (empty($_POST["pass1"])) ||  (empty($_POST["pass2"])))

{  
echo "Please enter missing data!";

}

if   ($result == 0)  

{  
echo "Wrong password!";

}
*/


//$result = mysqli_query($sqli);
 
// if password was successfully updated

 
 
if ($result)  {
$msg1 = "Password successfully reset";
echo $msg1;
}
 
// if updating failed
else {
$msg2 = "Password has not been reset!";
echo $msg2;
 
} // end above else
} // end password match else
} // end if submit
?>
       
</div> 

</body>

</html>
