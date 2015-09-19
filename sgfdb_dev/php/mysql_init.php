<?php
/*
initial test- to be overwritten by mysqli version
 */
require_once $baseServerPath . 'php/sql/login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die ("Unable to connect to mySQL: " . mysql_error());

mysql_select_db($db_database)
or die("Unable to select database: " . mysql_error());

//table
$queryDesc = "DESCRIBE dogs";
$resultDesc = mysql_query($queryDesc);
if (!$resultDesc) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($resultDesc);

echo "<table>
        <tr>
            <th>Column</th>
            <th>Type</th>
            <th>Null</th>
            <th>Key</th>
        </tr>
            ";
for ($j = 0; $j < $rows; ++$j) {
	$row = mysql_fetch_row($resultDesc);
	echo "<tr>";
	for ($k = 0; $k < 4 ; ++$k)
		echo "<td>$row[$k]</td>";
	echo "</tr>";
}

echo "</table>";

//data
$query = "SELECT * FROM dogs";
$result = mysql_query($query);

$rows = mysql_num_rows($result);

if (!$result) die ("Database access failed: " . mysql_error());

for ($j = 0; $j < $rows; ++$j) {
	echo 'Name: ' . mysql_result($result,$j,'name') . '<br>';
}



?>