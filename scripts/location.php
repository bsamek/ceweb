<?php

echo '<h3>Locations:</h3>';

// List locations
$location = mysql_query("SELECT * FROM workshop WHERE display = 1 GROUP BY location");
while($i = mysql_fetch_array($location)) {
  echo '<a class="lineheight" href="#';
  echo ucfirst($i['location']);
  echo '">';
  if ($i['location'] == 'online') echo 'Online';
  elseif ($i['location'] == 'simmons') echo 'Boston';
  elseif ($i['location'] == 'holyoke') echo 'Mount Holyoke';
  echo '</a>';
  echo '<br />';
}

echo '<h3>Workshops:</h3>';

// List locations with associated workshops
$location = mysql_query("SELECT * FROM workshop WHERE display = 1 GROUP BY location");
while($i = mysql_fetch_array($location)) {
  echo '<h4 id="';
  echo ucfirst($i['location']);
  echo '">';
  if ($i['location'] == 'online') echo 'Online';
  elseif ($i['location'] == 'simmons') echo 'Boston';
  elseif ($i['location'] == 'holyoke') echo 'Mount Holyoke';
  echo '</h4>';
  $currentLocation = $i['location'];

  $result = mysql_query("SELECT * FROM workshop WHERE display = 1 AND location = '$currentLocation' ORDER BY startdate, title");
  include('display.php');
}
?>