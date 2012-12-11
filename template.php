<?php

include("classLoader.php");

$page = new Page();

$title = "Title goes here.";
$page->setTitle($title);

$content = <<<HEREDOC
<p>Content goes here.</p>
HEREDOC;
$page->setContent($content);

$page->render();

?>