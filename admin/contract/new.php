<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('new.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>New Workshop</title>
</head>

<body>
<?php include("../connect.php");

// Create new workshop/instructor link
if(isset($_POST['submit'])){
  mysql_query("INSERT INTO teach (instructor, workshop) VALUES ('$_POST[instructor]', '$_POST[workshop]')");
  echo '<p style="color:red; font-weight:bold;">Link submitted.</p>';
}
?>
<p><a href="list.php">&laquo; Back</a></p>
<div class="form">
<form action="new.php" method="post">

<select name="instructor">
<?php

// List instructors for drop down menu
$result = mysql_query("SELECT * FROM instructor ORDER BY lastname, firstname");
while($row = mysql_fetch_array($result)) {
  echo '<option value="' . $row['id'] . '">';
  echo $row['firstname'] . ' ' . $row['lastname'];
  echo '</option>';
}
?>
</select>
<br />
<select name="workshop">
<?php

// List workshops for drop down menu
$result = mysql_query("SELECT * FROM workshop ORDER BY title, startdate");
while($row = mysql_fetch_array($result)) {
  $startdate = explode('-', $row['startdate']);
  echo '<option value="' . $row['id'] . '">';
  echo $row['title'];
  echo ', ';
  echo date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0]));
  echo ' ';
  echo $row['location'];
  echo '</option>';
}
?>
</select>
<br />
<input type="submit" name="submit" value="Submit" />

</form>
</div>
<p><a href="list.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>
