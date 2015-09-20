<?php
if ($appServer == 'dev') { //must be == to compare
	/*
	 * DEV: db login data -comment out for deployment to PROD
	 */
	
	$db_hostname = 'localhost';
	$db_database = 'lpmj_book';
	$db_username = 'lpmj_bookUrmd5';
	$db_password = '!9?.N378e@6)';
	
} else {
/*
 * PROD: db login data on server; need to add security over time
 */
    $db_hostname = 'localhost';
    $db_database = 'sgfdbc5_wmHist';
    $db_username = 'sgfdbc5_scott';
    $db_password = '8kv$Amg61';
    
}    
    
 
?>
