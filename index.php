<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Workshops by Date";
$page->setTitle($title);

$rightMenuID = "date";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "By Date";
$page->setRightMenuText($rightMenuText);

$content = "scripts/date.php";
$page->setContent($content);

$page->render();

?>