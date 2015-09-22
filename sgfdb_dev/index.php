<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>sgfdb</title>
		<link href="style/reset.css" rel="stylesheet" type="text/css" >
		<link href="style/style.css" rel="stylesheet" type="text/css" >
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	</head>
	<body>
<!-- 	lpmj inserts the html canvas here- more research needed -->
<?php 
$appServer = 'dev'; //server switch var; 'dev' or 'prod', defaults to prod

if ($appServer == 'dev') {  
	$baseServerPath = ''; //for dev- local host
}
else {
	$baseServerPath = '/home/sgfdbc5/public_html/'; //for prod- incorporate into functions
}
require_once 'php/header.php';
/* echo "<br><span class='main'>Welcome to $appName,"
		."</span><br><br>"; */
?>

	</body>	
</html>

