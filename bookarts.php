<?php

include("classLoader.php");

$page = new PageRightMenuHighlight();

$title = "Book Arts &amp; Artists' Books: A Workshop Series";
$page->setTitle($title);

$rightMenuID = "bookarts";
$page->setRightMenuID($rightMenuID);

$rightMenuText = "Book Arts & Artists Books: A Workshop Series";
$page->setRightMenuText($rightMenuText);

$content = <<<HEREDOC

		<p style="font-weight:bold;">Sign up for more than one workshop and receive 10% off the total cost.</p>
          
		<p><a href="instructor.php?id=2">Sarah Smith</a> has been teaching letterpress 
          printing, bookbinding, and printmaking for ten years at Montserrat College of Art, is a 
          founding member of Imposition Press, and has been working for the past fifteen years as a rare 
          book conservator at the Northeast Document Conservation Center.&#160;</em></p>
 
        <ul> 
            <li><a href="#bookmaking1">Bookmaking for the Beginner 1</a></li> 
 
            <li><a href="#bookmaking2">Bookmaking for the Beginner 2</a></li> 
 
            <li><a href="#popup">Pop-Up Books</a></li> 
 
            <li><a href="#printmethods">Print Methods for the Collector and Conservator</a></li> 
		</ul>
          
          <p><a href="instructor.php?id=48">Bill Hanscom</a> is an project conservation technician at the Weissman Preservation 
          Center for Harvard University libraries, where he treats a broad range of special 
          collections materials. He is also an adjunct instructor in Bookbinding at Montserrat 
          College of Art.</p>
           
          <ul>
          <li><a href="#origami">Practical Origami</a></li>
          </ul>
 	<hr />
 		<h3>Sarah Smith</h3>
 
          <h3 id="bookmaking1">Bookmaking for the Beginner 1</h3> 
 
          <p>Location: Boston<br />
          $220 (Simmons GSLIS Alumni Price $175)<br />
          April 2, 2011, 9:00am - 5:00pm - PDPs: 7</p> 
 
          <p>Whether you&#39;re interested in making books as art, making blank journals, or just curious about bookbinding, this course will help you understand the basic principles of a book&#39;s construction and function.&#160; Topics to be covered in discussion and with hands-on work are:</p> 
 
          <ul> 
            <li>Paper - how to choose and work with different kinds (folding, cutting, determining grain, direction)</li> 
 
            <li>Adhesives - what different adhesives do as well as when and how to use them</li> 
 
            <li>Sewing - choosing threads and needles as well as various sewing techniques and tips</li> 
 
            <li>Structure - how structures work, what their strengths and weaknesses are, and how to decide on a structure which complements the book&#39;s content</li> 
 
            <li>Proportion - page size and shape and the thickness of the book</li> 
          </ul> 
 
          <p>You will construct models of these basic binding structures: one sheet fold-up (the flutter book or ox-plow), other simple folded structures, accordion, single section pamphlet, two section pamphlet and chain link stitch, and multi-section.</p> 
 
          <h3 id="bookmaking2">Bookmaking for the Beginner 2</h3>
          
          <p>Location: Boston<br />
          $220 (Simmons GSLIS Alumni Price $175)<br />
          May 7, 2011, 9:00am - 5:00pm - PDPs: 7</p>
 
          <p>For those interested in expanding on what they learned in the Bookbinding 1 
          workshop, this workshop explores more multi-section books and sewing techniques. 
          Structures included will be supported sewings, such as long stitch and sewing 
          on tapes; exposed sewings, such as the Coptic binding and the Secret Belgian Binding. 
          Some basic pop-ups structures may also be covered.</p>
          
          <h3 id="popup">Pop-up Books</h3> 
 
          <p>Location: Boston<br />
          $395 (Simmons GSLIS Alumni Price $315)<br />
          June 11 - 12, 2011 - PDPs: 14<br />
          Workshop runs from 9:00am - 5:00pm both days</p> 
          
          <p>Remember some of your favorite pop-up books from when you were a kid?&#160; Or 
          do you work in a rare book library where you&#39;ve come across some surprisingly 
          old books with pop-up parts?&#160; Well, if you&#39;ve often wondered how these 
          structures work and where they come from, this workshop will help you understand some 
          of the basic ideas behind the history and production of pop-up books.&#160; After 
          a discussion and slide talk covering the history of pop-up books, be ready for some 
          hands-on exploration of some basic pop-up structures, including making a few examples 
          of your own.</p> 

          <h3 id="printmethods">Print Methods for the Collector and Conservator</h3> 
 
          <p>Location: Boston<br />
          $220 (Simmons GSLIS Alumni Price $175)<br />
          July 16, 2011, 9:00am - 5:00pm - PDPs: 7</p>
          
          <p>This course is designed for framers, paper conservators, book conservators, 
          preservation specialists, and all other paper enthusiasts. Through lectures and examples, 
          this course will cover the processes of intaglio (etching, aquatint, mezzotint, 
          drypoint, engraving, etc.), wood cut, wood engraving, process line and halftone relief, 
          lithography, monoprinting, screenprinting, and more. By viewing these techniques 
          through video and examples and learning the telltale marks each process leaves, students 
          will gain the ability to identify, and thus properly handle, the types of prints they 
          encounter in their field.</p>
          
          <hr />
          
          <h3>Bill Hanscom</h3>
          
          <h3 id="origami">Practical Origami</h3> 
 
          <p>Location: Boston<br />
          $220 (Simmons GSLIS Alumni Price $175)<br />
          August 6, 2011, 9:00am - 5:00pm - PDPs: 7</p> 
 
          <p>Participants will learn to transform simple sheets of paper into a variety of 
          books, envelopes, folders, boxes and other useful objects through the art of paperfolding. 
          Using a simple set of tools, we will manipulate paper (with the occasional cut & and 
          rarely adhesive) into elegantly simple and dynamically functional objects. Participants 
          will have the opportunity to work with many different papers as well as less conventional 
          materials such as Tyvek&reg;. Required tools: bone folder, utility knife, 12" steel ruler, 12 
          x 18" self-healing cutting mat, & pencil.</p>
          
          <h3><a href="register.php" style="color:#D35F1E; text-decoration:underline">Register here.</a></h3>
HEREDOC;
$page->setContent($content);

$page->render();

?>