<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');
/* Database config */
$db_host		= 'localhost';
$db_user		= 'diversep_Marcos';
$db_pass		= 'b%$De90!@@?>:Z$%&';
$db_database	= 'diversep_web_ad_manager'; 

/* End config */

$link = mysqli_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

$db_select = mysqli_select_db($link, $db_database);
mysqli_query($link, "SET names UTF8");

?>
