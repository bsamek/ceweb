<?php

include("classLoader.php");

$page = new Page();

$title = "Teaching for CE";
$page->setTitle($title);

$content = <<<HEREDOC
<p><strong>What We Do</strong></p>

<p>Simmons GSLIS CE serves the library/information professional community by offering an extensive and changing array of professional development opportunities in all areas of library, archives, and information services and operations. We offer over 30 workshops each semester at the Simmons campus, the Mt. Holyoke campus, and online.</p>

<p>For examples of our current workshops and instructors, please take a look at our <a href="index.php">GSLIS CE workshops page.</a></p>

<p>If you are interested in teaching a CE workshop, please see our <a href="prospective-instructors.php">Prospective Instructors</a> page for more information.</p>

<p>If you are currently teaching for CE, or will be soon, please see our <a href="current-instructors.php">Current Instructors</a> page for resources, information and more.</p>
       
HEREDOC;
$page->setContent($content);

$page->render();

?>