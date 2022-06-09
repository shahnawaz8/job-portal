<?php
	require 'Libs/config.php';
session_start();
if(!isset($_SESSION['islogin'])){
	header('Location: index.php');
exit;
}

	include 'Libs/header.php';
	
	if(isset($_GET['i'])&&isset($_GET['back'])):
	
	$jobID = $_GET['i'];
	$goBack = $_GET['back'];
	
	mysqli_query($dbCon ,"DELETE FROM jobs WHERE id=".$jobID);
	
		header("Location: ".$goBack.".php");
	
	else:
	
		header("Location: dashboard.php");
	
	endif;
	
?>