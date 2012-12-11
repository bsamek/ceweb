<?php
/*
 * Creates instructor page
 */

// Ensure id is a number
if(isset($_GET['id']) and is_numeric($_GET['id'])) {

  // Get instructor data
  $row = mysql_fetch_array(mysql_query('SELECT * FROM instructor WHERE id = ' . $_GET['id']));
  
  // Picture
  $searchThis = 'pics/' . $_GET['id'] . '.*';
  $fileArray = glob($searchThis);
  if (array_key_exists(0, $fileArray)) {
	$fullFile = $fileArray[0];
	$fileParts = pathinfo($fullFile);
	$file = $fileParts['filename'] . '.' . $fileParts['extension'];
	echo '<img style="float:left;" src="pics/' . $file . '" />';
  }
	
  // Basic info (name, title, organization, email, website)
  echo '<p>';	
  echo '<strong>' . $row['firstname'] . ' ' . $row['lastname'] . '</strong>';
  echo '<br />';
  echo $row['title'];
  if($row['title']!='') echo '<br />';
  echo $row['organization'];
  if($row['organization']!='') echo '<br />';
  echo '<a href="mailto:';
  echo $row['email'];
  echo '">' . $row['email'];
  echo '</a>';
  if($row['email']!='') echo '<br />';
  echo '<a href="';
  echo $row['website'];
  echo '">' . $row['website'];
  echo '</a>';
  echo '</p>';
  
  // Bio
  echo '<p>';
  echo $row['longbio'];
  echo '</p>';
  
  // CV
  $id = $_GET['id'];
  $searchThis = 'cvs/' . $id . '.*';
  $fileArray = glob($searchThis);
  if (array_key_exists(0, $fileArray)) {
	$fullFile = $fileArray[0];
	$fileParts = pathinfo($fullFile);
	$file = $fileParts['filename'] . '.' . $fileParts['extension'];
	echo '<p><a href="cvs/' . $file . '">View instructor\'s CV</a></p>';
  }
  
  // Get workshops instructor is currently teaching
  $query = mysql_query('SELECT workshop.title, workshop.id, workshop.startdate 
  FROM teach, instructor, workshop 
  WHERE teach.instructor = instructor.id 
  AND teach.workshop = workshop.id 
  AND workshop.display = 1 
  AND teach.instructor = ' . $_GET['id'] . ' 
  ORDER BY startdate');

  // Print workshops
  if(mysql_num_rows($query) != 0) {
    echo '<p>Scheduled workshops:</p>';
    echo '<ul>';
    while ($subRow = mysql_fetch_array($query)) {
	    echo '<li>';
		echo '<a href="workshop?id=' . $subRow['id'] . '">';
		echo $subRow['title'];
		echo '</a>, ';
		$startdate = explode('-', $subRow['startdate']);
		echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
		echo '</li>';
	  }
  	echo '</ul>';
  }
  else echo '<p>' . $row['firstname'] . ' ' . $row['lastname'] . ' currently has no scheduled workshops.</p>';
}
?>

