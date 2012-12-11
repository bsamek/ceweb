<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('hide.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>Toggle Workshop Display</title>
</head>

<body>

<?php

include("../connect.php");

// Set display variable to hide/unhide workshop
if ($_GET['action'] == 'hide') {
  mysql_query("UPDATE workshop SET display=0 WHERE id='$_GET[id]'");
  echo '<p>This workshop will no longer appear on the website.</p>';
}
else {
  mysql_query("UPDATE workshop SET display=1 WHERE id='$_GET[id]'");
  echo '<p>This workshop will now be displayed on the website.</p>';
}
?>
<p><a href="list.php">&laquo; Back</a></p>

<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>