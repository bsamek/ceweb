<?php

echo '<h3>Instructors:</h3>';

// List instructors
$instructor = mysql_query("SELECT firstname, lastname, instructor.id AS id FROM teach, instructor, workshop WHERE teach.instructor = instructor.id AND teach.workshop = workshop.id AND workshop.display = 1 GROUP BY firstname, lastname ORDER BY lastname, firstname");
while($i = mysql_fetch_array($instructor)) {
  $instructorID = $i['id'];
  echo '<a class="lineheight" href="#' . $i['id'] . '">';
  echo $i['firstname'] . ' ' . $i['lastname'];
  echo '<br />';
  echo '</a>';
}

echo '<h3>Workshops:</h3>';

// List instructors with associated workshops 
$instructor = mysql_query("SELECT firstname, lastname, instructor.id AS id FROM teach, instructor, workshop WHERE teach.instructor = instructor.id AND teach.workshop = workshop.id AND workshop.display = 1 GROUP BY firstname, lastname ORDER BY lastname, firstname");
while($i = mysql_fetch_array($instructor)) {
  $instructorID = $i['id'];
  echo '<h4 id="' . $instructorID . '"><a href="instructor.php?id=' . $i['id'] . '">';
  echo $i['firstname'] . ' ' . $i['lastname'] . ':';
  echo '</a></h4>';
	
  $result = mysql_query("SELECT * FROM teach, workshop WHERE workshop.display = 1 AND teach.instructor = $instructorID AND teach.workshop = workshop.id ORDER BY startdate, title");
  include('display.php');
}
?>