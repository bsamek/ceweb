<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('categories.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="webapp.css" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
<title>Workshop Categories</title>
</head>

<body>
<p><a href="index.php">&laquo; Back</a></p>
<?php
include("connect.php");

// Create new workshop category
if(isset($_POST['submitnewworkshopcategory'])){
   
   $newworkshopcategory = $_POST['newworkshopcategory'];
   $query = "INSERT INTO workshopcategory (category) VALUES ('$newworkshopcategory')";
   mysql_query($query);

}

// Delete selected workshop category
if(isset($_POST['submitdeleteworkshopcategory'])){

	$deleteworkshopcategory = $_POST['deleteworkshopcategory'];
	$query = "DELETE FROM workshopcategory WHERE category='$deleteworkshopcategory'";
	mysql_query($query);

}

?>

<form class="form" action="categories.php" method="post">
<table>
<tr><td colspan="2">New workshop category:</td></tr>
<tr><td><input type="text" name="newworkshopcategory" /></td>
<td><input type="submit" name="submitnewworkshopcategory" value="Submit New" /></td>
</tr>
<tr><td colspan="2">Delete workshop category:</td></tr>
<tr><td><select name="deleteworkshopcategory">
<option value="default">Select a category:</option>

<?php
// List workshop categories
$result = mysql_query("SELECT * FROM workshopcategory ORDER BY category");
while($row = mysql_fetch_array($result))
  {
  echo '<option value="' . $row['category'] . '">';
  echo $row['category'];
  echo '</option>';
  }
?>
</select></td>
<td><input type="submit" name="submitdeleteworkshopcategory" value="Delete" /></td></tr>
</table>
</form>

<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="logout.php">Log out.</a></p>
</body>
</html>
