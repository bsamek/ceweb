<?php

// Contains autoloader config, etc
include('boilerplate.php');

// require the user to be logged in
include('requirelogin.php');
requirelogin('edit.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Edit Instructor</title>
<link rel="stylesheet" type="text/css" href="../forms/view.css" media="all" />
<script type="text/javascript" src="../forms/view.js"></script>

</head>
<body id="main_body" >

<?php
include("../connect.php");

// Gets and sets instructor data to place in fields
$instructor = mysql_fetch_array(mysql_query('SELECT * FROM instructor WHERE id = ' . $_GET['id']));

if(isset($_POST['submit'])){
	$sql = mysql_query("UPDATE instructor SET firstname='$_POST[element_1_1]', 
		lastname='$_POST[element_1_2]', title='$_POST[element_2]', organization='$_POST[element_3]', 
		email='$_POST[element_4]', longbio='$_POST[element_5]', shortbio='$_POST[element_6]', 
		website='$_POST[element_7]' WHERE id=$_GET[id]");
	if ($sql) {
		echo '<p style="color:green; font-weight:bold;">Instructor updated.</p>';
		
		// Refetch instructor data
		$instructor = mysql_fetch_array(mysql_query('SELECT * FROM instructor WHERE id = ' . $_GET['id']));
	}
	else {
		echo '<p style="color:red; font-weight:bold;">Error updating instructor ' . mysql_error() . '</p>';
	}
}
?>
	
	<img id="top" src="../forms/top.png" alt="" />
	<div id="form_container">
	
		<h1><a>Edit Instructor</a></h1>
		<form id="form_132984" class="appnitro"  method="post" action="edit.php?<?php echo 'id=' . $_GET['id']?>">
					<div class="form_description">
			<h2>Edit Instructor</h2>
			<h3><a href="list.php">&laquo; Back</a></h3>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value="<?php echo $instructor['firstname']?>"/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value="<?php echo $instructor['lastname']?>"/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Job Title </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $instructor['title']?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Organization </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $instructor['organization']?>"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Email </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $instructor['email']?>"/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Web Site </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value="<?php echo $instructor['website']?>"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Short Bio (for Course Descriptions) </label>
		<div>
			<textarea id="element_6" name="element_6" class="element textarea small"><?php echo $instructor['shortbio']?></textarea> 
		</div><p class="guidelines" id="guide_6"><small>Unlike the long bio, this should be a single paragraph without &lt;p&gt; &lt;/p&gt; tags around it.</small></p> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Long Bio (for Instructor Page) </label>
		<div>
			<textarea id="element_5" name="element_5" class="element textarea large"><?php echo $instructor['longbio']?></textarea> 
		</div><p class="guidelines" id="guide_5"><small>Text must be wrapped in &lt;p&gt; &lt;/p&gt; tags to display correctly. You can use html formatting in this field.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="132984" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			<p>You are logged in as <?php echo $_SESSION['username']; ?>. <a href="../logout.php">Log out.</a></p>
		</div>
	</div>
	<img id="bottom" src="../forms/bottom.png" alt="" />
	</body>
</html>
