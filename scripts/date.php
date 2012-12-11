<?php

$intro = <<<HEREDOC
<p>We offer more than 35 full-day, evening, and weekend workshops 
each semester at our Boston and Mount Holyoke campuses, online, and elsewhere throughout 
New England. Our workshops are scheduled on weekends or online for the convenience of 
practicing librarians and other professionals. Our online workshops are 
<a href="http://alanis.simmons.edu/ceweb/faq.php#online">asynchronous</a>,
which means that you can log in at your conveience, though it helps to log in 
regularly to keep up with the flow of the workshop.</p>

<p>Sort workshops by date, category, instructor, or location using the right menu.</p>
HEREDOC;
echo $intro;

echo '<h3>Dates:</h3>';

// List dates
$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE display = 1 GROUP BY month, year ORDER BY year, month");
while($i = mysql_fetch_array($date)) {
  $startdate = explode('-', $i['startdate']);
  echo '<a class="lineheight" href="#';
  echo date('FY', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '">';
  echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '</a>';
  echo '<br />';
}

echo '<h3>Workshops:</h3>';

// List dates with associated workshops
$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE display = 1 GROUP BY month, year ORDER BY year, month");
while($i = mysql_fetch_array($date)) {
  $currentDate = $i['startdate'];
  $startdate = explode('-', $i['startdate']);
  echo '<h4 id="';
  echo date('FY', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '">';
  echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '</h4>';

  $currentMonth = date('n', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  $currentYear = date('Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  $result = mysql_query("SELECT * FROM workshop WHERE display = 1 AND MONTH(startdate) = '$currentMonth' AND YEAR(startdate) = '$currentYear' ORDER BY title");
  include('display.php');
}
?>