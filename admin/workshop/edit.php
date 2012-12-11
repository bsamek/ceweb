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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" type="text/css" href="../forms/view.css" media="all" />
	<script type="text/javascript" src="../forms/calendar.js"></script>
	<script type="text/javascript" src="../forms/view.js"></script>
	<title>Edit Workshop</title>
</head>
<body>

<?php
include("../connect.php");


// Update workshop with user-generated data
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

	$sql = mysql_query("UPDATE workshop SET title='$_POST[element_18]', description='$_POST[element_6]',
	pdp='$_POST[element_7]', regularprice='$_POST[element_8]', alumniprice='$_POST[element_9]',
	category='$_POST[element_17]', location='$_POST[element_11]', startdate='$new_start_date',
	enddate='$new_end_date', starttime='$new_start_time', endtime='$new_end_time',
	new='$_POST[element_13]', display='$_POST[element_12]', postpone='$_POST[element_15]',
	cancel='$_POST[element_14]', full='$_POST[element_16]', additionaltext='$_POST[element_10]'
	WHERE id=$_GET[id]");

	$workshop = mysql_fetch_array(mysql_query('SELECT * FROM workshop WHERE id = ' . $_GET['id']));

	if ($sql) {
		echo '<p style="color:green; font-weight:bold;">' . $_POST['element_18'] . ' has been updated.</p>';
	}
	else {
		echo '<p style="color:red; font-weight:bold;">Error updating workshop ' . mysql_error() . '</p>';
	}
}

// Get workshop data to fill in fields.
$workshop = mysql_fetch_array(mysql_query('SELECT * FROM workshop WHERE id = ' . $_GET['id']));

$old_start_date = explode('-', $workshop['startdate']);
$old_start_date_year = $old_start_date[0];
$old_start_date_month = $old_start_date[1];
$old_start_date_day = $old_start_date[2];

$old_end_date = explode('-', $workshop['enddate']);
$old_end_date_year = $old_end_date[0];
$old_end_date_month = $old_end_date[1];
$old_end_date_day = $old_end_date[2];


// Note that the construction of time does not correctly display times between
// midnight and 12:59am. Since no onsite classes will begin or end at
// these times, I opted for simplicity rather than completeness. - Brian
$old_start_time = explode(':', $workshop['starttime']);
$old_start_time_hour = $old_start_time[0];
$old_start_time_minute = $old_start_time[1];

if ($old_start_time_hour > 12) {
    $old_start_time_pm = TRUE;
    $old_start_time_hour = $old_start_time_hour - 12;

    // Correct for single-digit hours
    if ($old_start_time_hour < 10) {
        $old_start_time_hour = '0' . $old_start_time_hour;
    }

}
else {
    $old_start_time_pm = FALSE;
}

$old_end_time = explode(':', $workshop['endtime']);
$old_end_time_hour = $old_end_time[0];
$old_end_time_minute = $old_end_time[1];

if ($old_end_time_hour > 12) {
    $old_end_time_pm = TRUE;
    $old_end_time_hour = $old_end_time_hour - 12;

    // Correct for single-digit hours
    if ($old_end_time_hour < 10) {
        $old_end_time_hour = '0' . $old_end_time_hour;
    }
}
else {
    $old_end_time_pm = FALSE;
}

?>

<img id="top" src="../forms/top.png" alt="" />
<div id="form_container">

	<h1><a>Edit Workshop</a></h1>
	<form id="form_144254" class="appnitro"  method="post" action="edit.php?<?php echo 'id=' . $_GET['id']?>">
	<div class="form_description">
		<h2>Edit Workshop</h2>
		<h3><a href="list.php">&laquo; Back</a></h3>
	</div>
		<ul >

	<li id="li_18" >
	<label class="description" for="element_18">Workshop Title</label>
	<div>
		<input id="element_18" name="element_18" class="element text large" type="text" maxlength="255" value="<?php echo $workshop['title']?>"/>
	</div>
	</li>

				<li id="li_11" >
	<label class="description" for="element_11">Location </label>
	<div>
	<select class="element select medium" id="element_11" name="element_11">
			<option value="online" <?php if ($workshop['location'] == 'online') echo 'selected="selected"'?>>Online</option>
			<option value="simmons" <?php if ($workshop['location'] == 'simmons') echo 'selected="selected"'?>>Simmons</option>
			<option value="holyoke" <?php if ($workshop['location'] == 'holyoke') echo 'selected="selected"'?>>Mt. Holyoke</option>
	</select>
	</div>
	</li>
	<li>
	<label class="description" for="element_2">Start Date</label>
	<span>
		<input id="element_2_1" name="element_2_1" class="element text" size="2" maxlength="2" value="<?php echo $old_start_date_month ?>" type="text" />
		<label for="element_2_1">MM</label>
	</span>
	<span>
		<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="<?php echo $old_start_date_day ?>" type="text" />
		<label for="element_2_2">DD</label>
	</span>
	<span>
 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="<?php echo $old_start_date_year ?>" type="text" />
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
		<input id="element_3_1" name="element_3_1" class="element text" size="2" maxlength="2" value="<?php echo $old_end_date_month ?>" type="text" />
		<label for="element_3_1">MM</label>
	</span>
	<span>
		<input id="element_3_2" name="element_3_2" class="element text" size="2" maxlength="2" value="<?php echo $old_end_date_day ?>" type="text" />
		<label for="element_3_2">DD</label>
	</span>
	<span>
 		<input id="element_3_3" name="element_3_3" class="element text" size="4" maxlength="4" value="<?php echo $old_end_date_year ?>" type="text" />
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
		<input id="element_4_1" name="element_4_1" class="element text " size="2" type="text" maxlength="2" value="<?php echo $old_start_time_hour ?>"/> :
		<label>HH</label>
	</span>
	<span>
		<input id="element_4_2" name="element_4_2" class="element text " size="2" type="text" maxlength="2" value="<?php echo $old_start_time_minute ?>"/> :
		<label>MM</label>
	</span>
	<span>
		<select class="element select" style="width:4em" id="element_4_4" name="element_4_4">
			<option value="AM" <?php if ($old_start_time_pm == FALSE) echo 'selected="selected"' ?>>AM</option>
			<option value="PM" <?php if ($old_start_time_pm == TRUE) echo 'selected="selected"' ?>>PM</option>
		</select>
		<label>AM/PM</label>
	</span><p class="guidelines" id="guide_4"><small>Leave blank for multi-day workshops.</small></p>
	</li>		<li id="li_5" >
	<label class="description" for="element_5">End Time</label>
	<span>
		<input id="element_5_1" name="element_5_1" class="element text " size="2" type="text" maxlength="2" value="<?php echo $old_end_time_hour ?>"/> :
		<label>HH</label>
	</span>
	<span>
		<input id="element_5_2" name="element_5_2" class="element text " size="2" type="text" maxlength="2" value="<?php echo $old_end_time_minute ?>"/> :
		<label>MM</label>
	</span>
	<span>
		<select class="element select" style="width:4em" id="element_5_4" name="element_5_4">
			<option value="AM" <?php if ($old_end_time_pm == FALSE) echo 'selected="selected"' ?>>AM</option>
			<option value="PM" <?php if ($old_end_time_pm == TRUE) echo 'selected="selected"' ?>>PM</option>
		</select>
		<label>AM/PM</label>
	</span><p class="guidelines" id="guide_5"><small>Leave blank for multi-day workshops.</small></p>
	</li>		<li id="li_12" >
	<label class="description" for="element_12">Display This Workshop? </label>
	<span>
		<input id="element_12_1" name="element_12" class="element radio" type="radio" value="1" <?php if ($workshop['display'] == '1') echo 'checked="checked"'?> />
<label class="choice" for="element_12_1">Yes</label>
<input id="element_12_2" name="element_12" class="element radio" type="radio" value="0" <?php if ($workshop['display'] == '0') echo 'checked="checked"'?> />
<label class="choice" for="element_12_2">No</label>

		</span>
		</li>		<li id="li_13" >
		<label class="description" for="element_13">New? </label>
		<span>
			<input id="element_13_1" name="element_13" class="element radio" type="radio" value="1" <?php if ($workshop['new'] == '1') echo 'checked="checked"'?> />
<label class="choice" for="element_13_1">Yes</label>
<input id="element_13_2" name="element_13" class="element radio" type="radio" value="0" <?php if ($workshop['new'] == '0') echo 'checked="checked"'?> />
<label class="choice" for="element_13_2">No</label>

		</span>
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Mark as cancelled? </label>
		<span>
			<input id="element_14_1" name="element_14" class="element radio" type="radio" value="1" <?php if ($workshop['cancel'] == '1') echo 'checked="checked"'?> />
<label class="choice" for="element_14_1">Yes</label>
<input id="element_14_2" name="element_14" class="element radio" type="radio" value="0" <?php if ($workshop['cancel'] == '0') echo 'checked="checked"'?> />
<label class="choice" for="element_14_2">No</label>

		</span>
		</li>		<li id="li_15" >
		<label class="description" for="element_15">Mark as postponed? </label>
		<span>
			<input id="element_15_1" name="element_15" class="element radio" type="radio" value="1" <?php if ($workshop['postpone'] == '1') echo 'checked="checked"'?> />
<label class="choice" for="element_15_1">Yes</label>
<input id="element_15_2" name="element_15" class="element radio" type="radio" value="0" <?php if ($workshop['postpone'] == '0') echo 'checked="checked"'?> />
<label class="choice" for="element_15_2">No</label>

		</span>
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Mark as full? </label>
		<span>
			<input id="element_16_1" name="element_16" class="element radio" type="radio" value="1" <?php if ($workshop['full'] == '1') echo 'checked="checked"'?> />
<label class="choice" for="element_16_1">Yes</label>
<input id="element_16_2" name="element_16" class="element radio" type="radio" value="0" <?php if ($workshop['full'] == '0') echo 'checked="checked"'?> />
<label class="choice" for="element_16_2">No</label>

		</span>
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Description </label>
		<div>
			<textarea id="element_6" name="element_6" class="element textarea large"><?php echo $workshop['description']?></textarea>
		</div>
		<p class="guidelines" id="guide_6"><small>Text must be wrapped in &lt;p&gt; &lt;/p&gt; tags to display correctly. You may use html formatting in this field.</small></p>
		</li>		<li id="li_7" >
		<label class="description" for="element_7">PDPs </label>
		<div>
			<input id="element_7" name="element_7" class="element text small" type="text" maxlength="255" value="<?php echo $workshop['pdp']?>"/>
		</div>
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Regular Price </label>
		<div>
			<input id="element_8" name="element_8" class="element text small" type="text" maxlength="255" value="<?php echo $workshop['regularprice']?>"/>
		</div>
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Alumni Price </label>
		<div>
			<input id="element_9" name="element_9" class="element text small" type="text" maxlength="255" value="<?php echo $workshop['alumniprice']?>"/>
		</div>
		</li>		<li id="li_17" >
		<label class="description" for="element_17">Categories </label>
		<div>
		<select class="element select large" id="element_17" name="element_17">
			<option value="" selected="selected"></option>
			<?php

				$result = mysql_query("SELECT * FROM workshopcategory ORDER BY category");
				while($row = mysql_fetch_array($result)) {
                                        if ($workshop['category'] == $row['category'])
                                            $select_this_category = 'selected="selected"';
                                        else
                                            $select_this_category = '';
					echo '<option value="' . $row['category'] . '"' . $select_this_category . '>';
					echo $row['category'];
					echo '</option>';
				}
			?>
		</select>
		</div>
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Additional Text</label>
		<div>
			<input id="element_10" name="element_10" class="element text large" type="text" maxlength="255" value='<?php echo $workshop['additionaltext']?>'/>
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
