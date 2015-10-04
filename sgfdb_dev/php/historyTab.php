<?php
require_once 'functions.php'; //generic app functions; call on all files
// implements mysqli format
// require_once 'header.php';  //this the ways its listed in the book, but doenst work unless all file sin same folder

echo 	"<div class='appname'>$appName</div>";
require_once '../html/headTagSub.html';
require_once '../html/bodyHeaderTag.html';
require_once 'bodyMainTagsSub.php';

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
require_once '../html/bodyFooterTag.html';
?>