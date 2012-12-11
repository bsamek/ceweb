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
				{ "bSortable": true, 'sType': 'date' },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false, 'bSearchable': false },
				{ "bSortable": false, 'bSearchable': false },
				{ "bSortable": false, 'bSearchable': false },
				{ "bSortable": false, 'bSearchable': false }
			],
			"sPaginationType": "full_numbers"
		} );
	} );
</script>
<title>List Workshops</title>
</head>

<body>

<p><a href="../index.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
<p><a href="new.php">Create a new workshop &raquo;</a></p>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"> 
	<thead> 
		<tr> 
			<th>Workshop</th> 
			<th>Location</th> 
			<th>Start Date</th>
			<th>Start Time</th>
			<th>End Date</th>
			<th>End Time</th>
			<th>Preview</th> 
			<th>Edit</th>
			<th>Hide</th>
			<th>Delete</th>
		</tr> 
	</thead> 
	
	<tbody> 

<?php

include("../connect.php");

// Formats list of workshops alphabetically by title
$result = mysql_query("SELECT * FROM workshop ORDER BY title, startdate");
while($row = mysql_fetch_array($result)) {
  echo '<tr>';
  echo '<td>' . $row['title'] . '</td>';
  echo '<td>' . $row['location'] . '</td>';
  
	// Set date variables
	$startdate = explode('-', $row['startdate']); $enddate = explode('-', $row['enddate']);
  	$starttime = explode(':', $row['starttime']); $endtime = explode(':', $row['endtime']);
  	
  	// Render dates and times
	echo '<td>' . date('F j, Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
	
	if ($row['starttime'] != '00:00:00')
  		echo '</td><td>' . date('g:ia', mktime($starttime[0], $starttime[1], 0, 0, 0, 0));
  	else
  		echo '</td><td>&nbsp;';
  	
  	echo '</td><td>' . date('F j, Y', mktime(0, 0, 0, $enddate[1], $enddate[2], $enddate[0]));
  	
  	if ($row['endtime'] != '00:00:00')
		echo '</td><td>' . date('g:ia', mktime($endtime[0], $endtime[1], 0, 0, 0, 0));
	else
  		echo '</td><td>&nbsp;';
		
	echo '</td>';
  
  // Create preview, edit, hide/unhide, and delete buttons
  echo '<td>' . '<a href="preview.php?id=' . $row['id'] . '">Preview</a></td>';
  echo '<td>' . '<a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
  
  if ($row['display'] == 1) {
    echo '<td>' . '<a href="hide.php?id=' . $row['id'] . '&amp;action=hide' . '">Hide</a> </td>';
  }
  else {
    echo '<td>' . '<a href="hide.php?id=' . $row['id'] . '&amp;action=unhide' . '">Unhide</a> </td>';
  }
  echo '<td><a href="delete.php?id=' . $row['id'] . '"' . 'onclick="return confirm' . "('Are you sure you want to delete this workshop?  You can hide the workshop instead in order to retain the data in the database.');" . '"' . '>Delete</a></td></tr>';
}
?>

	</tbody>
</table>
</body>
</html>
