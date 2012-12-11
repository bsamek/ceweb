<?php
/* 
 * Formats the brief workshop display used in all 
 * workshop lists. Iterates over the $result variable 
 * set at the end of the code for a workshop list. 
 * (See php/date.php for an example.)
 */

echo '<ul>';
while($row = mysql_fetch_array($result)) {

  // Set date and link variables
  $startdate = explode('-', $row['startdate']); $enddate = explode('-', $row['enddate']);
  $starttime = explode(':', $row['starttime']); $endtime = explode(':', $row['endtime']);
  $workshopLink = 'workshop.php?id=' . $row['id'];
  
  echo '<li>';
  
  // New workshop image
  if ($row['new'] == 1) echo '<img style="border-width:0px; padding:0px; margin:0px;" src="i/new.png">';
  
  // Long workshop description
  echo '<a href="' . $workshopLink . '">' . '<strong>' . $row['title'] . '</strong>' . '</a>';
  
  // Location
  if ($row['location'] == 'online') echo ' (Online)';
  elseif ($row['location'] == 'simmons') echo ' (Boston)';
  elseif ($row['location'] == 'holyoke') echo ' (Mount Holyoke)';
  
  // Price
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
  
  // Additional text
  if (!empty($row['additionaltext'])) echo '<br />' . $row['additionaltext'];
  
  echo '</li>';
}
echo '</ul>';
?>