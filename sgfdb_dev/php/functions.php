<?php
// intent of this file is to house all common functions that all files can call on as needed.  see lpmj, pg 605. 
//have orignal group infor now, may add to over time.  see comments on bottom.

// dev prod switch
$appServer = 'prod'; //server switch var; 'dev' or 'prod', defaults to prod

if ($appServer == 'dev') {
	$baseServerPath = ''; //for dev- local host
}
else {
	$baseServerPath = '/home/sgfdbc5/public_html/'; //for prod- incorporate into functions
}

$appName = 'sgfdb';

//db access - DEV & PROD
if ($appServer == 'dev') {
	// DEV: db login data	
	$db_hostname = 'localhost';
	$db_database = 'lpmj_book';
	$db_username = 'lpmj_bookUrmd5';
	$db_password = '!9?.N378e@6)';
} else {
	//PROD: db login data on InMotion server; need to add security over time
   	$db_hostname = 'localhost';
 	$db_database = 'sgfdbc5_wmHist';
 	$db_username = 'sgfdbc5_scott';
 	$db_password = '8kv$Amg61';
}

// db connection - mysqli
$connection = new mysqli ($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

//create table
function createTable($name, $query) {
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists.<br>";
}

//basic query-  need to see how lpmj incorporates this function in sub files
function queryMysql($query) {
	global $connection;  //global is needed for mysqli methods- see lpmj pg 606
	$result = $connection->query($query);
	if (!$result) die ($connection->error);
	return $result;
}

//ends PHP session-  needs more detail on usage in lpmj chap 26
function destroySession() {
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');
	
	session_destroy();
}

//db- data entry security
function sanitizeString($var) {
	global $connection;
	$var = strip_tags($str);
	$var = htmlentities($var);
	$var = stripslashes($str);
	return $connection->real_escape_string($var);
}

// there is a showProfile() method in the lpmj book; pg 606; but probably wont use this 
//may add more generic usage functions as needed.

?>