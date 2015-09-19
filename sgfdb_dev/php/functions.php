<?php
/*
 * PROD: db login data on server; need to add security over time
 */
/*   $db_hostname = 'localhost';
 $db_database = 'sgfdbc5_wmHist';
 $db_username = 'sgfdbc5_scott';
 $db_password = '8kv$Amg61';
 */


/*
 * DEV: db login data -comment out for deployment to PROD
 */

$db_hostname = 'localhost';
$db_database = 'lpmj_book';
$db_username = 'lpmj_bookUrmd5';
$db_password = '!9?.N378e@6)';

// db connection - mysqli
$connection = new mysqli ($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

//create table
function createTable($name, $query) {
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query) {
	global $connection;  //global is needed for mysqli methods- see lpmj pg 606
	$result = $connection->query($query);
	if (!$result) die ($connection->error);
	return $result;
}

function destroySession() {
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');
	
	session_destroy();
}

function sanitizeString($var) {
	global $connection;
	$var = strip_tags($str);
	$var = htmlentities($var);
	$var = stripcslashes($str);
	return $connection->real_escape_string($var);
}

// there is a showProfile() method in the lpmj book; pg 606; but probably wont use this 
//may add more generic usage functions as needed.

?>