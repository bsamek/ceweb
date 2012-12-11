<?php

$con = mysql_connect("URL", "username", "password");
mysql_select_db("gslis_ce", $con);

  foreach ($_POST as $key => $value) {
    $_POST[$key] = mysql_real_escape_string($value);
  }
  foreach ($_GET as $key => $value) {
    $_GET[$key] = mysql_real_escape_string($value);
  }

?>
