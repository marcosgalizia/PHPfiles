<?php
session_start();
//ini_set('session.bug_compat_warn', 0);
//ini_set('session.bug_compat_42', 0);
@ini_set('display_errors', 1);

$db_host		= 'localhost';
$db_user		= 'diversep_Marcos';
$db_pass		= 'b%$De90!@@?>:Z$%&';
$db_database	= 'diversep_web_ad_manager'; 

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Unable to establish a DB connection');

$good_email = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i";
$good_number = "^[0-9]";
$good_phone ="^[0-9]"; 
$good_date ="(0[1-9]|1[0-2])[\/-](0[1-9]|1[0-9]|2[0-9]|3[01])[\/-](19[5-9][0-9]|20[0-9][0-9])";



$imp_number = "^[\d]*$";

$selection = mysqli_real_escape_string ($link, $_POST['selected']);

$selection2 = mysqli_real_escape_string ($link, $_POST['selected2']);

$client =  mysqli_real_escape_string ($link, $_POST['Client_Name']);

$sales_agent = mysqli_real_escape_string ($link, $_POST['Sales_Agent']);

$contactname = mysqli_real_escape_string ($link ,$_POST['Contact_Name']);

$email = mysqli_real_escape_string ($link ,$_POST['Email_address']);

$phonenumber = mysqli_real_escape_string ($link ,$_POST['Phone']);

$location_leaderboard = mysqli_real_escape_string ($link ,$_POST['Leaderboard']);

$location_sidebar = mysqli_real_escape_string ($link ,$_POST['Sidebar']);

$location_floating = mysqli_real_escape_string ($link, $_POST['Floater']);

$location_footer = mysqli_real_escape_string ($link ,$_POST['Footer']);

$run_date_start = mysqli_real_escape_string ($link ,$_POST['Start_date']);

$run_date_end = mysqli_real_escape_string ($link ,$_POST['End_date']);

$impressions = mysqli_real_escape_string ($link ,$_POST['Number_of_impressions']);

$Bannerurl = mysqli_real_escape_string ($link ,$_POST['Banner_Url']);

$diverseeducation =  mysqli_real_escape_string ($link ,$_POST['Diverse_Education']);

$DiverseJobs = mysqli_real_escape_string ($link ,$_POST['Diverse_Jobs']);

$cc_news_now = mysqli_real_escape_string ($link ,$_POST['CCNews']);

$DiverseMilitary = mysqli_real_escape_string ($link ,$_POST['Diverse_Military']);

$DiverseHealth =  mysqli_real_escape_string ($link ,$_POST['Diverse_Health']);

$Dailynewsletter =  mysqli_real_escape_string ($link ,$_POST['Daily_Newsletter']);

$CCNewsletter =  mysqli_real_escape_string ($link ,$_POST['CC_newsletter']);

$Militarynews = mysqli_real_escape_string ($link ,$_POST['Military_newsletter']);

$healthnews =  mysqli_real_escape_string ($link ,$_POST['Health_Newsletter']);

$Hiringnewsletter = mysqli_real_escape_string ($link ,$_POST['Hiring_newsletter']);

$newsrecap = mysqli_real_escape_string ($link ,$_POST['News_Recap']);

$attachmentl =  mysqli_real_escape_string ($link, $_POST['image1']);

$attachment2 = mysqli_real_escape_string ($link ,$_POST['image2']);

$attachment3 = mysqli_real_escape_string ($link ,$_POST['image3']);

$attachment4 = mysqli_real_escape_string ($link ,$_POST['image4']);

$attachment5 = mysqli_real_escape_string ($link ,$_POST['image5']);

$notes = mysqli_real_escape_string ($link ,$_POST['order_notes']);


/*  Images uploads to server */

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

$user = $_SESSION['username'];

/*

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target1,PATHINFO_EXTENSION));
$imageFileType = strtolower(pathinfo($target2,PATHINFO_EXTENSION));
$imageFileType = strtolower(pathinfo($target3,PATHINFO_EXTENSION));
$imageFileType = strtolower(pathinfo($target4,PATHINFO_EXTENSION));
$imageFileType = strtolower(pathinfo($target5,PATHINFO_EXTENSION));

*/

if($_POST['submit'] == "")  {
	
	
	echo  "Form is empty!";
	
}
else 

if (empty($_POST['Client_Name']))   {
	
$error_message = "<p style='color: red;'>Client name is required!</p>";
	
}

if(empty($_POST['selected2']))     /*changes to code on 10/18/18 */

{
		$error_message = "<p style='color: red;'>Sales Rep is required!</p>";
	
}


if(empty($_POST['End_date'])) 

{
	$error_message = "<p style='color: red;'>End run date is required!</p>";
	
}


if(empty($_POST['Start_date'])) 

{
$error_message = "<p style='color: red;'>Start run date is required!</p>";
	
}

if(empty($_POST['Phone']))   {

    $error_message = "<p style='color: red;'>Enter a phone number!</h4></p>";

}

if(empty($_POST['Email_address']))   {

 $error_message = "<p style='color: red;'>E-mail is required!</h4></p>";

}

if (preg_match ($good_email ,$email))
{}
	
else  {
	
$error_message = "<p style='color: red;'>Enter a valid e-mail</p>";
}

if  (!preg_match ("/$imp_number/",$impressions))  {
{
	
 $error_message = "<p style='color: red;'>Number of impressions cannot contain commas or periods!</h4></p>";

}


 if  (!(preg_match ("/$good_phone/i", $phonenumber)))  {

    $error_message = "<p style='color: red;'>Enter a valid phone number!</h4></p>";

}


else if ( strlen ($phonenumber) < 10 )  {

$error_message = "<p style='color: red;'>Phone number must have at least <br/>10 digits</p>";


}
}


if ($error_message)  {
	
	$_SESSION['error'] = $error_message; 
$user = $_SESSION['username'];

                   // Dispalys error on screen
	         $_SESSION['selected'] = $selection;
			  //  $_SESSION['Sales_Agent'] = $sales_agent;
			  
			  	// change to code on 10/18/2018   	
			  $_SESSION['selected2'] = $selection2;
			  
			    
				$_SESSION['Hugo Lembert'] = $Hugo;
				$_SESSION['Larry LeCompte'] = $Larry; 
				
		        $_SESSION['Marla Scher'] = $Marla;
				$_SESSION['Ndija Kakumba'] = $Ndija;
				$_SESSION['Ralph Newell'] = $Ralph;
				$_SESSION['Tasha Ferguson'] = $Tasha;
				$_SESSION['Victoria Payne'] = $Victoria;
				$_SESSION['Virginia Hendrix'] = $Virginia;
				$_SESSION['Will Cox'] = $Will;
				$_SESSION['Sydnee Reese'] = $Sydnee;
				$_SESSION['Wendi Sours'] = $Wendi;
			/*  end of changes  */
			
			     $_SESSION['Client_Name'] = $client;
			      $_SESSION['Contact_Name'] = $contactname;
			        $_SESSION['Email_address'] = $email;
			   	       $_SESSION['Phone'] = $phonenumber;
					    $_SESSION['Leaderboard'] = $location_leaderboard;
				      $_SESSION['Sidebar'] = $location_sidebar;
					 $_SESSION['Floater'] = $location_floating; 
				   $_SESSION['Footer'] = $location_footer;
			     $_SESSION['Start_date'] = $run_date_start;
		       $_SESSION['End_date'] = $run_date_end;
		     $_SESSION['Number_of_impressions'] = $impressions;
								                       $_SESSION['Status_pending'] = $Statuspending;
										               $_SESSION['Status_active'] = $Statusactive;
													   $_SESSION['Status_cancelled'] = $Statuscancelled;
												       $_SESSION['Banner_Url'] = $Bannerurl;
												       $_SESSION['Diverse_Education'] = $diverseeducation; 
												       $_SESSION['Diverse_Jobs'] = $DiverseJobs;
													   $_SESSION['CCNews'] = $cc_news_now;
													   $_SESSION['Diverse_Military'] = $DiverseMilitary;
												       $_SESSION['Diverse_Health'] = $DiverseHealth;  
												       $_SESSION['Daily_Newsletter'] = $Dailynewsletter;
													   $_SESSION['CC_newsletter'] = $CCNewsletter;
												   	   $_SESSION['Diverse_Military'] = $DiverseMilitary;  
													   $_SESSION['Military_newsletter'] = $Militarynews;
													   $_SESSION['Health_Newsletter'] = $healthnews;
													   $_SESSION['Hiring_newsletter'] = $Hiringnewsletter;
													   $_SESSION['News_Recap'] = $newsrecap;	 
											 $_SESSION['image1'] = $attachment1;	
											 $_SESSION['image2'] = $attachment2;		   
											 $_SESSION['image3'] = $attachment3;	  
											 $_SESSION['image4'] = $attachment4;	
											 $_SESSION['image5'] = $attachment5;  
											 $_SESSION['order_notes'] = $notes; 
                  



  
   header('Location: http://diversepodium.com/Online-Ad-Manager/add-new.php'."?error=$error_message");
 
}

else

{

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Unable to establish a DB connection');


if (!$link) {
    die("Connection failed: " . mysqli_connect_error());

}




//$_SESSION['username'] = $user_name;

//changes to code on 10/18/18

$sqli = "INSERT INTO Banner_orders_submitted (user, date, client_name, contact, email, phone, loc_sidebar, loc_leaderboard, loc_footer, duration_start_date, duration_end_date, impressions, url , website_diverse, website_jobs, website_cc, website_military, website_health, news_daily, news_health, news_military, news_cc, news_hiring, news_recap, image1_url, 
image2_url, image3_url, image4_url, image5_url, notes, location_floating, status, sales_agent, activity)

VALUES ('$user', CURRENT_TIMESTAMP(), '$client', '$contactname', '$email', '$phonenumber', '$location_sidebar', '$location_leaderboard', '$location_footer', '$run_date_start', '$run_date_end', '$impressions','$Bannerurl', '$diverseeducation', '$DiverseJobs', 
'$cc_news_now', '$DiverseMilitary', '$DiverseHealth', '$Dailynewsletter', '$healthnews', '$Militarynews', '$CCNewsletter', '$Hiringnewsletter', '$newsrecap', '$image1', '$image2', '$image3', '$image4', '$image5', '$notes', 
'$location_floating', '$selection', '$selection2', 'created')";

 



 
 if (mysqli_query($link, $sqli))
    { 
	
$placeholder = "place-holder.png";	   
	
	
	
	
	
if (empty($_POST))  {
	 	print "<p>No data was submitted.</p>"; 
		print "</body></html>";
		exit();	
		}
		

		
		 if     ( !empty($_POST['Sales_Agent']));
	
	{
		
			
        $command = mysqli_query($link ,"UPDATE Banner_orders_submitted SET status = 'READY' WHERE id = $o_id");
		
		
		}
		
		
		
 if (!empty($_POST['Client_Name']))   {
	
	header ('Location: http://diversepodium.com/Online-Ad-Manager/home.php');
	
}
		
 if  (!empty($_POST['Client_Name']) /*&& !empty($_POST['Start_date']) && !empty($_POST['End_date']) && !empty($_POST['Number_of_impressions'])*/) {
		
		
		
		
if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1))  {
	
	$target1 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image1);

}

else  { 

$target1 = "http://diversepodium.com/Online-Ad-Manager/place-holder.png";


 }
 
 
if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2))  {

$target2 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image2);
}

else  {
	
	$target2 = "http://diversepodium.com/Online-Ad-Manager/place-holder.png";
	
	
}


if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3))  {
	
        $target3 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image3);
        
}
else  { 
$target3 = "http://diversepodium.com/Online-Ad-Manager/place-holder.png";


  }
  

if (move_uploaded_file($_FILES['image4']['tmp_name'], $target4))  {
	
	
$target4 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image4);
	
}


else  { 

$target4 = "http://diversepodium.com/Online-Ad-Manager/place-holder.png";
 }
if (move_uploaded_file($_FILES['image5']['tmp_name'], $target5))  {

$target5 = "http://diversepodium.com/Online-Ad-Manager/uploads/".basename($image5);

}

else  
{
	
$target5 = "http://diversepodium.com/Online-Ad-Manager/place-holder.png";

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
   $old_setting_promo_email2 = $data->email5;
   $old_setting_promo_email2 = $data->email6;
   $old_setting_promo_email3 = $data->email7;
   $old_setting_promo_email4 = $data->email8;	
   $old_setting_promo_email5 = $data->email9;
 
}	
		 
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
$message .= '<p>Order entered by user <b><i>'.$user.'</i></b>';
$message .= '<table rules="all" style="font-family:Tahoma, Geneva, sans-serif; border-color: #000; border="1" cellpadding="5">';                                       /* changes to code on 10/18/18 */
$message .= "<tr style='width:400px;background:#900; color:#FFF;font-family:Tahoma, Geneva, sans-serif;'><td style='width:300px'><strong>Sales Rep:</strong> </td><td>" . strip_tags($_POST['selected2']) . "</td></tr>";
$message .= "<tr style='width:400px;background:#900; color:#FFF;font-family:Tahoma, Geneva, sans-serif;'><td style='width:300px'><strong>Client Name:</strong> </td><td>" . strip_tags($_POST['Client_Name']) . "</td></tr>";
$message .= "<tr><td><strong>Contact Name:</strong> </td><td>" . strip_tags($_POST['Contact_Name']) . "</td></tr>";
$message .= "<tr><td><strong>E-mail:</strong> </td><td>" . strip_tags($_POST['Email_address']) . "</td></tr>";
$message .= "<tr><td><strong>Phone number:</strong> </td><td>" . strip_tags($_POST['Phone']) . "</td></tr>";
$message .= "<tr><td><strong>Ad Location:</strong> </td><td><br>" 
. strip_tags($_POST['Leaderboard'] )
."<br>". strip_tags($_POST['Sidebar'] )
."<br>". strip_tags($_POST['Footer'] )
."<br>". strip_tags($_POST['Floater'] ) ."

</td></tr>";

$message .= "<tr><td><strong>Start run date:</strong> </td><td>" . strip_tags($_POST['Start_date'] ). "</td></tr>";
$message .= "<tr><td><strong>End run date:</strong> </td><td>" . strip_tags($_POST['End_date'] ). "</td></tr>";
$message .= "<tr><td><strong>Number of Impressions:</strong> </td><td>" . strip_tags($_POST['Number_of_impressions'] ). "</td></tr>";
$message .= "<tr><td><strong>Order Status:</strong> </td><td style='color:#fff;background-color:#000; padding: 10px; font-weight:bold'>" . strip_tags($_POST['selected'] ). "</td></tr>";
$message .= "<tr><td><strong>Ad URL:</strong> </td><td>" . strip_tags($_POST['Banner_Url'] ). "</td></tr>";
$message .= "<tr><td><strong>Web site placements:</strong> </td><td>" . strip_tags($_POST['Diverse_Education'] )."<br>". strip_tags($_POST['Diverse_Jobs'] ). "<br>".strip_tags($_POST['CCNews'] ) ."<br>". strip_tags($_POST['Diverse_Military'] ) ."<br>". strip_tags($_POST['Diverse_Health'] ). "</td></tr>";
$message .= "<tr><td><strong>Newsletter placements:</strong> </td><td>"."<br>". strip_tags($_POST['Daily_Newsletter'] ). "<br>". strip_tags($_POST['CC_newsletter'] )."<br>". strip_tags($_POST['Health_Newsletter'] )."<br>". strip_tags($_POST['Military_newsletter'] ). "<br>". strip_tags($_POST['Hiring_newsletter'] ) ."<br>". strip_tags($_POST['News_Recap'] ). "</td></tr>";
$message .= "<tr><td><strong>NOTES:</strong> </td><td>" . strip_tags($_POST['order_notes'] ). "</td></tr>";
$message .= "</table>";
$message .= '<table rules="all" style="font-family:Tahoma, Geneva, sans-serif; border-color: #000; border="1" cellpadding="5">';
$message .= "<tr><b>Artwork:</b></td></tr>";


$message .= "<tr><td> <img src='$target1' /></td></tr>";  

$message .= "<tr><td> <img src='$target2' /></td></tr>";

$message .= "<tr><td> <img src='$target3' /></td></tr>";   

$message .= "<tr><td> <img src='$target4' /></td></tr>";   

$message .= "<tr><td> <img src='$target5' /></td></tr>";   

/*
. strip_tags($target1) ."<br>"
. strip_tags($target2) ."<br>"
. strip_tags($target3) ."<br>"
. strip_tags($target4) ."<br>" 
. strip_tags($target5) .  */



$message .= "</table>";
$message .= "</body></html>";

$subject = 'Online Ad Order - '. strip_tags($_POST['Client_Name']);

mail (''.$old_setting_email1.'', $subject, $message, $headers);  
mail (''.$old_setting_email2.'', $subject, $message, $headers);  
mail (''.$old_setting_email3.'', $subject, $message, $headers);  
mail (''.$old_setting_email4.'', $subject, $message, $headers);  


//mail ('mgalizia@cmapublishing.com, diverseads@diverseeducation.com', $subject, $message, $headers);   

header ('Location: http://diversepodium.com/Online-Ad-Manager/home.php?pageno=1'); 

exit();
	}
	}
	
else
{
	
	
  echo "Error: " . $sqli . "<br>" . mysqli_error($link);  // this code could be made hidden except to the server if there was an error?
  }

mysqli_close($link);  //close connection to database            
}
?>