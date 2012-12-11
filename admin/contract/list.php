<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('list.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<style type="text/css" title="currentStyle"> 
			@import "../datatables/media/css/demo_page.css";
			@import "../datatables/media/css/demo_table.css";
</style> 
<script type="text/javascript" language="javascript" src="../datatables/media/js/jquery.js"></script> 
<script type="text/javascript" language="javascript" src="../datatables/media/js/jquery.dataTables.js"></script> 
<script type="text/javascript" charset="utf-8"> 
	$(document).ready(function() {
		$('#example').dataTable( {
			'bSort': true,
			"aoColumns": [
				null,
				null,
				null,
				{ "bSortable": false, 'bSearchable': false }
			],
			"sPaginationType": "full_numbers"
		} );
	} );
</script>
<title>List Contracts</title>
</head>

<body>

<p><a href="../index.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
<p><a href="new.php">Create a new contract &raquo;</a></p>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"> 
	<thead> 
		<tr> 
			<th>First Name</th>
			<th>Last Name</th> 
			<th>Workshop</th>
			<th>Delete</th>
		</tr> 
	</thead> 
	
	<tbody> 

<?php
include("../connect.php");

// List workshop/instructor links
$result = mysql_query("SELECT teach.id, instructor.firstname AS first, instructor.lastname AS last, workshop.title AS workshop, workshop.startdate AS startdate, workshop.location AS location FROM instructor, teach, workshop WHERE instructor.id = teach.instructor AND workshop.id = teach.workshop ORDER BY instructor.lastname, instructor.firstname, workshop.startdate");
while($row = mysql_fetch_array($result)) {
  $startdate = explode('-', $row['startdate']);
  echo '<tr>';
  echo '<td>' . $row['first'] . '</td>';
  echo '<td>' . $row['last'] . '</td>';
  echo '<td>' . $row['workshop'];
  echo ', ';
  echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo ' ';
  echo $row['location'] . '</td>';
  echo '<td><a href="delete.php?id=' . $row['id'] . '"' . 'onclick="return confirm' . "('Are you sure?');" . '"' . '>Delete</a></td></tr>';
}

?>

	</tbody>
</table>
</body>
</html>