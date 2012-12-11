<?php

// redirect to the SSL server if not already there
if (!(array_key_exists('SERVER_PORT',$_SERVER)) || $_SERVER['SERVER_PORT'] != '443') {
    $domain = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    header('Location: https://' . $domain . $uri);
}

?>
