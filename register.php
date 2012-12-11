<?php

include("classLoader.php");

$page = new QueryPage();

$title = "Registration Form";
$page->setTitle($title);

$content = "include/register.php";
$page->setContent($content);

$page->render();

?>