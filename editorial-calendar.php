<!--  PROJECT DESCRIPTION  -->

<!--  Originally this page was just plain HTML code.  

I used PHP arrays and FOR looop to make the page dynamic. 

The PHP strtotime function is being used in the loop to parse the date into Unix format,  
this way the calendar gets updated and past issue dates get removed from the page.  

Similiar PHP code is on the sidebar of diverseeducation.com with a small variation to display only two upcoming issues.

-->


<style type="text/css">
#editorial-calendar table tbody tr td {
	text-align: left;
}
#editorial-calendar table tbody tr td {
	text-align: left;
}
#editorial-calendar table {
	text-align: center;
}
</style>


<div id="editorial-calendar">

<table width="750px" border="1" cellspacing="0" cellpadding="4" style="font-family: 'Open Sans', sans-serif; font-size: 13px">
<tbody>
<tr>
  <td width="130" style="text-align:center;"><strong>Issue Date</strong></td>
  <td width="472" height="20" style="text-align: center;"><br />
    <table border="0" width="525" style="margin-left: -10px;">
      <tbody>
        <tr>
          <td width="534" height="38">  
          <!--  <img src="http://www.diversepodium.com/wp-content/uploads/2014/12/calendar-top-bar.jpg" width="60%" height="35" /> -->
            </td>
          </tr>
        </tbody>
      </table></td>
 <td style="text-align: center;" width="108"><strong>Ad Deadline Date</strong></td>
</tr>  </tbody>
<?php 
$color  = array (
"#FFFFCE",   //YELLOW
"#E6E6E6",   //Grey
"#FFFFCE",   //YELLOW
"#E6E6E6",   //WHITE
"#FFFFCE",   //GREY
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //GREY
"#FFFFCE",   //YELLOW
"#E6E6E6",   //GREY
"#FFFFCE",   //GREY
"#E6E6E6",   //GREY
"#FFFFCE",   //WHITE
"#E6E6E6",   //YELLOW
"#FFFFCE",   //WHITE
"#E6E6E6",    //GREY
"#FFFFCE",    //WHITE
"#E6E6E6",    //GREY
"#FFFFCE",    //WHITE
"#E6E6E6",    //YELLOW
"#FFFFCE",    //WHITE
"#E6E6E6",     //WHITE
"#FFFFCE",     //GREY
"#E6E6E6",    //WHITE
"#FFFFCE",    //GREY
"#E6E6E6",      //WHITE   
"#FFFFCE",    //GREY
"#E6E6E6",   //Grey
"#FFFFCE",   //YELLOW
"#E6E6E6",   //WHITE
"#FFFFCE",   //GREY
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //GREY
"#FFFFCE",   //YELLOW
"#E6E6E6",   //Grey
"#FFFFCE",
"#E6E6E6",   //Grey
"#FFFFCE",   //YELLOW
"#E6E6E6",   //WHITE
"#FFFFCE",   //GREY
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //YELLOW
"#FFFFCE",   //YELLOW
"#E6E6E6",   //GREY
"#FFFFCE",   //YELLOW
"#E6E6E6",   //GREY
"#FFFFCE",   //GREY
"#E6E6E6",   //GREY

);   

$issue_date  = array (

"09/20/2018",
"10/04/2018",
"10/18/2018",
"11/01/2018",
"11/15/2018",
"11/29/2018",
"12/13/2018",
"12/27/2018",
"01/24/2019",
"02/07/2019",
"02/21/2019",
"03/07/2019",
"03/21/2019",
"04/04/2019",
"04/18/2019",
"05/02/2019",
"05/16/2019",
"05/30/2019",
"06/13/2019",
"06/27/2019",
"07/11/2019",
"07/25/2019",
"08/08/2019",
"08/22/2019",
"09/05/2019",
"09/19/2019",
"10/03/2019",
"10/17/2019",
"10/31/2019",
"11/14/2019",
"11/28/2019",
"12/12/2019",
"12/26/2019"


);

$title = array (

"<a href='http://response.diverseeducation.com/Academic' target='_blank'>Academic Kickoff</a>",
"<a href='http://response.diverseeducation.com/HispanicHeritage18' target='_blank'>Hispanic Heritage Month</a>",
"<a href='http://response.diverseeducation.com/RecruitmentRetentionCareers18' target='_blank'>Recruitment & Retention in Higher Education</a>",
"<a href='http://response.diverseeducation.com/Careers18' target='_blank'>Careers in Higher Education</a>",
"<a href='http://response.diverseeducation.com/NativeAmerican2018' target='_blank'>Native American Heritage Month</a>",
"<a href='http://response.diverseeducation.com/HealthScience2018' target='_blank'>Health Sciences</a>",
"<a href='http://response.diverseeducation.com/Top100Associates19' target='_blank'>Community Colleges - Top 100 Associate Degree Producers<a/>",
"<a href='http://response.diverseeducation.com/YearInReview2018' target='_blank'>Year in Review</a>",
"<a href='http://response.diverseeducation.com/EmergingScholars2018' target='_blank'>Emerging Scholars - 35th Anniversary Kickoff</a>",
"<a href='http://response.diverseeducation.com/BlackHistoryMonth2019' target='_blank'>Black History Month</a>",   
"<a href='http://response.diverseeducation.com/Nursing2019' target='_blank'>Nursing</a>",  
"<a href='http://response.diverseeducation.com/MPPWStudentAffairs19' target='_blank'>Most Promising Places to Work in Student Affairs</a>",
"<a href='http://response.diverseeducation.com/womenhistorymonth19' target='_blank'>Women's History Month</a>",
"<a href='http://response.diverseeducation.com/ArthurAsheJr19' target='_blank'>Arthur Ashe, Jr. Sports Scholars</a>",
"<a href='http://response.diverseeducation.com/champions2019' target='_blank'>Diverse Champions Tribute</a>",
"Asian American and Pacific Islander Heritage Month",
"Most Promising Places to Work in Community Colleges",
"Social Justice",
"LGBTQA Pride Month ",
"Retirement Perspectives & Tributes",
"Diverse 35th Anniversary Edition",
"STEM - Science, Technology, Engineering & Math",
"HBCUs - Historically Black Colleges & Universities",
"Top 100 Undergraduate & Graduate Degree Producers",
"Veteran Military Education",
"Academic Kickoff",
"Hispanic Heritage Month",
"Recruitment & Retention in Higher Education",
"Careers in Higher Education",
"Native American Heritage Month",
"Health Sciences",
"Community Colleges - Top 100 Associate Degree Producers",
"Year in Review"



);

$ad_deadline = array (



"08/30/2018",
"09/13/2018",
"09/27/2018",
"10/11/2018",
"10/25/2018",
"11/08/2018",
"*11/21/2018",
"12/06/2018",
"01/03/2019",
"01/17/2019",
"01/31/2019",
"02/14/2019",
"02/28/2019",
"03/14/2019",
"03/28/2019",
"04/11/2019",
"04/25/2019",
"05/09/2019",
"05/23/2019",
"06/06/2019",
"06/20/2019",
"07/04/2019",
"07/18/2019",
"08/01/2019",
"08/15/2019",
"08/29/2019",
"09/12/2019",
"09/26/2019",
"10/10/2019",
"10/24/2019",
"11/07/2019",
"*11/19/2019",
"12/05/2019"

);

$todays_date = date ("m/d/Y"); 

$today = strtotime($todays_date);


for($i=0; $i < count($issue_date); $i++)

{
if (strtotime($issue_date[$i]) >= $today)

{   

echo "<tr style=\"text-align: left;\" bgcolor=\"".$color[$i]."\"><td width='79' style='text-align:center';>
$issue_date[$i]</td><td width='480' style='padding-left:3px;'>$title[$i]</td><td width='83' style='text-align:center';>$ad_deadline[$i]</td></tr>";  
}

 
}

 ?>
 </table>



</div>
<br />
<!--
<div id="calendar-pdf"><a href="http://www.diverseeducation.com/ec/Editorial-Calendar-2017.pdf"><h3>Tap Here to see the Calendar</h3></a><br /><br />

</div>
-->

<style>

@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px)
 {     table { width: 100%;!important }
 }

</style>
