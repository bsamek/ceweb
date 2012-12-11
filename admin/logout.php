<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
<title>Log out</title>
</head>
<body>
<p>You have been logged out.</p>
<p><a href=".">Back</a></p>
</body>
</html>