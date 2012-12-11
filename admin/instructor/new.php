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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>New Instructor</title>
<link rel="stylesheet" type="text/css" href="../forms/view.css" media="all" />
<script type="text/javascript" src="../forms/view.js"></script>

</head>
<body id="main_body" >

<?php
include('../connect.php');
if(isset($_POST['submit'])){

	// Submit new instructor to database
	$sql = mysql_query("INSERT INTO instructor (firstname, lastname, title, organization, 
		email, longbio, shortbio, website) VALUES ('$_POST[element_1_1]', '$_POST[element_1_2]', 
		'$_POST[element_2]', '$_POST[element_3]', '$_POST[element_4]', '$_POST[element_5]', 
		'$_POST[element_6]', '$_POST[element_7]')");
	if ($sql){
	  echo '<p style="color:green; font-weight:bold;">' . $_POST['element_1_1'] . ' ' . $_POST['element_1_2'] . ' has been added to the database.</p>';
	}
	else {
	  echo '<p style="color:red; font-weight:bold;">Error adding instructor ' . mysql_error() . '</p>';
	}
	
}
?>
	
	<img id="top" src="../forms/top.png" alt="" />
	<div id="form_container">
	
		<h1><a>New Instructor</a></h1>
		<form id="form_132984" class="appnitro"  method="post" action="new.php">
					<div class="form_description">
			<h2>New Instructor</h2>
			<h3><a href="list.php">&laquo; Back</a></h3>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Job Title </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Organization </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Email </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Web Site </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value="http://"/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Short Bio (for Course Descriptions) </label>
		<div>
			<textarea id="element_6" name="element_6" class="element textarea small"></textarea> 
		</div><p class="guidelines" id="guide_6"><small>Unlike the long bio, this should be one paragraph without &lt;p&gt; &lt;/p&gt; tags around it.</small></p> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Long Bio (for Instructor Page) </label>
		<div>
			<textarea id="element_5" name="element_5" class="element textarea large"></textarea> 
		</div><p class="guidelines" id="guide_5"><small>Please put &lt;p&gt; &lt;/p&gt; tags around long bio so that the text is displayed correctly. You can use html formatting in this field.</small></p> 
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
