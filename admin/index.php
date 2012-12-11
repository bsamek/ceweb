<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('index.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
<title>Main Menu</title>
</head>
<body>
<h3>Database Access</h3>
<ul>
	<li><a href="instructor/list.php">Instructors</a></li>
	<li><a href="workshop/list.php">Workshops</a></li>
	<li><a href="contract/list.php">Link Workshops and Instructors</a></li>
	<li><a href="categories.php">Workshop Categories</a></li>
</ul>

<h3>Tools</h3>
<ul>
	<li><a href="flyer.php">Workshop List for Flyer</a></li>
</ul>

<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="logout.php">Log out.</a></p>
</body>
</html>