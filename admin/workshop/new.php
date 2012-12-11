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
	<meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" type="text/css" href="../forms/view.css" media="all" />
	<script type="text/javascript" src="../forms/calendar.js"></script>
	<script type="text/javascript" src="../forms/view.js"></script>
	<title>New Workshop</title>
</head>

<body>

<?php
include("../connect.php");

if(isset($_POST['submit'])){

	$new_start_date = $_POST['element_2_3'] . '-' . $_POST['element_2_1'] . '-' . $_POST['element_2_2'];
	$new_end_date = $_POST['element_3_3'] . '-' . $_POST['element_3_1'] . '-' . $_POST['element_3_2'];
	
	if ($_POST['element_4_4'] == 'PM') {
		$new_start_hour = ($_POST['element_4_1'] + 12) % 24;
	}
	else {
		$new_start_hour = $_POST['element_4_1'];
	}
	
	if ($_POST['element_5_4'] == 'PM') {
		$new_end_hour = ($_POST['element_5_1'] + 12) % 24;
	}
	else {
		$new_end_hour = $_POST['element_5_1'];
	}

	$new_start_time = $new_start_hour . ':' . $_POST['element_4_2'];
	$new_end_time = $new_end_hour . ':' . $_POST['element_5_2'];
	
	$sql = mysql_query("INSERT INTO workshop (title, description, pdp, regularprice, alumniprice, 
		category, location, startdate, enddate, starttime, endtime, new, display, postpone, cancel, 
		full, additionaltext) VALUES ('$_POST[element_18]', '$_POST[element_6]', '$_POST[element_7]', 
		'$_POST[element_8]', '$_POST[element_9]', '$_POST[element_17]', '$_POST[element_11]',
		'$new_start_date', '$new_end_date', '$new_start_time', '$new_end_time', 
		'$_POST[element_13]', '$_POST[element_12]', '$_POST[element_15]', '$_POST[element_14]', 
		'$_POST[element_16]', '$_POST[element_10]')");

	if ($sql) {
		echo '<p style="color:green; font-weight:bold;">' . $_POST['element_18'] . ' has been added to the database.</p>';
	}
	else {
		echo '<p style="color:red; font-weight:bold;">Error adding workshop ' . mysql_error() . '</p>';
	}

}
?>
	<img id="top" src="../forms/top.png" alt="" />
<div id="form_container">
	
	<h1><a>New Workshop</a></h1>
	<form id="form_144254" class="appnitro"  method="post" action="new.php">
	<div class="form_description">
		<h2>New Workshop</h2>
		<h3><a href="list.php">&laquo; Back</a></h3>
	</div>						
		<ul >

	<li id="li_18" >
	<label class="description" for="element_18">Workshop Title </label>
	<div>
		<input id="element_18" name="element_18" class="element text large" type="text" maxlength="255" value=""/> 
	</div> 
	</li>
		
				<li id="li_11" >
	<label class="description" for="element_11">Location </label>
	<div>
	<select class="element select medium" id="element_11" name="element_11"> 
		<option value="" selected="selected"></option>
			<option value="online">Online</option>
			<option value="simmons">Simmons</option>
			<option value="holyoke">Mt. Holyoke</option>
	</select>
	</div> 
	</li>
	<li>
	<label class="description" for="element_2">Start Date</label>
	<span>
		<input id="element_2_1" name="element_2_1" class="element text" size="2" maxlength="2" value="" type="text" />
		<label for="element_2_1">MM</label>
	</span>
	<span>
		<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="" type="text" />
		<label for="element_2_2">DD</label>
	</span>
	<span>
 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="" type="text" />
		<label for="element_2_3">YYYY</label>
	</span>

	<span id="calendar_2">
		<img id="cal_img_2" class="datepicker" src="../forms/calendar.gif" alt="Pick a date." />
	</span>
	<script type="text/javascript">
		Calendar.setup({
		inputField	 : "element_2_3",
		baseField    : "element_2",
		displayArea  : "calendar_2",
		button		 : "cal_img_2",
		ifFormat	 : "%B %e, %Y",
		onSelect	 : selectDate
		});
	</script>
	 
	</li>		<li id="li_3" >
	<label class="description" for="element_3">End Date</label>
	<span>
		<input id="element_3_1" name="element_3_1" class="element text" size="2" maxlength="2" value="" type="text" />
		<label for="element_3_1">MM</label>
	</span>
	<span>
		<input id="element_3_2" name="element_3_2" class="element text" size="2" maxlength="2" value="" type="text" />
		<label for="element_3_2">DD</label>
	</span>
	<span>
 		<input id="element_3_3" name="element_3_3" class="element text" size="4" maxlength="4" value="" type="text" />
		<label for="element_3_3">YYYY</label>
	</span>

	<span id="calendar_3">
		<img id="cal_img_3" class="datepicker" src="../forms/calendar.gif" alt="Pick a date." />
	</span>
	<script type="text/javascript">
		Calendar.setup({
		inputField	 : "element_3_3",
		baseField    : "element_3",
		displayArea  : "calendar_3",
		button		 : "cal_img_3",
		ifFormat	 : "%B %e, %Y",
		onSelect	 : selectDate
		});
	</script>
	 
	</li>		<li id="li_4" >
	<label class="description" for="element_4">Start Time</label>
	<span>
		<input id="element_4_1" name="element_4_1" class="element text " size="2" type="text" maxlength="2" value=""/> : 
		<label>HH</label>
	</span>
	<span>
		<input id="element_4_2" name="element_4_2" class="element text " size="2" type="text" maxlength="2" value=""/> : 
		<label>MM</label>
	</span>
	<span>
		<select class="element select" style="width:4em" id="element_4_4" name="element_4_4">
			<option value="AM" >AM</option>
			<option value="PM" >PM</option>
		</select>
		<label>AM/PM</label>
	</span><p class="guidelines" id="guide_4"><small>Leave blank for multi-day workshops.</small></p> 
	</li>		<li id="li_5" >
	<label class="description" for="element_5">End Time</label>
	<span>
		<input id="element_5_1" name="element_5_1" class="element text " size="2" type="text" maxlength="2" value=""/> : 
		<label>HH</label>
	</span>
	<span>
		<input id="element_5_2" name="element_5_2" class="element text " size="2" type="text" maxlength="2" value=""/> : 
		<label>MM</label>
	</span>
	<span>
		<select class="element select" style="width:4em" id="element_5_4" name="element_5_4">
			<option value="AM" >AM</option>
			<option value="PM" >PM</option>
		</select>
		<label>AM/PM</label>
	</span><p class="guidelines" id="guide_5"><small>Leave blank for multi-day workshops.</small></p> 
	</li>		<li id="li_12" >
	<label class="description" for="element_12">Display This Workshop? </label>
	<span>
		<input id="element_12_1" name="element_12" class="element radio" type="radio" value="1" />
<label class="choice" for="element_12_1">Yes</label>
<input id="element_12_2" name="element_12" class="element radio" type="radio" value="0" checked="checked" />
<label class="choice" for="element_12_2">No</label>

		</span> 
		</li>		<li id="li_13" >
		<label class="description" for="element_13">New? </label>
		<span>
			<input id="element_13_1" name="element_13" class="element radio" type="radio" value="1" />
<label class="choice" for="element_13_1">Yes</label>
<input id="element_13_2" name="element_13" class="element radio" type="radio" value="0" checked="checked" />
<label class="choice" for="element_13_2">No</label>

		</span> 
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Mark as cancelled? </label>
		<span>
			<input id="element_14_1" name="element_14" class="element radio" type="radio" value="1" />
<label class="choice" for="element_14_1">Yes</label>
<input id="element_14_2" name="element_14" class="element radio" type="radio" value="0" checked="checked" />
<label class="choice" for="element_14_2">No</label>

		</span> 
		</li>		<li id="li_15" >
		<label class="description" for="element_15">Mark as postponed? </label>
		<span>
			<input id="element_15_1" name="element_15" class="element radio" type="radio" value="1" />
<label class="choice" for="element_15_1">Yes</label>
<input id="element_15_2" name="element_15" class="element radio" type="radio" value="0" checked="checked" />
<label class="choice" for="element_15_2">No</label>

		</span> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Mark as full? </label>
		<span>
			<input id="element_16_1" name="element_16" class="element radio" type="radio" value="1" />
<label class="choice" for="element_16_1">Yes</label>
<input id="element_16_2" name="element_16" class="element radio" type="radio" value="0" checked="checked" />
<label class="choice" for="element_16_2">No</label>

		</span> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Description </label>
		<div>
			<textarea id="element_6" name="element_6" class="element textarea large"></textarea> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">PDPs </label>
		<div>
			<input id="element_7" name="element_7" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Regular Price </label>
		<div>
			<input id="element_8" name="element_8" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Alumni Price </label>
		<div>
			<input id="element_9" name="element_9" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17">Categories </label>
		<div>
		<select class="element select large" id="element_17" name="element_17"> 
			<option value="" selected="selected"></option>
			<?php

				$result = mysql_query("SELECT * FROM workshopcategory ORDER BY category");
				while($row = mysql_fetch_array($result)) {
					echo '<option value="' . $row['category'] . '">';
					echo $row['category'];
					echo '</option>';
				}
			?>
		</select>
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Additional Text </label>
		<div>
			<input id="element_10" name="element_10" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="144254" />
			    
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
