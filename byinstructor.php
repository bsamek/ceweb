<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Workshops by Instructor";
$page->setTitle($title);

$rightMenuID = "instructor";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "By Instructor";
$page->setRightMenuText($rightMenuText);

$content = "scripts/byinstructor.php";
$page->setContent($content);

$page->render();

?>