<?php

include("classLoader.php");

$page = new QueryPage();

$title = "Our Instructors";
$page->setTitle($title);

$content = "scripts/instructors.php";
$page->setContent($content);

$page->render();

?>