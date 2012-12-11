<?php

include("classLoader.php");

$page = new QueryPage();

$content = "scripts/workshop.php";
$page->setContent($content);

$page->render();

?>