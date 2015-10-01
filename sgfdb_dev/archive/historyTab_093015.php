<?php
require_once '../functions.php'; //generic app functions; call on all files
// implements mysqli format
require_once '../header.php';
echo <<<_END
<main>
		<div class="container">
				<div class = "tabs">
					<a href = "../../index.php"><span class="active">Main</span></a>
					<a href = "historyTab.php"><span>History</span></a>
					<a href = ""><span>Etymology</span></a>
					<a href = ""><span>Math/Sci</span></a>
					<a href = ""><span>Coding</span></a>
				</div>
				<div class = "content">
_END;
echo "<h3>History</h3>"; 

$result = queryMysql("SELECT title FROM history ORDER BY history_id");
$num = $result->num_rows;

for ($j = 0; $j < $num ; ++$j) {
	$row = $result->fetch_array(MYSQLI_ASSOC);
	echo 'Title: ' . $row['title'] . '<br>';

}
echo <<<_END
				</div>
		</div>
</main>
_END;

?>