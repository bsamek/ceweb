<?php

echo '<h3>Categories:</h3>';

// List categories
$category = mysql_query("SELECT * FROM workshop WHERE display = 1 GROUP BY category");
while($i = mysql_fetch_array($category)) {
  echo '<a class="lineheight" href="#';
  echo $i['category'];
  echo '">';
  echo $i['category'];
  echo '</a>';
  echo '<br />';
}

echo '<h3>Workshops:</h3>';

// List categories with associated workshops
$category = mysql_query("SELECT * FROM workshop WHERE display = 1 GROUP BY category");
while($i = mysql_fetch_array($category)) {
  echo '<h4 id="';
  echo $i['category'];
  echo '">';
  echo $i['category'];
  echo '</h4>';
  $currentCategory = mysql_real_escape_string($i['category']);

  $result = mysql_query("SELECT * FROM workshop WHERE display = 1 AND category = '$currentCategory' ORDER BY startdate");
  include('display.php');
}
?>