<?php

include("classLoader.php");

$page = new Page();

$title = "Current Instructors";
$page->setTitle($title);

$content = <<<HEREDOC
		<p><strong>Useful Links:</strong></p> 
 
          <ul> 
            <li>17 Elements of Good Online Courses: <a href="http://honolulu.hawaii.edu/intranet/committees/FacDevCom/guidebk/online/web-elem.htm">http://honolulu.hawaii.edu/intranet/committees/FacDevCom/guidebk/online/web-elem.htm</a></li>
            
            <li>eLearn Magazine: Education and Technology in Perspective: <a href="http://elearnmag.org/index.cfm">http://elearnmag.org/index.cfm</a></li> 
 
 			<li>Establishing a Quality Review of Online Courses: <a href="http://www.educause.edu/EDUCAUSE+Quarterly/EDUCAUSEQuarterlyMagazineVolum/EstablishingaQualityReviewforO/157414">http://bit.ly/5r9AHn</a></li> 
 
 			<li>Journal for Asynchronous Learning Networks: <a href="http://www.sloanconsortium.org/publications/jaln/index.asp">http://www.sloanconsortium.org/publications/jaln/index.asp</a></li> 
 
            <li>Journal of Online Learning &amp; Teaching (JOLT): <a href="http://jolt.merlot.org/">http://jolt.merlot.org/</a></li> 
 
            <li>MERLOT Library &amp; Information Sciences Portal: <a href="http://libraryandinformationservices.merlot.org/">http://libraryandinformationservices.merlot.org/</a></li> 
 
            <li>Online Teaching Resources: <a href="http://www.uwm.edu/Dept/LTC/resources.html#online">http://www.uwm.edu/Dept/LTC/resources.html#online</a></li> 
            
            <li>Seven things I'd want to know as a new online teacher: <a href="http://lisahistory.net/wordpress/?p=779">http://lisahistory.net/wordpress/?p=779</a> </li>
            
            <li>Sloan-C: <a href="http://www.sloan-c.org/">http://www.sloan-c.org/</a></li> 
            
            <li>Rubrics for Designing an Online Course: <a href="http://www.uwm.edu/Dept/LTC/docs/montanacourseeval.pdf">http://www.uwm.edu/Dept/LTC/docs/montanacourseeval.pdf</a></li>
            
            <li>WISE Introduction to Online Pedagogy Workshop: <a href="http://wisepedagogy.org/workshop.shtml">http://wisepedagogy.org/workshop.shtml</a></li> 
            
            <li>WISE Pedagogy: <a href="http://wisepedagogy.org/">http://wisepedagogy.org/</a></li> 
           
          </ul> 
 
          <p><strong>Books</strong></p> 
 
          <ul> 
            <li>Engaging the Online Learner: <a href="http://www.josseybass.com/WileyCDA/WileyTitle/productCd-0787966673,descCd-tableOfContents.html">http://www.josseybass.com/WileyCDA/WileyTitle/productCd-0787966673,descCd-tableOfContents.html</a></li> 
 
            <li>Facilitating Online Learning: <a href="http://www.atwoodpublishing.com/books/160.htm">http://www.atwoodpublishing.com/books/160.htm</a></li> 
 
            <li>Teach Beyond Your Reach: <a href="http://www.freepint.com/bookshelf/tbyr.htm">http://www.freepint.com/bookshelf/tbyr.htm</a></li> 
          </ul>
HEREDOC;
$page->setContent($content);

$page->render();

?>