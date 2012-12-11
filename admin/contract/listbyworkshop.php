<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('listbyworkshop.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>List Contracts</title>
</head>

<body>

<p><a href="../index.php">&laquo; Back</a></p>
<p>Arrange workshops alphabetically <a href="list.php">by instructor</a>.</p>
<p><a href="new.php">Create a new link &raquo;</a></p>
<div class="list">
<table>
<?php
include("../connect.php");

// List workshop/instructor links alphabetically by workshop
$result = mysql_query("SELECT teach.id, instructor.firstname AS first, instructor.lastname AS last, workshop.title AS workshop, workshop.startdate AS startdate, workshop.location AS location FROM instructor, teach, workshop WHERE instructor.id = teach.instructor AND workshop.id = teach.workshop ORDER BY workshop, workshop.startdate");
while($row = mysql_fetch_array($result)) {
  $startdate = explode('-', $row['startdate']);
  echo '<tr>';
  echo '<td>' . $row['first'] . ' ' . $row['last'] . '</td>';
  echo '<td>' . $row['workshop'];
  echo ', ';
  echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo ' ';
  echo $row['location'] . '</td>';
  echo '<td><a href="delete.php?id=' . $row['id'] . '"' . 'onclick="return confirm' . "('Are you sure?');" . '"' . '>Delete</a></td></tr>';
}

?>
</table>

<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>