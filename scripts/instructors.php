<?php
/*
 * Prints list of ALL instructors regardless of
 * current workshops. Contrast with php/byinstructor.php,
 * which prints list of instructors with current
 * workshops and includes brief display of workshops.
 */

$instructor = mysql_query(
"SELECT firstname, lastname, instructor.id AS id 
FROM instructor 
ORDER BY lastname, firstname");

while($i = mysql_fetch_array($instructor)) {
  $instructorID = $i['id'];
  echo '<a class="lineheight" href="instructor.php?id=' . $i['id'] . '">';
  echo $i['firstname'] . ' ' . $i['lastname'];
  echo '<br />';
  echo '</a>';
}