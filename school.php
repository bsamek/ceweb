<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Workshops for School Library Teachers";
$page->setTitle($title);

$rightMenuID = "school";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "Workshops for School Library Teachers";
$page->setRightMenuText($rightMenuText);

$content = "scripts/school.php";
$page->setContent($content);

$page->render();

?>