<?php

include("classLoader.php");

$page = new QueryPage();

$title = "Registration Form";
$page->setTitle($title);

$content = "include/confirmation.php";
$page->setContent($content);

$page->render();

?>