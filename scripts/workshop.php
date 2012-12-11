<?php
/*
 * Displays info on a single workshop referred to by $_GET['id'] variable
 */

// Ensure id is a number
if(isset($_GET['id']) and is_numeric($_GET['id'])) {
	
  // Get workshop data
  $query = mysql_query('SELECT * FROM workshop WHERE id = ' . $_GET['id']);
  $row = mysql_fetch_array($query);
  
  // Ensure id refers to a workshop
  if(mysql_num_rows($query) == 1) {
  	
  	  // Set date variables
	  $startdate = explode('-', $row['startdate']); $enddate = explode('-', $row['enddate']);
	  $starttime = explode(':', $row['starttime']); $endtime = explode(':', $row['endtime']);
	  
	  // Basic workshop info (title, location, pricing)
	  echo '<h3>' . $row['title'] . '</h3>';
	  echo '<p>';
	  echo 'Location: ';
	  if ($row['location'] == 'online') echo 'Online';
      elseif ($row['location'] == 'simmons') echo 'Boston';
      elseif ($row['location'] == 'holyoke') echo 'Mount Holyoke';
      echo '<br />';
	  echo '$' . $row['regularprice'];
	  echo ' (Simmons GSLIS Alumni Price $' . $row['alumniprice'] . ')';
	  
	  echo '<br />';

	  // Cross out date for postponed, canceled, and full workshops (see below for </strike>)
	  if ($row['postpone'] == 1 || $row['cancel'] == 1 || $row['full'] == 1) echo '<strike>';
	  
	  // Date
	  echo date('F j', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
	  if ($row['startdate'] == $row['enddate']) {
	  	echo ', ';
		echo date('Y, g:ia', mktime($starttime[0], $starttime[1], 0, $startdate[1], $startdate[2], $startdate[0]));
		echo ' - ';
		echo date('g:ia', mktime($endtime[0], $endtime[1], 0, 0, 0, 0));
	  }
	  else {
	  	echo ' - ';
	    echo date('F j, Y', mktime(0, 0, 0, $enddate[1], $enddate[2], $enddate[0]));
	  }
	  
	  // PDPs
	  $pdp = $row['pdp'];
	  echo ' - PDPs: ' . $pdp;	
	  
	  // Cross out date for postponed, canceled, and full workshops (see above for <strike>)
	  if ($row['postpone'] == 1 || $row['cancel'] == 1 || $row['full'] == 1) echo '</strike>';
	  
	  // Print Postponed, Canceled, or Session Full
	  if ($row['postpone'] == 1) echo " Postponed";
	  elseif ($row['cancel'] == 1) echo " Canceled";
	  elseif ($row['full'] == 1) echo " Session Full";
	  
	  echo '</p>';
	  
	  echo '<p>' . $row['additionaltext'] . '</p>';
	  
	  // Workshop preview
	  $id = $_GET['id'];
	  $searchThis = 'previews/' . $id . '.*';
	  $fileArray = glob($searchThis);
	  if (array_key_exists(0, $fileArray)) {
		$fullFile = $fileArray[0];
		$fileParts = pathinfo($fullFile);
		$file = $fileParts['filename'] . '.' . $fileParts['extension'];
		echo '<p><a href="previews/' . $file . '">Preview this workshop here.</a></p>';
	  }
	  
	  // Workshop description
	  echo $row['description'];
	  
	  // Instructors
	  $teach = mysql_query('SELECT * FROM teach WHERE workshop = ' . $_GET['id']);
	  while($row = mysql_fetch_array($teach)) {
	    $instructor = mysql_query('SELECT * FROM instructor WHERE id = ' . $row['instructor']);
	    while($subRow = mysql_fetch_array($instructor)) {
	      echo '<p>';
		  echo '<a href="' . 'instructor.php?id=' . $subRow['id'] . '">';
		  echo $subRow['firstname'] . ' ' . $subRow['lastname'] . '</a>';
          echo ': ';
		  echo $subRow['shortbio'];
		  echo '</p>';
	    }
	  }
  }
}
?>