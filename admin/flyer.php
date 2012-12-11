<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('flyer.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<title>Main Menu</title>
</head>
<body>

<p><a href="index.php">&laquo; Back</a></p>
<h2>Lists all workshops after today's date (does not include full workshops)</h2>
<?php 
include("connect.php");
$today = getdate();
$mysql_today = date('Y-m-d', mktime(0, 0, 0, $today['mon'], $today['mday'], $today['year']));
?>

<h3>Online (asynchronous)</h3>

<?php
$online = mysql_query("SELECT * FROM workshop WHERE display = 1 AND full = 0 AND location='online' AND startdate > '$mysql_today' ORDER BY startdate, title");
echo '<ul>';
while($i = mysql_fetch_array($online)) {
  echo '<li>';
  echo $i['title'];
  $date = $startdate = explode('-', $i['startdate']);
  echo ' - ';
  echo date('F', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '</li>';
}
echo '</ul>';
?>

<h3>Face to Face at Simmons (Boston campus)</h3>

<?php
$online = mysql_query("SELECT * FROM workshop WHERE display = 1 AND full = 0 AND location='simmons' AND startdate > '$mysql_today' ORDER BY startdate, title");
echo '<ul>';
while($i = mysql_fetch_array($online)) {
  echo '<li>';
  echo $i['title'];
  $date = $startdate = explode('-', $i['startdate']);
  echo ' - ';
  echo date('F j', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '</li>';
}
echo '</ul>';
?>

<h3>Face to Face at Simmons (Mount Holyoke campus)</h3>

<?php
$online = mysql_query("SELECT * FROM workshop WHERE display = 1 AND location='holyoke' AND startdate > '$mysql_today' ORDER BY startdate, title");
echo '<ul>';
while($i = mysql_fetch_array($online)) {
  echo '<li>';
  echo $i['title'];
  $date = $startdate = explode('-', $i['startdate']);
  echo ' - ';
  echo date('F j', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo '</li>';
}
echo '</ul>';
?>

</body>
</html>