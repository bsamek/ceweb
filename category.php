<?php

include("classLoader.php");

$page = new WorkshopList();

$title = "Workshops by Category";
$page->setTitle($title);

$rightMenuID = "category";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "By Category";
$page->setRightMenuText($rightMenuText);

$content = "scripts/category.php";
$page->setContent($content);

$page->render();

?>