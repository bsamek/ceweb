<?php 

function __autoload($className) {
	include 'classes/' . $className . '.php';
}

?>