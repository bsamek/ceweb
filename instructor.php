<?php

include("classLoader.php");

$page = new QueryPage();

$content = "scripts/instructor.php";
$page->setContent($content);

$page->render();

?>