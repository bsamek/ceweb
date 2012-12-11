<?php

class Page {
	/*
	 * Base class for all pages.
	 * Use this class for static pages. Invoke setTitle($newTitle)
	 * and setContent($newContent) to set title and content.
	 * Not all pages use a title.
	 */
	
	// The page to be rendered
	public $page;
	
	// Parts of the page
	public $title;
	public $content;
	
	// Set default page values
	public function __construct() {
		$this->header = file_get_contents("pageParts/header.php");
		$this->headerBottom = file_get_contents("pageParts/headerBottom.php");
		$this->bodyTag = file_get_contents("pageParts/bodyTag.php");
		$this->banner = file_get_contents("pageParts/banner.php");
		$this->leftMenu = file_get_contents("pageParts/leftMenu.php");
		$this->titlePrefix = file_get_contents("pageParts/titlePrefix.php");
		
		// Use public setter to set $this->title
		
		$this->titlePostfix = file_get_contents("pageParts/titlePostfix.php");
		$this->rightMenu = file_get_contents("pageParts/rightMenu.php");
		$this->contentPrefix = file_get_contents("pageParts/contentPrefix.php");
		
		// Use public setter to set $this->content
		
		$this->contentPostfix = file_get_contents("pageParts/contentPostfix.php");
		$this->footer = file_get_contents("pageParts/footer.php");
		$this->end = file_get_contents("pageParts/end.php");
	}
	
	// Set large orange text at top of middle column
	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}
	
	// Get page content for middle column
	public function getContent() {
		return $this->content;
	}
		
	// Set page content for middle column
	public function setContent($newContent) {
		$this->content = $newContent; 
	}

	// Returns associative array of page content
	protected function constructPage() {
		return array(
						"header" => $this->header,
						"headerBottom" => $this->headerBottom,
						"bodyTag" => $this->bodyTag,
						"banner" => $this->banner,
						"leftMenu" => $this->leftMenu,
						"titlePrefix" => $this->titlePrefix,
						"title" => $this->title,
						"titlePostfix" => $this->titlePostfix,
						"rightMenu" => $this->rightMenu,
						"contentPrefix" => $this->contentPrefix,
						"content" => $this->content,
						"contentPostfix" => $this->contentPostfix,
						"footer" => $this->footer,
						"end" => $this->end
					);
	}

	//Render page
	public function render() {
		$this->pageArray = $this->constructPage();
		$this->page = implode("\n", $this->pageArray);
		echo $this->page;
	}
}

?>