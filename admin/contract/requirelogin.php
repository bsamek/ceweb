<?php

// Contains system-wide settings
include('boilerplate.php');

function requirelogin($returnurl) {
    global $authorizer;

    // start the session
    session_start();

    // $_SESSION['username'] is populated by the login page after authentication
    $username = $_SESSION['username'];

    if (strlen($username) < 1) {
        // if the session doesn't contain a username, redirect to the login page
        header("Location:login.php?return_to=$returnurl");
        exit;
    }

    // verify that the authenticated user is authorized to view the page
    if (!$authorizer->isAuthorized($username, 'admin')) {
        header('HTTP/1.1 403 Forbidden');
        $http403page = <<< EOT
<html>
<head>
<title>403 Forbidden</title>
</head>
<body>
  <h1>User $username is not authorized to view this page.</h1>
</body>
</html>
EOT;
        echo $http403page;
        exit;
    }
}

?>

