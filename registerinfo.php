<?php

include("classLoader.php");

$page = new Page();

$title = "Registration Information";
$page->setTitle($title);

$content = <<<HEREDOC
<p style="font-weight:bold">If you have already registered but have not yet paid, 
       	please do not register again. Contact <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a> 
       	for a direct link to our payment page.</p>
        
       <p>You can register for GSLIS Continuing Education workshops online, and pay by credit card, electronic bank statement, or check. Just fill out the <a href="register.php">Continuing Education Registration Form</a> and indicate how you'd like to pay.</p>

<p>If you choose to pay by check, please print a copy of the form and mail it, with your check made out to Simmons College, to:</p>

<p>Kris Liberman, Program Manager<br />
Graduate School of Library and Information Science<br />
The Office of Continuing Education<br />
Simmons College<br />
300 The Fenway<br />
Boston, MA 02115-5898</p>

<p>If you choose to pay by credit card or electronic bank payment, you will be taken to our secure payment site directly from the registration form.</p>

<h4>NOTES</h4>

<h4>Costs</h4>
<p>See the workshop list for the cost of each course. Course cost includes a nonrefundable 30 percent registration fee. If a workshop must be canceled by Simmons College, you will be notified and your money will be fully refunded. Cancellations by registrants must be received in writing, via email or fax (617-521-3192), five business days prior to the workshop date in order for registrant to receive the maximum refund of 70 percent. Registrants may be subject to a 30 percent penalty fee if course payment is not received in full by the workshop date.</p>

<h4>Tax Deduction</h4>
<p>A tax deduction is allowed for educational expenses (including registration fees, travel, meals, lodging) if courses are undertaken to maintain and improve professional skills (see Treasury Reg. 1 162-5 Coughlin v. Commissioner, 203 F.2D 307).</p>

<p>TIP: If your employer is going to pay, or if you are concerned that we will not receive your registration in time, we recommend that you register for the workshop and email us to let us know that the check is forthcoming.</p>
HEREDOC;
$page->setContent($content);

$page->render();

?>