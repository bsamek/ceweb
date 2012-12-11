<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('delete.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>Delete Instructor</title>
</head>

<body>

<?php

include("../connect.php");

// Delete selected workshop
if(isset($_GET['id'])) {
	$workshop = mysql_fetch_array(mysql_query('SELECT * FROM workshop WHERE id = ' . $_GET['id']));
	mysql_query('DELETE FROM workshop WHERE id = ' . $_GET['id']);
	echo '<p>This workshop has been deleted.</p>';
}

?>
<p><a href="list.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>