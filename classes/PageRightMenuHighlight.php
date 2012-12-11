<?php 

class PageRightMenuHighlight extends Page {
	/*
	 * Extends Page to highlight right menu item corresponding
	 * to user's position in website. Use if and only if
	 * the page you are constructing appears in the right menu.
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
	
}

?>