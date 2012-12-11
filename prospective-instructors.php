<?php

include("classLoader.php");

$page = new Page();

$title = "Prospective Instructors";
$page->setTitle($title);

$content = <<<HEREDOC
		<p><strong>What We Do</strong></p> 
 
          <p>Simmons GSLIS CE serves the library/information professional community by offering an extensive and changing array of professional development opportunities in all areas of library, archives, and information services and operations. We offer over 30 workshops each semester at the Simmons campus, the Mt. Holyoke campus, and online.</p> 
 
          <p>For examples of our current workshops and instructors, please take a look at our <a href="index.php">GSLIS CE workshops</a> page.</p> 
 
          <p><strong>Types of Workshops</strong></p> 
 
          <p><em>Online Workshops</em><br /> 
          Online workshops typically run for 4 to 6 weeks. There are a number of different formats. The instructor of an online workshop may post a new module each week or the workshop may be mostly self-paced. The workshop might include readings, links, assignments, exercise/activities, and asynchronous and/or scheduled &quot;live&quot; chats. The students login at their convenience but there is the expectation that they will login regularly to keep up with either the posting of each new module and/or the discussions and will spend about 15 hours total on the workshop. We can host your workshop on our Moodle software, or you can host on your own platform if you would prefer.</p> 
 
          <p>We ask each online workshop instructor to set up a workshop preview webpage. There will be a link from the workshop description to our website to the preview page, providing an opportunity to illustrate more fully the contents of the workshop. We will need this very soon after your proposal is accepted.</p> 
 
          <p>Our online workshops are increasingly attracting students from around the world, which allows us to greatly expand the audience for our CE program.</p> 
 
          <p><em>Face-to-Face Workshops</em><br /> 
          Face-to-Face workshops are generally a half or a full day on Saturdays, though other times and days are possible. Most workshops are taught at the Boston or the Mt. Holyoke campuses, but we also hold workshops at other venues when appropriate. Face-to-Face workshops attract mostly students from New England, many of whom are Simmons GSLIS alums.</p> 
 
          <p><em>Other Workshop Formats</em><br /> 
          We are also interested in offering additional workshop formats such as shorter online workshops, workshop series, and short online on-demand workshops.</p> 
 
          <p><strong>Minimum Registrations to Run Workshops</strong></p> 
 
          <p>A workshop can be canceled if not enough students register, and the minimum number of students depends on the specific workshop. The minimum number of students for running a workshop is usually five. Instructors often want to know as early as possible whether their workshop will run, but since we often get a flurry of registrations during the last week before the workshop starts, the decision to run the workshop will usually be made about three days before the date of the workshop. Please be prepared to teach since you may not have a lot of time to prepare if you wait until the final decision is made.</p> 
 
          <p><strong>GSLIS CE Instructor Webpages</strong></p> 
 
          <p>If your workshop proposal is accepted, we will ask you to provide information to us (name, bio, photo, contact information, CV, etc.) for the creation of an instructor page. This is the opportunity for our instructors to provide additional information about their specific workshops and/or about themselves. The faculty webpages are linked to the workshop description in site. If you already have a CE Instructor webpage, please let us know if the information needs updating.</p> 
 
          <p><strong>Instructor Pay Scale</strong></p> 
 
          <p>Please contact <a href="mailto:gslisce@simmons.edu?subject=Inquiry%20about%20CE%20Instructor%20Fees">GSLIS CE</a> for more information.</p> 
 
          <p><strong>Current term:<br /></strong></p> 
 
          <p>Fall/Winter term runs from September 1, 2010 through March 31, 2011.</p> 
 
          <p><strong>Upcoming term:</strong></p> 
 
          <p>Spring/Summer term runs from April 1, 2011 through August 31, 2011.</p> 
 
          <p>Please submit your proposal through our <a href="http://www.surveymonkey.com/s.aspx?sm=wj5tSOhbJ5pD0vSSFGS5mA_3d_3d">online submission site</a> by January 15 for the Spring/Summer term and I will get back to you in early February.</p> 
 
          <p><strong>Proposals can be submitted at any time.</strong></p> 
 
			<p>Please email <a href="mailto:mailto:gslisce@simmons.edu?subject=Inquiry%20about%20Teaching%20for%20CE">gslisce@simmons.edu</a> to let us know that you have submitted a proposal.</p>
 
          <p><strong>Please feel free to <a href="mailto:gslisce@simmons.edu?subject=Inquiry%20about%20Teaching%20for%20CE">email me</a> with any questions.</strong></p> 
 
          <p>Kris Liberman<br /> 
          Program Manager<br /> 
          GSLIS Continuing Education<br /> 
          kristen.liberman@simmons.edu<br /> 
          617.521.2803</p>
HEREDOC;
$page->setContent($content);

$page->render();

?>