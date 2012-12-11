<?php

include("classLoader.php");

$page = new Page();

$title = "Workshop Payment";
$page->setTitle($title);

$content = <<<HEREDOC
		<p>Thank you for registering for a Simmons GSLIS CE workshop!</p>
		<p>Please enter the total payment amount and press continue if you'd like to pay by credit card or by electronic bank payment.</p>
	
		<form action="https://secure.touchnet.com/C21377_upay/web/index.jsp" method="post">
			<input type="hidden" name="UPAY_SITE_ID" value="0" />
		    <input type="hidden" name="EXT_TRANS_ID" value="GSLIS_111_2435_10_134025_400500" />
		    <input type="text" name="AMT" />
		    <input type="submit" value="Continue" />
		</form>
HEREDOC;
$page->setContent($content);

$page->render();

?>