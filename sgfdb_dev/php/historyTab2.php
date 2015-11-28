<?php
require_once 'functions.php';

echo "<h3>History</h3>";

//if (isset($_POST['conditions'])) {
//	$conditions = sanitizeString($_POST['conditions']);
	$result = queryMysql("SELECT title FROM history WHERE 0 = 0 ORDER BY history_id");
	$num = $result->num_rows;

	for ($j = 0; $j < $num ; ++$j) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo 'Title: ' . $row['title'] . '<br>';
	}
//}
?>