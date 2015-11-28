<?php
require_once 'functions.php';

// called from ajaxJqGet.js;

//if (isset($_POST['conditions'])) {
//	$conditions = sanitizeString($_POST['conditions']);
$result = queryMysql("SELECT * FROM history WHERE 0 = 0 ORDER BY history_id");
$num = $result->num_rows;

for ($j = 0; $j < $num ; ++$j) {
	$row = $result->fetch_array(MYSQLI_ASSOC);
	echo 'History ID: ' . $row['history_id'] . '<br>';
	echo 'Title: ' . $row['title'] . '<br>'.'<br>';
}
//}
?>