<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('cv.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>Upload an Instructor CV</title>
</head>

<body>

<?php
include("../connect.php");
$id = $_GET['id'];

// Locate current CV
$searchThis = '../../cvs/' . $id . '.*';
$fileArray = glob($searchThis);
if (array_key_exists(0, $fileArray)) {
	$fullFile = $fileArray[0];
	$fileParts = pathinfo($fullFile);
	$file = $fileParts['filename'] . '.' . $fileParts['extension'];
}

// Upload new picture on user click Submit
if(isset($_POST['submit'])){
	
	// Check if file is selected
	if($_FILES['cv']['name'] == "") {
		echo '<p style="color:red; font-weight:bold;">No file selected</p>';
	}
	
	else {
		// Delete current file
		if (isset($file)) unlink('../../cvs/' . $file);
		
		// Upload new file
		$pathParts = pathinfo($_FILES['cv']['name']);
		if (isset($pathParts['extension'])) {
			$ext = $pathParts['extension'];
			if ($ext == "doc" || $ext == "docx" || $ext == "rtf" || $ext == "pdf" || $ext == "jpg") {
				$cvName = "../../cvs/" . $id . '.' . $ext;
				move_uploaded_file($_FILES["cv"]["tmp_name"], 
				$cvName);
				chmod($cvName, 0660); 
				chgrp($cvName, "gslis_ce_alanis");
				echo '<p style="color:red; font-weight:bold;">File uploaded</p>';
			}
			else echo '<p style="color:red; font-weight:bold;">Invalid cv file type.</p>'; 	
		}	
	}
}

// Delete CV on user click Delete button
if(isset($_POST['delete'])){
	if (isset($file)) {
		unlink('../../cvs/' . $file);
		echo '<p style="color:red; font-weight:bold;">File deleted</p>';
	}
	else echo '<p style="color:red; font-weight:bold;">No file exists to delete</p>';
}

?>

<form action=<?php echo 'cv.php?id=' . $id ?> method="post" enctype="multipart/form-data">
	<input name="delete" value="Delete current CV" type="submit" onclick="return confirm('Are you sure you want to delete this CV?');" /><br /><br />
	<input name="cv" id="cv" type="file" /><br />
	<input name="submit" value="Submit new CV" type="submit" />
</form>



<p><a href="list.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>
