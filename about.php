<?php

include("classLoader.php");

$page = new Page();

$title = "About GSLIS Continuing Education";
$page->setTitle($title);

$content = <<<HEREDOC
<p>GSLIS offers a variety of workshops each term of interest to
professionals in the library and information professions. Current 
and past workshop topics include taxonomies and controlled vocabularies, 
open access publications, business research, ILL, booktalkers, global 
arts bookmaking, book appraisal, Japanese anime and manga, library 
architecture, EAD, and many others. Continuing education programs are 
open both to practicing librarians/information professionals and current 
GSLIS students who wish to earn professional credits while they update 
skills and knowledge. Current Simmons GSLIS students and Simmons GSLIS 
alumni qualify for special discounted rates on continuing education 
programs.</p> 
 
<p>Workshops are held on weekends or online for the convenience of 
practicing librarians and other professionals. We offer more than 35 
half-day, full-day, or month-long workshops each semester at our Boston 
and Mount Holyoke campuses, online, and elsewhere throughout New England.</p> 
 
<p>If you have any questions, please feel free to contact 
us at <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a>.</p>
HEREDOC;
$page->setContent($content);

$page->render();

?>