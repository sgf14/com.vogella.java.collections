<?php
require_once 'functions.php';

echo "<h3>Etymology</h3>";

//if (isset($_POST['conditions'])) {
//	$conditions = sanitizeString($_POST['conditions']);
	$result = queryMysql("SELECT word FROM etymology WHERE 0 = 0 ORDER BY etymology_id");
	$num = $result->num_rows;

	for ($j = 0; $j < $num ; ++$j) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo 'Word: ' . $row['word'] . '<br>';
	}
//}
?>