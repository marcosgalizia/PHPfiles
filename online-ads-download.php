<?php



$db_host     = 'localhost';
$db_user	 = 'diversep_Marcos';
$db_pass	 = 'b%$De90!@@?>:Z$%&';
$db_database = 'diversep_web_ad_manager'; 
	 
$db = mysqli_connect  ('localhost',  'diversep_Marcos', 'b%$De90!@@?>:Z$%&') or die ('I cannot connect to the database because: ' . mysqli_connect_error());


$db_select =  mysqli_select_db ($db,'diversep_web_ad_manager') or die('I cannot select the database because: ' . mysqli_connect_error());



$query = $db->query("SELECT * FROM Banner_orders_submitted ORDER BY date DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Online_ad_orders_" . date('m-d-Y') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array(('ORDER ID'), 'SALES AGENT','CLIENT NAME', 'SIDEBAR', 'LEADERBOARD', 'FLOATER', 'FOOTER', 'DIVERSE EDUCATION', 'DIVERSE JOBS', 
	'CCNEWS', 'DIVERSE MILITARY', 'DIVERSE HEALTH', 'DAILY NEWS', 'HEALTH NEWS', 'CC NEWS','MILITARY NEWS','HIRING NEWS', 
	'RECAP NEWS', 'START DATE', 'END DATE', 'IMPRESSIONS');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
      //  $status = ($row['status'] == '1')?'Active':'Inactive';
	  
	  
        $lineData = array($row['id'], $row['sales_agent'], $row['client_name'], $row['loc_sidebar'], $row['loc_leaderboard'], $row['location_floating'], 
		$row['loc_footer'], $row['website_diverse'], $row['website_jobs'], $row['website_cc'], $row['website_military'], $row['website_health'] 
		,$row['news_daily'], $row['news_health'], $row['news_cc'], $row['news_military'], $row['news_hiring'], $row['news_recap'],
		$row['duration_start_date'], $row['duration_end_date'], $row['impressions']);
		
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
	
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>