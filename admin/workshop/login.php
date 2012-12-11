<?php
/*--------------------------------------------------------------------*
 login.php
 A simple login page.

 By Mark Tomko / tomko@simmons.edu  / 617-521-2851
 Simmons College GSLIS Technology Group

 REVISION HISTORY:
 1.0        10/4/2010        Initial release
 ---------------------------------------------------------------------*/

// Contains autoloader config, etc
include('boilerplate.php');

// Force SSL.
include('requiressl.php');

// name the session and start it
session_start();
if (isset($_REQUEST['action'])) {
	if (strtolower($_REQUEST['action']) == 'logout') {
		if (!strlen($_SESSION['username']) > 0) {
			$errmsg = '<font color="red">You are not logged in.</font>';
		}
		else {
			$errmsg = '<font color="red">Logout successful.</font>';
		}
		// clear out session variables
		session_unset();
	}
} else {
    // handle login requests
    // get the username & password
	if (isset($_REQUEST['username']))
    	$username = $_REQUEST['username'];
    if (isset($_REQUEST['password']))
		$password = $_REQUEST['password'];

    // this page does not allow empty values
	if (isset($username) and isset($password)) {
		if (strlen($username) > 0 and strlen($password) > 0) {
			// try to authenticate them
			if ($authenticator->authenticate($username, $password)) {
				// regenerate session id whenever security levels change
				session_regenerate_id();
	
				// set the session variables
				$_SESSION['username'] = $username;
	
				// handle redirects
				$returnurl = $_REQUEST['return_to'];
				if (strlen($_REQUEST['return_to']) > 0) {
					header("Location: $returnurl");
				}
				else {
					// add a default return url
					header("Location: /");
				}
				// prevent any further page rendering
				exit;
			}
			else {
				$errmsg = '<font color="red">Error: Sorry, but your username and password did not match those on file. Please try again.</font>';
				session_unset();
			}
		}
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../styles.css" type="text/css" media="screen"/>
<title>Log In</title>
</head>
<body>
<h4>Log In</h4>
<div><?php if (isset($errmsg)) echo $errmsg?></div>
<p>To use this system, you must login with your <strong>Simmons College Username and Password</strong>:</p>
<form name="login" action="<?=$_SERVER['PHP_SELF']?>" method="post">
  <p><strong>Username</strong> <input type="text" name="username" /></p>
  <p><strong>Password</strong> <input type="password" name="password" /></p>
  <p><input type="hidden" name="return_to" value="<?=$_REQUEST['return_to']?>" /></p>
  <p><input type="submit" value="Log In" /></p>
</form>
</body>
</html>
