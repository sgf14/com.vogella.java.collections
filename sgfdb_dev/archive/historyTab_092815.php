<?php
require_once '../functions.php'; //generic app functions; call on all files
// implements mysqli format

//this part needs to be refactored- I am duplicating what is already doen in the header.php file in order for same
// format to be displayed.  need to only call the files once and change the div class Content part

require_once '../../html/headTag.html';
// echo 	"<div class='appname'>$appName</div>";
// 		.	"<script src='webroot/js/app.js></script>";
echo "<link href='../../style/style.css' rel='stylesheet' type='text/css' >";

require_once '../../html/bodyHeaderTag.html';

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


require_once '../../html/bodyFooterTag.html';
// need menu presentation
// need back button
?>