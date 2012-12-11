<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('preview.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>Upload a Preview</title>
</head>

<body>

<?php
include("../connect.php");
$id = $_GET['id'];

// Locate current preview
$searchThis = '../../previews/' . $id . '.*';
$fileArray = glob($searchThis);
if (array_key_exists(0, $fileArray)) {
	$fullFile = $fileArray[0];
	$fileParts = pathinfo($fullFile);
	$file = $fileParts['filename'] . '.' . $fileParts['extension'];
}

// Upload new preview on user click Submit
if(isset($_POST['submit'])){
	
	// Check if a file is selected
	if($_FILES['preview']['name'] == "") {
		echo '<p style="color:red; font-weight:bold;">No file selected</p>';
	}
	
	else {
		$pathParts = pathinfo($_FILES['preview']['name']);
		
		// Delete current file if exists
		if (isset($file)) unlink('../../previews/' . $file);
		
		// Upload new file
		if (isset($pathParts['extension'])) {
			$ext = $pathParts['extension'];
			if ($ext == "doc" || $ext == "docx" || $ext == "rtf" || $ext == "pdf" || $ext == "jpg" || $ext == "gif") {
				$previewName = "../../previews/" . $id . '.' . $ext;
				move_uploaded_file($_FILES["preview"]["tmp_name"], 
				$previewName);
				chmod($previewName, 0660); 
				chgrp($previewName, "gslis_ce_alanis");
				echo '<p style="color:red; font-weight:bold;">File uploaded</p>';
			}
			else echo '<p style="color:red; font-weight:bold;">Invalid preview file type.</p>'; 
		}		
	}
}

// Delete preview on user click Delete
if(isset($_POST['delete'])){
  if (isset($file)) {
	unlink('../../previews/' . $file);
    echo '<p style="color:red; font-weight:bold;">File deleted</p>';
  }
  else echo '<p style="color:red; font-weight:bold;">No file exists to delete</p>';
}
?>

<form action=<?php echo 'preview.php?id=' . $id ?> method="post" enctype="multipart/form-data">
	<input name="delete" value="Delete current preview" type="submit" onclick="return confirm('Are you sure you want to delete this file?');" /><br /><br />
	<input name="preview" id="preview" type="file" /><br />
	<input name="submit" value="Upload new preview" type="submit" />
</form>

<p><a href="list.php">&laquo; Back</a></p>
<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
</body>
</html>
