<?php 

class QueryPage extends Page {
	/*
	 * Adds MySQL connection to Page class. $this->content
	 * must be a separate PHP file.
	 */
	
	protected function connect() {
		$con = mysql_connect("URL", "username", "password");
		mysql_select_db("gslis_ce", $con);
	}
	
	public function render() {
		// Connect to database
		$this->connect();
		
		// Construct the page
		$this->pageArray = $this->constructPage();
		
		// Split page above and below content
		$contentIndex = array_search("content", array_keys($this->pageArray));
		$this->pageTop = implode("\n", array_slice($this->pageArray, 0, 10));
		$this->pageBottom = implode("\n", array_slice($this->pageArray, 11, 3));
		
		// Render page and include content script
		echo $this->pageTop;
		include($this->getContent());
		echo $this->pageBottom;
	}
	
}


?>
