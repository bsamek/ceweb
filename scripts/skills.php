<?php

$intro = <<<HEREDOC
<p>The library and information science profession is constantly
changing. We offer you workshops to ensure
your skills are up to date and keep you competitive in today's job market.
These workshops include new topics in technology, information
organization, and research. Update your skills today!</p>
HEREDOC;
echo $intro;

// Add or subtract displayed workshops by adding or removing workshop ids from this array
$workshop_id_list = array(59, 58, 15, 62, 63, 42, 7, 60, 55, 51, 6);

// Create "WHERE id = x OR id = y OR [...]" portion of SQL statement
$workshop_id_sql_temp = "";
foreach ($workshop_id_list as $id) {
	$workshop_id_sql_temp = $workshop_id_sql_temp . 'id = ' . $id . ' OR ';
}
$workshop_id_sql = substr($workshop_id_sql_temp, 0, -4); // Remove extraneous terminal "OR"

// Get workshops from database and display them
$result = mysql_query("SELECT * FROM workshop WHERE $workshop_id_sql ORDER BY title");
include('display.php');

?>