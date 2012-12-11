<?php

include("classLoader.php");

$page = new Page();

$title = "Request Information";
$page->setTitle($title);

$content = <<<HEREDOC
<p>Please follow the link below and fill out the information request form if you would like to receive our twice-yearly postcard announcing a new CE term of workshops. (Note: You will be taken to a site outside of the Simmons GSLIS website.) You may also call us at 617-521-2803, or e-mail: <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a>.</p> 
 
          <p>Simmons GSLIS CE <a href="http://www.surveymonkey.com/s.aspx?sm=x8q6Tp37qdcZxcgKXqgm7Q_3d_3d" target="_blank">Information Request Form</a></p> 
 
          <p>If you would like admission information concerning any other GSLIS academic program please fill out our <a href="http://www.simmons.edu/gslis/admission/info.php" target="_blank">online admission info request form</a>.</p> 
HEREDOC;
$page->setContent($content);

$page->render();

?>