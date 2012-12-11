<?php

// Add or subtract displayed workshops by adding or removing workshop ids from this array
$workshop_id_list = array(67, 49, 66, 68, 36, 69, 70, 71);

// Create "WHERE id = x OR id = y OR [...]" portion of SQL statement
$workshop_id_sql_temp = "";
foreach ($workshop_id_list as $each_workshop) {
	$workshop_id_sql_temp = $workshop_id_sql_temp . 'id = ' . $each_workshop . ' OR ';
}
$workshop_id_sql = substr($workshop_id_sql_temp, 0, -4); // Remove extraneous terminal "OR"

// Get workshops from database and display them
$result = mysql_query("SELECT * FROM workshop WHERE $workshop_id_sql ORDER BY title");
include('display.php');

?>