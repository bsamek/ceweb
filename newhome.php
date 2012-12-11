<?php

include("classLoader.php");

$page = new Page();

$title = "Simmons GSLIS Continuing Education";
$page->setTitle($title);

$content = <<<HEREDOC

<!-- Tabs -->
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Update Your Skills</a></li>
		<li><a href="#tabs-2">Book Arts</a></li>
		<li><a href="#tabs-3">Children's/YA</a></li>
	</ul>
	<div id="tabs-1">The library and information science profession is constantly 
						changing. We offer you workshops to ensure your skills are up 
						to date and keep you competitive in today's job market. These 
						workshops include new topics in technology, information 
						organization, and research. <a href="updateyourskills.php">
						Update your skills today!</a></div>
	<div id="tabs-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
	<div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
</div>


<p>We offer more than 35 full-day, evening, and weekend workshops 
each semester at our Boston and Mount Holyoke campuses, online, and elsewhere throughout 
New England. Our workshops are scheduled on weekends or online for the convenience of 
practicing librarians and other professionals. Our online workshops are 
<a href="http://alanis.simmons.edu/ceweb/faq.php#online">asynchronous</a>,
which means that you can log in at your conveience, though it helps to log in 
regularly to keep up with the flow of the workshop.</p>

<!-- In progress -->
<p style="font-weight:bold; color:red;">Add workshops by date here??</p>

<!-- News -->
<h4>News</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	<p>Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</p>

<!-- Comments -->
<h4>Comment from Previous Students</h4>
	<p>Mauris porttitor ullamcorper augue!</p>
	<p>Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus!</p>

HEREDOC;
$page->setContent($content);

$page->render();

?>