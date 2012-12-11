<?php 

class WorkshopList extends QueryPage {
	/*
	 * Adds right menu highlighting to QueryPage class. (PHP
	 * does not support multiple inheritance.)
	 */
	private $rightMenuID;
	private $rightMenuText;
	
	protected function constructPage() {
		$this->tempPageArray = parent::constructPage();
		
		// Add JavaScript for right menu highlighting
		$rightMenuHighlightJS = array(
									'<script type="text/javascript">',
									'function menuChange() {',
									"document.getElementById(\"$this->rightMenuID\").innerHTML =\"<strong>$this->rightMenuText</strong>\";",
									'}',
									'</script>'
								);
		array_splice($this->tempPageArray, 1, 0, $rightMenuHighlightJS);
		
		// Add correct body tag for right menu highlighting
		$rightMenuBody = "<body onload=\"menuChange()\">";
		$this->tempPageArray["bodyTag"] = $rightMenuBody;
		
		return $this->tempPageArray;
	}
	
	public function setRightMenuID($newRightMenuID) {
		$this->rightMenuID = $newRightMenuID;
	}
	
	public function setRightMenuText($newRightMenuText) {
		$this->rightMenuText = $newRightMenuText;
	}
	
	public function render() {
		// Connect to database
		$this->connect();
		
		// Construct the page
		$this->pageArray = $this->constructPage();
		
		// Split page above and below content
		$this->pageTop = implode("\n", array_slice($this->pageArray, 0, 15));
		$this->pageBottom = implode("\n", array_slice($this->pageArray, 16, 3));
		
		// Render page and include content script
		echo $this->pageTop;
		include($this->getContent());
		include("include/discountFooter.php");
		echo $this->pageBottom;
	}
	
}

?>