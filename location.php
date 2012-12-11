<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Workshops by Location";
$page->setTitle($title);

$rightMenuID = "location";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "By Location";
$page->setRightMenuText($rightMenuText);

$content = "scripts/location.php";
$page->setContent($content);

$page->render();

?>