<?php
/**
	* FileMaker PHP Site Assistant Generated File
	*/

	 require_once 'FileMaker.php';
	 function ExitOnError($result) {
		$errorMessage = NULL;
		if (FileMaker :: isError($result)) {
			$errorCode = $result->getCode();
			$errorMessage = "<p>Error: " . $errorCode . " - " . $result->getErrorString() . "<br></p>";			
			DisplayError($errorMessage);
					exit;
		} else if ($result === NULL) {
			$errorMessage = "<p>Error: Error result is NULL!</p>";
			DisplayError($errorMessage);
			exit;
		}
	}
	function DisplayError($message) {
		global $errormessage;
		$errormessage = $message . "<br>";
		include "errorpage.php";
	}
?>