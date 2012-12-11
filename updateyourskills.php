<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Update Your Skills";
$page->setTitle($title);

$rightMenuID = "skills";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "Update Your Skills";
$page->setRightMenuText($rightMenuText);

$content = "scripts/skills.php";
$page->setContent($content);

$page->render();

?>