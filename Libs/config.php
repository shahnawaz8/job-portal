<?php

/* Website Configuration Options*/

$databaseName = "Jobportal";
$databaseUser = "root";
$databasePass = "";
$databaseHost = "localhost";


$websiteBase = "http://localhost/Job_Portal/"; // please do not add '/' on the last dir
$websiteName = "Job Portal";

global $websiteBase;
global $websiteName;





/*********************************************************/
/*********************************************************/
/***	PLEASE DO NOT EDIT BELOW THIS LINE             ***/
/*********************************************************/
/*********************************************************/

$dbCon = mysqli_connect($databaseHost,$databaseUser,$databasePass,$databaseName);
if($dbCon){
		 
	 
	}else{
	print "<h1>Error: Database Connection Issue...</h1>";
exit;
}
?>